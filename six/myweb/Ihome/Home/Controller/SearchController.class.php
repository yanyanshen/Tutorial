<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller{
    public function search(){
        $data=trim(I('get.searchwords'));
        $cid=trim(I('get.cid'));
        if($data){
            session('searchwords',$data);
            unset($_SESSION['cid']);
        }else if($cid){
            session('cid',$cid);
            unset($_SESSION['searchwords']);
        }
        $model = M('goods');
        if(!$_SESSION['cid']) {
            $count = $model->where("goodsname like '%{$_SESSION['searchwords']}%'")->count();
            $Page = new \Think\Page($count, 6);
            $show = $Page->show();
            if(trim(I('get.act'))==1){
                $searchlist = $model->where("goodsname like '%{$_SESSION['searchwords']}%'")->limit($Page->firstRow.','.$Page->listRows)->order('createtime desc')->select();
            }else if(trim(I('get.act'))==2){
                $searchlist = $model->where("goodsname like '%{$_SESSION['searchwords']}%'")->limit($Page->firstRow . ',' . $Page->listRows)->order('price desc')->select();
            }else if(trim(I('get.act'))==3){
                $searchlist = $model->where("goodsname like '%{$_SESSION['searchwords']}%'")->limit($Page->firstRow . ',' . $Page->listRows)->order('salenum desc')->select();
            }else{
                $searchlist = $model->where("goodsname like '%{$_SESSION['searchwords']}%'")->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
        }else{
            $count=$model->where(array('cid'=>$_SESSION['cid']))->count();
            $Page = new \Think\Page($count, 6);
            $show = $Page->show();
            if(trim(I('get.act'))==1){
                $searchlist = $model->where(array('cid'=>$_SESSION['cid']))->limit($Page->firstRow.','.$Page->listRows)->order('createtime desc')->select();
            }else if(trim(I('get.act'))==2){
                $searchlist = $model->where(array('cid'=>$_SESSION['cid']))->limit($Page->firstRow . ',' . $Page->listRows)->order('price desc')->select();
            }else if(trim(I('get.act'))==3){
                $searchlist = $model->where(array('cid'=>$_SESSION['cid']))->limit($Page->firstRow . ',' . $Page->listRows)->order('salenum desc')->select();
            }else{
                $searchlist = $model->where(array('cid'=>$_SESSION['cid']))->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
        }
        $guesslist=M('goods')->select();
        $this->assign('guesslist',$guesslist);
        $this->assign('searchlist',$searchlist);
        $this->assign('page',$show);
        $this->assign('position',$data);
        $this->assign('count',$count);
        $this->assign('num',($Page->firstRow+6)/6);
        $this->display('Search/search');
    }

}