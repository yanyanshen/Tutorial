<?php
namespace Mobile\Controller;
use Mobile\Model\CategoryModel;
use Mobile\Model\GoodsModel;
use Mobile\Model\UserModel;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $user=new UserModel();
        $meminfo=$user->meminfo(session('username'));
        $obj=new GoodsModel();
        $hot_tj=$obj->hot_tj();
        $firstCate=F('firstCate/cate');
        if(empty($firstCate)){
            $cate=new CategoryModel();
            $firstCate=$cate->firstCate();
            foreach($firstCate as $k=>$v){
                $firstCate[$k]['second']=$cate->secondCate($v['id']);
                foreach ($firstCate[$k]['second'] as $key=>$val){
                    $firstCate[$k]['second'][$key]['third']=$cate->secondCate($val['id']);
                }
            }
            F('firstCate/cate',$firstCate);
            echo "直接从数据库读取";
        }
        $floor=F('floor/floor');
        if(empty($floor)){
            $goods=new GoodsModel();
            $floor['1_1']=$goods->getGoods(array('cid'=>6));
            $floor['1_2']=$goods->getGoods(array('cid'=>7));
            $floor['1_3']=$goods->getGoods(array('cid'=>8));
            $floor['1_4']=$goods->getGoods(array('cid'=>9));
            $floor['2_1']=$goods->getGoods(array('cid'=>10));
            $floor['2_2']=$goods->getGoods(array('cid'=>11));
            $floor['2_3']=$goods->getGoods(array('cid'=>12));
            $floor['2_4']=$goods->getGoods(array('cid'=>13));
            $floor['3_1']=$goods->getGoods(array('cid'=>14));
            $floor['3_2']=$goods->getGoods(array('cid'=>15));
            $floor['3_3']=$goods->getGoods(array('cid'=>16));
            $floor['3_4']=$goods->getGoods(array('cid'=>17));
            $floor['4_1']=$goods->getGoods(array('cid'=>18));
            $floor['4_2']=$goods->getGoods(array('cid'=>19));
            $floor['4_3']=$goods->getGoods(array('cid'=>20));
            $floor['4_4']=$goods->getGoods(array('cid'=>21));
            $floor['5_1']=$goods->getGoods(array('cid'=>22));
            $floor['5_2']=$goods->getGoods(array('cid'=>23));
            $floor['5_3']=$goods->getGoods(array('cid'=>25));
            $floor['5_4']=$goods->getGoods(array('cid'=>26));
            F('floor/floor',$floor);
        }
        $floor['rand']=$obj->getRandGoods();
        $this->assign('firstCate',$firstCate);
        $this->assign('meminfo',$meminfo);
        $this->assign('floor',$floor);
        $this->assign('hot_tj',$hot_tj);
        $this->display();
    }
}