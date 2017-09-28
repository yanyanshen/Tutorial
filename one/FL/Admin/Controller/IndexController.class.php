<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function _initialize(){
        if(session('mid')<1){
            header("location:/Admin/Admin/login");
        }
    }
    public function index(){
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $this->display();
    }
    public function left(){
        $this->display();
    }
    public function top(){
        $this->display();
    }
    public function main(){

    	 $Admin=M("Admin");
        $mid=$_SESSION['fl_admin']['mid'];
        $data=$Admin->where(array('id'=>$mid))->select();
        if(!$data[0]['login_lasttime']){
            $login_lasttime=time();
        }else{
            $login_lasttime=$data[0]['login_lasttime'];
        }
       if(!$data[0]['login_lastip']){
           $login_lastip=$_SERVER[REMOTE_ADDR];
       }else{
           $login_lastip=$data[0]['login_lastip'];
       }
        $this->assign('loginTime',$login_lasttime);
        $this->assign('loginIp',$login_lastip);
        $this->assign("username",$data[0]['username']);
    	
        $this->display();
    }
    public function footer(){
        $this->display();
    }
    public function clearCache(){
        $this->display();
    }
}