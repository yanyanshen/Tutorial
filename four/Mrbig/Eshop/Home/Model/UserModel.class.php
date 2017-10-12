<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        array('username','require','用户名不能为空'),
        array('username','2,15','用户名长度在2-15个字符之间',0,'length'),
        array('pwd','5,20','密码长度在5-20字符之间',0,'length'),
        array('pwd','repwd','两次密码输入不匹配',0,'confirm')
    );

    public function register($arr){
        $id=$this->add($arr);
        return $id;
    }
    public function chkusername($name){
        $where['username']=$name;
        $res=M('User');
        $num=$res->where($where)->select();
        return $num;
    }
    public function login(){
        $condition['username']=trim(I('post.username'));
        $condition['pwd']=trim(I('post.password'));
        $id=$this->where($condition)->select();
        return $id;
    }
    public function chkNamePwd($username,$pwd){
        $res=M('user');
        $where['username']=$username;
        $where['pwd']=$pwd;
        $id=$res->where($where)->select();
        return $id;
    }
    public function pwdData($username,$pwd){
        $data['pwd']=$pwd;
        $where['username']=$username;
        $num=$this->where($where)->data($data)->save();
        return $num;
    }
    public function chkInforMetion($arr,$id){
        $res=M('uuser');
        $where['uname']=$id;
        $id=$res->where($where)->data($arr)->save();
        return $id;
    }
    public function showUser($uid){
        $res=M('uuser');
        $where['uname']=$uid;
        $arr=$res->where($where)->select();
        return $arr;
    }
}