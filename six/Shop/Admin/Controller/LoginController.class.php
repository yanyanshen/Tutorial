<?php
namespace Admin\Controller;
use     Think\Controller;
class LoginController extends Controller{
    public function login(){
        header("Content-Type:text/html;charset=utf-8");
        if(IS_POST){
            $username = I('username');
            $password = md5(I('password'));
            $code = I('captcha');
            $verify = new \Think\Verify();
            if(!$verify->check($code)){
                $this->redirect('Login/login');
            }
            if(D('Admin')->checkUser($username,$password)){
                $this->redirect('Index/index');
            }else{
                $this->redirect('Login/login');
            }
            return;
        }
        $this->display();
    }

    public function Code(){
        //创建验证码类的实例
        $verify = new \Think\Verify();
        //清空ob缓存
        ob_clean();
        //设置初始化验证码
        $verify -> codeSet = "0123456789";
        $verify -> length = "2";
        $verify -> fontSize = "30px";
        $verify -> bg = array(228,223,252);
//        $verify -> bg = array(200,206,200);
        $verify -> useCurve = false;
        $verify -> useNoise = false;
        $verify -> useImgBg = true; //背景图片
        //显示验证码,并且保存在session中
        $verify -> entry();
        //如果感觉不好看可以通过tplx\ThinkPHP\Library\Think\Verify.class.php里面进行设置
    }
    public function logout(){
        session('ordernews',null);
        session('admin',null);
        $this->redirect('Login/login');
    }

}
