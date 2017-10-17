<?php
namespace Admin\Controller;
use Think\Controller;
class RbacController extends CommonController {
    //添加角色
    public function addRole(){
        $this->display();
    }
    //添加角色表单处理
    public function addRoleHandle(){
        if(M('Role')->add($_POST)){
            $this->success('添加成功！',U('Rbac/addrole'));
        }else{
            $this->error('添加失败');
        }
    }
    //角色列表
    public function roleList(){
        //查询数据

        //获取数据
        $this->role=M('Role')->select();
        $this->display();
        }
//添加节点
    public function addNode(){
        $this->node=M('Node')->where('level!=3')->order('sort')->select();
        $this->display();
    }
     //添加节点表单处理
    public function addNodeHandle(){
        $node=M('Node');
        $node->create();
        if($node->add()){
            $this->success('添加成功！',U('rbac/nodeList'));
        }
    }
    //节点列表列表 
    public function nodeList(){
        $tree=A('Admin/Tree');
        $node=M('Node')->order('sort')->select();
        $this->node=$tree->create($node);
//      $this->node=M('Node')->order('sort')->select();
        $this->display();
    }
    //删除权限
    public function deletenode(){
        if(M('Node')->where('id='.I('id','',int))->delete()){
            $this->success('删除成功！',U('rbac/nodeList'));
        }
    }
    public function adduser(){
        $this->role=M('Role')->select();
        $this->display();
    }
    //添加管理员处理
    public function addUserHandle(){
         $data['username']=I('username');
         $data['password']=md5(I('password'));
         $data['loginip']=time();
         $data['status']=1;
         $uid=M('User')->add($data);
         if($uid){
            $role['role_id']=I('role_id',int);
            $role['user_id']=$uid;
            M('Role_user')->add($role);
            $this->success('添加成功！',U('rbac/adduser'));
         }else{
            $this->error('添加失败！');
         }
    }
    //用户列表
    public function userList(){
        $user=D('User')->field('password',true)->relation(true)->select();
        $this->assign('user',$user);
        $this->display();
    }
    //删除用户
    public function deleteuser(){
        if(M('user')->where('id='.I('id','',int))->delete()){
            $this->success('删除成功！',U('rbac/userList'));
        }
    }
    //配置权限
    public function access(){
          $rid=I('rid','',int);
          $field=array('id','name','title','pid');
          $node=M('Node')->order('sort')->field($field)->select();
        //原有权限
          $access=M('access')->where(array('role_id'=>$rid))->getField('node_id',true);
          $this->node=node_merge($node,$access);
          $this->rid=$rid;
          $this->display();
//        $tree=A('Admin/Tree');
//        $rid=I('rid','',int);
//        $node=M('Node')->order('sort')->select();
//        $this->node=$tree->create($node);
//        $this->name=M(Role)->getFieldByid($rid,'name');
//        $this->display();
    }
    //修改权限
    public function setAccess(){
        $rid = I('rid','', 'int');
        $db = M('access');
        $db->where(array('role_id'=>$rid))->delete();
        $data=array();
        foreach ($_POST['access'] as $vo) {
            $tmp = explode('_', $vo);
            $data[] = array(
                'role_id' => $rid,
                'node_id' => $tmp[0],
                'level' => $tmp[1]
            );
        }
        if($db->addAll($data)){
              $this->success('修改成功！',U('Rbac/rolelist'));
        }else{
            $this->error('修改失败！');
        }
    }

}