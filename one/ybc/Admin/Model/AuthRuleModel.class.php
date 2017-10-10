<?php
namespace Admin\Model;

use Think\Model;

class AuthRuleModel extends Model{
    protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        //验证规则：require 字段值必须、email 邮箱、url URL地址、currency 货币、number 数字、double浮点、integer整数、zip邮政编码、english英文
        //验证条件：0代表字段存在时必须验证、1代表字段必须验证、2代表字段存在而且不为空时验证
        //附加规则:默认为regex,附加规则的值决定了验证规则的值
        //验证时间:1代表添加时验证，2代表更新时验证，3代表任何情况下都验证
        array('title','require','权限名称不能为空',0,'regex',1),
        array('name','require','权限规则不能为空',0,'regex',1)
    );


    //添加权限
    public function addRule($data){
        $nid=$this->field("pid,title,name")->add($data);
        if($nid){
            if($data['pid']==0){
                $path=$nid;
            }else{
                $path=$this->where(array('id'=>$data['pid']))->getField('path');
                $path.=','.$nid;
            }
            $save['path']=$path;
            $save['id']=$nid;
            $row=$this->save($save);
            return $row;
        }else{
            return $nid;
        }
    }


    //获取权限列表
    public function getRuleList(){
        $ruleList=$this->order('path asc')->select();

        foreach($ruleList as $k=>$v){
            $count=count(explode(',',$v['path']));
            $ruleList[$k]['level']=$count;
        }
        return $ruleList;
    }

    public function setPriority($data){
        $row=$this->save($data);
        return $row;
    }

//根据ID查询（权限）菜单信息
    public function findRule($id){
        $info=$this->where(array('id'=>$id))->find();
        return $info;
    }


    //编辑权限信息
    public function edit($id,$data){
        $info=$this->where(array('id'=>$id))->save($data);
        return $info;
    }

    //删除权限信息
    public function del($id){
        $row=$this->where(array('id'=>$id))->delete();
        return $row;
    }


    //分配权限
    public function getRuleTree(){
        $rule=$this->where(array('pid'=>0))->select();
        if($rule){
            foreach($rule as $k=>$v){
                $child=$this->where(array('pid'=>$v['id']))->select();
                foreach($child as $k1=>$v1){
                    $child1=$this->where(array('pid'=>$v1['id']))->select();
                    $child[$k1]['child']=$child1;
                }
                $rule[$k]['child']=$child;
            }
            return $rule;
        }else{
            return false;
        }
    }


}