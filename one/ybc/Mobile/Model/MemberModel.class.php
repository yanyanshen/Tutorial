<?php
namespace Mobile\Model;
use Think\Model;
class MemberModel extends Model{
    protected $tableName = 'member';
    protected $_map = array(
        'f_password' =>'password', // 把表单中name映射到数据表的username字段
    );
    protected $_validate = array(
        array('verify','require','验证码必须！'),
        array('username','require','用户名不能为空！'),
        array('username','','用户名已经存在！',0,'unique',1),
        array('mobile','','该手机已经注册,请直接登录！',0,'unique',1),
        array('password','require','密码不能为空！'),
        array('c_password','password','确认密码不正确',0,'confirm'),
        array('mobile','require','手机号不能为空！'),
        array('mobile','/^1[34578][0-9]{9}/','手机号格式不正确！'),
    );
    protected $_auto=array(
        array('password','md5',3,'function'),
        array('lasttime','time',3,'function'),
        array('lastip', 'get_client_ip', 1, 'function'),
    );
}