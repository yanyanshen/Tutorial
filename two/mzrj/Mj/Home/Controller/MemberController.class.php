<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller{
    public function index()
    {
        $this->display('login');
    }

//注册页面处理程序
    public function reg(){
        if(IS_POST){
            $member=D('Member');
            $mid=$member->register();
            if($mid){
                session('mid',$mid);
                session('mname',trim(I('post.username')));
                $info['status']='ok';
                $info['msg']='注册成功';
            }else{
                $info['status']='error';
                $info['msg']='注册失败';
            }
            $this->ajaxReturn($info);
        }else{
            $this->display();
        }
    }

//检查用户名
    public function chkUsername(){
        $Member=M('Member');
        $username=I('post.username');

        if($Member->where(array('username'=>$username))->count()){
            echo  'false';
        }else{
            echo 'true';
        }
    }

//验证码
    public function verify(){
        $config =    array(
            'fontSize'    =>    80,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    true, // 关闭验证码杂点
            'useImgBg'    =>    true,
            'useCurve'    =>    false,
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

//验证验证码
    public function chkVerify(){
        $verify = $_SESSION['send_code'];
        $code=I('post.yzm');

        if($verify==$code){
            echo 'true';
        }else{
            echo 'false';
        };

    }

//登录
    public function login(){
        $tz=$_SERVER['HTTP_REFERER'];
        if(IS_POST){
            $member=D('Member');
            if($mid=$member->login()){
                session('mid',$mid);
                session('mname',trim(I('post.username')));
                $this->ajaxReturn(array('status'=>'ok','msg'=>'用户登录成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'用户名密码错误'));
            }

        }else{
            $this->assign('url',$tz);
            $this->display();
        }

    }

//退出
    public function logout(){
        session('mid',null);
        session('mname',null);
        $this->ajaxReturn(array('status'=>'ok'));
    }

//生成验证码
    function random($length = 6 , $numeric = 0) {
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        if($numeric) {
            $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }

//发送信息
    public function sendMsg(){
        $_SESSION['send_code'] = $this->random(6,1);

        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";

        $mobile = $_POST['mobile'];
        //$mobile = 15537176334;
        $send_code = $_SESSION['send_code'];


        // $mobile_code = random(4,1);
        if(empty($mobile)){
            exit('手机号码不能为空');
        }

        if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
            //防用户恶意请求
            exit('请求超时，请刷新页面后重试');
        }

        $post_data = "account=cf_1742863232&password=15537176334&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$send_code."。请不要把验证码泄露给其他人。");
        //密码可以使用明文密码或使用32位MD5加密
        $gets =  $this->xml_to_array($this->Post($post_data, $target));

        if($gets['SubmitResult']['code']==2){
            $_SESSION['mobile'] = $mobile;
            $_SESSION['mobile_code'] = $send_code;
        }
        echo $gets['SubmitResult']['msg'];
    }

    function Post($curlPost,$url){
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $return_str = curl_exec($curl);
        curl_close($curl);
        return $return_str;
    }

    function xml_to_array($xml){
        $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
        if(preg_match_all($reg, $xml, $matches)){
            $count = count($matches[0]);
            for($i = 0; $i < $count; $i++){
                $subxml= $matches[2][$i];
                $key = $matches[1][$i];
                if(preg_match( $reg, $subxml )){
                    $arr[$key] = $this->xml_to_array( $subxml );
                }else{
                    $arr[$key] = $subxml;
                }
            }
        }
        return $arr;
    }

    //判断是否登陆
    public function log(){

        $mid=session('mid');
        if($mid>0){
            $this->ajaxReturn(array('status'=>'ok'));
        }else{
            $this->ajaxReturn(array('status'=>'no'));
        }
    }

}

