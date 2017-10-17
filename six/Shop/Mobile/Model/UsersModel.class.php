<?php
namespace Model\Model;
use  Think\Model;
class UsersModel extends Model{
    protected $_validate = array(
        array('username', 'require', '用户名不能为空！'), //默认情况下用正则进行验证
        array('username', '', '该用户名已被注册！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
        array('mobile', '', '该手机号码已被占用', 0, 'unique', 1), // 新增的时候mobile字段是否唯一
        array('password', '/^([a-zA-Z0-9@*#]{6,22})$/', '密码格式不正确,请重新输入！', 0),
        array('repassword', 'password', '确认密码不正确', 0, 'confirm'), // 验证确认密码是否和密码一致
        array('mobile', '/^1[34578]\d{9}$/', '手机号码格式不正确', 0), // 正则表达式验证手机号码

    );
    protected $_auto = array (
        array('regdate', 'time', 1, 'function'), // 对regdate字段在新增的时候写入当前时间戳
        array('regip', 'get_client_ip', 1, 'function'), // 对regip字段在新增的时候写入当前注册ip地址
        array('lastdate', 'time', 1, 'function'), // 对lastdate字段在登录的时候写入当前时间戳
        array('lastip', 'get_client_ip', 1, 'function'), // 对lastip字段在登录的时候写入当前登录ip地址
    );

    public function register($date){
        return $this->field('username,password,regdate,lastdate,mobile,regip')->add($date);
    }




}