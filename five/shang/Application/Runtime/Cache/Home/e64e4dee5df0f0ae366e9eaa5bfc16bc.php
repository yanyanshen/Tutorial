<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="/five/shang/Public/Home/style/public.css">
	<link rel="stylesheet" type="text/css" href="/five/shang/Public/Home/style/index.css">
	<link rel="stylesheet" type="text/css" href="/five/shang/Public/Home/style/detail.css">
    <link rel="stylesheet" href="/five/shang/Public/Home/style/headerAndFooter.css" />
    <link rel="stylesheet" href="/five/shang/Public/Home/style/reset.css" />
	<link rel="stylesheet" type="text/css" href="/five/shang/Public/Home/style/jquery.jqzoom.css">
	<script type="text/javascript" src="/five/shang/Public/Home/js/jQuery.1.8.2.min.js"></script>
    <script src="/five/shang/Public/Home/js/layer/layer.js"></script>
</head>
<body>
<!--  头部开始 -->
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
        <h1 class="fl"><img src="/five/shang/Public/Home/images/logo.png" alt="" height="85px"/></h1>
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
        <h1 class="fl"><img src="/five/shang/Public/Home/images/logo.png" height="85px" alt="" /></h1>
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
<!-- 头部结束 -->
    <!-- 用户具体评价开始 -->
    <?php if(is_array($comList)): $k = 0; $__LIST__ = $comList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class="user box" style="margin:0 0 0 300px">
        <ul>
            <li class="li2 ">
                <div class="user_cont clearfix">
                    <div class="clearfix">
                        <div class="user_judge fl">
                            <div class="title">
                                <span class="sp1" style="font-size: 20px;position: relative;left: -150px">序号：<?php echo ($k); ?></span>
                                <span class="sp1" style="font-size: 20px">用户名：<?php echo ($v["username"]); ?></span>
                                <span class="sp1" style="font-size: 20px">评价时间：<?php echo date('Y-m-d H:i:s',$v['time']);?></span>
                            </div>
                            <div class="judgement">
                                <?php echo ($v["message"]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!-- 尾部开始 -->
<!-- footer开始 -->

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
                <p><img src="/five/shang/Public/Home/images/bottomNav_qrCode.png" alt="" /><br />微信服务号</p>
                <p><img src="/five/shang/Public/Home/images/bottomNav_qrCode.png" alt="" /><br />商城客户端</p>
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
        <img src="/five/shang/Public/Home/images/index_bottom.jpg" alt="" />
    </div>
</div>
<!-- bottom结束 -->
<!-- footer结束 -->
<!-- 侧面导航开始 -->
<!-- 侧面导航开始 -->
<div class="rightNav">
    <ul>
        <li class="li1"><img src="/five/shang/Public/Home/images/user.png"/>
            <ul>
                <li>
                    <h1><img src="/five/shang/Public/Home/images/quxiao.png" alt="" /></h1>
                    <h2><img src="/five/shang/Public/Home/images/nvhai.png"/></h2>
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
        <h4><img src="/five/shang/Public/Home/images/lineke.png"/></h4>

        <li class="li2">
            <a href="<?php echo U('Home/Mycar/mycar');?>">
                <h3>
                    <img src="/five/shang/Public/Home/images/shop.png"/>
                </h3>
                <p>购物车</p>
                <h1><?php if(($_SESSION['shang_home']['num']) < "0"): ?>0<?php else: echo (session('num')); endif; ?></h1>
            </a>
        </li>
        <h5><img src="/five/shang/Public/Home/images/lineke.png"/></h5>

        <li class="li4">
<<<<<<< .mine
            <img src=""/>
=======
            <a href="<?php echo u('Home/Member/collect');?>">
                <img src="/five/shang/Public/Home/images/heart.png"/>
                <p>我的收藏</p>
            </a>
>>>>>>> .r221
        </li>

        <li class="li5">
<<<<<<< .mine
            <img src=""/>
=======
            <a href="<?php echo U('Home/Index/myfoot');?>">
            <img src="/five/shang/Public/Home/images/zuji.png"/>
            <p>我的足迹</p>
>>>>>>> .r221
            </a>
        </li>
        <li class="li6">
            <img src=""/>
            <p>
                <img src=""/>
            </p>
        </li>
        <li class="li7">
            <img src=""/>
        </li>
        <li class="li8">
            <img src="/five/shang/Public/Home/images/totop.png" class="toTop"/>
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
</script>
<!-- 侧面导航结束 -->
<!-- 尾部结束 -->
</body>
<script type="text/javascript">
    var area=document.getElementById('area');
    area.onkeydown=function(event){
        var e=event||window.event;
        area.style.backgroundColor="#eee";
        var maxNum=area.value.length;
        var h1=document.getElementById('maxNum');
        h1.innerHTML='最多<span style="color: red">150</span>个字，还剩<span style="color: red">'+(149-maxNum)+'</span>个字';
        if(maxNum>148){
            area.readOnly=true;
            //防止按退格键返回上个网页
                if (e.keyCode == 8) {  //alert(document.activeElement.type);
                    if (document.activeElement.type.toLowerCase() == "textarea" || document.activeElement.type.toLowerCase() == "text") {
                        if (document.activeElement.readOnly == false)
                            return true;
                    }
                    return false;
                }
            }
    }
</script>
</html>