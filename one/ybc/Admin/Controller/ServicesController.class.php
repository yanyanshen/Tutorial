<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
class ServicesController extends BgController{
    public function index(){
        if(isset($_GET['status'])){
            $condition['status']=I('get.status');
            $this->assign('url1',"status=".I('get.status'));
            $this->assign('status',I('get.status'));
        }else{
            $condition='';
        }
        if(IS_POST){

            //判断用户名
            if(I('post.username')){
                $condition['username']=I('post.username');
                $this->assign('username',I('post.username'));
            }
            //判断时间选择
            if(I('post.date1') && I('post.date2')){
                $time1=strtotime(I('post.date1'));
                $time2=strtotime(I('post.date2'));
                $this->assign('date1',I('post.date1'));
                $this->assign('date2',I('post.date2'));
                $condition['applytime']=array(array('gt',$time1),array('lt',$time2),'and');
            }elseif(!I('post.date1') && I('post.date2')){
                $time2=strtotime(I('post.date2'));
                $this->assign('date2',I('post.date2'));
                $condition['applytime']=array('lt',$time2);
            }elseif(I('post.date1') && !I('post.date2')){
                $time1=strtotime(I('post.date1'));
                $this->assign('date1',I('post.date1'));
                $condition['applytime']=array('gt',$time1);
            }
        }

        $model=D('Services');
        $arr=$model->getList($condition);
        $this->assign('list',$arr['list']);
        $this->assign('page',$arr['page']);
        $this->assign('firstRow',$arr['firstRow']);
        $this->display();
    }
    public function detail(){
        $sid=I('get.id');
        $info=D('Services')->detail($sid);
        $picList='';
        if($info['pic1']){
            $picList[]=$info['pic1'];
        }
        if($info['pic2']){
            $picList[]=$info['pic2'];
        }
        if($info['pic3']){
            $picList[]=$info['pic3'];
        }
        $this->assign('info',$info);
        $this->assign('sid',$sid);
        $this->assign('picList',$picList);
        $this->display();
    }

    public function saveRemarks(){
        $data['remarks']=I('post.remarks');
        $data['id']=I('post.id');
        $res=M('services')->save($data);
        if($res){
            $this->success("保存成功");
        }else{
            $this->error("没有修改任何内容,无需保存");
        }
    }

    public function allow(){
        $data['id']=I('post.id');
        $data['status']=3;
        $data['cltime']=time();
        $res=M('services')->save($data);
        if($res){
            $this->success("已通过");
        }else{
            $this->error("未通过");
        }
    }

    public function deny(){
        $data['id']=I('post.id');
        $data['status']=2;
        $data['cltime']=time();
        $res=M('services')->save($data);
        if($res){
            $this->success("已拒绝");
        }else{
            $this->error("拒绝失败");
        }
    }
}