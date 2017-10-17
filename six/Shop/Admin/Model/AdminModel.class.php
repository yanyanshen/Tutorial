<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    function checkUser($username,$password){
        $condition['username'] = $username;
        $condition['password'] = $password;
        $data['logintime']=time();
        $data['lastloginip']=$_SERVER[REMOTE_ADDR];
        if($admin=$this->where($condition)->find()){
            session('ordernews',1);  //订单消息需要用的
            session('admin',$admin);
            session('logintime',date('Y-m-d H:i:s'));
            session('lastloginip',get_client_ip());
            //更新登录事件和登录iP
            M('admin')->where($condition)->save($data);
            //更新登录次数加1
            M('admin')->where($condition)->setInc('loginnums');
            return true;
        }else{
            return false;
        }
    }
    protected $_validate = array(
        array('username','require','管理员账号必须填写'),//默认情况下用正则写
        array('username','','账号名称已经存在！',0,'unique',1),//新增字段时验证name是否唯一
    );
}