<?php
namespace Admin\Model;
use Think\Model;
class BrandModel extends Model{

    public function saveBrand($data){
        $obj = M('Brand');
        if ($obj->create($data)) {
            return $obj->add();
        } else {
            return null;
        }
    }


    public function getBrandById($id){
        $obj=M('brand');
        return $obj->where(array('id'=>$id))->find();
    }

    public function editSave($data){
        $obj=M('brand');
        $data['ctime']=time();
       $brand=$obj->where(array('id'=>$data['id']))->find();
        if(is_int($data['id'])){
            unlink('./upload/n0/'.$brand['logo']);
            unlink('./upload/n1/'.$brand['logo']);
            unlink('./upload/n2/'.$brand['logo']);
            unlink('./upload/n3/'.$brand['logo']);
        }elseif($obj->create($data)){
            return $obj->save();
        }else {
            return null;
        }
    }


    public function delBrand($id){
        $obj=M('brand');
        $brand=$this->getBrandById($id);
        unlink('./upload/n0/'.$brand['logo']);
        unlink('./upload/n1/'.$brand['logo']);
        unlink('./upload/n2/'.$brand['logo']);
        unlink('./upload/n3/'.$brand['logo']);
        return $obj->delete($id);
    }


    public function delBrands($id){
        $obj=M('brand');
        $brand=$this->getBrandById($id);
        unlink('./upload/n0/'.$brand['logo']);
        unlink('./upload/n1/'.$brand['logo']);
        unlink('./upload/n2/'.$brand['logo']);
        unlink('./upload/n3/'.$brand['logo']);
        return $obj->where(array('id'=>$id))->delete();
    }


    public function getAllBrand($brandssearch='',$firstRow='',$listRows=''){
        $obj=M('brand');
        if($brandssearch==''){
            return $obj->order('ctime desc')->limit($firstRow,$listRows)->select();
        }else{
            $map['name']=array('like','%'.$brandssearch['name'].'%');
            return $obj->where($map)->order('id')->limit($firstRow,$listRows)->select();
        }
    }

}