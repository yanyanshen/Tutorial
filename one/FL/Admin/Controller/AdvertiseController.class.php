<?php
namespace Admin\Controller;
use Think\Controller;
class AdvertiseController extends Controller {
    public function _initialize(){
        if(session('mid')<1){
            header("location:/Admin/Admin/login");
        }
    }
    public function addAdvertise(){
        if($_POST){
            $ad=M("Advertise");
            $data=$ad->create();
            if($data['ad_pos_id']>=1&&$data['ad_pos_id']<=6){
                $data['ad_type']=0;
            }else{
                $data['ad_type']=1;
            }
            $data['ad_pos_name']=self::getAdName($data['ad_pos_id']);
            $config=array(
                'maxSize'=>3145728,
                'rootPath'=>'./Uploads/',
                'savePath'=>'Advertise/',
                'autoSub'=>false,
                'exts'=>array('jpg','jpeg','png','gif')
            );
            $upload=new \Think\Upload($config);
            $info=$upload->upload();
            if($info){
                foreach($info as $file){
//                        $filename='./Uploads/'.$file['savepath'].$file['savename'];
                    $data['ad_pic']=$file['savename'];
                }
            }
            if($ad->data($data)->add()>0){
                redirect(U('addAdvertise'),1,"添加成功");
            };
        }else{
            $this->display();
        }
    }

    public function advertiseList(){
        //广告列表
        $ad=M("Advertise");
        $count=$ad->count();
        $page=new \Think\Page($count,4);
        $show=$page->show();
        $adList=$ad->order("ad_pos_id")->limit($page->firstRow.','.$page->listRows)->select();
        $map['key']=I("get.key");
        foreach($map as $key=>$val){
            $page->parameter[$key]=urlencode($val);
        }
        $firstRow=$page->firstRow;
        $this->assign("firstRow",$firstRow);
        $this->assign("page",$show);
        $this->assign("adList",$adList);
        $this->display();
    }

    public function toggleAdvertise(){
        //展示（不展示）广告
        $ad_aid=I("get.ad_aid");
        $ad=M("Advertise");
        $ad_isshow=$ad->where(array('ad_aid'=>$ad_aid))->getField("ad_isshow");
        if($ad_isshow){
            $data['ad_isshow']=0;
        }else{
            $data['ad_isshow']=1;
        }
        $data['ad_createtime']=time();
        if($ad->where(array('ad_aid'=>$ad_aid))->save($data)>0){
            echo "修改成功";
        };
    }

    public function editAdvertise(){
        //编辑广告
        $ad_aid=I("get.ad_aid");
        $ad=M("Advertise");
        $adinfo=$ad->where(array("ad_aid"=>$ad_aid))->select();
        $oldPicFile="./Uploads/Advertise/".$adinfo[0]['ad_pic'];
        if(IS_POST){
            $config=array(
                'maxSize'=>3145728,
                'rootPath'=>'./Uploads/',
                'savePath'=>'Advertise/',
                'autoSub'=>false,
                'exts'=>array('jpg','jpeg','png','gif')
            );
            $upload=new \Think\Upload($config);
            $info=$upload->upload();
            $data=$ad->create();
            if($info){
                foreach($info as $file){
                    $data['ad_pic']=$file['savename'];
                }
                if(file_exists($oldPicFile)){
                    unlink($oldPicFile);
                }
            }
            $data['ad_pos_name']=self::getAdName($data['ad_pos_id']);
            $data['ad_createtime']=time();
            if($ad->where(array("ad_aid"=>$ad_aid))->save($data)>0){
                redirect(U('advertiseList'),1,"修改成功");
            }
        }else{
            $this->assign("ad_pic",$adinfo[0]['ad_pic']);
            $this->assign("ad_aid",$adinfo[0]['ad_aid']);
            $this->assign("ad_pos_id",$adinfo[0]['ad_pos_id']);
            $this->assign("ad_isshow",$adinfo[0]['ad_isshow']);
            $this->assign("ad_url",$adinfo[0]['ad_url']);
            $this->display();
        }
    }

    public function delAdvertise(){
        $ad_aid=I("get.ad_aid");
        $ad=M("Advertise");
        if($ad->where(array("ad_aid"=>$ad_aid))->getField("ad_isshow")==1){
            echo "这项广告在展示中，不能删除!";
        }else{
            if($ad->where(array("ad_aid"=>$ad_aid))->delete()>0){
                echo "广告删除成功!";
            }
        }
    }

    private function getAdName($ad_pos_id){
        switch($ad_pos_id){
            case 1:$ad_pos_name='轮播图1';
                break;
            case 2:$ad_pos_name='轮播图2';
                break;
            case 3:$ad_pos_name='轮播图3';
                break;
            case 4:$ad_pos_name='轮播图4';
                break;
            case 5:$ad_pos_name='轮播图5';
                break;
            case 6:$ad_pos_name='顶层位置1';
                break;
            case 7:$ad_pos_name='顶层位置2';
                break;
            case 8:$ad_pos_name='顶层位置3';
                break;
            case 9:$ad_pos_name='顶层位置4';
                break;
            case 10:$ad_pos_name='顶层位置5';
                break;
        }
        return $ad_pos_name;
    }
}