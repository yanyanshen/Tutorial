<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
    //获取顶级分类
    public function childCate($id){

            $cate=M("category");
            $where["pid"]=$id;
            $second=$cate->field("catename,id")->where($where)->select();
            if(count($second)>0){
                return json_encode($second);
            }else{
                return false;
            }
    }

    public function addCate($post){
        $pid="";
        if(isset($post['thirdCate'])&&$post['thirdCate']>0){
            $_map["pid"]="thirdCate";
            $pid=$post['thirdCate'];
        }elseif(isset($post['secondCate'])&&$post['secondCate']>0){
            $_map["pid"]="secondCate";
            $pid=$post['secondCate'];
        }elseif(isset($post['firstCate'])) {
            $_map["pid"]="firstCate";
            $pid=$post['firstCate'];
        }
        $cate=M("category");
        $data["pid"]=$pid;
        $data["catename"]=$post["f_goods_name"];
        if($pid==0){
            $id=$cate->add($data);
            $data["path"]=$id;
             $cate->where("id=".$id)->setfield("path",$id);
        }else{
            $path=$cate->field("path")->find($pid);
            $id=$cate->add($data);
            $path1=$path["path"].",".$id;
            $cate->where("id=".$id)->setfield("path",$path1);
        }





        if($id){
            return true;
        }else{
            return false;
        }

    }
    public function updateCate($post){
        $cate=M("category");

        if(isset($post['thirdCate'])&&$post['thirdCate']>0){
            $_map["pid"]="thirdCate";
            $pid=$post['thirdCate'];
        }elseif(isset($post['secondCate'])&&$post['secondCate']>0){
            $_map["pid"]="secondCate";
            $pid=$post['secondCate'];
        }elseif(isset($post['firstCate'])) {
            $_map["pid"]="firstCate";
            $pid=$post['firstCate'];
        }
        $id=$post["id"];
        $old=$cate->field("path")->where("id=".$id)->find();
        $path=$cate->field("path,pid")->find($pid);
        $data["path"]=$path["path"];
        $data["pid"]=$path["pid"];
        $data["catename"]=$post["f_goods_name"];
        $rel=$cate->field("pid,path,catename")->where("id=".$id)->save($data);
        $str=$this->allchild($id);
        if($str){
            $str=substr($str,0,-1);
            $arr=explode(",",$str);
            foreach($arr as $k=>$v){
                $oldpath=$cate->field("path")->find($v);
                $newpath=str_replace($old["path"],$data["path"],$oldpath["path"]);
                $cate->where("id=$v")->setField("path",$newpath);
            }
        }
        if($rel){
            return true;
        }else{
            return false;
        }
    }
    public function allchild($pid=0,$level=0,&$str=""){
        $level=$level+1;
        $nev=M("category");
        $fcate = $nev->where("pid=" . $pid)->select();
        if ($fcate) {
            foreach ($fcate as $k1 => $v1) {
                $data=$nev->field("id")->where("flag=1")->order("path")->find($v1["id"]);
               // $data["level"]=$level;
                $str .= $data["id"].",";
                $this->allchild($v1["id"], $level, $str);
            }
        }
        return $str;
    }


}
