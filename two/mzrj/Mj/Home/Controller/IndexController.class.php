<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {


    //通过cid拿所有子分类
    public function getAllChildCateByCid($cid){

        $cidarr=M()->query("select cid from mj_category where path like '{$cid},%' or path like '%,{$cid}' or path like '%,{$cid},%' or path like '{$cid}' ");
        $str='';
        foreach($cidarr as $v){
            $str.=$v['cid'].',';
        }
        return substr($str,0,-1);
    }


//得到商品分类
    public function getGoodslist($id=0,$num=0)
    {
        if ($id > 0) {
            $cidlist = $this->getAllChildCateByCid($id);
            $where = "where cid in ($cidlist)";
        } else {
            $where = "where issale=1";
        }
        $limit = $num > 0 ? "limit $num" : '';
        $goodslist = M()->query("select id,goodsname,price,picname from mj_goods $where $limit ");
        return $goodslist;

    }

    public function index(){


        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        //一楼列表  苗家特产
        $goodslist1=$this->getGoodslist(1,5);
       //第一个参数为商品分类path，第二个参数为读取条数
        //二楼列表  苗家工艺
        $goodslist2=$this->getGoodslist(2,7);
        //三楼列表  茗茶佳酿
        $goodslist3=$this->getGoodslist(3,6);
        //四楼列表  生鲜食品
        $goodslist4=$this->getGoodslist(4,6);
        //五楼列表  休闲零食
        $goodslist5=$this->getGoodslist(5,5);
        $list=$this->categoryList();
         $banner=M('Banner');
        $bannerlist=array_reverse($banner->select());
        $goods=array_reverse($_SESSION['mycar_'],true);
        $this->assign('goods',$goods);
        $this->assign('list',$list);

        $this->assign('bannerlist',$bannerlist);
        $this->assign('goodslist1',$goodslist1);
        $this->assign('goodslist2',$goodslist2);
        $this->assign('goodslist3',$goodslist3);
        $this->assign('goodslist4',$goodslist4);
        $this->assign('goodslist5',$goodslist5);
        $this->display();


    }

    public function header(){
        if(IS_AJAX){
            $goods=array_reverse($_SESSION['mycar_'],true);
//print_r($goods);
//print_r(array_reverse($goods));
            $num=count($goods);
            $this->assign('num',$num);
            $json=json_encode(array_reverse($goods));
            $this->ajaxReturn($json);
        }else{
            $this->display();
        }

    }


    public function categoryList(){
        $category=M('category');
        $list=$category->where(array('pid'=>0))->select();
        foreach($list as $k1=>$v1){
            $list[$k1]['second']=$category->where(array('pid'=>$v1['cid']))->select();
            foreach($list[$k1]['second'] as $k2=>$v2){
                $list[$k1]['second'][$k2]['third']=$category->where(array('pid'=>$v2['cid']))->select();
            }
        }
        return $list;
    }




}