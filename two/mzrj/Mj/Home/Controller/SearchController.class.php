<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller{


    public function _initialize(){
        // $list=A('Home/Index')->categoryList();
        $goods=array_reverse($_SESSION['mycar_'],true);
        // print_r($goods);
        $this->assign('goods',$goods);
        //$this->assign('list',$list);
    }

    public function index(){

        $keywords=I('get.keywords');


        //分页
        if($keywords){
            $goods = M('Goods');
            $message['goodsname'] = array('like', "%" . $keywords . "%");
            $count = $goods->where($message)->count();
            $page = new \Think\Page($count, 3);
            $show = $page->show();
            $goodslist = $goods->where($message)->limit($page->firstRow . ',' . $page->listRows)->select();
            $map['keywords'] =$keywords;
            foreach ($map as $key => $val) {
                $page->parameter[$key] = urlencode($val);
            }
            $this->assign('count',$count);
            $this->assign('page', $show);
            $this->assign('goodslist', $goodslist);
            $this->assign('firstRow', $page->firstRow);
            $this->display('search');
        }else{
            $this->display('search');
        }

    }


    public function secondcate(){
     //二级分类搜索
        $cid1=I('get.cid1');
        $name1=I('get.name1');
       $catenamelist= M('Category')->field('cid')->where(array('pid'=>$cid1))->select();
       // print_r($catenamelist);
        $obj=M('Goods');

       foreach($catenamelist as $k=>$v){
           $count[]=$obj->where(array('cid'=>$v['cid']))->count();
           $val = array_values($count);
           $sum=array_sum($val);
           $page = new \Think\Page($sum, 3);
           $show=$page->show();
           $goodslist[]=$obj->where(array('cid'=>$v['cid']))->limit($page->firstRow . ',' . $page->listRows)->select();
       }
     // print_r($sum);
        foreach($goodslist as $k1=>$v1){
          foreach($v1 as $v2){
              $catelist[]=$v2;
          }
        }

        $this->assign('count',7);
        $this->assign('page', $show);
        $this->assign('name', $name1);
        $this->assign('goodslist', $catelist);
        $this->assign('firstRow', $page->firstRow);
        $this->display('search');
    }

    public function thirdcate(){
        $cid2=I('get.cid2');
        $name=I('get.name');
    //三级分类搜索
            $count =M('Goods')->where(array('cid'=>$cid2))->count();
            $page = new \Think\Page($count, 3);
            $show = $page->show();
            $goodslist =M('Goods')->where(array('cid'=>$cid2))->limit($page->firstRow . ',' . $page->listRows)->select();
            $this->assign('count',$count);
            $this->assign('page', $show);
            $this->assign('name', $name);
            $this->assign('goodslist', $goodslist);
            $this->assign('firstRow', $page->firstRow);
            $this->display('search');

    }


}