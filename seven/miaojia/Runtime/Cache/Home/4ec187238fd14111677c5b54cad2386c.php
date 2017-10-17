<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>我的订单</title>
    <link rel="stylesheet" href="/Public/Home/style/order.css">
    <link rel="stylesheet" href="/Public/Home/style/swiper.min.css">
    <link rel="stylesheet" href="/Public/Home/style/reset.css">
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer.js"></script>
    <script src="/Public/Home/js/order.js"></script>
    <script src="/Public/Home/js/reset.js"></script>
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
            //付款操作
            $(".toPay").click(function(){
                var orderid=$("#ordersyn").text();
                layer.confirm('确认付款吗?',{
                    btn:['确认','取消']
                },function(){
                    $.ajax({
                        type:"get",
                        url:"<?php echo u('Order/payOver');?>",
                        data:"ordersyn="+orderid,
                        success:function(res){
                            if(res=='订单支付完成'){
                                layer.msg(res,{
                                    icon:6,
                                    time:3000
                                },function(){
                                    location.reload();
                                })
                            }else{
                                layer.msg(res,{
                                    icon:5,
                                    time:3000
                                },function(){
                                    location.reload();
                                })
                            }
                        }
                    })
                },function(){
                    layer.msg('您取消了付款');
                })
            });

            //确认完成操作

            $(".confirmSh").click(function(){
                var orderid=$("#ordersyn").text();
                layer.confirm("请确认您已收到物品!确认后,您的钱将立即打给卖家!",{
                    btn:['确认','取消']
                },function(){
                    layer.prompt({
                        title:"请输入您的密码进行确认收货操作!",
                        formType:1
                    },function(val){
                        $.ajax({
                            type:"post",
                            url:"<?php echo u('confirmSh');?>",
                            data:"ordersyn="+orderid+"&passwd="+val,
                            success:function(data){
                                if(data=='确认收货成功'){
                                    layer.msg(data,{
                                        icon:1,
                                        time:3000
                                    },function(){
                                        location.reload();
                                    })
                                }else{
                                    layer.msg(data,{
                                        icon:2,
                                        time:3000
                                    },function(){
                                        location.reload();
                                    })
                                }
                            }
                        })
                    })
                })
            });

            $(".toPj").click(function(){
                var me=$(this);
                layer.prompt({
                    formType: 2,
                    value: '',
                    title: '感谢您的评价'
                }, function(value, index, elem){
                    $.ajax({
                        type:"post",
                        url:"<?php echo u('toPj');?>",
                        data:"gid="+me.attr('rel')+"&pjintro="+value+"&goodsargs="+me.attr('mall')+"&orderid="+me.attr('orderid'),
                        success:function(data){
                            if(data=='评价成功'){
                                layer.msg(data,{icon:6,time:2000},function(){
                                    location.reload();
                                })
                                layer.close(index);
                            }else if(data=='评价成功,10字以上评价可以获得10积分,所得积分已存入您的个人积分账户'){
                                layer.msg(data,{icon:6,time:2000},function(){
                                    location.reload();
                                })
                                layer.close(index);
                            }else{
                                layer.msg(data,{icon:5,time:2000},function(){
                                    location.reload();
                                })
                                layer.close(index);
                            }
                        }
                    })
                });

            })
        })
    </script>
</head>
<body>
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
<!-- 我的订单开始 myorder-->
<!-- 左侧边栏开始 -->
<div class="myorder frm_sty clearfix">
    <div class="sidebar fl">
        <p style="background:url('/upload/UserPic/small/<?php echo ((isset($meminfo["pic"]) && ($meminfo["pic"] !== ""))?($meminfo["pic"]):'default.jpg'); ?>') no-repeat 10px 9px;"><?php echo (session('username')); ?></p>
        <a href="<?php echo u('User/member');?>">会员中心</a>
        <a class="no" href="<?php echo u('User/order');?>">我的订单</a>
        <a href="<?php echo u('User/goodsScList');?>">商品收藏</a>
        <a href="<?php echo u('User/myscore');?>">我的积分</a>
        <a href="<?php echo u('User/meminfo');?>">个人信息</a>
        <a href="<?php echo u('User/addressList');?>">收货地址</a>
        <a href="#">在线客服</a>
    </div>
<!-- 左侧边栏结束 -->
    <div class="order fl">
        <h4>我的订单</h4>
        <div class="orderCont">
            <ul class="ul1 clearfix">
                <li class="font_c"><a href="<?php echo u('order');?>">全部订单</a></li>
                <li><a href="<?php echo u('order',array('s'=>1));?>">待付款</a></li>
                <li><a href="<?php echo u('order',array('s'=>3));?>">待收货</a></li>
                <li><a href="<?php echo u('order',array('s'=>4));?>">待评价</a></li>
                <li><a href="<?php echo u('order',array('s'=>5));?>">已完成</a></li>
            </ul>
            <div class="orderCont01 clearfix">
                <ul class="clearfix">
                    <li class="or_li1"><a href="#">全部订单</a></li>
                    <li class="or_li2"><a href="#">订单详情</a></li>
                    <li class="or_li4"><a href="#">金额</a></li>
                    <li class="or_li5"><a href="#">状态</a></li>

                </ul>
            </div>
            <?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="orderCont02">
                    <p><?php echo (date('Y-m-d H:i:s',$vo["createtime"])); ?><span class="span2">订单号：<span id="ordersyn"><?php echo ($vo["ordersyn"]); ?></span></span><span class="span2">
                        <?php switch($vo["orderstatus"]): case "1": ?><a href="javascript:void(0)" class="toPay">未付款</a><?php break;?>
                            <?php case "2": ?><span style="color: #ff0000;">等待发货</span><?php break;?>
                            <?php case "3": ?><span style="color: #ff0000;">物流公司:<?php echo ($vo["logisticsname"]); ?>,物流订单号:<?php echo ($vo["logisticsinfo"]); ?>&nbsp;&nbsp;&nbsp;<a href="http://www.kuaidi100.com/" target="_blank">点此查询快递信息</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="confirmSh">等待确认收货</a></span><?php break;?>
                            <?php case "4": ?><span style="color: #ff0000;">待评价</span><?php break;?>
                            <?php case "5": ?><span style="color: #008855;">已评价</span><?php break; endswitch;?>
                    </span> </p>
                    <?php if(is_array($vo["ordergoods"])): $i = 0; $__LIST__ = $vo["ordergoods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><ul class="clearfix">
                            <li class="or_li11"><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo1["image"]) && ($vo1["image"] !== ""))?($vo1["image"]):'default.jpg'))); ?>"></li>
                            <li class="or_li22"><a href="<?php echo u('Goods/detail',array('id'=>$vo1['id']));?>" target="_blank"><?php echo (mb_substr($vo1["goodsname"],'0','30','utf-8')); ?>(<?php echo ($vo1["ordergoodsargs"]); ?>)</a></li>
                            <li class="or_li33">×<?php echo ($vo1["buynum"]); ?></li>
                            <li class="or_li44">总额￥<?php echo ($vo1['buynum']*$vo1['siteprice']); ?></li>
                            <?php switch($vo["orderstatus"]): case "4": ?><li class="or_li55"><?php if(($vo1["isPj"]) == "1"): ?>已评价<?php else: ?><a href="javascript:void (0)" rel="<?php echo ($vo1["id"]); ?>" class="toPj" mall="<?php echo ($vo1["ordergoodsargs"]); ?>" orderid="<?php echo ($vo["id"]); ?>">去评价</a><?php endif; ?></li><?php break; endswitch;?>
                        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php echo ($page); ?>
        </div>
    </div>
   
    
</div>
 <!-- hot样式开始 -->
 <div class="hit frm_sty ">
        <h4>热销商品</h4>
       <div class="swiper-container swiper1 gold-banner">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hitCont clearfix">
                        <ul class="clearfix">
                            <li class="hit_li1">
                               <p class="hit_p1">苗家频道特色美食</p>
                               <img src="/Public/Home/images/hit_1.jpg" class="img_01"></li>
                            <li class="hit_li2"><p class="hit_p2">苗家频道特色美食</p><img src="/Public/Home/images/hit_2.jpg" class="img_02"></li>
                            <li class="hit_li3"><p class="hit_p3">苗家频道特色美食</p><img src="/Public/Home/images/hit_3.jpg" class="img_03"></li>
                            <li class="hit_li4"><p class="hit_p4">苗家频道特色美食</p><img src="/Public/Home/images/hit_4.jpg" class="img_04"></li>
                            <li class="hit_li5"><p class="hit_p5">苗家频道特色美食</p><img src="/Public/Home/images/hit_5.jpg" class="img_05"></li>
                            <li class="hit_li6"><p class="hit_p6">苗家频道特色美食</p><img src="/Public/Home/images/hit_6.jpg" class="img_06"></li>
                        </ul>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hitCont clearfix">
                        <ul class="clearfix">
                            <li class="hit_li1"><p class="hit_p1">苗家频道特色美食</p><img src="/Public/Home/images/hit_1.jpg" class="img_01"></li>
                            <li class="hit_li2"><p class="hit_p2">苗家频道特色美食</p><img src="/Public/Home/images/hit_2.jpg" class="img_02"></li>
                            <li class="hit_li3"><p class="hit_p3">苗家频道特色美食</p><img src="/Public/Home/images/hit_3.jpg" class="img_03"></li>
                            <li class="hit_li4"><p class="hit_p4">苗家频道特色美食</p><img src="/Public/Home/images/hit_4.jpg" class="img_04"></li>
                            <li class="hit_li5"><p class="hit_p5">苗家频道特色美食</p><img src="/Public/Home/images/hit_5.jpg" class="img_05"></li>
                            <li class="hit_li6"><p class="hit_p6">苗家频道特色美食</p><img src="/Public/Home/images/hit_6.jpg" class="img_06"></li>
                        </ul>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hitCont clearfix">
                        <ul class="clearfix">
                            <li class="hit_li1"><p class="hit_p1">苗家频道特色美食</p><img src="/Public/Home/images/hit_1.jpg" class="img_01"></li>
                            <li class="hit_li2"><p class="hit_p2">苗家频道特色美食</p><img src="/Public/Home/images/hit_2.jpg" class="img_02"></li>
                            <li class="hit_li3"><p class="hit_p3">苗家频道特色美食</p><img src="/Public/Home/images/hit_3.jpg" class="img_03"></li>
                            <li class="hit_li4"><p class="hit_p4">苗家频道特色美食</p><img src="/Public/Home/images/hit_4.jpg" class="img_04"></li>
                            <li class="hit_li5"><p class="hit_p5">苗家频道特色美食</p><img src="/Public/Home/images/hit_5.jpg" class="img_05"></li>
                            <li class="hit_li6"><p class="hit_p6">苗家频道特色美食</p><img src="/Public/Home/images/hit_6.jpg" class="img_06"></li>
                        </ul>
                    </div>
                </div>
            
        </div>
        <!-- 如果需要分页 -->
        <div class="swiper-pagination"></div>
        <!-- 如果需要导航按钮 -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- 左右箭头 -->
        <div class="swiper-button-prev swiper-button-white"></div>
        <div class="swiper-button-next swiper-button-white"></div>
    </div>
     <!-- Swiper JS -->
    <script src="/Public/Home/js/swiper.min.js"></script>

    <script>        
    var swiper1 = new Swiper('.swiper1', {
        pagination: '.swiper-pagination1',
        paginationClickable: true,
        // 左右箭头js
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        parallax: true,
        loop:true,
    });
    </script>
</div>

    <script src="/Public/Home/js/swiper.min.js"></script>

<!-- 底部样式开始 -->
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






    
</body>
</html>