<?php
namespace Home\Model;
use Think\Model;

class HistoryModel extends Model{
	public function getHistory(){
		$history=M('history');
		$goods=M('goods');
		$info3='';

		if(isset($_SESSION['uid'])&&$_SESSION['uid']>0){
			$id=$_SESSION['uid'];
			$info3=$history->field("image,goodsname,gid,saleprice,markprice,goodsnum,salenum")->order("addtime desc")->join('sk_goods on sk_goods.id=sk_history.gid')->where("uid=".$id)->select();
		}else{
			foreach($_SESSION['history'] as $k=>$v){
				$info3[$k]=$goods->field("image,goodsname,saleprice,markprice,goodsnum,salenum")->find($k);
				$info3[$k]["gid"]=$v["gid"];
				$info3[$k]['addtime']=$v['addtime'];

			}
			$info3=array_reverse($info3);
		}
	
         return $info3;
	}
	public function delHistory($id){
        $history=M('history');
        $uid=$_SESSION['uid'];
        $res=$history->where('uid='.$uid.' and gid='.$id)->delete();
        return $res;
       
        
    }

}