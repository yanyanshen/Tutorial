<?php
namespace Mobile\Controller;
use Think\Controller;
class UsersController extends Controller {
    public function collection(){

        $this->display();
    }
    public function indent(){
        $this->display();
    }
    public function personal(){

        $this->display();
    }
    public function login(){
        if(IS_AJAX){
            // 实例化Login对象
            $login = M('Users');
            // 组合查询条件
            $where = array();
            $where['username'] = trim(I('post.username'));
            $where['password'] = md5(trim(I('post.password')));
            //$where['lastip']=('lastip', 'get_client_ip', 1, 'function');
            $result = $login->where($where)->field('id,username,nickname,password,lastdate,lastip,loginnum,status' )->find();
            if ($result && $result['status']<=0) {
                session('uid', $result['id'],0);          // 当前用户id
                session('username', $result['username'],0);   // 当前用户名
                session('lastdate', $result['lastdate'],0);   // 上一次登录时间
                session('lastip', $result['lastip'],0);       // 上一次登录ip
                session('loginnum',$result['loginnum']);
                $where['id'] = session('uid');
                M('users')->where($where)->setInc('loginnum');   // 登录次数加 1
                $data['lastdate']=time();
                $data['lastip']=$_SERVER[REMOTE_ADDR];
                M('users')->where($where)->save($data);   // 更新登录时间和登录ip

                //购物车和收藏写入表
                $cart=session("cart");
                $collect=session("collect");
                $uid=session("uid");
                $cart1=M("cart");
                $collect1=M("collect");
                $data=array();
                $info=array();
                if(isset($cart)&&$cart>0){
                    foreach($cart as $k1=>$v1){
                        $data["gid"]=$v1["gid"];
                        $data["addtime"]=$v1["addtime"];
                        $data["buynum"]=$v1["buynum"];
                        $data["uid"]=$uid;
                        $cart1->create($data);
                        $cart1->add($data);
                    }
                }
                if(isset($collect)&&$collect>0){
                    foreach($collect as $k2=>$v2){
                        $info["gid"]=$v2["gid"];
                        $info["addtime"]=$v2["addtime"];
                        $info["buynum"]=$v2["buynum"];
                        $info["uid"]=$uid;
                        $collect1->create($info);
                        $collect1->add($info);
                    }
                }
                $this->success('登陆成功');
            } else {
                $this->error('登录失败,用户名或密码不正确!');
            }
        } else {
            $this->display();
        }
    }
    public  function register($length=8)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $nickname = '';
        for ($i = 0; $i < $length; $i++) {
            // 这里提供两种字符获取方式
            // 第一种是使用 substr 截取$chars中的任意一位字符；
            // 第二种是取字符数组 $chars 的任意元素
            // $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
            $nickname .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        if (IS_AJAX) {
            $user = D('Users');
            $date = $user->create();
            if ($date) {
                $date['nickname'] = $nickname;
                $date['password'] = md5($date['password']);
                $date['lastdate'] = time();
                $date['regdate'] = time();
                $date['loginnum'] = 1;
                $data['regip'] = $_SERVER['REMOTE_ADDR'];
                $mid = $user->where(array('nickname' => $nickname))->field('username,password,regdate,lastdate,mobile,regip,nickname')->add($date);
                if ($mid) {
                    session('uid', $mid);
                    session('username', trim(I('post.username')));
                    session('loginnum', 1);
                    // 更新用户登录信息
                    $where['id'] = session('uid');
                    $this->success('注册成功');
                } else {
                    $this->error('注册失败');
                }
            } else {
                $this->error($user->getError());
            }
        } else {
            $this->display();
        }
    }
    public function forget(){
        $this->display();
    }
    public function chkUserName(){
        $username=I('post.username');
        if(M('users')->where(array('username'=>$username))->find()){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    public function chkMobile(){
        $username=I('post.mobile');
        if(M('users')->where(array('mobile'=>$username))->find()){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    public function chkName(){
        $username=I('post.username');
        if(!M('Users')->where(array('username'=>$username))->find()){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    public function send_sms_code(){
        $mobile=I('post.tel');
        $username=I('post.username');
        $code=rand(1000,9999);
        session('code', $code, time() + 60 * 10);
        session('tel', $mobile, time() + 60 * 10);
        $users=M('Users');
        $sms=$users->where(array('username'=>$username))->field('mobile,username')->find();
        $phone=$sms['mobile'];
        if(IS_POST){
            if($sms['username']!==$username){
                echo 2;
            }else{
                if($sms['username']==$username && $sms['mobile']==$mobile){
                    send_sms_code($phone,$code);
                    echo 1;
                }else{
                    echo 3;
                }
            }
        }
    }
    public function personalhh(){
        $userinfo=M('users')->where(array('username'=>session('username')))->find();
        session('avatar',$userinfo['avatar']);
        $this->assign("userinfo",$userinfo);
        $this->display();

    }
    public function out(){
        $_SESSION=array();
        if(isset($_COOKIE['session_name'])){
            setcookie(session_name(),'',time()-1,'/');
        }
        session('uid',null);
        //session('[destroy]');
        $this->redirect('Mobile/users/personal');
    }
    public function send_Code(){
        $username=I('POST.username');
        $mobile=I('post.mobile');
        $code=I('post.Code');
        $code_send=session('code');
        $user=M('users');
        $users=$user->where(array('mobile'=>$mobile,'username'=>$username))->field('id,mobile,username')->find();
        if($username!==$users['username'] and $mobile!==$users['mobile']){
            echo 1;
        }else{
            if($code_send==$code){
                echo 0;
            }else{
                echo 3;
            }
        }
    }
    public function visions(){
        $password=strtolower(I('post.password'));
        $rePassword=strtolower(I('post.rePassword'));
        $tel=session('tel');
        $code=session('code');
        $user=M('Users');
        $users=$user->where(array('mobile'=>$tel))->field('id,mobile,nickname')->find();
        if(IS_AJAX){
            if($code!==''&& $tel!=='' &&$users['mobile']==$tel && $code){
                if($password==$rePassword){
                    $user->where(array('id'=>$users['id'],'mobile'=>$users['mobile'],'nickname'=>$users['nickname']))->setField(array('password'=>md5($password)));
                    session('tel',null);
                    session('code',null);
                    echo 0;
                }else{
                    echo  1;
                }
            }else{
                echo 2;
            }
        }
    }
}