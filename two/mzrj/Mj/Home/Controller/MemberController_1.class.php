<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller{
    public function index(){
     $this->display('reg');
    }

    public function register(){
        if(IS_POST){
          $member=D('Member');
         $mid=$member->register();
          if($mid>0){
              session('mid',$mid);
              session('mname',trim(I('post.username')));
              $info['status']='ok';
              $info['msg']='注册成功';
              M('Member_money')->add(array('mid'=>$mid));
          }else{
              $info['status']='error';
              $info['msg']='注册失败';
          }
       $this->ajaxReturn($info);
       }else{
           $this->display('reg');
       }
    }
    public function getVerify(){
        $config=array(
            'fontSize'=>100,
            'length'=>4,
            'useNoise'=>false,
           'useImgBg'=>true,

            //  '参数  描述
            'useCurve'=>false,
        );
        $Verify = new \Think\Verify($config);

        $Verify->entry();
    }
    //验证码验证
    function checkYzm(){
        $verify = new \Think\Verify();
        $code=trim(I('post.yzm'));
        if($verify->check($code,'')){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    //用户名验证
     public function chkUsername(){
         $username=trim(I('post.username'));
         $member=M('Member');
         $num=$member->where(array('username'=>$username))->count();
         if($num){
             echo 'false';
         }else{
             echo  'true';
         }
     }
  //登录
    public function login(){
       /* print_r($_SERVER['HTTP_REFERER']);
        die;*/
        $url=$_SERVER['HTTP_REFERER'];
     if(IS_POST){
       $member=D('Member');
        $id=$member->login();
        if($id>0){

            session('mid',$id);
            session('mname',trim(I('post.username')));
            $info['status']='ok';
            $info['msg']='登录成功';

           }else{
            $info['status']='error';
            $info['msg']='登录失败';
           }
            $this->ajaxReturn($info);
        }else{
         $this->assign('url',$url);
           /*  $tz=$_SERVER['HTTP_REFERER'];
            $this->assign('tz',$tz);*/
            $this->display('login');
        }
    }

    public function logout(){
        session(null);
        session('mycar_',null);
        $this->ajaxReturn(array('status'=>'ok'));
    }


    //修改个人信息

    public function memberinfo(){

        if(IS_POST){
            $obj= D("Member");
            if($obj->create()){
                $data['username']=trim(I('post.username'));
                $data['mobile']=I('post.mobile');
                $data['email']=I('post.email');
                if($obj->where(array('id'=>session('mid')))->save($data)){

                    $this->ajaxReturn(array('status'=>'ok'));
                }
            }else{
                $this->ajaxReturn(array('status'=>'no'));
            }
        }
        $this->display('memberinfo');
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

}