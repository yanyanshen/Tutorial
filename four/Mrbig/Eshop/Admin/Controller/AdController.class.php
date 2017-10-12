<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\AdModel;
use Think\Image;
use Think\Page;
use Think\Upload;
class AdController extends Controller {
    /*public function _initialize(){
        if(!session('aid')){
            header('location:/Admin/Login/index');
           $this->display('login/login');
           $this->error('请先登录!',U('/Admin/login'));
        }
    }*/
    public function ad(){
        $this->display();
    }
    public function adLayer(){
        $this->display();
    }
    public function addAd(){
        if(IS_POST){
        $adinfo=I('post.');
        if($_FILES['image']['tmp_name'][0]){
            $upload=new Upload();
            $upload->maxSize=1024*1024*3;
            $upload->exts=array('jpg','gif','png','jpeg');
            $upload->rootPath='./Public//Home/AD/';
            $upload->savePath='n0/';
            $upload->autoSub=false;
            $info=$upload->upload();
            if(!$info){
                echo $upload->getError();
            }else{
                $filename='';
                foreach($info as $k=>$v){
                    $thum=new Image();
                    $filepath='./Public/Home/AD/n0/';
                    $fullname=$filepath.$v['savename'];
                    $thum->open($fullname);
                    $thum->thumb(450,450)->save('./Public/Home/AD/n1/'.$v['savename']);
                    $filename.=','.$v['savename'];
                }
                $adinfo['image']=substr($filename,1);
            }
        }
        $obj=new AdModel();
        if($obj->saveAd($adinfo)){
            $this->ajaxReturn(array('status' => 'ok', 'msg' => '添加成功'));
        }else{
            $this->ajaxReturn(array('status' => 'error', 'msg' => '添加失败laaa'));
        }
    }
    }
    //检验广告名是否存在
    public function checkAdName(){
        $code=trim(I('post.adname'));
        $ad = M("Ad");
        if(!$ad->where(array("adname"=>$code))->find()){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    public function listAd(){
        $obj=new AdModel();
        $adsearch['adname']=I('adname')?I('adname'):'';
        $goods=$obj->getAllad($adsearch['adname']);
        $count=count($goods);
        $page=new \Think\Page($count,3);
        foreach($adsearch as $k=>$v){
            $page->parameter[$k]=$v;
        }
        $show=$page->show();
        $data=$obj->getAllad($adsearch,$page->firstRow,$page->listRows);
        $this->assign('page',$show);
        $this->assign('adList',$data);
        $this->display();
    }
    public function adedit(){
        $id=I("id");
        $abj=new AdModel();
        $ads=$abj->getAdById($id);
        $this->assign('ads',$ads);
        $this->display('editAd');
    }
    public function delAd(){
        if(IS_POST){
            $id = I('post.id');
            $obj = new AdModel();
            $ads=$obj->getAdById($id);
            $adstate=$ads['adstate'];
            if($adstate==0) {
                if ($obj->del($id)) {
                    $this->ajaxReturn(array('status' => 'ok', 'msg' => '删除成功'));
                } else {
                    $this->ajaxReturn(array('status' => 'error', 'msg' => '删除失败laaa'));
                }
            }else{
                $this->ajaxReturn(array('status' => 'error', 'msg' => '正在使用，无法删除'));
            }
        }
    }
    public function delMoreAd(){
        $data=I('post.data');
        /*print_r($data);*/
        $obj=new AdModel();
        for($i=0;$i<=count($data);$i++){
            $obj->del($data[$i]['value']);
        }
        $this->ajaxReturn(array('message'=>'删除成功!'));
    }

    /*广告状态处理*/
    public function issale(){
        if (IS_POST) {
            $id = I('post.id');
            $obj = new AdModel();
            $ad = M("Ad");
            $ads = $obj->getAdById($id);
            $adstate = $ads['adstate'];
            $data['adstate'] = $adstate ? 0 : 1;
            $data['addtime'] = time();
            if ($ad->where(array("id" => $id))->save($data) > 0) {
                $this->ajaxReturn(array('status' => 'ok', 'msg' => '切换成功'));
            }
        }
    }

}