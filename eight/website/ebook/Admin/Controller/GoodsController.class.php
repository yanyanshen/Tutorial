<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController {
    public function goodsadd(){
        $cats = D('Category')->catTree();
        $this->assign('cats', $cats);

        if ($_POST) {
            //头像上传：
            $upload = new \Think\Upload();
            $upload->maxSize = 3145728;
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath = './Uploads/';
            $upload->autoSub = false;
            $userPic = $upload->upload();
                if ($userPic) {
                    foreach ($userPic as $file) {
                        $_POST['pic']= $file['savename'];
                    }
                }
                if (M('Goods')->add($_POST)) {
                    $this->success('添加成功！', U('Goods/goodsadd'), '3');
                } else {
                    $this->error('添加失败！');
                }

            $getmanager = M('category')->select();
            $this->assign('getmanager', $getmanager);
//        dump($getmanager);

        }
        $this->display();

    }




    public function goodslist(){
        $cats = M()->query("select g.*,c.catename from ebook_goods g ,ebook_category c where g.cid=c.id");
        $this -> assign('cats',$cats);
        // dump($cats);
        $this -> display();
    }
    //删除
    public function  sc(){
        $id=I('id');
      if( M('Goods')->where('id='.$id)->delete()){
          $this->success('删除成功！',U('Goods/goodslist'));
      }
    }
    //编辑
    public function goodsedit(){

        if ($_POST) {
            //头像上传：
            $upload = new \Think\Upload();
            $upload->maxSize = 3145728;
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath = './Uploads/';
            $upload->autoSub = false;
            $userPic = $upload->upload();
            $id = I('post.id');
            if (I('post.pic')) {
                if ($userPic) {
                    foreach ($userPic as $file) {
                        $editorInfo['userPic'] = $file['savename'];
                        $newInfo = M('Goods')->where('id='.$id)->save($editorInfo);
                    }
                }
            }
            if (I('post.goodsname')) {

                $editorInfo['goodsname'] = I('post.goodsname');
                $newInfo = M('Goods')->where('id='.$id)->save($editorInfo);;
            }
            if (I('post.catename')) {
                $editorInfo['catename'] = I('post.catename');
                $newInfo = M('Goods')->where('id='.$id)->save($editorInfo);
            }
            if (I('post.number')) {
                $editorInfo['number'] = I('post.number');
                $newInfo = M('Goods')->where('id=' . $id)->save($editorInfo);
            }
            if (I('post.marketprice')) {
                $editorInfo['marketprice'] = I('post.marketprice');
                $newInfo = M('Goods')->where('id='.$id)->save($editorInfo);
            }
            if (I('post.price')) {
                $editorInfo['price'] = I('post.price');
                $newInfo = M('Goods')->where('id='.$id)->save($editorInfo);
            }
            if (I('post.description')) {
                $editorInfo['description'] = I('post.description');
                $newInfo = M('Goods')->where('id='.$id)->save($editorInfo);
            }
            if ($newInfo) {
                echo "<script>alert('修改成功！');window.location.href='/Admin/Goods/goodslist'</script>";
            } else {
                echo "<script>alert('修改失败！');window.location.href='/Admin/Goods/goodsedit'</script>";
            }


        }else{
            $cats = D('Category')->catTree();
            $this->assign('cats', $cats);
            $id = I('get.id');
            $goods=M('Goods')->find($id);
            $this->assign('goods',$goods);
            /*$getmanager = M('category')->select();
            $this->assign('getmanager', $getmanager);*/
            $this->display();
        }

    }
}
