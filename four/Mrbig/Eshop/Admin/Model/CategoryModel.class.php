<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
    //输出顶级分类
    public function firstCate(){
        $obj=M('category');
        return json_encode($obj->where(array('pid'=>0))->select());
    }
    //根据上级分类ID查找下级分类
    public function firstChildCate($pid){
        $obj=M('category');
        if(count($obj->where(array('pid'=>$pid))->select())>0){
            return json_encode($obj->where(array('pid'=>$pid))->select());
        }else{
            return null;
        }
    }
    //根据下级ID查找上级分类,此函数返回由path组成的数组
    public function getParentByChild($id){
        $obj=M('category');
        $cate=$obj->where(array('id'=>$id))->find();
        foreach(explode(',',$cate['path']) as $k=>$v){
            $path[$k]=$v;
        }
        return $path;
    }

    //根据ID查找分类
    public function getCate($id){
        $obj=M('category');
        return $obj->where(array('id'=>$id))->find();
    }
    //添加分类实际操作方法
    public function addCategory($data){
        $data['pid']=$data['sid']==0?$data['fid']:$data['sid'];
        $obj=M('category');
        if($obj->create($data)){
            if($tid=$obj->add()){
                if($data['sid']==0 && $data['fid']!=0){
                    $cate['id']=$tid;
                    $cate['path']=$data['fid'].','.$tid;
                }elseif($data['sid']==0 && $data['fid']==0){
                    $cate['id']=$tid;
                    $cate['path']=$tid;
                }elseif($data['sid']!=0 && $data['fid']!=0){
                    $cate['id']=$tid;
                    $cate['path']=$data['fid'].','.$data['sid'].','.$tid;
                }
                $obj->create($cate);
                return $obj->save();
            }
        }
    }
    //获取分类列表
    public function getAllCate($catename='',$firstRow='',$listRows=''){
        $obj=M('category');
        if($catename==''){
            return $obj->order('path')->limit($firstRow,$listRows)->select();
        }else{
            $map['catename']=array('like','%'.$catename.'%');
            return $obj->where($map)->order('path')->limit($firstRow,$listRows)->select();
        }
    }

    //编辑分类添加到数据库
    public function saveCategory($cate){
        $obj=M('category');
        if($obj->create($cate)){
            $obj->pid=$cate['second']==0?$cate['first']:$cate['second'];
            $obj->flag=1;
            if($cate['second']!=0){
                $obj->path=$cate['first'].','.$cate['second'].','.$cate['id'];
            }elseif($cate['second']==0 && $cate['first']!=0){
                $obj->path=$cate['first'].','.$cate['id'];
            }elseif($cate['first']==0 && $cate['second']==0){
                $obj->path=$cate['id'];
            }
            $obj->save();
            return "修改成功";
        }
    }

    //删除分类
    public function delCategory($id){
        $obj=M('category');
        if($this->firstChildCate($id)){
            return false;
        }else{
            $obj->delete($id);
            return true;
        }
    }
    //拿二级分类
    public function secondCate($id){
        $res=M('category');
        $where['pid']=$id;
        $arr=$res->where($where)->select();
        return $arr;
    }
}