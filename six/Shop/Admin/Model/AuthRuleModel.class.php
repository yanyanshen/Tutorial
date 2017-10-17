<?php
namespace Admin\Model;
use Think\Model;
class AuthRuleModel extends Model{
    public function ruleList($pid=0,$level=0,&$arr=array()){
        $level=$level+1;
        $rule=M("auth_rule");
        $fcate = $rule->where("pid=" . $pid)->select();
        if ($fcate) {
            foreach ($fcate as $k1 => $v1) {
                $data=$rule->field("id,name,title")->where("status=1")->find($v1["id"]);
                $data["level"]=$level;
                $arr[] = $data;
                $this->ruleList($v1["id"], $level, $arr);
            }
        }
        return $arr;
    }
    public function getNev(){
        $nev=M("auth_nev");
        $auth=new \Think\Auth();
        $aid=$_SESSION["admin"]["id"];
        $arr=$nev->where("pid=0")->order("priority")->select();
        if($arr){
            foreach($arr as $k1=>$v1){
                if(!$auth->check($v1["url"],$aid)){
                    unset($arr[$k1]);
                }else{
                    $arr2=$nev->where("pid={$v1['id']}")->order("priority")->select();
                    if($arr2){
                        foreach($arr2 as $k2=>$v2) {
                            if (!$auth->check($v1["url"], $aid)) {
                               // unset($arr[$k1]);
                            } else {
                                $arr[$k1]["child"][$k2]=$v2;
                                $arr3=$nev->where("pid={$v2['id']}")->order("priority")->select();
                                if($arr3){
                                    foreach($arr3 as $k3=>$v3) {
                                        if (!$auth->check($v1["url"], $aid)) {
                                           // unset($arr[$k1][$k2][$k3]);
                                        } else {
                                            $arr[$k1]["child"][$k2]["child"][$k3]=$v3;
/*                                            $arr4=$nev->where("pid={$v3['id']}")->order("priority")->select();
                                          if($arr4){
                                                foreach($arr4 as $k4=>$v4){
                                                    if (!$auth->check($v4["url"], $aid)) {
                                                       // unset($arr[$k1]);
                                                    } else {
                                                        $arr[$k1][$k2][$k3][$k4]=$v4;
                                                    }
                                                }
                                            }*/
                                        }
                                    }

                                }
                            }
                        }

                    }
                }

            }
        }
        return $arr;
    }
}