<?php
namespace Mobile\Controller;
use Mobile\Common\Controller\BgController;
class OrderController extends BgController{
    public function index(){
        $where='';
        if($_GET['status'] && $_GET['status']){
            $where['orderstatus']=I('get.status');
            $this->assign('status',I('get.status'));
        }
        if($_GET['keywords'] && $_GET['keywords']){
            $keywords=I('get.keywords');
            $where['ordersyn']=array('like',"%$keywords%");
            $this->assign('keywords',$keywords);
        }

        $om=D('Order');
        $orderList=$om->getOrder($where);
        foreach($orderList as $k=>$v){
            $orderList[$k]['goods']=$om->getOrderGoods($v['id'],$v['orderstatus']);
        }
        $this->assign('start',5);
        $this->assign('orderList',$orderList);
        $this->display();
    }

    public function getMore(){
        $where='';
        if($_POST['status'] && $_POST['status']){
            $where['orderstatus']=I('post.status');
            $this->assign('status',I('post.status'));
        }
        if($_POST['keywords'] && $_POST['keywords']){
            $keywords=I('post.keywords');
            $where['ordersyn']=array('like',"%$keywords%");
            $this->assign('keywords',$keywords);
        }
        $start=I('post.start');
        $om=D('Order');
        $orderList=$om->getOrder($where,$start);
        foreach($orderList as $k=>$v){
            $orderList[$k]['goods']=$om->getOrderGoods($v['id'],$v['orderstatus']);
        }
        $this->assign('start',$start+5);
        $this->assign('orderList',$orderList);
        $this->display('more');
    }

    public function qrsh(){//用户确认收货
        $data['id']=I('post.id');
        $points=M('order')->where($data)->field("mid,orderprice")->find();
        $data['points']=$points['orderprice'];
        $data['orderstatus']=4;
        $data['contime']=time();

        $res2=M('order')->save($data);
        $res4=M('member')->where(array('id'=>$points['mid']))->field('points,totalpoints')->find();
        $data1['points']=$res4['points']+$points['orderprice'];
        $data1['totalpoints']=$res4['totalpoints']+$points['orderprice'];
        $res5=M('member')->where(array('id'=>$points['mid']))->save($data1);


        $res3=M('history')->where(array('oid'=>$data['id']))->save(array('active'=>1));


        if($res2 && $res3){
            $this->success("确认收货成功");
        }else{
            $this->error("确认收货失败");
        }
    }

    public function orderDetail(){
        $oid=I('get.id');
        $om=D('Order');
        $info=$om->getSingleOrder($oid);
        $info['address']=$info['province'].$info['city'].$info['town'].$info['address'];
        $info['goods']=$om->getOrderGoods($oid,$info['orderstatus']);
        $this->assign('info',$info);
        $this->display();
    }

    public function pay(){
        $oid=I('post.oid');
        $data['id']=$oid;
        $data['paymethod']=I('post.paymethod');
        $data['message']=I('message');
        $model=D("Order");
//        $res5=$model->where('')
        $res1 = $model->bindAddr($oid);//将收货地址复制并绑定该订单
        if($res1){
            $res4=$model->changeSaleNum($oid);//修改商品的已售数量和库存量
            if($res4) {
                $res2 = $model->changeStatus($oid, 2);//将订单状态修改为待发货
                $model->moveToHistory($oid);
                $res3 = M('order')->save($data);//修改付款方式
                if ($res2) {
                    $this->success("付款成功");
                } else {
                    $this->error("付款失败");
                }
            }else{
                $this->error("购买商品超出库存量，付款失败");
            }
        }else{
            $this->error("请选择收货地址");
        }

    }

    public function myAddress(){
        $om=D("Order");
        $addrList=$om->getMyAddr();
        $this->assign('addrList',$addrList);
        $this->display();
    }

    public function setDef(){
        $where['mid']=session("ybc_id");
        $where['def']=array('neq','2');
        $data['def']='0';
        $res1=M('member_address')->where($where)->save($data);
        $res2=M('member_address')->where(array('id'=>I('post.id')))->save(array('def'=>'1'));
        if($res2){
            $this->success("设置默认地址成功");
        }else{
            $this->error("设置默认地址失败");
        }
    }

    public function delAdd(){
        $res2=M('member_address')->where(array('id'=>I('post.id')))->delete();
        if($res2){
            $this->success("删除地址成功");
        }else{
            $this->error("删除地址失败");
        }
    }

    public function addAddr(){

        if($_GET['aid'] && $_GET['aid']){
            $id=I('get.aid');
            $addr=M('member_address')->where(array('id'=>$id))->find();
            $pct=$addr['province'].','.$addr['city'].','.$addr['town'];
            $this->assign('aid',$id);
            $this->assign('addr',$addr);
            $this->assign('pct',$pct);
        }
        if($_GET['oid'] && $_GET['oid']){
            $this->assign("oid",$_GET['oid']);
        }

        $this->display();
    }
    public function paySuccess(){
        if(!I('get.oid')){
            $this->redirect('Index/index');
        }
        $oid=I('get.oid');
        $order=M('order')->where(array('id'=>$oid))->find();
        $this->assign('order',$order);
        $this->display("paySuccess");
    }

    public function saveAddr(){
        $data['mid']=session('ybc_id');
        $data['name']=I('post.name');
        $data['phone']=I('post.phone');
        $data['address']=trim(I('post.address'));
        $data['postcode']=I('post.postcode');
        if($_GET['aid'] && $_GET['aid']){
            $data['id']=$_GET['aid'];
        }
        if($_POST['def'] && $_POST['def']){
            $data['def']=$_POST['def'];
        }
        //获取省、市、县信息
        $pct=I('post.pct');
        if($pct){
            $pctArr=explode(',',$pct);
            $num=count($pctArr);
            if($num==2){
                $data['province']=$pctArr[0];
                $data['city']=$pctArr[0];
                $data['town']=$pctArr[1];
            }else{
                $data['province']=$pctArr[0];
                $data['city']=$pctArr[1];
                $data['town']=$pctArr[2];
            }
        }
        //正则匹配
        $postCodeReg='/^[0-9]{6}$/';
        $phoneReg='/^1[34578]{1}[0-9]{9}$/';
        if(!$data['name']){
            $this->error('请填写收货人');
        }
        if(!$data['phone']){
            $this->error('请填写联系电话');
        }elseif(!preg_match($phoneReg,$data['phone'])){
            $this->error("请正确填写联系电话(只能为11位手机号)");
        }
        if(!$pct){
            $this->error('请选择所在地区');
        }
        if(!$data['address']){
            $this->error('请填写详细地址');
        }elseif(iconv_strlen($data['address'],'utf-8')<5 || iconv_strlen($data['address'],"utf-8")>20){
            $this->error('详细地址应在5~20个字符之间');
        }
        if(!$data['postcode']){
            $this->error('请填写邮政编码');
        }elseif(!preg_match($postCodeReg,$data['postcode'])){
            $this->error('请正确填写邮政编码');
        }
        if($_GET['aid'] && $_GET['aid']){
            $res=M("member_address")->save($data);
            if($_POST['def'] && $_POST['def']){//如果设为默认
                $res1=M('member_address')->where(array('mid'=>session('ybc_id'),'id'=>array('neq',$data['id']),'def'=>array('neq','2')))->save(array('def'=>'0'));
            }
            if($res){
                $this->success("保存成功");
            }else{
                $this->error("没有做任何修改，不需要保存");
            }
        }else{
            if($_POST['def'] && $_POST['def']){//如果设为默认
                $res1=M('member_address')->where(array('mid'=>session('ybc_id'),'def'=>array('neq','2')))->save(array('def'=>'0'));
            }
            $res=M("member_address")->add($data);

            if($_GET['oid'] && $_GET['oid']){
                $this->success("添加成功",U('Order/selectAddr')."?oid=".$_GET['oid']);
            }

            if($res){
                $this->success("添加成功",U('Order/myAddress'));
            }else{
                $this->error("添加失败");
            }
        }
    }

    public function createOrder(){
        $data['mid']=session("ybc_id");
        $data['ordersyn']=md5(uniqid(microtime(true)));
        $data['orderprice']=I('post.orderPrice');
        $data['orderstatus']=1;
        $data['addtime']=time();
        if($data['orderprice']<68){
            $data['postage']=10;
        }
        $res1=M('order')->add($data);
        $gidArr=I('post.checkitems');
        if($res1){
            foreach($gidArr as $k=>$v){
                $goodsData[$k]['gid']=$v;
                $goodsData[$k]['oid']=$res1;
                $str="number_text".$v;
                $goodsData[$k]['buynum']=I('post.'.$str);
            }
            $res2=M("order_goods")->addAll($goodsData);
            if($res2){
                foreach($gidArr as $k=>$v){
                    $w['mid']=session("ybc_id");
                    $w['gid']=$v;
                    M('cart')->where($w)->delete();
                }
                $this->success($res1);
            }else{
                $res3=M("order")->where(array('id'=>$res1))->delete();
                if($res3){
                }
                $this->error("生成订单失败");
            }
        }else{
            $this->error("生成订单失败");
        }
    }

    public function selectAddr(){
        $data['address_id']=I('get.aid');
        $oid=I('get.oid');
        if($data['address_id']){
            M('order')->where(array('id'=>$oid))->save($data);
            $this->success();
        }
        $om=D("Order");
        $addrList=$om->getMyAddr();
        $this->assign('addrList',$addrList);
        $this->assign('oid',$oid);
        $this->display();
    }

    public function utf8_strlen($string = null) {
// 将字符串分解为单元
    preg_match_all("/./us", $string, $match);
// 返回单元个数
    return count($match[0]);
    }

    public function comment(){//评价页面
        $gid=I('get.gid');
        $hid=I('get.hid');
        $history=M('History');
        $pic=$history->where(array('id'=>$hid))->getField('pic');
        $goodsname=$history->where(array('id'=>$hid))->getField('goodsname');
        $this->assign('pic',$pic);
        $this->assign('goodsname',$goodsname);
        $this->assign('gid',$gid);
        $this->assign('hid',$hid);
        $this->display();
    }
    public function toComment(){//发表评价
        $mid=session('ybc_id');
        $gid=I('post.gid');
        $hid=I('post.hid');
        $data['mid']=$mid;$data['gid']=$gid;$data['hid']=$hid;
        $data['text']=I('post.content');$data['level']=I('post.level');$data['addtime']=time();
        $history=M('History');
        $comment=M('Comment');
        if($comment->where(array('hid'=>$hid))->find()){
            $this->error('您已评价过该商品哦');
        }elseif($comment->add($data)){
            $history->sfpj=1;
            $history->where(array('id'=>$hid))->save();
            $oid=$history->where(array('id'=>$hid))->getField('oid');
            if(!$history->where(array('oid'=>$oid,'sfpj'=>0))->find()){
                $where1['orderstatus']=5;
                M('Order')->where(array('id'=>$oid))->save($where1);
            }
            $count=$comment->where(array('gid'=>$gid))->count();
            $where2['commentnum']=$count;
            M('goods')->where(array('id'=>$gid))->save($where2);
            $this->success('评价成功！');
        }
    }
}