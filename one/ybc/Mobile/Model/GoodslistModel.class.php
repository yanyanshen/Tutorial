<?php
namespace  Mobile\Model;
use Think\Model;
class GoodslistModel extends Model{
        protected $tableName='category';
    public  function getcategoodsinfo($keywords,$category1,$brand,$order){
        if($keywords){
            $where1['goodsname']=array('like',"%{$keywords}%");
            $condition['goodsname']=array('like',"%{$keywords}%");

        }
        if($category1){
            $where['path']=array('like',"{$category1}%");
        }
        if($order){
                switch($order){
                    case 'salenum':
                     $orderby=array('salenum desc');
                        break;
                    case 'price':
                        $orderby=array('price asc');
                        break;
                    case 'price1':
                        $orderby=array('price desc');
                        break;
                    case 'addtime':
                        $orderby=array('addtime desc');
                        break;
                    default:
                        $orderby='';
                        break;
                }
        }
        if($brand){
             $condition['active']=1;
             $condition['bid']=$brand;
             $goodsinfo=$this->table('ybc_goods')->order($orderby)->where($condition)->select();
        }else{
            $where['active']=1;
            $res=$this->field('id')->where($where)->select();
            if($res){
                $str='';
                foreach($res as $v){
                    $str.=$v['id'].',';
                }
                $where1['cid']=array('in',$str);
            }else{
                $where1['cid']=$category1;
            }

            $where1['active']=1;
            /* $where1['ad']=0;
             $where1['group']=0;*/
            $goodsinfo=$this->table('ybc_goods')->order($orderby)->where($where1)->select();

        }

        if($goodsinfo){
            return $goodsinfo;
        }else{
            return false;
        }
    }

}