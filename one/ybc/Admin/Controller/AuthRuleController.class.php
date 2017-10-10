<?php
namespace Admin\Controller;

use Admin\Common\Controller\BgController;

class AuthRuleController extends BgController{

    //权限列表
    public function index(){
        $rule=D('AuthRule');
        $ruleList=$rule->getRuleList();

        $this->assign('ruleList',$ruleList);
        $this->display('index');

    }


    //添加权限
    public function add(){
        if(IS_AJAX){
            $rule=D('AuthRule');
            $data=$rule->create();
            if($data){
                $nid=$rule->addRule($data);
                if($nid){
                    $this->success("权限添加成功",U('index'));
                }else{
                    $this->error("添加权限失败");
                }
            }else{
                $this->error($rule->getError());
            }
        }else{
            if(I('get.pid')){
                $this->assign('pid',I('get.pid'));
                $this->assign('pname',I('get.pname'));
            }
            $this->display('add');
        }

    }

    // 修改权限分类
    public function edit(){
        if(I('get.id')){
            $id=I('get.id');
            $authRule=D('AuthRule');
            $info=$authRule->findRule($id);
            $info['cate']=$authRule->where(array('id'=>$info['pid']))->getField('title');
            //print_r($info);
            $this->assign('info',$info);
            $this->display('edit');
        }else{
            $id=I('post.id');
            $rule=D('AuthRule');
            $data['title']=I('post.title');
            $data['name']=I('post.name');
            $info=$rule->where(array('id'=>$id))->save($data);
            if($info){
                $this->success("修改成功",U('index'));
            }else{
                $this->error('修改失败');
            }
        }
    }

    //删除权限信息
    public function del(){
        $id=I('get.id');
        $rule=D('AuthRule');
        $row=$rule->del($id);
        if($row){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }
}