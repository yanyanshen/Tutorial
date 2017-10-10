<?php
namespace Mobile\Controller;
use Mobile\Common\Controller\BgController;
class ServicesController extends BgController{
    public function index(){
        $s=D('Services');
        $res1=$s->getServList(0);
        $this->assign('start',5);
        $this->assign('info',$res1);
        $this->display();
    }

    public function getMore(){
        $start=I('post.start');
        $s=D('Services');
        $res1=$s->getServList($start);
        $this->assign('start',$start+5);
        $this->assign('info',$res1);
        $this->display('more');
    }

    public function cancelSer(){
        $data['id']=I('post.id');
        $data['status']=4;
        $res=M("services")->save($data);
        if($res){
            $this->success('已取消');
        }else{
            $this->error('取消失败');
        }
    }

    public function servDetail(){
        $sid=I('get.id');
        $info=M('services')->alias('s')->join("ybc_history h on s.hid=h.id")->join('ybc_member m on s.mid=m.id')->where(array('s.id'=>$sid))->find();
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

    public function history(){
        $time=strtotime("-1 week");//一个星期前的时间戳
        $model=D("Services");
        $history=$model->getHistory(0);
        $this->assign('info',$history);
        $this->assign('time',$time);
        $this->assign('start',5);
        $this->display();
    }

    public function getMoreHis(){
        $start=I('post.start');
        $time=strtotime("-1 week");//一个星期前的时间戳
        $model=D("Services");
        $history=$model->getHistory($start);
        $this->assign('info',$history);
        $this->assign('time',$time);
        $this->assign('start',$start+5);
        $this->display("moreHistory");
    }

    public function erGoods(){
        $type=I('get.type');
        $hid=I('get.hid');
        $this->assign('type',$type);
        $this->assign('hid',$hid);
        $this->display();
    }

    public function apply(){
        if($this->chkHis1(I('get.hid'))) {
            $this->error("该商品已经申请过售后了，不能再提交了");
        }else{
            if ($_FILES) {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Uploads/servicePic/'; // 设置附件上传根目录
                $upload->autoSub = false;
                // 上传文件
                $info = $upload->upload();
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {// 上传成功 获取上传文件信息
                    $num = 1;
                    foreach ($info as $file) {
                        $data['pic' . $num] = $file['savename'];
                        $num++;
                    }
                    $res1 = true;
                }
            } else {
                $res1 = true;
            }
            if ($res1) {
                $data['reason'] = trim(I("post.reason"));
                $data['message'] = trim(I("post.message"));
                $data['type'] = I('get.type');
                $data['hid'] = I('get.hid');
                $data['mid'] = session("ybc_id");
                $data['applytime'] = time();
                $res = M("services")->add($data);
                if ($res) {
                    $this->success("提交成功，我们将尽快为您审核");
                } else {
                    $this->error("提交失败");
                }
            } else {
                $this->error("图片上传失败");
            }
        }
    }
    public function chkHis1($hid){
        if(IS_AJAX){
            $where['hid']=I('post.hid');
        }else{
            $where['hid']=$hid;
        }
        $res=M('services')->where($where)->find();
        if(IS_AJAX){
            if(!$res){
                $this->success();
            }else{
                $this->error('该商品已经申请过售后了，不能再申请了');
            }
        }else{
            if(!$res){
                return true;
            }else{
                return false;
            }
        }
    }
}