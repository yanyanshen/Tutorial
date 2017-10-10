<?php
namespace Admin\Controller;

use Admin\Common\Controller\BgController;

class AdminController extends BgController{




    //添加管理员
    public  function add(){

        if(IS_AJAX){
            $admin=D('Admin');
            $data=$admin->create();
            if($data){
                $id=$admin->addAdmin($data);
                if($id){
                    if(I('post.group_id')){
                        $access=M('AuthGroupAccess');
                        foreach(I('post.group_id') as $v){
                            $info['uid']=$id;
                            $info['group_id']=$v;
                            $access->add($info);
                        }
                    }
                    $this->success('管理员添加成功',U('index'));
                }else{
                    $this->error('管理员添加失败');
                }
            }else{
                $this->error($admin->getError());
            }
        }else{
            $groupList=D('AuthGroup')->getGroupList();
            $this->assign('groupList',$groupList);
            $this->display('add');
        }
    }



    //显示管理员列表

    public function index(){

        $admin=D('Admin');
        $adminList=$admin->getAdminList();
        foreach($adminList as $k=>$v){
            $groupInfo=M('AuthGroupAccess')->alias('a')->join('ybc_auth_group g ON a.group_id=g.id')->field('g.title')->where("a.uid={$v['id']}")->select();
            $str='';
            foreach($groupInfo as $g){
                $str.=$g['title'].',';
            }
            $adminList[$k]['group']=substr($str,0,-1);
        }
        $this->assign('adminList',$adminList);
        $this->display('index');
    }

    //激活与禁用管理员
     public function stopuse(){
          if(IS_AJAX){
              $id=I('post.id');
              $where['id']=$id;
              $data['active']=0;
              $admin=M('admin');
              $user=$admin->where($where)->save($data);
              if($user){
                  $this->success('操作成功');
              }else{
                  $this->error('操作失败');
              }
          }
     }

    public function startuse(){
        if(IS_AJAX){
            $id=I('post.id');
            $where['id']=$id;
            $data['active']=1;
            $admin=M('admin');//连接数据表
            $user=$admin->where($where)->save($data);
            if($user){
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }
        }
    }



    //编辑
    public function edit(){
        $admin=D('Admin');
        if(IS_AJAX){
            $data=$admin->create($_POST,2);
            if($data){
                $data['addtime']=time();
                $row= $admin->editAdmin($data);

                if($row){
                    if(I('post.group_id')){
                        $access=M('AuthGroupAccess');
                        $access->where(array('uid'=>$data['id']))->delete();

                        foreach(I('post.group_id') as $v){
                            $info['uid']=$data['id'];
                            $info['group_id']=$v;
                            $access->add($info);
                        }
                    }
                    $this->success('用户编辑成功',U('index'));
                }else{
                    $this->error('用户编辑失败');
                }
            }else{
                $this->error($admin->getError());
            };
        }else{
            $id=I('get.id');
            $adminInfo=$admin->getAdminById($id);
            $gid=M('AuthGroupAccess')->field('group_id')->where(array('uid'=>$id))->select();

            foreach($gid as $v){
                $arr[]=$v['group_id'];
            }
            $adminInfo['gid']=$arr;
            //print_r($adminInfo);
            $groupList=D('AuthGroup')->getGroupList();
            $this->assign('groupList',$groupList);
            $this->assign('adminInfo',$adminInfo);
            $this->display();
        }

    }

}