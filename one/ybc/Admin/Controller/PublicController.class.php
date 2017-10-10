<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
class PublicController extends BgController{
    public function footer(){
        $this->display('footer');
    }
    public function left(){
        $this->display('left');
    }
    public function top(){
        $this->display('top');
    }
}