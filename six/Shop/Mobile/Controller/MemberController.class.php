<?php
namespace Mobile\Controller;
use Think\Controller;
use Mobile\Model\CollectModel;
class MemberController extends Controller{
    public function _initialize(){
        if(!session('username')){
           $this->redirect("Users/login");
        }
    }
    public function personal(){
        $userinfo=M('users')->where(array('username'=>session('username')))->find();
        $obj=new  \Mobile\Model\CollectModel();
        $like=$obj->like();

        session('avatar',$userinfo['avatar']);
        $this->assign('like',$like);
        $this->assign("userinfo",$userinfo);
        $this->display();
    }
    public function collect(){
        $obj=new CollectModel();
        $collect=$obj->collect();
        $this->assign("collect",$collect);
        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->display();
        }
    }
    public function delcollect(){
        $obj=new CollectModel();
        $rel=$obj->delcollect(I('post.id'));
        if($rel){
            $this->success('删除成功');
        }else{
            $this->error('删除失败，请稍后再试');
        }
    }

}

?>