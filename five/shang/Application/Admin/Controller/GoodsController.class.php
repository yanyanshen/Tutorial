<?php
namespace Admin\Controller;
use Think\Controller;
header("content_type:text/html;charset=utf-8");
class GoodsController extends Controller
{
    public function goods_add()
    {
        $goods = M('goods');  //连接数据库
        $pic=M('pic'); //连接数据库
        $data['goodsname'] = trim($_POST['goodsname']);
        $data['bid'] = trim($_POST['bid']);
        $data['cid'] = trim($_POST['cid']);
        $data['num'] = trim($_POST['num']);
        $data['price'] = trim($_POST['price']);
        $data['createtime']=time();
        $data['description']=trim($_POST['description']);
        if ($_POST) {
            if (!$data['goodsname']&I('post.num','','int')&I('post.price','','float')) {
                $this->error('商品名字不能为空');
            }else{
                $res = $goods->where(array('goodsname' => $data['goodsname']))->find();
                if ($res) {
                    $this->error('该商品已存在');
                } else {
                    $upload = new \Think\Upload();  //实例化上传类
                    $upload->mixSize = 1024 * 1024; //设置附件大小
                    $upload->exts = array('jpg', 'png', 'jpeg', 'gif');  //设置附件的上传类型
                    $upload->rootPath = './Public/Uploads/';  //设置附件上传根目录
                    $upload->savePath = 'goods/'; // 设置附件上传（子）目录
                    $upload->autoSub = false;  // 关闭自动使用子目录上传文件
                    //将商品信息插入商品表
                    $gid=$goods->add($data);
                    $info = $upload->upload();  //上传文件
                    if (!$info) {
                        $this->error($upload->getError());  //上传错误并提示错误信息
                    } else {
                        foreach ($info as $file) {
                            $fileurl = './Public/Uploads/'.$file['savepath'].$file['savename'];//原图保存位置
                            //保存图片名称到数据库
                            $arr[]=$file['savename'];
                            $picarr['gid']=$gid;
                            $picarr['picname']=$file['savename'];
                            $pic->add($picarr);
                            //生成商品的缩略图
                            $thumburl_300 = './Public/Uploads/'.$file['savepath'].'350_' . $file['savename'];//350缩略图保存位置
                            $thumburl_100 = './Public/Uploads/'.$file['savepath'].'100_' . $file['savename'];//100缩略图保存位置
                            $image = new \Think\Image();
                            $image->open($fileurl);
                            $image->thumb(350, 350)->save($thumburl_300);//生成350缩略图
                            $image->thumb(100, 100)->save($thumburl_100);//生成100缩略图
                            //$image->water('.__STATIC__/upload//logo.png')->save($thumbname300);//生成图片水印
                            //$image->open($thumbname500)->text('mlms.com','__STATIC__/upload/msyh.ttf',20,'#f00',\Think\Image::IMAGE_WATER_SOUTHEAST)->save($thumbname500);//生成文字水印

                        }
                        //将商品主图片的名称添加至商品表
                        $arr['gid'] = $gid;
                        $arr['pic'] = $arr[0];
                        if($goods->save($arr)){
                            $this->success('商品添加成功');
                        }else{
                            $this->error('该商品添加失败');
                        }
                    }
                }
            }
        }else {
            $cate = M('category');
            $row = $cate->order('path')->select();
            foreach ($row as $v) {
                $spaceNum = count(explode(",", $v['path']));
                $v['cname'] = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $spaceNum) . $v['cname'];
                $result[] = $v;
            }
            $brand = M('brand');
            $res = $brand->select();
            $this->assign('brand', $res);
            $this->assign('list', $result);

            $this->display();
        }
    }



    public function goods_list()
    {

        $goods = M('goods');//数据库表名
        $condition['goodsname']=array('like',"%".I('get.key')."%");//搜索条件
        $condition['issale']=1;
        $count=$goods->where($condition)->count();  // 查询满足要求的总记录数

        $Page= new \Think\Page($count,5);  // 实例化分页类 传入总记录数和每页显示的记录数
        $Page -> setConfig('header','<span class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
        $Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $pageList=$goods->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();//分页
        $show=$Page->show();  // 分页显示输出
        //$Page->setConfig('current','当前页');
        $map['key']=I('get.key');
        //分页跳转的时候保证查询条件
        foreach($map as $key=>$val) {
            $Page->parameter[$key]   =   urlencode($val);
        }
        $this->assign("count","$count");
        $this->assign('Page',$show);  // 赋值分页输出
        $this->assign("pageList",$pageList); // 赋值数据集
        $this->assign("firstRow",$Page->firstRow);//点击哪个从哪个页面的首行开始
        $this->display();  // 输出模板

    }

    public function goods_edit(){
        $goods = M('goods'); //连接数据库
        $pic=M('pic');       //连接数据库

        //提交修改数据更新并写入数据库
        if (IS_POST) {
            //修改的值
            $data['goodsname'] = trim(I('post.goodsname'));
            $data['cid'] = trim(I('post.cid'));
            $data['bid'] = trim(I('post.bid'));
            $data['num'] = trim(I('post.num'));
            $data['price'] = trim(I('post.price'));
            //$data['pic'] = I('post.pic');
            $data['description'] = trim(I('post.description'));
            //上传图片
            $upload = new \Think\Upload();  //实例化上传类
            $upload->mixSize = 1024 * 1024; //设置附件大小
            $upload->exts = array('jpg', 'png', 'jpeg', 'gif');  //设置附件的上传类型
            $upload->rootPath = './Public/Uploads/';  //设置附件上传根目录
            $upload->savePath = 'goods/'; // 设置附件上传（子）目录
            $upload->autoSub = false;  // 关闭自动使用子目录上传文件

            $info = $upload->upload();  //上传文件
            if (!$info) {
                //    $this->error($upload->getError());  //上传错误并提示错误信息
            } else {
                $gid=I('get.gid'); //获取商品的gid
                foreach ($info as $file) {
                    $fileurl = './Public/Uploads/'.$file['savepath'].$file['savename'];//原图保存位置
                    //生成商品的缩略图
                    $thumburl_300 = './Public/Uploads/'.$file['savepath'].'350_' . $file['savename'];//350缩略图保存位置
                    $thumburl_100 = './Public/Uploads/'.$file['savepath'].'100_' . $file['savename'];//100缩略图保存位置
                    $image = new \Think\Image();
                    $image->open($fileurl);
                    $image->thumb(350, 350)->save($thumburl_300);//生成350缩略图
                    $image->thumb(100, 100)->save($thumburl_100);//生成100缩略图
                    //保存图片名称到数据库
                    //$arr[]=$file['savename'];
                    $picarr['gid']=$gid;
                    $picarr['picname']=$file['savename'];
                    //$image->water('.__STATIC__/upload//logo.png')->save($thumbname300);//生成图片水印
                    //$image->open($thumbname500)->text('mlms.com','__STATIC__/upload/msyh.ttf',20,'#f00',\Think\Image::IMAGE_WATER_SOUTHEAST)->save($thumbname500);//生成文字水印
                }}
            $pic->add($picarr);
            $data['pic']=$picarr['picname'];
            //将商品信息添加至商品表
            $res=$goods->where(array('gid'=>$gid))->save($data);
            if ($res) {
                $this->success('修改成功', U('goods_list'), 2);
            } else {
                $this->error('修改失败', U('goods_list'), 2);
            }
        } else {

            //dump($info);die;
            $cate = M('category');  //连接数据库
            $row = $cate->order('path')->select();
            foreach ($row as $v) {
                //遍历出商品类别和商品品牌并分配
                $spaceNum = count(explode(",", $v['path']));
                $v['cname'] = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $spaceNum) . $v['cname'];
                $result[] = $v;
            }
            $gid=I('get.gid');
            $thisGoods=$goods->where("gid=$gid")->find();
            $thisPic=$pic->where("gid=$gid")->select();
            $brand = M('brand');  //连接数据库
            $res = $brand->select();
            $this->assign('brand', $res);
            $this->assign('list', $result);
            //dump($info);
            //将获取的数据分配给相应的项目
            $this->assign('thisGoods',$thisGoods);
            $this->assign('$thisPic',$thisPic);
            $this->display();
        }
    }

    public function goods_del()
    {
        $goods = M('goods');
        $gid = I('get.gid');
        $res = $goods->delete($gid);
        if ($res) {
            $this->success('删除成功', U('goods_list', array('b' => uniqid())), 2);
        } else {
            echo "删除失败";
        }
    }
}



