<?php
namespace Admin\Controller;
use Think\Controller;
class UsersController extends Controller
{
    public function _initialize()
    {
        if (session('aid') < 1) {
            $this->redirect('Admin/index');

        }
    }

    public function userlist(){
        $users = M('user');
        $count=$users->count();
        $Page = new \Think\Page($count,3);
        $show=$Page->show();
        $userList=$users->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        //分页跳转的时候保证查询条件
        $map['key']=I('get.key');
        foreach($map as $key=>$val) {
            $Page->parameter[$key]   =   urlencode($val);
        }
        $this->assign("userList",$userList);
        $this->assign("page",$show);
        $this->assign("firstRow",$Page->firstRow);


        $this->display();
    }


    public function state()
    {
        $state=M('user');
        $id=I('post.id');
        $a=$state->where("id=$id")->getField('state');
        if($a>0){
            $data['state']=0;

            $state->where("id=$id")->field('state')->save($data);
            $this->ajaxReturn(array('status'=>'ok','msg'=>'已冻结'));
        }else{
            $data['state']=1;
            $state=M('user');
            $state->where("id=$id")->field('state')->save($data);}
        $this->ajaxReturn(array('status'=>'ok','msg'=>'已激活'));
    }

    public function del(){
        $id=I('post.id');

        $del=M('user');
        $a=$del->where("id=$id")->delete();
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }

    }

}
