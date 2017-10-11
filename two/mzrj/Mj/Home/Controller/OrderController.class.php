<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller{

    public function _initialize(){
        if(session('mid')<1){
            $this->redirect('Index/index');
        }
    }

    public function index(){
       // print_r($_SESSION);
//        print_r(I('post.'));
        $money=I('post.money');
        $orderlist['mid']=session('mid');
        $orderlist['ordersyn']=date('Y-m-d',time()).substr($this->uniqStr(),0,16);
        $orderlist['order_createtime']=time();
        $orderlist['money']=$money;
        $order=M('Order');
      $orderid=$order->add($orderlist);


         $arr=I('post.newslist');
        $goods=M('Goods');
        foreach($arr as $k=>$v){
            $a='number'.$v;
            $num=I('post.'.$a);

            $list[$v]=$goods->where("id=$v")->select();
            $list[$v][0]['buynum']=$num;
            $list[$v][0]['orderid']=$orderid;
            $list[$v][0]['gid']=$v;
            $ordergoods[]=$list[$v][0];
           unset($_SESSION['mycar_'][$v]);

        }
        $order_goods=M('Order_goods');
        foreach($ordergoods as $key=>$v){
            $data['orderid']=$v['orderid'];
            $data['gid']=$v['gid'];
            $data['buynum']=$v['buynum'];
            $data['totaprice']=$v['price'];
            $order_goods->add($data);

        }
//        print_r($list);
        //地址添加
      $addresslist=M("Address")->where(array('mid'=> session('mid')))->order('id desc')->find();
        $this->assign('addresslist',$addresslist);

        $this->assign('syn',$orderlist['ordersyn']);
        $this->assign('orderid',$orderid);
        $this->assign('ordertime',$orderlist['order_createtime']);
        $this->assign('money',$money);
        $this->assign('goods',$list);
        $this->display('affirm');
    }
    public function search(){
      $this->display('search');
}


    public function tijiao(){
        $orderid=I('get.orderid');
        $order=M('Order');
        $orderlist=$order->where("oid=$orderid")->find();
        $order->where("oid=$orderid")->save(array("status"=>20));
        $this->assign('orderlist',$orderlist);
        $this->display('order');
    }

    function uniqStr(){
        return md5(uniqid(microtime(true)));
    }

}