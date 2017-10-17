<?php
function  node_merge ($node,$access=null,$pid=0){
    $arr=array();
    foreach($node as $vo){
        if(is_array($access)){
            $vo['access']=in_array($vo['id'],$access)? 1:0;
        }
        if($vo['pid']==$pid){
            $vo['child']=node_merge($node,$access,$vo['id']);
            $arr[]=$vo;
        }
    }
    return $arr;
}