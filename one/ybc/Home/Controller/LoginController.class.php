<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Home\Controller\OrderController;//符添加
use Home\Controller\CartController;//朱添加
class LoginController extends Controller{
    public function _before_login(){
        if(session('ybc_id')){
            $this->redirect('Index/index');
        }
    }
    public function login(){
        if (IS_AJAX) {
            $verify = new Verify();
            $code=I('post.verify');
            if($verify->check($code,'')){
                $login=M('Member');
                $where['username']=I('post.username');
                $where['mobile']=I('post.username');
                $where['_logic']='OR';
                $where1['_complex']=$where;
                $where1['password']=md5(I('post.password'));
                $result = $login->where($where1)->field('id,username,password,lasttime,lastip,active,avatar')->find();
                if ($result) {
                    if($result['active']==0){
                        $this->error('该账户已被冻结');
                    }
                    session('ybc_id', $result['id']);          // 当前用户id
                    session('ybc_username', $result['username']);   // 当前用户名
                    session('ybc_lasttime', $result['lasttime']);   // 上一次登录时间
                    session('ybc_lastip', $result['lastip']);       // 上一次登录ip
                    session('avatar1',$result['avatar']);
                    session('ybc_password',$result['password']);
                    //符添加，修改请告知
                    $order=new OrderController();
                    $order->chkOrders();//登录时检测所有未付款订单是否失效，将实效订单状态改为失效

                    //登录时把session中商品转移到购物车
                    $cart=new CartController();
                    $cart->addCart();

                    // 更新用户登录信息
                    $where['id'] = session('ybc_id');
                    $data['lasttime']=time();
                    $data['lastip']=session('ybc_lastip');
                    M('Member')->where($where)->save($data);   // 更新登录时间和登录ip

                    //判断登录成功后的跳转路径
                    if(session('url')){
                        $this->success('登录成功',session('url'));
                        session('url',null);
                    }else{
                        $this->success('登录成功',U('Index/index'));
                    }
                } else {
                    $this->error('用户名或密码错误!');
                }
            }else{
                $this->error('验证码错误');
            }
        } else {
            $this->display();
        }
    }
    public function verify(){
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    true, // 关闭验证码杂点
            'useCurve'   =>     true, //关闭验证码干扰曲线
            'codeSet'     => '1234567890',
        );
        $verify=new Verify($config);
        $verify->entry();
    }
    public function logout(){
        session('ybc_id',null);
        $this->redirect('Login/login');
    }
}