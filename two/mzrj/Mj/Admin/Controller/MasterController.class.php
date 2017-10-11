<?php
namespace Admin\Controller;
use Think\Controller;
class MasterController extends Controller{
    public function index(){
        $this->display('add');
    }

    public function _initialize(){
        if(session('aid')<1){
            $this->redirect('Admin/index');
        }
    }
    public function add(){

     $data['username']=trim(I('post.name'));
        $data['pwd']=md5(trim(I('post.pwd')));
        $repwd=md5(trim(I('post.repwd')));
        $admin=M('Admin');
        $id=$admin->where(array("username"=>$data['username']))->field('id')->find();

        if($id>0){
            $this->error('管理员名称已经存在');
        }
        if(!$data['username']){
            $this->error('管理员名称不能为空');
        }

        if(I('post.pwd')){
            if($data['pwd']==$repwd) {
                $admin=M('Admin');
                $id=$admin->add($data);
               if($id>0){
                    $this->success('添加成功');
                  }
               }else{
                $this->error('输入密码不一致');
            }
            }else{

            $this->error('密码不能为空');
        }
    }

//    public function adminlist(){
//
//        $admin=M('Admin');
//        $adminlist=$admin->select();
//
//        $this->assign('adminlist',$adminlist);
//        $this->display();
//    }

    //编辑
    public function edit(){
        $id=I('get.id');
        $admin=M('Admin');
        $list=$admin->where("id=$id")->find();
        $this->assign('id',$id);
        $this->assign('list',$list);
        $this->display('edit');
    }
    public function editaction(){
        if(IS_POST){
            $id=I('post.id');
      $data['username']=trim(I('post.name'));
      $data['password']=md5(trim(I('post.pwd')));
            //print_r($data['password']);

        $data['repwd']=md5(trim(I('post.repwd')));
        if(!$data['username']){
            $this->error('管理员名称不能为空');
        }
        if(!I('pwd')){
            $this->error('密码不能为空');
        }
        if($data['password']!=$data['repwd']){
            $this->error('输入密码不一样');
        }
         if($data){
             $admin=M('Admin');
             $res=$admin->where("id=$id")->save($data);
             if($res>0){
                 $this->success('编辑成功');
             }
         }

        }else{
            $this->display('edit');
        }
}

    //删除
    public function del(){
        $id=I('get.id');
        $admin=M('Admin');
        $res=$admin->where("id=$id")->delete();
    if($res>0){
        $this->ajaxReturn(array('status'=>'ok'));
      // $this->success('删除成功');
        }else{
        $this->ajaxReturn(array('status'=>'no'));
    }

    }
//分页
//    public function fenye(){
//
//        $goods=M('Admin');
//        $message['goodsname']=array('like',"%".I("get.key")."%");
//        $count=$goods->where($message)->count();
//        $page=new \Think\Page($count,2);
//        $show=$page->show();
//        $goodslist=$goods->where($message)->limit($page->firstRow.','.$page->listRows)->select();
//        $map['key']=I('get.key');
//        foreach($map as $key=>$val){
//            $page->parameter[$key]= urlencode($val);
//        }
//        $this->assign('page',$show);
//        $this->assign('goodslist',$goodslist);
//        $this->assign('firstRow',$page->firstRow);
//        $this->display('adminlist');
//    }




//分页
    public function fenye(){
        $p=I('get.p');
        $key=I('get.key');
        $goods=M('Admin');
        if(isset($key)&& !empty($key)){
            $message['username']=array('like',"%".$key."%");

        }

        $count=$goods->where($message)->count();
        $page=new \Think\Page($count,5);
        $show=$page->show();
        $goodslist=$goods->where($message)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();

        $map['key']=I('get.key');
        foreach($map as $key=>$val){
            $page->parameter[$key]= urlencode($val);
        }
        $this->assign('count',$count);
        $this->assign('p',$p);
        $this->assign('title','首页');
        $this->assign('page',$show);
        $this->assign('goodslist',$goodslist);
        $this->assign('firstRow',$page->firstRow);
        $this->display('adminlist');
    }

    public function qs(){

        $arr=I('post.ji');
       if(isset($arr) && !empty($arr)){
           $admin=M('Admin');
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