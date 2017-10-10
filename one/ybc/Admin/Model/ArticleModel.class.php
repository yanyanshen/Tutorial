<?php
namespace Admin\Model;

use Think\Model;

class ArticleModel extends Model
{


    protected $_validate=array(
        array('title','require','请填写标题'),
        array('title','','标题已经存在!',0,'unique',1),
        array('author','require','请填写作者！'),
        array('teatag','require','请填写标签！'),
        array('descript','require','请填写简介！'),
        array('content','require','请填写内容！')
    );


    public function del($id){
        $res=$this->where(array('id'=>$id))->delete();
        if($res){
            return $res;
        }else{
            return false;
        }
    }


    //更新文章
    public function modify($id,$data){
        $res=$this->where(array('id'=>$id))->save($data);
        if($res){
            return $res;
        }else{
            return false;
        }

    }




}