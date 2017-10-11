<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller{
    public function _initialize(){
        if(session('aid')<1){
            $this->redirect('Admin/index');

        }
    }

    public function cateadd(){
        $cate=M('category');
        if(IS_POST){
            $data['catename']=trim($_POST['catename']);
            $data['pid']=isset($_POST['pid'])?$_POST['pid']:0;

           if(!$data['catename']){
               $this->ajaxReturn(array('status'=>'error','msg'=>'分类名不能为空'));
           }else{
               $res=$cate->where(array("catename"=>$data['catename']))->find();
               if($res){
                   $this->ajaxReturn(array('status'=>'error','msg'=>'分类已经存在，请重新添加'));
               }else{
                   $a=$cate->add($data);
                   if($a){
                       $b=$cate->where(array("catename"=>$data['catename']))->find();
                       if($data['pid']==0){
                           $path['path']=$b['cid'];
                       }else{
                           $fresult=$cate->where(array('cid'=>$b['pid']))->find();

                           $path['path']=$fresult['path'].','.$b['cid'];

                       }
                       $cate->where(array('cid'=>$b['cid']))->save($path);
                       $this->ajaxReturn(array('status'=>'ok','msg'=>'分类添加成功'));
                   }else{
                       $this->ajaxReturn(array('status'=>'error','msg'=>'分类添加失败'));
                   }
               }
           }

        }else{
            $res=$cate->order('path')->select();
            foreach($res as $val){
                $path=count(explode(",",$val['path']));
                $val['catename']=str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$path).$val['catename'];
                $cateinfo[]=$val;
            }
            $this->assign('cateinfo',$cateinfo);
            $this->display();
        }

    }

    public function catelist(){
        $category=M('category');
        $count=$category->count();
        $Page = new \Think\Page($count,6);
        $show=$Page->show();
        $catelist=$category->order('cid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            foreach($catelist as $k=>$val){
                $path['cid']=array('in',$val['path']);
                $data= $category->order('path')->where($path)->getField('catename',true);
                foreach($data as $k1=>$val1){
                    $catelist[$k]['pathname1'].='>>'.$val1;
                }
               $catelist[$k]['pathname']=ltrim($catelist[$k]['pathname1'],'>>');
            }
        $map['key']=I('get.key');
        foreach($map as $key=>$val) {
            $Page->parameter[$key]   =   urlencode($val);
        }
        $this->assign("catelist",$catelist);
        $this->assign("page",$show);

        $this->assign("firstRow",$Page->firstRow);
        $this->display();
    }

    public function del(){
        $cate['pid'] = I('post.id');
        $del['cid']=I('post.id');
        $category = M('category');
        $ids = $category->where($cate)->find();//这里的目的就是查下有没有子类
        if(count($ids)>0){
            $this->ajaxReturn(array('status'=>'error','msg'=>'该分类下面还存在子分类，请处理好了再来'));
        }else{
            if(M('category')->where($del)->delete()){
                $this->ajaxReturn(array('status'=>'error','msg'=>'删除成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
            }
        }

    }

}