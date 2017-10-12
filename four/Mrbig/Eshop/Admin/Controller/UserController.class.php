<?php
namespace Admin\Controller;
use Admin\Model\UserModel;
use Think\Controller;
use Think\Page;

class UserController extends Controller {
    public function index(){

    }
    //用户列表
    public function userList(){
        $obj=new UserModel();
        $data['username']=I('username');
        $user=$obj->getAllUser($data['username']);
        $count=count($user);
        $page=new Page($count,5);
        foreach($data as $k=>$v){
            $page->parameter[$k]=$v;
        }
        $show=$page->show();
        $userList=$obj->getAllUser($data['username'],$page->firstRow,$page->listRows);
        $this->assign('userList',$userList);
        $this->assign('page',$show);
        $this->display();
    }
    /*账户状态处理状态处理*/
    public function usestatus(){
        if (IS_POST) {
            $id = I('post.id');
            $obj = new UserModel();
            $ad = M("user");
            $ads = $obj->getUserById($id);
            $adstate = $ads['status'];
            $data['status'] = $adstate ? 0 : 1;
            if ($ad->where(array("id" => $id))->save($data) > 0) {
                $this->ajaxReturn(array('status' => 'ok', 'msg' => '切换成功'));
            }
        }
    }
    /*//删除checkbox选定商品
    public function delMoreUser(){
        $data=I('post.data');
        $ad=M("user");
        for($i=0;$i<=count($data);$i++){
            $da['status'] =1;
          if($ad->where(array("id"=>$data[$i]['value']))->save($da)>0){
              $this->ajaxReturn(array('status' => 'ok', 'msg' => '禁用成功'));
          };
        }
    }*/
    //删除会员
    public function delUser(){
        $id=I('id');
        $obj=new UserModel();
        if($obj->delUser($id)){
            $this->success('删除成功');
        }else{
            $this->success('删除失败');
        }
    }
}