<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    protected $_validate=array(
        array('username','require','用户名不能为空'),
    );
    public function login(){
        $data=$this->create();
        $data['username']=trim(I('post.username'));
        $data['pwd']=md5(trim(I('post.pwd')));
        return   $this->where($data)->getField('id');
    }
}