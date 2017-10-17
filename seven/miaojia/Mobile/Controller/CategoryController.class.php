<?php
namespace Mobile\Controller;
use Think\Controller;
class CategoryController extends Controller{
    public function categoryList(){
        $firstCate=F('firstCate/cate');
        $this->assign('firstCate',$firstCate);
        $this->display();
    }
}