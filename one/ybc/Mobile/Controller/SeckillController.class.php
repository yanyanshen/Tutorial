<?php
namespace Mobile\Controller;
use Think\Controller;
class SeckillController extends Controller{
       public function index(){





            $model=D('Index');
            $newgoods=$model->newgoods();
            $this->assign('newgoods',$newgoods);

           $hotsalenum=$model->hotsalegoods();
           $this->assign('hotsalegoods',$hotsalenum);



           //限时促销
            $endtime=strtotime("2016-12-20 00:00:00");
            $nowtime=time();


            $this->assign('endtime',$endtime);
            $this->assign('nowtime',$nowtime);
             $this->display();
       }
}