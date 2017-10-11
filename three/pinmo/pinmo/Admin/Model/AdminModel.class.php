<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    protected $tableName = 'adminuser';
    protected $_validate=array(
        array('adminname','require','用户名不能为空'),
        array('password','require','密码不能为空'),
    );
    public function admin(){
        $data['adminname']=trim(I('post.adminname'));
        $data['password']=md5(trim(I('post.password')));
        $data['creatime']=time();
        $data['power']=1;
        $data['ip']=get_client_ip();
        $data['status']=I('post.status');
        return $this->add($data);
    }
    public function edit($id){
            //$id=I('get.id');
            //$adminnew['adminname']=trim(I('post.adminname'));





    }
}