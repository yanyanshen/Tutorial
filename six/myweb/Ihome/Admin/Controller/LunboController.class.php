<?php
namespace Admin\Controller;
use Think\Controller;
class LunboController extends Controller{
    public function addLunBo(){
        if(IS_POST) {
            $data['adname'] = trim(I('post.adname'));
            $data['adpic'] = trim($_FILES['adpic']['name']);
            $data['createtime'] = time();
            $config = array(
                'maxSize' => 3145728,
                'rootPath' => './Public/Upload/Adpic/',
                'exts' => array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub' => false,
            );
            $upload = new \Think\Upload($config);
            $info = $upload->upload();
            if (!$info) {
                $this->error($upload->getError());
            } else {
                $name=M('ad')->where(array('adname'=>trim(I('post.adname'))))->find();
                if(!$name){
                    M('ad')->add($data);
                    $this->success('添加成功');
                }else{
                    $this->error('已存在');
                }
            }
        }
        $this->display('Lunbo/add');
    }
    public function lunBolist(){
        $this->display('Lunbo/list');
    }
}