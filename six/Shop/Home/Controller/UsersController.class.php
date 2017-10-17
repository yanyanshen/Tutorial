<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class UsersController extends Controller{
    public function registered($length=8){
        $chars='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $nickname='';
        for($i=0;$i<=$length;$i++){
            $nickname.=$chars[mt_rand(0,strlen($chars)-1)];
        }
        if(IS_AJAX){
            $user=D('Users');
            $date=$user->create();
            if($date){
                $date['nickname']=$nickname;
                $date['password']=md5($date['password']);
                $date['lastdate']=time();
                $date['regdate']=time();
                $date['loginnum']=1;
                $mid=$user->registered($date);
                if($mid){
                    session('uid',$mid);
                    session('username',trim(I('post.username')));
                    session('loginnum',1);
                    // 更新用户登录信息
                    $where['id'] = session('uid');
                    $this->success('注册成功');
                }else{
                    $this->error('注册失败');
                }
            }else{
                $this->error($user->getError());
            }
        }else{
            $this->display();
        }
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
                $hist=session("history");
                $collect=session("collect");
                $uid=session("uid");
                $cart1=M("cart");
                $hist1=M("history");
                $collect1=M("collect");
                $data=array();
                $info=array();
                $info1=array();
                if(isset($hist)&&$hist>0){

                    foreach($hist as $k3=>$v3){
                        $info1['gid']=$v3["gid"];
                        $info1['addtime']=$v3["addtime"];
                        $info1['uid']=$uid;
                        // $info=$hist1->where("uid=".$uid." and gid=".$hist["gid"])->find();
                        // if($info){
                        //     $hist1->create($info1);
                        //     $info1['addtime']=$hist['addtime'];
                        //     $id=$hist1->where("uid=".$uid." and gid=".$hist["gid"])->setField("addtime",$info1['addtime']);
                        // }else{
                            $hist1->create($info1);
                             $hist1->add($info1);
                        // }
                        
                    }
                }
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
    public function chkUserName(){
        $username=I('post.username');
        if(M('users')->where(array('username'=>$username))->find()){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    public function chkName(){
        $username=I('post.username');
        if(!M('users')->where(array('username'=>$username))->find()){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    public function verify(){
        $vid=I('get.vid');
        $config=array(
            'fontSize'=>35,
            'useCurve'=> true, //取消线干扰 默认true
            'length'=> 2,  //验证码的位数
            'bg'=> array(247,68,97),  //验证码背景颜色RGB格式 随机抽取
            'useNoise'=> false, //关闭杂点 默认为TRUE
            'useImgBg'=> false, //开启背景图片
            // 'codeSet'=>'15SdS4748652' , //设置验证吗字符集合
            // 'useZh'=>true,
            // 'zhSet'=>'天天向上'  //默认没有中文字体
        );
        $verify = new verify($config);
        $verify->entry($vid);
    }
    public function chkVerify(){
        $verify=new Verify();
        $code=I('post.verify');
        if($verify->check($code,'')){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    public function out(){
        $_SESSION=array();
        if(isset($_COOKIE['session_name'])){
            setcookie(session_name(),'',time()-1,'/');
        }
        session('uid',null);
        //session('[destroy]');
        $this->redirect('index/index');
    }

    public function reword(){
        $this->display();
    }
    public function setPwdOne(){
        $name=$_GET['username'];
        $users=M('Users');
        $user=$users->where(array('username'=>$name))->field('id,email,nickname,mobile')->find();
        $this->assign('data',$user);
        $this->display();
    }

    public function geetest_show_verify(){
        $geetest_id=C('GEETEST_ID');
        $geetest_key=C('GEETEST_KEY');
        $geetest=new \Org\Yh\Geetest($geetest_id,$geetest_key);
        $user_id = "test";
        $status = $geetest->pre_process($user_id);
        $_SESSION['geetest']=array(
            'gtserver'=>$status,
            'user_id'=>$user_id
        );
        echo $geetest->get_response_str();
    }
    /**
     * geetest submit 提交验证
     */
    public function geetest_submit_check(){
        $data=I('post.');
        $where=I('post.username');
        $user=M('Users');
        $users=$user->where(array('username'=>$where))->field('username,mobile,nickname')->find();

        $this->assign('users',$users);
        if ($this->geetest_chcek_verify($data) && $users){
            session('nickname',$users['nickname']);
            echo $this->success($where);
        }else{
            echo $this->error('用户名或验证码错误');
        }
    }
    /**
     * geetest ajax 验证
     */
    public function geetest_ajax_check(){
        $data=I('post.');
        echo intval($this->geetest_chcek_verify($data));
    }
    /**
     * geetest检测验证码
     */
    public function geetest_chcek_verify($data){
        $geetest_id=C('GEETEST_ID');
        $geetest_key=C('GEETEST_KEY');
        $geetest=new \Org\Yh\Geetest($geetest_id,$geetest_key);
        $user_id=$_SESSION['geetest']['user_id'];
        if ($_SESSION['geetest']['gtserver']==1) {
            $result=$geetest->success_validate($data['geetest_challenge'], $data['geetest_validate'], $data['geetest_seccode'], $user_id);
            if ($result) {
                return true;
            } else{
                return false;
            }
        }else{
            if ($geetest->fail_validate($data['geetest_challenge'],$data['geetest_validate'],$data['geetest_seccode'])) {
                return true;
            }else{
                return false;
            }
        }
    }
    public function send_email(){
        $email=I('post.email');
        $id=I('post.id');
        $user=M('Users');
        $result=$user->where(array('id'=>$id,'email'=>$email))->field('id,email,username')->find();
        $passwordToKen=md5($result['id'].$result['username'].$result['password']);
        $link="<p>http://www.yhit.com/index.php/Home/Users/setPwdtwo/passwordToken/{$passwordToKen}</p><br>(此链接24小时之内点击有效 超过24小时请重新请求)";
        $time=time();
        $data=date('Y-m-d H:i:s',$time);
        if($result==0){
            session('passwordToken',$passwordToKen);
            $this->error('该邮箱尚未注册');
        }else{
            $time=time();
            cookie('passwordToken',$passwordToKen,3600*24);
            $user->where(array('id'=>$id,'email'=>$email))->field('passwordtime,passwordtoken')->setField(array('passwordtime'=>$time,'passwordtoken'=>$passwordToKen));
            $content="{$result['username']},您好!<br>您于:{$data}<br>提交了密码申请找回<br><br>请复制下面的链接重置你的密码:<br><p></p>".$link;
            $title='重置密码';
            $sendResult=send_email($email,$title,$content);
            if(isset($sendResult)&& $sendResult['error']!=1){
                $this->success('邮件发送成功');
            }else{
                $this->error('邮件发送失败');
            }
        }
    }
    public function setPwdTwo(){
        if(IS_AJAX){
            $password=md5(I('post.password'));
            $session=session('passwordToken');
            $users=M('Users');
            $reword=$users->where(array('passwordtoken'=>$session))->field('id,passwordtoken')->find();
            if($reword['passwordtoken']==$session['passwordToken'] ){
                $users->where(array('passwordToken'=>$session))->field('password')->setField(array('password'=>$password));
                session('passwordToken',null);
                $this->success('Users/setPwdThree');
            }else{
                $this->error('你访问的链接已失效');
            }
        }else{
            $this->display();
        }
    }
    public function setPwdThree(){
        $this->display();
    }
    public function send_code(){
        $mobile = I('post.mobile');
        $code = rand(1000, 9999);
        session('code', $code, time() + 60 * 10);
        session('tel', $mobile, time() + 60 * 10);
        $users = M('Users');
        $user = $users->where(array('mobile' => $mobile))->field('mobile,nickname')->find();
        $phone = $user['mobile'];
        if($mobile == $user['mobile']){
            $send_sms_code=send_sms_code($phone,$code);
            if($send_sms_code==null){
                echo 2;
            }else{
                echo 1;
            }
        }else{
            echo 0;
        }
    }
    public function code_send(){
        $code_send=I('post.code');
        $code=session('code');
        $tel=session('tel');
        $user=M('Users');
        $users=$user->where(array('mobile'=>$tel))->field('mobile,nickname')->find();
        if($users['mobile']==$tel && $code_send==$code){
            echo 1;
        }else if($code_send!==$code){
            echo 0;
        }else{
            if(!$users['mobile']){
                echo 2;
            }
        }
    }
    public function rePassword(){
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
