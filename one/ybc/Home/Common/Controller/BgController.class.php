<?php
namespace Home\Common\Controller;
use Think\Controller;
class BgController extends Controller{
    public function __construct(){
        parent::__construct();
        session(true);
        if (!session('ybc_id')) {
            $this->redirect('Login/login');//重定向

        }
    }
}