<?php
namespace Mobile\Controller;
use Think\Controller;
use Mobile\Model\OrderModel;
class OrderController extends Controller{
    public function order(){
        $obj=new OrderModel();
        $orderlist=$obj->orderList(I('status'),I('post.ordersyn'));
        $this->assign("orderlist",$orderlist);
        if(IS_AJAX){
            $this->display("result");
        }else{
            $this->display();
        }
    }

    //订单支付页面
    public function pay(){
        $orderinfo=M('order')->where(array('id'=>I('get.oid')))->find();
        $this->assign("orderinfo",$orderinfo);
        $this->display();
    }
    //支付
    public function subpay(){
        $obj=new OrderModel();
        $rel=$obj->pay(I('post.ordersyn'));
        if($rel==0){
            $this->success('支付成功！');
        }elseif($rel==1){
            $this->error("余额不足，请用其他方式支付");
        }else{
            $this->error("支付失败，请稍候再试");
        }
    }




    //确认收货
    public function sure(){
        $id=I('post.id');
        $date['orderstatus']=4;
        $rel=M('order')->where(array('id'=>$id))->save($date);
        $this->ajaxReturn($rel);
    }
}


?>