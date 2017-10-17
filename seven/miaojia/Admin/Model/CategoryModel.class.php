<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
    //输出顶级分类
    public function firstCate(){
        $obj=M('category');
        return json_encode($obj->where(array('pid'=>0))->select()); //对从数据库中的查询结果进行json编码，返回的结果是一个字符串
    }
    //根据上级分类ID查找下级分类
    public function firstChildCate($pid){
        $obj=M('category');
        if(count($obj->where(array('pid'=>$pid))->select())>0){    //说明顶级分类下面有二级分类
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
    public function addCategory($cate){
        $obj=M('category');
        if($obj->create($cate)){     //根据表单提交的POST数据创建数据对象
            $obj->pid=$cate['second']==0?$cate['first']:$cate['second'];
            $obj->flag=1;
            $insertid=$obj->add();
            //如果主键是自动增长型,成功后返回值就是最新插入的值,返回的值是最后插入数据的主键id。
            if($insertid){
                $obj->create();
                if($cate['second']!=0){     //如果二级分类不等于0，说明一级、三级都存在。
                    $obj->path=$cate['first'].','.$cate['second'].','.$insertid;   //三级分类的path
                }elseif($cate['second']==0 && $cate['first']!=0){
                    $obj->path=$cate['first'].','.$insertid;             //二级分类的path
                }elseif($cate['first']==0 && $cate['second']==0){
                    $obj->path=$insertid;                                //顶级分类的path
                }
                $obj->where(array('id'=>$insertid))->save();           //根据条件更新记录
                return "添加成功";
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
        $res=false;
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
                if($obj->save()){
                    $res=true;
                }
                return $res;
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
}