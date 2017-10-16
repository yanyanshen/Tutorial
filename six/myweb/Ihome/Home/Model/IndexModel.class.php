<?php
namespace Home\Model;
use Think\Model;
class IndexModel extends Model{

    public function getAllChildCateByCid($cid){
        $where="path like '{$cid},%' or path like '%,{$cid},%' or path like '%,{$cid}' or path like '{$cid}'";
        $cidarr=M('category')->where($where)->select();
        $str='';
        foreach($cidarr as $v){
            $str.=$v['cid'].',';
        }
        $cidlist=substr($str,0,-1);
        $data="issale=1 and cid in ($cidlist)";
        $goodsList=M('goods')->where($data)->select();
        return $goodsList;
    }
    public function firstcategory(){
        $firstlist=M('category')->where(array('pid'=>0))->limit(5)->select();
        foreach($firstlist as $k=>$val){
            $firstlist[$k]['second']=M('category')->where(array('pid'=>$val['cid']))->select();
            foreach($firstlist[$k]['second'] as $key=>$value){
                $firstlist[$k]['second'][$key]['third']=M('category')->where(array('pid'=>$value['cid']))->select();
            }
        }
        return $firstlist;
    }
}