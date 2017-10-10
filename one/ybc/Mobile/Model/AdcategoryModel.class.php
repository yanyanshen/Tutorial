<?php
namespace Mobile\Model;

use Think\Model;

class AdcategoryModel extends Model{



    //得到文章茶叶广告的PATH
    public function articleAdgoodT(){
        $path=$this->field('path')->where(array('adcatename'=>'文章茶叶广告'))->find();
        $where['path']=array('like',"{$path['path']}%");
        $allPath=$this->where($where)->field('path')->select();
        $Atstr='';
        foreach($allPath as $v){
            $Atstr.=$v['path'].',';
        }
        return $Atstr;
    }
    //得到文章茶具广告的PATH
    public function articleAdgoodJ(){
        $path=$this->field('path')->where(array('adcatename'=>'文章茶具广告'))->find();
        $where['path']=array('like',"{$path['path']}%");
        $allPath=$this->where($where)->field('path')->select();
        $Ajstr='';
        foreach($allPath as $v){
            $Ajstr.=$v['path'].',';
        }
        return $Ajstr;
    }


    //得到文章茶具广告的PATH
    public function articleAdgood(){
        $path=$this->field('path')->where(array('adcatename'=>'文章广告'))->find();
        $where['path']=array('like',"{$path['path']}%");
        $allPath=$this->where($where)->field('path')->select();
        $Adstr='';
        foreach($allPath as $v){
            $Adstr.=$v['path'].',';
        }
        return $Adstr;
    }






    //-----------------------------------------------------------------------------

    //得到茶具广告的str
    public function getTeaSet(){
        $id='1,6';
        $where['path']=array('like',"$id%");
        $info=$this->where($where)->select();
        $str11='';
        foreach($info as $v){
            $str11.=$v['id'].',';
        }
        $str11=substr($str11,0,2);
        if($str11){
            return $str11;
        }else{
            return false;
        }
    }


    //得到导航广告的str
    public function navi(){
        $id='1,4';
        $where['path']=array('like',"$id%");
        $info=$this->where($where)->select();
        $str12='';
        foreach($info as $v){
            $str12.=$v['id'].',';
        }
        $str12=substr($str12,0,2);
        if($str12){
            return $str12;
        }else{
            return false;
        }
    }

    //得到网站推荐的str
    public function recommed(){
        $id='1,42';
        $where['path']=array('like',"$id%");
        $info=$this->where($where)->select();
        $str13='';
        foreach($info as $v){
            $str13.=$v['id'].',';
        }
        $str13=substr($str13,0,2);
        if($str13){
            return $str13;
        }else{
            return false;
        }
    }

    //得到文章左侧的广告栏str
    public function leftAd(){
        $id='2,43';
        $where['path']=array('like',"$id%");
        $info=$this->where($where)->select();
        $str14='';
        foreach($info as $v){
            $str14.=$v['id'].',';
        }
        $str14=substr($str14,0,2);
        if($str14){
            return $str14;
        }else{
            return false;
        }
    }
    //得到文章茶具广告的str
    public function buttonTeaSet(){
        $id='2,7';
        $where['path']=array('like',"$id%");
        $info=$this->where($where)->select();
        $str15='';
        foreach($info as $v){
            $str15.=$v['id'].',';
        }
        $str14=substr($str15,0,2);
        if($str14){
            return $str15;
        }else{
            return false;
        }
    }

    //得到文章茶叶广告的str
    public function buttonTea(){
        $id='2,8';
        $where['path']=array('like',"$id%");
        $info=$this->where($where)->select();
        $str16='';
        foreach($info as $v){
            $str16.=$v['id'].',';
        }
        $str14=substr($str16,0,2);
        if($str14){
            return $str16;
        }else{
            return false;
        }
    }

}