<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index()
    {
        //商品分类列表展示：
        $category = M('Category');
        $cateList = $category->where(array('pid' => 0))->select();
        foreach ($cateList as $k1 => $v1) {
            $cateList[$k1]['second'] = $category->where(array('pid' => $v1['id']))->select();
            foreach ($cateList[$k1]['second'] as $k2 => $v2) {
                $cateList[$k1]['second'][$k2]['third'] = $category->where(array('pid' => $v2['id']))->select();
            }
        }
        $this->assign("cateList", $cateList);
        //商品列表展示：
        $goods = M('goods');
        $goodsList = $goods->select();
        $this->assign("goodsList", $goodsList);
        $this->display('');

    }

    public function search()
    {
        $search['goodsname'] = array('like', "%" . I('get.name') . "%");
        $goods = M('Goods');
        $count = $goodslist = $goods->where($search)->count();
        $page = new \Think\Page($count, 2);
        $show = $page->show();
        $goodslist = $goods->where($search)->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('goodslist', $goodslist);
        $this->assign('count', $count);
        $this->assign('page', $show);
        $this->display('search');
    }
}




