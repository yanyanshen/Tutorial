<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function login(){
        $this->display();
    }
    public function logins(){
        $custom=M('Custom');
        $data=$custom->where(array('custom_username'=>I('post.custom_username'),'custom_pwd'=>I('post.custom_pwd')))->select();
       if($data){
          session('mid',$data[0]['custom_id']);
          session('username',$data[0]['custom_username']);
          echo "<script>location.href='/index.php'</script>";
       }else{
           echo "你输入的密码不正确";
       };
    }
}