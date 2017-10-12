<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\NewModel;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    public function _initialize(){
        if (session('aid') < 1) {
            /*header('location:/Admin/Login/index');*/
            /*$this->display('login/login');*/
            $this->error('请先登录!', U('/Admin/login'));
        }
    }


    public function left(){
        $this->display();
    }
    public function main(){
    $obj=new NewModel();
        $news=$obj->select();

        $order=M('Orderdetail');
        $c1=$order->where('statusid=1')->count();
        $c2=$order->where('statusid=2')->count();
        $c3=$order->where('statusid=3')->count();
        $c4=$order->where('statusid=4')->count();
        $c5=$order->where('statusid=5')->count();

        $this->assign('c1',$c1);
        $this->assign('c2',$c2);
        $this->assign('c3',$c3);
        $this->assign('c4',$c4);
        $this->assign('c5',$c5);



    $this->assign('newslist',$news);


    $this->display();


    }


    private function _deleteDir($R){
        $handle = opendir($R);
        while(($item = readdir($handle)) !== false){
            if($item != '.' and $item != '..'){
                if(is_dir($R.'/'.$item)){
                    $this->_deleteDir($R.'/'.$item);
                }else{
                    if(!unlink($R.'/'.$item))
                        die('error!');
                }
            }
        }
        closedir( $handle );
        return rmdir($R);
    }


    public function clearRuntime(){

        $R = $_GET['path'] ? $_GET['path']  : RUNTIME_PATH;
        if($this->_deleteDir($R)){
            /*$this->ajaxReturn(array('status' => 'error','msg' => '缓存已清'));*/
               $this->success('緩存已清');
    }
}



   }