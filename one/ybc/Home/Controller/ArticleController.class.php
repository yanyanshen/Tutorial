<?php
namespace Home\Controller;

use Think\Controller;
use Think\Page;

class ArticleController extends Controller{


    //展示所有文章部分
    public function index()
    {

        if(IS_GET){
            $keyword=I('get.keyword');
            $search=I('get.search');
            $where[$search]=array('like',"%$keyword%");
            $this->assign('keyword',$keyword);
            $this->assign('search',$search);
        }else{
            $where='';
        }

        $article=M('Article');
        $count=$article->where($where)->count();
        $page=new Page($count,5);
        $show=$page->show();
        $list=$article->where($where)->order('dateline desc')->limit($page->firstRow.','.$page->listRows)->select();




        $this->assign('firstRow',$page->firstRow);
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->display('index');
    }

    //展示详细文章部分
    public function detail(){



        //print_r($_GET);
        $id=I('get.id');
        $article=M('Article');
        $where=array('id'=>$id);
        $info=$article->where($where)->find();
        //print_r($info);
        $info['content']=html_entity_decode($info['content']);
        $this->assign('info',$info);


        //--------修改的左侧广告栏
        $str14=D('Adcategory')->leftAd();
        $leftInfo=D('Adgood')->leftAd($str14);
        foreach($leftInfo as $k=>$v){
            $gid=$v['gid'];
            $leftInfo[$k]['goodsname']=M('goods')->where(array('id'=>$gid))->getField('goodsname');
        }
        $this->assign('leftInfo',$leftInfo);


        //--------修改的文章茶具广告
        $str15=D('Adcategory')->buttonTeaSet();
        $articleTeaSet=D('Adgood')->articleTeaSet($str15);
        foreach($articleTeaSet as $k=>$v){
            $gid=$v['gid'];
            $articleTeaSet[$k]['goodsname']=M('goods')->where(array('id'=>$gid))->getField('goodsname');
        }

        $this->assign('articleTeaSet',$articleTeaSet);

        //-----------修改的文章茶叶广告
        $keyword=$info['teatag'];
        $cateId=M('Category')->where(array('catename'=>$keyword))->getField('id');
        $goodsInfo=M('Goods')->where(array('cid'=>$cateId))->where(array('ad'=>1))->select();
        $str18='';
        foreach($goodsInfo as $v){
            $str18.=$v['id'].',';
        }
        $str16=D('Adcategory')->buttonTea();
        $articleTea=D('Adgood')->articleTea($str16,$str18);
        foreach($articleTea as $k=>$v){
            $gid=$v['gid'];
            $articleTea[$k]['goodsname']=M('goods')->where(array('id'=>$gid))->getField('goodsname');
        }
        $this->assign('articleTea',$articleTea);

        $this->display('detail');

    }



}