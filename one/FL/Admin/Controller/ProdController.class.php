<?php
namespace Admin\Controller;
use Think\Controller;
class ProdController extends Controller{
    public function _initialize(){
        if(session('mid')<1){
            header("location:/Admin/Admin/login");
        }
    }
    public function addProd(){
        if(IS_POST){
            $prod=M('Prod');
            $prodinfo=$prod->create();
            if($prodinfo['prod_price']==''){
                $prodinfo['prod_price']=$prodinfo['prod_sale_price'];
            }
            $prodinfo['prod_createtime']=time();
                $prod_id=$prod->data($prodinfo)->add();
                $config=array(
                    'maxSize'=>3145728,
                    'rootPath'=>'./Uploads/',
                    'savePath'=>'Prod/',
                    'autoSub'=>false,
                    'exts'=>array('jpg','jpeg','png','gif')
                );
                $upload=new \Think\Upload($config);
                $info=$upload->upload();
                if($info){
                    foreach($info as $file){
                        $filename='./Uploads/'.$file['savepath'].$file['savename'];
                        $thumbname140='./Uploads/'.$file['savepath'].'140_'.$file['savename'];
                        $thumbname350='./Uploads/'.$file['savepath'].'350_'.$file['savename'];
                        $image=new \Think\Image();
                        $image->open($filename);
                        $image->thumb(140,140)->save($thumbname140);
                        $image->open($filename);
                        $image->thumb(350,350)->save($thumbname350);
                        $pic=M("Pic");
                        $picinfo['pic_prod_id']=$prod_id;
                        $picinfo['pic_name']="140_".$file['savename'];
                        $picinfo['pic_size']="140*140";
                        $pic->data($picinfo)->add();
                        $picinfo['pic_name']="350_".$file['savename'];
                        $picinfo['pic_size']="350*350";
                        $pic->data($picinfo)->add();
                        $picName[]=$file['savename'];
                    }
                    $prodpicinfo['prod_pic']=$picName[0];
                    if($prod->where("prod_id=$prod_id")->save($prodpicinfo)>0){
                        redirect(U('addProd'),1,"商品添加成功");
                    };
                }else{
                    redirect(U('addProd'),1,"图片上传错误");
                }
        }else{
            $brand=M("Brand");
            $brandNameList=$brand->select();
            $classNameList=ClassController::getClassList();
            $this->assign("brandNameList",$brandNameList);
            $this->assign("classNameList",$classNameList);
            $this->display();
        }
    }
    public function prodList(){
        //后台商品列表页
        $prod=M("Prod");
        $where['prod_name']=array('like',"%".I("post.key")."%");
        $where['prod_desc']=array('like',"%".I("post.key")."%");
        $where['prod_cid']=array('like',"%".I("post.key")."%");
        $where['_logic']='or';
        $map['key']=I("post.key");
        $count=$prod->where($where)->count();
        if($count>0){
            $page=new \Think\Page($count,5);
            $show=$page->show();
            $prodList=$prod->where($where)->order("prod_createtime desc")->limit($page->firstRow.','.$page->listRows)->select();

            foreach($map as $key=>$val){
                $page->parameter[$key]=urlencode($val);
            }
            $firstRow=$page->firstRow;

            //替换cid
            $cids=$prod->where($where)->order("prod_createtime desc")->limit($page->firstRow.','.$page->listRows)->field("prod_cid")->select();
            foreach($cids as $cid){
                $cidArr[]=$cid['prod_cid'];
            }
            $class=M("Class");
            $wherec['class_cid']=array('in',$cidArr);
            $classList=$class->where($wherec)->select();
            foreach($classList as $k=>$v){
                $pathArr=explode(',',$v['class_path']);
                $wherec1['class_cid']=array('in',$pathArr);
                $pathName=$class->where($wherec1)->field("class_name")->select();
                foreach($pathName as $pathK=>$pathV){
                    $pathStr.=$pathV['class_name'].'>';
                }
                $pathStr=mb_substr($pathStr,0,strlen($pathStr)-1);
                $classList[$k]['class_path']=$pathStr;
                unset($pathStr);
            }
            foreach($prodList as $k=>$v){
                foreach($classList as $k1=>$v1){
                    if($v['prod_cid']==$v1['class_cid']){
                        $prodList[$k]['prod_cid']=$v1['class_path'];
                    }
                }
            }
        }
        $this->assign("firstRow",$firstRow);
        $this->assign("page",$show);
        $this->assign("prodList",$prodList);
        $this->assign("keywords",$map['key']);
        $this->display();
    }

    public function toggleProd(){
        //更改商品上下架状态
        $prod_id=I("get.prod_id");
        $prod=M("Prod");
        $prod_go=$prod->where(array("prod_id"=>$prod_id))->getField("prod_go");
        $data['prod_go']=$prod_go?0:1;
        if($prod->where(array("prod_id"=>$prod_id))->save($data)>0){
            echo "状态修改成功！";
        };
    }

    public function editProd(){
        //商品编辑
        $prod_id=I("get.prod_id");
        $prod=M("Prod");
        if(IS_POST){
            $config=array(
                'maxSize'=>3145728,
                'rootPath'=>'./Uploads/',
                'savePath'=>'Prod/',
                'autoSub'=>false,
                'exts'=>array('jpg','jpeg','png','gif')
            );
            $upload=new \Think\Upload($config);
            $info=$upload->upload();
            $data=$prod->create();
            if($info){
                $pic=M("Pic");
                $oldThumbPics=$pic->where(array("pic_prod_id"=>$prod_id))->field("pic_name")->select();
                $pic_pid=$pic->where(array("pic_prod_id"=>$prod_id))->getField("pic_pid");
                foreach($info as $file){
                    $filename='./Uploads/'.$file['savepath'].$file['savename'];
                    $thumbname140='./Uploads/'.$file['savepath'].'140_'.$file['savename'];
                    $thumbname350='./Uploads/'.$file['savepath'].'350_'.$file['savename'];
                    $image=new \Think\Image();
                    $image->open($filename);
                    $image->thumb(140,140)->save($thumbname140);
                    $image->open($filename);
                    $image->thumb(350,350)->save($thumbname350);
                    $picinfo['pic_prod_id']=$prod_id;
                    $picinfo['pic_name']="140_".$file['savename'];
                    $picinfo['pic_size']="140*140";
                    $pic->where(array("pic_pid"=>$pic_pid))->data($picinfo)->save();
                    $pic_pid++;
                    $picinfo['pic_name']="350_".$file['savename'];
                    $picinfo['pic_size']="350*350";
                    $pic->where(array("pic_pid"=>$pic_pid))->data($picinfo)->save();
                    $pic_pid++;
                    $picName[]=$file['savename'];
                }
                $data['prod_pic']=$picName[0];
                foreach($oldThumbPics as $thumbPic){
                    $thumbPicFile="./Uploads/Prod/".$thumbPic['pic_name'];
                    $oldPic=substr($thumbPic['pic_name'],4);
                    $oldPicFile="./Uploads/Prod/".$oldPic;
                    if(file_exists($thumbPicFile)){
                        unlink($thumbPicFile);
                    }
                    if(file_exists($oldPicFile)){
                        unlink($oldPicFile);
                    }
                }
            }
            $data['prod_createtime']=time();
            if($prod->where(array("prod_id"=>$prod_id))->save($data)>0){
                redirect(U('prodList'),1,'商品编辑成功');
            }
        }else{
            $Pic=M("Pic");
            $pics=$Pic->where(array("pic_prod_id"=>$prod_id))->field('pic_name')->select();
            $prodinfo=$prod->where(array("prod_id"=>$prod_id))->select();
            $prodinfo[0]['prod_pic']=$pics;
            $brand=M("Brand");
            $brandNameList=$brand->select();
            $classNameList=ClassController::getClassList();
            $this->assign("brandNameList",$brandNameList);
            $this->assign("classNameList",$classNameList);
            $this->assign("prodinfo",$prodinfo);
            $this->display();
        }
    }

    public function delProd(){
        //删除商品
        $prod_id=I("get.prod_id");
        $prod=M("Prod");
        $pic=M("Pic");
        $oldThumbPics=$pic->where(array("pic_prod_id"=>$prod_id))->field("pic_name")->select();
        foreach($oldThumbPics as $thumbPic){
            $thumbPicFile="./Uploads/Prod/".$thumbPic['pic_name'];
            $oldPic=substr($thumbPic['pic_name'],4);
            $oldPicFile="./Uploads/Prod/".$oldPic;
            if(file_exists($thumbPicFile)){
                unlink($thumbPicFile);
            }
            if(file_exists($oldPicFile)){
                unlink($oldPicFile);
            }
        }
        if($prod->where(array("prod_id"=>$prod_id))->delete()>0){
            echo "商品删除成功";
        };
    }
}