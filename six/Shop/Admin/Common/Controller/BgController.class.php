<?php
namespace Admin\Common\Controller;
use Think\Controller;
class BgController extends Controller
{
    public function __construct()
    {
        parent::__construct();
//        session(null);
          if(!session('admin')){
          $this->redirect('Login/login');
          }/*else{
              $auth=new \Think\Auth();
              $rule=MODULE_NAME."/".CONTROLLER_NAME."/".ACTION_NAME;
              $result=$auth->check($rule,session("aid"));
              if(!$result){
                  $this->error("您没有权限访问");
              }
          }*/
    }

}
