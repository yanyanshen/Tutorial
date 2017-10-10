<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller
{
    public function login(){
        if (IS_AJAX) {
            $admin =M('Admin');

            if ($data=$admin->create()) {
                $data['username']=trim($data['username']);
                $data['password']=md5(trim($data['password']));
                $info=$admin->where($data)->find();

                if($info){
                    session('aid',$info['id']);
                    session('aname',trim(I('post.username')));
                    session('verify',null);
                    if(isset($_POST['remember'])&&$_POST['remember']==1){
                        ini_set('session.gc_maxlifetime',3600*24*7);
                        setcookie(session_name(),session_id(),time()+3600*24*7,'/');
                    }
                    $a['lasttime']=time();
                    //$a['ip'] = $_SERVER['REMOTE_ADDR'];
                    $where['id']=$info['id'];
                    $b=$admin->field('lasttime')->where($where)->save($a);

                    if($b){
                        $this->success('登录成功');
                    }else{
                        $this->error('登录失败');
                    }
                }else{
                    $this->error('账号或密码错误');
                }

            } else {
                $this->error($admin->getError());
            }
        } else {
            $this->display('login');
        }


    }
    public function checkLogin(){
        $admin=D('Admin');
        if(IS_AJAX){
            $where['username']=I('post.username');
            if($admin->where($where)->find()){
                echo 'true';
            }else{
                echo 'false';
            }
        }

    }
    //产生验证码
    public function verify()
    {
        $config = array(
            'fontsize' => 30,    //验证码字体大小
            'length' => 4,     //验证码位数
            'useNoise' => true,  //关闭验证码杂点
            'useCurve' => true,  //关闭验证码干扰曲线
            'codeSet' => '1234567890',
        );
        $verify = new Verify($config);
        $verify->entry();
    }

    //检查验证码是否可用
    public function checkVerify()
    {
        $verify = new Verify();
        $code = I('post.verify');
        if ($verify->check($code, '')) {
            echo 'true';
        } else {
            echo 'false';
        };
    }
    public function logout(){
        session('aid',null);
        session('aname',null);
        $this->success('退出成功',U('Login/login'));
    }
}
