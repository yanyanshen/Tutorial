<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function Cate()
    {
        $data2 = $this->query("select id,catename from sk_category where pid=0 limit 0,6");
        foreach ($data2 as $k => $v) {
            $str=$this->getcid($v["id"]);
            if(isset($str)&&$str>0){
                $where="where cid in ({$str})";
            }else{
                $where="";
            }
            $data2[$k]['g'] = $this->query("select id,goodsname,image from sk_goods  $where order by createtime desc limit 0,5");
            $str="";
            $cates = $this->query("select id,catename from sk_category where pid={$v['id']}");
            $data2[$k]['c'] = $cates;
            if (count($cates) > 0) {
                foreach ($cates as $k1 => $v1) {
                    $data2[$k]['c'][$k1]['c'] = $this->query("select id,catename from sk_category where pid={$v1['id']}");
                }
            }

        }
        return $data2;
    }


    //
    public function getcid($id=1)
    {
        $str = "";
        $second = $this->query("select id,catename from sk_category where pid=$id");

        foreach ($second as $k1 => $v1) {
            $third = $this->query("select id,catename from sk_category where pid={$v1['id']}");
            
            foreach ($third as $k2 => $v2) {
                $str .= ",".$v2["id"];
            }
        }
        $str=substr($str,1);
        return $str;
    }





}
















