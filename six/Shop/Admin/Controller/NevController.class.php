<?php
namespace Admin\Controller;
use Think\Controller;
class NevController extends Controller{
    public  function addNev(){
        $nev=M("auth_nev");
        if(IS_AJAX){
            if(I("name")&&I("url")){
                $data["name"]=I("name");
                $data["url"]=I("url");
                $data["priority"]=is_nan(I("priority"))?1:I("priority");
                $path="";
                if(I("pid")){
                    $data["pid"]=I("pid");
                    $path=$nev->find($data["pid"]);
                }else{
                    $data["pid"]=0;
                }
                $id=$nev->add($data);

                if($id){
                    if($path){
                        $path=$path["path"].",".$id;
                    }else{
                        $path=$id;
                    }
                    $rel=$nev->where("id=$id")->setField("path",$path);
                    if($rel){
                        echo $this->success("添加成功");
                    }else{
                        echo $this->error("添加失败1");
                    }
                }else{
                    echo $this->error("添加失败2");
                }

            }else{
                echo $this->error("菜单名称或菜单链接未填写");
            }

        }else{
            if(I("id")>0){
                $result=$nev->find(I("id"));
                $info["pid"]=$result["id"];
                $info["pname"]=$result["name"];
                $this->assign("info",$info);
            }else{

            }
            $this->display();
        }
    }
    public function nevList(){
        $nev=D("AuthNev");
        $arr=$nev->nevList();
        $this->assign("info",$arr);
        $this->display();
    }
    public function delNev(){
        $id=I("id");
        $str=$id;
        $arr=D("AuthNev")->nevList($id);
        if($arr){
            foreach($arr as $k=>$v){
                $str.=",".$v["id"];
            }
        }

        $rel=M("auth_nev")->where("id in (".$str.")")->delete();
        if($rel){
            echo $this->success("删除成功");
        }else{
            echo $this->error("删除失败");
        }
    }
    public function updateNev(){
        $nev=M("auth_nev");
        $id=I("id");
        if(IS_AJAX){
            $data=array();
            $data["url"]=I("url");
            $data["name"]=I("name");

            $info=$nev->find($id);
            $data["priority"]=is_nan(I("priority"))?$data["priority"]:I("priority");
            if($info["url"]==$data["url"]&&$info["name"]==$data["name"]&&$info["priority"]==$data["priority"]) {
                echo $this->success("修改成功");
            }else{
                $rel = $nev->where("id=$id")->setField($data);
                if ($rel) {
                    echo $this->success("修改成功");
                } else {
                    echo $this->error("修改失败");
                }
            }

        }else{
            $info=$nev->find($id);
            $pname=$nev->find($info["pid"]);
            $info["pname"]=$pname["name"];
            $info["pid"]=$pname["id"];
            $this->assign("info",$info);
            $this->display();
        }
    }
    public function addchild(){
        $id=I("id");
        $nev=M("auth_nev");
        $info=$nev->find($id);
        $info["pname"]=$info["name"];
        $info["pid"]=$info["id"];
        $this->assign("info",$info);
        $this->display("addNev");
    }
    public function updatePri(){
        $id=I("id");
        $priority=I("priority");
        if(!is_nan($priority)){
            M("auth_nev")->where("id=$id")->setField("priority",$priority);
        }
    }

}