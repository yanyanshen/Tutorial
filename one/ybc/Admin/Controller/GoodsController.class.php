<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Upload;
use Think\Image;
use Think\Page;
 class GoodsController extends BgController{
       public  function  index(){

           //搜索查询
            if(isset($_GET['keywords'])){
                    $keywords=$_GET['keywords'];
                    $where1['goodsname']=array('like',"%{$keywords}%");
                   $this->assign('keywords',$keywords);
            }
           if(isset($_GET['active'])){
                 if($_GET['active']!=2){
                      $active=$_GET['active'];
                      $where1['g.active']=$active;
                      $this->assign('active',$active);
                 }else{
                      $this->assign('active',2);
                 }

           }else{
               $this->assign('active',2);
           }





              $goods=M('goods')->alias('g');
              $count=$goods->where($where1)->count();
              $limitrows=5;
              $page=new \Org\Page\AjaxPage($count,$limitrows,"index");
              $limit_value=$page->firstRow.','.$page->listRows;
              $show=$page->show();
               $goodslist=$goods->alias('g')
                ->join('ybc_category c on g.cid=c.id')
                ->join("ybc_brand b on g.bid=b.id")
                ->where($where1)
                ->order('g.addtime desc')
                ->limit($limit_value)
                ->field(array(
                     'g.id','g.pic','goodsname','path','brandname','oldprice','price','weight',
                    'num','g.addtime','g.active','ad','group'
                ))
                ->select();
             //获取商品所在分类
                foreach($goodslist as $k=>$val){
                      $map['id']=array('in',$val['path']);
                      $catename=$goods->table('ybc_category')->where($map)->field('catename')->select();
                     $catearr='';
                    foreach($catename as $v){
                         $catearr.=$v['catename'].'>';
                    }
                    $catearr=substr($catearr,0,-1);
                    $goodslist[$k]['path']=$catearr;
                }








            $this->assign('page',$show);
            $this->assign('count',$count);
            $this->assign('firstrow',$page->firstRow);
            $this->assign('goodslist',$goodslist);
           if(IS_AJAX){
                $this->display('result');
           }else{
               $this->display();
           }

       }
     public function excel()
     {
         $file_name = "商品列表" . date("Y-m-d H:i:s", time());
         $file_suffix = "xls";
         $where = '';
         if ($_GET['keywords']) {
             $keywords = $_GET['keywords'];
             $where['goodsname'] = array('like', "%{$keywords}%");
         }
         if(isset($_GET['active'])){
             if($_GET['active']!=2){
                 $active=$_GET['active'];
                 $where['g.active']=$active;
             }


             }

         $goods=M('goods')->alias('g');
         $goodslist=$goods->alias('g')
             ->join('ybc_category c on g.cid=c.id')
             ->join("ybc_brand b on g.bid=b.id")
             ->where($where)
             ->order('g.addtime desc')
             ->field(array(
                 'g.id','g.pic','goodsname','path','brandname','oldprice','price','weight',
                 'num','g.addtime','g.active','ad','group'
             ))
             ->select();

         //获取商品所在分类
         foreach($goodslist as $k=>$val){
             $map['id']=array('in',$val['path']);
             $catename=$goods->table('ybc_category')->where($map)->field('catename')->select();
             $catearr='';
             foreach($catename as $v){
                 $catearr.=$v['catename'].'>';
             }
             $catearr=substr($catearr,0,-1);
             $goodslist[$k]['path']=$catearr;
         }


         //print_r($goodslist);
         header("Content-Type: application/vnd.ms-excel");
         header("Content-Disposition: attachment; filename=$file_name.$file_suffix");
       if(IS_AJAX){
                if($goodslist){
                      $this->success();
                }else{
                      $this->error('没有找到商品信息');
                }
        }
         $this->assign('info',$goodslist);
        $this->display();


     }
     public  function  add(){
          $model=M('category');
          //获取顶级分类列表
          $where['active']=1;
          $cateinfo=$model->order('pid asc')->where($where)->select();
          $catelist=self::tree($cateinfo);
          //获取品牌列表
           $brandlist=$model->table('ybc_brand')->where(array('active'=>1))->select();
           //获取表单提交数据
         $this->assign('brandlist', $brandlist);
         $this->assign('catelist', $catelist);
         $this->display();
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
     public function addgoods(){
         $model = D('Goods');
         $data =$model->create();
              if($data){
                  $common=A('Common');
                  $info=$common->uploadPic();
                  if(is_array($info)){
                      $image=new Image();
                      //获取图片文件路径
                      $filename='./Uploads/goodsPic/'.$info[0]['savename'];
                      //缩略
                      $thumb800='./Uploads/goodsPic/800/'.'800_'.$info[0]['savename'];
                      $thumb400='./Uploads/goodsPic/400/'.'400_'.$info[0]['savename'];
                      $thumb100='./Uploads/goodsPic/100/'.'100_'.$info[0]['savename'];
                      $image->open($filename)->thumb(800,800)->save($thumb800);
                      $image->open($filename)->thumb(100,100)->save($thumb100);
                      $image->open($filename)->thumb(400,100)->save($thumb400);
                  }else{
                      $this->error($info);
                  }
                  $data['addtime']=time();
                  // $data['detail']=htmlspecialchars($data['detail']);

                  $data['pic']=$info[0]['savename'];
                  $data['detaile']=htmlspecialchars_decode($data);
                  $gid=$model->addGoods($data);

                  if($gid){
                      session('lastGid',$gid);
                      $this->success('商品添加成功');
                  }else{
                      $this->error('商品添加失败');
                  };
              }else{
                  $this->error($model->getError());
              }
          }









     public function UploadgoodsPic(){
         $common=A('Common');
         $info=$common->uploadPic();
         if(is_array($info)){
             $image=new Image();
             //获取图片文件路径
             $filename='./Uploads/goodsPic/'.$info['file']['savename'];
             //缩略
             $thumb800='./Uploads/goodsPic/800/'.'800_'.$info['file']['savename'];
             $thumb400='./Uploads/goodsPic/400/'.'400_'.$info['file']['savename'];
             $thumb100='./Uploads/goodsPic/100/'.'100_'.$info['file']['savename'];
             $image->open($filename)->thumb('800','800')->save($thumb800);
             $image->open($filename)->thumb('100','100')->save($thumb100);
             $image->open($filename)->thumb('400','100')->save($thumb400);
             //添加到商品图片表
             $data['gid']=session('lastGid');
             $data['picname']=$info['file']['savename'];

             M('goods_pic')->add($data);
         }else{
             $this->error($info);
         }
     }





     public function edit(){

             $id=I('get.id');
             $model=M('goods');
             $res=$model->where(array("id"=>$id))->find();
             //根据id获取商品图片表信息
             $goodspic=$model->table('ybc_goods_pic')->where(array("gid"=>$id))->select();
             //获取品牌列表
             $brandlist=$model->table('ybc_brand')->where(array('active'=>1))->select();
             //获取商品所在品牌名称
            /* $brand1=$model->table('ybc_brand')->field('brandname')->where(array('active'=>1,'id'=>$res['bid']))->select();
             foreach($brand1 as $k=>$val){
                 $brandname=$val['brandname'];
             }*/
             //获取分类列表
             $cateinfo=$model->table('ybc_category')->order('pid asc')->where(array('active'=>1))->select();
             $catelist=self::tree($cateinfo);
             //获取商品所在分类名称
          /*   $cateinfo1=$model->table('ybc_category')->order('pid asc')->where(array('active'=>1,'id'=>$res['cid']))->select();
             $cate1=self::tree($cateinfo1);
             foreach($cate1 as $v){
                 $catename=$v['catename'];
             }*/
             // $this->assign('brandname',$brandname);
             //$this->assign('catename',$catename);
             $this->assign('catelist',$catelist);
             $this->assign('brandlist', $brandlist);
             $this->assign('goodspic',$goodspic);
             $this->assign('res',$res);
             $this->display();
         }

     public  function editgoods(){
            $model=M('goods');
            $data=$model->create();
            if($data){
                $data['changetime']=time();
                if($model->save($data)){//更新商品信息
                    if($_FILES){
                        $goodsinfo = $model->field('pic')->find(I('post.id'));//获取商品图片信息
                        $upload = new Upload();
                        $upload->maxSize = 3145728;// 设置附件上传大小
                        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                        $upload->rootPath = './Uploads/goodsPic/'; // 设置附件上传根目录
                        $upload->autoSub = false;
                        $info = $upload->upload();
                        foreach ($info as $k => $val) {
                            //生成缩略图
                            $image = new Image();
                            //获取图片文件路径
                            $filename = './Uploads/goodsPic/' . $val['savename'];
                            //缩略
                            $thumb800 = './Uploads/goodsPic/800/' . '800_' . $val['savename'];
                            $thumb400 = './Uploads/goodsPic/400/' . '400_' . $val['savename'];
                            $thumb100 = './Uploads/goodsPic/100/' . '100_' . $val['savename'];


                            $image->open($filename)->thumb('800', '800')->save($thumb800);
                            $image->open($filename)->thumb('400', '400')->save($thumb400);
                            $image->open($filename)->thumb('100', '100')->save($thumb100);


                            if ($k == 0) {
                                $data['id'] = I('post.id');
                                $data['pic'] = $val['savename'];
                                if ($model->save($data)) {
                                    //删除原图
                                    unlink('./Uploads/goodsPic/' . $goodsinfo['pic']);
                                    unlink('./Uploads/goodsPic/800/' . '800_' . $goodsinfo['pic']);
                                    unlink('./Uploads/goodsPic/400/' . '400_' . $goodsinfo['pic']);
                                    unlink('./Uploads/goodsPic/100/' . '100_' . $goodsinfo['pic']);
                                } else {
                                    $this->error('主图更新失败');
                                }
                            } elseif ($k > 0) {
                                $id = $k;
                                $data['id'] = $id;
                                $data['picname'] = $val['savename'];
                                if (M('goods_pic')->save($data)) {
                                    //删除原图
                                    $picinfo = M('goods_pic')->field('picname')->find($id);
                                    unlink('./Uploads/goodsPic/' . $picinfo['picname']);
                                    unlink('./Uploads/goodsPic/800/' . '800_' . $picinfo['picname']);
                                    unlink('./Uploads/goodsPic/400/' . '400_' . $picinfo['picname']);
                                    unlink('./Uploads/goodsPic/100/' . '100_' . $picinfo['picname']);

                                }


                            }

                        }
                    }
                    $this->success('编辑成功');
                }else{
                    $this->error('编辑失败');
                }

            }else{
                $this->error($model->getError());
            }

     }


     public function show(){
                 $model=D('Goods');
              $a=$model->chkActiveById(I('post.id'));
                 if($a['active']==1){
                     $res=$model->xiajiaById(I('post.id'));
                     if($res){
                         $this->success("下架成功");
                     }else{
                         $this->error("下架失败");
                     }
                 }else{
                     $res=$model->activeById(I('post.id'));
                     if($res){
                         $this->success("上架成功");
                     }else{
                         $this->error("上架失败");
                     }
                 }


     }
     public  function delete($id){
            $model=M('goods');
            $res1=M("goods")->where(array('id'=>$id))->find();
            $res2=M("goods_pic")->where(array('gid'=>$id))->select();
            if($res1 && $res2){
            $picArr[]=$res1['pic'];
            foreach($res2 as $v){
               $picArr[]=$v['picname'];
            }
            foreach($picArr as $va){
               unlink('./Uploads/goodsPic/' . $va);
               unlink('./Uploads/goodsPic/800/' . '800_' . $va);
               unlink('./Uploads/goodsPic/400/' . '400_' . $va);
               unlink('./Uploads/goodsPic/100/' . '100_' . $va);
            }
            $res=$model->where(array('id'=>$id))->delete();//删除商品表中的商品
                if($res){
                    M('goods_pic')->where(array('gid'=>$id))->delete();
                    M('cart')->where(array('gid'=>$id))->delete();//删除购物车表中的商品
                    M('cart')->where(array('gid'=>$id))->delete();//删除收藏表中的商品
                    $this->success('删除成功');
                }else{
                    $this->error('删除失败');
                }
            }else{
            $this->error('删除失败');
            }


     }


 }
