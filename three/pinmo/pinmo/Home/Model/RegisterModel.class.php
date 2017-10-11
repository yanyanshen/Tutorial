<?php
namespace Home\Model;
use Think\Model;
class RegisterModel extends Model
{
    protected $tableName = 'user';
    protected $_validate = array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        array('username', 'require', '用户名不能为空'),
        array('username', '2,15', '用户名长度在2-15个字符之间', 0, 'length'),
        array('password', '5,20', '密码长度在5-20字符之间', 0, 'length'),
        array('password', 'repwd', '两次密码输入不匹配', 0, 'confirm')
    );

    public function register()
    {
        $data = $this->create();
        $data['creatime']=time();
        $data['password'] = md5(trim(I('post.password')));
        return $this->add($data);
    }
}