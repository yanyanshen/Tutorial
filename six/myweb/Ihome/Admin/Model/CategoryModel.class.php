<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{

/*查询分类数据*/
    public function selCate($data){
        $selinfo=$this->where($data)->find();
        return $selinfo;
    }

/*增加分类数据*/
    public function addCate($data){
        $addinfo=$this->data($data)->add();
        return $addinfo;
    }

/*更新分类数据*/
    public function saveCate($data,$info){
        $addinfo=$this->where($data)->save($info);
        return $addinfo;
    }

/*删除分类数据*/
    public function delCate($cid){
        $data['pid']=$cid;
        $obj=M('category')->where($data)->select();
        if(!$obj){
            M('category')->where(array('cid'=>$cid))->delete();
            return 'ok';
        }else{
            return 'error';
        }
    }

/*获得分类列表*/
    public function getCatelist(){
        $res=$this->field('cid,catename,pid,path')->order('path asc')->select();
        return $res;
    }

/*获得分类列表*/
    public function selList($data){
        $res=$this->where("like '%$data%'")->select();
        return $res;
    }

/*商品列表搜索*/
    public function search($catename){
        $searchInfo=$this->where("catename like '%{$catename}%'")->select();
        return $searchInfo;
    }

    public function getCate($id){
        $obj=M('category');
        return $obj->where(array('cid'=>$id))->find();
    }
}