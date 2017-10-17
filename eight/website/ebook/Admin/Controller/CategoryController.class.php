<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CommonController {
    public function categoryadd(){
        if(IS_POST){
            //分类信息入库
            $data['catename'] = I('post.catename');
            $data['pid'] = I('post.pid',0,'int');//pid通常是整型，所以做个小处理
            $data['is_show'] = I('post.is_show');
            $categoryModel = D('category');
            if($categoryModel->create($data)){
                //验证通过
                if($categoryModel->add()){
                    //插入成功
                    $this -> success('分类信息添加成功',U('categoryadd'),1);
                }else{
                    //插入失败
                    $this -> error('分类信息添加失败');
                }
            }else{
                //验证失败
                $this -> error($categoryModel->getError());
            }
            return;
        }
            //载入添加分类页面
            //获取所有的分类
            $cats = D('Category')->catTree();
            $this -> assign('cats',$cats);
            $this->display();
        }
//列表页
    public function categorylist(){
        $cats = D('Category')->catTree();
        $this -> assign('cats',$cats);
        $this -> display();
    }
    //删除
    public function deletecategory(){
        if(M('category')->where('id='.I('id','',int))->delete()){
            $this->success('删除成功！',U('Category/categoryList'));
        }
    }
}

