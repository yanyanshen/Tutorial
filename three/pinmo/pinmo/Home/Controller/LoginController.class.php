<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller
{//登录
    public function login(){
        if(IS_POST){
            $login=D('Login');
            if($mid=$login->login()){
                session('mid',$mid);
                session('mname',trim(I('post.username')));
                $userid['mid']=session('mid');
                $carinfo=M('car')->where($userid)->select();
                if($carinfo){
                    foreach($carinfo as $val){
                        $b['id']=$val['goodsid'];
                        $goods=M('goods')->where($b)->find();
                        $goods['num']=$val['num'];
                        $_SESSION['m'.$val['mid']]['g'.$val['goodsid']]=$goods;

                    }
                    //dump($_SESSION['m'.$userid['mid']]);
                }
                $this->ajaxReturn(array('status'=>'ok','msg'=>'用户登录成功'));

            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'用户名密码错误'));
            }

        }else{
            $this->display();
        }
    }
    //创建购物车session
   /* public function _after_login(){
        $userid['mid']=session('mid');
        $carinfo=M('car')->where($userid)->select();
        if($carinfo){
            foreach($carinfo as $val){
                $b['id']=$val['goodsid'];
                $goods=M('goods')->where($b)->find();
                $goods['num']=$val['num'];
                $_SESSION['m'.$val['mid']]['g'.$val['goodsid']]=$goods;
                dump($_SESSION['m'.$val['mid']]);
            }
        }
    }*/
    //退出操作之前执行购物车信息的写入操作
    public function  _before_logout(){
        $data['mid']=session('mid');
        foreach($_SESSION['m'.$data['mid']] as $val){
            $data['goodsid']=$val['id'];
            $data['num']=$val['num'];
           // dump($data);
            $a['mid']=$data['mid'];
            $a['goodsid']=$data['goodsid'];
            //dump($a);
            $b=M('car')->where($a)->find();
            //dump($b);
            if($b>0){
                M('car')->where( $a)->save($data);
            }else{
                M('car')->add($data);
            }

        }
    }
    //退出登录
    public function logout(){
        session('mid',null);
        session('mname',null);
        $this->ajaxReturn(array('status'=>'ok','msg'=>'用户退出成功'));
    }
//验证码
    public function verify()
    {
        $config = array(
            'fontSize' => 30,    // 验证码字体大小
            'length' => 3,     // 验证码位数
            'useNoise' => true, // 关闭验证码杂点
            'useCurve' => false,

        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
//验证验证码的方法
    public function chkVerify()
    {
        $verify = new \Think\Verify();
        $code = I('post.code');
        if ($verify->check($code, '')) {
            echo 'true';
        } else {
            echo 'false';
        };
    }
}