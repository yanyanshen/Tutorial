<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\CategoryModel;
use Admin\Model\BrandModel;
use Admin\Model\GoodsModel;
use Think\Image;
use Think\Page;
use Think\Upload;
class GoodsController extends Controller {
    public function add(){
        $ob54=new GoodsModel();
        $fCate=$ob54->getAllTopCate();
        $brand=$ob54->getAllBrand();
        $this->assign('brand',$brand);
        $this->assign('fCate',$fCate);
        $this->display('add');
    }

    public function addgood(){
        if(IS_POST){
            $goodsinfo = I('post.');
            if (I('thirdCate')) {
                $goodsinfo['cid'] = I('thirdCate');
            } elseif (!I('thirdCate') && I('secondCate')) {
                $goodsinfo['cid'] = I('secondCate');
            } elseif (!I('thirdCate') && !I('secondCate')) {
                $goodsinfo['cid'] = I('firstCate');
            }
            if ($_FILES['pic']['tmp_name'][0]) {
                $upload = new Upload();
                $upload->maxSize = 1024 * 1024 * 3;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->rootPath = './upload/';
                $upload->savePath = 'n0/';
                $upload->autoSub = false;
                $info = $upload->upload();
                if (!$info) {
                    echo $upload->getError();
                } else {
                    $filename = '';
                    foreach ($info as $k => $v) {
                        $thum = new Image();
                        $filepath = './upload/n0/';
                        $fullname = $filepath . $v['savename'];
                        $thum->open($fullname);
                        $thum->thumb(350, 350)->save('./upload/n1/' . $v['savename']);
                        $thum->thumb(150, 150)->save('./upload/n2/' . $v['savename']);
                        $thum->thumb(50, 50)->save('./upload/n3/' . $v['savename']);
                        $filename .= ',' . $v['savename'];
                    }
                    $goodsinfo['pic'] = substr($filename, 1);
                }
            }
            $obj = new GoodsModel();
          if ($obj->saveGoods($goodsinfo)){
              $this->ajaxReturn(array('status' => 'ok','msg' =>"添加成功gg"));
          } else {
               $this->ajaxReturn(array('status' => 'error','msg' => '添加失败'));
            }
        }
        }



        public function glist(){
            $obj=new GoodsModel();
            $goodssearch['name']=I('name')?I('name'):'';
            $goods=$obj->getAllGoods($goodssearch['name']);
            $count=count($goods);
            $page=new \Think\Page($count,5);
            foreach($goodssearch as $k=>$v){
                $page->parameter[$k]=$v;
            }
            $show=$page->show();
            $goodsList=$obj->getAllGoods($goodssearch,$page->firstRow,$page->listRows);
            $cate=new GoodsModel();
            foreach($goodsList as $k=>$v){
                $goodscate=$cate->getCate($v['cid']);
                $goodsList[$k]['catename']=$goodscate['catename'];
            }
            $picn=explode(',',$goodsList['pic']);
            $this->assign('goodsList',$goodsList);
            $this->assign('picn',$picn);
            $this->assign('page',$show);
            $this->display();
        }
    public function adk(){
        $this->display();
    }
    public function edit(){
       /* if (IS_POST) {*/
            $id = I('id');
            $obj = new GoodsModel();
            $goods = $obj->getGoodsById($id);
            $cateModel = new GoodsModel();
            $catename=$cateModel->getCate($goods['cid']);
            $brandname=$cateModel->getbrand($goods['brandid']);
            $goods['catename']=$catename['catename'];//分类名
            $goods['brandname']=$brandname['name'];//品牌名
            $pic=explode(',',$goods['pic']);
            /*print_r($goods);*/
            $this->assign('goods', $goods);
            $this->assign('pics', $pic);
            $this->display('edit');
    }

    //保存编辑的商品到数据库
    public function editSave(){
        if (IS_POST) {
            $goodsinfo = I('post.');
            if ($_FILES['pic']['tmp_name'][0]) {
                $upload = new Upload();
                $upload->maxSize = 1024 * 1024 * 3;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->rootPath = './upload/';
                $upload->savePath = 'n0/';
                $upload->autoSub = false;
                $info = $upload->upload();
                if (!$info) {
                    echo $upload->getError();
                } else {
                    $filename = '';
                    foreach ($info as $k => $v) {
                        $thum = new Image();
                        $filepath = './upload/n0/';
                        $fullname = $filepath . $v['savename'];
                        $thum->open($fullname);
                        $thum->thumb(350, 350)->save('./upload/n1/' . $v['savename']);
                        $thum->thumb(150, 150)->save('./upload/n2/' . $v['savename']);
                        $thum->thumb(50, 50)->save('./upload/n3/' . $v['savename']);
                        $filename .= ',' . $v['savename'];
                    }
                    $goodsinfo['pic'] = substr($filename, 1);
                }
            }
            $obj = new GoodsModel();
            if ($obj->editSave($goodsinfo)) {
                $this->ajaxReturn(array('status' => 'ok', 'msg' => "修改成功GG"));
            } else {
                $this->ajaxReturn(array('status' => 'error', 'msg' => '修改失败'));
            }
        }
    }
    /*商品状态处理状态处理*/
    public function goodsissale(){
        if (IS_POST) {
            $id = I('post.id');
            $obj = new GoodsModel();
            $ad = M("Goods");
            $ads = $obj->getGoodsById($id);
            $adstate = $ads['state'];
            $data['state'] = $adstate ? 0 : 1;
            $data['creattime']=time();
            if ($ad->where(array("id" => $id))->save($data) > 0) {
                $this->ajaxReturn(array('status' => 'ok', 'msg' => '切换成功'));
            }
        }
    }
    //验证商品名是否存在
    public function checkName(){
        $code=trim(I('post.name'));
        $ad = M("Goods");
        if(!$ad->where(array("name"=>$code))->find()){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    public function delGoods(){
        if(IS_POST){
        $id=I('post.id');
        $obj=new GoodsModel();
        $ads=$obj->getGoodsById($id);
        $goodstate=$ads['state'];
        if($goodstate==0) {
            if($obj->delGoods($id)){
                $this->ajaxReturn(array('status' => 'ok', 'msg' => '删除成功'));
            }else{
                $this->ajaxReturn(array('status' => 'error', 'msg' => '删除失败'));
            }
        }else{
            $this->ajaxReturn(array('status' => 'error', 'msg' => '上架商品，无法删除'));
        }
        }
    }
    //删除checkbox选定商品
    public function delMoreGoods(){
        $data=I('post.data');
        $obj=new GoodsModel();
        for($i=0;$i<=count($data);$i++){
            $obj->delgood($data[$i]['value']);
        }
        $this->ajaxReturn(array('message'=>'删除成功!'));
    }

    public function addCate(){
        $obj=new CategoryModel();
        $fCate=$obj->getAllTopCate();
        $this->assign('fCate',$fCate);
        $this->display();
    }
    //添加分类到数据库
    public function saveCate(){
        if(!I('catename')){
            $this->error('分类名称不能为空');
        }
        $cate['fid']=I('firstCate');
        $cate['sid']=I('secondCate')?I('secondCate'):0;
        $cate['catename']=I('catename');
        $obj=new CategoryModel();
        if($obj->saveCate($cate)){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }
    //根据上级ID查找下级
    public function firstChildCate(){
        $id=I('fpid');
        $obj=new GoodsModel();
        $sCate=$obj->firstChildCate($id);
        echo $sCate;
    }
}