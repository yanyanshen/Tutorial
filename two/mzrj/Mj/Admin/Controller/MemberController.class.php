<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller{
//    public function index(){
//        $this->display('list');
//    }
//    public  function getlist(){
//        $member=M('Member');
//        $memberlist=$member->select();
//
//        $this->assign('memberlist',$memberlist);
//
//        $this->display('list');
//    }

    //分页
    public function fenye(){
         $p=I('get.p');
        $key=I('get.key');
        $member=M('Member');
        if(isset($key)&& !empty($key)){
            $message['username']=array('like',"%".$key."%");
        }

        $count=$member->where($message)->count();
        $page=new \Think\Page($count,7);
        $show=$page->show();
        $memberlist=$member->where($message)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();
        $map['key']=I('get.key');
        foreach($map as $key=>$val){
            $page->parameter[$key]= urlencode($val);
        }
        $this->assign('count',$count);
        $this->assign('p',$p);
        $this->assign('title','首页');
        $this->assign('page',$show);
        $this->assign('memberlist',$memberlist);
        $this->assign('firstRow',$page->firstRow);
        $this->display('list');
    }

    public function qs(){
        $arr=I('post.ji');
        if(isset($arr) && !empty($arr)){
            $admin=M('Member');
            foreach($arr as $v){
                $id=$admin->where("id=$v")->delete();
            }
            if($id>0){
                $this->success('删除成功');
            }
        }else{
            $this->error('删除失败');
        }

    }
}