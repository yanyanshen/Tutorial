<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
class OrderController extends BgController{

    public function index(){
        if(isset($_GET['status'])){
            $condition['orderstatus']=I('get.status');
            $this->assign('url1',"status=".I('get.status'));
            $this->assign('status',I('get.status'));
        }else{
            $condition='';
        }

        if(IS_POST){
            //判断关键字
            if(I('post.keywords')){
                $keywords=I('post.keywords');
                $condition['ordersyn']=array('like',"%{$keywords}%");
                $this->assign('keywords',$keywords);
            }
            //判断用户名
            if(I('post.username')){
                $condition['username']=I('post.username');
                $this->assign('username',I('post.username'));
            }
            //判断时间选择
            if(I('post.date1') && I('post.date2')){
                $time1=strtotime(I('post.date1'));
                $time2=strtotime(I('post.date2'));
                $this->assign('date1',I('post.date1'));
                $this->assign('date2',I('post.date2'));
                $condition['addtime']=array(array('gt',$time1),array('lt',$time2),'and');
            }elseif(!I('post.date1') && I('post.date2')){
                $time2=strtotime(I('post.date2'));
                $this->assign('date2',I('post.date2'));
                $condition['addtime']=array('lt',$time2);
            }elseif(I('post.date1') && !I('post.date2')){
                $time1=strtotime(I('post.date1'));
                $this->assign('date1',I('post.date1'));
                $condition['addtime']=array('gt',$time1);
            }
        }


        $db=D('Order');

        $arr=$db->page1($condition);
        $this->assign('firstRow',$arr['firstRow']);
        $this->assign('list',$arr['list']);// 赋值数据集
        $this->assign('page',$arr['page']);// 赋值分页输出
        $this->display(); // 输出模板

    }

    public function detail(){
        $model=D('Order');
        $orderInfo=$model->detail(I('get.id'));
        $goods=$model->orderGoods(I('get.id'));

        $this->assign('goods',$goods);
        $this->assign('order',$orderInfo[0]);
        $this->assign('address',$orderInfo[1]);
        $this->display();
    }

    public function plcz(){//批量操作

        $model=D("Order");
        $status=I('get.status');


        if($status==1){
            $res=$model->mulRemind1(I('post.check'));
            if($res){
                $this->success("已发送提醒消息");
            }else{
                $this->error('发送提醒消息失败');
            }
        }

        if($status==2){
            if($model->mulChange(I('post.check'),3)) {//批量发货
                $this->success("发货成功");
            }else{
                $this->error('发货失败');
            }
        }

        if($status==3){
            $res=$model->mulRemind2(I('post.check'));
            if($res) {//批量
                $this->success("已发送提醒收货信息");
            }else{
                $this->error('发送提醒收货信息失败');
            }
        }

        if($status==4){
            $res=$model->mulRemind3(I('post.check'));
            if($res) {//批量
                $this->success("已发送提醒评价信息");
            }else{
                $this->error('发送提醒评价信息失败');
            }
        }
    }

    public function dgcz(){
        $model=D("Order");
        $re=$model->chkStatus(I('post.id'));
        $status=$re['orderstatus'];
        if($status==1){
            $arr[]=I('post.id');
            $res=$model->mulRemind1($arr);
            if($res){
                $this->success("已发送提醒消息");
            }else{
                $this->error('发送提醒消息失败');
            }
        }

        if($status==2){
            $arr[]=I('post.id');
            if($model->mulChange($arr,3)) {//批量发货
                $this->success("发货成功");
            }else{
                $this->error('发货失败');
            }
        }

        if($status==3){
            $arr[]=I('post.id');
            $res=$model->mulRemind2($arr);
            if($res) {//批量
                $this->success("已发送提醒收货信息");
            }else{
                $this->error('发送提醒收货信息失败');
            }
        }

        if($status==4){
            $arr[]=I('post.id');
            $res=$model->mulRemind3($arr);//批量
            if($res) {
                $this->success("已发送提醒评价信息");
            }else{
                $this->error('发送提醒评价信息失败');
            }
        }

    }

    public function chkUsername($username){
        $user=M('member');
        $where['username']=$username;
        $data=$user->$where->find();
        if($data){
            return true;
        }else{
            return false;
        }
    }

    public function chkMember(){
        if(isset($_POST['username'])){
            $user=M('member');
            $where['username']=I('post.username');
            $data=$user->$where->find();
            if($data){
                $this->success();
            }else{
                $this->error('用户不存在');
            }
        }else{
            $this->success();
        }

    }

    public function export()
    {
        $file_name="订单列表".date("Y-m-d H：i：s",time());
        $file_suffix = "xls";
        $where='';
        if($_GET['status']){
            $where['o.orderstatus']=I('get.status');
        }
        if($_GET['keywords']){
            $keywords=I('get.keywords');
            $where['o.ordersyn']=array('like',"%$keywords%");
        }
        if($_GET['username']){
            $mid=M('member')->where(array('username'=>I('get.username')))->field("id")->find();
            $where['o.mid']=$mid['id'];
        }
        if($_GET['date1'] && $_GET['date2']){
            $where['o.addtime']=array(array('gt',strtotime(I('get.date1'))),array('lt',strtotime(I('get.date2'))),'and');
        }elseif($_GET['date1']){
            $where['o.addtime']=array('gt',strtotime(I('get.date1')));
        }elseif($_GET['date2']){
            $where['o.addtime']=array('lt',strtotime(I('get.date2')));
        }
        $model=D('Order');
        $res=$model->getAll($where);
        if(IS_AJAX){
            if($res){
                $this->success();
            }else{
                $this->error('无当前订单列表信息');
            }
        }

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file_name.$file_suffix");
        //根据业务，自己进行模板赋值。

        $this->assign('info',$res);
        $this->display();
    }
    public function weixin(){
        $this->display();
    }
}