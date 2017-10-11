<?php
namespace Admin\Controller;
use Think\Controller;
class BannerController extends Controller{
    public function index(){
       $this->display('list');
    }



    public function add(){
       $this->display();
    }

    public function  addbanner()
    {
        if (IS_POST) {
            $data['name'] = trim(I('name'));
            $data['description'] = trim(I('post.description'));
            if (!$data['name']) {
                $this->error('轮播图名称不能为空');
            }
            $goods = M('Banner');
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
                        $thumbname300 = "./Uploads/" . $file['savepath'] . '300_' . $file['savename'];
                        $image = new \Think\Image();

                        $image->open($filename)->thumb(300,300)->save($thumbname300);
                        $picname =$file['savename'];
                        //$arr['id'] = $id;

                        $gid = $goods->where("id=$id")->save(array("banner"=>$picname));
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


    public function fenye()
    {

        //分页
        $p=I('get.p');
        $key=I("get.key");
        $goods = M('Banner');
        if(isset($key)&& !empty($key)){
            $message['name'] = array('like', "%" . $key . "%");
        }

        $count = $goods->where($message)->count();
        $page = new \Think\Page($count,4);
        $show = $page->show();
        $goodslist = $goods->where($message)->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
        $map['key'] = I('get.key');
        foreach ($map as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }

        $this->assign('count',$count);
        $this->assign('p',$p);
        $this->assign('page', $show);
        $this->assign('goodslist', $goodslist);

        $this->assign('firstRow', $page->firstRow);
        $this->display('list');
    }


    public function edit()
    {
        $id = I('get.id');
        $goods = M('Banner');
        $list = $goods->where("id=$id")->select();
        $this->assign('list', $list);
        $this->display('edit');
    }

    public function editaction()
    {
        if (IS_POST) {
            $id = I('post.id');
            $data['name'] = trim(I('post.name'));
            $data['description'] = trim(I('post.description'));

            if (!$data['name']) {
                $this->error('轮播名称不能为空');
            }

            $goods = M('Banner');
            $res = $goods->where("id=$id")->save($data);
            if ($res > 0) {
                $this->success('编辑成功');
            } else {
                $this->error('请选择编辑内容');
            }
        }
        //$this->display('edit');
    }

    public function del(){
        print_r($_GET);
        die;
        $id = I('get.id');
        $goods = M('Banner');
        $res = $goods->where("id=$id")->delete();
        if ($res > 0) {
            $this->success('删除成功');

        }

    }
}