<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;

class MemberController extends BgController{
        public function index(){
            if (IS_GET) {
                $way = I('get.way');
                $this->assign('way', $way);
                if ($way == 'lasttime') {
                    if (I('get.date1') && I('get.date2')) {
                        $time1 = strtotime(I('get.date1'));
                        $time2 = strtotime(I('get.date2'));
                        $this->assign('date1', I('get.date1'));
                        $this->assign('date2', I('get.date2'));
                        $where['lasttime'] = array(array('egt', $time1), array('elt', $time2), 'and');
                    } elseif (!I('get.date1') && I('get.date2')) {
                        $time2 = strtotime(I('get.date2'));
                        $this->assign('date2', I('get.date2'));
                        $where['lasttime'] = array('elt', $time2);
                    } elseif (I('get.date1') && !I('get.date2')) {
                        $time1 = strtotime(I('get.date1'));
                        $this->assign('date1', I('get.date1'));
                        $where['lasttime'] = array('egt', $time1);
                    }
                } elseif ($way == 'username') {
                    if (I('get.username1')) {
                        $username1 = I('get.username1');
                        $this->assign('username1', I('get.username1'));
                        $where['username'] = $username1;
                    }
                } else {
                    $where = '';
                }
                $member = M('Member');
                $count = $member->where($where)->count();
                $page = new Page($count, 4);
                $show = $page->show();
                $memberlist = $member->where($where)->limit($page->firstRow . ',' . $page->listRows)->select();
                $deavatar=$member->where($where)->select();
                $this->assign('firstrow', $page->firstRow);
                $this->assign('deavatar',$deavatar);
                $this->assign('memberlist', $memberlist);
                $this->assign('page', $show);
                $this->assign('count', $count);
                $this->display();
            }
        }
    public function stopuse(){
        if(IS_AJAX){
            $id=I('post.id');
            $where['id']=$id;
            $data['active']=0;
            $member=M('Member');
            $user=$member->where($where)->save($data);
            if($user){
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }
        }
    }
    public function startuse(){
        if(IS_AJAX){
            $id=I('post.id');
            $where['id']=$id;
            $data['active']=1;
            $member=M('Member');
            $user=$member->where($where)->save($data);
            if($user){
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }
        }
    }
    public function deluse(){
        if(IS_AJAX){
            $id=I('post.id');
            $where['id']=$id;
            $member=M('Member');
            $user=$member->where($where)->delete();
            if($user){
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }
        }
    }
    public function userdetail(){
            $id=I('get.id');
            $where['id']=$id;
            $member=M('Member');
            $user=$member->where($where)->select();
            $this->assign('user',$user);
            $this->display('userdetail');
    }
        public function export(){
            $file_name   = "会员信息表-".date("Y-m-d H:i:s",time());
            $file_suffix = "xls";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=$file_name.$file_suffix");
            $info=M('Member')->select();
            foreach($info as $k=>$v){
                $info[$k]['content']=html_entity_decode($v['content']);
            }
            $this->assign('info',$info);
            $this->display('export');


        }

    public function message(){
        if(IS_GET){
            $mid=I('get.id');
            $this->assign('mid',$mid);
            $this->display('message');
        }else{
            $mid=I('post.mid');
            if(I('post.title')){
                $title=I('post.title');
            }else{
                $this->error("请填写标题");
            }

            if(I('post.message')){
                $message=I('post.message');
            }else{
                $this->error('请填写内容');
            }

            $data['time']=time();
            $data['mid']=$mid;
            $data['title']=$title;
            $data['message']=$message;
            $res=M("MemberMessage")->add($data);
            if($res){
                $this->success("发送成功");
            }else{
                $this->error("发送失败");
            }
        }
    }


}
