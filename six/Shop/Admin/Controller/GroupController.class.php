<?php
namespace Admin\Controller;
use Think\Controller;
//use Admin\Model\AuthGroupModel;
class GroupController extends Controller{
    public function groupList()
    {
        $group= D("AuthGroup");
        $info=$group->getGroups();
        $this->assign("info",$info);
        $this->display();
    }
    public function addGroup(){
            if(IS_AJAX){
                if(I("post.title")){
                    $_POST["status"]=1;
                    $group=M("auth_group");
                    $group->create();
                    $id=$group->add();
                    if($id){
                        echo $this->success("添加成功");
                    }else{
                        echo $this->error("添加失败");
                    }
                }else{
                    echo $this->error("请填写组名称");
                }
            }else{
                $this->display();
            }
    }
    public function addmember(){
        if(IS_AJAX) {
            $status=true;
            $arr=I("uid");
            $gid=I("group_id");
            $data["group_id"]=$gid;
            $del["group_id"]=$gid;
            $res=M("auth_group_access")->where($data)->select();
            $old=array();
            if($res){
                foreach($res as $k1=>$v1){
                    $old[]=$v1["uid"];
                }
            }
            if($arr){
                if($old){
                    foreach($old as $k2=>$v2){
                       if(!in_array($v2,$arr)){
                            $del["uid"]=$v2;
                           $rel=M("auth_group_access")->where($del)->delete();
                           if(!$rel){
                               $status=false;
                           }
                       }
                    }
                    foreach($arr as $k3=>$v3){
                        if(!in_array($v3,$old)){
                            $data["uid"]=$v3;
                            $rel=M("auth_group_access")->add($data);
                            if(!$rel){
                                $status=false;
                            }
                        }
                    }
                }else{
                    foreach($arr as $k=>$v){
                        $data["uid"]=$v;
                        $id=M("auth_group_access")->add($data);
                        if(!$id){
                            $status=false;
                        }
                    }
                }
            }else{
                if($old){
                    $rel=M("auth_group_access")->where("group_id=$gid")->delete();
                    if(!$rel){
                        $status=false;
                    }
                }

            }

            if($status){
                echo $this->success("添加成功");
            }else{
                echo $this->error("添加失败");
            }


        }else{
        $id=I("id");
        $info=D("AuthGroup")->addmember($id);
        $this->assign("name",$info["title"]);
        $this->assign("member",$info[0]);
        $this->assign("empty","<tr style='line-height: 25px;font-size: 25px;color: red'><td colspan='5' >暂时没有未添加的成员</td></tr>");
        $this->display();
        }
    }
    public function updaterule(){
        $group=D("AuthGroup");
        $groups=$group->updaterule();
        $this->assign("groups",$groups);
        $this->assign("id",I("id"));
/*        print_r($groups);
        exit;*/
        $this->display();
    }

    public function update(){
        $arr=I("rid");
        $path=implode(",",$arr);
        $id=I("id");
        $oid=M("auth_group")->where("id=$id")->find();
        if($oid["path"]==$path){
            echo $this->success("分配成功");
        }else{
            $rel=M("auth_group")->where("id=$id")->setField("rules",$path);
            if($rel){
                echo $this->success("分配成功");
            }else{
                echo $this->error("分配失败");
            }
        }

    }

    public function upname(){
        if(IS_AJAX){
            if($gname=I("post.title")){
                $id=I("post.id");
                $rel=M("auth_group")->where("id=$id")->setField("title",$gname);
                if($rel){
                    echo $this->success("修改成功");
                }else{
                    echo $this->error("修改失败");
                }
            }else{
                echo $this->error("修改失败");
            }

        }else{
            $id=I("id");
            $group=M("auth_group")->find($id);
            $this->assign("group",$group);
            $this->display("updatename");
        }
    }




    public function del(){
        $id=I("id");
        $rel=M("auth_group")->where("id=$id")->setField("status",0);
        if($rel){
            echo $this->success("删除成功");
        }else{
            echo $this->error("删除失败");
        }
    }


}