<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/11
 * Time: 15:05
 */
namespace Home\Controller;
use Think\Controller;
use Think\Crypt\Driver\Think;

class UserController extends Controller
{
    public function login($e)
    {
        if ($e) {
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        $cid = $_SESSION['fl_home']['mid'];

        $c = $this->login($cid);
        if ($c) {
            $cu = M('custom');
            if (!empty($_POST)) {
                $cu = M('custom');
                $u = D('Custom');
                $data = $u->Uploads($_FILES);

                $s = $cu->where("custom_id=$cid")->select();

                if (!empty($_POST['custom_nickname'])) {
                    if (mb_strlen($_POST['custom_nickname'], 'utf-8') > 6) {
                        $this->assign('nickname', '昵称长度必须小于6');
                    } else {
                        $data['custom_nickname'] = trim($_POST['custom_nickname']);
                    }
                }
                if (!empty($_POST['custom_year'])) {
                    if (!mb_strlen($_POST['custom_year'], 'utf-8') > 2) {
                        $r = '/^[0-9]{1-2}/u';
                        if (preg_match($r, $_POST['custom_year'])) {
                            $data['custom_year'] = trim($_POST['custom_year']);
                        } else {
                            $this->assign('year', '请输入0-99正确年龄');
                        }
                    } else {
                        $this->assign('year', '请输入0-99正确年龄');
                    }
                }
                if(trim($_POST['custom_emaill'])){
                if ($s[0]['custom_email'] == $_POST['custom_emaill']) {
                    if (!empty($_POST['custom_email'])) {
                        $pa = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
                        if (preg_match($pa, $_POST['custom_email'])) {
                            $data['custom_email'] = trim($_POST['custom_email']);
                        } else {
                            $this->assign('email', '请输入正确的邮箱');
                        }
                        $data['custom_email'] = trim($_POST['custom_email']);
                    }
                    if (!empty($_POST['custom_pwd'])) {
                        if (mb_strlen($_POST['custom_pwd'], 'utf-8') > 6 && mb_strlen($_POST['custom_pwd'], 'utf-8') < 18) {
                            $data['custom_pwd'] = trim($_POST['custom_pwd']);
                        } else {
                            $this->assign('pwd', '密码长度必须在6~18之间');
                        }

                    }
                } else {
                    $this->assign('emaill', '输入正确邮箱后才能修改一下信息');
                }
                }
                $data['custom_sex']=$_POST['custom_sex'];
                $cu->where("custom_id=$cid")->save($data);
            }


            $s = $cu->where("custom_id=$cid")->select();
            if ($s[0]['custom_sex'] == '男') {
                $s[0]['custom_s'] = 'checked';
            } elseif ($s[0]['custom_sex'] == '女') {
                $s[0]['custom_e'] = 'checked';

            }

            $this->assign('custom', $s);


            $this->display();
        } else {
            $url = I('get.url');
            $this->redirect('Custom/login', array('url' => $url));
        }
    }
//    分页
    public function page($n)
    {
        $Page = new \Think\Page($n, 10);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '共%TOTAL_PAGE%页');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('link', 'indexpagenumb');//pagenumb 会替换成页码
        $Page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        return $Page;
    }

    public function cart()
    {
        $id = $_SESSION['fl_home']['mid'];

        $c = $this->login($id);
        if ($c) {
            $cu = M('prod');

//        $_SESSION["cart_$id"]=$cu->select();
            $z = $_SESSION["cart_$id"];
            $n = count($z);
            $this->assign('list', $z);

            $this->display();
        } else {
            $url = I("get.url");
            $this->redirect('Custom/login', array('url' => $url));

        }
    }

//    设置默认地址
    public function sitee($id)
    {

        $cu = D('Site');
        if ($id) {
            $custome_id = $cu->where(array("site_id" => "$id"))->select();

            foreach ($custome_id as $key => $val) {
                $customeIdArr[] = $val['site_custom_id'];
            }
            $where['site_custom_id'] = array('in', $customeIdArr);

            $cu->where($where)->save(array("site_m" => 0));

            $cu->where("site_id='$id'")->save(array("site_m" => 'site'));
        }


    }

    public function site()
    {

        $cid = $_SESSION['fl_home']['mid'];
        $c = $this->login($cid);
        if ($c) {
            $cu = D('Site');
            //        添加地址
            if (IS_POST) {
                if (!$z = $cu->create()) {
                    $error = $cu->getError();
                    $this->assign('alert', "<script>layer.alert('$error')</script>");
                    $this->ajaxReturn($error);
                } else {

                    $s = $cu->where("site_custom_id=$cid")->count();
                    if ($s < 3) {
                        $z['site_content'] = $_POST['site_content'];
                        $z['site_custom_id'] = $cid;
                        $z['site_area'] = $_POST['site'];
                        $cu->add($z);
                    } else {
                        $this->assign('alert', "<script>layer('添加失败')</script>");
                    }

                }
            }

            //            删除地址
            $site_id = I('get.del_id');
            if ($site_id) {
                $cu->where("site_id=$site_id")->delete();
            };


            //修改默认地址
            if (IS_GET) {
                $id = $_GET['site_id'];
                $this->sitee($id);
            }

//        显示已添加地址
            $c = $cu->where("site_custom_id=$cid")->select();
            $this->assign('site', $c);


            if (!IS_AJAX) {
                $this->display();
            }

        } else {
            $this->redirect('Custom/login');

        }


    }

    public function order()
    {
        $mid = $_SESSION['fl_home']['mid'];

        if ($mid) {

            $site = D('site');
            $order = D('order');

            $s = array("order_custom_id" => "$mid");
            if (!$z = $order->where($s)->select()) {
                $z = null;
            }
            for ($i = 0; $i < count($z); $i++) {
                $sit = $z[$i]['order_site'];
            }
            $ss = array("site_id" => "$sit");
            $sitt = $site->where($ss)->select();
            for ($i = 0; $i < count($z); $i++) {
                $z[$i]['s'] = $sitt;
            }
            $n = count($z);
            $page = $this->page($n);
            $show = $page->show();
            $end = $page->listRows;
            $fast = $page->firstRow;
            $this->assign('order', $z);
            $this->assign('page', $show);
            $this->assign('fast', $fast);
            $this->assign('end', $end);
            $this->assign('page', $show);
            $this->display();
        } else {
            $this->redirect('Custom/login');
        }
    }

    public function ord()
    {
        $e = $_GET['order_feel'];
        $order_prod = D('order_prod');
        $prod = D('prod');
        $s2 = array("order_feel" => $e);
        $c = $order_prod->where($s2)->select();
        $o = '';
        for ($i = 0; $i < count($c); $i++) {
            $o = $o . $c[$i]['order_prod_id'] . ',';
        }
        $where['prod_id'] = array('in', $o);
        $d = $prod->where($where)->select();
        for ($i = 0; $i < count($d); $i++) {
            $d[$i]['order'] = $c[$i];
        }

        $this->assign('prod', $d);
        $this->display();
    }

//    商品评价添加
    public function ping()
    {
        $comm = D('comment');
        $order = D('order_prod');
        $ord = D('order');
        $mid = $_SESSION['fl_home']['mid'];
        if (!$_POST['rating']) {
            $aa = false;
        } else {
            $aa = true;
        }


        $k = $_POST['num'] + 1;
        if ($aa) {
            for ($i = 1; $i < $k; $i++) {
                if ($_POST["content$i"]) {
                    $data['comment_content'] = $_POST["content$i"];
                    $data['comment_custom_id'] = $mid;
                    $data['comment_prod_id'] = $_POST["prod_id$i"];
                    $data['comment_order'] = $_POST['order_feel'];
                    $data['comment_createtime'] = time();
                    $data['comment_star'] = $_POST['rating'];

                    $comm->add($data);
                    $s1 = $data['comment_order'];
                    $s2 = $data['comment_prod_id'];
                    $s = array('order_feel' => "$s1", "order_prod_id" => "$s2");
                    $order->where($s)->save(array('order_pl' => '已评论'));

                } else {
                    continue;
                }

                $ss = array("order_feel" => $_POST['order_feel'], "order_pl" => "未评论");
                $sss = $order->where($ss)->select();
                if (!$sss) {

                    $feel = array('order_feel' => $_POST['order_feel']);
                    $ord->where($feel)->save(array('order_status' => '已评论'));

                }

            }
            $this->redirect('User/order');
        } else {
            $this->redirect('User/order');
        }
    }


    public function zj()
    {

// 足迹

        $prod = D('prod');
        $s = '';
        foreach ($_COOKIE["fl_home"] as $v) {
            $s = $s . $v . ',';
        }
        $wh['prod_id'] = array("in", "$s");
        $d = $prod->where($wh)->select();
        $d = array_reverse($d);
        $this->assign('zj', $d);
        $this->display();

// 足迹结束
    }

//    确认收货
    public function qrsh()
    {
        $order = D('order');
        $feel = $_GET['order_feel'];
        $s = array('order_feel' => "$feel");
        $order->where($s)->save(array('order_status' => "已收货"));
        $this->redirect('User/order');
    }

//删除购物车
    public function del(){
        $cid = $_SESSION['fl_home']['mid'];
        $id = $_GET["prod_id"];
        if (IS_GET) {
            unset($_SESSION["cart_$cid"][$id]);

        }
        $this->redirect('User/cart');

    }
    //    确认收货
    public function th ()
    {
        $order = D('order');
        $feel = $_GET['order_feel'];
        $s = array('order_feel' => "$feel");
        $order->where($s)->save(array('order_status' => "已退货"));
        $this->redirect('User/order');
    }

//    以下是手机短信验证方法
   public function Post($curlPost,$url){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $return_str = curl_exec($curl);
        curl_close($curl);
        return $return_str;
    }
    public function xml_to_array($xml){
        $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
        if(preg_match_all($reg, $xml, $matches)){
            $count = count($matches[0]);
            for($i = 0; $i < $count; $i++){
                $subxml= $matches[2][$i];
                $key = $matches[1][$i];
                if(preg_match( $reg, $subxml )){
                    $arr[$key] = $this->xml_to_array( $subxml );
                }else{
                    $arr[$key] = $subxml;
                }
            }
        }
        return $arr;
    }
    public function random($length = 6 , $numeric = 0) {
        PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        if($numeric) {
            $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }
    public  function xgmm(){
        $cid = $_SESSION['fl_home']['mid'];
        $c = $this->login($cid);
        $custom = D('custom');
        if ($c) {
            if (IS_AJAX) {
//                邮箱验证
                if ($_GET['custom_email']) {
                    $s = array('custom_email' => $_GET['custom_email'], 'custom_id' => $cid);
                    $d = $custom->where($s)->select();
                    if ($d) {
                        $this->ajaxreturn(1);
                    } else {
                        $this->ajaxreturn(0);
                    }
                } else if(trim($_POST['tel_yzm'])){
                    $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
                    $mobile = $_POST['tel_yzm'];
                    $mobile_code = $this->random(4,1);
                    $post_data = "account=cf_zhengzhiyang&password=583566032&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
                    $gets =  $this->xml_to_array($this->Post($post_data, $target));
                    if($gets['SubmitResult']['code']==2){
                        $_SESSION['mobile'] = $mobile;
                        $_SESSION['mobile_code'] = $mobile_code;
                    }
                   $yzm= $gets['SubmitResult']['msg'];
                    $this->ajaxreturn($yzm);
                }else{
                    $this->ajaxreturn(0);
                }
            }

            $this->display();
        } else {
            $url = I('get.url');
            $this->redirect('Custom/login', array('url' => $url));
        }
    }

//    判定手机短信验证码是否正确
    public function yanzheng(){
        $a=$_SESSION["mobile_code"];
        $mid=$_SESSION["fl_home"]['mid'];
        $custom=D('custom');
        if(IS_AJAX){
          $s=  $_GET['yzm'];
          $ss=  $_GET['tel'];
            if($_GET['yzm']){
                if($a==$s){
                    $where=array('custom_id'=>$mid);
                    $data=array('custom_tel'=>$ss);
                    $custom->where($where)->save($data);
                    $this->ajaxreturn("绑定成功完成");
                }else{
                    $this->ajaxreturn("请输入正确验证码");
                }
            }else{
                $this->ajaxreturn("请输入正确验证码");
            }
            $this->ajaxreturn("请输入正确验证码");
        }
    }
}