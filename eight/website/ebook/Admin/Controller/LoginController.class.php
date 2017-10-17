<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    //显示视图
    public function login(){
        $this->display();
    }
    //调用验证码
    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->fontSize =30;
        $Verify->length   = 3;
        $Verify->entry();
    }
    //登录表单处理
    public function getlogin(){
        if(!IS_POST)halt('页面不存在');
        $code=I('post.verify');
        $verify = new \Think\Verify();
        if(!$verify->check($code)){
            $this->error('验证码错误！',U('Index/index'),1);
        }
        $pwd=md5(I('post.password'));
        $username=I('post.username');
        $user=M('user')->where(array('username'=>$username))->find();
        if(!$user || $user['password'] !=$pwd){
            $this->error('账户或密码错误！',U('Index/index'),1);
        }

        $data=array(
              'id'=>$user['id'],
              'logintime'=>time(),
              'loginip'=>get_client_ip(),
      );
        M('user')->save($data);
        session(C('USER_AUTH_KEY'),$user['id']);
        session('username',$user['username']);
        session('logintime',date('Y-m-d H:i:s',$user['logintime']));
        session('loginip',$user['loginip']);
        if($user['username']==C('RBAC_SUPEADMIN')){
              session(C('ADMIN_AUTH_KEY'),true);
         }

         $rbac= new \Org\Util\Rbac;
         $rbac::saveAccessList();
         $this->redirect('Index/index');




//           if($_POST){
//               $data['username']=I('post.username');
//               $data['password']=md5(I('post.password'));
//               $code=I('post.verify');
//               $verify = new \Think\Verify();
//               if($verify->check($code)) {
//                   $user=M('User');
//                   $admin=$user->where($data)->find();
//                   if($admin){
//                       $get=array(
//                           'id'=>$admin['id'],
//                           'logintime'=>time(),
//                           'loginip'=>get_client_ip(),
//                       );
//                       M('user')->save($get);
//                       session(C('USER_AUTH_KEY'),$admin['id']);
//                       session('username',$admin['username']);
//                       session('logintime',date('Y-m-d H:i:s',$admin['logintime']));
//                       session('loginip',$admin['loginip']);
//                       //超级管理员识别
//                       if($admin['username']==C('RBAC_SUPEADMIN')){
//                           session(C('ADMIN_AUTH_KEY'),true);
//                       }
//                       $rbac= new \Org\Util\Rbac;
//                       $rbac::saveAccessList();
//                       dump($_SESSION);
//                       exit;
//                      // echo $admin['id'];
//                      //$rbac::getAccessList($admin['id']);
//
//                       $this->success('登录成功！',U('Index/index'));
//                   }else{
//                       $this->error('账户密码错误！');
//                   };
//               }else{
//                   $this->error('验证码错误！');
//               };
//
//               }
           }

}