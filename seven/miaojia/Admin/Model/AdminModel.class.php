<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    protected $_validate=array(
        array('username','require','用户名不能为空'),
        array('username','','用户名已存在!',0,'unique',1)
    );
    protected $_auto=array(
        array('level',1),
        array('passwd','md5',1,'function')
    );
    //登录
    public function logined($data){
        $obj=M('admin');
        if($res=$obj->where($data)->find()){
            session('admin_uid',$res['id']);
            session('admin_name',$res['username']);
            session('lastlogintime',date('Y-m-d H:i:s',$res['logintime']));
            session('lastloginip',$res['lastloginip']);
            $map['lastloginip']=get_client_ip();
            $map['id']=session('admin_uid');
            $map['logintime']=time();
            if($obj->create($map)){
                return $obj->save();
            }
        }else{
            return false;
        }
    }
    //保存管理员账号到数据库
    public function saveAdmin($data){
        $obj=D('Admin');
        if($obj->create($data)){
            return $obj->add();
        }else{
            return null;
        }
    }
    //ajax查询管理员账号是否存在
    public function chkUser($data){
        $obj=M('admin');
        if(!$obj->where($data)->find()){
            $arr=array('ok'=>'恭喜,此帐号可以添加');
        }else{
            $arr=array('error'=>'对不起,此帐号已存在');
        }
        return json_encode($arr);
    }

    //查询所有管理员输出列表
    public function getAllAdmin(){
        $obj=M('admin');
        return $obj->order('id')->select();
    }

    //根据ID查找管理员
    public function getAdminById($data){
        $obj=M('admin');
        return $obj->where($data)->find();
    }

    //更新编辑的管理员到数据库
    public function editSave($data){
        $obj=D('Admin');
        $admin=$obj->where(array('id'=>$data['id']))->find();
        if(!$data['passwd']){
            $data['passwd']=$admin['passwd'];
        }else{
            $data['passwd']=md5($data['passwd']);
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
}