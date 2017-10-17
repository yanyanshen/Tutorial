<?php 
	namespace Admin\Model;
	use Think\Model;
	class GoodsModel extends Model{
		protected $_validate=array(
         array('goodsname','require','商品名称不能为空!',1),
         array('saleprice','currency','市场价格必须是货币类型!',1),
         array('markprice','currency','本站价格必须是货币类型!',1),
         array('goodsnum','require','商品数量不能为空!',1),
         // array('goodpro','require','商品名称不能为空!',1),
         // array('goodsdetail','require','商品名称不能为空!',1),
       );

		public function search(){
			$goods=M('goods');
			$brands=M('brands');
			$where=array();
			//按商品名称
			$goodsname=I('get.goodsname');
			if($goodsname){
				$where['goodsname']=array('like',"%$goodsname%");
			}
			//按价格
			$markprice=I('get.markprice');
			if($markprice){
				$where['markprice']=array('eq',$markprice);
			}
			//按价格区间
			$price1=I('get.price1');
			$price2=I('get.price2');
			if($price1&&$price2){
				$where['markprice']=array('between',array($price1,$price2));
			}elseif ($price1){
				$where['markprice']=array('egt',$price1);
			}elseif ($price2){
				$where['markprice']=array('elt',$price2);
			}
			//按添加时间
			$time1=I('get.time1');
			$time1=strtotime($time1);
			$time2=I('get.time2');
			$time2=strtotime($time2);
			if($time1&&$time2){
				$where['createtime']=array('between',array($time1,$time2));
			}elseif ($time1){
				$where['createtime']=array('egt',$time1);
			}elseif ($time2){
				$where['createtime']=array('elt',$time2);
			}

			$perPage=8;
			// 取出总的记录数
			$count = $goods->join('sk_brands on sk_goods.bid=sk_brands.id')->where($where)->count();
			// 生成翻页类的对象
//			$pageObj = new \Think\Page($count, $perPage);
            $pageObj = new \Org\Yh\AjaxPage($count, $perPage,"goodsList");
			// 设置样式
//			$pageObj->setConfig('next', '下一页');
//			$pageObj->setConfig('prev', '上一页');
			// 生成页面下面显示的上一页、下一页的字符串
//			$pageString = $pageObj->show();

			$info=$brands->join('sk_goods on sk_brands.id=sk_goods.bid')->order('createtime desc')->where($where)->limit($pageObj->firstRow.','.$pageObj->listRows)->select();
            $pageString = $pageObj->show();

			//返回数据
			return array(
				'info'=>$info,
				'page'=>$pageString,

			);
		}
	}
 ?>

















