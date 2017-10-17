<?php
namespace Admin\Controller;
use Think\Controller;
Class CommonController extends Controller{
    public function _initialize(){
        if(!isset($_SESSION[C('USER_AUTH_KEY')])){
            $this->redirect('Admin/Login/login');
        }

        $notAuth=in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION')));

        if(C('USER_AUTH_ON') && !$notAuth){
            $rbac= new \Org\Util\Rbac;
            $rbac::AccessDecision()||$this->error('没有权限!',U('Index/main'),1);
        }
    }
}