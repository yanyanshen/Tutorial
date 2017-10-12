<?php
namespace Home\Model;
use Think\Model;
class AddressModel extends Model{
    public function address($arr){
        $res=M('address');
        $id= $res->add($arr);
        return $id;
    }
    public function showAdd(){
        $res=M('address');
        $where['mrid']=$_SESSION['Mr_home']['mrid'][0]['id'];
        $arr=$res->where($where)->select();
        return $arr;
    }
    public function del($id){
        $res=M('address');
        $where['id']=$id;
        $num=$res->where($where)->delete();
        return $num;
    }
    public function sel($id){
        $res=M('address');
        $where['id']=$id;
        $where['mrid']=$_SESSION['Mr_home']['mrid'];
        $arr=$res->where($where)->select();
        return $arr;
    }
}