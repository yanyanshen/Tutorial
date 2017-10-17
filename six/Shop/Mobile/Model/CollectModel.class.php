<?php
namespace Mobile\Model;
use Think\Model;

class CollectModel extends Model{
    public function collect(){
        $collect=M('collect');
        $uid=M('users')->where(array('username'=>session('username')))->field('id')->find();
        $collectlist=$collect->where(array('uid'=>$uid['id']))->where(array('status'=>1))->order('coltime desc')->select();
        foreach($collectlist as $k=>$val){
            $goods=M('goods')->where(array('id'=>$val['gid']))->find();
            $collectlist[$k]['goods']=$goods;
        }
        return $collectlist;
    }

    //删除收藏
    public function delcollect($id){
        $collect=M('collect');
        $date['status']=0;
        return $collect->where(array('id'=>$id))->save($date);
    }
     //猜你喜欢
    public function like(){
        $uid=M('users')->where(array('username'=>session('username')))->field('id')->find();
        $where['uid']=$uid['id'];
        $gid=M('collect')->where($where)->field('gid')->order('coltime desc')->find();
        $cid=M('goods')->where(array('id'=>$gid['gid']))->field('cid')->find();
        return M('goods')->where(array('cid'=>$cid['cid']))->limit(0,4)->select();
    }
}


?>