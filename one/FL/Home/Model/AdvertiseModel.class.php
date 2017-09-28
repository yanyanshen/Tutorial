<?php
namespace Home\Model;
use Think\Model;
class AdvertiseModel extends Model{
    public function getData($methodName){
        $data=$this->$methodName();
        return $data;
    }
    protected function amovo(){
        $dataObj=M("Prod");
        $data=$dataObj->where(array("prod_id"=>10))->select();
        return $data;
    }
    protected function baicaowei(){
        $dataObj=M("Prod");
        $data=$dataObj->where(array("prod_id"=>11))->select();
        return $data;
    }
    protected function chocolate(){
        $dataObj=M("Prod");
        $data=$dataObj->where(array("prod_id"=>1))->select();
        return $data;
    }
    protected function localSpecial(){
        $dataObj=M("Prod");
        $data=$dataObj->where(array("prod_id"=>33))->select();
        return $data;
    }
    protected function maladuona(){
        $dataObj=M("Prod");
        $data=$dataObj->where(array("prod_id"=>29))->select();
        return $data;
    }
    protected function meat(){
        $dataObj=M("Prod");
        $data=$dataObj->where(array("prod_id"=>30))->select();
        return $data;
    }
    protected function monkey(){
        $dataObj=M("Prod");
        $data=$dataObj->where(array("prod_id"=>2))->select();
        return $data;
    }
    protected function nuts(){
        $dataObj=M("Prod");
        $data=$dataObj->where(array("prod_id"=>27))->select();
        return $data;
    }
    protected function sanzhisongshu(){
        $dataObj=M("Prod");
        $data=$dataObj->where(array("prod_id"=>28))->select();
        return $data;
    }
    protected function taiwanSnacks(){
        $dataObj=M("Prod");
        $data=$dataObj->where(array("prod_id"=>17))->select();
        return $data;
    }
    protected function loulanmiyu(){
        $dataObj=M("Prod");
        $data=$dataObj->where(array("prod_id"=>32))->select();
        return $data;
    }
}