<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $indexModel=new \Home\Model\IndexModel();
        $firstgoods=$indexModel->getAllChildCateByCid(1);
        $secondgoods=$indexModel->getAllChildCateByCid(2);
        $thirdgoods=$indexModel->getAllChildCateByCid(3);
        $forthgoods=$indexModel->getAllChildCateByCid(4);
        $fivegoods=$indexModel->getAllChildCateByCid(5);

        /*全部商品列表*/
        if(!$firstlist=S('list')) {
            $firstlist = $indexModel->firstcategory();
            S('list',$firstlist,3600);
        }
        $this->assign('firstlist',$firstlist);

        /*商品展示层*/
        $this->assign('firstGoods',$firstgoods);
        $this->assign('secondGoods',$secondgoods);
        $this->assign('thirdGoods',$thirdgoods);
        $this->assign('forthGoods',$forthgoods);
        $this->assign('fiveGoods',$fivegoods);

        $src=  D('Link')->limit('14')->select();
        $link=array();
        $i=0;
        foreach( $src as $v ){
            $v['imgsrc']=(end(explode('/',$v['imgsrc'])));
            $i++;
            $link[$i]=$v;
        }
        $this->assign('link',$link);
        $this->display('Index/index');
    }

}