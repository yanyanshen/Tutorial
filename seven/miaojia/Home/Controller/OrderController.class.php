<?php
namespace Home\Controller;
use Home\Model\AddressModel;
use Home\Model\CartModel;
use Home\Model\OrderModel;
use Home\Model\UserModel;
use Think\Controller;
class OrderController extends Controller{
    public function _initialize(){
        if(!session('uid')){
            $this->error('您尚未登录!',U('User/login'));
        }
    }
    public function affirm(){
        $uid=session('uid');
        $obj=new AddressModel();
        $cart=new CartModel();
        $cartList=$cart->getAllCartByUid(session('uid'));
        $address=$obj->affirm($uid);
        foreach($cartList as $k=>$v){
            $cartList[0]['prices']+=$v['buynum']*$v['goods']['siteprice'];
        }
        $cartCount=count($cart->getAllCartByUid(session('uid')));
        $this->assign('cartCount',$cartCount);
        $this->assign('address',$address);
        $this->assign('cartList',$cartList);
        $this->display();
    }

    //添加购物车订单信息到数据库
    public function addCartToOrder(){
        $order['ordersyn']=uniqid().mt_rand(10,99);
        $order['uid']=session('uid');
        $order['createtime']=time();
        $order['orderstatus']=1;
        $order['address']=I('address');
        $cart=new CartModel();
        $cartList=$cart->getAllCartByUid(session('uid'));
        if(count($cartList)>0){
            foreach($cartList as $k=>$v){
                $order['prices']+=$v['buynum']*$v['goods']['siteprice'];
            }
            $orderobj=new OrderModel();
            if($orderobj->addCartToOrder($order)){
                echo "订单生成成功";
            }else{
                echo "订单生成失败";
            }
        }else{
            echo "订单中没有商品!";
        }
    }

    //付款并更新订单状态,写入用户积分
    public function payOver(){
        $username=session('username');
        $user=new UserModel();
        $userInfo=$user->meminfo($username);
        $ordersyn=I('ordersyn');
        $order=new OrderModel();
        $orderinfo=$order->getOrderByOrdersyn($ordersyn);
        if($userInfo['money']>=$orderinfo['prices']){
            echo $order->updateOrderInfo($ordersyn);
        }else{
            echo "可用余额不足!";
        }
    }
}