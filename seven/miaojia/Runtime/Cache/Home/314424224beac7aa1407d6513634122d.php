<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <title>欢迎光临苗家频道！</title>
    <link rel="stylesheet" href="/Public/Home/style/reset.css"/>
    <link rel="stylesheet" href="/Public/Home/style/goodsList.css"/>
    <script type="text/javascript" src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#safe_logout").click(function () {
                $.ajax({
                    type:"GET",
                    url:"<?php echo u('User/logout');?>",
                    success:function(){
                        layer.msg("安全退出",{
                            icon:1,
                            time:1000
                        },function(){
                            location.reload();
                        });
                    }
                })
            });
            $("#gotocart").click(function(){
                <?php if(session('username')?1:0): ?>location.href="<?php echo u('Cart/shopping');?>";
                <?php else: ?>
                layer.confirm('您尚未登录，请登录后进行购物车相关操作!',{
                    btn:['登录','返回']
                },function(){
                    location.href="<?php echo u('User/login');?>";
                },function(){
                    layer.tips('如果您喜欢网站的商品，请点击这里登录后进行操作','#login',{
                        tips: [1, '#3595CC'],
                        time: 5000
                    });
                });<?php endif; ?>
            });
            $(".menu").hide();
            $(".fenlei").mouseenter(function(){
                $(".menu").show();
            })
            $(".fenlei").mouseleave(function(){
                $(".menu").hide();
            })
            $(".menu").mouseenter(function(){
                $(this).show();
            })
            $(".menu").mouseleave(function(){
                $(this).hide();
            })
        })
    </script>
</head>
<body>
<!-- 顶部开始 -->
<div class="header">
    <div class="headerCont frm_sty clearfix">
        <p>欢迎光临<?php echo C('WEB_NAME');?>！</p>
        <p class="tel"><?php echo C('WEB_TEL');?></p>
        <a href="#">帮助中心</a>
        <?php if(session('username')?1:0): ?><a href="javascript:void(0)" id="safe_logout">安全退出</a>&nbsp;&nbsp;<a href="<?php echo u('User/member');?>">会员中心</a>&nbsp;&nbsp;<a href="<?php echo u('User/member');?>">用户名:<?php echo (session('username')); ?></a>
            <?php else: ?>
            <a href="<?php echo u('User/register');?>">注册</a>
            <a href="<?php echo u('User/login');?>" id="login">登录</a><?php endif; ?>
    </div>
</div>
<!-- 导航搜索栏 -->
<div class="search">
    <div class="searchCont frm_sty clearfix">
        <!-- 标志搜索栏开始 -->
        <h1 class="fl"><a href="<?php echo u('Home/Index/index');?>"><img src="/Public/Home/images/logo.png" alt=""></a></h1>
        <div class="bd fl">
            <form action="<?php echo u('Goods/goodsList');?>" method="post" id="searchForm">
                <select class="op">
                    <option value="商品">商品</option>
                    <!--<option value="店铺">店铺</option>-->
                </select>
                <input name="goodsname" type="text" class="msg" placeholder="搜索商品名称" value="<?php echo ($goodsname); ?>">
                <!-- <input class="btn" type="submit" value="搜索"/> -->
            </form>
            <a href="#" class="btn fl" id="goodsSearch">搜索</a><!--
            <p class="msg1">
                <a href="#">干笋 |</a>
                <a href="#">腊肉 |</a>
                <a href="#">银耳环 |</a>
                <a href="#">糯米糕</a>
            </p>-->
        </div>
        <div class="buy clearfix">
            <span class="fl">1</span>
            <a class="fl" href="javascript:void (0);" id="gotocart">购物车(<?php echo ($cartCount); ?>)</a>
            <!-- <p class="fl"></p> -->
        </div>
    </div>
    <div class="nav">
        <div class="navCont frm_sty">
            <div class="classify fl">
                <div class="fenlei">
                    <h2>全部商品分类</h2>
                    <img class="xiala" src="/Public/Home/images/xiala.png" alt="">
                </div>
                <div class="menu">
                    <?php if(is_array($firstCate)): $i = 0; $__LIST__ = array_slice($firstCate,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="menu1">
                            <h4><?php echo (mb_substr($vo["catename"],0,10,'UTF-8')); ?></h4>
                            <?php if(is_array($vo['second'])): $i = 0; $__LIST__ = array_slice($vo['second'],0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo1['id']));?>"><?php echo (mb_substr($vo1["catename"],0,3,'UTF-8')); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="submenu">
                                <h4><?php echo ($vo["catename"]); ?></h4>
                                <?php if(is_array($vo['second'])): $i = 0; $__LIST__ = array_slice($vo['second'],0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><p><?php echo ($vo1["catename"]); ?></p>
                                    <?php if(is_array($vo1['third'])): $i = 0; $__LIST__ = array_slice($vo1['third'],0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo2['id']));?>"><?php echo ($vo2["catename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                <!--<img src="/Public/Home/images/menu1.jpg" alt=""/>
                                <img src="/Public/Home/images/menu1.jpg" alt=""/>
                                <img src="/Public/Home/images/menu1.jpg" alt=""/>-->
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <ul class="topNav clearfix">
                <li><a href="<?php echo u('Index/index');?>">首页</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>1));?>">生鲜</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>2));?>">食品饮料</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>3));?>">酒类</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>4));?>">地方特产</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>5));?>">全球购美食</a></li>
            </ul>
        </div>

    </div>
</div>

<script type="text/javascript">
    $("#goodsSearch").click(function(){
        if($("input[name=goodsname]").val().length<1){
            layer.msg("搜索商品名称不能为空");
        }else{
            $("#searchForm").submit();
        }
    })

</script>
<div class="name frm_sty clearfix">
    <p class="p1"><?php echo ($catePath); ?></p>
    <i></i>
</div>

    <div class="list1 frm_sty " id="f22">
        <div class="tab clearfix">
            <ul class="tab1Cont clearfix">
                    <?php if(is_array($goodsList)): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "对不起,暂时没有此类商品" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list12">
                            <div class="two">
                                <img class="img2" src="/upload/n1/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>" width="350" height="350">
                                <div class="msg3" onclick="window.location.href='<?php echo u('Goods/detail',array('id'=>$vo['id']));?>'">
                                    <span class="bt1"><?php echo ($vo["goodsname"]); ?></span>
                                    <h5 class="fl"><span>本站价:￥</span><?php echo ($vo["siteprice"]); ?></h5>
                                    <div class="border1"></div>
                                    <div class="border2"></div>
                                </div>
                            </div>
                        </li><?php endforeach; endif; else: echo "对不起,暂时没有此类商品" ;endif; ?>
            </ul>
            <?php echo ($page); ?>
        </div>
    </div>


<div class="footer">
    <div class="footer_cont frm_sty">
        <div class="service">
            <ul>
                <li class="ser1">
                    <span></span>
                    <h4><a href="#">正品保证</a></h4>
                    <p>正品保障，提供发票</p>
                </li>
                <li class="ser2">
                    <span></span>
                    <h4><a href="#">急速物流</a></h4>
                    <p>急速物流，急速送达</p>
                </li>
                <li class="ser3">
                    <span></span>
                    <h4><a href="#">无忧售后</a></h4>
                    <p>7天无理由退换货</p>
                </li>
                <li class="ser4">
                    <span></span>
                    <h4><a href="#">帮助中心</a></h4>
                    <p>您的购物指南</p>
                </li>
            </ul>
        </div>
        <div class="guild clearfix">
            <ul class="guild01 clearfix">
                <li class="strong"><a href="#">购物指南</a></li>
                <li><a href="#">导购指标</a></li>
                <li><a href="#">免费注册</a></li>
                <li><a href="#">会员等级</a></li>
                <li><a href="#">常见问题</a></li>
                <li><a href="#">品牌大全</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">支付方式</a></li>
                <li><a href="#">易付定支会付</a></li>
                <li><a href="#">网银注册</a></li>
                <li><a href="#">快捷支付</a></li>
                <li><a href="#">分期付款</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">物流配送</a></li>
                <li><a href="#">免运费政策</a></li>
                <li><a href="#">配送服务承诺</a></li>
                <li><a href="#">签收验货</a></li>
                <li><a href="#">物流查询</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">售后服务</a></li>
                <li><a href="#">退换货政策</a></li>
                <li><a href="#">退换货流程</a></li>
                <li><a href="#">退款说明</a></li>
                <li><a href="#">退换货申请</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">商家服务</a></li>
                <li><a href="#">商家入驻</a></li>
                <li><a href="#">培训中心</a></li>
                <li><a href="#">信息公告</a></li>
                <li><a href="#">广告服务</a></li>
                <li><a href="#">商家帮助</a></li>
                <li><a href="#">服务市场</a></li>
            </ul>
            <div class="weixin fr">
                <p>苗家频道客户端</p>
                <img src="/Public/Home/images/erweima.jpg">
            </div>

        </div>
    </div>
    <div class="footer_b">
        <p>Copyright © 2016-2028 <?php echo C('WEB_NAME');?>版权所有 <?php echo C('WEB_ICP');?></p>

    </div>
</div>
<!-- 右导航 -->
<div class="rightNav">
    <div class="right">
        <ul class="rightCont">
            <li class="wo">
                <a class="me" href="../User/member.html"><p class="p1">1</p></a>
                <div class="woCont">
                    <div class="wo1">
                        <img src="/upload/UserPic/small/<?php echo ((isset($meminfo["pic"]) && ($meminfo["pic"] !== ""))?($meminfo["pic"]):'default.jpg'); ?>" alt="头像" width="100" height="100">
                        <p>你好！亲爱的<?php echo ((isset($meminfo["nickname"]) && ($meminfo["nickname"] !== ""))?($meminfo["nickname"]):$meminfo.username); ?></p>
                    </div>
                    <ul class="wo2">
                        <li><img src="/Public/Home/images/dingdan.png" alt=""><a href="<?php echo u('User/member');?>">我的订单</a></li>
                        <li><img src="/Public/Home/images/xiaoxi.png" alt=""><a href="<?php echo u('User/meminfo');?>">个人信息</a></li>
                    </ul>
                </div>
            </li>

            <li class="sc">
                <a class="me" href="<?php echo u('User/goodsScList');?>"><p class="p1">1</p></a>
                <p class="sc1">我的收藏</p>
            </li>
            <li class="gwc">
                <a class="me" href="<?php echo u('Cart/shopping');?>"><p class="p1">1</p></a>
                <p>购<br/>物<br/>车<br/></p>
            </li>
            <li class="kf">
                <a class="me" href="javascript:void (0)"><p class="p1">1</p></a>
                <p class="kf1">客服服务</p>
            </li>

            <li class="toTop"></li>
        </ul>
    </div>
</div>