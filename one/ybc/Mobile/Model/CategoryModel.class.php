<?php
namespace Mobile\Model;
use Think\Model;
class CategoryModel extends Model{
    protected $tableName='category';


    public function cateinfo(){
        $where['active'] = 1;//获取在线状态的品种
        $where['pid'] = 0;
        $res = $this->where($where)->select();
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }
    //获取热销品类
     //根据热销的商品获取热销的品类
    public  function hotcate(){
        $where1['active']=1;
        $where1['ad']=0;
        $where1['group']=0;
           $goodsinfo=$this->table('ybc_goods')->where($where1)->order('salenum desc')->select();
             $str='';
          foreach($goodsinfo as $v){
               $str.=$v['cid'].',';
          }
           $where['id']=array('in',$str);
           $where['active']=1;
           $res=$this->where($where)->limit('0,6')->select();
           $arr['goodsinfo']=$goodsinfo;
           $arr['hotcate']=$res;
        return $arr;
    }
    //获取新品
    //根据商品获取的品类
    public  function newcate(){
         $where1['active']=1;
         $where1['ad']=0;
         $where1['group']=0;
        $newgoods=$this->table('ybc_goods')->where($where1)->order('addtime desc')->select();
        $str='';
        foreach($newgoods as $v){
            $str.=$v['cid'].',';
        }
        $where['id']=array('in',$str);
        $where['active']=1;
        $res=$this->where($where)->limit(0,6)->select();
        $arr1['newgoods']=$newgoods;
        $arr1['newcate']=$res;
        return $arr1;
    }
    //获取每个一级分类的二级分类
    public function twocate($id)
    {
        $where['pid'] = $id;
        $where['active']=1;
        $twocate = $this->where($where)->select();
        //获取二级分类下的商品
          $str='';
         foreach($twocate as $v){
             $str.=$v['id'].',';
         }
          $where1['cid']=array('in',$str);
          $goods=$this->table('ybc_goods')->where($where1)->select();
        $arr2['goods']=$goods;
        $arr2['twocate']=$twocate;
        if ($arr2) {
            return $arr2;
        } else {
            return false;
        }
    }
    //获取新品
    //根据商品获取的品类
    public  function hotbrand(){
        $where1['active']=1;
        $where1['ad']=0;
        $where1['group']=0;
        $hotgoods=$this->table('ybc_goods')->where($where1)->order('salenum desc')->select();
        $str='';
        foreach($hotgoods as $v){
            $str.=$v['bid'].',';
        }
        $where['id']=array('in',$str);
        $where['active']=1;
        $res=$this->table('ybc_brand')->where($where)->limit(0,6)->select();
        $arr3['hotgoods']=$hotgoods;
        $arr3['hotbrand']=$res;
        return $arr3;
    }

}