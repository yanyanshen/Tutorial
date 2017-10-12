<?php
namespace Admin\Controller;
use Think\Controller;
header('Content-type:text/html;charset=utf-8');
class LoginController extends Controller{
    public function login(){
        if (IS_POST) {
            $admin = D('Admin');
            if (!$admin->create()) {
                $this->ajaxReturn(array('status' => 'ok', 'msg' => $admin->getError()));
            } else {
                if ($res = $admin->login()) {
                   if ($res['status'] < 1) {
                        $this->ajaxReturn(array('status' => 'error', 'msg' => '该管理员已经被禁用'));
                    } else {
                        $ti['time'] = time();//获取登录时间
                        $ti['ip'] = $_SERVER["SERVER_ADDR"];//获取登录ip
                        $last_ti['last_time'] = $res['time'];
                        $last_ti['last_ip'] = $res['ip'];
                        $admin->where(array('aid' => $res['aid']))->save($last_ti);//更新上次登录时间iP
                        $admin->where(array('aid' => $res['aid']))->save($ti);//更新本次登录时间ip
                            session('aid', $res['aid']);
                            session('adminname', $res['adminname']);//设置session
                            session('status', $res['status']);//设置session
                            $this->ajaxReturn(array('status' => 'ok', 'msg' => '用户登录成功'));
                            $this->ajaxReturn(array('status' => 'error', 'msg' => '用户登录失败'));
                    }
                } if(!$res['aid']){
                    $this->ajaxReturn(array('status' => 'error', 'msg' => '用户名不存在'));
                }else {
                    $this->ajaxReturn(array('status' => 'error', 'msg' => '密码错误'));
                }

            }

        } else {
            $this->display();
        }

    }
    public function verify(){
        $config=array(
            'fontSize'=>20,//验证码字体大小
            'length'=>1,  // 验证码位数
            //'useImgBg'=>true,   //是否使用背景图片 默认为false
            'useCurve'=>false,//是否使用混淆曲线 默认为true
            'useNoise'=>false,//是否添加杂点 默认为true
            'imageW'=>114,
            'imageH'=>46,
            // 'useZh'=>true,//是否使用中文验证码
            //'bg'=>array(220,120,120)//验证码背景颜色 rgb数组设置，例如 array(243, 251, 254)

        );
        $verify=new \Think\Verify($config);
        $verify->entry();
    }
    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串$id为多个验证码时verify编号
    public function checkVerify(){
        $verify = new \Think\Verify();
        $code=I('post.verify');
        if($verify->check($code, '')){
            echo  'true';
        }else{
            echo 'false';
        }
    }

}