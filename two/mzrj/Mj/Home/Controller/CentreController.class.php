<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
header("Content-type:text/html;charset=utf8");
class CentreController extends Controller {


    public function _initialize(){
        if(session('mid')<1){
            $this->redirect('Index/index');
        }
    }

    public function password(){
        $con = M('Member');
        // 定义查询条件
        $condition['username'] = "{$_SESSION['mjs_']['mname']}";
        $condition['member_status'] = 1;
        // 把查询条件传入查询方法
        $result = $con->where($condition)->select();
        foreach ($result as $val) {
        }
        $id = $val['id'];
        $this->assign('user', "用户名:");


        $this->assign('username', $val['username']);
        if (IS_POST) {
            $data['nickname'] = $_POST['nickname'];
            $data['sex'] = $_POST['sex'];
            $data['dirthday'] = $_POST['year'] . "年" . $_POST['month'] . "月" . $_POST['day'] . "日";
            $data['mobile'] = $_POST['mobile'];
            $data['email'] = $_POST['email'];
            $res = $con->where("id=$id")->save($data);
            if ($res) {
                $this->success("保存成功");
            } else {
                $this->error("保存失败");
            }
        } else {
            $this->assign('mobile', $val['mobile']);
            $this->assign('sex', $val['sex']);
            $this->assign('year', $val['year']);
            $this->assign('month', $val['month']);
            $this->assign('day', $val['day']);
            $this->assign('email', $val['email']);
            $this->display();
        }

    }

  /*  public function code()
    {
        $code = M('Member');
        // 定义查询条件
        $condition['username'] = "{$_SESSION['mjs_']['mname']}";
        $condition['member_status'] = 1;
        $result = $code->where($condition)->select();
        foreach ($result as $val) {
        }

        if ($val['pwd'] == md5(trim($_POST['pwd1']))) {
            $data['pwd'] = md5(trim($_POST['pwd']));
            $data['repwd'] = md5(trim($_POST['repwd']));
            if ($_POST['pwd'] = $_POST['repwd']) {
                $res = $code->where($condition)->save($data);
                if ($res) {
                    $this->redirect('Centre/password', null, 2, "修改成功,跳转中...");
                }
            }
        } else {
            $this->redirect('Centre/password', null, 2, "修改失败,跳转中...");
        }
        $this->display('password');
    }*/

//修改密码
    public function repwd()
    {
        $mid = session('mid');
        $pwd1 = md5(I('post.pwd1'));
        $pwd2 = md5(I('post.pwd2'));
        $pwd3 = md5(I('post.pwd3'));

        $res = M('Member')->field('pwd')->where(array('id' => $mid))->find();

        if (empty($pwd1) || empty($pwd2) || empty($pwd3)) {
            $this->ajaxReturn(array('status' => 'no'));
        } elseif ($pwd1 != $res['pwd']) {
            $this->ajaxReturn(array('status' => 'no'));
        } elseif ($pwd2 != $pwd3) {
            $this->ajaxReturn(array('status' => 'no'));
        } else {
            if (M('Member')->where(array('id' => $mid))->save(array('pwd' => $pwd3)) > 0) {
                $this->ajaxReturn(array('status' => 'ok'));
            }
        }
        $this->display('memberinfo');
    }





    public function member(){

        $goods=array_reverse($_SESSION['mycar_'],true);

        $this->assign('goods',$goods);


        $member = M('Member');
        $condition['username'] = "{$_SESSION['mjs_']['mname']}";
        $condition['member_status'] = 1;
        // 把查询条件传入查询方法
        $result = $member->where($condition)->select();
        foreach ($result as $val) {
        }
        $this->assign("username", $val['username']);

       /* $id = $_SESSION['mjs_']['mid'];
        $count = M('Order')->where(array('mid' => $id))->count();
        //print_r($count);

        $Page = new\Think\Page($count, 3);
        $reslist = M()->query("select o.oid,o.order_createtime,o.ordersyn,g.picname,g.goodsname,g.price,r.buynum,m.username,s.order_status from mj_order as o,mj_goods as g,mj_member as m,mj_order_goods as r,mj_order_status as s
where o.mid=m.id and o.status=s.sid and o.oid=r.rid order by o.order_createtime desc limit {$Page->firstRow},{$Page->listRows}");

        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('reslist', $reslist);*/


        //各种状态订单个数

        $order1=M("Order")->where(array('status'=>10 ,'mid'=>session('mid')))->count();
        $order2=M("Order")->where(array('status'=>20,'mid'=>session('mid')))->count();
        $order3=M("Order")->where(array('status'=>30,'mid'=>session('mid')))->count();
        $order4=M("Order")->where(array('status'=>40,'mid'=>session('mid')))->count();
        // print_r($order4);
        $this->assign('order1',$order1);
        $this->assign('order2',$order2);
        $this->assign('order3',$order3);
        $this->assign('order4',$order4);

        $this->display();
    }

    public function order(){

        $s=$_GET['s'];
        if($s==1){
            $where='';
        }elseif($s==2){
            $where='and o.status=10';
        }elseif($s==3){
            $where='and o.status=20';
        }elseif($s==4){
            $where='and o.status=30';
        }elseif($s==5){
            $where='and o.status=40';
        }
        $id=$_SESSION['mjs_']['mid'];
        //print_r($_SESSION);
        $oid['mid']=$id;
        $count=M('Order')->where($oid)->count();
        //print_r($count);
        $Page=new\Think\Page($count,5);
        $this->assign('username',$_SESSION['mjs_']['mname']);


        $goodslist = M()->query("select o.oid,o.order_createtime,o.ordersyn,o.status,m.username,s.order_status from mj_order as o,mj_member as m,mj_order_status as s
where o.mid=m.id and o.status=s.sid and m.id=$id $where order by o.order_createtime desc limit {$Page->firstRow},{$Page->listRows}");
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','末页');
        $Page->setConfig('first','首页');
        $show = $Page->show();
        $oid=$goodslist[0]['oid'];
        $oid=$goodslist[1]['oid'];



        //print_r($goodslist);
        $res=M('Order_goods');
        $a['orderid']=$oid;
        $pric=$res->where($a)->select();
        $j=-1;
        foreach ($pric as $k=>$v){
            $j++;
            $totaprice+=$pric[$j]['totaprice'];
        }

        $this->assign('totaprice',$totaprice);
        $this->assign('page', $show);
        //print_r($goodslist);
        $this->assign('goodslist',$goodslist);



        $this->display();

    }

    public function goodslist()
    {
        //分页
        $goods = M('Goods');
        $condition['issale'] = 1;
        $condition['goodsname'] = array('like', "%" . I('get.key') . "%");
        $count = $goods->where($condition)->count();
        $Page = new \Think\Page($count, 4);
        $show = $Page->show();
        $goodslist = $goods->where($condition)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $map['key'] = I('get.key');
        foreach ($map as $key => $val) {
            $Page->parameter[$key] = urlencode($val);
        }
        $this->assign('goodslist', $goodslist);
        $this->assign("page", $show);
        $this->assign("firstRow", $Page->firstRow);
        $this->display('order');
    }


    public function img(){
        //print_r($_FILES);

        if (!empty($_FILES)) {

            $upload = new \Org\UploadFile();
            $upload->maxSize = 2048000;
            $upload->allowExts = array('jpg','jpeg','gif','png');
            $upload->savePath = "__STATIC__/images/";
            $upload->thumb = true; //设置缩略图
            $upload->imageClassPath = "@.ORG.Image";
            $upload->thumbPrefix = "110_"; //生成缩略图
            $upload->thumbMaxWidth = "110";
            $upload->thumbMaxHeight = "110";
            $upload->saveRule = uniqid; //上传规则
            $upload->thumbRemoveOrigin = true; //删除原图
            if(!$upload->upload()){
                $this->error($upload->getErrorMsg());//获取失败信息
            } else {
                $info = $upload->getUploadFileInfo();//获取成功信息
            }
           /* echo $info[0]['savename']; */   //返回文件名给JS作回调用
        }


    }

    public function address()
    {
        $con = M('Member');
        // 定义查询条件
        $condition['username'] = "{$_SESSION['mjs_']['mname']}";
        $condition['member_status'] = 1;
        // 把查询条件传入查询方法
        $result = $con->where($condition)->select();
        foreach ($result as $val) {
        }
        $id = $val['id'];

        $this->assign('username', $val['username']);
        $add = M('Address');

        if (IS_POST) {
            $data['username'] = $_POST['username'];
            $data['mid'] = "{$_SESSION['mjs_']['mid']}";
            $data['address'] = $_POST['province'] . $_POST['city'] . $_POST['town'];
            $data['detailed_address'] = $_POST['addressDetail'];
            $data['mobile'] = $_POST['mobile'];
            $res = $add->where("id=$id")->add($data);
            if ($res) {
                $this->success("保存成功");
            } else {
                $this->error("保存失败");
            }
        } else {
            $this->assign('mobile', $val['mobile']);
            $this->assign('province', $val['province']);
            $this->assign('city', $val['city']);
            $this->assign('town', $val['town']);
            $this->display();

        }
    }

    /*public function del(){
        $this->ajaxReturn(array('status'=>'ok'));
    }*/
    public function shanchu(){
        $id = $_POST['id'];

        if ($id) {
            $user = M('Order');
            $data['oid'] = $id;
            $rs = $user->where($data)->delete();
            if ($rs) {
               //$this->success('删除成功!');
                $this->ajaxReturn(array('status'=>'ok'));
            }

        } else {
            $this->ajaxReturn(array('status'=>'no'));
            //$this->error('删除失败!');
        }

    }
    public function queren(){
        $id = $_POST['id'];
        if ($id>0) {
            $user = M('Order');
            $data['oid'] = $id;
            $stat['status']=40;
            $rs = $user->where($data)->save($stat);
            if ($rs) {
                $this->ajaxReturn(array('status'=>'ok'));
               // $this->success('成功确认!');
            }

        } else {
            $this->ajaxReturn(array('status'=>'no'));
          //  $this->error('确认失败!');
        }

    }
    public function orderdetail(){
        $orderid=$_GET['id'];
        $db=M('Order');
        $list=$db->where(array('oid'=>$orderid))->select();
       $status=$list[0]['status'];
        $this->assign('status',$status);



        $orderlist = M()->query("select goodsname,picname,price,buynum,orderid,(price*buynum) as totalprice from mj_order_goods o,mj_goods g where o.gid=g.id and o.orderid=$orderid");
        /*$this->assign('$order', $order);*/
        //print_r($orderlist);
        $i=-1;
        foreach ($orderlist as $k=>$v){
            $i++;
            $totalprice+=$orderlist[$i]['totalprice'];
        }

        $this->assign('totalprice',$totalprice);
        $this->assign('orderlist', $orderlist);
        $this->display();
    }






}