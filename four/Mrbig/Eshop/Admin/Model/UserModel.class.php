<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    //获取会员列表
    public function getAllUser($username='',$firstRow='',$listRows=''){
        $obj=M('user');
        if($username==''){
            return $obj->order('id desc')->limit($firstRow,$listRows)->select();
        }else{
            $data['username']=array('like','%'.$username.'%');
            return $obj->where($data)->order('id desc')->limit($firstRow,$listRows)->select();
        }
    }
    //根据ID查找会员
    public function getUserById($id){
        $obj=M('user');
        return $obj->where(array('id'=>$id))->find();
    }
    //删除会员
    public function delUser($id){
        $obj=M('user');
        return $obj->delete($id);
    }
}