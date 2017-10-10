<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;
class CategoryController extends BgController{
     public function  index(){

         //搜索查询
          if(isset($_GET['keywords'])){
                 $keywords=$_GET['keywords'];
                $where1['catename']=array('like',"%{$keywords}%");
                $this->assign('keywords',$keywords);
          }
         if(isset($_GET['active'])){
             if($_GET['active']!=2){
                   $active=$_GET['active'];
                   $where1['active']=$active;
                   $this->assign('active',$active);
             }else{
                   $this->assign('active',2);
             }

         }else{
             $this->assign('active',2);
         }




            $model=M('category'); //获取分类模型
            $count=$model->where($where1)->count();
           $limitrows=5;
            $page=new \Org\Page\AjaxPage($count,$limitrows,"index");
            $show=$page->show();
           $limit_value=$page->firstRow.','.$page->listRows;
            $res=$model->where($where1)->limit($limit_value)->order('addtime desc')->select();
         foreach($res as $k=>$v){//获取面包屑路径
             $map['id']=array('IN',$v['path']);
             $catename=$model->field('catename')->where($map)->select();
             $cateStr='';
             foreach($catename as $va){
                 $cateStr.=$va['catename'].'>';
             }
             $cateStr=substr($cateStr,0,-1);
             $res[$k]['path']=$cateStr;
         }



           $this->assign('page1',$page->firstRow);
           $this->assign('count',$count);
           $this->assign('page',$show);
           $this->assign('firstRow',$page->firstRow);
           $this->assign('res',$res);
         if(IS_AJAX){
               $this->display('result');
         }else{
             $this->display();
         }

     }
    public function excel(){

        $file_name = "分类列表" . date("Y-m-d H:i:s", time());
        $file_suffix = "xls";
        $where = '';
        if($_GET['keywords']){
            $keywords=$_GET['keywords'];
            $where['catename']=array('like',"%{$keywords}%");
        }
        if(isset($_GET['active'])) {
            if ($_GET['active'] != 2) {
                $active = $_GET['active'];
                $where['active'] = $active;
            }
        }

            $model=M('category'); //获取分类模型
            $res=$model->where($where)->order('addtime desc')->select();
            foreach($res as $k=>$v){//获取面包屑路径
                $map['id']=array('IN',$v['path']);
                $catename=$model->field('catename')->where($map)->select();
                $cateStr='';
                foreach($catename as $va){
                    $cateStr.=$va['catename'].'>';
                }
                $cateStr=substr($cateStr,0,-1);
                $res[$k]['path']=$cateStr;
            }

            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=$file_name.$file_suffix");

            if(IS_AJAX){
                  if($res){
                       $this->success();
                  }else{
                      $this->error('没有找到信息');
                  }
            }
            $this->assign('info',$res);
            $this->display();
        }


        public  function add(){
            $model=M('category');
            $res=$model->create();
            $res['addtime']=time();
            if(!$res['catename']){
                $this->error('分类名称不能为空');
            }elseif($model->where(array('catename'=>trim($res['catename'])))->find()){
                $this->error('分类名称已经存在');
            }else{
                if($id=$model->add($res)){
                    if($res['pid']==0){
                        $path=$id;
                    }else{
                        $where['id']=$res['pid'];
                        $presentpath=$model->where($where)->field('path')->find();
                        $path=$presentpath['path'].','.$id;
                    }
                    $res['path']=$path;
                    $model->where(array('id'=>$id))->save($res);
                    $this->success('分类添加成功');
                }else{
                    $this->error('分类添加失败');
                }


            }

        }

    public function cate(){
        $model=M('category');
        $data=$model->order('pid asc')->select();
        $catelist=self::tree($data);


        $this->assign('catelist',$catelist);

         $this->display('Category/add');
    }
    static public $treeList = array();

    static public function tree(&$data,$pid =0,$count = 1) {
        foreach ($data as $key => $value){
            if($value['pid']==$pid){
                $value['Count'] = $count;
                $value['catename'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $count).''.$value['catename'];
                self::$treeList []=$value;
                unset($data[$key]);
                self::tree($data,$value['id'],$count+1);
            }

        }
        return self::$treeList ;
    }
    public  function edit(){
              $model=D('category');
             $a=$model->chkedit(I('post.id'));
             if($a['active']==1){
                   $res=$model->xiajia(I('post.id'));
                 if($res){
                      $this->success('下架成功!');
                 }else{
                      $this->error('下架失败');
                 }
             }else{
                   $res=$model->active(I('post.id'));
                   if($res){
                        $this->success('上架成功');
                   }else{
                        $this->error('上架失败');
                   }
             }
    }
    public function editcate(){

          if(IS_POST){

                 $model=D('category');
                 $data=$model->create();
                 if($data){
                       //更新分类信息
                      if($model->save($data)){
                          if($data['pid']==0){
                              $path=$data['id'];
                          }else{
                              $where['id']=$data['pid'];
                              $parent=M('category')->where($where)->find();
                              $path=$parent['path'].','.$data['id'];
                          }
                          $data1['path']=$path;
                          $model->where(array('id'=>$data['id']))->save($data1);
                          $this->success('编辑成功');
                      }else{
                          $this->error('没有修改任何内容，编辑失败');
                      }
                 }else{
                     $this->error($model->getError());
                 }


          }else{

               $id=I('get.id');
               $model=D('Category');
              $res=$model->chkedit($id);

              $pid=$model->chkpath($id);
              /*print_r($id);*/
              $catename=M('category')->field('catename')->where(array('id'=>$pid))->find();

              $data=$model->order('pid asc')->select();
              $catelist=self::tree($data);


              $this->assign('catelist',$catelist);
             $this->assign('catename',$catename);
              $this->assign('res',$res);
              $this->display();
          }


    }

    public function  delete($id){
            $model=M('category');
            //如果该分类为顶级分类则删除包括他的子分累
            $cateinfo=$model->field('path')->where(array('id'=>$id))->find();
              $path=$cateinfo['path'];
              $where1['path']=array('like',"$path%");
             $arr=$model->where($where1)->field('id')->select();
                  $str='';
             foreach($arr as $v){
                    $str.=$v['id'].',';
             }
               $where['cid']=array('in',$str);
             $res=$model->where($where1)->delete();
          if($res){
                M('goods')->where($where)->delete();//同时删除该分类下的所有商品
                $this->success('删除成功');

          }else{

              $this->error('删除失败');
          }
    }
}