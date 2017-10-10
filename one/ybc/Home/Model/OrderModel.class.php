<?php
namespace Home\Model;
use Think\Model;
class OrderModel extends Model{
    protected $tableName='order';
    public  function orderDetail1($id){//查询带有收获地址的订单详情信息
        //订单状态、订单号、下单时间、收货地址、收货人、联系方式、支付方式、
        $status=$this->chkStatus($id);//判断该订单的状态，如果不是代付款状态则订单收货信息已被绑定，不可更改
        if($status==1) {//是待付款的状态
            $res = $this->chkOrderAddr($id);//判断该订单是否已经选择了收货地址信息
            if (!$res) {//未选择
                $de = $this->chkAddrDef();//检查是否设置了默认收货地址
                if (!$de) {
                    $uid = session('ybc_id');
                    $def['def']=array("neq","2");
                    $addr = M('member_address')->where(array('mid' => $uid))->where($def)->find();
                    $de = $addr['id'];
                }
                $this->where(array('id' => $id))->save(array("address_id" => $de));
            }
        }
        $arr=$this->findOrder($id);
        return $arr;
    }

    public function findOrder($id){
        $arr=$this->alias('o')
            ->join("ybc_member_address a ON o.address_id=a.id")
            ->join("ybc_order_status s ON o.orderstatus=s.id")
            ->field(array(
                "o.id"=>"id",
                's.status'=>'status',
                'o.ordersyn'=>'ordersyn',
                'o.addtime'=>'addtime',
                'o.contime'=>'contime',
                'a.address'=>'address',
                'a.province',
                'a.city',
                'a.town',
                'o.address_id'=>'address_id',
                'a.name'=>'username',
                'a.phone'=>'phone',
                'o.paymethod'=>'paymethod',
                "o.orderprice"=>"orderprice",
                "o.postage",
                "a.postcode",
                "o.message"=>'message',
                's.mnext'))
            ->where(array("o.id"=>$id))
            ->find();
        $arr['address']=$arr['province'].$arr['city'].$arr['town'].$arr['address'];
        return $arr;
    }

    public function chkAddrdef(){//检查当前用户是否设置了默认收货地址
        $id=session("ybc_id");
        $res=M('member_address')->where(array('def'=>'1','mid'=>$id))->find();
        return $res['id'];//如果有返回默认收货地址信息的id
    }

    public  function orderDetail2($id){//查询不带收获地址的订单详情信息
        //订单状态、订单号、下单时间、支付方式、
        $arr=$this->alias('o')
            ->join("ybc_order_status s ON o.orderstatus=s.id")
            ->field(array(
                "o.id"=>"id",
                's.status'=>'status',
                'o.ordersyn'=>'ordersyn',
                'o.addtime'=>'addtime',
                'o.contime'=>'contime',
                'o.paymethod'=>'paymethod',
                "o.orderprice"=>"orderprice",
                "o.postage",
                "o.message"=>'message',
                "s.mnext"))
            ->where("o.id={$id}")
            ->find();
        return $arr;
    }

    public function chkStatus($id){
        $status=$this->where(array('id'=>$id))->find();
        return $status['orderstatus'];
    }

    public function chkOrderAddr($id){//按照订单id检测该订单是否已经选择了收货地址信息，0为未选择
        $res=$this->where(array('id'=>$id))->field('address_id')->find();
        return $res['address_id'];
    }

    public function chkAddress($id){
        $user=M('member_address');
        $where['mid']=$id;
        $where['def']=array('neq','2');
        $res=$user->where($where)->find();
        return $res;
    }

    public function orderGoods($id){//查询订单详情里的商品信息
        //商品图片、商品名称、单价、购买数量、订单总价、邮费
        $status=$this->chkStatus($id);//判断该订单的状态，如果不是代付款状态则订单收货信息已被绑定，不可更改
        if($status==1){
            $arr=$this->alias('o')
                ->join("ybc_order_goods og ON o.id=og.oid")
                ->join("ybc_goods g ON og.gid=g.id")
                ->field(array(
                    "g.pic"=>"pic",
                    "g.goodsname"=>'goodsname',
                    "g.price"=>'price',
                    "og.buynum"=>"buynum"
                ))
                ->where("o.id={$id}")
                ->select();
        }else{
            $arr=$this->alias('o')
                ->join("ybc_history h ON h.oid=o.id")
                ->field(array(
                    "h.id"=>"hid",
                    "h.pic"=>"pic",
                    "h.goodsname"=>'goodsname',
                    "h.price"=>'price',
                    "h.buynum"=>"buynum",
                    "h.gid"=>"gid",
                    "h.sfpj"=>"sfpj"
                ))
                ->where("o.id={$id}")
                ->select();
        }

        return $arr;
    }

    public function bindAddr($id){//将收货地址复制并绑定该订单
        $res1=$this->where(array('id'=>$id))->field("orderstatus,address_id")->find();
        $aid=$res1['address_id'];
        if($res1['orderstatus']==1){
            if($res1){
                $maddr=M("member_address");
                $addrInfo=$maddr->where(array('id'=>$aid))->find();
                if($addrInfo){
                    $addrInfo['def']=2;
                    array_shift($addrInfo);
                    $newId=$maddr->add($addrInfo);
                    if($newId){
                        $data['address_id']=$newId;
                        $res2=$this->where(array('id'=>$id))->save($data);
                        return $res2;
                    }else{return false;}
                }else{return false;}
            }else{return false;}
        }else{return false;}
    }

    public function changeStatus($id,$status){
        $data['orderstatus']=$status;
        $res=$this->where(array("id"=>$id))->save($data);
        return $res;
    }

    public function getList($condition){
        $condition['mid']=session('ybc_id');
        $arr['count']=$this->alias('o')
            ->join("ybc_order_status s ON o.orderstatus=s.id")
            ->where($condition)
            ->order("addtime desc")
            ->field(array('o.id'=>'id', 'ordersyn', 'orderstatus', 'orderprice', 'mnext', 'mid', 'addtime', 'paymethod', 'address_id','status'))
            ->count();
        $page=   new \Think\Page($arr['count'],10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $page->setConfig('theme','<span class="rows">共 %TOTAL_ROW% 条</span> %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $arr['show']=$page->show();
        $arr['orderList']=$this->alias('o')
            ->join("ybc_order_status s ON o.orderstatus=s.id")
            ->where($condition)
            ->order("addtime desc")
            ->field(array('o.id'=>'id', 'ordersyn', 'orderstatus', 'orderprice', 'mnext', 'mid', 'addtime', 'paymethod', 'address_id','status'))
            ->limit($page->firstRow.','.$page->listRows)->select();

        return $arr;
    }

    public function moveToHistory($id){//将订单里的商品信息移动到购买过的商品history表里,用户付款时调用
        $mid=session('ybc_id');
        $og=M('order_goods');
        $where['oid']=$id;
        $arr=$og->alias('og')->join("ybc_goods g on og.gid=g.id")->where($where)->field(array(
            'oid','gid','price','buynum','goodsname','pic'
        ))->select();
        foreach($arr as $k=>$v){
            $arr[$k]['mid']=$mid;
            $arr[$k]['buytime']=time();
            $arr[$k]['active']=0;
        }
        return M('history')->addAll($arr);
    }

    public function getTimeArr(){
        $condition['orderstatus']=1;
        $condition['mid']=session("ybc_id");
        $arr=$this->where($condition)->field(array('id','addtime'))->select();
        return $arr;
    }

    public function getGoodsTimeArr($oid){
        $og=M('order_goods');
        $timeArr=$og->alias('og')->join("ybc_goods g on og.gid=g.id")->where(array('oid'=>$oid))->field("g.changetime")->select();
        return $timeArr;
    }

    public function getHistory(){
        $where['mid']=session("ybc_id");
        $where['active']=1;
        $user=M('history');

        $arr['count']      = $user->where($where)->order("buytime desc")->count();// 查询满足要求的总记录数
        $Page              = new \Think\Page($arr['count'],10);// 实例化分页类 传入总记录数和每页显示的记录数(25)

        $Page->setConfig('first',"<<");
        $Page->setConfig('last',">>");
        $Page->setConfig('prev',"<");
        $Page->setConfig('next',">");
        $Page->setConfig('theme','<span class="rows">共 %TOTAL_ROW% 条记录</span> %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $arr['show']       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $arr['list'] = $user->where($where)->order("buytime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
        return $arr;
    }

    public function changeSaleNum($id){
        $og=M('order_goods');
        $g=M('goods');
        $oginfo=$og->where(array('oid'=>$id))->select();
        foreach($oginfo as $v){
            $num=$g->where(array('id'=>$v['gid']))->field("num")->find();
            if($num['num']>=$v['buynum']){
                $g->where(array('id'=>$v['gid']))->setDec("num",$v['buynum']);
                $g->where(array('id'=>$v['gid']))->setInc("salenum",$v['buynum']);
            }else{
                return false;
            }
        }
        return true;
    }

}