<?php
 namespace Admin\Controller;
 use Admin\Common\Controller\BgController;
 use Think\Controller;
 use Think\Upload;
 use Think\Image;
 use Think\Page;
 class BrandController extends BgController {

     public function index()  {

         //搜索查询->开始
         if(isset($_GET['keywords'])){
             $keywords=$_GET['keywords'];
             $condition['brandname']=array("like","%{$keywords}%");
             $this->assign('keywords',$keywords);
         }else{
             $condition='';
         }



         if(isset($_GET['active'])){
             if($_GET['active']!=2){
                 $active=$_GET['active'];
                 $condition['active']=$active;
                 $this->assign('active',$active);
             }else{
                 $this->assign('active',2);
             }
         }else{

             $this->assign('active',2);
         }


         //搜索查询->结束

          $model=M('brand');
           $count=$model->where($condition)->count();
           $limitrows=3;
           $page=new \Org\Page\AjaxPage($count,$limitrows,"index");
           $show=$page->show();
           $limit_value=$page->firstRow.','.$page->listRows;
           $list=$model->where($condition)->limit($limit_value)->order('addtime desc')->select();

           $this->assign('page',$show);
           $this->assign('count',$count);
           $this->assign('list',$list);
           $this->assign('firstrow',$page->firstRow);

         if(IS_AJAX){
             $this->display('result');
         }else{
             $this->display();
         }
     }
   public function excel(){
       $file_name = "品牌列表" . date("Y-m-d H:i:s", time());
       $file_suffix = "xls";
       $where = '';
       if($_GET['keywords']){
           $keywords=$_GET['keywords'];
           $where['brandname']=array('like',"%{$keywords}%");
       }
       if(isset($_GET['active'])) {
           if ($_GET['active'] != 2) {
               $active = $_GET['active'];
               $where['active'] = $active;
           }
       }
       $model=M('brand');
       $list=$model->where($where)->order('addtime desc')->select();


       header("Content-Type: application/vnd.ms-excel");
       header("Content-Disposition: attachment; filename=$file_name.$file_suffix");


       if(IS_AJAX){
           if($list){
               $this->success();
           }else{
               $this->error('没有找到信息');
           }
       }
       $this->assign('info',$list);
       $this->display();

   }
     public function add(){
         if(IS_AJAX){
            $model=D('Brand');
           $data=$model->create();
             if($data){
                   //上传logo
                 $upload=new Upload();
                 $upload->maxSize = 3145728;// 设置附件上传大小
                 $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                 $upload->rootPath = './Uploads/brandsPic/'; // 设置附件上传根目录
                 $upload->autoSub = false;
                 $info= $upload->upload();
                 if($info){
                     $filename = './Uploads/brandsPic/' . $info[0]['savename'];
                     $imge = new Image();
                     $logopic = './Uploads/brandsPic/logopic/' . '100_' . $info[0]['savename'];
                     $imge->open($filename)->thumb(100, 100)->save($logopic);

                 }else{
                     $this->error('没有上传文件');
                 }
                 $data['addtime']=time();
                 $data['pic']=$info[0]['savename'];
                 $cid=$model->addbrand($data);
                 if($cid){
                     $this->success('品牌添加成功');
                 }else{
                     $this->error('品牌添加失败');
                 }
             }else{
                 $this->error($model->getError());
             }


         }
         $this->display();

        }
     public  function edit(){
                    $model=D('Brand');
                  $result=$model->chkactive(I('post.id'));
                 if($result['active']==1){
                       $res=$model->xiajia(I('post.id'));
                       if($res){
                             $this->success('品牌下架成功');
                       }else{
                           $this->error('品牌下架失败');
                       }
                 }else{
                     $res=$model->active(I('post.id'));
                     if($res){
                         $this->success('品牌上架成功');
                     }else{
                         $this->error('品牌上架失败');
                     }
                 }

     }

     public  function delete($id){
           $model=M('brand');
           if($model->where(array("id"=>$id))->delete()){
               M('goods')->where(array('bid'=>$id))->delete();//同时删除该品牌下的所有商品
               $this->success('品牌删除成功');
           }else{
               $this->error('品牌删除失败');
           }
     }


 }