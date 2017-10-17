<?php
namespace Home\Model;
use Think\Model;

class CollectModel extends Model{
    //收藏内容
    public function memberCollect(){
        $uid=M('users')->where(array('username'=>session('username')))->field('id')->find();
        $where['uid']=$uid['id'];
        $where['status']=1;
        $collect=M('collect')->where($where)->field('gid')->order('coltime desc')->select();
        foreach ($collect as $k=>$val) {
            $goods=M('goods')->where(array('id'=>$val['gid']))->field('goodsname,image,saleprice,markprice')->find();
            $collect[$k]['goodsname']=$goods['goodsname'];
            $collect[$k]['image']=$goods['image'];
            $collect[$k]['saleprice']=$goods['saleprice'];
            $collect[$k]['markprice']=$goods['markprice'];
        }
        return $collect;

    }
    //猜你喜欢
    public function like(){
        $uid=M('users')->where(array('username'=>session('username')))->field('id')->find();
        $where['uid']=$uid['id'];
        $gid=M('collect')->where($where)->field('gid')->order('coltime desc')->find();
        $cid=M('goods')->where(array('id'=>$gid['gid']))->field('cid')->find();
        return M('goods')->where(array('cid'=>$cid['cid']))->limit(0,4)->select();
    }
    //取消收藏
    public function delcollect($id){
        $date['status']=0;
        return M('collect')->where(array('gid'=>$id))->save($date);
    }
}