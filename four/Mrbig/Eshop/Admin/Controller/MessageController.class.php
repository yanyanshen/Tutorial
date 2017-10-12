<?php
namespace Admin\Controller;
use Admin\Model\MessageModel;
use Think\Controller;
use Think\Page;
use Think\Image;
use Think\Upload;
class MessageController extends Controller{

    public function saveMessage()
    {
        /* $timer=$_POST;
         $timer['ctime']=time();
        print_r($_SESSION);
         $timer['aname']=session('aname');
         $data=D('Message');
         if($data->create($timer)){
             if($gid=$data->add()){
                 $this->success('添加成功');
             }else{
                 exit($data->getError());
             }
         }*/
        if (IS_POST) {
            $goodsinfo = $_POST;
            $goodsinfo['ctime'] = time();
            $goodsinfo['aname'] = session('aname');
            if ($_FILES['content']['tmp_name'][0]) {
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
                    $goodsinfo['content'] = substr($filename, 1);
                }
            }
            $obj = new MessageModel();
            if ($obj->saveMessage($goodsinfo)){
                $this->ajaxReturn(array('status' => 'ok','msg' =>"添加成功"));
            } else {
                $this->ajaxReturn(array('status' => 'error','msg' => '添加失败'));
            }
        }
    }

    public function messageList(){
        $messagesearch['aname']=I('aname')?I('aname'):'';
        $obj=new MessageModel();
        $message=$obj->getAllMessage($messagesearch['aname']);
        $count=count($message);
        $page=new \Think\Page($count,2);
        foreach($messagesearch  as $k=>$v){
            $page->parameter[$k]=$v;
        }
        $show=$page->show();
        $messagelist=$obj->getAllMessage($messagesearch,$page->firstRow,$page->listRows);
        $this->assign('messagelist',$messagelist);
        $this->assign('page',$show);
        $this->display();
    }


    public function delMessage(){
        if(IS_POST){
        $data['id']=I('id');
        $obj=new MessageModel();
        if($obj->delMessage($data)){
            $this->ajaxReturn(array('status'=>'ok','message'=>'删除成功!'));
        }else{
            $this->ajaxReturn(array('status'=>'error','message'=>'删除失败!'));
        }
        }

    }


        public function delMoreMessages(){
        $obj=new MessageModel();
        $data=I('post.data');
        for($i=0;$i<=count($data);$i++){
            $obj->delMessages($data[$i]['value']);
        }
        $this->ajaxReturn(array('message'=>'删除成功!'));

    }



}