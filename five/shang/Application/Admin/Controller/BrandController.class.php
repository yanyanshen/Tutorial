<?php
namespace Admin\Controller;
use Think\Controller;
class BrandController extends Controller
{

//添加品牌
    public function add_brand()
    {
        $brand_name = trim(I('post.brand_name'));//I想当于post接收数据
        if (IS_POST) {
            //$data['brand_name']="jkjk";
            //var_dump($filename);
            $sql = M('Brand');//数据库表名
            $data = $sql->where("brand_name='$brand_name'")->find();//查找的东西放到一个地方
               if (!$brand_name ) {
                $this->error('品牌名称不能为空', 'add_brand', 2);
            } else{
                if ($data['brand_name'] == $brand_name) {
                    $this->error('品牌名字已经存在，请添加新的品牌');
                }else {
                    $upload=new \Think\Upload();
                    $upload ->maxSize =3145728;//设置附件上传大小
                    $upload->exts=array('jpg','png','jpeg');//设置附件上传类型
                    $upload->rootPath='./Public/Uploads/';//设置附件上传根目录
                    $upload->savePath='brands/';
                    $upload->autoSub=false;//关闭自动子目录
                    $file=$upload->upload();
                   // $filename='./Uploads/'.$file['logo']['savename'];//放置原图的位置
                    $res['brand_name']=$brand_name;
                    $res['logo']=$file['logo']['savename'];
                    $sql ->add($res);//把用户对象写入数据库*/
                    //var_dump( $sql ->add($res));
                    $this->success("添加成功",U('add_brand'),2 );
                }
            }
        }else{

            //print_r($meminfo['pic']);
            //$this->assign('meminfo', $meminfo);
            $this->assign('logo', $res['logo']);
            $this->display();
        }

    }
    //品牌列表
public function listbrand(){

    $brand = M('Brand');//数据库表名
    $condition['brand_name']=array('like',"%".I('get.key')."%");//搜索条件
    $count = $brand->where($condition)->count();// 查询满足要求的总记录数
    $page  = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(3)
    $page -> setConfig('header','<span class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
    $page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    $show  = $page->show();// 分页显示输出
    // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $list = $brand->where($condition)->order('bid desc')->limit($page->firstRow.','.$page->listRows)->select();
    $this->assign('page',$show);// 赋值分页输出
    $this->assign('firstRow',$page->firstRow);//赋值每页开始条数
    $this->assign('brand',$list);
    $this->assign('count',$count);

    /*$data=$brand->select();//查询的所有数据值全放到data中
    $this->assign('brand',$data);//brand是$data的变量*/
    //var_dump($brand);
    $this->display();
}
    //编辑品牌
    public function edit_brand()
    {
        $sql = M('Brand');//数据库表名
        $bid=I('get.bid');
        //var_dump($bid);
        $brand['brand_name'] = trim(I('post.brand_name'));
        $brand['bid']=$bid;
        if (IS_POST) {
           $data = $sql->where(array('brand_name'=> $brand['brand_name']))->find();//查找的东西放到一个数组
                if ($data>0) {
                    $this->error('存在此商品，修改失败',U('listbrand'),2);
                } else {
                     $sql ->save($brand);
                    $this->success('修改成功',U('listbrand'),2);
        }
        }else{
            $brand=$sql->find($bid);
            $this->assign('brand',$brand);
            $this->assign('bid',$bid);
            $this->display();
        }

    }
    public function del_brand()
{
    $obj=M('Brand');
    $bid=I('get.bid');
    //var_dump($bid);
    $res=$obj->where("bid=$bid")->delete();
    if($res){
        $this->ajaxReturn(array('status' => 'ok', 'msg' => '删除成功'));
    }else{
        $this->ajaxReturn(array('status' => 'ok', 'msg' => '删除失败'));
    }
    $this->display();
}

}



