<?php
namespace Mobile\Controller;
use Mobile\Common\Controller\BgController;
class IntegralOrderController extends BgController{
    public function integralOrder(){
        //获取订单信息
        $id=I('get.id');
        $orders=M('Orderintegral');
        $orderInfo=$orders->alias('o')
            ->join("ybc_order_status_integral s ON o.orderstatus=s.id")
            ->field(array(
                "o.orderstatus"=>'orderstatus',
                "o.id"=>"id",
                's.status'=>'status',
                'o.ordersyn'=>'ordersyn',
                'o.addtime'=>'addtime',
                "o.orderpoints"=>"orderpoints",
                "o.mid"=>'mid',
                "s.mnext"=>'mnext'
            ))
            ->where(array('o.id'=>$id))
            ->find();
        //获取订单商品信息
        $oid=$orderInfo['id'];
        $goods=M('order_goods_integral');
        $goodsInfo=$goods->alias('g')
            ->join("ybc_goods_integral i ON g.gid=i.id")
            ->field(array(
                "i.pic"=>"pic",
                "i.goodsname"=>'goodsname',
                "i.price"=>'price',
                "i.points"=>'points',
                'g.gid'=>'id'
            ))
            ->where(array('g.id'=>$oid))
            ->find();
       $user=M('member_address');
        $mid=$orderInfo['mid'];
        //获取收货人信息
        if($aid=I('get.aid')){
            $where['id']=$aid;
            $userInfo=$user->where($where)->find();
            $data['address_id']=$aid;
            $addid=M('Orderintegral')->where(array('id'=>$oid))->save($data);
        }else{
            $where['mid']=$mid;
            $where['def']='1';
            $userInfo=$user->where($where)->find();
            $a=M('orderintegral')->where(array('id'=>$oid))->save(array('address_id'=>$userInfo['id']));
        }
        $this->assign('oid',$oid);
        $this->assign('orderInfo',$orderInfo);
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('userInfo',$userInfo);
        $this->display();
    }
    public function lookorder(){
        //获取订单信息
        $id=I('get.id');
        $orders=M('Orderintegral');
        $orderInfo=$orders->alias('o')
            ->join("ybc_order_status_integral s ON o.orderstatus=s.id")
            ->field(array(
                "o.orderstatus"=>'orderstatus',
                "o.id"=>"id",
                's.status'=>'status',
                'o.ordersyn'=>'ordersyn',
                'o.addtime'=>'addtime',
                "o.orderpoints"=>"orderpoints",
                "o.mid"=>'mid',
                "s.mnext"=>'mnext'
            ))
            ->where(array('o.id'=>$id))
            ->find();
        //获取订单商品信息
        $oid=$orderInfo['id'];
        $goods=M('order_goods_integral');
        $goodsInfo=$goods->alias('g')
            ->join("ybc_goods_integral i ON g.gid=i.id")
            ->field(array(
                "i.pic"=>"pic",
                "i.goodsname"=>'goodsname',
                "i.price"=>'price',
                "i.points"=>'points',
                'g.gid'=>'id'
            ))
            ->where(array('g.id'=>$oid))
            ->find();
        $user=M('member_address');
        $mid=$orderInfo['mid'];
        $aid=M('orderintegral')->where(array('id'=>$id))->field('address_id')->find();
        //获取收货人信息
        if($aid['address_id']){
            $where['id']=$aid['address_id'];
            $userInfo=$user->where($where)->find();
        }else{
            $where['mid']=$mid;
            $where['def']='1';
            $userInfo=$user->where($where)->find();
        }
        $this->assign('oid',$oid);
        $this->assign('orderInfo',$orderInfo);
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('userInfo',$userInfo);
        $this->display('integralOrder');
    }
    public function createOrder(){
        if(IS_POST){
            //将订单信息写入订单表
            $mid=session('ybc_id');
            $gid=I('post.gid');
            $order['ordersyn']=date('YmdHis');
            $order['mid']=$mid;
            $order['addtime']=time();
            $points=M('goods_integral')->where(array('id'=>$gid))->field('points')->find();
            $order['orderpoints']=$points['points'];
            $id=M('Orderintegral')->add($order);
            //将商品信息写入订单商品表
            $data['oid']=$id;
            $data['gid']=$gid;
            $goodsid=M('order_goods_integral')->add($data);
            if($goodsid){
                $this->success('订单生成成功',U('IntegralOrder/integralOrder?id='.$id));
            }else{
                $this->error('订单生成失败');
            }
        }
    }
    public function selectAddr(){
        $mid=session('ybc_id');
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
        $this->assign('addrInfo',$addrInfo);
        $this->display('integralAddrList');
    }
    public function integralAddAddr(){
        $this->display('integralAddAddr');
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
    public function submit(){
        //点击支付订单时，把member表中该用户的积分减少订单积分,同时订单状态该为待发货
        $oid=I('post.id');
        $adr=M('orderintegral');
        $adrs=$adr->where(array('id'=>$oid))->field('address_id')->find();
        if($adrs['address_id']){
            $order=M('Orderintegral');
            $pointsInfo=$order->where(array('id'=>$oid))->field('mid,orderpoints')->find();
            $points=$pointsInfo['orderpoints'];
            $mid=$pointsInfo['mid'];
            $model=M('member');
            $userpoints=$model->where(array('id'=>$mid))->field('points')->find();
            $point=$userpoints['points'];
            $data1['orderstatus']=2;
            $status=$order->where(array('id'=>$oid))->save($data1);
            $data['points']=$point-$points;
            $user=$model->where(array('id'=>$mid))->save($data);
            if($status && $user){
                    $this->success('支付成功');
            }else{
                $this->error('支付失败');
            }
        }else{
            $this->error('请选择收货地址');
        }
    }
    public function integralPaySuccess(){
        if(!I('get.oid')){
            $this->redirect('index');
        }
        $oid=I('get.oid');
        $order=M('Orderintegral')->where(array('id'=>$oid))->find();
        $this->assign('order',$order);
        $this->display("integralPaySuccess");
    }
    public function cancelOrder(){
        $oid=I('post.oid');
        $model=M('Orderintegral');
        $gid=M('order_goods_integral')->where(array('id'=>$oid))->getField('gid');
        $del=$model->where(array('id'=>$oid))->delete();
        $goodsorder=M('order_goods_integral');
        $goodsid=$goodsorder->where(array('oid'=>$oid))->delete();
        if($del && $goodsid){
            $this->success('取消成功',U("IntegralDetail/integralDetail?id=".$gid));
        }else{
            $this->error('取消失败',U("IntegralOrder/integralOrder?id=".$oid));
        }
    }
}