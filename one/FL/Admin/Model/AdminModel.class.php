<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
/*
    protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        array('custom_username','require','用户名不能为空'),
        array('custom_username','3,18','用户名长度在3-18个字符之间',0,'length'),
        array('custom_pwd','6,18','密码长度在6-18字符之间',0,'length'),
        array('custom_pwd','repwd','两次密码输入不匹配',0,'confirm')
    );*/


    public function login(){
        $condition['username']=trim(I('post.username'));
        $condition['pwd']=md5(trim(I('post.pwd')));
       return $this->where($condition)->find();

    }

    public function addAdmin(){
        $data=$this->create();
        $data['pwd']=md5(trim(I('post.pwd')));
        $data['time']=time();
        return $this->add($data);
    }


    public function chkPwd(){
        $data['id']=I('post.id');
        $data['pwd']=md5(trim(I('post.pwd')));

    return $this->where($data)->getField('id');
/*        echo $this->getLastSql();
        exit;*/
    }
}