<?php
namespace Admin\Controller;

use Admin\Common\Controller\BgController;


class AuthGroupController extends BgController{


    //添加管理组
    public function add(){
        if(IS_AJAX){
            $group=D('AuthGroup');
            $data=$group->create();
            if($data){
                $gid=$group->addGroup($data);
                if($gid){
                    $this->success("添加管理组成功",U('index'));
                }else{
                    $this->error("添加管理组失败");
                }
            }else{
                $this->error($group->getError());
            }
        }
        $this->display('add');
    }

    //修改管理组
    public function edit(){
        if(I('get.id')){
            $id=I('get.id');
            $authGroup=D('AuthGroup');
            $info=$authGroup->findGroup($id);
            $this->assign('info',$info);
            $this->display('edit');
        }else{
            $id=I('post.id');
            $Group=D('AuthGroup');
            $data['title']=I('post.title');
            $info=$Group->where(array('id'=>$id))->save($data);
            if($info){
                $this->success("修改成功",U('index'));
            }else{
                $this->error('修改失败');
            }
        }
    }

    //显示管理组
    public function index(){
        $group=D('AuthGroup');
        $groupList=$group->getGroupList();
        foreach($groupList as $k=>$v){
            $adminInfo=M('AuthGroupAccess')->alias('g')->join('ybc_admin a ON g.uid=a.id')->field('a.username')->where("g.group_id={$v['id']}")->select();
            $str='';
            foreach($adminInfo as $a){
                $str.=$a['username'].',';
            }
            $groupList[$k]['member']=substr($str,0,-1);
        }


        $this->assign('groupList',$groupList);
        $this->display('index');
    }


    //添加组员
    public function addMember(){
        if(IS_GET){
            $id=I('get.pid');
            $group=D('AuthGroup');
            $title=$group->getTitle($id);
            $this->assign('id',$id);
            $this->assign('title',$title);
            $this->display('addMember');
        }else{
            $groupId=I('post.group_id');
            $admin=D('Admin');
            $data=$admin->create();
            if($data){
                $id=$admin->addAdmin($data);
                if($id){
                    $access=M('AuthGroupAccess');
                    $info['group_id']=$groupId;
                    $info['uid']=$id;
                    $access->add($info);
                    $this->success("添加组员成功",U('index'));
                }else{
                    $this->error("添加组员失败");
                }

            }else{
                $this->error($admin->getError());
            }
        }
    }



    //删除管理组
    public function del(){
        if(IS_GET){
            $id=I('get.id');

            $group=D('AuthGroup');
            $res=$group->del($id);
            if($res){
                $this->success("删除成功！",U('index'));
            }else{
                $this->error($group->getError());
            }
        }
    }

    //给组分配权限
    public function allocateRule(){
        $group=D('AuthGroup');
        if(IS_AJAX){
            $data['id']=I('post.id');
            $data['rules']=implode(',',I('post.rules'));
            $row=$group->editRule($data);
            if($row){
                $this->success('分配成功',U('index'));
            }else{
                $this->success('分配失败');
            }
        }else{
            //获取所有权限规则
            $rule=D('AuthRule');
            $ruleList=$rule->getRuleTree();
            /* echo "<pre>";
             print_r($ruleList);*/
            //获取组信息
            $id=I('get.gid');
            $groupInfo=$group->find($id);
            $groupInfo['rules']=explode(',',$groupInfo['rules']);

            $this->assign('ruleList',$ruleList);
            $this->assign('groupInfo',$groupInfo);
            $this->display();
        }

    }


}