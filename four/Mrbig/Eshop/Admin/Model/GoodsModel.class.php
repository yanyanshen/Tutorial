<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
    //添加商品到数据库
    public function saveGoods($data){
        $obj=M('goods');
        $data['creattime']=time();
        if($obj->create($data)){
            return $obj->add();
        }
    }
    //保存编辑商品到数据库
    public function editSave($data){
        $obj=M('goods');
        $data['creattime']=time();
        $gd=$obj->where(array('id'=>$data['id']))->find();
        /*if($obj->create($data)){
            return $obj->save();
        }*/
        if(is_int($data['id'])){
            unlink('./upload/n0/'.$gd['pic']);
            unlink('./upload/n1/'.$gd['pic']);
            unlink('./upload/n2/'.$gd['pic']);
            unlink('./upload/n3/'.$gd['pic']);
        }elseif($obj->create($data)){
            return $obj->save();}
    }

    //删除商品
    public function delGoods($id){
        $obj=M('goods');
        $del=$this->getGoodsById($id);
        /*unlink('./upload/n0/'.$del['pic']);
        unlink('./upload/n1/'.$del['pic']);
        unlink('./upload/n2/'.$del['pic']);
        unlink('./upload/n3/'.$del['pic']);*/
        foreach(explode(',',$del['pic']) as $v){
            for($i=0;$i<=3;$i++){
                unlink("./upload/n".$i.'/'.$v);
            }
        }
        return $obj->where(array('id'=>$id))->delete($id);
    }
    public function delGood($id){
        $obj=M('goods');
        $del=$this->getGoodsById($id);
        unlink('./upload/n0/'.$del['pic']);
        unlink('./upload/n1/'.$del['pic']);
        unlink('./upload/n2/'.$del['pic']);
        unlink('./upload/n3/'.$del['pic']);
        return $obj->where(array('id'=>$id))->delete();
    }
    //获取所有商品列表
    public function getAllGoods($goodssearch='',$firstRow='',$listRows=''){
        $obj=M('goods');
        if($goodssearch==''){
            return $obj->order('creattime desc')->limit($firstRow,$listRows)->select();
        }else{
            $map['name']=array('like','%'.$goodssearch['name'].'%');
            return $obj->where($map)->order('creattime desc')->limit($firstRow,$listRows)->select();
        }
    }
    //根据ID查找商品
    public function getGoodsById($id){
        $obj=M('goods');
        return $obj->where(array('id'=>$id))->find();
    }
    //获取品牌
    public function getAllBrand(){
        $obj=M('brand');
        return $obj->order('id desc')->select();
    }
    public function getbrand($id){
        $obj=M('brand');
        return $obj->where(array('id'=>$id))->find();
    }

    public function getAllTopCate(){
        $obj=M('category');
        return json_encode($obj->where(array('pid'=>0))->select());
    }
    //根据上级ID查找下级分类
    public function firstChildCate($id){
        $obj=M('category');
        $sCate=$obj->where(array('pid'=>$id))->select();
        if(count($sCate)>0){
            return json_encode($sCate);
        }else{
            return null;
        }
    }
    public function getCate($id){
        $obj=M('category');
        return $obj->where(array('id'=>$id))->find();
    }
    //根据ID查找分类
    public function getCateById($id){
        $obj=M('category');
        return $obj->where(array('id'=>$id))->find();
    }
    //添加分类信息进数据库
    public function saveCate($data){
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
    public function firstCate(){
        $obj=M('category');
        return json_encode($obj->where(array('pid'=>0))->select());
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

    //添加分类实际操作方法
    public function addCategory($cate){
        $obj=M('category');
        if($obj->create($cate)){
            $obj->pid=$cate['second']==0?$cate['first']:$cate['second'];
            $obj->flag=1;
            $insertid=$obj->add();
            if($insertid){
                $obj->create();
                if($cate['second']!=0){
                    $obj->path=$cate['first'].','.$cate['second'].','.$insertid;
                }elseif($cate['second']==0 && $cate['first']!=0){
                    $obj->path=$cate['first'].','.$insertid;
                }elseif($cate['first']==0 && $cate['second']==0){
                    $obj->path=$insertid;
                }
                $obj->where(array('id'=>$insertid))->save();
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
}