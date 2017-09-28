<?php
namespace Home\Controller;
use Think\Controller;
class CustomController extends Controller{
/*    public function register(){  //设置一个方法 用来接收表单提交的数据
        $custom =D('Custom');    //实例化数据库
        if($custom->create()){   //利用create创建数据
            $data=$custom->create(); //用$data接受这个create创建的数据
            $data['custom_time']=time(); //根据数据库建立时间戳

         if($custom->add($data)){  //利用add写入数据库
                echo 'ok';
            }else{
                echo $custom->getLastSql(); //获取上次执行的sql语句
            };
        }else{
            echo $custom->getError(); //返回错误信息
        };

    }*/

/*    //检测验证码是否一致
    public function chkVerify(){
        $verify = new \Think\Verify();
        $code=I('post.verify');
       if($verify->check($code, '')){
           echo 'true';
       }else{
           echo 'false';
       };
    }*/

  /*  //检测用户名是否重名
    public function chkUser(){
        $username=I("post.custom_username");
        $custom=M('Custom');
        if($custom->where(array('custom_username'=>$username))->count()){
            echo 'false';
        }else{
            echo 'true';
        }

    }*/

    public function login(){
        if(IS_POST){
           /* $Custom=D('Custom');
            $mid=$Custom->login();
            if($mid>0){*/
            if(session('mid')>0){
                $this->ajaxReturn(array('status'=>'error','msg'=>'当前已有账号登录，请先退出'));
            }else{

                $Custom=D('Custom');
                if($arr=$Custom->login()){
                    if($arr['custom_go']){
                        $this->ajaxReturn(array('status'=>'error','msg'=>'用户被禁用'));
                    }else{
                        session('mid',$arr['custom_id']);
                        session('name',trim(I('post.custom_username')));
                        $cid=$_SESSION["fl_home"]['mid'];
                        if($cid) {
                            $_SESSION["cart_$cid"]= $_SESSION["cart"];
                        }
                        $this->ajaxReturn(array('status'=>'ok','msg'=>'用户登录成功'));

                    }
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'用户名密码错误'));
                }
            }

        }else{

            $url=I("get.url");
            if($url=='goback'){
                $url=$_SERVER[HTTP_REFERER];
            }elseif(!$url){
                $url='Home_Index_index';
            }
            $this->assign("url",$url);
            $this->display();
        }
    }


    public function register(){
        if(IS_POST){
            $Custom=D('Custom');
            if($Custom->create()){
                $mid=$Custom->register();
           }else{
                $info['status']='error';
                $info['msg']= $Custom->getError();
                $this->ajaxReturn($info);
            };

            if($mid){
                session('mid',$mid);
                session('name',trim(I('post.custom_username')));
                $info['status']='ok';
                $info['msg']='用户注册成功';
            }else{
                $info['status']='error';
                $info['msg']='用户注册失败';
            }
            $this->ajaxReturn($info);
        }else{
            $this->display();
        }
    }


    //退出登录
  public function logout(){
        session('mid',null);
        session('name',null);
        $this->ajaxReturn(array('status'=>'ok'));
    }


    //检测用户名是否重复
    public function chkUsername(){
        $Custom=M('Custom');
        $username=I('post.custom_username');

        if($Custom->where(array('custom_username'=>$username))->count()){
            echo  'false';
        }else{
            echo 'true';
        }
    }


    //检测邮箱是否重复
    public function chkEmail(){
        $custom=M("Custom");
        $email=I("post.custom_email");
        if($custom->where(array('custom_email'=>$email))->count()){
            echo "false";
        }else{
            echo "true";
        }
    }


    //验证码设置
    public function verify(){
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    true, // 关闭验证码杂点
            // 'useImgBg'   => true,
            // 'useCurve'  => false,
            //  'fontttf'   => 'msyh.ttf',
            // 'useZh' => true,
            // 'zhSet' => '河南云和数据科技有限公司网站开发工程师我们是最棒的'
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    //检测验证码是否一致
    public function chkVerify(){
        $verify = new \Think\Verify();
        $code=I('post.yzm');
        if($verify->check($code, '')){
            echo 'true';
        }else{
            echo 'false';
        };

    }

    public function isLogin(){
        $cid=$_SESSION['fl_home']['mid'];
        if($cid){
            echo "true";
        }else{
            echo "false";
        }
    }
}
