<?php
namespace Admin\Model;
use Think\Model;
class NewModel extends Model{


        public function saveNew($data){
          $obj = M('new');
        if ($obj->create($data)) {
            return $obj->add();
        } else {
            return null;
        }
    }

    //根据ID查找动态
    public function getNewById($id){
        $obj=M('new');
        return $obj->where(array('id'=>$id))->find();
    }


    //更新编辑到数据库
    public function editSave($data){
        $obj=D('New');
        $new=$obj->where(array('id'=>$data['id']))->find();
        if(!$data['content']){
            $data['content']=$new['content'];
        }else{
            $data['content']=$data['content'].' ';
        }
        if($obj->create($data)){
            return $obj->save();
        }
    }
    //删除动态
    public function delNew($data){
        $obj=M('new');
        return $obj->where($data)->delete();
    }


    //删除更多动态
    public function delNews($id){
        $obj=M('new');
        return $obj->where(array('id'=>$id))->delete();
    }

    // 列表页获取全部动态
    public function getAllNew($newssearch='',$firstRow='',$listRows=''){
        $obj=M('new');
        if($newssearch==''){
            return $obj->order('id desc')->limit($firstRow,$listRows)->select();
        }else{
            $map['title']=array('like','%'.$newssearch['title'].'%');
            return $obj->where($map)->order('id')->limit($firstRow,$listRows)->select();
        }
    }

    //获取批量删除的动态
    public function getAllNews($data){
        $obj=M('new');
        return $obj->where($data)->order('cretime desc')->limit(5)->select();

    }
}