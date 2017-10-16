<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
/*登录验证*/
    public function index(){
        if(IS_POST){
            $username=trim(strtolower(I('post.username')));
            $pwd=md5(trim(I('post.pwd')));
            $code=trim(strtolower(I('post.verify')));
//            if($this->checkVerify($code)){
                $loginModel = new \Admin\Model\LoginModel('Admin');
                $result = $loginModel->login($username,$pwd);
                if ($result) {
                     $_SESSION['vip']=$result['vip'];
                     $_SESSION['id']=$result['id'];
                     $_SESSION['username']=$username;  //seesion用户名
                    ////更新登陆信息
                    $date=array('id'=>$result['id'],'logintime'=>time(),'loginip'=>$_SERVER['REMOTE_ADDR']);
                    D('Admin')->update($date);
                    $this->display('Index/index');
                } else {
                    $this->display('login');
                    echo "<script>layer.alert('用户名或密码不正确')</script>>";
                }
//            }else{
//                echo "<script>alert('验证码不正确')</script>>";
//                $this->display('login');
//            }
        }
    }

/*验证码*/
    public function verify(){
        $config=array(
            'length'=>4
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }








/*登录验证码验证*/
    public function checkVerify(){
        $code=$_POST['code'];
        $verify=new \Think\Verify();
          if($verify->check($code)){
              echo "true";
          }
    }
}