<?php
namespace Home\Model;
use Think\Model;
use Think\Page;
class GoodslistModel extends Model{
      protected $tableName='goods';
    public function goodsinfo($keywords,$category1,$brand,$cate,$price,$order){//商品排序

        if($keywords){
            $condition['goodsname']=array('like',"%{$keywords}%");
        }

        if($category1){
            $condition1['id']=$category1;
            $condition1['active']=1;
            $catepath=$this->table('ybc_category')->field('path')->where($condition1)->find();
            //查找子分累id；
            $path=$catepath['path'];
            $where['path']=array('like',"$path%");
            $where['active']=1;
            $cateid=$this->table('ybc_category')->field('id')->where($where)->select();
            $cateidarr='';
            foreach($cateid as $val){
                $cateidarr.=$val['id'].',';
            }
            $cateidarr=substr($cateidarr,0,-1);
            $condition['cid']=array('in',$cateidarr);
        }

            if($price){
                switch($price){
                    case 1:
                        $condition['price']=array(array('gt',0),array('lt',50));
                    break;
                    case 2:
                        $condition['price']=array(array('gt',50),array('lt',150));
                    break;
                    case 3:
                        $condition['price']=array(array('gt',150),array('lt',500));
                    break;
                    case 4:
                        $condition['price']=array(array('gt',500),array('lt',1000));
                    break;
                    case 5:
                    $condition['price']=array(array('gt',1000));
                    break;
                    default:
                        $condition='';
                        break;
                }
            }

        if($brand){
            $condition['bid']=$brand;
        }

        if($cate){
            $condition['cid']=$cate;
        }
     if($order){
          switch($order){
              case 1:
                   $orderby=array('salenum desc');
                  break;
              case 2:
                  $orderby=array('price asc');
                  break;
              case 3:
                  $orderby=array('addtime desc');
                  break;
              case 4:
                  $orderby=array('price desc');
                  break;
              default:
                   $orderby='';
                  break;
          }
     }
        $condition['active']=1;
        $condition['group']=0;
        $condition['ad']=0;


        $count=$this->where($condition)->count();
        $limitRows = 10; // 设置每页记录数
        $p = new \Org\Page\AjaxPage($count, $limitRows,"goodsinfo"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p->firstRow . "," . $p->listRows;
        $res=$this->where($condition)->limit($limit_value)->order($orderby)->select();
        $show=$p->show();
        $arr['nowpage']=$p->firstRow;
        $arr['count']=$count;
        $arr['show']=$show;
        $arr['res']=$res;///异步分页

       /* $count=$this->where($condition)->count();
        $page=new Page($count,10); // 设置每页记录数
        $page->setConfig('prev','<上一页');
        $page->setConfig('next','下一页>');
        $page->setConfig('first','首页');

        $limit_value = $page->firstRow . "," . $page->listRows;
        $res=$this->where($condition)->limit($limit_value)->order($orderby)->select();
        $show=$page->show();
        $arr['nowpage']=$page->firstRow;
        $arr['count']=$count;
        $arr['show']=$show;
        $arr['res']=$res;*/
        return $arr;

    }


    public function brand(){
        $brandlist=$this->table('ybc_brand')->where(array('active'=>1))->select();
        return $brandlist;
    }

    //获取一级分类
    public function category1(){
        $category1=$this->table('ybc_category')->where(array('pid'=>0,'active'=>1))->select();
        return $category1;
    }
    public function category2($id){//获取二级分类
        $catepath=$this->table('ybc_category')->field('path')->where(array('id'=>$id,'active'=>1))->find();
        //查找子分累名称；
        $path=$catepath['path'];
        $where['path']=array('like',"$path%");
        $where['active']=1;
        $where['pid']=array('neq',0);
        $catename=$this->table('ybc_category')->field('catename,id')->where($where)->select();
       if($catename){
           return $catename;
       }else{
           return false;
       }
    }
    public function catename($id){
         return $this->table('ybc_category')->field('catename')->where(array('id'=>$id,'active'=>1))->find();
    }

    public function getcartgoods($gid,$mid){
           $cartgoods=$this->table('ybc_cart')->where(array('gid'=>$gid,'mid'=>$mid))->find();
        if($cartgoods){
              return $cartgoods;
        }else{
            return false;
        }
    }
    public function getcollectgoods($id,$mid){
        $collectgoods=$this->table('ybc_goods_collect')->where(array('gid'=>$id,'mid'=>$mid))->find();
        if($collectgoods){
            return $collectgoods;
        }else{
            return false;
        }
    }
    public function deletcollect($id,$mid){
        $result=$this->table('ybc_goods_collect')->where(array('gid'=>$id,'mid'=>$mid))->delete();
        if($result){
            return $result;
        }else{
            return false;
        }
    }
}