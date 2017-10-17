<?php
namespace Home\Model;
use Think\Model;
class BrandsModel extends Model{
    public function bid($id){
        $logoinfo=$this->field('id,logo')->where('id='.$id)->select();
        return $logoinfo;
    }
}