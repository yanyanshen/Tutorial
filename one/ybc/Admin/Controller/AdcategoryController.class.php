<?php
namespace Admin\Controller;

use Admin\Common\Controller\BgController;
use Think\Page;

class AdcategoryController extends  BgController{

    //广告分类页面
    public function index(){
        if(IS_GET){
            $search=I('get.search');
            $where['adcatename']=array('like',"%$search%");
            $this->assign('search',$search);
        }else{
            $where='';
        }
        //分页查询

        $limitRows=4;

        $adcategory=M('Adcategory');
        $count=$adcategory->where($where)->count();
        $page=new \Org\Page\AjaxPage($count,$limitRows,"search");


        $page->setConfig('first','首页');
        $page->setConfig('last','尾页');


        $show=$page->show();
        $list=$adcategory->order('id asc')->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        //面包屑路径
        foreach($list as $k=>$v){
            $where['id']=array('in',$v['path']);
            $adcatename=$adcategory->field('adcatename')->where($where)->select();
            $str='';
            foreach($adcatename as $v1){
                $str.=$v1['adcatename']."&nbsp;&nbsp;".'->';
            }
            $str=substr($str,0,-2);
            $list[$k]['path']=$str;
        }
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('firstRow',$page->firstRow);
        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->display('adList');
        }
    }


    //上下架操作
    public function putAway(){
        $id=I('get.id');
        $res=D('Adcategory')->modify($id);
        if($res){
            echo "修改成功！";
        }else{
            echo false;
        }
    }

    //查询广告分类
    public function addCategory(){
        if(IS_POST){
            $aid=I('post.aid')?I('post.aid'):0;
            $cateList=D('Adcategory')->getCateByAid($aid);
            if($cateList){
                $this->success($cateList);
            }else{
                $this->error('查询失败');
            }
        }else{
            $this->display('addAdCate');
        }
    }

    //添加分类
    public function addAdCate(){
        if(IS_POST){
            $adcatename=I('post.adcatename');
            $firstCate=I('post.firstCate');
            $secondCate=I('post.secondCate');
            $thirdCate=I('post.thirdCate');
            if($adcatename){
                $res=D('Adcategory')->chkName($adcatename);
                $data['adcatename']=$adcatename;
                if($res){
                    if($firstCate){
                        if(!$secondCate && !$thirdCate){//检查第一项是否存在
                            $data['aid']=$firstCate;
                            $data['path']=D('Adcategory')->getCatePath($firstCate);
                            $id=D('Adcategory')->addCate($data);
                            if($id){
                                $path=$data['path'].",".$id;
                                $ref=D('Adcategory')->Updata($id,$path);
                                if($ref){
                                    $this->success('添加成功');
                                }else{
                                    $this->error('添加失败');
                                }
                            }else{
                                $this->error('添加失败');
                            }
                        }else{
                            if($secondCate && !$thirdCate){//检查第二项是都存在
                                $data['aid']=$secondCate;
                                $data['path']=D('Adcategory')->getCatePath($secondCate);
                                $id=D('Adcategory')->addCate($data);
                                if($id){
                                    $path=$data['path'].",".$id;
                                    $ref=D('Adcategory')->Updata($id,$path);
                                    if($ref){
                                        $this->success('添加成功');
                                    }else{
                                        $this->error('添加失败');
                                    }
                                }else{
                                    $this->error('添加失败');
                                }
                            }elseif($thirdCate){//检查第三项是否存在
                                $data['aid']=$thirdCate;
                                $data['path']=D('Adcategory')->getCatePath($thirdCate);
                                $id=D('Adcategory')->addCate($data);
                                if($id){
                                    $path=$data['path'].",".$id;
                                    $ref=D('Adcategory')->Updata($id,$path);
                                    if($ref){
                                        $this->success('添加成功');
                                    }else{
                                        $this->error('添加失败');
                                    }
                                }else{
                                    $this->error('添加失败');
                                }
                            }
                        }
                    }else{
                        $this->error('请选择分类');
                    }
                }else{
                    $this->error('分类已经存在');
                }
            }else{
                $this->error('请填写要添加的分类名称');
            }
        }else{
            $this->display('addAdCate');
        }
    }



    //删除分类操作
    public function del(){
        $id=I('get.id');
        $res=D('Adcategory')->del($id);
        if($res){
            echo "删除成功";
        }else{
            echo false;
        }
    }


}