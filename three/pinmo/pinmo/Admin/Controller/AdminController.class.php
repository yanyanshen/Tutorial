<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller{
    //添加管理员
        public function add(){
            if(IS_POST){
                $admin=D('Admin');
                $aid=session('aid');
                $aidinfo=M('adminuser')->where("id=$aid")->find();
                if($aidinfo['status']==2){
                    if($admin->admin()){
                        $this->ajaxReturn(array('status'=>'ok','msg'=>'管理员添加成功'));
                    }else{
                        $this->ajaxReturn(array('status'=>'error','msg'=>'管理员添加失败'));
                    }
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'权限不足，请联系系统管理员！'));
                }
            }else{
               $this->display();
            }
        }

    public function adminlist(){
        $admin=M('adminuser');
        $count=$admin->count();
        $Page = new \Think\Page($count,5);
        $show=$Page->show();
        $adminList=$admin->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $map['key']=I('get.key');
        foreach($map as $key=>$val) {
            $Page->parameter[$key]   =   urlencode($val);
        }
        $this->assign("adminlist",$adminList);
        $this->assign("page",$show);
        $this->assign("firstRow",$Page->firstRow);
        $this->display();
    }
    //修改管理员密码
    public  function edit(){
        $admin=D('Admin');
        if(IS_POST){
            $id=I('post.id');
            $aid=session('aid');
            $aidinfo=M('adminuser')->where("id=$aid")->find();
            if($aidinfo['status']==2){
                $adminnew['password']=md5(trim(I('post.password')));
                $a=$admin->where("id='$id'")->save($adminnew);
                //dump($a);
                if($a>0){
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'管理员密码修改成功'));
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'管理员密码修改失败'));
                }
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'你的权限不足，请联系系统管理员'));
            }
        }else{
            $id=I('get.id');
            $adminname=$admin->where("id=$id")->getField('adminname');
            $this->assign('adminname',$adminname);
            $this->assign('id',$id);
            $this->display();
        }
    }
    //账户启用与停用
    public function opp(){
        $id=I('post.id');
        $opp=M('adminuser');
        $aid=session('aid');
        $aidinfo=M('adminuser')->where("id=$aid")->find();
        $power=$opp->where("id=$id")->find();
        if($aidinfo['status']>1 ){
            if($power['power']==1){
                $a['power']=0;
                $opp->where("id=$id")->save($a);
                $this->ajaxReturn(array('status'=>'ok','msg'=>'账户已禁用'));
            }else{
                $a['power']=1;
                $opp->where("id=$id")->save($a);
                $this->ajaxReturn(array('status'=>'ok','msg'=>'账户已启用'));
            }
        }elseif($aidinfo['status']==1 & $power['status']<1){
            if($power['power']==1){
                $a['power']=0;
                $opp->where("id=$id")->save($a);
                $this->ajaxReturn(array('status'=>'ok','msg'=>'账户已禁用'));
            }else{
                $a['power']=1;
                $opp->where("id=$id")->save($a);
                $this->ajaxReturn(array('status'=>'ok','msg'=>'账户已启用'));
            }
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'你的权限不足，请联系超级管理员或系统管理员'));
        }


    }

//判断原密码是否正确
    public function checkPwd(){
        $admin=D('Adminuser');
        $data1=trim(I('get.adminname'));
        $data2=md5(trim(I('post.password1')));
        $a=$admin->where("adminname='$data1' and password='$data2'")->find();
        if($a){
            echo 'true';
        }else{
            echo 'false';
        }
    }
//检查用户名是否已用
    public function chkAdminname(){
        $register=M('adminuser');
        $username=I('post.adminname');

        if($register->where(array('adminname'=>$username))->count()){
            echo  'false';
        }else{
            echo 'true';
        }
    }
}