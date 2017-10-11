<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller{
    public function index(){
        $this->display('add');
    }
    public function _initialize(){
        if(session('aid')<1){
            $this->redirect('Admin/index');
        }
    }


  public function getcate(){
       $cate=M()->query('select * from mj_category order by path');
    foreach($cate as $row) {
          $spaceNum=count(explode(',', $row['path']));
          $row['catename']=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp",$spaceNum).$row['catename'];
          $result[]=$row;
    }

      $this->assign('catelist',$result) ;
      $this->display('add');
    }


//  public function catelist(){
//      $this->display();
//  }
   public function addcate(){
       if (IS_POST) {
           //分类信息入库
           $data['catename'] = I('post.catename');
           $data['pid'] = isset($_POST['pid'])?$_POST['pid']:0;

           $categoryModel = M('Category');
           $res=$categoryModel->where(array('catename'=> $data['catename']))->find();
           if($res){
               $this->success('该分类已存在,请重新添加','',2);

           }elseif($categoryModel->create($data)){

               //验证通过
               $num=$categoryModel->add();
               if ( $num>0) {
                   if($data['pid']==0){
                       $path=$num;
                   }else{
                       $arr=$categoryModel->where(array('cid'=>$data['pid']))->find();
                       $path=$arr['path'].','.$num;
                   }
                   $categoryModel->save(array('path'=>$path,'cid'=>$num));
                   //插入成功
                   $this->success('分类信息添加成功', '', 1);
               } else {
                   //插入失败
                   $this->error('分类信息添加失败');
               }
           } else {
               //验证失败
               $this->error($categoryModel->getError());
           }

       }
          //$this->display('add');
   }

   public function catelist(){
       $cate=M('Category');
       $list=$cate->select();
       foreach($list as $k=>$v){
           //print_r($v);
         $pathlist=$cate->where("cid in ({$v['path']})")->order("path")->select();
           foreach($pathlist as $v1){
               $list[$k]['pathname'].='>>'.$v1['catename'];
           }

       }
         $this->assign('list',$list);
       $this->display();
   }

    public function fenye()
    {
        //分页
        $p=I('get.p');
        $key=I("get.key") ;
        $goods =M('Category');
        if(isset($key)&& !empty($key)){
            $message['catename'] = array('like', "%" .$key . "%");
        }

        $count = $goods->where($message)->count();
        $page = new \Think\Page($count,3);
        $show = $page->show();
        $goodslist = $goods->where($message)->order("cid desc")->limit($page->firstRow . ',' . $page->listRows)->select();
        $map['key'] = I('get.key');
        foreach ($map as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }

        foreach($goodslist as $k=>$v){
            $pathlist=$goods->where("cid in ({$v['path']})")->order("path")->select();
            foreach($pathlist as $v1){
                $goodslist[$k]['pathname'].='--'.$v1['catename'];
            }

        }
         $this->assign('count',$count);
         $this->assign('p',$p);
        $this->assign('page', $show);
        $this->assign('goodslist', $goodslist);
        $this->assign('firstRow', $page->firstRow);
        $this->display('catelist');
    }
//编辑
    public function edit(){
        $cid=I('get.cid');
      $cate=M('Category');
        $catelist=$cate->where("cid=$cid")->select();
        $this->assign('catelist',$catelist);
        $this->display('edit');
    }

    public function editaction(){
        $cid=I('post.cid');
        $data['catename']=trim(I('post.catename'));
        if(!$data['catename']){
            $this->error('编辑名称不能为空');
        }
        $cate=M('Category');
        $res=$cate->where("cid=$cid")->save($data);

        if($res>0){
            $this->success('编辑成功');
        }
    $this->display('edit');
    }

    public function delcate(){
        $cid=I('get.cid');
        if($cid>0){
            $obj=M('category');
            if($obj->field('cid')->where(array('pid'=>$cid))->find()){
                $this->success('该分类下有子分类，无法删除','',3);
            }elseif($obj->where(array('cid'=>$cid))->delete()){
                $this->success('删除成功','',1);
            }else{
                $this->error('未知错误');
            }
        }

    }


}