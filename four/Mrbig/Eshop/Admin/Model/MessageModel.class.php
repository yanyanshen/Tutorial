<?php
namespace Admin\Model;
use Think\Model;
class MessageModel extends Model{
    public function saveMessage($data){
        $obj = M('Message');
        if ($obj->create($data)) {
            return $obj->add();
        } else {
            return null;
        }
    }

    public function getMessageById($id){
        $obj=M('message');
        return $obj->where(array('id'=>$id))->find();
    }

    public function delMessage($data){
        $obj=M('message');
        return $obj->where($data)->delete();
    }

    public function delMessages($id){
        $obj=M('message');
        return $obj->where(array('id'=>$id))->delete();
    }


    public function getAllMessage($messagesearch='',$firstRow='',$listRows=''){
        $obj=M('message');
        if($messagesearch==''){
            return $obj->order('id')->limit($firstRow,$listRows)->select();
        }else{
            $map['aname']=array('like','%'.$messagesearch['aname'].'%');
            return $obj->where($map)->order('ctime desc')->limit($firstRow,$listRows)->select();
        }
    }

}