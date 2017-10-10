<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;

class AdminNavController extends BgController{

    //显示菜单列表
    public function index(){
        $nav=D('AdminNav');
        $navList=$nav->getNavList();

        $this->assign('navList',$navList);
        $this->display('index');
    }


    //添加控制菜单
    public function add(){
        if(IS_AJAX){
            $nav=D('AdminNav');
            $data=$nav->create();
            if($data){
                $nid=$nav->addNav($data);
                if($nid){
                    $this->success("菜单添加成功",U('index'));
                }else{
                    $this->error("菜单添加失败");
                }
            }else{
                $this->error($nav->getError());
            }
        }else{
            //添加子菜单操作
            if(I('get.pid')){
                $this->assign('pid',I('get.pid'));
                $this->assign('pname',I('get.pname'));
            }


            $this->display('add');
        }

    }

    // 修改菜单分类
    public function edit(){
    if(I('get.id')){
        $id=I('get.id');
        $info=D('AdminNav')->findNav($id);
        //print_r($info);
        $this->assign('info',$info);
        $this->display('edit');
    }else{
        $id=I('post.id');
        $nav=D('AdminNav');
        $data=$nav->create();
        $info=$nav->edit($id,$data);
        if($info){
            $this->success("修改成功",U('index'));
        }else{
            $this->error('修改失败');
        }
    }
}

    //删除菜单分类
    public function del(){
        $id=I('get.id');
        $nav=D('AdminNav');
        $row=$nav->del($id);
        if($row){
            $this->success("删除成功");
        }else{
            $this->error('删除失败');
        }
    }

    //设置菜单优先级
    public function setPriority(){
        if(IS_AJAX){
            $nav=D('AdminNav');
            $data=$nav->create();
            if($data){
                $row=$nav->setPriority($data);
                if($row){
                    $this->success('优先级更新成功');
                }
            }else{
                $this->error($nav->getError());
            }
        }

    }



}