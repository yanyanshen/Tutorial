<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller{
    public function _initialize(){
        if(session('aid')<1){
            $this->redirect('Admin/index');

        }
    }

    public function add(){
        $goodsCate=D('category');
        //$cateList=$goodsCate->getField('catename')->select();
        //$this->assign('cateList',$cateList);
        $res=$goodsCate->order('path')->select();
        foreach($res as $val){
            $path=count(explode(",",$val['path']));
            $val['catename']=str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$path).$val['catename'];
            $cateinfo[]=$val;
        }
        $this->assign('cateinfo',$cateinfo);
        $brand=M('brand');
        $brandinfo=$brand->select();
        $this->assign('brandinfo',$brandinfo);
        if(IS_POST){
            $goods=D('goods');
            if($goods->create()){
                $data['goodsname']=I('post.goodsname');
                $data['marketprice']=I('post.marketprice');
                $data['price']=I('post.price');
                $data['num']=I('post.num');
                $data['cid']=I('post.cid');
                $data['description']=I('post.description');
                $data['bid']=I('post.brand');
                //$data['goodspic']=$file['savename'];
                $data['createtime']=time();
                $data['issale']=1;
                $a=$goods->add($data);
                if($goods->create()){
                    //$data=$goods->create();
                    $upload=new \Think\Upload();
                    $upload->rootPath = './Uploads/';
                    $upload->maxSize  =3145728 ;// 设置附件上传大小
                    $upload->autoSub  =false ;// 设置附件上传大小
                    //$upload->subName  = array('date','Ymd');
                    $upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                    $info=$upload->upload();
                    if($info){
                        foreach($info as $file){
                            //$filename='__PIC__'.$file['savename'];
                            //$adpic=$file['savepath'].$file['savename'];
                            // $thumbpadpic='__PIC__'.'210_'.$file['savename'];
                            // $image=new \Think\Image();
                            // $image->open($filename);
                            //$image->thumbp(210,180)->save($thumbpadpic);
                            if($file['savename']){
                                // $arr[]=$file['savename'];
                                $pic=array('pid'=>$a,'picname'=>$file['savename']);
                                $picture=D('picture');

                                $picture->add($pic);
                                $data['goodspic']=$file['savename'];
                                $goods->where("id='$a'")->save($data);
                                //insert('eshop_pic',array('gid'=>$id,'picname'=>"{$v['filename']}"));
                                //生成商品的缩略图
                                //thumb(PUBLICDIR."/upload/{$v['filename']}",350,PUBLICDIR.'/upload');
                                //thumb(PUBLICDIR."/upload/{$v['filename']}",100,PUBLICDIR.'/upload');
                            }}}else {
                        $this->ajaxReturn(array('status' => 'error', 'msg' => '图片不能为空！'));

                    }

            }else{
                $b=$goods->getError();
                $this->ajaxReturn(array('status'=>'error','msg'=>$b));
            }
                if($a>0){
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'商品添加成功！'));
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'商品添加失败，请重新添加！'));
                }
        }}else{
        $this->display();
        }
    }


    public function goodsList(){

        $goods = M('goods');
        $count=$goods->count();
        $Page = new \Think\Page($count,5);
        $show=$Page->show();
        $goodsList=$goods->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        //分页跳转的时候保证查询条件
        $map['key']=I('get.key');
        foreach($map as $key=>$val) {
            $Page->parameter[$key]   =   urlencode($val);
        }
        $this->assign("goodsList",$goodsList);
        $this->assign("page",$show);
        $this->assign("firstRow",$Page->firstRow);



        $this->display();
    }

    public function del(){
        $id=I('post.id');
        $delgoods=D('goods');
        $del=$delgoods->where("id=$id")->delete();
        if($del>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }



    }
    //商品是否在售
    public function issale(){
        $id=I('post.id');
        $state=M('goods');
        $issale=$state->where("id=$id")->getField('issale');
        if($issale>0){
            $data['issale']=0;
            $state->where("id=$id")->field('issale')->save($data);
            $this->ajaxReturn(array('status'=>'ok','msg'=>'已下架'));
        }else{
            $data['issale']=1;
            $state=M('goods');
            $state->where("id=$id")->field('issale')->save($data);}
        $this->ajaxReturn(array('status'=>'ok','msg'=>'上架成功'));

    }
//商品编辑
    public function edit(){

        $goodsCate=D('category');
        //$cateList=$goodsCate->getField('catename')->select();
        //$this->assign('cateList',$cateList);
        $res=$goodsCate->order('path')->select();
        foreach($res as $val){
            $path=count(explode(",",$val['path']));
            $val['catename']=str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$path).$val['catename'];
            $cateinfo[]=$val;
        }
        $this->assign('cateinfo',$cateinfo);
        $brand=M('brand');
        $brandinfo=$brand->select();
        $this->assign('brandinfo',$brandinfo);
        if(IS_POST){
            $id1=I('post.id');
            $goods=D('goods');
            if($goods->create()){
                $data['goodsname']=I('post.goodsname');
                $data['marketprice']=I('post.marketprice');
                $data['price']=I('post.price');
                $data['num']=I('post.num');
                $data['cid']=I('post.cid');
                $data['description']=I('post.description');
                $data['bid']=I('post.brand');
                $data['createtime']=time();
                $data['issale']=1;
                $goods->where("id='$id1'")->save($data);
                if($goods->create()){
                    //$data=$goods->create();
                    $upload= new \Think\Upload();
                    $upload->rootPath = './Uploads/';
                    $upload->maxSize  =3145728 ;// 设置附件上传大小
                    $upload->autoSub  =false ;// 设置附件上传大小
                    //$upload->subName  = array('date','Ymd');
                    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

                    $info=$upload->upload();
                    if($info){
                        foreach($info as $file){
                            //$filename='__PIC__'.$file['savename'];
                            //$adpic=$file['savepath'].$file['savename'];
                            // $thumbpadpic='__PIC__'.'210_'.$file['savename'];
                            // $image=new \Think\Image();
                            // $image->open($filename);
                            //$image->thumbp(210,180)->save($thumbpadpic);
                            if($file['savename']){
                                // $arr[]=$file['savename'];

                                $pic['pid']=$id1;
                                $pic['picname']=$file['savename'];
                                $picture=D('picture');

                                $picture->add($pic);
                                $data['goodspic']=$file['savename'];
                                $a=$goods->where("id='$id1'")->save($data);
                                //insert('eshop_pic',array('gid'=>$id,'picname'=>"{$v['filename']}"));
                                //生成商品的缩略图
                                //thumb(PUBLICDIR."/upload/{$v['filename']}",350,PUBLICDIR.'/upload');
                                //thumb(PUBLICDIR."/upload/{$v['filename']}",100,PUBLICDIR.'/upload');
                            }}}
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'图片不能为空！'));
                }
            }else{
                $b=$goods->getError();
                $this->ajaxReturn(array('status'=>'error','msg'=>$b));
            }

            if($a>0){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'商品编辑成功！'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'图片不能为空！'));;
            }
        }else{
            $id=I('get.id');
            $goods=M('goods');
            $goodslist=$goods->where("id='$id'")->select();

            $this->assign("goodslist", $goodslist);
            $this->display();
        }
    }

}