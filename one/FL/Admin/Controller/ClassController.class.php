<?php
namespace Admin\Controller;
use Think\Controller;
class ClassController extends Controller{
    public function _initialize(){
        if(session('mid')<1){
            header("location:/Admin/Admin/login");
        }
    }
    public function addClass(){
        //增加分类
        if(IS_POST){
            $class=M("Class");
            $data=$class->create();
            if($class->where(array("class_name"=>$data['class_name'],"class_pid"=>$data['class_pid']))->find()>0){
                echo "该分类已存在，不能再添加";
            }else{
                $result=$class->data($data)->add();
                $fresult=$class->where(array("class_cid"=>$data['class_pid']))->getField("class_path");
                if ($data['class_pid']==0){
                    $path['class_path']=$result;
                }else{
                    $path['class_path']=$fresult.','.$result;
                }
                if($class->where(array("class_cid"=>$result))->save($path)>0){
                    echo "分类添加成功";
                };
            }
        }else{
            $nameList=self::getClassList();
            $this->assign("nameList",$nameList);
            $this->display();
        }
    }

    public static function getClassList($spaceNum=4){
        //获取分类列表
        $result=null;
        $class=M("Class");
        $res=$class->order("class_path")->select();
        foreach($res as $val){
            $val['class_name']=str_repeat('&nbsp;',$spaceNum*count(explode(',',$val['class_path']))).$val['class_name'];
            $result[]=$val;
        }
        return $result;
    }

    public function classList(){
        //后台分类列表显示
        $class=M("Class");
        $where['class_name']=array('like',"%".I("post.key")."%");
        $count=$class->where($where)->count();
        $map['key']=I('post.key');
        if($count>0){
            $Page=new \Think\Page($count,10);
            $show=$Page->show();
            $classList=$class->where($where)->order("class_path")->limit($Page->firstRow.','.$Page->listRows)->select();
            foreach($classList as $k=>$v){
                $pathArr=explode(',',$v['class_path']);
                $where['class_cid']=array('in',$pathArr);
                $pathName=$class->where($where)->field("class_name")->select();
                foreach($pathName as $pathK=>$pathV){
                    $pathStr.=$pathV['class_name'].'>';
                }
                $pathStr=mb_substr($pathStr,0,strlen($pathStr)-1);
                $classList[$k]['class_path']=$pathStr;
                unset($pathStr);
            }
            foreach($map as $key=>$val){
                $Page->parameter[$key]=urlencode($val);
            }
            $firstRow=$Page->firstRow;
        }

        $this->assign("firstRow",$firstRow);
        $this->assign("page",$show);
        $this->assign("classList",$classList);
        $this->assign("keywords",$map['key']);
        $this->display();
    }

    public function editClass(){
        //后台分类编辑
        $class_cid=I("get.class_cid");
        $class=M("Class");
        if($_POST){
            $data=$class->create();
            $data['class_createtime']=time();
            $class->where(array("class_cid"=>$class_cid))->save($data);
            echo "分类名称修改成功";
        }else{
            $class_name=$class->where(array("class_cid"=>$class_cid))->getField("class_name");
            $this->assign("class_name",$class_name);
            $this->display();
        }
    }
    public function delClass(){
        //删除分类
        $class_cid=I("get.class_cid");
        $class=M("Class");
        if($class->where(array('class_pid'=>$class_cid))->find()>0){
            echo "该分类下有子分类，不能删除！";
        }else{
            $prod=M("Prod");
            if($prod->where(array('prod_cid'=>$class_cid))->find()>0){
                echo "该分类下有商品，不能删除！";
            }else{
                if($class->where(array('class_cid'=>$class_cid))->delete()>0){
                    echo "分类删除成功！";
                }
            }
        }
    }
}