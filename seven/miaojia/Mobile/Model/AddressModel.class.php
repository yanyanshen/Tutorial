<?php
namespace Mobile\Model;
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

    //根据ID查找地址
    public function getAddressById($id){
        $obj=M('address');
        $res=$obj->where(array('id'=>$id))->find();
        $str='收货地址:'.$res['address'].',收货人:'.$res['name'].',联系电话:'.$res['tel'];
        return $str;
    }
}