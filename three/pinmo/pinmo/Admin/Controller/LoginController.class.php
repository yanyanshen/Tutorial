<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller
{
    public function index(){
        if(IS_POST){
            $admin=D('Login');
            if($aid=$admin->login()){
                $data1['creatime']=time();
                $data1['ip']= get_client_ip();
                M('adminuser')->where("id=$aid")->save($data1);
                session('aid',$aid);
                session('aname',trim(I('post.adminname')));
                $this->ajaxReturn(array('status'=>'ok','msg'=>'用户登录成功'));

            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'用户名密码错误,或该账户已被禁用'));
            }

        }else{
            $this->display();
        }
        /*if (IS_POST) {
            $data = I('post.');
            $name = $data['adminname'];
            $pwd = $data['password'];
            $code = $data['verify'];
            if ($this->checkVerify($code)) {
                $admin = M('adminuser');
                $info = $admin->where("adminname=$name" && "password=$pwd")->find();
                if ($info > 0) {
                    session('uid', $info['id']);
                    session('name', $info['adminname']);
                    $this->success('登录成功', 'Admin/Index/index');
                } else {
                    $this->error('登录失败，请重新登录');
                }
            } else {
                //$this->ajaxreturn('验证码不正确请重新输入');
            }
        } else {
            $this->display();
        }*/


    }

    public function verify()
    {
        $config = array(
            'fontSize' => 30,    // 验证码字体大小
            'length' => 3,     // 验证码位数
            'useNoise' => false, // 关闭验证码杂点'
        );
        $verify = new \Think\Verify($config);
        $verify->entry();
    }

    /* public function checkVerify($code, $id = ''){
         $verify = new \Think\Verify();
         return $verify->check($code, $id);
     }*/
    public function chkVerify()
    {
        $verify = new \Think\Verify();
        $code = I('post.verify');
        if ($verify->check($code, '')) {
            echo 'true';
        } else {
            echo 'false';
        };
    }
    public function logout(){
        $id=session('aid');
        $time=M('adminuser')->where("id='$id'")->getField('creatime');

        $data['lasttime']=$time;
        M('adminuser')->where("id='$id'")->save($data);
        session('aid',null);
        session('aname',null);
        header('location:index');
    }
}