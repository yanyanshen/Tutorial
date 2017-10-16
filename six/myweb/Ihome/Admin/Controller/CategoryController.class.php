<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller{
/*添加商品分类模块*/
    public function addCategory(){
        $cate['catename']= trim(I('post.catename'));
        $pid = isset($_POST['pid']) ? $_POST['pid'] : 0;
        $catemodel = new \Admin\Model\CategoryModel('category');
        $selinfo = $catemodel->selCate($cate);
        $catelist = $catemodel->getCatelist();
        foreach($catelist as $key=>$value){
            $spaceNum=count(explode(',',$value['path']));
            $catelist[$key]['catename']=str_repeat("|--",$spaceNum).$catelist[$key]['catename'];
        }
        $this->assign('catelist',$catelist);
        if(IS_POST){                            /*判断添加商品分类*/
            if($selinfo) {
                $this->ajaxReturn(array('status'=>'error'));
            }else{
                $data['catename']=$cate['catename'];
                $data['pid'] = $pid;
                $cateId = $catemodel->addCate($data);
                if ($pid == 0) {
                    $path = $cateId;
                }else{
                    $pathNum = M('category')->where(array('cid' => $pid))->find();
                    $path = $pathNum['path'] . ',' . $cateId;
                }
                M('category')->where(array('cid' => $cateId))->save(array('path' => $path));
                if ($cateId>0){
                    $this->ajaxReturn(array('status'=>'ok'));
                }
            }
        }else{
            $this->display('Category/add');
        }
    }

/*商品分类列表模块*/
    public function cateList(){
        $catemodel=new \Admin\Model\CategoryModel('category');
        $count=$catemodel->count();
        $Page=new \Think\Page($count, 10);
        $show=$Page->show();
        $catelist=$catemodel->limit($Page->firstRow.','.$Page->listRows)->select();

        /*遍历上级分类名称*/
        foreach($catelist as $k=>$v){
            foreach(explode(',',$v['path']) as $key=>$val){
                $pathid=$catemodel->getCate($val);
                $pathname.='>>'.$pathid['catename'];
            }
            $catelist[$k]['pathname']=substr($pathname,2);
            $pathname='';
        }
        $num=$Page->firstRow;
        $this->assign('firstRow',$num);
        $this->assign('num',($num+10)/10);
        $this->assign('count', $count);
        $this->assign('page', $show);
        $this->assign('catelist', $catelist);
        $this->display('Category/list');
    }

/*编辑功能*/
    public function editcate(){
        $data['cid']=trim($_GET['cid']);
        $catemodel=new \Admin\Model\CategoryModel('category');
        $catelist=$catemodel->selCate($data);
        $cid['cid']=$catelist['pid'];
        $catecid=$catemodel->selCate($cid);
        $cate['cid']=trim($_POST['cid']);
        $name['catename']=trim($_POST['catename']);
        $this->assign('catelist',$catelist);
        $this->assign('catecid',$catecid);
        $info=$catemodel->saveCate($cate,$name);
        if($info){
            $this->ajaxReturn(array('status'=>'ok'));
        }else{
            $this->display('Category/edit');
        }
    }

/*商品分类查询模块*/
    public function selList(){
        $searchInfo=$_GET['keywords'];
        $searchModel=new \Admin\Model\CategoryModel('category');
        $catelist=$searchModel->search($searchInfo);
        foreach($catelist as $k=>$v){
            foreach(explode(',',$v['path']) as $key=>$val){
                $pathid=$searchModel->getCate($val);
                $pathname.='>>'.$pathid['catename'];
            }
            $catelist[$k]['pathname']=substr($pathname,2);
            $pathname='';
        }
        $this->assign('catelist',$catelist);
        $this->display('Category/search');
    }

/*分类删除*/
    public function delcate(){
        $cid=trim(I('get.cid'));
        $model=new \Admin\Model\CategoryModel();
        $res=$model->delCate($cid);
        $this->ajaxReturn(array('status'=>$res));
    }
}