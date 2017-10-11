<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller{
    public function index()
    {
        $this->display('add');
    }
    public function _initialize(){
        if(session('aid')<1){
            $this->redirect('Admin/index');
        }
    }


    public function getgoods()
    {
        //分类名称
        $cate = M()->query('select * from mj_category order by path');
        foreach ($cate as $row) {
            $spaceNum = count(explode(',', $row['path']));
            $row['catename'] = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp", $spaceNum) . $row['catename'];
            $result[] = $row;
        }

        $this->assign('catelist', $result);
        $this->display('add');
    }

    public function  addgoods(){
//
        if (IS_POST) {
            $data['goodsname'] = trim(I('post.goodsname'));
            $data['cid'] = trim(I('post.cid'));
            $data['num'] = trim(I('post.num'));
            $data['marketprice'] = trim(I('post.marketprice'));
            $data['price'] = trim(I('post.price'));
            $data['description'] = trim(I('post.description'));
            $data['createtime'] = time();

            if (!$data['goodsname']) {
                $this->error('商品名称不能为空');
            }
            if (!$data['cid']) {
                $this->error('请选择分类名称');
            }
            if (!$data['price']) {
                $this->error('请输入商品价格');
            }
            $goods = M('Goods');
            $id = $goods->add($data);
            if ($id > 0) {
                $config = array(
                    'maxSize' => 3145728,
                    'rootPath' => './Uploads/',
                    'exts' => array('jpg', 'gif', 'png', 'jpeg'),
                    'autoSub' => false,
                    //'subName' => array('date', 'Ymd')
                );
                $upload = new \Think\Upload($config);
                $info = $upload->upload();
                if ($info) {
                    foreach ($info as $file) {
                        $filename = './Uploads/' . $file['savepath'] . $file['savename'];
                        $thumbname60 = "./Uploads/" . $file['savepath'] . '60_' . $file['savename'];
                        $thumbname400 = "./Uploads/" . $file['savepath'] . '400_' . $file['savename'];
                        $image = new \Think\Image();


                        $image->open($filename)->thumb(60, 60)->save($thumbname60);
                        $image->open($filename)->thumb(400, 400)->save($thumbname400);
                        $arr['picname'] = '400_' . $file['savename'];
                        $arr['gid'] = $id;
                        $pic = M('Pic');
                        $pic->add($arr);
                        $arr1['picname'] = $file['savename'];
                        $arr1['id'] = $id;
                        $gid = $goods->save($arr1);
                        if ($gid > 0) {
                            $this->success('商品添加成功');
                        }
                    }

                } else {
                    $this->error('请选择图片上传');
                }


            } else {
                $this->error('请填写内容');
            }

        }
    }



//    public function goodslist(){
//        $this->display('list');
//}


    public function fenye()
    {
        //分页
        $p=I('get.p');
        $key= I("get.key");
        $goods = M('Goods');
        if(isset($key)&& !empty($key)){
            $message['goodsname'] = array('like', "%" . $key . "%");
        }
        $count = $goods->where($message)->count();
        $page = new \Think\Page($count, 4);
        $show = $page->show();
        $goodslist = $goods->where($message)->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
        $map['key'] = I('get.key');
        foreach ($map as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }
        foreach ($goodslist as $k=>$v){

            $id=$v['cid'];
            $cate=M('Category');
            $catelist=$cate->where("cid=$id")->find();

            $goodslist[$k]['cid']=$catelist['catename'];

        }

        $this->assign('count',$count);
        $this->assign('p',$p);
        $this->assign('page', $show);
        $this->assign('goodslist', $goodslist);
        $this->assign('firstRow', $page->firstRow);
        $this->display('list');
    }

    public function goodslist()
    {
        $goods = M('Goods');
        $goodslist = $goods->select();
        foreach ($goodslist as $k => $v) {

            $id = $v['cid'];
            $cate = M('Category');
            $catelist = $cate->where("cid=$id")->find();

            $goodslist[$k]['cid'] = $catelist['catename'];


        }

        $this->assign('goodslist', $goodslist);
        $this->assign('title', '首页');

        $this->display('list');
    }

    public function edit()
    {
        $id = I('get.id');
        $goods = M('Goods');
        $list = $goods->where("id=$id")->select();
        $this->assign('list', $list);
        $this->display('edit');
    }

    public function editaction()
    {
        if (IS_POST) {
            $id = I('post.id');
            $data['goodsname'] = trim(I('post.goodsname'));
//            $data['cid'] = trim(I('post.cid'));
            $data['num'] = trim(I('post.num'));
            $data['marketprice'] = trim(I('post.marketprice'));
            $data['price'] = trim(I('post.price'));
            // $data['description'] = trim(I('post.description'));

            if (!$data['goodsname']) {
                $this->error('商品名称不能为空');
            }
            if (!$data['price']) {
                $this->error('请输入商品价格');
            }
            $goods = M('Goods');
            $res = $goods->where("id=$id")->save($data);
            if ($res > 0) {
                $this->success('编辑成功');
            } else {
                $this->error('请选择编辑内容');
            }
        }
        //$this->display('edit');
    }


    //删除
    public function del()
    {
        $id = I('get.id');
        $goods = M('Goods');
        $res = $goods->where("id=$id")->delete();
        if ($res > 0) {
            $this->success('删除成功');

        }

    }

    public function qs()
    {
        $arr = I('post.ji');
        if (isset($arr) && !empty($arr)) {
            $admin = M('Member');
            foreach ($arr as $v) {
                $id = $admin->where("id=$v")->delete();
            }
            if ($id > 0) {
                $this->success('删除成功');
            }
        } else {
            $this->error('删除失败');
        }

    }
}