<?php
namespace Home\Controller;
use Think\Controller;
class CollectController extends Controller {
    public function add(){
        $data['gid']=I('post.gid');
        $data['uid']=session('id');
        $collect=M('Collect');
        if(!session('id')){
            session('gid',$data['gid']);
            $this->ajaxReturn(array('status'=>'login','msg'=>'请先登录'));
        }else{
            if($collect->where($data)->find()){
                $this->ajaxReturn(array('status'=>'error','msg'=>'该商品已经收藏过了'));
            }else{
                $id=$collect->add($data);
                if($id){
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'收藏成功'));
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'收藏失败'));
                }
            }
        }
    }
    //收藏




}