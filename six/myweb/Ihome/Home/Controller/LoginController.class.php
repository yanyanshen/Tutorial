<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
/*商城登录控制器*/
    public function login(){
        if(!empty($_POST)){
            //校验用户名和密码
            $username=trim($_POST["username"]);
            $pwd=md5($_POST["pwd"]);
            //利用model模型的自定义方法校验用户名和密码
            $member=new \Home\Model\MemberModel();
            $info=$member->checkNamePwd($username,$pwd);
            if($info){
                //更新lastlogintime数据
                //持久化用户信息，并做页面跳转
                session('membername',$info['username']);
                session('mid',$info['mid']);
                $this->ajaxReturn(array('status'=>'ok','msg'=>'用户登录成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'用户名密码错误'));
            }
        }
        $this->display('Login/login');
    }

//退出系统
    public function logout(){
        //清空session
        session('mid',null);
        session('membername',null);
        $this->ajaxReturn(array('status'=>'ok'));
    }

//验证码产生
    public function verify(){
        $config=array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        $res=$verify->check($code, $id);
        return $res;
    }

//校验验证码输入是否正确
    public function check_code()
    {
        $code = $_POST['yzm'];
        $check_code = $this->check_verify($code);
        if ($check_code) {
            echo "true";
        } else {
            echo "false";
        }
    }


//验证用户名是否已经使用
    public function check_user(){
        $data['username']=trim($_POST['username']);
        $h=M('member');
        $res= $h->where($data)->find();
        if($res){
            echo "false";
        }else{
            echo "true";
        }
    }

//验证手机号码是否已经使用
    public function check_mobile(){
        $data['mobile']=trim($_POST['mobile']);
        $h=M('member');
        $res= $h->where($data)->find();
        if($res){
            echo "false";
        }else{
            echo "true";
        }
    }

    /*商城注册控制器*/
    public function register(){
        if(!empty($_POST)){
            $data['username']=trim($_POST['username']);
            $data['pwd']=md5($_POST['pwd']);
            $data['mobile']=$_POST['mobile'];
            $data['createtime']=time();
            $member=M('Member');
            $res=$member->data($data)->add();
            if($res>0){
                session('membername',$data['username']);
                session('mid',$res);
                $info['status']='ok';
                $info['msg']='用户注册成功';
            }else{
                $info['status']='error';
                $info['msg']='用户注册失败';
            }
            $this->ajaxReturn($info);
        }else{
            $this->display('Login/reg');
        }
    }
}