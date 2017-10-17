<?php
namespace Mobile\Controller;
use Think\Controller;
class MyInfoController extends Controller{
    public function _initialize(){
        if(!session('username')){
            $this->redirect('Users/login');
        }
    }
    public function myInfo(){
        $amod = M('Users')->where(array('username'=>session('username')))->field('avatar,sex')->find();
        session('avatar',$amod['avatar']);
        $this->assign('amod',$amod);
        if(IS_POST){
            $data['sex'] = I('sex');
                if(D('Users')->where("id=".session('uid'))->save($data)){
                    echo $this->success('性别修改成功');
                }else{
                    echo $this->error('性别修改失败！');
                }
                return;
        }
        $this->display();
    }

    public function edit(){
        $mod =D("Users");
            if ($_FILES['pic']['tmp_name'] != '') {
                $upload = new \Think\Upload();
                $upload->maxSize = 6666666666;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg', ',');
                $upload->rootPath = './uploads/';
                $upload->savePath = './avatar/';
                $upload->autoSub = false;
                $info = $upload->uploadOne($_FILES['pic']);
                if ($info) {
                    //删掉原来的图片
                    $cp = M('Users')->find(session('uid'));
                    unlink($cp['avatar']);
                    $data['avatar'] = basename($info['savepath'] . $info['savename']);
                    if ($mod->where("id=" . session("uid"))->save($data)) {
                        echo $this->success('更改成功');
                    } else {
                        echo $this->error('更改失败');
                    }
                    return;
                } else {
                    echo $this->error($this->geterror());
                }
                return;
            }
        $this->display();
    }

    public function loginout(){
        session('username',null);
        session('uid',null);
        $this->success('退出成功');
    }
}