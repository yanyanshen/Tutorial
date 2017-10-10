<?php
namespace Home\Model;

use Think\Model;

class AdgoodModel extends Model{
    public function wuLongCha(){
        $where=array('aid'=>39);
        $wuLong=$this->where($where)->order('addtime desc')->where(array('active'=>1))->limit('0,2')->select();
        if($wuLong){
            return $wuLong;
        }else{
            return false;
        }
    }

    public function lvCha(){
        $where=array('aid'=>41);
        $lvCha=$this->where($where)->order('addtime desc')->where(array('active'=>1))->limit('0,2')->select();
        if($lvCha){
            return $lvCha;
        }else{
            return false;
        }
    }

    public function teaSet($str11){
        $condition['aid']=array('in',$str11);
        $teaSetInfo=$this->where($condition)->order('addtime desc')->where(array('active'=>1))->limit('0,2')->select();
        if($teaSetInfo){
            return $teaSetInfo;
        }else{
            return false;
        }
    }

    public function naviga($str12){
        $condition['aid']=array('in',$str12);
        $naviInfo=$this->where($condition)->order('addtime desc')->where(array('active'=>1))->limit('0,4')->select();
        if($naviInfo){
            return $naviInfo;
        }else{
            return false;
        }
    }


    public function recommed($str13){
        $condition['aid']=array('in',$str13);
        $recommedInfo=$this->where($condition)->order('addtime desc')->where(array('active'=>1))->limit('0,8')->select();
        if($recommedInfo){
            return $recommedInfo;
        }else{
            return false;
        }
    }


    public function leftAd($str14){
        $condition['aid']=array('in',$str14);
        $leftInfo=$this->where($condition)->order('addtime desc')->where(array('active'=>1))->limit('0,8')->select();
        if($leftInfo){
            return $leftInfo;
        }else{
            return false;
        }
    }

    public function articleTeaSet($str15){
        $condition['aid']=array('in',$str15);
        $articleTeaSet=$this->where($condition)->order('addtime desc')->where(array('active'=>1))->limit('0,8')->select();
        if($articleTeaSet){
            return $articleTeaSet;
        }else{
            return false;
        }
    }

    public function articleTea($str16,$str18){
        if($str18){
            $condition['gid']=array('in',$str18);
        }
        $condition['aid']=array('in',$str16);
        $articleTea=$this->where($condition)->order('addtime desc')->where(array('active'=>1))->limit('0,8')->select();
        if($articleTea){
            return $articleTea;
        }else{
            return false;
        }
    }

    public function open(){
        $openInfo=$this->where(array('aid'=>44))->order('addtime desc')->where(array('active'=>1))->limit('0,1')->select();
        if($openInfo){
            return $openInfo;
        }else{
            return false;
        }
    }


    public function detail($adstr){
        if($adstr){
            $where['gid']=array('in',$adstr);
        }
        $detailAd=$this->where(array('aid'=>38))->limit('0,4')->where(array('active'=>1))->order('addtime desc')->select();
        if($detailAd){
            return $detailAd;
        }else{
            return false;
        }
    }


    public function group(){
        $groupAd=$this->where(array('aid'=>45))->where(array('active'=>1))->select();
        if($groupAd){
            return $groupAd;
        }else{
            return false;
        }
    }


    public function leftRecommed(){
        $leftRecom=$this->where(array('aid'=>46))->where(array('active'=>1))->limit('0,6')->order('addtime desc')->select();
        if($leftRecom){
            return $leftRecom;
        }else{
            return false;
        }
    }


}