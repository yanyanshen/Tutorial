<?php
namespace Admin\Controller;
use Think\Controller;
class AdController extends Controller{
    public function _initialize(){
        if(session('aid')<1){
            $this->redirect('Admin/index');

        }
    }



    public function add(){

        if(IS_POST){
            // $data=I('post.');

            $ad=D('ad');
            if($ad->create()){
                $data=$ad->create();
                $upload=new \Think\Upload();
                $upload->rootPath = './Uploads/';
                $upload->maxSize  =3145728 ;// 设置附件上传大小
                $upload->autoSub  =false ;// 设置附件上传大小
                //$upload->subName  = array('date','Ymd');
                $upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

                $info=$upload->upload();

                if(!$info){
                    $this->ajaxReturn(array('status'=>'error','msg'=>'图片不能为空'));
                }else{ foreach($info as $file){
                    //echo $file['savepath'].$file['savename'];
                    $adpic=$file['savepath'].$file['savename'];
                    $thumbpadpic=  './Upload/'.$file['savepath'].'210_'.$file['savename'];
                    // $image=new \Think\Image();
                    //     $image->open($adpic);
                    //  $image->thumbp(210,458)->save($thumbpadpic);
                }
                }



                $data['adname']=I('post.adname');
                $data['des']=I('post.des');
                $data['position']=I('post.position');
                $data['adpic']=$file['savename'];
                $data['state']=1;
                $data['adurl']=I('post.adurl');
                $a=$ad->add($data);
                if($a>0){
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'广告添加成功'));
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'广告添加失败，请重新添加'));
                }
            }else{
                $b=$ad->getError();
                $this->ajaxReturn(array('status'=>'error','msg'=>$b));
            }


        }else{
            $this->display();
        }


    }


    public function adlist(){
    $ad = M('Ad');
        $count=$ad->count();
        $Page = new \Think\Page($count,3);
        $show=$Page->show();
        $adList=$ad->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        //分页跳转的时候保证查询条件
        $map['key']=I('get.key');
        foreach($map as $key=>$val) {
            $Page->parameter[$key]   =   urlencode($val);
        }
        $this->assign("ad",$adList);
        $this->assign("page",$show);
        $this->assign("firstRow",$Page->firstRow);


        $this->display();
    }

    public function del(){
        $id=I('post.id');

        $del=M('Ad');
        $a=$del->where("id='$id'")->delete();
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }

    }

    public function state()
    {
        $id=I('post.id');

        $state=M('Ad');
        $status=$state->where("id='$id'")->getField('state');
        if($status==1){

        $data['state']=0;

         $state->where("id='$id'")->field('state')->save($data);
            $this->ajaxReturn(array('status'=>'ok','msg'=>'下架成功'));
        }else{
            $data['state']=1;
            $state=M('Ad');
            $state->where("id='$id'")->field('state')->save($data);}
        $this->ajaxReturn(array('status'=>'ok','msg'=>'上架成功'));
    }




    public  function edit()
    {




        if (IS_POST) {
            // $data=I('post.');
            //print_r($data);
           // exit;

            $ad = D('ad');
            if ($ad->create()) {
                $data = $ad->create();
                $upload = new \Think\Upload();
                $upload->rootPath = './Uploads/';
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->autoSub = false;// 设置附件上传大小
                //$upload->subName  = array('date','Ymd');
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

                $info = $upload->upload();

                if (!$info) {
                    $this->ajaxReturn(array('status'=>'error','msg'=>'图片不能为空'));
                }else{
                    foreach ($info as $file) {
                    //echo $file['savepath'].$file['savename'];
                    $adpic = $file['savename'];
                    //$thumbpadpic = './Uploads/' . $file['savepath'] . '210_' . $file['savename'];
                    // $image=new \Think\Image();
                    //     $image->open($adpic);
                    //  $image->thumbp(210,458)->save($thumbpadpic);
                }
                }



                $data['adname'] = I('post.adname');
                $data['des'] = I('post.des');
                $data['position'] = I('post.position');
                $data['adpic'] =  "$adpic" ;
                $data['state'] = 1;
                $data['adurl'] = I('post.adurl');
                $id = I("post.id");
               // print_r($data);

                $a = $ad->where("id=$id")->field('adpic,des,position,adname')->save($data);
                if ($a > 0) {
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'广告添加成功'));

                } else {
                    $this->ajaxReturn(array('status'=>'error','msg'=>'广告添加失败，请重新添加'));
                }
            } else {
                $b = $ad->getError();
                $this->ajaxReturn(array('status'=>'ok','msg'=>$b));
            }


        } else {

            $id=I('get.id');
            $ad=M('ad');
            $adlist=$ad->where("id='$id'")->select();

            $this->assign("adlist",$adlist);
            $this->display();
        }


    }
}


