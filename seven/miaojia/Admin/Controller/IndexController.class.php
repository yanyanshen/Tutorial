<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _initialize(){

      if(!session('admin_uid')){
           $this->redirect('Adminlogin/login');
            /*$this->error('请先登录!',U('Adminlogin/login'));*/
        }
    }
    public function logout(){
        session('admin_uid',null);
        $this->redirect('Adminlogin/login');
        /*$this->error('安全退出!',U('Adminlogin/login'));*/
    }
    public function index(){
        $this->display();
    }
    public function kj(){
        //layout( true );
        $mysql_version=$this->_mysql_version();
        $this->assign('mysql_version',$mysql_version);
        $this->display();
    }
    private function _mysql_version()
    {
        $Model = new \Think\Model();
        $version = $Model->query("select version() as ver");
        return $version[0]['ver'];
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
        if($this->_deleteDir($R))
            $this->success("删除成功");

    }
}