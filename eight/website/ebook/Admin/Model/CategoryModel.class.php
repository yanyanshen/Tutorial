<?php
//商品分类模型
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
    //自动验证
    protected $_validate = array(
        array('catename','require','分类名称不能为空'),
    );


    //定义一个方法，获取树状的分类信息
    public function catTree(){
        $cats = $this->select();
        return $this->tree($cats);
    }

    //定义一个方法，对给定的数组，递归形成树
    public function tree($arr,$pid=0,$level=0){
        static $tree = array();
        foreach($arr as $v){
            if($v['pid']==$pid){
                //说明找到，保存
                $v['level'] = $level;
                $tree[] = $v;
                //继续找
                $this -> tree($arr,$v['id'],$level+1);
            }
        }
        return $tree;
    }


}