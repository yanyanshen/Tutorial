<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Upload;
use Think\Image;
use Think\Page;
class AdgoodController extends BgController{

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





    static public $treeList1 = array();
    static public function tree1(&$data,$aid =0,$count = 1) {
        foreach ($data as $key => $value){
            if($value['aid']==$aid){
                $value['Count'] = $count;
                $value['adcatename'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $count).''.$value['adcatename'];
                self::$treeList1 []=$value;
                unset($data[$key]);
                self::tree1($data,$value['id'],$count+1);
            }

        }
        return self::$treeList1 ;

    }



    public function add(){
        $brand=M('Brand')->select();
        $this->assign('brand',$brand);
        $goods=D('Goods');
        //获取分类列表
        $cateinfo=$goods->table('ybc_category')->order('pid asc')->where(array('active'=>1))->select();
        $catelist=self::tree($cateinfo);
        $this->assign('catelist',$catelist);
        if(IS_POST){
            $info=$goods->create();
            if($info){
                //得到广告分类
                $firstCate=I('post.firstCate');
                $secondCate=I('post.secondCate');
                $thirdCate=I('post.thirdCate');
                if($firstCate){
                    if($secondCate && !$thirdCate){
                        $aid=$secondCate;
                    }elseif($thirdCate){
                        $aid=$thirdCate;
                    }else{
                        $aid=$firstCate;
                    }
                }else{
                    echo "请选择广告分类";
                }
                $bid=I('post.bid');
                $cid=I('post.cid');
                if(!$bid){
                    echo "请选择品牌分类";
                }
                if(!$cid){
                    echo '请选择商品分类';
                }
                $data['goodsname']=I('post.goodsname');
                $data['bid']=$bid;
                $data['cid']=$cid;
                $data['price']=I('post.price');
                $data['oldprice']=I('post.oldprice');
                $data['num']=I('post.num');
                $data['weight']=I('post.weight');
                $data['detail']=I('post.detail');
                $data['addtime']=time();
                $data['ad']=1;
                $common=A('Common');
                $imgInfo=$common->uploadPic();
                $adpic=$imgInfo['adpic']['savename'];
                if(is_array($imgInfo)){
                    $image=new Image();
                    //获取图片文件路径
                    $filename='./Uploads/goodsPic/'.$imgInfo['file']['savename'];
                    //缩略
                    $thumb800='./Uploads/goodsPic/800/'.'800_'.$imgInfo['file']['savename'];
                    $thumb400='./Uploads/goodsPic/400/'.'400_'.$imgInfo['file']['savename'];
                    $thumb100='./Uploads/goodsPic/100/'.'100_'.$imgInfo['file']['savename'];
                    $image->open($filename)->thumb(800,800)->save($thumb800);
                    $image->open($filename)->thumb(100,100)->save($thumb100);
                    $image->open($filename)->thumb(400,100)->save($thumb400);
                }else{
                    $this->error($info);
                }
                $data['pic']=$imgInfo['file']['savename'];
                $gid=$goods->add($data);
                session('lastGid',$gid);

                $addata['gid']=$gid;
                $addata['adpic']=$adpic;
                $addata['aid']=$aid;
                $addata['addtime']=time();

                $res=M('Adgood')->add($addata);
                if(!$res){
                    echo M("Adgood")->getError();
                }

            }else{
                echo $goods->getError();
            }
        }else{
            $this->display('add');
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



    public function index(){

        if(IS_GET){
            $keyword=I('get.keyword');
            $way=I('get.way');
            $this->assign('keyword',$keyword);
            $this->assign('way',$way);
            if($way=='goodsname'){
                $condition['goodsname']=array('like',"%$keyword%");
                $goodsIn=M('Goods')->where($condition)->select();
                $str='';
                foreach($goodsIn as $v){
                    $str.=$v['id'].',';
                }
                $where['gid']=array('in',$str);
            }elseif($way=='bid'){
                $condition['brandname']=array('like',"%{$keyword}%");
                $bid=M('Brand')->where($condition)->getField('id');

                $condition1=array('bid'=>$bid);
                $goods2=M('Goods')->where($condition1)->select();
                $str='';
                foreach($goods2 as $v){
                    $str.=$v['id'].',';
                }
                $where['gid']=array('in',$str);
            }
        }else{
            $where='';
        }
        $limitRows = 4;
        $goods=M('Goods');
        $adgood=M('Adgood');
        $count=$adgood->where($where)->count();


        $page = new \Org\Page\AjaxPage($count,$limitRows,"search");

        $page->setConfig('first','首页');
        $page->setConfig('last','尾页');



        $show=$page->show();
        $list=$adgood->order('addtime desc')->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        foreach($list as $k=>$v){
            $gid=$v['gid'];
            $aid=$v['aid'];
            $path=M('adcategory')->where(array('id'=>$aid))->getField('path');
            $where['id']=array('in',$path);
            $category=M("adcategory")->where($where)->select();
            $str='';
            foreach($category as $v1){
                $str.=$v1['adcatename']."->";
            }
            $str=substr($str,0,-2);
            $list[$k]['adcate']=$str;
            $goodsInfo=$goods->where(array('id'=>$gid))->find();
            $list[$k]['goodsname']=$goodsInfo['goodsname'];
            $list[$k]['price']=$goodsInfo['price'];
            $list[$k]['oldprice']=$goodsInfo['oldprice'];
            $list[$k]['num']=$goodsInfo['num'];
            $list[$k]['pic']=$goodsInfo['pic'];
            $list[$k]['weight']=$goodsInfo['weight'];
            $list[$k]['brandname']=M('Brand')->where(array('id'=>$goodsInfo['bid']))->getField('brandname');
            $list[$k]['category']=M('Category')->where(array('id'=>$goodsInfo['cid']))->getField('catename');

        }
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->assign('firstRow',$page->firstRow);
        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->display('list');
        }


    }




    //----------------------上下架操作-------------
    public function put(){
        $id=I('get.id');
        $res=D('Adgood')->put($id);
        if($res){
            echo '操作成功！';
        }else{
            echo false;
        }
    }

    //--------------------删除操作-------------
    public function del(){
        $id=I('get.id');
        $res=D('Adgood')->del($id);
        if($res){
            echo "删除成功!";
        }else{
            echo false;
        }
    }


    //------------显示编辑操作---------
    public function edit(){
        if(IS_GET){
            $id=I('get.id');
            $info=M('Adgood')->alias('a')
                ->join('ybc_goods g ON a.gid=g.id')
                ->join('ybc_adcategory ag ON a.aid=ag.id')
                ->join('ybc_brand b ON g.bid=b.id')
                ->join('ybc_category c ON g.cid=c.id')
                ->join('ybc_goods_pic p ON g.id=p.gid')
                ->field('a.id as id,a.adpic,g.goodsname,b.id as bid,g.price,g.oldprice,g.num,g.weight,c.id as cid,g.pic,ag.id as aid,g.id as gid,ag.path as path,g.detail as detail')
                ->where("a.id={$id}")
                ->find();
            //print_r($info);
            $where['id']=array('in',$info['path']);
            $cate=M('Adcategory')->where($where)->field('id,adcatename')->select();
            $brand=M('Brand')->select();
            $this->assign('brand',$brand);
            $goods=D('Goods');
            $imageInfo=M('Goods_pic')->where(array('gid'=>$info['gid']))->select();
            $this->assign('imageInfo',$imageInfo);
            $info['detail']=html_entity_decode($info['detail']);
            //获取商品分类列表
            $cateinfo=$goods->table('ybc_category')->order('pid asc')->where(array('active'=>1))->select();
            $catelist=self::tree($cateinfo);

            //获得广告分类列表
            $adcateInfo=M('adcategory')->order('aid asc')->where(array('active'=>1))->select();
            $adcateList=self::tree1($adcateInfo);

            $adpic=$info['adpic'];
            $this->assign('adpic',$adpic);


            $this->assign('adcateList',$adcateList);

            $this->assign('catelist',$catelist);
            $this->assign('cate',$cate);
            $this->assign('info',$info);
        }


        $this->display('edit');

    }




    //--------编辑操作----更新数据库操作-----
    public function editGood(){
        if(IS_POST){
            $gid=I('post.gid');
            $goods=D('Goods');
            $goodsInfo=$goods->create();
            $aid=I('post.aid');
            if(!$aid){
                echo "请选择广告分类";
            }

            if($goodsInfo){
                $goodsInfo['addtime']=time();
                if($goods->where(array('id'=>$gid))->save($goodsInfo)){
                    $res=M('Adgood')->where(array('gid'=>$gid))->save(array('aid'=>$aid,'addtime'=>time()));

                    if($res){

                        if($_FILES){
                            $goodsOld=$goods->where(array('id'=>$gid))->getField('pic');
                            $adgoodOld=M('adgood')->where(array('gid'=>$gid))->getField('adpic');
                            $common=A('Common');
                            $imgInfo=$common->uploadPic();
                            //print_r($imgInfo);
                            foreach($imgInfo as $k=>$v){
                                $image=new Image();
                                //获得图片路径
                                $filename='./Uploads/goodsPic/'.$v['savename'];

                                //缩略
                                $thumb800 = './Uploads/goodsPic/800/'.'800_'.$v['savename'];
                                $thumb400 = './Uploads/goodsPic/400/'.'400_'.$v['savename'];
                                $thumb100 = './Uploads/goodsPic/100/'.'100_'.$v['savename'];
                                $image->open($filename)->thumb('800', '300')->save($thumb800);
                                $image->open($filename)->thumb('100', '100')->save($thumb100);
                                $image->open($filename)->thumb('400', '400')->save($thumb400);

                                if($k=='ad'){
                                    $adpic=$imgInfo['ad']['savename'];
                                    $res=M('adgood')->where(array('gid'=>$gid))->save(array('adpic'=>$adpic));
                                    if(!$res){
                                        echo "广告图片修改失败";
                                    }else{
                                        unlink('./Uploads/goodsPic/'.$adgoodOld);
                                        unlink('./Uploads/goodsPic/800/800_'.$adgoodOld);
                                        unlink('./Uploads/goodsPic/400/400_'.$adgoodOld);
                                        unlink('./Uploads/goodsPic/100/100_'.$adgoodOld);
                                    }
                                }



                                if($k=='main'){
                                    $pic=$imgInfo['main']['savename'];
                                    $res=$goods->where(array('id'=>$gid))->save(array('pic'=>$pic));

                                    if($res){
                                        unlink('./Uploads/goodsPic/'.$goodsOld);
                                        unlink('./Uploads/goodsPic/800/800_'.$goodsOld);
                                        unlink('./Uploads/goodsPic/400/400_'.$goodsOld);
                                        unlink('./Uploads/goodsPic/100/100_'.$goodsOld);
                                    }else{
                                        echo "更新商品图片失败";
                                    }
                                }
                                if($k>0){
                                    $pid=$k;
                                    $picName=M('goods_pic')->where(array('id'=>$pid))->getField('picname');
                                    $data['id']=$pid;
                                    $data['picname']=$imgInfo[$k]['savename'];
                                    $res=M('goods_pic')->where(array('id'=>$pid))->save($data);
                                    if($res){
                                        unlink('./Uploads/goodsPic/'.$picName);
                                        unlink('./Uploads/goodsPic/800/800_'.$picName);
                                        unlink('./Uploads/goodsPic/400/400_'.$picName);
                                        unlink('./Uploads/goodsPic/100/100_'.$picName);
                                    }else{
                                        echo "修改商品小图失败";
                                    }

                                }
                            }
                        }
                    }else{
                        echo "商品更新失败1";
                    }
                }else{
                    echo "商品更新失败2";
                }
            }else{
                echo $goods->getError();
            }
        }
    }


    //***********导出广告商品表*****************
    public function export(){
        $file_name="广告商品一览表".date("Y-m-d H:i:s",time());
        $file_suffix="xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file_name.$file_suffix");
        $info=M('adgood')->alias('a')
            ->join('ybc_goods g ON a.gid=g.id')
            ->join('ybc_brand b ON g.bid=b.id')
            ->join('ybc_category c ON g.cid=c.id')
            ->join('ybc_adcategory ad ON a.aid=ad.id')
            ->field('g.goodsname as goodsname,g.salenum as salenum,ad.adcatename adcatename,b.brandname as brandname,c.catename as catename,g.price as price,g.oldprice as oldprice,g.weight as weight,g.num as num')
            ->select();
        $this->assign('info',$info);
        $this->display('export');
    }





}