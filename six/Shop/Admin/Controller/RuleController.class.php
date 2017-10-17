<?php
namespace Admin\Controller;
use Think\Controller;
class RuleController extends Controller{
    public function addRule(){
        if(IS_AJAX){
            if($data["title"]=I("title")){
                if($data["name"]=I("name")){
                    $rule=M("auth_rule");
                    if(I("pid")>0){
                        $data["pid"]=I("pid");
                        $path=M("auth_rule")->field("path")->find($data["pid"]);
                        $data["status"]=1;
                        $data["type"]=1;
                        $_POST=$data;
                        $rule->create();
                        $id=$rule->add();
                        if($id){
                            $field=$path["path"].",".$id;
                            $rel=$rule->where("id=$id")->setField("path",$field);
                            if($rel){
                                echo $this->success("添加成功");
                            }else{
                                echo $this->error("添加失败");
                            }
                        }else{
                            echo $this->error("添加失败");
                        }
                    }else {
                        $data["status"] = 1;
                        $data["type"] = 1;
                        $data["pid"] = 0;
                        $_POST = $data;
                        $rule->create();
                        $id = $rule->add();
                        if ($id) {
                            $rel = $rule->where("id=$id")->setField("path", $id);
                            if ($rel) {
                                echo $this->success("添加成功");
                            } else {
                                echo $this->error("添加失败");
                            }
                        }
                    }
                }else{
                    echo $this->error("请填写权限规则");
                }
            }else{
                echo $this->error("请填写权限名称");
            }
        }else{
            $this->display();
        }
    }

    public function ruleList(){
        $rule=D("AuthRule");
        $info=$rule->ruleList();
        $this->assign("info",$info);
        $this->display();
    }
    public function addcate(){
        $id=I("id");
        $info=M("auth_rule")->find($id);
        $this->assign("info",$info);
        $this->display("addRule");
    }
    public function delRule(){
        $id=I("id");
        $str=$id;
        $arr=D("AuthRule")->ruleList($id);
        if($arr){
            foreach($arr as $k=>$v){
                $str.=",".$v["id"];
            }
        }
        $rel=M("auth_rule")->delete($str);
        if($rel){
            echo $this->success("删除成功");
        }else{
            echo $this->error("删除失败");
        }
    }
    public function updateRule(){
        $rule=M("auth_rule");
        $id=I("id");
        if(IS_AJAX){
            $data=array();
            $data["title"]=I("title");
            $data["name"]=I("name");
            $info=$rule->find($id);
            if($info["title"]==$data["title"]&&$info["name"]==$data["name"]) {
                echo $this->success("修改成功");
            }else{
                $rel = $rule->where("id=$id")->setField($data);
                if ($rel) {
                    echo $this->success("修改成功");
                } else {
                    echo $this->error("修改失败");
                }
            }


        }else{
            $info=$rule->find($id);
            $pname=$rule->find($info["pid"]);
            $info["pname"]=$pname["title"];
            $this->assign("info",$info);
            $this->display();
        }
    }
    public function addchild(){
        $id=I("id");
        $rule=M("auth_rule");
        $info=$rule->find($id);
        $info["pname"]=$info["title"];
        $info["pid"]=$info["id"];
        $this->assign("info",$info);
        $this->display("addRule");
    }






}