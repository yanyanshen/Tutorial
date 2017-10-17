<?php
namespace Home\Controller;
use Think\Controller;
//class LoginController extends Controller{
//    public function login(){
//        if ($_POST){
//            $this->success('登录成功！', U('Index/index'));
//        }else
//        {
//            $this->display();
//        }
//           $this->display();
//
//
//    }
//}
//class LoginController extends Controller{
//    public function login(){
//        if ($_POST){
//            $admin=D('Member');
//            if($aid=$admin->Login()){
//                session('aid',$aid);
//                session('username',trim(I('post.username')));
//            }
//            $this->success('登录成功！', U('Index/index'));
//        }else{
//            $this->display();
//        }
//        $this->display();
//
//
//    }
//}
class LoginController extends Controller{

            public function login(){
                if(IS_POST){
                    $member=D('Member');
                    if($mid=$member->login()){
                        session('mid',$mid);
                        session('mname',trim(I('post.username')));
                        $url=I('post.backurl');
                        $this->ajaxReturn(array('status'=>'ok','msg'=>'用户登录成功','url'=>"{$url}"));
                    }else{
                        $this->ajaxReturn(array('status'=>'error','msg'=>'用户名密码错误'));
                    }

                }else {

                    $this->assign('backurl',$_SERVER[HTTP_REFERER]);
                    $this->display();
                }
    }

    public function register(){
        if(IS_POST){
            $member=D('Member');

            $mid=$member->register();

            if($mid){
                session('mid',$mid);
                session('mname',trim(I('post.username')));
                $info['status']='ok';
                $info['msg']='用户注册成功';
            }else{
                $info['status']='error';
                $info['msg']='用户注册失败';
            }
            $this->ajaxReturn($info);
        }else{
            $this->display();
        }
    }
    public function logout(){
        session_unset();
        session_destroy();
        echo "<script>alert('成功注销！');window.location.href='/Home/Index/index'</script>";
    }

    public function chkUsername(){
        $Member=M('Member');
        $username=I('post.username');

        if($Member->where(array('username'=>$username))->count()){
            echo  'false';
        }else{
            echo 'true';
        }
    }

    public function verify()
{
    $config = array(
        'fontSize' => 40,    // 验证码字体大小
        'length' => 3,     // 验证码位数
        'useNoise' => true, // 关闭验证码杂点
        'useImgBg' => false,
        'useCurve' => false,


    );
     $Verify = new \Think\Verify($config);
    $Verify->entry();
}


    public function chkVerify()
    {
        $verify = new \Think\Verify();
        $code = I('post.yzm');
        if ($verify->check($code, '')) {
            echo 'true';
        } else {
            echo 'false';
        };


    }
}