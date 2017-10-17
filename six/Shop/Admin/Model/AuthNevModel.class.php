<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/18
 * Time: 14:02
 */
namespace Admin\Model;
use Think\Model;
class AuthNevModel extends Model{
    public function nevList($pid=0,$level=0,&$arr=array()){
        $level=$level+1;
        $nev=M("auth_nev");
        $fcate = $nev->where("pid=" . $pid)->select();
        if ($fcate) {
            foreach ($fcate as $k1 => $v1) {
                $data=$nev->field("id,name,url,priority")->where("status=1")->order("priority")->find($v1["id"]);
                $data["level"]=$level;
                $arr[] = $data;
                $this->nevList($v1["id"], $level, $arr);
            }
        }
        return $arr;
    }
}