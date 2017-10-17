<?php 
namespace Home\Controller;
use Think\Controller;
// use Home\Model\GoodsModel;
// use Home\Model\GoodsDetail;

class SearchController extends Controller{
	public function catSearch(){
		$goods=D('goods');
		$category=D('category');

		
		//根据一级分类
		$id1=I('get.id1');

		// 根据二级分类
		$id2=I('get.id2');
		$id2=','.$id2.',';
		// echo $id2;
		$path2=array();
		$path2['path']=array('like',"%$id2%");
		$inf=$category->where($path2)->select();
		// print_r($inf);
		$str='';
		foreach($inf as $k){
			$str.=$k["id"].',';
		}
		$str=substr($str,0,-1);
		$cid['cid']=array('in',$str);
		$info=$goods->where($cid)->select();
		// print_r($info);

		// 根据三级分类
		$id3=I('get.id3');

		$this->assign('info',$info);
		$this->display('Goods/goodsList');
	}
}

 ?>