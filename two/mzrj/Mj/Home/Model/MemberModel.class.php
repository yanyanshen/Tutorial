<?php
namespace Home\Model;
use Think\Model;
class MemberModel extends Model{
   /* protected $_validate=array(
        array('username','require','用户名不能为空'),
        array('username','','帐号名称已经存在！',0,'unique',1),
        array('username','2,15','用户名长度在2-15个字符之间',0,'length'),
        array('pwd','5,20','密码长度在5-20个字符之间',0,'legth'),
        array('pwd','repwd','密码输入不一致',0,'confirm')
    );*/


    protected $_validate=array(
        array('username','require','用户名不能为空'),
        array('username','2,15','用户名长度在2-15个字符之间',0,'length'),
        array('username',' /^[A-Za-z][A-Za-z0-9_]{5,16}$/','用户名为字母数字组合',0,'regex'),

        array('pwd','5,20','密码长度在5-20个字符之间',0,'legth'),
        array('pwd','repwd','密码输入不一致',0,'confirm'),
        array('username','','用户名已存在',0,'unique'),
        array('email','email','请填写正确的邮箱格式',2,'regex'),
        array('mobile','/^(13[0-9]|14[0-9]|15[0-9]|17[0-9]|18[0-9])\d{8}$/','请填写正确的手机号',2,'regex'),
    );

    public function register(){

    $data=$this->create();
        $data['username']=trim(I('post.username'));
        $data['pwd']=md5(trim(I('post.pwd')));
        $data['createtime']=time();

        return $this->add($data);
    }

    public function login(){
        $data=$this->create();
        $data['username']=trim(I('post.username'));
        $data['pwd']=md5(trim(I('post.pwd')));
     return   $this->where($data)->getField('id');
    }

}