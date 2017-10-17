<?php
namespace Home\Model;
use Think\Model;
class AddressModel extends Model{
    public function affirm($uid){
        $obj=M('address');
        return $obj->where(array('uid'=>$uid))->select();
    }
    //设为默认地址
    public function setDefaultAddress($data){

    }
    //删除收货地址
    public function delAddress($data){
        $obj=M('address');
        return $obj->where($data)->delete();
    }
}