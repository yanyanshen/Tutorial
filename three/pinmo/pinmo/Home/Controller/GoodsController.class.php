<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends CommonController{
    public function details(){

        $id=I('get.id');
        //$_SESSION['look'][$id]=$id;
        $pic=D('picture');
        $plist=$pic->where("pid='$id'")->limit(4)->select();
        //print_r($dlist);
        $goods=D('goods');
        $glist=$goods->where("id='$id'")->select();
            /*foreach($glist as $k=>$v)
        $glist[$k]['description']=/*htmlspecialchars_decode(html_entity_decode(*//*$v['description']));*/
        //dump($glist);*/

            foreach($glist as $k=>$v)
        $glist[$k]['description']=htmlspecialchars_decode($v['description']);
        //dump($glist);*/
//商品图片
        $this->assign('plist',$plist);
        //商品详情
        $this->assign('glist',$glist);
//生成浏览记录
        $uid=session('mid');
        $_SESSION['u'.$uid]['g'.$id]=$id;

//评论详情
       $Model = new \Think\Model() ;// 实例化一个model对象 没有对应任何数据表
        $discuss1=$Model->query("select * from __DISCUSS__ as d,__USER__ as u where u.id=d.mid and d.goodsid=$id");
        $discuss=array_reverse($discuss1);
        //$discuss=M('discuss')->where("goodsid=$id")->order('id desc')->select();
        $this->assign('discuss',$discuss);
//查看收藏状态;
        $collect=M('collect');
        $data['uid']=$uid;
        $data['goodsid']=$id;
        $b=$collect->where($data)->find();
        if($b>0){
            $this->assign('b',$b);
        }else{};
        $this->display();
    }

    //商品收藏
    public function collect(){
        $id=I('post.goodsid');
        $uid=session('mid');
        if(!$uid){
            $this->ajaxReturn(array('status'=>'nologin','msg'=>'用户未登录，马上登陆！'));
        }
        $collect=M('collect');
        $data['uid']=$uid;
        $data['goodsid']=$id;
        $b=$collect->where($data)->find();
        if($b>0){
            $this->ajaxReturn(array('status'=>'error','msg'=>'已经收藏！'));
        }else{
            $a=$collect->add($data);
            if($a>0){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'收藏成功！'));
            }
        }
    }
}