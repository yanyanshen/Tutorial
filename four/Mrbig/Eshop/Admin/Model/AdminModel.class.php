<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{

    public function saveAdmin($data){
        $obj = M('Admin');
        $data['ctime']=time();
        if ($obj->create($data)) {
            return $obj->add();
        } else {
            return null;
        }
    }
    //根据ID查找管理员
    public function getAdminById($id){
        $obj=M('admin');
        return $obj->where(array('id'=>$id))->find();
    }


    //更新编辑的管理员到数据库
    public function editSave($data){
        $obj=D('admin');
        $admin=$obj->where(array('id'=>$data['id']))->find();
        if(!$data['password']){
            $data['password']=$admin['password'];
        }
        if($obj->create($data)){
            return $obj->save();
        }
    }
    //删除管理员
    public function delAdmin($data){
        $obj=M('admin');
        return $obj->where($data)->delete();
    }
    public function delAdmins($id){
        $obj=M('admin');
        return $obj->where(array('id'=>$id))->delete();
    }


    public function getAllAdmin($adminsearch='',$firstRow='',$listRows=''){
        $obj=M('admin');
        if($adminsearch==''){
            return $obj->order('create_time desc')->limit($firstRow,$listRows)->select();
        }else{
            $map['name']=array('like','%'.$adminsearch['name'].'%');
            return $obj->where($map)->order('id')->limit($firstRow,$listRows)->select();
        }
    }
}