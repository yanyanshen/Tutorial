<?php
namespace Admin\Model;
use Think\Model;
class LoginModel extends Model{
    protected $tableName = 'adminuser';
    protected $_validate=array(
        array('adminname','require','用户名不能为空'),
        array('password','require','密码不能为空'),
    );
    public function login(){
        $data['adminname']=trim(I('post.adminname'));
        $data['password']=md5(trim(I('post.password')));
        $data['power']=1;
        return $this->where($data)->getField('id');

    }
}