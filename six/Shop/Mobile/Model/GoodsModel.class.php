<?php
namespace Mobile\Model;
use Think\Model;
class GoodsModel extends Model{
	public function search(){
		$goods=M('goods');
		$category=M('category');
		$cid=array();
		$goodsname=array();
		$catename=array();
		// 二级分类
		 $id2=I('get.id2');
        if($id2){
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
            // echo $str;
            $cid['cid']=array('in',$str);
            $info=$goods->where($cid)->select();

        }
		// 三级分类ID
		$id3=I('get.id3');
		if($id3){
			$cid['cid']=array("in","$id3");
			$info=$goods->where($cid)->select();
		}
		// 搜索
		$keywords=I('get.keywords');
		if($keywords){
			$goodsname['goodsname']=array('like',"%$keywords%");
			$catename['catename']=array('like',"%$keywords%");
			//根据商品名搜索
			if($info=$goods->where($goodsname)->select()){
				$info=$goods->where($goodsname)->select();
				// echo "11";
				// print_r($info);
			}else{
					// 根据商品分类搜索
					if($info=$category->where($catename)->select()){
					$info=$category->where($catename)->select();
					print_r($info);
					$str="";
					foreach($info as $k=>$v){
						// $inf["$k"]=$info[$k]['id'];
						$str.=$this->getcid($v["id"]).",";					
					}
					if($str){
						$str=substr($str,0,-1);
					}
					// echo "22";
					// print_r($str);
					$info=$goods->where("cid in (".$str.")")->select();
					// print_r($info);
				}
			}

		}



		return $info;
	}



	public function getcid($id)
    {
        $str = $id;
        $second = $this->query("select id,catename from sk_category where pid=$id");
        if($second){
        	foreach ($second as $k1 => $v1) {
        		$str.=",".$v1["id"];
            	$third = $this->query("select id,catename from sk_category where pid={$v1['id']}");
            	if($third){
            		foreach ($third as $k2 => $v2) {
                		$str .= ",".$v2["id"];
            		}
            	}
        	}
    	}
        return $str;

    }

    //提交订单，写错地方了，，，，，
    public function ordersubmit($d){
        $uid=M('users')->where(array("username"=>session('username')))->field('id')->find();
        $date['ordersyn']=md5(uniqid(rand()));
        $date['uid']=$uid['id'];
        $date['prices']=$d['totalprice'];
        $date['createtime']=time();
        $date['aid']=$d['aid'];
        $date['meaasge']=$d['message'];
        $order=M('order');
        $order->startTrans();
        $oid=$order->add($date);

        //订单商品表
        foreach($d['gid'] as $k=>$val){
            $rel=M('goods')->where(array('id'=>$val))->field('goodsname')->find();
            $goods[]=array('oid'=>$oid,'gid'=>$val,'goodsname'=>$rel['goodsname'],'price'=>$d['price'][$k],'buynum'=>$d['buynum'][$k]);
            //删除购物车中的商品
            M('cart')->where(array('uid'=>$uid['id']))->where(array('gid'=>$val))->delete();
        }

        $ordergoods=M('ordergoods')->addAll($goods);

        if($oid && $ordergoods){
            $this->commit();
            return $oid;
        }else{
            $this->rollback();
            return false;
        }
    }

    public function history(){
        $goods=M('goods');
        $history=M('history');
        $goods_id=I('id');
        print_r($goods_id);


        $hist=array();
        $hist['uid']=$_SESSION["uid"];
        $hist['addtime']=time();
        $hist['gid']=$goods_id;

        $info=$history->where("uid=".$hist["uid"]." and gid=".$hist["gid"])->find();

        if(isset($hist['uid'])&&$hist['uid']>0){
            if($info){
                $history->create();
                $hist['addtime']=time();
                $id=$history->where("uid=".$hist["uid"]." and gid=".$hist["gid"])->setField("addtime",$hist['addtime']);
            }else{
                $history->create();
                $id=$history->add($hist); 
            }
           
        }
           
        
        if($id){
            return true;
        }else{
            return false;
        }
       
    }
}