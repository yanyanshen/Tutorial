<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller{
    public function _initialize(){
        if(session('aid')<1){
            $this->redirect('Admin/index');

        }
    }
    public function order(){
        $order=M('order');
        $count=$order->count();
        $Page = new \Think\Page($count,5);
        $show=$Page->show();
        $orderList=$order->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach($orderList as $k=>$val1){
            $id=$val1['id'];
            $Model = new \Think\Model();// 实例化一个model对象 没有对应任何数据表
            $orderList[$k]['temp']=$Model->query("select * from __ORDER__ as o,__GOODS__ as g,__ORDERGOODS__ as s ,__ADDRESS__ as r ,__USER__ as u where u.id=o.mid and r.id=o.address and g.id=s.goodsid and s.orderid=o.id and  o.id='$id'");
        }
        //dump($orderList);
        $map['key']=I('get.key');
        foreach($map as $key=>$val) {
            $Page->parameter[$key]   =   urlencode($val);
        }
        $this->assign("order",$orderList);
        $this->assign("page",$show);
        $this->assign("firstRow",$Page->firstRow);
        $this->display();
    }
    //取消订单
    public function delorder(){
        $order['id']=I('post.id');
        $data['status']=8;
        //$data['orderid']=M('order')->where($order)->getField('id');
        $a=M('order')->where($order)->save($data);
        //$b=M('order')->where($order)->delete();
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'操作失败，请重新删除！'));
        }
    }
    //发货
    public function gogoods(){
        $order['id']=I('post.id');
        $data['status']=3;
        //$data['orderid']=M('order')->where($order)->getField('id');
        $a=M('order')->where($order)->save($data);
        //$b=M('order')->where($data)->delete();
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'发货成功！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'操作失败，请重新发货！'));
        }
    }
    //同意退货
    public function agree(){
        $order['id']=I('post.id');
        $data['status']=7;
        //$data['orderid']=M('order')->where($order)->getField('id');
        $a=M('order')->where($order)->save($data);
        //$b=M('order')->where($data)->delete();
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'退货成功！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'操作失败！'));
        }
    }
}