<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller{
/*商品信息添加*/
    public function addGoods(){
        if(IS_POST){
            $data['cid'] = trim($_POST['cid']);
            $data['goodsname'] = trim($_POST['goodsname']);
            $data['color'] = trim($_POST['color']);
            $data['num'] = trim($_POST['num']);
            $data['marketprice'] = trim($_POST['marketprice']);
            $data['price'] = trim($_POST['price']);
            $data['description'] = trim($_POST['description']);
            $data['createtime'] = time();
            $config = array(                                /*配置上传设置，实例化上传类*/
                'maxSize'=>3145728,
                'rootPath'=>'./Public/Upload/Goodspic/',
                'exts'=>array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub'=>false,
                );
            $upload=new \Think\Upload($config);
            $info=$upload->upload();
            foreach($info as $files){                        /*生成商品图片缩略图*/
                $pic[]=$files['savename'];
                $filesName='./Public/Upload/Goodspic/'.$files['savepath'].$files['savename'];
                $thumbName_390='./Public/Upload/Goodspic/'.$files['savepath'].'thumb_390_'.$files['savename'];
                $thumbName_150='./Public/Upload/Goodspic/'.$files['savepath'].'thumb_150_'.$files['savename'];
                $thumbName_80='./Public/Upload/Goodspic/'.$files['savepath'].'thumb_80_'.$files['savename'];
                $goodspic=new \Think\Image();
                $goodspic->open($filesName);
                $goodspic->thumb(390,390)->save($thumbName_390);
                $goodspic->thumb(150,150)->save($thumbName_150);
                $goodspic->thumb(80,80)->save($thumbName_80);
            }
            $data['pic']=$pic[0];
            $GoodsModel = new \Admin\Model\GoodsModel('goods');
            if($data['pic']) {                              /*图片验证*/
                $goodsInfo = M('goods')->where(array('cid' => $data['cid'],'goodsname'=>$data['goodsname'],'color'=>$data['color']))->find();
                if(!$goodsInfo){
                    $gid=$GoodsModel->addGoods($data);
                    if($gid) {
                        for ($i = 0; $i < 3; $i++){M('goods_pic')->add(array('gid' => $gid, 'picname' => $pic[$i]));}
                        $this->success('商品添加成功',U('Admin/Goods/addGoods'));
                    }
                }else{
                    $this->error('添加商品已存在，请重新添加',U('Admin/Goods/addGoods'));
                }
            }else{
               $this->error('请添加商品图片',U('Admin/Goods/addGoods'));
            }

        }else {
            $catelist = M('category')->order('path')->select();
            foreach ($catelist as $key => $value) {
                $spaceNum = count(explode(',', $value['path']));
                $catelist[$key]['catename'] = str_repeat("|---", $spaceNum).$catelist[$key]['catename'];
            }
            $this->assign('catelist', $catelist);
            $this->display('Goods/add');
        }
    }

/*商品信息列表*/
    public function goodsList(){
        $goodsmodel=new \Admin\Model\GoodsModel('goods');
        $count=$goodsmodel->count();
        $Page=new \Think\Page($count,10);
        $show=$Page->show();
        $goodslist=$goodsmodel->limit($Page->firstRow.','.$Page->listRows)->select();
        $num=$Page->firstRow;
        $this->assign('firstRow',$num);
        $this->assign('num',($num+10)/10);
        $this->assign('count', $count);
        $this->assign('page', $show);
        $this->assign('goodslist', $goodslist);
        $this->display('Goods/list');
    }

/*商品编辑页面*/
    public function editPage(){
        $goodsID['gid']=trim($_GET['gid']);
        $editModel=new \Admin\Model\GoodsModel('goods');
        $goodsList=$editModel->editGoods($goodsID);
        $this->assign('goodslist',$goodsList);
        if(IS_POST){
            $goods['gid']=trim($_POST['gid']);
            $data['num'] = trim($_POST['num']);
            $data['marketprice'] = trim($_POST['marketprice']);
            $data['price'] = trim($_POST['price']);
            $data['description'] = trim($_POST['description']);
            $info=$editModel->editPage($goods,$data);
            if($info){
                $this->success('商品编辑成功',U('Admin/Goods/goodsList'));
            }
        }else{
            $this->display('Goods/edit');
        }
    }

/*商品信息的修改*/
    public function editGoods(){
        if(isset($_GET)){
            $this->editPage();
        };
    }

/*商品信息的删除*/
    public function delGoods(){
        $delModel=new \Admin\Model\GoodsModel('goods');
        $data['gid']=$_GET['gid'];
        $delModel->delGoods($data);
        $this->goodsList();
    }

/*商品状态处理*/
    public function issale(){
        $saleModel=new \Admin\Model\GoodsModel('goods');
        $value=$_GET['issale']?0:1;
        $saleModel->sale($_GET['gid'],$value);
        $this->goodsList();
    }

/*商品列表搜索*/
    public function search(){
        $searchInfo=trim($_GET['keywords']);
        $searchModel=new \Admin\Model\GoodsModel('goods');
        $goodsInfo=$searchModel->search($searchInfo);
        $this->assign('goodslist',$goodsInfo);
        $this->display('Goods/search');
    }

/*商品详细信息*/
    public function det(){
        $gid=trim(I('get.gid'));
        $goodsinfo=M('goods')->where(array('gid'=>$gid))->find();
        $this->assign('goodsinfo',$goodsinfo);
        $this->display('Goods/det');
    }
}

