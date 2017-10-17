<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
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

    //保存编辑的会员信息到数据库
    public function editSave($data){
        $obj=M('user');
        if($data['passwd']==''){
            $user=$this->getUserById($data['id']);
            $data['passwd']=$user['passwd'];
        }else{
            $data['passwd']=md5($data['passwd']);
        }
        if($obj->create($data)){
            return $obj->save();
        }
    }

    public function delUser($id){
        $obj=M('user');
        return $obj->delete($id);
    }
}