<?php
namespace Admin\Controller;
use Think\Controller;
class BrandController extends Controller{
    public function _initialize(){
        if(session('mid')<1){
            header("location:/Admin/Admin/login");
        }
    }
    public function addBrand(){
        if(IS_POST){
            $brand=M('Brand');
            if($brand->where(array('brand_name'=>I('post.brand_name')))->find()>0){
                redirect(U('addBrand'),1,"该品牌已存在，不能添加");
            }else{
                    $config=array(
                        'maxSize'=>3145728,
                        'rootPath'=>'./Uploads/',
                        'savePath'=>'Brand/',
                        'autoSub'=>false,
                        'exts'=>array('jpg','jpeg','png','gif')
                    );
                    $upload=new \Think\Upload($config);
                    $info=$upload->upload();
                    if($info){
                        foreach($info as $file){
                            $filename='./Uploads/'.$file['savepath'].$file['savename'];
                            $brandinfo['brand_pic']=$filename;
                        }
                    }
                $brandinfo['brand_name']=I('post.brand_name');
                $brandinfo['brand_createtime']=time();
                if($brand->data($brandinfo)->add()>0){
                    redirect(U('addBrand'),1,"添加成功");
                };
            }
        }else{
            $this->display();
        }
    }
   public function brandList(){
       $brand=M('Brand');
       $where['brand_name']=array('like',"%".I("post.key")."%");
       $count=$brand->where($where)->count();
       $map['key']=I('post.key');
       if($count>0){
           $Page=new \Think\Page($count,10);
           $show=$Page->show();
           $brandList=$brand->where($where)->order("brand_createtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
           foreach($map as $key=>$val){
               $Page->parameter[$key]=urlencode($val);
           }
           $firstRow=$Page->firstRow;
       }
       $this->assign("firstRow",$firstRow);
       $this->assign("page",$show);
       $this->assign("brandList",$brandList);
       $this->assign("keywords",$map['key']);
       $this->display();
    }
    public function editBrand(){
        $brand_bid=I("get.brand_bid");
        $brand=M("Brand");
        $brandinfo=$brand->where(array("brand_bid"=>$brand_bid))->select();
        $oldPic=$brandinfo[0]['brand_pic'];
        if(IS_POST){
            $config=array(
                'maxSize'=>3145728,
                'rootPath'=>'./Uploads/',
                'savePath'=>'Brand/',
                'autoSub'=>false,
                'exts'=>array('jpg','jpeg','png','gif')
            );
            $upload=new \Think\Upload($config);
            $info=$upload->upload();
            $data=$brand->create();
            if($info){
                foreach($info as $file){
                    $filename='./Uploads/'.$file['savepath'].$file['savename'];
                    $data['brand_pic']=$filename;
                }
                if(file_exists($oldPic)){
                    unlink($oldPic);
                }
            }
            $data['brand_name']=I("post.brand_name");
            $data['brand_createtime']=time();
            if($brand->where(array("brand_bid"=>$brand_bid))->data($data)->save()>0){
                redirect(U('brandList'),1,"编辑成功");
            }
        }else{
            $this->assign("brand_bid",$brandinfo[0]['brand_bid']);
            $this->assign("brand_name",$brandinfo[0]['brand_name']);
            $this->assign("brand_pic",$brandinfo[0]['brand_pic']);
            $this->display();
        }
    }
    public function delBrand(){
        $brand_bid=$_GET['brand_bid'];
        $prod=M("Prod");
        if($prod->where(array("prod_bid"=>$brand_bid))->find()>0){
            echo "该品牌下有商品，不能删除！";
        }else{
            $brand=M("Brand");
            $oldPic=$brand->where(array("brand_bid"=>$brand_bid))->getField("brand_pic");
            if($brand->where(array("brand_bid"=>$brand_bid))->delete()>0){
                if(file_exists($oldPic)){
                    unlink($oldPic);
                }
                echo "删除成功";
            }
        }
    }
}