<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends Controller {

    public function linklist(){
        $list=D('Link')->select();
        $this->assign("list",$list);
        if($_GET['tip']=='tip'){
            echo "<script>layer.msg('添加成功')</script>";
        }
        $this->display();

    }
    public function  addlink(){
            if(IS_POST){
                if($_FILES!=null){
                    $path = $this->upload();
                    $path="./Public/Upload/".$path;
                    $image = new \Think\Image();
                    $image->open($path);
                    $link="./Public/Upload/linkPic/".time().'.jpg';
// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                    $image->thumb(179, 89)->save($link);
                    $_POST['imgsrc']=$link;
                    $User = D("Link"); // 实例化User对象
// 根据表单提交的POST数据创建数据对象
                    if($User->create()){
                        $result = $User->add($_POST); // 写入数据到数据库
                        if($result){
                            echo "<script>location.href='linklist';alert('添加成功');</script>";
                            // 如果主键是自动增长型 成功后返回值就是最新插入的值
//                             redirect('/Link//tip/tip');
                        }else{
                            echo "<script>alert('添加失败')</script>";
                        }
                    }
                }
            }
        $this->display();

    }
    public function upload()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/Upload/'; // 设置附件上传根目录
        $upload->savePath = 'LinkPic/'; // 设置附件上传（子）目录
        $upload->autoSub = false;
        // 上传文件
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功 获取上传文件信息
            foreach ($info as $file) {
                return  $file['savepath'].$file['savename'];
            }
        }

    }
    public function del(){
        $arr=$_POST['del'];
        $ab=array();
        foreach ($arr as $v){
           $ab[]= D('Link')->where("id='$v'")->delete();
        }
        if( count($arr)==count($ab)){
            echo "true";
        }else{
            echo "false";
        }

    }
}
