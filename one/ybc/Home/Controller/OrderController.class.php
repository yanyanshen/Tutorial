<?php
namespace Home\Controller;
use Home\Common\Controller\BgController;
use Org\Ybc;
class OrderController extends BgController{
    public function _empty(){
        $this->display('Public/error');
    }
    public function order(){
        $oid=I('get.oid');
        if(!I('get.oid')){
            $this->redirect('index');
        }
        $model=D("Order");
        $goods=$model->orderGoods($oid);
        $status=$model->chkStatus($oid);
        if($status==1){
            $res=$model->chkAddress(session('ybc_id'));//判断用户是否有收获地址
            if($res){//有收货地址，查找到带有收货信息的订单信息
                $info=$model->orderDetail1($oid);
            }else{//没有收货地址查找到没有收货信息的订单信息
                $info=$model->orderDetail2($oid);
            }

        }else{
            $info=$model->orderDetail1($oid);
        }

        $totalprice=0;
        foreach($goods as $k=>$v){//获得单个商品的总价以及所有商品的总价
            $goods[$k]['total']=$v['price']*$v['buynum'];
            $totalprice+=$goods[$k]['total'];
        }
        $this->assign('status',$status);
        $this->assign("oid",$oid);
        $this->assign('totalprice',$totalprice);
        $this->assign('info',$info);
        $this->assign('goods',$goods);
        $this->display();
    }
    public function selectAddr(){
        $mid=session('ybc_id');
        if(isset($_GET['new']) && $_GET['new']){
            $this->assign('new',I('get.new'));
        }
        $oid=I('get.oid');
        $def['def']=array("neq","2");
        $addrInfo=M('member_address')->where(array('mid'=>$mid))->where($def)->order('def desc,id')->select();
        foreach($addrInfo as $k=>$v){
            $province=$v['province'];
            $city=$v['city'];
            $town=$v['town'];
            if($province=="北京市" || $province=="天津市" || $province=="上海市" || $province=="重庆市"){
                $addrInfo[$k]['address']=$city.$town.$v['address'];
            }else{
                $addrInfo[$k]['address']=$province.$city.$town.$v['address'];
            }
        }

        $this->assign('oid',$oid);
        $this->assign('empty',"<tr><td colspan='5' style='color: red'>暂无收货地址信息</td></tr>");
        $this->assign('addrInfo',$addrInfo);
        $this->display('addrList');
    }
    public function xzdz(){
        $aid=I('get.aid');
        $oid=I('get.oid');
        M('order')->where(array('id'=>$oid))->save(array('address_id'=>$aid));
        if(isset($_GET['new']) && $_GET['new']){
            $this->redirect('./Home/Order/newOrder?id='.$oid);
        }else{
            $this->redirect('./Home/Order/order?oid='.$oid);
        }
    }
    public function addAddr(){
        $this->display('addAddr');
    }
    public function addA(){
        $add=M('member_address');
        $addrInfo=$add->create();
        $addrInfo['mid']=session('ybc_id');

        if($add->add($addrInfo)){
            $this->success('添加收货地址成功');
        }else{
            $this->error('添加收货地址失败');
        }

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

    public function paySuccess(){
        if(!I('get.oid')){
            $this->redirect('index');
        }
        $oid=I('get.oid');
        $order=M('order')->where(array('id'=>$oid))->find();
        $this->assign('order',$order);
        $this->display("paySuccess");
    }
    public function test(){
        if(IS_AJAX){
            /*$mail = new MySendMail();
            $mail->setServer("smtp.qq.com", "979199855@qq.com", "wqkofmgkkpnpbdbc");
            $mail->setFrom("979199855@qq.com");
            $mail->setReceiver("898448144@qq.com");
            //$mail->setReceiver("XXXXX@XXXXX");
            $mail->setCc("898448144@qq.com");
            $mail->setBcc("781075774@qq.com");
            $mail->setMailInfo("test", "<b>test</b>");
            $res=$mail->sendMail();
            if($res){
                $this->success();
            }else{
                $this->error($mail->error());
            }*/
            /*$mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->CharSet='UTF-8';
            $mail->SMTPAuth = true;
            $mail->Port = 25;
            $mail->Host = "smtp.163.com";//邮箱smtp地址，此处以163为例
            $mail->Username = "979199855@qq.com";//你的邮箱账号
            $mail->Password = "43426fuxy.";//你的邮箱密码
            $mail->From = "979199855@qq.com";//你的邮箱账号
            $mail->FromName = get_option('blogname');
            $to = "898448144@qq.com";//收件人
            $mail->AddAddress($to);
            $mail->Subject = "test";//主题
            $mail->Body = "testtesteteeeeeeeeeeeeeeeeeeeeeeeeeeeeee";//正文
            $mail->WordWrap = 80;
//$mail->AddAttachment("f:/test.png"); //可以添加附件
            $mail->IsHTML(true);
            $mail->Send();*/

            $file_name   = "成绩单-".date("Y-m-d H:i:s",time());
            $file_suffix = "xls";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=$file_name.$file_suffix");
            //根据业务，自己进行模板赋值。
            $this->display("excel");


        }
        $res=M('goods')->where(array('id'=>29))->find();
        $str=htmlspecialchars_decode($res['detail']);
        $this->assign('detail',$str);
        $this->display();
    }

    /**
     * 导出文件
     * @return string
     */
    public function export()
    {
        $file_name   = "成绩单-".date("Y-m-d H:i:s",time());
        $file_suffix = "xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file_name.$file_suffix");
        //根据业务，自己进行模板赋值。
        $this->display('excel');
    }
    public function myOrderList(){
        if(isset($_GET['status'])){
            $status=I('get.status');
            $condition['orderstatus']=$status;
            $this->assign('status',$status);
        }else{
            $condition='';
        }
        $model=D("Order");
        $arr=$model->getList($condition);
        $this->assign('orderList',$arr['orderList']);
        $this->assign('page',$arr['show']);
        $this->display();
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
                    echo "订单已删除";
                }
                $this->error("生成订单失败");
            }
        }else{
            $this->error("生成订单失败");
        }
    }

    public function newOrder(){
        $oid=I('get.id');
        if(!$oid){
            $this->redirect('index');
        }
        $model=D("Order");
        $goods=$model->orderGoods($oid);
        $status=$model->chkStatus($oid);
        if($status==1){
            $res=$model->chkAddress(session('ybc_id'));//判断用户是否有收获地址
            if($res){//有收货地址，查找到带有收货信息的订单信息

                $info=$model->orderDetail1($oid);
            }else{//没有收货地址查找到没有收货信息的订单信息

                $info=$model->orderDetail2($oid);
            }
        }else{
            $info=$model->orderDetail1($oid);
        }

        $totalprice=0;
        foreach($goods as $k=>$v){//获得单个商品的总价以及所有商品的总价
            $goods[$k]['total']=$v['price']*$v['buynum'];
            $totalprice+=$goods[$k]['total'];
        }
        $this->assign('status',$status);
        $this->assign("oid",$oid);
        $this->assign('totalprice',$totalprice);
        $this->assign('info',$info);
        $this->assign('goods',$goods);
        $this->display();
    }

    public function myAddress(){
        if(isset($_GET['ac']) && $_GET['ac']=='c'){
            $aid=$_GET['ai'];
            $address=M("member_address")->where(array('id'=>$aid))->find();
            $this->assign('ac','c');
            $this->assign('ai',$aid);
            $this->assign('address',$address);
        }

        $am=M('member_address');
        $def['def']=array('neq','2');
        $def['mid']=session('ybc_id');
        $addrList=$am->where($def)->order("def desc")->select();
        foreach($addrList as $k=>$v){
            $province=$v['province'];
            $city=$v['city'];
            $town=$v['town'];
            if($province=="北京市" || $province=="天津市" || $province=="上海市" || $province=="重庆市"){
                $addrList[$k]['address']=$city.$town.$v['address'];
            }else{
                $addrList[$k]['address']=$province.$city.$town.$v['address'];
            }
        }
        $this->assign('addrList',$addrList);
        $this->display();
    }
    public function chaA(){
        $cha=M('member_address');
        $addrInfo=$cha->create();

        if($cha->save($addrInfo)){
            $this->success('添加收货地址成功');
        }else{
            $this->error('添加收货地址失败');
        }
    }

    public function delA(){
        $id=I('post.id');
        $res=M("member_address")->where(array('id'=>$id))->delete();
        if($res){
            $this->success("已删除");
        }else{
            $this->success("删除失败");
        }
    }
    public function defA(){
        $ma=M('member_address');
        $condition['mid']=session("ybc_id");
        $condition['def']='1';
        $data1['def']='0';
        $res=$ma->where($condition)->save($data1);//取消原来的默认地址

        $id=I('post.id');
        $data['id']=$id;
        $data['def']=1;

        $res=$ma->save($data);//设置新的默认地址
        if($res){
            $this->success("设置默认地址成功");
        }else{
            $this->success("设置默认地址失败");
        }
    }

    public function delOrder(){
        $oid=I("post.id");
        $res=D('Order')->where(array('id'=>$oid))->delete();
        if($res){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

    public function chkOrders(){//登录时检测所有代付款订单,将失效订单状态改为失效
        $model=D('Order');
        $timeArr=$model->getTimeArr();//获取所有未付款订单的创建时间
        foreach($timeArr as $v){
            $goodsTimeArr=$model->getGoodsTimeArr($v['id']);//获取订单里所有商品的修改时间（二维数组）
            if($goodsTimeArr){
                foreach($goodsTimeArr as $val){
                    if($val['changetime']){
                        if($val['changetime']>=$v['addtime']){
                            $model->changeStatus($v['id'],0);//将订单状态修改为失效
                        }
                    }
                }
            }
        }
    }

    public function history(){
        $time=strtotime("-1 week");//一个星期前的时间戳
        $model=D("Order");
        $history=$model->getHistory();
        $this->assign('history',$history);
        $this->assign('time',$time);
        $this->display();
    }

    public function erGoods(){
        if(isset($_GET['hid']) && $_GET['hid']){
            if(isset($_GET['type']) && $_GET['type']){
                $type=I('get.type');
                $hid=I('get.hid');
                $hInfo=M('history')->where(array('id'=>$hid))->find();
                $this->assign('hInfo',$hInfo);
                $this->assign('type',$type);
                $this->assign('hid',$hid);
                $this->display();
            }else{
                $this->redirect('index');
            }
        }else{
            $this->redirect('index');
        }
    }

    public function chkHis(){
        $where['hid']=I('post.id');
        $res=M('services')->where($where)->find();
        if(!$res){
            $this->success();
        }else{
            $this->error();
        }
    }

    public function uploadPic(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/servicePic/'; // 设置附件上传根目录
        $upload->autoSub  =     false;//关闭自动使用子目录保存上传文件 默认为true
        // 上传文件
        $info   =   $upload->upload();

        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功

            $lastSid=session("lastSid");
            $num=session("sPic");
            $pic="pic".$num;
            $data[$pic]=$info['file']['savename'];
            $data['id']=$lastSid;
            $res=M('services')->save($data);
            if($res){
                if($num<3){
                    $num++;
                    session('sPic',$num);
                    echo session("sPic")."sssssss";
                }
            }
        }
    }

    public function service(){
        if($this->chkHis1(I('post.hid'))){
            $ser=M('services');
            $data=$ser->create();
            $data['mid']=session("ybc_id");
            $data['applytime']=time();
            $lastSid=$ser->add($data);
            if($lastSid){
                session('lastSid',$lastSid);
                session("sPic",1);
                $this->success();
            }else{
                $this->error("提交失败");
            }
        }else{
            $this->error("该商品已经申请过售后了，不能再提交了");
        }
    }

    public function chkHis1($hid){
        $where['hid']=$hid;
        $res=M('services')->where($where)->find();
        if(!$res){
            return true;
        }else{
            return false;
        }
    }
    public function myServices(){
        $mid=session("ybc_id");
        $s=M('services');
        $where['s.mid']=$mid;
        $services=$s->alias('s')->join("ybc_history h on s.hid=h.id")->where($where)->field("s.id,goodsname,pic,price,buynum,applytime,type,status")->select();
        $this->assign('services',$services);
        $this->display();
    }

    public function cancelSer(){
        $data['id']=I('post.id');
        $data['status']=4;
        $res=M("services")->save($data);
        if($res){
            $this->success('已取消');
        }else{
            $this->error('取消失败');
        }
    }

    public function detail(){
        $sid=I('get.id');
        $info=M('services')->alias('s')->join("ybc_history h on s.hid=h.id")->join('ybc_member m on s.mid=m.id')->where(array('s.id'=>$sid))->find();
        $picList='';
        if($info['pic1']){
            $picList[]=$info['pic1'];
        }
        if($info['pic2']){
            $picList[]=$info['pic2'];
        }
        if($info['pic3']){
            $picList[]=$info['pic3'];
        }
        $this->assign('info',$info);
        $this->assign('sid',$sid);
        $this->assign('picList',$picList);
        $this->display();
    }

    public  function toComment(){
        $gid=I('post.gid');
        $res=M('goods')->where(array("id"=>$gid,"active"=>1))->find();
        if($res){

            $this->success();
        }else{
            $this->error("商品已下架");
        }
    }
}