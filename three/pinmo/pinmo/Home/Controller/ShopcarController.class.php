<?php
namespace Home\Controller;
use Think\Controller;
class ShopcarController extends CommonController{
    public function addcar(){
        $userid=session('mid');
        /*$carinfo=M('car')->where($user)->select();
        $a['id']=$carinfo['goodsid'];
        $b=M('goods')->where($a)->find();
        $b['num']=$carinfo['num'];
        if($carinfo){
            foreach($carinfo as $val){
                $_SESSION[$val['mid']][$val['goodsid']]=$b;
            }
        }*/
        if(IS_POST){
            if(!$userid){
                $this->ajaxReturn(array('status'=>'nologin','msg'=>'用户未登录，请登录后在添加购物车'));
            }else{
                $data=I('post.');

                $data['mid']=$userid;
                $goodsid['id']=$data['goodsid'];
                $goods=M('goods')->where($goodsid)->find();  //判断商品是否存在
                if($goods){
                    $mid=$data['mid'];//用户id
                    $id=$data['goodsid'];//商品id
                    //$goods['num']=$data['goodsnum'];
                    if(empty($_SESSION['m'.$mid]['g'.$id])){
                        $goods['num']=$data['goodsnum'];
                        $_SESSION['m'.$mid]['g'.$id]=$goods;
                    }else{
                        $_SESSION['m'.$mid]['g'.$id]['num']+=$data['goodsnum'];
                    }
                    //dump( $_SESSION['m'.$mid]);
                    if(!empty($_SESSION['m'.$mid]['g'.$id])){
                        $this->ajaxReturn(array('status'=>'ok','msg'=>'添加购物车成功'));
                    }
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'该商品不存在，请核对后进行操作'));
                }

            }

        }else{
            $car=$_SESSION['m'.$userid];
            $this->assign('empty','<div class="empty_cart mb10">
				<div class="message">
					<p>购物车内暂时没有商品，您可以去首页挑选喜欢的商品</p>
				</div>
			</div>');
            $this->assign('carinfo',$car);
            $this->display();
        }

    }
    public function playorder(){

            $mid=session('mid');
        if(IS_POST){
            $num=I('post.chk');
            if(!$num){
                $this->ajaxReturn(array('status'=>'error','msg'=>'订单不能为空，请添加商品后下单！'));
            }
            $info['mid']=$mid;
            $info['creatime']=time();
            $info['ordernum']=date("Y-m-d",time()).substr(md5(time()),0,16);
            $data=I('post.');
            //dump($data);

            $info['prices']=$data['prices'];

            $orderid=M('order')->add($info);
            session('order',$orderid);
            if($orderid>0){
                foreach($data['chk'] as $k=>$v){
                    $goodsord['goodsid']=$v;
                    $goodsord['goodspic']=$data['pic'][$k];
                    $goodsord['goodsnum']=$data['buynum'.$v];
                    $goodsord['orderid']=$orderid;
                    if(M('ordergoods')->add($goodsord)){
                        $id='g'.$v;
                        //dump($id);
                        $userid=$info['mid'];
                        $session=$_SESSION['m'.$userid];
                        $_SESSION['m'.$userid]=array();
                        foreach($session as $k=>$v1){
                            if($k==$id){
                                unset($v1);
                            }else{
                                $_SESSION['m'.$userid][$k]=$v1;

                            }
//dump($_SESSION['m'.$userid]);
                        }
                    }
                }$this->ajaxReturn(array('status'=>'ok','msg'=>'下单成功，去结算吧！'));
            }
            $this->ajaxReturn(array('status'=>'error','msg'=>'下单失败，请重新下单！'));
        }
        //获取用户的收货地址
        $address['uid']=$mid;
        $addr=M('address')->where($address)->select();
//获取订单的相关信息
        $orderid=session('order');
        $order['mid']=$mid;
        $order['status']=1;
        $Model = new \Think\Model() ;// 实例化一个model对象 没有对应任何数据表
        $orderinfo=$Model->query("select * from __ORDER__ as o,__GOODS__ as g,__ORDERGOODS__ as s where g.id=s.goodsid and s.orderid=o.id and  o.id='$orderid'");
        $this->assign('address',$addr);

        $this->assign('orderinfo',$orderinfo);
//dump($orderinfo);
        $this->display();
    }


//删除购物车商品
    public function del(){
        $id=I('post.id');
        $userid=session('mid');
        $mid='m'.$userid;
        $gid='g'.$id;
        unset($_SESSION[$mid][$gid]);
        if($_SESSION[$mid][$gid]){
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败！'));
        }else{
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功！'));
        }
    }
   //确认收货地址并付款
    public function pay(){
        $res=I('post.');

        $addre=$res['add'];
        if(!$addre){
            $this->ajaxReturn(array('status'=>'error','msg'=>'收货地址不能为空，请添加收货地址后下单！'));
        }
        $order['ordernum']=$res['ordernum'];
        $data['address']=$res['add'];
        $data['status']=2;
        $a=M('order')->where($order)->save($data);
        foreach($res['chk'] as $k=>$val){
            $good['id']=$val;
            $goodsid=$val;
            $goods['salenum']=$res["buynum$goodsid"];
            $goodsinfo=M('goods')->where($good)->find();
            $goods['salenum']+=$goodsinfo['salenum'];
            M('goods')->where($good)->save($goods);
            // dump($good);
            //dump($goods);
        }
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'支付成功！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'支付失败，请重新支付！'));
        }

    }
    //个人中心支付
   /* public function justpay(){
        $order['id']=I('post.id');
        $data['status']=2;
        $a=M('order')->where($order)->save($data);
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'支付成功！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'支付失败，请重新支付！'));
        }

    }*/
    //签收
    public function sign(){
        $order['id']=I('post.id');
        $data['status']=4;
        $a=M('order')->where($order)->save($data);
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'已签收！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'操作失败，请重新签收！'));
        }

    }
    //退货
    public function back(){
        $order['id']=I('post.id');
        $data['status']=6;
        $a=M('order')->where($order)->save($data);
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'申请成功！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'退货失败'));
        }

    }
   //取消订单
    public function delorder(){
       $order=I('post.ordernum');
        $data['orderid']=M('order')->where("ordernum='$order'")->getField('id');
        $a=M('order')->where("ordernum='$order'")->delete();
        $b=M('ordergoods')->where($data)->delete();
        if($a>0 && $b>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功，返回首页继续购物吧！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'操作失败，请重新删除！'));
        }
    }
    //订单完成页面
    public function orderend(){

        $mid=session('mid');
        $b=count($_SESSION['m'.$mid]);
        $this->assign('num',$b);
        $this->display();
    }
    //商品评价
    public function discuss(){
        $order=I('post.');
        $count=count($order)/2;
        for($i=1;$i<=$count;$i++){
            $arr[$i]['goodsid']=$order["goodsid$i"];
            $arr[$i]['msg']=$order["msg$i"];
        }
        $data['status']=5;
        $orderid['id']=I('post.id');

foreach($arr as $goods) {
    $discuss['goodsid'] = $goods['goodsid'];
    $discuss['msg'] = $goods['msg'];
    $discuss['creatime'] = time();
    $discuss['mid'] = session('mid');
    //$data['orderid']=M('order')->where($order)->getField('id');
    $b = M('discuss')->add($discuss);
}
        $a=M('order')->where($orderid)->save($data);
        //$b=M('order')->where($order)->delete();
        if($a>0 & $b>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'评价成功！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'操作失败，评价！'));
        }
    }

}