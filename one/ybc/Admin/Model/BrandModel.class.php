<?php
namespace Admin\Model;
use Think\Model;
class BrandModel extends Model{
       protected  $tableName='brand';
      protected $_validate=array(
          array('brandname','require','品牌名称不能为空',0,'regex',1),
          array('brandname','','品牌名称已经存在',0,'unique',1),
      );
  public function addbrand($data){
      $cid=$this->add($data);
      return $cid;
  }
      public function chkactive($id){
             $res=$this->where(array('id'=>$id))->find();
            return $res;
      }
    public function xiajia($id){
          $data['active']=0;
           $res=$this->where(array("id"=>$id))->save($data);
          M('goods')->where(array('bid'=>$id))->save($data);
          if($res){
              return $res;
          }else{
              return false;
          }
    }
    public function active($id){
        $data['active']=1;
        M('goods')->where(array('bid'=>$id))->save($data);
        $res=$this->where(array("id"=>$id))->save($data);
        if($res){
            return $res;
        }else{
            return false;
        }
    }
}
