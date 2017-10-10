<?php
namespace Admin\Controller;

use Admin\Common\Controller\BgController;
use Think\Upload;
use Think\Image;
use Think\Page;

class ArticleController extends BgController
{


    //显示文章列表页面
    public function index()
    {
        //print_r($_GET);
        if(IS_GET){
            $keyword=I('get.keyword');
            $way=I('get.way');
            $this->assign('way',$way);
            $where[$way]=array('like',"%$keyword%");
        }else{
            $where='';
        }
        $article=M('Article');
        $count=$article->where($where)->count();
        //$page=new Page($count,4);
        $limitRows = 4; // 设置每页记录数
        $page=new \Org\Page\AjaxPage($count,$limitRows,"search");

        $page->setConfig('first','首页');
        $page->setConfig('last','尾页');


        $show=$page->show();
        $list=$article->where($where)->order('dateline desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('firstRow',$page->firstRow);
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->assign('keyword',$keyword);
        //print_r($articles);
        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->display('list');
        }


    }


    //显示文章添加页面
    public function add()
    {
        $this->display('add');
    }

    //添加文章操作
    public function addArticle()
    {
        if(IS_POST){
            $upload =new Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/teapic/'; // 设置附件上传根目录
            $article=D('Article');
            if($info=$article->create()){
                if($info=$upload->upload()){
                    foreach($info as $val) {
                        $name = $val['savename'];
                        $path = $val['savepath'];
                        $fileName = "./Uploads/teapic/" . $path . $name;
                        $image = new Image();
                        //缩略图
                        $thumb50 = "./Uploads/teapic/" . $path . "50_" . $name;
                        $image->open($fileName)->thumb(50, 50)->save($thumb50);
                        //添加到数据库
                        $info['title']=I('post.title');
                        $info['author']=I('post.author');
                        $info['descript']=I('post.descript');
                        $info['teatag']=I('post.teatag');
                        $info['content']=I('post.content');
                        $info['dateline']=time();
                        $info['teapic']=$name;
                        $article->add($info);
                    }
                }else{
                    echo $upload->getError();
                }
            }else{
                echo $article->getError();
            }
        }else{
            $this->display('add');
        }
    }


    //显示修改文章界面
    public function modify(){
           $id=I('get.id');
           $where['id']=$id;
           $info=M('Article')->where($where)->find();
           $info['content']=html_entity_decode($info['content']);
           $this->assign('info',$info);
           $this->display('modify');
    }


    //删除文章操作
    public function del(){
       if(IS_POST){
           $id=I('post.id');
           $res=D('Article')->delete($id);
           if($res){
               $this->success('删除成功！');
           }else{
               $this->error('删除失败!');
           }

       }else{
           $this->display('list');
       }
    }




    //修改文章操作
    public function mod(){
        if(IS_POST){
            $files=$_FILES;
            //如果图片信息更改了就添加到数据库
            if($files){
                $upload =new Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =     './Uploads/teapic/'; // 设置附件上传根目录
                $info=$upload->upload();
                foreach($info as $val){
                    $name = $val['savename'];
                    $path = $val['savepath'];
                    $fileName = "./Uploads/teapic/" . $path . $name;
                    $image = new Image();
                    //缩略图
                    $thumb50 = "./Uploads/teapic/" . $path . "50_" . $name;
                    $image->open($fileName)->thumb(50, 50)->save($thumb50);
                }
                $id=I('post.id');
                $data=D('Article')->create();
                $data['dateline']=time();
                $data['teapic']=$name;
                $res=D('Article')->modify($id,$data);
                if($res){
                    echo "文章修改成功";
                }else{
                    return false;
                }


            //如果没更改就不添加
            }else{
                $id=I('post.id');
                $data=D('Article')->create();
                $res=D('Article')->modify($id,$data);
                if($res){
                    echo "文章修改成功";
                }else{
                    return false;
                }
            }
        }else{
            $this->display('index');
        }
    }


    //*****************导出EXCEL表格************
    public function export(){
        $file_name   = "文章一览表-".date("Y-m-d H:i:s",time());
        $file_suffix = "xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file_name.$file_suffix");
        $info=M('article')->select();
        foreach($info as $k=>$v){
            $info[$k]['content']=html_entity_decode($v['content']);
        }
        $this->assign('info',$info);
        $this->display('export');

    }


}

