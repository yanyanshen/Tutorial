<?php
namespace Home\Controller;
use Think\Controller;
class AdController extends Controller{
    public function ad(){
        $id=$_GET['id'];
        $res=M('ad');
        $where['adstate']=1;
        $where['id']=$id;
        $arr=$res->where($where)->select();
        foreach($arr as $k=>$v){
           $this->assign('image',$v['image']);
        }
        $this->display();
    }
}