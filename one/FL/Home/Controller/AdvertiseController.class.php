<?php
namespace Home\Controller;
use Think\Controller;
class AdvertiseController extends Controller{
    public function index(){
        $ad_url=$_GET[1];
        $ad=D("Advertise");
        $adData=$ad->getData($ad_url);
        $this->assign("adData",$adData);
        $this->display($ad_url);
    }
}