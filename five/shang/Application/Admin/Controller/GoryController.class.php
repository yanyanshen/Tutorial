<?php
namespace Admin\Controller;
use Think\Controller;
class GoryController extends Controller{

    public function gory_add(){
        $data['cname']=trim($_POST['cname']);
        $data['pid']=isset($_POST['pid'])?$_POST['pid']:0;
        $cate=M('category');
        if($_POST){
        if(!$data['cname']) {
            $this->error('分类名称不能为空');
        }else{
            $res=$cate->where(array('cname'=> $data['cname']))->find();
            if($res){
                $this->error("该分类已存在");
            }else{
                if($cate->add($data)){
                    $r=$cate->where(array('cname'=> $data['cname']))->find();
                    if($data['pid']==0){
                        $path['path']=$r['cid'];
                    }else {
                        $fresult = $cate->where(array('cid'=>$r['pid']))->find();
                        $path['path'] = $fresult['path'].','.$r['cid'];

                    }
                    $cate->where(array('cid'=>$r['cid']))->save($path);
                   $this->success("分类添加成功");
              }else{
                    $this->error("分类添加失败");
                }
            }
        }
        }else{
            $row=$cate->order('path')->select();
            foreach($row as $v){
                $spaceNum=count(explode(",",$v['path']));
                $v['cname']=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$spaceNum).$v['cname'];
                $result[]=$v;
            }
            $this->assign('cname',$result);
            $this->display();
        }
    }
    public function gory_list(){
        //获取各组数值
        $cate = M('Category');
        $val = $cate->select();
        foreach ($val as $k=> $v) {
            $res['cid'] = array('in', $v['path']);
            $data=$cate->order('path')->where($res)->getField('cname',true);
            foreach($data as $k1=>$v1){
                $val[$k]['pathname'].='>'.$v1;
            }
        }
        //分页&&查询
        $condition['cname']=array('like',"%".I('get.key')."%");//搜索条件
        $count=$cate->where($condition)->count();// 查询满足要求的总记录数
        $Page=new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $pageList=$cate->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
        $Page -> setConfig('header','<span class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
        $Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show=$Page->show();//分页显示输出
        //dump($show);
        $this->assign("Page",$show);//赋值分页输出
        $this->assign('info',$pageList);// 赋值数据集
        $this->assign("count",$count);
        $this->assign("firstRow",$Page->firstRow);//点击哪个从哪个页面的首行开始
        $this->display();

    }

    public function gory_del(){
        $cate=M('category');
        $cid=I('get.cid');
        $res=$cate->delete($cid);
        if($res){
            $this->success('删除成功',U('gory_list'),2);
        }else{
            $this->error('删除失败',U('gory_list'),2);
        }
    }

    public function gory_edit(){
        $cate = M('category');
            //更新
            if(IS_POST){
                $data['cid']=$_POST['cid'];
                $data['pid']=$_POST['pid'];
                $data['cname']=$_POST['cname'];
                //拼接path并输出
                if($data['pid']==0){
                    $data['path']=$data['cid'];
                }else {
                    $fresult = $cate->where(array('cid'=>$data['pid']))->find();
                    $data['path'] = $fresult['path'].','.$data['cid'];

                }

                $res = $cate->where(array('cname'=> $data['cname']))->find();//查找的东西放到一个数组

                if($res==NULL){
                    $res=$cate->save($data);
                    $this->success('修改成功',U('gory_list'),2);
                }else{
                    $this->error('修改失败');
                }
            }else{
                $cid=I('get.cid');
            //遍历出商品分类和商品品牌
                $row=$cate->order('path')->select();
                foreach($row as $v){
                    $spaceNum=count(explode(",",$v['path']));
                    $v['cname']=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$spaceNum).$v['cname'];
                    $result[]=$v;
                }

                $thisCate=$cate->where("cid=$cid")->find();
                $this->assign('thisCate',$thisCate);
                $this->assign('infoL',$result);
                $this->display();}

    }
}