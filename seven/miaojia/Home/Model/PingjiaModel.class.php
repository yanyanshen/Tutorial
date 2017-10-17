<?php
namespace Home\Model;
use Think\Model;

class PingjiaModel extends Model{
    public function toPj($data){
        $obj=M('pingjia');
        if($obj->create($data)){
            return $obj->add();
        }
    }

    public function isPj($data){
        $obj=M('pingjia');
        if($obj->where($data)->find()){
            return true;
        }else{
            return false;
        }
    }

    //根据商品ID查询评价信息
    public function getPjByGid($gid){
        $obj=M('pingjia');
        $pjList=$obj->where(array('gid'=>$gid))->field('pjintro,pjtime,uid')->select();
        $user=new UserModel();
        foreach($pjList as $k=>$v){
            $pattern='/^(\w{2}).*(\w{2})/';
            $pjList[$k]['pjname']=preg_replace($pattern,'\1***\2',$user->getMeminfoByUid($v['uid'])['username']);
            $pjList[$k]['pic']=$user->getMeminfoByUid($v['uid'])['pic'];
        }
        return $pjList;
    }
}