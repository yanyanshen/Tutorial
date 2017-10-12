<?php
namespace Admin\Controller;
use Admin\Model\NewModel;
use Think\Controller;
class NewController extends Controller{


    public function addnew(){
        $this->display();
    }
    //渲染管理员列表模板
    public function saveNew()
    {
        if(IS_POST){
        $ad=$_POST;
        $ad['cretime']=time();
        $ad['admin']=session('aname');
        $data = new NewModel();
        if ($data->saveNew($ad)) {
            if (true !== $data->add()) {
                $this->ajaxReturn(array('status'=>'ok','msg'=>'发布成功!'));
            } else {
                $this->ajaxReturn(array('status'=>'error','msg'=>'发布失败!'));
            }
        }
    }
    }

       public function newList(){
        $newssearch['title']=I('title')?I('title'):'';
        $obj=new NewModel();
        $news=$obj->getAllNew($newssearch['title|admin']);
        $count=count($news);
        $page=new \Think\Page($count,20);
        foreach($newssearch  as $k=>$v){
            $page->parameter[$k]=$v;
        }
        $show=$page->show();
        $newslist=$obj->getAllNew($newssearch,$page->firstRow,$page->listRows);
        $this->assign('newslist',$newslist);
        $this->assign('page',$show);
        $this->display();
    }

    public function newsList(){
        $obj=new NewModel();
        $news=$obj->select();
        print_r($news);
        $this->assign('newslist',$news);
        $this->display();
    }

    //渲染编辑管理员模板
    public function editNew(){
        $data['id']=I('id');
        $obj=new NewModel();
        $news=$obj->getNewById($data['id']);
        $this->assign('news',$news);
        $this->display('edit');
    }


    //保存再编辑内容
    public function editSave(){
        $data['id']=I('id');
        $data['admin']=I('admin');
        $data['title']=I('title');
        $data['content']=I('content');
        $data['admin']=session('aname');
        $obj=new NewModel();
        if($obj->editSave($data)){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'编辑成功!'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'编辑失败!'));
        }

    }
    //删除管理员
    public function delNew(){
        if(IS_POST){
        $data['id']=I('id');
        $obj=new NewModel();
        if($obj->delNew($data)){
          /* $this->success('删除成功');*/
            $this->ajaxReturn(array('status'=>'ok','message'=>'删除成功!'));
        }else{
            /*$this->error('删除失败');*/
            $this->ajaxReturn(array('status'=>'error','message'=>'删除失败!'));
        }
        }
    }

    public function delMoreNews(){
        $obj=new NewModel();
        $data=I('post.data');
        for($i=0;$i<=count($data);$i++){
            $obj->delNews($data[$i]['value']);
        }
       $this->ajaxReturn(array('message'=>'删除成功!'));

    }

}