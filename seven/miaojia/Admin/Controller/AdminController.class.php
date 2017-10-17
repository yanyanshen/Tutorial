<?php
namespace Admin\Controller;
use Admin\Model\AdminModel;
use Think\Controller;
class AdminController extends Controller{
    public function _initialize(){
        if(!session('admin_uid')){
            $this->redirect('Adminlogin/login');
        }
    }
    public function index(){

    }
    //渲染添加管理员模板
    public function add_admin(){
        $this->display();
    }
    //渲染管理员列表模板
    public function adminList(){
        $obj=new AdminModel();
        $adminList=$obj->getAllAdmin();
        $this->assign('adminList',$adminList);
        $this->display();
    }
    //ajax查询管理员账号是否存在
    public function chkUser(){
        $data['username']=I('username');
        $obj=new AdminModel();
        echo $obj->chkUser($data);
    }
    //保存添加管理员到数据库
    public function saveAdmin(){
        $data['username']=I('username');
        $data['passwd']=I('passwd');
        $obj=new AdminModel();
        if($obj->saveAdmin($data)){
            echo "添加成功";
        }else{
            echo "添加失败";
        }
    }

    //渲染编辑管理员模板
    public function editAdmin(){
        $data['id']=I('id');
        $obj=new AdminModel();
        $admin=$obj->getAdminById($data);
        $this->assign('admin',$admin);
        $this->display();
    }

    //更新编辑的管理员到数据库
    public function editSave(){
        $data['id']=I('id');
        $data['username']=I('username');
        $data['passwd']=I('passwd');
        $obj=new AdminModel();
        if($obj->editSave($data)){
            echo "编辑成功";
        }elseif(is_int($obj->editSave($data))){
            echo "数据没有任何变化";
        }else{
            echo "编辑失败";
        }

    }

    //删除管理员
    public function delAdmin(){
        $data['id']=I('id');
        $obj=new AdminModel();
        if($obj->delAdmin($data)){
            $this->success('删除成功',U('adminList',array('r'=>time())),2);
        }else{
            $this->error('删除失败');
        }
    }
}