<?php
namespace Mobile\Common\Controller;
use Think\Controller;
class BgController extends Controller{
    public function __construct(){
        parent::__construct();
        if(!session('ybc_id')){
            $this->redirect('Login/login');
        }
    }

}