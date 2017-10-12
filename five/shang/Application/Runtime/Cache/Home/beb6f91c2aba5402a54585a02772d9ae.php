<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>我的订单</title>
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/YMDClass.mini.js"></script>
    <script src="/Public/Home/js/geo.js"></script>
    <script src="/Public/Home/js/jquery.form.js"></script>
    <script src="/Public/Home/js/password.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <script src="/Public/Home/js/order.js"></script>
    <script src="/Public/Home/js/reset.js"></script>
    <link rel="stylesheet" href="/Public/Home/style/reset1.css" />
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <link rel="stylesheet" href="/Public/Home/style/order.css">
    <link rel="stylesheet" href="/Public/Home/style/swiper.min.css">
    <link rel="stylesheet" href="/Public/Home/style/password.css" />
    <link rel="stylesheet" href="/Public/Home/style/index.css" />
    <link rel="stylesheet" href="/Public/Home/style/headerAndFooter.css" />
    <style type="text/css">
        body .demo-class .layui-layer-title{background:#ccc; color:red; border: none;}
        body .demo-class .layui-layer-content{background:#ccc; color:white; border: none;}
    </style>
<style>
    #list li{
         margin: 0 60px 0 30px;
    }
</style>
<style>


    #page a{
        display: inline-block;
        width: 18px;
        height:18px;
        padding:5px;
        margin: 2px;
        text-decoration: none;
        text-align: center;
        line-height: 18px;
        border: 1px solid #c2ccd1;
        background: #3D96C9;
        color:#fff;
    }
    #page a:hover{
        background: deeppink;
        color:#000;
    }
    #page span.current{
        display: inline-block;
        width: 20px;
        height:18px;
        padding:5px;
        margin: 5px;
        text-decoration: none;
        text-align: center;
        line-height: 18px;
        border: 1px solid #c2ccd1;
        background: #ff2832;
        color:#000;
        font-weight: bold;
    }
    #page span.rows{
        float:left;
        margin-right:50px;
        margin-top:5px;
        font-size: 20px;
    }
    #page span.rows b{
        font-size: 20px;
        color:red;
    }
    .or_li11 a{
        color:red;
    }
</style>
</head>
<body>
<!-- top开始 -->
<div class="top">
    <div class="topCont frm_sty clearfix">
        <p class="fl">  <b style="color:#000;"><?php switch($_SESSION['shang_home']['level']): case "1": ?>普通会员<?php break;?>
            <?php case "2": ?>铜牌会员<?php break;?>
            <?php case "3": ?>银牌会员<?php break;?>
            <?php case "4": ?>金牌会员<?php break;?>
            <?php case "5": ?>钻石会员<?php break; endswitch;?>
            <?php echo (session('username')); ?>&nbsp;&nbsp;&nbsp;&nbsp;</b>欢迎来到美伦美尚！</p>
        <p class="fr">
            <?php if(($_SESSION['shang_home']['id']) > "0"): ?><a href="javascript:logout()">退出</a> &nbsp&nbsp&nbsp
                <a href="<?php echo u('Member/memberinfo');?>">会员中心</a>
                <?php else: ?>
                <a href="<?php echo u('User/login');?>">登录</a>&nbsp&nbsp&nbsp
                <a href="<?php echo u('User/register');?>">注册</a>&nbsp&nbsp&nbsp<?php endif; ?>

        </p>
    </div>
</div>
<!-- top结束 -->
<div class="topNav">
    <div class="topNavCont frm_sty clearfix">
        <h1 class="fl"><img src="/Public/Home/images/logo.png" alt="" height="85px"/></h1>
        <ul class="fl clearfix">
            <li  ><a href="<?php echo u('Index/index');?>" >首页</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'护肤'));?> "  >护肤</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'彩妆'));?>"  >彩妆</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'香水'));?>">香水</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'洗护'));?>">洗护</a></li>


        </ul>
        <form action="<?php echo u('Home/Index/search');?>" method="get" class="fr clearfix">
            <input type="text" class="text" name="name" value="<?php echo ($name); ?>"/>
            <input type="submit" id="submit" value="" />
        </form>
    </div>
</div>
<!-- topNav结束 -->
<!-- 置顶导航istop开始 -->
<div class="istop">
    <div class="istopCont frm_sty clearfix">
        <h1 class="fl"><img src="/Public/Home/images/logo.png" height="85px" alt="" /></h1>
        <ul class="fl clearfix">
            <li><a href="<?php echo u('Index/index');?>" target="_blank">首页</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'护肤'));?> "  >护肤</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'彩妆'));?>"  >彩妆</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'香水'));?>">香水</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'洗护'));?>">洗护</a></li>
        </ul>
        <form action="<?php echo U(Index/search);?>" method="get" class="fr clearfix">
            <input type="text" class="text" name="name"/>
            <input type="submit" id="submit" value=""/>
        </form>
    </div>
</div>
<!-- 置顶导航istop结束 -->
<script>
    function logout(){
        //询问框
        layer.confirm('您确定要退出当前账户?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Home/User/logout');?>",'',function(res){
                if(res.status=='ok'){
                    location.href="<?php echo U('Home/Index/index');?>";
                }
            });
        });
    }

</script>

<!-- 我的订单开始 myorder-->
<!-- 左侧边栏开始 -->
<div class="myorder frm_sty clearfix">
    <div class="sidebar fl">
       <img src="/Public/Uploads/UserPic/<?php echo ((isset($pic['pic']) && ($pic['pic'] !== ""))?($pic['pic']):'5.jpg'); ?>" height="120px" width="120px">
        <a class="no" href="<?php echo u('Member/order');?>">我的订单</a>
        <a  href="<?php echo u('Member/collect');?>">我的收藏</a>
        <a href="<?php echo u('Member/level');?>">我的会员等级</a>
        <a href="<?php echo u('Member/memberinfo');?>">个人信息</a>
        <a href="<?php echo u('Member/address');?>">收货地址</a>
    </div>
    <!-- 左侧边栏结束 -->
    <div class="order fl">
        <h4 style="border:0">我的订单</h4>
        <div class="orderCont fl">
            <div class="orderCont01 clearfix">
                <ul>
                    <li class="or_li1" style="padding-left:100px;"><a href="#">订单号</a></li>
                    <li class="or_li2"><a href="#">订单时间</a></li>
                    <li class="or_li5" style="padding-left:150px "><a href="#">订单状态</a></li>
                    <li class="or_li2"><a href="#">操作</a></li>
                </ul>
                <div style="clear: both">
                <?php if(is_array($orderlist)): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span style="margin-left: 10px"><?php echo ($vo["ordersyn"]); ?></span><span style="margin-left: 100px"><?php echo (date('Y-m-d H:i:s',$vo["createtime"])); ?></span>
                    <?php if(is_array($vo[0])): $i = 0; $__LIST__ = $vo[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><ul id="list" class="clearfix">
                           <li>

                                <a href="<?php echo u('Index/detail',array('gid'=>$v['gid']));?>"><img src="/Public/Uploads/goods/100_<?php echo ($v["pic"]); ?>"  ></a><p> <?php echo ($v["goodsname"]); ?></p>&nbsp&nbsp&nbsp
                           </li>
                           <li class="or_li22"><p><a href="#"><?php echo ($v["buynum"]); ?></a></p></li>
                           <li class="or_li33"><a href="#"> <?php echo ($username); ?></a></li>
                           <li class="or_li44"><a href="#"> ￥<?php echo ($v["price"]); ?></a></li>
                          <li class="or_li55">
                              <?php switch($vo["status"]): case "1": ?>已下单，未付款<?php break;?>
                                  <?php case "2": ?>已付款，未发货<?php break;?>
                                  <?php case "3": ?>已发货，未签收<?php break;?>
                                  <?php case "4": ?>已签收，未评价<?php break;?>
                                  <?php case "5": ?>已取消<?php break;?>
                                  <?php case "6": ?>申请退货<?php break;?>
                                  <?php case "7": ?>退货中<?php break;?>
                                  <?php case "8": ?>已退货<?php break;?>
                                  <?php case "9": ?>商家已取消，缺货<?php break;?>
                                  <?php case "10": ?>已评价，订单完成<?php break;?>
                                  <?php default: ?>未知<?php endswitch;?>
                              </li>
                          <li class="or_li11">
                              <?php switch($vo["status"]): case "1": ?><a href="<?php echo U('Home/Order/order',array('oid'=> $vo['oid']));?>" style="margin-right:30px">去付款</a> <a href="javascript: del(<?php echo ($vo['oid']); ?>)">删除订单</a><?php break;?>
                                  <?php case "2": ?><p>静等发货</p><?php break;?>
                                  <?php case "3": ?><a href="javascript:sign(<?php echo ($vo['oid']); ?>)">签收</a><?php break;?>
                                  <?php case "4": ?><a href="javascript:back(<?php echo ($vo['oid']); ?>)" style="margin-right:30px">申请退货</a> &nbsp&nbsp<a href="javascript:comment(<?php echo ($vo['oid']); ?>,<?php echo ($v['gid']); ?>)">去评价</a><?php break;?>
                                  <?php default: endswitch;?>

                             <!-- <?php if(($vo["status"]) == "1"): ?><p><a href="javascript: cancel()" class="tablelink"> 取消订单</a>
                                  <a href="<?php echo U('Home/Order/order',array('oid'=> $vo['oid']));?>">去付款</a>
                              </p><?php endif; ?>
                              <?php if(($vo["status"]) == "3"): ?><a href="javascript: right(<?php echo ($v['gid']); ?>)" id="qr"> 待收货</a><?php endif; ?>

                              <?php if(($vo["status"]) == "4"): ?><a href="javascript: returngoods()"> 申请退货</a>
                                 &nbsp &nbsp &nbsp <a href="javascript:comment(<?php echo ($v['gid']); ?>)">评价</a><?php endif; ?>-->

                          </li>
                      </ul><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>

                <div class="pagin">
                    <ul class="orderlist">
                        <li><div id="page">
                            <?php echo ($page); ?>
                        </div></li>
                    </ul>
                </div>
         </div>
    </div>
</div>
<!-- hot样式开始 -->

    <!-- Swiper JS -->

<script src="js/swiper.min.js"></script>
<!-- 侧面导航开始 -->
<div class="rightNav">
    <ul>
        <li class="li1"><img src="/Public/Home/images/user.png"/>
            <ul>
                <li>
                    <h1><img src="/Public/Home/images/quxiao.png" alt="" /></h1>
                    <h2><img src="/Public/Home/images/nvhai.png"/></h2>
                    <b>您好！请
                        <?php if(($_SESSION['shang_home']['id']) > "0"): ?><a href="javascript:logout()">退出</a> &nbsp&nbsp&nbsp
                            <a href="<?php echo u('Member/memberinfo');?>">会员中心</a>
                            <?php else: ?>
                            <a href="<?php echo u('User/login');?>">登录 </a>
                            &nbsp;| &nbsp;<a href="<?php echo u('User/register');?>">注册</a><?php endif; ?>
                    </b>
                    <h5></h5>
                    <?php if(($_SESSION['shang_home']['id']) > "0"): ?><span class="span2"><a href="<?php echo u('Member/Order');?>">我的订单 </a></span>

                        <?php else: endif; ?>
                </li>
            </ul>

        </li>
        <h4><img src="/Public/Home/images/lineke.png"/></h4>

        <li class="li2">
            <a href="<?php echo U('Home/Mycar/mycar');?>">
                <h3>
                    <img src="/Public/Home/images/shop.png"/>
                </h3>
                <p>购物车</p>
                <h1><?php if(($_SESSION['shang_home']['num']) < "0"): ?>0<?php else: echo (session('num')); endif; ?></h1>
            </a>
        </li>
        <h5><img src="/Public/Home/images/lineke.png"/></h5>

        <li class="li4">
            <a href="javascript:collect(<?php echo (session('id')); ?>);">
                <img src="/Public/Home/images/heart.png"/>
                <p>我的收藏</p>
            </a>
        </li>
        <li class="li5">
            <a href="<?php echo U('Home/Index/myfoot');?>">
            <img src="/Public/Home/images/zuji.png"/>
            <p>我的足迹</p>
            </a>
        </li>
        <li class="li6">
            <p>
            </p>
        </li>
        <li class="li7">
            <p></p>
        </li>
        <li class="li8">
            <img src="/Public/Home/images/totop.png" class="toTop"/>
            <p>返回顶部</p>
        </li>
    </ul>
</div>
<!-- 侧面导航结束 -->
<script>
    function logout(){
        //询问框
        layer.confirm('您确定要退出当前账户?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Home/User/logout');?>",'',function(res){
                if(res.status=='ok'){
                    location.href="<?php echo U('Home/Index/index');?>";
                }
            });
        });
    }
    function collect(v){
        if(v){
            location.href="<?php echo u('Home/Member/collect');?>";
        }else{
            layer.alert('请先登录',{
                yes:function(){
                    location.href="<?php echo u('Home/User/login');?>";
            }})
        }
    }
</script>
<!-- 底部开始 -->

<!-- bottomNav开始 -->
<div class="bottomNav">
    <div class="bottomNavCont frm_sty">
        <div class="head">
            <ul class="clearfix">
                <li class="li1">行业权威推荐</li>
                <li class="li2">欧洲品牌授权</li>
                <li class="li3">银行战略合作</li>
                <li class="li4">7天无理由退货</li>
                <li class="li5">终身售后服务</li>
            </ul>
        </div>
        <div class="btm clearfix">
            <div class="left fl">
                <ul class="clearfix">
                    <li class="li_big">
                        <ul>新手
                            <li><a href="#">注册新会员</a></li>
                            <li><a href="#">如何订购</a></li>
                            <li><a href="#">正品保障</a></li>
                            <li><a href="#">常见问题</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>支付
                            <li><a href="#">支付方式</a></li>
                            <li><a href="#">分期付款</a></li>
                            <li><a href="#">支付问题</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>配送
                            <li><a href="#">配送方式</a></li>
                            <li><a href="#">包裹签收</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>保障
                            <li><a href="#">服务承诺</a></li>
                            <li><a href="#">价格保护</a></li>
                            <li><a href="#">售后政策</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>帮助
                            <li><a href="#">商务合作</a></li>
                            <li><a href="#">了解我们</a></li>
                            <li><a href="#">人才招聘</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right fr clearfix">
                <p><img src="/Public/Home/images/bottomNav_qrCode.png" alt="" /><br />微信服务号</p>
                <p><img src="/Public/Home/images/bottomNav_qrCode.png" alt="" /><br />商城客户端</p>
            </div>
        </div>
    </div>
</div>
<!-- bottomNav结束 -->
<!-- bottom开始 -->
<div class="bottom">
    <div class="bottomCont frm_sty">
        <p>Copyright © 2008-2016 vip.com，All Rights Reserved 豫ICP备08114786号 ICP经营许可证：豫B7-20090329 网络文化经营许可证：豫网文〔2016〕1601-110 </p>
        <p>使用本网站即表示接受可俪用户协议。版权所有 河南可俪化妆品有限责任公司</p>
        <img src="/Public/Home/images/index_bottom.jpg" alt="" />
    </div>
</div>
<!-- bottom结束 -->

</body>
<script>
    //去付款

    //退货
    function back(oid){
        $.get("<?php echo U('Home/Member/back');?>",{'oid':oid}, function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes:function(){
                        location.href="<?php echo U('Home/Member/order');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })}
    //去签收订单
    function sign(oid){
        //alert(oid);
        $.get("<?php echo U('Home/Member/sign');?>",{'oid':oid}, function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes:function(){
                        location.href="<?php echo U('Home/Member/order');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })
    }
    //删除
    function del(oid) {
        //alert($('#form').serialize());
        layer.confirm('您是真的要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Home//Member/delor');?>", {'oid':oid}, function (res) {
                if (res.status == 'ok') {
                    layer.alert(res.msg, {
                        yes: function () {
                            location.href = "<?php echo U('Home/Member/order');?>";
                        }
                    });
                } else {
                    layer.alert(res.msg);
                }
            })
        })}


//去评论
    function comment(oid,gid){
        layer.open({
            type: 2,
            skin: 'demo-class',
            title: '',
            shadeClose: true,
            shade: 0.8,
            area: ['850px', '50%'],
            content: "<?php echo U('comment');?>?gid="+gid+"&oid="+oid//调用方法
        });
    }
</script>
</html>