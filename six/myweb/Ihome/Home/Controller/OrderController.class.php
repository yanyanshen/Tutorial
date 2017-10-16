<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller{

    public function submitOrder(){
        foreach($_POST['buythis'] as $k=>$v){
            $goods[$k]['id']=$v;
            $goodsList[$k]=M('Goods')->where(array('gid'=>$v))->find();
            $goodsList[$k]['buynum']=$_POST[$v];
        }
        //生成订单
        if(IS_POST){
            foreach($goodsList as $k=>$v){
                $data[$k]['ordersyn']=date("Y-m-d",time()).md5(mt_rand(99,9999));
                $data[$k]['mid']=$_SESSION['mid'];
                $data[$k]['gid']=$v['gid'];
                $data[$k]['createtime']=time();
                $data[$k]['buynum']=$v['buynum'];
                $data[$k]['prices']=$v['buynum']*$v['price'];
                $data[$k]['adressid']=$_POST['adressid'];
                $order=M("Order");
                $res=$order->add($data[$k]);
            }
            if($res){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'提交成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'提交失败'));
            }
        }
        $this->display('Member/order');
    }
}