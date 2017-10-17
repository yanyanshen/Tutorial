<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\AddressModel;
use Home\Model\OrderModel;

class OrdersController extends Controller{

    //订单页面收货地址管理和商品遍历
    public function Orders(){
        $obj=new AddressModel();
        $obj1=new OrderModel();
        $goodsList=$obj1->goodsList(I('id'));
        $addressList=$obj->getAddressList();
        $this->assign("goodsList",$goodsList);
        $this->assign("addressList",$addressList);
        $this->display();
    }

    //删除收货地址
    public function delAddress(){
        $address=new AddressModel();
        $id=I("id");
        if($address->delAddress($id)){
            echo $this->success("删除成功");
        }else{
            echo $this->error("删除失败");
        }

    }
    //添加收货地址
    public function addAddress(){
        $address=new AddressModel();
        $date=$address->create();
        if($date) {
            $rel = $address->addAddress($date);
            if ($rel) {
                echo $this->success("添加成功");
            } else {
                echo $this->error("添加失败");
            }
        }else{
            echo $this->error("添加失败");
        }
    }
    //将根据id查询的数据返回给input里的value，
    public function updateAddress(){
        $obj=new AddressModel();
        $address=$obj->getAddress(I('id'));
        $this->ajaxReturn($address);
        //echo  json_encode($address);
    }

    //设置默认收货地址
    public function defaultAddress(){
        $obj=new AddressModel();
        $address=$obj->setDefaultAddress(I('id'));
        if($address===false){
            $this->error("设置失败");
        }else{
            $this->success("设置成功");
        }
    }

    public function ordersfinish(){
        $goodsinfo=M('goods')->order('createtime desc')->limit('0,10')->select();
        $this->assign("goodsinfo",$goodsinfo);
        $this->display();
    }
    //支付
    public function payorders(){
        $obj=new OrderModel();
        $pwd=I('pwd');
        $paypwd=$obj->pwd();
        if($paypwd==md5($pwd)){
            if($obj->money(I('post.'))){
                echo 0;
            }else{
                echo 1;
            }
        }else{
            echo 2;
        }

    }
    public function addorders(){
        $obj=new OrderModel();
        $date=I('post.');
        $rel=$obj->pay($date);
        if($rel!==false){
            echo $this->success("更新订单成功");
        }else{
            echo $this->error("更新订单失败");
        }
    }

    //判断是否设置了支付密码
    public function ispaypwd(){
        $rel=M('users')->where(array('id'=>session('uid')))->field('paypwd')->find();
        if($rel['paypwd']){
            $this->success('通过');
        }else{
            $this->error('请先设置支付密码');
        }
    }


    //订单消息提醒
    public function ordernews(){
        $where['id']=I('post.oid');
        $where['orderstatus']=2;
        $date['tx']=1;
        $rel=M('order')->where($where)->save($date);
        if($rel){
            $this->success('提醒发货成功');
        }else{
            $this->error('买家已经收到了你的提醒');
        }
    }


}