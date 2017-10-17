<?php
namespace Admin\Model;
use Think\Model;
class AuthGroupModel extends Model{
    public function getGroups(){
        $access=M("auth_group_access");
        $groups=M("auth_group")->where("`status` ='1'")->select();
        foreach($groups as $k=>$v){
            $str="";
            $info=$access->field("username")->join("sk_admin on sk_admin.id=sk_auth_group_access.uid")->where("group_id=".$v["id"])->select();
            foreach($info as $k1=>$v1){
                $str.=",".$v1["username"];
            }
            $groups[$k]["member"]=substr($str,1);
        }
        return $groups;
    }
    public function addmember($id){
        $access=M("auth_group_access");
        $res=$access->where("group_id=".$id)->select();
//        $str="";
        $str=array();
        if($res){
//            foreach($res as $k=>$v){
//                $str.=",".$v["uid"];
//            }
//            $str=substr($str,1);
//            $where="id not in (".$str.")";
//            $where1="id  in (".$str.")";
            foreach($res as $k3=>$v3){
                $str[]=$v3["uid"];
            }
            $res=$str;
        }else{
            $res=array();
//            $where="";
//            $where1="";
        }

//        $info=M("admin")->field("username,id")->where($where)->select();
//        $info1=M("admin")->field("username,id")->where($where1)->select();
        $info=M("admin")->field("username,id")->select();
        //$info=$access->field("sk_admin.id，username")->join("sk_admin on sk_admin.id=sk_auth_group_access.aid")->where("gid!=".$id)->select();
        $groups=array();
        if($info){
            foreach($info as $k1=>$v1){
                $groups[0][$v1["id"]]["username"]=$v1["username"];
                $groups[0][$v1["id"]]["id"]=$v1["id"];
                if(in_array($v1["id"],$res)){
                    $groups[0][$v1["id"]]["status"]=1;
                }else{
                    $groups[0][$v1["id"]]["status"]=0;
                }

            }
        }
        /*if($info1){
            foreach($info1 as $k2=>$v2){
                $groups[0][$v2["id"]]["username"]=$v2["username"];
                $groups[0][$v2["id"]]["id"]=$v2["id"];
                $groups[0][$v2["id"]]["status"]=1;
            }
        }*/

        $gname=M("auth_group")->field("title,id")->find($id);
        $groups["title"]=$gname;
        return $groups;
    }
    public function updaterule(){
        $id=I("id")?I("id"):1;
        $rules=M("auth_group")->field("rules")->find($id);
        if($rules["rules"]){
            $arr=explode(",",$rules["rules"]);
        }else{
            $arr=array();
        }

        $data=M("auth_rule")->field("id,title")->where("pid=0")->select();
        if($data){
            foreach($data as $k1=>$v1){
                if(in_array($v1["id"],$arr)){
                    $data[$k1]["status"]=1;
                }else{
                    $data[$k1]["status"]=0;
                }
                $data[$k1]["child"]=M("auth_rule")->field("id,title")->where("pid={$v1['id']}")->select();
                if($data[$k1]["child"]){
                    foreach($data[$k1]["child"] as $k2=>$v2){
                        if(in_array($v2["id"],$arr)){
                            $data[$k1]["child"][$k2]["status"]=1;
                        }else{
                            $data[$k1]["child"][$k2]["status"]=0;
                        }
                        $data[$k1]["child"][$k2]["child"]=M("auth_rule")->field("id,title")->where("pid={$v2['id']}")->select();
                        if($data[$k1]["child"][$k2]["child"]){
                            foreach($data[$k1]["child"][$k2]["child"] as $k3=>$v3){
                                if(in_array($v3["id"],$arr)){
                                    $data[$k1]["child"][$k2]["child"][$k3]["status"]=1;
                                }else{
                                    $data[$k1]["child"][$k2]["child"][$k3]["status"]=0;
                                }
                            }
                        }

                    }
                }
            }
        }
        return $data;

    }







}