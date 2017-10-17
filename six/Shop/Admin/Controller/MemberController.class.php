<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class   MemberController extends Controller{
    public function memberList(){
        $this->display();
    }
    public function memberEdit(){
        $this->display();
    }
    public function member(){
        if(IS_POST){
            $Keywords=I('post.Keywords');
            $where['username']=array('like',"%$Keywords%");
        }else{
            $where='';
        }
        $admin=M('Users');
        $count=$admin->where($where)->count();
        $page=new Page($count,5);
        $page->setConfig('header','<span class="rows">&nbsp;&nbsp;&nbsp;共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
        $page->setConfig('prev','上页');
        $page->setConfig('next','下页');
        $page->setConfig('first','首页');
        $page->setConfig('end','尾页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show=$page->show();
        $list=$admin->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->display();
    }
    public function del(){
        $users=D('Users');
        if($users->delete($_POST['id'])){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    public function editor(){
        if(IS_AJAX){
            $Users=M('Users');
            $id=$_GET['id'];
            $date=$Users->create();
            $date['password']=md5($date['password']);
            $date['username']=trim($date['username']);
            $rows=$Users->where(array('id'=>$id))->field('username,password,email,mobile')->save($date);
            if($rows>0){
                $this->success('更新成功');
            }else{
                $this->error('更新失败');
            }
        }else{
            $Users=D('Users');
            $id=(int)$_GET['id'];
            $list=$Users->where(array('id'=>$id))->find();
            $this->assign('date',$list);
            $this->assign('title','显示用户编辑信息');
            $this->display();
        }
    }
    public function chkUserName(){
        $username=I('post.username');
        $id=$_GET['id'];
        $where['username']=$username;
        $where['id']=array('neq',$id);
        $res=M('Users')->where($where)->find();
        //echo M('Users')->getLastSql();
        if($res){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    public function chkMobile(){
        $mobile=I('post.mobile');
        $id=$_GET['id'];
        $where['mobile']=$mobile;
        $where['id']=array('neq',$id);
        $res=M('Users')->where($where)->find();
        if($res){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    public function status(){
        $users=M('Users');
        $where=(int)$_POST['id'];
        $date['status']=1;
        $rows=$users->where(array('id'=>$where))->field('status')->save($date);
        // echo $users->getLastSql();

        if($rows>0){
            $this->success('禁用成功');
        }else{
            $this->error('禁用失败');
        }
    }
    public function status1(){
        $users=M('Users');
        $where=(int)$_POST['id'];
        $date['status']=0;
        $rows=$users->where(array('id'=>$where))->field('status')->save($date);
        if($rows>0){
            $this->success('激活成功');
        }else{
            $this->error('激活失败');
        }
    }
    public function add(){
     //   dump($_SERVER);
     $this->display();
    }
    public function adds(){

        if(IS_POST){
            $users=D('Users');
            $date=$users->create();
            $list=$users->field('sex')->find();
            $this->assign('list',$list);
            if($date){
                $date['password']=md5($date['password']);
                $date['regdate']=time();
                $date['regip']=$_SERVER["SERVER_ADDR"];
                 $mid=$users->member($date);
           // $mid=$users->field('username,password,regdate,mobile,regip,nickname,qq')->add($date);
                if($mid){
                    $this->success('添加成功');
                }else{
                    $this->error('添加失败');
                }
            }else{
                $this->error($users->getError());
            }
        }else{

            $this->display();
        }
    }
    public function UserName(){
        $username=I('post.username');
        if(M('Users')->where(array('username'=>$username))->find()){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    public function Mobile(){
        $Mobile=I('post.mobile');
        if(M('Users')->where(array('mobile'=>$Mobile))->find()){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    public function Email(){
    $email=I('post.email');
        if(M('Users')->where(array('email'=>$email))->find()){
            echo 'false';
        }else{
            echo 'true';
        }
}

}