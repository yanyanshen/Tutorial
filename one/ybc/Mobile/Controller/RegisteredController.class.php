<?php
namespace Mobile\Controller;
use Think\Controller;
use Think\Verify;

class RegisteredController extends Controller{
    public function registered(){
        if (IS_AJAX) {
            $member = D('Member');
            $data = $member->create();
            if ($data) {
                $uid = $member->add($data);
                if ($uid) {
                    session('ybc_id', $uid);
                    session('ybc_username', trim(I('post.username')));
                    $this->success('注册成功');
                } else {
                    $this->error('注册失败,请重新注册');
                }
            } else {
                $this->error($member->getError());
            }
        } else {
            $this->display();
        }
    }
    public function chkMobile(){
        $mobile = I('post.mobile');
        if (M('Member')->where(array('mobile' => $mobile))->find()) {
            echo 'false';
        } else {
            echo 'true';
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
    public function mobile(){
        if ($_POST) {
            if ($_POST['mobile'] != $_SESSION['mobile'] or $_POST['mobile_code'] != $_SESSION['mobile_code'] or empty($_POST['mobile']) or empty($_POST['mobile_code'])) {
                $this->error('验证码输入错误。');
            } else {
                $_SESSION['mobile'] = '';
                $_SESSION['mobile_code'] = '';
                $member = D('Member');
                $data = $member->create();
                $data['username'] = 'ybc_'.substr($_POST['mobile'],7,4);
                if ($data) {
                    $uid = $member->add($data);
                    if ($uid) {
                        session('ybc_id', $uid);
                        session('ybc_username', trim($data['username']));
                    }
                    $this->success('注册成功。');
                }
            }
        }
    }
}