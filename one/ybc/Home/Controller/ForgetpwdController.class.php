<?php
namespace Home\Controller;
use Think\Controller;
class ForgetpwdController extends Controller{
    public function forgetpwd(){
        $this->display();
    }
    /**
     * geetest生成验证码
     */
    public function geetest_show_verify(){
        $geetest_id=C('GEETEST_ID');
        $geetest_key=C('GEETEST_KEY');
        $geetest=new \Org\GeeTest\Geetest($geetest_id,$geetest_key);
        $user_id = "test";
        $status = $geetest->pre_process($user_id);
        $_SESSION['geetest']=array(
            'gtserver'=>$status,
            'user_id'=>$user_id
        );
        echo $geetest->get_response_str();
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
        $geetest=new \Org\GeeTest\Geetest($geetest_id,$geetest_key);
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
    public function forgetpwd2(){
        if(IS_AJAX){
            $username=I('post.username');
            $userInfo=M('Member')->where(array('username'=>$username))->field('id,username,mobile,mail')->find();
            if($userInfo){
                if($userInfo['mobile']){
                    session('ybc_username',$userInfo['username']);
                    session('ybc_mobile',$userInfo['mobile']);
                    session('ybc_mail',$userInfo['mail']);
                    $this->success('验证成功');
                }else{
                    $this->error('未绑定手机号，暂无法找回密码');
                }
            }else{
                $this->error('验证失败');
            }
        }else{
            $this->display('forgetpwd2');
        }
    }
    public function forgetpwd3(){
        if(IS_AJAX){
            $member=M('Member');
            //$data=$member->create();
            $where['username']=session('ybc_username');
            $result=$member->where($where)->find();
            if($result){
                $data['password']=md5(I('password'));
                $member->where($where)->save($data);
                $this->success('重置密码成功！');
            }else{
                $this->error('重置失败');
            }
        }else{
            $this->display();
        }
    }
    public function forgetpwd4(){

        $this->display();
    }
    //验证用户名是否存在
    public function chkName(){
        $username=I('post.username');
        if(M('Member')->where(array('username'=>$username))->find()){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    public  function Post($curlPost, $url){
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
    public function xml_to_array($xml){
        $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
        if (preg_match_all($reg, $xml, $matches)) {
            $count = count($matches[0]);
            for ($i = 0; $i < $count; $i++) {
                $subxml = $matches[2][$i];
                $key = $matches[1][$i];
                if (preg_match($reg, $subxml)) {
                    $arr[$key] = $this->xml_to_array($subxml);
                } else {
                    $arr[$key] = $subxml;
                }
            }
        }
        return $arr;
    }
    function myRandom($length = 6, $numeric = 0){
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        if ($numeric) {
            $hash = sprintf('%0' . $length . 'd', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for ($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }
    public function mobileRegist(){
        session_start();
        header("Content-type:text/html; charset=UTF-8");
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
        $mobile = $_POST['mobile'];
        $mobile_code = $this->myRandom(4, 1);
        if (empty($mobile)) {
            exit('手机号码不能为空');
        }
        $post_data = "account=cf_gkc1994&password=5a1525b6d179fdb93925343783c9e743&mobile=" . $mobile . "&content=" . rawurlencode("您的验证码是：" . $mobile_code . "。请不要把验证码泄露给其他人。");
        $gets = $this->xml_to_array($this->Post($post_data, $target));
        if ($gets['SubmitResult']['code'] == 2) {
            $_SESSION['mobile'] = $mobile;
            $_SESSION['mobile_code'] = $mobile_code;
        }
        echo $gets['SubmitResult']['msg'];
    }
    public  function random($length = 6, $numeric = 0){
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        if ($numeric) {
            $hash = sprintf('%0' . $length . 'd', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for ($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }
    public function mobile(){
        if ($_POST) {
            if ($_POST['mobile'] != $_SESSION['mobile'] or $_POST['mobile_code'] != $_SESSION['mobile_code'] or empty($_POST['mobile']) or empty($_POST['mobile_code'])) {
                $this->error('验证码输入错误。');
            } else {
                $_SESSION['mobile'] = '';
                $_SESSION['mobile_code'] = '';
                    $this->success('验证成功');
                }
            }
        }
}