<?php
namespace Mobile\Model;
use Think\Model;
class IndexModel extends Model
{
    protected $tableName = 'goods';

    public function cateinfo()
    {
        $where['active'] = 1;//获取在线状态的品种
        $where['pid'] = 0;
        $res = $this->table('ybc_category')->limit(0, 8)->where($where)->select();
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    //获取每个一级分类的二级分类
    public function twocate($id)
    {
        $where['pid'] = $id;
        $where['active']=1;
        $twocate = $this->table('ybc_category')->limit(0, 3)->where($where)->select();
        if ($twocate) {
            return $twocate;
        } else {
            return false;
        }
    }
//获取品牌
    /* public function brand(){
         $brandlist=$this->table('ybc_brand')->limit(0,4)->where(array('active'=>1))->select();
        if($brandlist){
            return $brandlist;
        }else{
            return false;
        }
     }*/

    public function goodsinfo($id)
    {
        //根据分类id查找分类path
        $catepath = M('category')->field('path')->where(array('id' => $id, 'active' => 1))->find();
        //查找子分累id；
        if($catepath) {
            $path = $catepath['path'];
            $where['path'] = array('like', "$path%");
            $where['active'] = 1;
            $cateid = M('category')->field('id')->where($where)->select();

            if ($cateid) {
                $cateidarr = '';
                foreach ($cateid as $val) {
                    $cateidarr .= $val['id'] . ',';
                }
                $cateidarr = substr($cateidarr, 0, -1);
                $where1['cid'] = array('in', $cateidarr);
                $where1['active'] = 1;
                $where1['num'] = array('neq', 0);
                //筛除团购商品
                $where1['group'] = 0;
                $where1['ad'] = 0;
                return $this->where($where1)->order("addtime asc")->limit(0,4)->select();
            } else {
                return false;
            }
        } else{
            return false;
        }

    }

    public function newgoods()
    {

        $where['active']=1;
        $where['num']=array('neq',0);

        return $this->order("addtime desc")->where($where)->limit('0,5')->select();

    }

    public function hotsalegoods()
    {
        $where['active']=1;
        $where['num']=array('neq',0);
        return $this->order("salenum desc")->where($where)->limit('0,5')->select();
    }


}