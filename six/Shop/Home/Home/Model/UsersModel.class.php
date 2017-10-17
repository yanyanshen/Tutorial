<?php
namespace Home\Model;
use Think\Model;
class UsersModel extends Model{

    protected $_map=array(
        'pwd'=>'password'
    );
    protected $_validate = array(
        array('username', 'require', '用户名不能为空！'), //默认情况下用正则进行验证
        array('username', '', '该用户名已被注册！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
        array('email', '', '该邮箱已被占用', 0, 'unique', 1), // 新增的时候email字段是否唯一
        array('mobile', '', '该手机号码已被占用', 0, 'unique', 1), // 新增的时候mobile字段是否唯一
        // 正则验证密码 [需包含字母数字以及@*#中的一种,长度为6-22位]
        array('password', '/^([a-zA-Z0-9@*#]{6,22})$/', '密码格式不正确,请重新输入！', 0),
        array('repassword', 'password', '确认密码不正确', 0, 'confirm'), // 验证确认密码是否和密码一致
        array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱格式
        array('mobile', '/^1[34578]\d{9}$/', '手机号码格式不正确', 0), // 正则表达式验证手机号码
        array('verify', 'verify_check', '验证码错误', 0, 'function'), // 判断验证码是否正确
        array('agree', 'is_agree', '请先同意网站安全协议！', 1, 'callback'), // 判断是否勾选网站安全协议
        //array('agree', 'require', '请先同意网站安全协议！', 1), // 判断是否勾选网站安全协议
    );
    /**
     * 自动完成
     */
    protected $_auto = array (
        array('regdate', 'time', 1, 'function'), // 对regdate字段在新增的时候写入当前时间戳
        array('regip', 'get_client_ip', 1, 'function'), // 对regip字段在新增的时候写入当前注册ip地址
        array('lastdate', 'time', 1, 'function'), // 对lastdate字段在登录的时候写入当前时间戳
        array('lastip', 'get_client_ip', 1, 'function'), // 对lastip字段在登录的时候写入当前登录ip地址
    );
    /**
     * 判断是否同意网站安全管理协议
     * @return bool
     */
    protected function is_agree()
    {
        // 获取POST数据
        $agree = I('post.agree', 0, 'intval');
        // 验证
        if ($agree) {
            return true;
        } else {
            return false;
        }
    }
    public function registered($date){
        return $this->field('username,password,mobile,regdate,lastdate,email,regip,nickname')->add($date);
    }
    public function login(){
        $admin['username']=trim(I('post.username'));
        $admin['password']=md5(I('post.password'));
        return $this->where($admin)->getField('id');
    }
}