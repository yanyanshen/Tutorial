<?php
namespace Home\Model;
use Think\Model;
class OrderModel extends Model{
    //生成订单，并写入订单表，订单商品表，删除对应的购物车信息
    public function addCartToOrder($data){
        $obj=M('order');
        if($obj->create($data)){
            $orderid=$obj->add();
            $cart=new CartModel();
            $cartList=$cart->getAllCartByUid(session('uid'));
            $ordergoodsobj=new OrdergoodsModel();
            foreach($cartList as $k=>$v){
                $ordergoods['orderid']=$orderid;
                $ordergoods['gid']=$v['gid'];
                $ordergoods['goodsargs']=$v['goodsargs'];
                $ordergoods['buynum']=$v['buynum'];
                $res=$ordergoodsobj->addToTable($ordergoods);
            }
            $cart->delCart(array('uid'=>session('uid')));
            return $res;
        }
    }

    //分条件查询对应用户订单
    public function getAllOrder($data,$firstRow='',$listRows=''){
        $obj=M('order');
        if($data['orderstatus']!=0){
            return $obj->where($data)->order('createtime desc')->limit($firstRow,$listRows)->select();
        }else{
            return $obj->where(array('uid'=>session('uid')))->order('createtime desc')->limit($firstRow,$listRows)->select();
        }
    }

    //根据订单号查询订单信息
    public function getOrderByOrdersyn($ordersyn){
        $obj=M('order');
        return $obj->where(array('ordersyn'=>$ordersyn))->find();
    }

    //根据订单号更新订单操作
    public function updateOrderStatus($ordersyn,$status){
        $obj=M('order');
        $obj->orderstatus=$status;
        return $obj->where(array('ordersyn'=>$ordersyn))->save();
    }

    //根据订单ID更新订单操作
    public function updateOrderStatusById($orderid,$status){
        $obj=M('order');
        $obj->orderstatus=$status;
        return $obj->where(array('id'=>$orderid))->save();
    }

    //更新订单状态,付款，写入用户积分
    public function updateOrderInfo($ordersyn){
        $obj=M('order');
        $obj->startTrans();
        $orderinfo=$this->getOrderByOrdersyn($ordersyn);
        $data['id']=session('uid');
        $data['orderprices']=$orderinfo['prices'];
        $user=new UserModel();
        $userinfo=$user->payOrder($data);
        if($userinfo){
            if($this->updateOrderStatus($ordersyn,2)){
                $obj->commit();
                return "订单支付完成";
            }else{
                $obj->rollback();
                return "状态异常，支付失败";
            }
        }
    }
}