<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends controller
{
    public function index()
    {
        $this->display();

    }
    //会员中心
    public function member(){

        $this->assign('username',session('username'));
        $this->display();
    }
    //个人信息
    public function memberinfo()
    {
        $user = D('User');
        if (IS_POST) {
            $data['pic'] = trim(I('post.pic'));
            //var_dump($data['pic']);
            //$data['username'] = trim(I('post.username'));
            $data['nickname'] = trim(I('post.nickname'));
            $data['birthday'] = strtotime(I('post.year') . '-' . I('post.month') . '-' . I('post.day'));
            $data['tel'] = trim(I('post.tel'));
            $data['email'] = trim(I('post.email'));
            $data['sex'] = trim(I('post.sex'));
            $data['id'] = session('id');
            //var_dump(I('post.'));
            if (!$user->create()) {
                echo $user->getError();
            } else {
                //上传图片
              // print_r($_FILES['pic']);
                if($_FILES['pic']){
                    $upload = new \Think\Upload();
                    $upload->maxSize = 1024 * 1024;
                    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                    $upload->rootPath = 'public/Uploads/';
                    $upload->savePath = 'UserPic/';//设置上传图片放置的位置
                    $upload->autoSub = false;//关闭自动生成子文件
                    $info = $upload->uploadOne($_FILES['pic']);
                    if (!$info) {
                        $this->error($upload->getError());
                    } else {
                        $data['pic'] = $info['savename'];
                    }
                }
                //var_dump($data);
                $res=$user->save($data);
            //  echo $user->getLastSql();
                if ( $res>0 ||$res===0) {
                    $this->ajaxReturn(array('status' => 'ok', 'msg' => '修改成功'));
                }
                else{
                   $this->ajaxReturn(array('status' => 'error', 'msg' => '修改失败')) ;
                }
            }
        } else {
            $meminfo = $user->where(array('id' => session('id')))->find();
            $this->assign('pic', $meminfo['pic']);
            $this->assign('meminfo', $meminfo);
            $this->display();
        }
    }

    //修改密码
    public function changepwd()
    {
        $user=M('User');
        $pwd=md5(trim(I('post.pwd')));
        $data['pwd'] = md5(trim(I('post.newpwd')));
        $reppwd=md5(trim(I('post.reppwd')));
        $data['id'] = session('id');

        //var_dump($data);
        //$result= $user->where(array("username='$username' AND pwd='$pwd'"))->find();
        if(IS_POST){
          $password=$user->where(array('pwd'=>$pwd))->find();
        if (!$password) {
            $this->error("原密码输入错误");
        } elseif (! $data['pwd']) {
            $this->error("新密码不能为空");
        } elseif ($data['pwd'] !=  $reppwd) {
            $this->error('确认密码和密码不相同');
        } else {
            if($user->save($data)){
                $this->ajaxReturn(array('status' => 'ok', 'msg' => '修改成功'));
        }else{
                $this->ajaxReturn(array('status' => 'error', 'msg' => '修改失败'));
            }
        }
    }else{
            $this->display();
        }
}
//添加收货地址
public  function address(){
        $address=M('Address');
        $user=M('User');

        $id=session('id');
        $pic =$user->where("id='$id'")->find();
        $address = $address->where("uid=$id")->select();
        //var_dump($address);
    $this->assign('pic',$pic);
        $this->assign('address',$address);
        $this->display();
}
    public function add_address(){
        if(IS_POST){
            $data['uid']=session('id');
            $data['name']=I('post.name');
            $a1=I('post.a1');
            $a2=I('post.a2');
            $a3=I('post.a3');
            $detail=I('post.detail');
            $data['address']=$a1.'-'.$a2.'-'.$a3.'-'.$detail;
            $data['tel']=I('post.tel');
            $data['zip']=I('post.zip');
            $address=M('address');
            $id=$address->add($data);
            if($id){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'新增地址成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'新增地址失败'));

            }
        }else{
            $this->display();
        }


    }
    //编辑收货地址
    public function edit_address(){
        if(IS_POST){
            $data['id']=I('post.id');
            $data['name']=I('post.name');
            $a1=I('post.a1');
            $a2=I('post.a2');
            $a3=I('post.a3');
            $detail=I('post.detail');
            $data['address']=$a1.'-'.$a2.'-'.$a3.'-'.$detail;
            $data['tel']=I('post.tel');
            $data['zip']=I('post.zip');
            $address=M('address');
            $rows=$address->save($data);
            if($rows>0||$rows===0){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'编辑地址成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'编辑地址失败'));
            }
        }else{
            $address=M('address');
            $condition['id']=I('get.id');
            $data=$address->where($condition)->find();
            $arr=explode('-',$data['address']);
            $data['a1']=$arr[0];
            $data['a2']=$arr[1];
            $data['a3']=$arr[2];
            $data['detail']=$arr[3];
            $this->assign('address',$data);
            $this->display();
        }
    }



    //删除收货地址
    public function add_del()
    {
        $user = M('address');
        $id = I('get.id');
        //var_dump($id);exit;
        $res=$user->where("id=$id")->delete();
       // var_dump($id);
        if ($res) {
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功')) ;
        } else {
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }
        $this->display();
    }
    //默认地址
public function isdefault_address(){
    $user=M('address');
    if(IS_GET){
        $data['id']=I('get.id');

        $data['isdefault']=I('post.isdefault');
        $user->where(array('isdefault'=>1,'uid'=>session('id')))->save(array('isdefault'=>0));
        $res=$user->where(array('id'=>$data['id']))->save(array('isdefault'=>1));
        if($res){
          $this->ajaxReturn(array('status'=>'ok','msg'=>'设为默认地址成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'设为默认地址失败'));
        }
    }else{
        $this->display();
    }



}


    //我的订单列表
public function order(){
    $order=M('Order');
    $uid=session('id');
    $user=M('User');
    $pic =$user->where("id='$uid'")->find();
    /*$brand = M('Brand');//数据库表名
 $condition['brand_name']=array('like',"%".I('get.key')."%");//搜索条件*/
    $count = $order->where(array('uid'=>$uid))->count();// 查询满足要求的总记录数
    $page  = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(3)
    $page -> setConfig('header','<span class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
    $page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    $show  = $page->show();// 分页显示输出
    // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $orderList=$order->limit($page->firstRow,$page->listRows)->where(array('uid'=>$uid))->order('oid desc')->select();

    foreach($orderList as $k=> $v){
        $oid=  $v['oid'];
        $sql="select (price*buynum) as total,g.gid,goodsname,pic,price,buynum from  shang_order_goods og,shang_goods g where og.gid=g.gid and oid={$oid}";
       $orderList[$k][]=$order->query($sql);
    }
   /* echo '<pre>';
    print_r($orderList);
    echo '</pre>';*/

    $this->assign('page',$show);// 赋值分页输出
    $this->assign('firstRow',$page->firstRow);//赋值每页开始条数
    $this->assign('count',$count);
   /* $orderList=$order->query($sql);*/
    $this->assign('pic',$pic);
    $this->assign('username',session('username'));
    $this->assign('orderlist',$orderList);
    $this->display();

}
//会员等级
    //会员等级
    public function level(){
        $username=session('username');
        $user=M('User');
        $userlist=$user->where("username='$username'")->find();
        $this->assign('userlist',$userlist);
        $this->display();
    }
    //删除订单
    public function delor(){
        //$data['status']=1;
        $order=M('Order');
        $oid= I('get.oid');


        $res=$order->where("oid=$oid")->delete( );
        if($res){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }

    }


    //签收
    public function sign(){
        $oid=I('get.oid');
        $data['status']=4;
        $order=M('order');
        $a=$order->where("oid=$oid")->save($data);

        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'已签收！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'操作失败，请重新签收！'));
        }

    }

    //申请退货
    public function back(){
        $oid=I('get.oid');

        $data['status']=6;
        $order=M('order');
        $a= $order->where("oid=$oid")->save($data);
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'申请成功！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'退货失败'));
        }

    }
//评论
    public function comment(){
        if(IS_POST){
            $order=M('order');
            $oid=I('post.oid');
            $com['status']=10;
            $a= $order->where("oid=$oid")->save($com);
            $data['uid']=session('id');
            $data['gid']=I('post.gid');

            $data['message']=I('post.message');
            $data['time']=time();
            $comment=M('Comment');
            $id=$comment->add($data);
            if($id && $a){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'评价成功'));

            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'评价失败'));
            }
        }else{
            $gid=I('get.gid');
            $oid=I('get.oid');
            $this->assign('oid',$oid);
            $this->assign('gid',$gid);
            $this->display();
        }

    }

     //收藏展示
   public function collect(){
        $collect=M('Collect as c');
        $uid=session('id');
        $user=M('User');
       $pic =$user->where("id='$uid'")->find();
       //联合查询
        //$collectlist=$collect->join('shang_goods as g on c.gid=g.gid')->where("uid=$uid")->select();
       $count = $collect->where(array('uid'=>$uid))->count();// 查询满足要求的总记录数
       $page  = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(3)
       $page -> setConfig('header','<span class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
       $page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
       $show  = $page->show();// 分页显示输出
       // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
       $orderList=$collect->join('shang_goods as g on c.gid=g.gid')->where(array('uid'=>$uid))->limit($page->firstRow,$page->listRows)->select();

       $this->assign('orderList',$orderList);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('firstRow',$page->firstRow);//赋值每页开始条数
        $this->assign('count',$count);
        $this->assign('pic',$pic);
        //$this->assign('collectlist',$collectlist);
        $this->display();

    }
//删除收藏
public function delcollect(){
    $user = M('collect');
    $id = I('get.id');
    //var_dump($id);exit;
    $res=$user->where("id=$id")->delete();
    // var_dump($id);
    if ($res) {
        $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功')) ;
    } else {
        $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
    }
    $this->display();
}






}