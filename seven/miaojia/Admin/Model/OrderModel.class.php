<?php
namespace Admin\Model;
use Think\Model;
class OrderModel extends Model{
    public function getAllOrder($data,$firstRow='',$listRows=''){
        $obj=M('order');
        if($data['orderstatus']!=0){
            return $obj->where($data)->order('createtime desc')->limit($firstRow,$listRows)->select();
        }else{
            return $obj->order('createtime desc')->limit($firstRow,$listRows)->select();
        }
    }

    //根据订单ID查找订单信息
    public function getOrderById($id){
        $obj=M('order');
        return $obj->where(array('id'=>$id))->find();
    }

    //保存发货信息
    public function saveLogistics($data){
        $obj=M('order');
        $data['orderstatus']=3;
        $data['sendtime']=time();
        if($obj->create($data)){
            return $obj->save();
        }else{
            return false;
        }
    }

    //删除订单
    public function delOrder($id){
        $obj=M('order');
        return $obj->delete($id);
    }
}