<?php
namespace Admin\Model;
use Think\Model;
class BrandsModel extends Model{
    public function addbrand($post){
        $_POST=$post;
        //缩略图制作

/*        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        $filename=$upload->rootPath.$info["savepath"].$info["savename"];

        $image=new \Think\Image();
        $image->open("");*/





        $brand=M("brands");
        $_POST["addtime"]=time();
        $brand->create();

        $rel=$brand->add();
        if($rel){
            return true;
        }else{
            return false;
        }
    }




    public function show1(){
        $brands=M("brands");
        $res=$brands->select();
        return $res;
    }
    public function update($id){
        $brand=M("brands");
        $info=$brand->find($id);
        return $info;
    }

    public function updatebrand($post)
    {
        $brand = M("brands");
        $_POST = $post;
        $post1=array();
        $post1["banme"]=$post["bname"];
        $post1["website"]=$post["website"];
        $post1["description"]=$post["description"];
        $post1["type"]=$post["type"];
        $post1["id"]=$post["id"];
        $old=$brand->field("bname,logo,website,description,type,id")->where("id=" . $post["id"])->find();

        if (isset($post["logo"]) && $post["logo"] > 0) {
            $post1["logo"]=$post["logo"];
            if(!array_diff($old,$post1)){
                return true;
            }else{
                $brand->create();
                $rel = $brand->field("bname,logo,website,description,type")->where("id=" . $post["id"])->save();
            }
        } else {
            unset($old["logo"]);

            if(!array_diff($old,$post1)){
                return true;
            }else{
                $brand->create();
                $rel = $brand->field("bname,website,description,type")->where("id=" . $post["id"])->save();
            }


        }
        if ($rel) {
            return true;
        } else {
            return false;
        }

    }
}