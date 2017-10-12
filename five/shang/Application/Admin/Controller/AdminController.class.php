<?php
namespace Admin\Controller;
use  Think\Controller;
class AdminController extends Controller{
    //在本控制器所有方法之前会执行该方法，防止未登录进入
    public function _initialize(){
        if(session('aid')<1||session('status')<1){
            header('location:/Admin/Login/login');
        }
    }
    public function index(){
        $admin=M('Admin');
        $condition['adminname']=array('like',"%".I('get.key')."%");//搜索条件
        $count = $admin->where($condition)->count();// 查询满足要求的总记录数
        $page  = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(3)
        $page -> setConfig('header','<span class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
        $page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show  = $page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性

        $res=$admin->where(array('adminname'=>session('adminname')))->find();
        $status=$res['status'];
        $this->assign('status',$status);
        $list = $admin->where($condition)->order('aid desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('firstRow',$page->firstRow);//赋值每页开始条数
        $admininfo=$admin->where(array('aid'=>session('aid')))->find();
        $this->assign('info',$list);
        $this->assign('admininfo',$admininfo);
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $admin=D('Admin');
            $data['adminname']=trim(I('post.adminname'));
            $data['pwd']=md5(trim(I('post.pwd')));
            $repwd=md5(trim(I('post.repwd')));
            $data['status']=trim(I('post.status'));
            if(!$admin->create()){
                $this->ajaxReturn(array('status'=>'error','msg'=>$admin->getError()));
            }else{
                if($data['pwd']!=$repwd){
                    $this->ajaxReturn(array('status'=>'error','msg'=>'两次密码输入不一致'));
                }else{
                    $res=$admin->where(array('adminname'=>$data['adminname']))->find();
                    $adminname=$res['adminname'];
                    if($adminname==$data['adminname']){
                        $this->ajaxReturn(array('status'=>'error','msg'=>'名称已经存在'));
                    }else{
                        if($admin->add($data)){

                            $this->ajaxReturn(array('status'=>'ok','msg'=>'添加成功'));
                        }else{
                            $this->ajaxReturn(array('status'=>'error','msg'=>'添加失败'));
                        }
                    }
                }
            }
        }else{
            $this->display();
        }
    }
    public function edit(){
        $admin=D('Admin');
        if(IS_POST){
            $data['aid']=I('post.aid');
            $data['adminname']=trim(I('post.adminname'));
            $data['pwd']=md5(trim(I('post.pwd')));
            $data['newpwd']=md5(trim(I('post.newpwd')));
            $repwd=md5(trim(I('post.repwd')));
            $data['status']=trim(I('post.status'));
            $condition['aid']=$data['aid'];
            $condition['pwd']=$data['pwd'];
            if(!$admin->create()){
                $this->ajaxReturn(array('status'=>'error','msg'=>$admin->getError()));
            }else if($data['newpwd']!=$repwd){
                $this->ajaxReturn(array('status'=>'error','msg'=>'两次密码输入不一致'));
            }else if(!$admin->where($condition)->find()){
                $this->ajaxReturn(array('status'=>'error','msg'=>'密码错误'));
            }else if($admin->save($data)){
                 $this->ajaxReturn(array('status'=>'ok','msg'=>'修改成功'));
            }else{
                  $this->ajaxReturn(array('status'=>'error','msg'=>'修改失败'));
            }
        }
        else{
            $aid=I('get.aid');
            $info=$admin->find($aid);
            $this->assign('aid',$aid);
            $this->assign('info',$info);
            $this->display();
          }
    }
    public function del(){

       $aid=I('get.aid');
       $admin=M('Admin');
       $res=$admin->where(array('aid'=>$aid))->delete();
        if($res>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }
    }
    public function off(){
        $data['aid']=I('get.aid');
        $data['status']=I('get.status');
        if($data['status']==2){
            $this->ajaxReturn(array('status'=>'error','msg'=>'超级管理员不能被禁用'));
        }else{
            $data['status']=0;
            $admin=M('Admin');
            $res=$admin->save($data);
            if($res>0){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'禁用成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'禁用失败'));
            }
        }

    }
    public function on(){
        $data['aid']=I('get.aid');
        $data['status']=1;
        $admin=M('Admin');
        $res=$admin->save($data);
        if($res>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'激活成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'激活失败'));
        }
    }
    public function logout(){
        session('adminname',null);//删除session
        session('aid',null);//删除session
        session('status',null);//删除session
        $this->ajaxReturn(array('status'=>'ok'));
    }
}