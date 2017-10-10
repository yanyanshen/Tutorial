<?php
namespace Admin\Model;
use Think\Model;

class AdminNavModel extends Model{
    protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        //验证规则：require 字段值必须、email 邮箱、url URL地址、currency 货币、number 数字、double浮点、integer整数、zip邮政编码、english英文
        //验证条件：0代表字段存在时必须验证、1代表字段必须验证、2代表字段存在而且不为空时验证
        //附加规则:默认为regex,附加规则的值决定了验证规则的值
        //验证时间:1代表添加时验证，2代表更新时验证，3代表任何情况下都验证
        array('navname','require','菜单名称不能为空',0,'regex',1),
        array('navurl','require','菜单链接不能为空',0,'regex',1)
    );

    // 往adminnav表中插入如数据
    public function addNav($data){
        $nid=$this->field('pid,navname,navurl,priority')->add($data);
        if($nid){
            //判断是不是顶级菜单
            if($data['pid']==0){
                $path=$nid;
            }else{
                //不是顶级菜单就得到上级菜单的pid  然后拼字符串得到其path
                $path=$this->where(array('id'=>$data['pid']))->getField('path');
                $path.=','.$nid;
            }
            $save['path']=$path;
            $save['id']=$nid;
            $row=$this->save($save);
            return $row;
        }else{
            return false;
        }
    }


    //得到菜单表的所有数据
    public function getNavList(){
        $navList=$this->order('priority asc')->select();

        //得到菜单的优先级
        foreach($navList as $k=>$v){
            $count=count(explode(',',$v['path']));//将path组成一个数组 然后得到其数组的数量
            $navList[$k]['level']=$count;
        }
        return $navList;

    }

    public function setPriority($data){
        $row=$this->save($data);
        return $row;
    }


    //根据ID查询菜单信息
    public function findNav($id){
        $info=$this->where(array('id'=>$id))->find();
        $info['leader']=$this->where(array('id'=>$info['pid']))->getField('navname');
        return $info;
    }

    //编辑菜单
    public function edit($id,$data){
        $info=$this->where(array('id'=>$id))->save($data);
        return $info;
    }

    //删除菜单
    public function del($id){
        $row=$this->where(array('id'=>$id))->delete();
        return $row;
    }


    public function getNavTree(){
        $nav=$this->where(array('pid'=>0))->order('priority')->select();
        if($nav){
            $auth=new \Think\Auth();
            foreach($nav as $k1=>$v1){
                if ($auth->check($v1['navurl'],session('aid'))) {

                    $child=$this->where(array('pid'=>$v1['id']))->order('priority')->select();
                    foreach($child as $k2=>$v2){
                        if (!$auth->check($v2['navurl'],session('aid'))) {
                            // 删除无权限的菜单
                            unset($child[$k2]);
                        }
                    }
                    $nav[$k1]['child']=$child;
                }else{
                    // 删除无权限的菜单
                    unset($nav[$k1]);
                }
            }

            return $nav;
        }else{
            return false;
        }
    }




}