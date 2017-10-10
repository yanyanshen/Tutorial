<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Upload;
use Think\Image;
use Think\Page;
class IntegralController extends BgController{
    public  function  index(){
        Load('extend');
        //搜索查询
        if(isset($_GET['keywords'])){
            $keywords=$_GET['keywords'];
            $where1['goodsname']=array('like',"%{$keywords}%");
            $this->assign('keywords',$keywords);
        }
        $goods=M('goods_integral')->alias('g');
        $count=$goods->where($where1)->count();
        $page=new Page($count,5);
        $show=$page->show();
        $goodslist=$goods->alias('g')
            ->where($where1)
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('firstrow',$page->firstRow);
        $this->assign('goodslist',$goodslist);
        $this->display();
    }

    public function addgoods(){
        $model = M('Goods_integral');
        $data =$model->create();
        if($data){
            $common=A('Common1');
            $info=$common->uploadPic();
            if(is_array($info)){
                $image=new Image();
                //获取图片文件路径
                $filename='./Uploads/integralGoodsPic/'.$info[0]['savename'];
                //缩略
                $thumb800='./Uploads/integralGoodsPic/800/'.'800_'.$info[0]['savename'];
                $thumb400='./Uploads/integralGoodsPic/400/'.'400_'.$info[0]['savename'];
                $thumb100='./Uploads/integralGoodsPic/100/'.'100_'.$info[0]['savename'];
                $image->open($filename)->thumb(800,800)->save($thumb800);
                $image->open($filename)->thumb(100,100)->save($thumb100);
                $image->open($filename)->thumb(400,100)->save($thumb400);
            }else{
                $this->error($info);
            }
            $data['addtime']=time();

            $data['pic']=$info[0]['savename'];
            $gid=$model->add($data);

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
        $common=A('Common1');
        $info=$common->uploadPic();
        if(is_array($info)){
            $image=new Image();
            //获取图片文件路径
            $filename='./Uploads/integralGoodsPic/'.$info['file']['savename'];
            //缩略
            $thumb800='./Uploads/integralGoodsPic/800/'.'800_'.$info['file']['savename'];
            $thumb400='./Uploads/integralGoodsPic/400/'.'400_'.$info['file']['savename'];
            $thumb100='./Uploads/integralGoodsPic/100/'.'100_'.$info['file']['savename'];
            $image->open($filename)->thumb('800','800')->save($thumb800);
            $image->open($filename)->thumb('100','100')->save($thumb100);
            $image->open($filename)->thumb('400','100')->save($thumb400);
            //添加到商品图片表
            $data['gid']=session('lastGid');
            $data['picname']=$info['file']['savename'];

            M('goods_pic_integral')->add($data);
        }else{
            $this->error($info);
        }
    }
    public function edit(){
        if (IS_POST) {
            $goods = M('goods_integral');
            $data = $goods->create();
            if ($data) {
                $data['addtime'] = time();
                //更新商品信息
                if ($goods->field('goodsname,price,points,detail,addtime,id')->save($data)){
                    //更新图片信息
                    if ($_FILES) {
                        $goodsInfo = $goods->field('pic')->find(I('post.id'));
                        $upload = new \Think\Upload();
                        $upload->maxSize = 3145728;// 设置附件上传大小
                        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型D
                        $upload->rootPath = './Uploads/integralGoodsPic/'; // 设置附件上传根目录
                        $upload->savePath = "{$goodsInfo['savepath']}";
                        $upload->autoSub = false;
                        $info = $upload->upload();

                        foreach ($info as $key => $val) {
                            $image = new Image();
                            //获取图片文件路径
                            $filename = './Uploads/integralGoodsPic/' . $val['savepath'] . $val['savename'];
                            //缩略
                            $thumb800 = './Uploads/integralGoodsPic/800/' . $val['savepath'] . '800_' . $val['savename'];
                            $thumb400 = './Uploads/integralGoodsPic/400/' . $val['savepath'] . '400_' . $val['savename'];
                            $thumb100 = './Uploads/integralGoodsPic/100/' . $val['savepath'] . '100_' . $val['savename'];
                            $image->open($filename)->thumb('400', '400')->save($thumb400);
                            $image->open($filename)->thumb('100', '100')->save($thumb100);
                            $image->open($filename)->thumb('800', '800')->save($thumb800);
                            //修改主图
                            if ($key == 0) {
                                $data['id'] = I('post.id');
                                $data['pic'] = $val['savename'];
                                $goods->save($data);
                            } else if ($key > 0) { //修改辅图
                                $pid = $key;
                                $data['id'] = $pid;
                                $data['picname'] = $val['savename'];
                                M('goods_pic_integral')->save($data);
                            }
                        }
                    }
                    $this->success('商品更新成功');
                } else {
                    $this->error('商品更新失败');
                }
            } else {
                $this->error($goods->getError());
            }
        } else {
            $gid = trim(I('get.id'));
            $goods = M('goods_integral')->where(array('id' => $gid))->order(array('id' => 'desc'))->limit('2,2')->find();
            $goods['detail'] = html_entity_decode($goods['detail']);
            $pic = M('goods_pic_integral')->where(array('gid' => $gid))->select();
            $this->assign('goods', $goods);
            $this->assign('pic', $pic);
            $this->display();
        }
    }
    public function show(){
        $model=M('goods_integral');
        $id=I('post.id');
        $a=$model->where(array('id'=>$id))->find();
        if($a['active']==1){
            $data['active']=0;
            $res=$model->where(array('id'=>$id))->save($data);
            if($res){
                $this->success("下架成功");
            }else{
                $this->error("下架失败");
            }
        }else{
            $data1['active']=1;
            $res=$model->where(array('id'=>$id))->save($data1);
            if($res){
                $this->success("上架成功");
            }else{
                $this->error("上架失败");
            }
        }
    }
    public  function delete($id){
        $model=M('goods_integral');
        $res1=M("goods_integral")->where(array('id'=>$id))->find();
        $res2=M("goods_pic_integral")->where(array('gid'=>$id))->select();
        if($res1 && $res2) {
            $picArr[] = $res1['pic'];
            foreach ($res2 as $v) {
                $picArr[] = $v['picname'];
            }
            foreach ($picArr as $va) {
                unlink('./Uploads/integralGoodsPic/' . $va);
                unlink('./Uploads/integralGoodsPic/800/' . '800_' . $va);
                unlink('./Uploads/integralGoodsPic/400/' . '400_' . $va);
                unlink('./Uploads/integralGoodsPic/100/' . '100_' . $va);
            }
            $res = $model->where(array('id' => $id))->delete();
            if ($res) {
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        }else{
            $this->error('删除失败');
        }
    }
    public function excel(){
        $file_name = "积分商品列表" . date("Y-m-d H:i:s", time());
        $file_suffix = "xls";
        $where = '';
        if ($_GET['keywords']) {
            $keywords = $_GET['keywords'];
            $where['goodsname'] = array('like', "%{$keywords}%");
        }

        $goods=M('goods_integral')->alias('g');
        $goodslist=$goods->alias('g')
            ->where($where)
            ->order('g.addtime desc')
            ->select();
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

}
