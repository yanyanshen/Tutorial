<?php
namespace Mobile\Controller;
use Think\Controller;
class GoodslistController extends Controller{
    public function index(){
        if(isset($_GET['keywords'])){
               $keywords=$_GET['keywords'];
              $this->assign('keywords',$keywords);
        }else{
            $keywords=false;
        }
     if(isset($_GET['category1'])){
           $category1=$_GET['category1'];
          $this->assign('category1',$category1);
     }else{
         $category1=false;
     }
        if(isset($_GET['brand'])){
             $brand=$_GET['brand'];
            $this->assign('brand',$brand);
        }else{
            $brand=false;
        }
        if(isset($_GET['order'])){
           $order=$_GET['order'];
            $this->assign('order',$order);
        }else{
            $order=false;
        }
           $model=D('goodslist');
           $res=$model->getcategoodsinfo($keywords,$category1,$brand,$order);

           $this->assign('goodsinfo',$res);
           $this->display();
    }

}