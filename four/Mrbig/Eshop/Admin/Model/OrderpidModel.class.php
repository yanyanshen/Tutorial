<?php
namespace Admin\Model;
use Think\Model;
class OrderpidModel extends Model{
     //获取订单列表
    public function getAllOrderpid(){
        $res=M('address');
        $arr=$res->select();
        return $arr;
    }

    //根据订单ID查找订单信息
    public function getOneOrder($id){
        $obj=M('orderdetail');
        return $obj->where(array('id'=>$id))->find();
    }
    //查找商品信息
    public function getOrderById($id){
        $obj=M('orderpid');
        return $obj->where(array('oid'=>$id))->select();
    }
    //根据用户id查找用户信息
    public function getUserByid($id){
        $obj=M('user');
        return $obj->where(array('id'=>$id))->find();
    }
    //根据地址id查找地址信息
    public function getAddressById($id){
        $obj=M('address');
        return $obj->where(array('id'=>$id))->find();
    }
    //根据状态查找状态信息
    public function getStutasById($id){
        $obj=M('orderstatus');
        return $obj->where(array('id'=>$id))->find();
    }
    //删除订单
    public function delOrder($id){
        $obj=M('orderpid');
        return $obj->delete($id);
    }

}