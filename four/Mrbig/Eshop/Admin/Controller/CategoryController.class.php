<?php
namespace Admin\Controller;
use Admin\Model\CategoryModel;
use Think\Controller;
use Think\Page;

class CategoryController extends Controller {
    public function index(){

    }
    //分类列表
    public function categoryList(){
        $obj=new CategoryModel();
        $catename['catename']=I('catename')?I('catename'):'';
        $cate=$obj->getAllCate($catename['catename']);
        $count=count($cate);
        $page=new Page($count,5);
        foreach($catename as $k=>$v){
            $page->parameter[$k]=$v;
        }
        $show=$page->show();
        $cateList=$obj->getAllCate($catename['catename'],$page->firstRow,$page->listRows);
        foreach($cateList as $k=>$v){
            foreach(explode(',',$v['path']) as $key=>$val){
                $pathid=$obj->getCate($val);
                $pathname.='>>'.$pathid['catename'];
            }
            $cateList[$k]['pathname']=substr($pathname,2);
            $pathname='';
        }
        $this->assign('cateList',$cateList);
        $this->assign('page',$show);
        $this->display();
    }

    //删除分类
    public function delCategory(){
        $cate['id']=I('id');
        $obj=new CategoryModel();
        if($obj->delCategory($cate['id'])){
            $this->success('删除成功');
        }else{
            $this->error('存在下级分类，不允许删除');
        }
    }

    //渲染添加分类模板并且把顶级分类赋值
    public function add_category(){
        $obj=new CategoryModel();
        $fCate=$obj->firstCate();
        $this->assign('fCate',$fCate);
        $this->display();
    }

    //当顶级分类有变化时，赋值二级分类
    public function firstChildCate(){
        $obj=new CategoryModel();
        $sCate=$obj->firstChildCate(I('fpid'));
        echo $sCate;
    }

    //添加分类到数据库
    public function addCategory(){
        if(!I('catename')){
            $this->error('分类名称不能为空');
        }
        $cate['fid']=I('firstCate');
        $cate['sid']=I('secondCate')?I('secondCate'):0;
        $cate['catename']=I('catename');
        $obj=new CategoryModel();
        if($obj->addCategory($cate)){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }

    //编辑分类模板输出
    public function editCategory(){
        $id=I('id');
        $obj=new CategoryModel();
        $fCate=$obj->firstCate();
        $cate=$obj->getCate($id);
        $catePath=explode(',',$cate['path']);
        if(count($catePath)==3){
            $cate['fCate']=$catePath[0];
            $cate['sCate']=$catePath[1];
        }elseif(count($catePath)==2){
            $cate['fCate']=$catePath[0];
            $cate['sCate']=0;
        }elseif(count($catePath)==1){
            $cate['fCate']=0;
            $cate['sCate']=0;
        }
        $this->assign('cate',$cate);
        $this->assign('fCate',$fCate);
        $this->assign('cateid',$id);
        $this->display('edit_category');
    }

    //编辑分类插入数据库
    public function saveCategory(){
        if(!I('catename')){
            $this->error('分类名称不能为空!','',1);
        }else{
            $cate['first']=I('firstCate');
            $cate['second']=I('secondCate')?I('secondCate'):0;
            $cate['catename']=I('catename');
            $cate['id']=I('id');
            $obj=new CategoryModel();
            echo $obj->saveCategory($cate);
        }
    }
}