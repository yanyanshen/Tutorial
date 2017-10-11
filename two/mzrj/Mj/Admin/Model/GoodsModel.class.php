<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{

    public function index(){
        //分页
        $goods=M('Goods');
        $message['goodsname']=array('like',"%".I("get.key")."%");
        $count=$goods->where($message)->count();
        $page=new \Think\Page($count,2);
        $show=$page->show();
        $goodslist=$goods->where($message)->limit($page->firstRow.','.$page->listRows)->select();
        $map['key']=I('get.key');
        foreach($map as $key=>$val){
            $page->parameter[$key]= urlencode($val);
        }
        $this->assign('page',$show);
        $this->assign('goodslist',$goodslist);
        $this->assign('firstRow',$page->firstRow);
        $this->display();
    }
    public function upload(){
        //上传图片  包含水印和文字水印
        if(IS_POST) {
            $config = array(
                'maxSize' => 3145728,
                'rootPath' => './Uploads/',
                'exts' => array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub' => false,
                //'subName' => array('date', 'Ymd')
            );
            $upload=new \Think\Upload($config);
            $info=$upload->upload();
            if($info){
                foreach($info as $file){
                    $filename="./Uploads/".$file['savename'];
                    //$cropname="./Uploads/".'crop_'.$file['savename'];
                    $thumbname300="./Uploads/".'300_'.$file['savename'];
                    $thumbname500="./Uploads/".'500_'.$file['savename'];
                    $image=new \Think\Image();
                    $image->open($filename);
                    //$image->crop(400,400)->save($cropname);
                    //$image->thumb(300,300)->save($thumbname300);
                    $image->thumb(500,500)->save($thumbname500);
                    $image->water("./Uploads/baby.jpg",\Think\Image::IMAGE_WATER_NORTHWEST)->save($thumbname500);
                    //$image->open($thumbname300)->text("SMARTY","./Uploads/msyh.ttf",20,'#FFAEC9',\Think\Image::IMAGE_WATER_NORTHWEST)->save($thumbname300);
                }

            }
        }else{
            $this->display();
        }
    }
}