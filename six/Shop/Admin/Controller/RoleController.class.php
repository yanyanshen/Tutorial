<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Model;
class RoleController extends BgController{
//    public function _initialize(){
//        $level=M('admin')->field("level")->where(array("username"=>session('admin.username')))->find();
//        if($level['level']=='普通管理员'){
//            $this->display("Role/error");
//            die();
//        }
//    }

    public function roleList(){
        //1.显示分页工具条
        $mod = M('admin');
        $totalRows = $mod->count();
        //创建分页对象时，分页对象需要总记录数和分页条数
        $page = new \Think\Page($totalRows,6);
        $page -> rollPage =5; //分页列表上显示多少条
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%   %HEADER%');
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        $pageHtml = $page -> show();//生成分页的连接诶效果（分页工具条的html代码）
        $this -> assign('pageHtml',$pageHtml);//分配分页栏到模版
        //2.查询出当前页面的列表数据
        $user = $mod -> page(I('get.p',1),$page->listRows)->select();
        if($user){
            foreach($user as $k=>$v){
                $arr=$this->findGroup($v["id"]);
                $str="";
                if($arr){
                    foreach($arr as $k1=>$v1){
                        $str.=$v1["title"].",";
                    }
                    $str=substr($str,0,-1);
                }
                $user[$k]["group"]=$str;
            }
        }
        $this -> assign('user',$user);
        $this -> display();

    }
//添加管理员
    public function add_role(){
        if(IS_POST){
            $data['username'] = $_POST['username'];
//            $data['password'] = $_POST['password1'];
//            $da['password2'] = $_POST['password2'];

            $gid=I("gid");

            $date['regdate']=time();
//                此处没有使用md5解密，所以暂时隐藏
            $data['password'] = md5($_POST['password1']);
            $da['password2'] = md5($_POST['password2']);
            $mod = D('admin');
            if(!empty($data['password'])){
                if($data['password'] == $da['password2']){
                    if($mod->create($data)){
                        if($id=$mod->add($data)){
                            session('regdate',date('Y-m-d H:i:s'));
                            M('admin')->where($data)->save($date);
                            if($gid){
                                $where["uid"]=$id;
                                foreach($gid as $k1=>$v1){
                                    $where["group_id"]=$v1;
                                    M("auth_group_access")->add($where);
                                }


                            }

                            echo $this->success('添加用户成功');
                        }else{
                            echo $this ->error('添加用户失败');
                        }
                    }else{
                        $this -> error($mod->getError());
                    }
                }else{
                    $this->redirect('add_role',array(),1,'两次密码不正确，请重新输入！');
//                    $this ->error('两次输入的密码不正确');
                }
            }else{
                $this->redirect('add_role',array(),1,'管理员或密码不能为空！');
//                $this ->error('管理员不能为空');
            }
        }
        $arr=M("auth_group")->select();
        $this->assign("group",$arr);
        $this -> display();
    }
//    管理员编辑
    public function update_role(){
        $id = I('id');
        $add["uid"]=$id;
        $del["uid"]=$id;
        $user = M('admin')->find($id);
        $rel=M("auth_group")->field("title,sk_auth_group.id as tid")->join("sk_auth_group_access on sk_auth_group_access.group_id=sk_auth_group.id")->where("uid=$id")->select();
        $group=M("auth_group")->select();
        $access=array();
        if($rel){
            foreach($rel as $k=>$v){
                $access[]=$v["tid"];
            }
        }
        if($group){
            foreach($group as $k1=>$v1){
                if(in_array($v1["id"],$access)){
                    $group[$k1]["status"]=1;
                }else{
                    $group[$k1]["status"]=0;
                }

            }
        }
        $this->assign("group",$group);
        $this->assign('user',$user);
        if(IS_POST){
            $status=false;
            $data['username'] = $_POST['username'];
            $data['password'] =md5($_POST['password']);
            $da['password2'] = md5($_POST['password2']);

            $data['id'] = I('id');//id从html模板得到
            $mod=D('admin');
            $gid = $_POST['gid'];
            $old=M("auth_group_access")->where("uid=$id")->select();
            if($gid){
                if($old){
                    $oid=array();
                    foreach($old as $k3=>$v3){
                        $oid[]=$v3["group_id"];
                    }
                    foreach($gid as $k4=>$v4){
                        if(!in_array($v4,$oid)){
                            $add["group_id"]=$v4;
                            M("auth_group_access")->add($add);
                            $status=true;
                        }

                    }

                    foreach($oid as $k5=>$v5){
                        if(!in_array($v5,$gid)){
                            $del["group_id"]=$v5;
                            M("auth_group_access")->where($del)->delete();
                            $status=true;
                        }
                    }

                }else{
                    foreach($gid as $k2=>$v2){
                        $add["uid"]=$id;
                        $add["group_id"]=$v2;
                        M("auth_group_access")->add($add);
                        $status=true;
                    }

                }

            }else{
                M("auth_group_access")->where("uid=$id")->delete();
                if($old){
                    $status=true;
                }
            }




    if(!empty($data['password'])) {
        if ($data['password'] == $da['password2']) {
            if ($mod->create($data, 1)) { //这里的1是表示在编辑时候进行验证
                if ($mod->save()||$status) {
                    echo $this->success('修改成功');
//                    $this->redirect('Role/roleList');
                } else {
                    echo $this->error("修改失败");
//                    $this->redirect('Role/update_role');
                }
            } else {
                $this->error($mod->getError());
            }
                }else {
                    $this->redirect('update_role', array(), 1, '两次密码不正确，请重新输入！');
                    //                    $this ->error('两次输入的密码不正确');
                }
            }else{
                $this->redirect('update_role',array(),1,'密码框不能为空！');
        //                $this ->error('管理员不能为空');
            }
        }
        $this-> display();
    }

    //管理员删除
    public function del(){
        $id = I('id');
        if(M('admin')->delete($id)){
            $this->redirect('Role/roleList');
//          echo $this->success('删除成功');
        }
    }



    public function findGroup($id){
        $arr=array();
        $rel=M("auth_group")->field("title,sk_auth_group.id as tid")->join("sk_auth_group_access on sk_auth_group_access.group_id=sk_auth_group.id")->where("uid=$id")->select();
        if($rel){
            foreach($rel as $k=>$v){
                $arr[$k]["title"]=$v["title"];
                $arr[$k]["gid"]=$v["tid"];
            }
        }
        return $arr;

    }

}