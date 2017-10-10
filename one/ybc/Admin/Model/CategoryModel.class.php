<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
     protected  $tableName="category";
     public  function chkedit($id){
           $res=$this->where(array('id'=>$id))->find();
         return $res;
     }
    public function xiajia($id){
        $res1=$this->field('id,path')->where(array('id'=>$id))->find();
        $path=$res1['path'];
        $data['active']=0;
        $where['path']=array('like',"$path%");
          $arr=$this->where($where)->field('id')->select();
           $str='';
          foreach($arr as $v){
               $str.=$v['id'].',';
          }
        $str=substr($str,0,-1);
         $where1['cid']=array('in',$str);
         $res=$this->where($where)->save($data);
         M('goods')->where($where1)->save($data);
         if($res){
              return $res;
         }else{
             return false;
         }
    }
    public function active($id){
        $res1=$this->where(array('id'=>$id))->field('path')->find();
        $path=$res1['path'];
        $data['active']=1;
       $where['path']=array('like',"$path%");
        $arr=$this->where($where)->field('id')->select();
        $str='';
        foreach($arr as $v){
            $str.=$v['id'].',';
        }
        $str=substr($str,0,-1);
        $where1['cid']=array('in',$str);
        M('goods')->where($where1)->save($data);
        $res=$this->where($where)->save($data);
        if($res){
            return $res;
        }else{
            return false;
        }
    }

    //查询分类列表
    public function catelist($pid){
         $catelist=$this->where(array('pid'=>$pid))->select();
        if($catelist){
            return $catelist;
        }else{
            return false;
        }

    }
   //检查分类名称是否存在
   public  function chkname($catename){
        $res=$this->where(array('catename'=>$catename))->find();
       if($res){
           return false;
       }else{
           return true;
       }
   }
    //查询分类path
    public function chkpath($id){
        $data=$this->field('pid')->where(array('id'=>$id))->find();
         $pid=$data['pid'];
        return $pid;
    }
    //添加到数据库
    public function adddata($data){
         $id=$this->add($data);
        return $id;
    }
    //更新数据库
    public function updata($id,$data){
        $res=$this->where(array('id'=>$id))->save($data);
        return $res;
    }

}