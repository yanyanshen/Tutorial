<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf8");
class UserController extends controller{
    public function index(){

        $this->display();

    }
    //异步
    public function test1(){
        $username=trim($_POST['name']);
        $user=D('User');
        $res=$user->where("username='$username'")->find();
        if($res>0){

            echo 'false';
        }else{
            echo 'true';
        }
    }
    public function test2(){
        $username=trim($_POST['name']);
        $user=D('User');
        $res=$user->where("username='$username'")->find();
        if($res>0){

            echo 'true';
        }else{
            echo 'false';
        }
    }

//登录
    public function login(){
        if(IS_POST){
            $username=trim(I('post.name'));
            $pwd=md5(trim(I('post.mm')));
            $user=D('User');
            $result= $user->where("username='$username' AND pwd='$pwd'")->find();
            if($result){
                if($result['level']>0){
                session('id',$result['id']);
                session('username',$username);
                    session('level',$result['level']);
                //登录之前从数据库中拿出购物车的信息放到session中
                $uid=session('id');
                $sname='mycart_'.$uid;
                //把登录之前的购物车转移到登录后里
                if(!empty($_SESSION['mycart'])){
                    $_SESSION[$sname]=$_SESSION['mycart'];
                    unset($_SESSION['mycart']);
                }
                //把数据库里的购物车信息放到session中
                $cart=M('Cart as c');
                $arr['uid']=$uid;
                if($cart->where($arr)->find()){
                    $sql="select g.gid,goodsname,buynum,pic,price,num from shang_cart as ca ,shang_goods as g  where ca.gid=g.gid and uid={$uid}";
                    $goods=$cart->query($sql);
                    foreach($goods as $val){
                        $gid1=$val['gid'];
                        $_SESSION[$sname][$gid1]=$val;
                    }
                }
                    $uid=session('id');
                    $sname='mycart_'.$uid;
                    $mygoods=$_SESSION[$sname];
                    $num=count(array_filter($mygoods));
                    session('num',$num);
                $this->ajaxReturn(array('status' => 'ok', 'msg' => '登录成功','gid'=>session('gid')));
            }else{
                    $this->ajaxReturn(array('status' => 'error', 'msg' => '用户名已被禁用'));
                }
            }else{
                $this->ajaxReturn(array('status' => 'error', 'msg' => '用户名和密码不匹配'));

            }
        }
        else{
            $this->display();
        }
    }

    //注册
    public function register(){
        if(IS_POST){
            $user=D('User');
            if($user->create()){
                $id=$user->add( );
                if($id){
                    session('id',$id);
                    session('username',I('post.name'));
                    $this->ajaxReturn(array('status' => 'ok', 'msg' => '注册成功'));
                }else{
                    $this->ajaxReturn(array('status' => 'error', 'msg' => '注册失败'));
                }
            }else{
                $this->ajaxReturn(array('status' => 'error', 'msg' => $user->getError()));
            }
        }else{
            $this->display();
        }
    }
    //验证码
    public function verify(){
        $config=array(
            'fontSize'=>30,//验证码大小
            'length'=>2,//验证数
            'useNoise'=>false,//关闭验证码杂点
            'useImgBg'=>false,//验证码背景
            'useCurve'=>false,//是否使用混淆曲线 默认为true
            'fontttf'=>'1.ttf',//字体样式
        );
        $Verify=new \Think\Verify($config);
        $Verify->entry();
    }
//验证函数
    public function checkVerify(){
        $verify = new \Think\Verify();
        $code=I('post.verify');
        if($verify->check($code, '')){
            echo'true';
        }else{
            echo 'false';
        }
    }
    public function logout(){
        $cart=M('Cart');
        $cart->save();
        session('username',null);
        session('id',null);
        session('level',null);
        session('gid',null);
        session('num',null);
        $this->ajaxReturn(array('status'=>'ok'));

    }
    function  _before_logout(){
        $uid=session('id');
        $gid=session('car_gid');
        $sname='mycart_'.$uid;
        $data['uid']=$uid;
        $data['gid']=$gid;
        $data['buynum']=$_SESSION[$sname][$gid]['buynum'];
        $cart=M('Cart');
        if(!empty($_SESSION[$sname][$gid])){
           if($res=$cart->find($uid)){
               $data['buynum']= $res['buynun']+$data['buynum'];
               $cart->where(array('uid'=>$uid))->save($data);
           }else{
                    $cart->add($data);
                }
            }
    }
}