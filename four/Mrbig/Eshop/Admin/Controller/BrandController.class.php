<?php
namespace Admin\Controller;
use Admin\Model\BrandModel;
use Think\Controller;
use Think\Image;
use Think\Upload;
use Think\Page;

class BrandController extends Controller{

  public function brandList(){
      $brandssearch['name']=I('name')?I('name'):'';
      $obj=new BrandModel();
      $brands=$obj->getAllBrand($brandssearch['name']);
      $count=count($brands);
      $page=new \Think\Page($count,9);
      foreach($brandssearch  as $k=>$v){
          $page->parameter[$k]=$v;
      }
      $show=$page->show();
      $brandlist=$obj->getAllBrand($brandssearch,$page->firstRow,$page->listRows);
      $this->assign('brandlist',$brandlist);
      $this->assign('page',$show);
      $this->display();

      }



    public function checkName(){
        $code=trim(I('post.name'));
        $ad = M("brand");
        if(!$ad->where(array("name"=>$code))->find()){
            echo 'true';
        }else{
            echo 'false';
        }
    }


    public function saveBrand(){
         if(IS_POST){
            $brandsinfo=$_POST;
            $brandsinfo['ctime']=time();
            if ($_FILES['logo']['tmp_name'][0]) {
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
                    $brandsinfo['logo'] = substr($filename, 1);
                }
            }
            $obj = new BrandModel();
            if ($obj->saveBrand($brandsinfo)){
                $this->ajaxReturn(array('status' => 'ok','msg' =>"添加成功"));
            } else {
                $this->ajaxReturn(array('status' => 'error','msg' => '添加失败'));
            }
        }
    }

//渲染编辑品牌模板
    public function editBrand(){
        $data['id']=I('id');
        $obj=D('Brand');
        $brand=$obj->getBrandById($data['id']);
        $this->assign('brand',$brand);
        $this->display('edit');
    }

    //保存编辑的商品到数据库
   public function editSave(){
       if(IS_POST){
           $brandsinfo=$_POST;
           $brandsinfo['ctime']=time();
           if ($_FILES['logo']['tmp_name'][0]) {
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
                   $brandsinfo['logo'] = substr($filename, 1);
               }
           }
           $obj = new BrandModel();
           if ($obj->editSave($brandsinfo)){
               $this->ajaxReturn(array('status' => 'ok','msg' =>"添加成功"));
           } else {
               $this->ajaxReturn(array('status' => 'error','msg' => '添加失败'));
           }
       }
}


    public function delBrand(){
        if(IS_POST){
        $id=I('id');
        $obj=new BrandModel();
        if($obj->delBrand($id)){
            $this->ajaxReturn(array('status'=>'ok','message'=>'删除成功!'));
        }else{
            $this->ajaxReturn(array('status'=>'error','message'=>'删除成功!'));
        }
      }
    }

    public function delMoreBrands(){
        $obj=new BrandModel();
        $data=I('post.data');
        for($i=0;$i<=count($data);$i++){
            $obj->delBrands($data[$i]['value']);
        }
        $this->ajaxReturn(array('message'=>'删除成功!'));
    }


}