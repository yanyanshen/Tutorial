<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/Public/Admin/Uploads/minilogo.ico" type="image/x-icon"/>
    <link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/fonts/iconfont.css"  rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/Orders.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/show.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/purebox-metro.css" rel="stylesheet" id="skin">
    <link href="/Public/Home/css/addtocart.css" rel="stylesheet" type="text/css">
    <link href="/Public/Home/css/ordersuccess.css" rel="stylesheet" type="text/css">
    <!--支付-->
    <link rel="shortcut icon" href="/Public/Home/images/bitbug_favicon.icon" />
    <link rel="stylesheet" href="/Public/Home/css/showcart.css" />
    <link rel="stylesheet" href="/Public/Home/css/reset1.css" />
    <!--支付-->
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.reveal.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
    <script src="/Public/Home/js/footer.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/jquery.form.js" type="text/javascript"></script>
    <script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
    <style type="text/css">
        /*.nav_on{ background:#FF7200;color:#ffffff}*/
       .nav_on{ background:#FF7200;color:white;}
    </style>
    <script type="text/javascript">
        $(function(){
            $(".Navigation_name li").removeClass();
            var reg1=/\/Home\/Index\//;
            var reg2=/\/Home\/ProductList\//;
            var reg3=/\/Home\/Sale\//;
            var reg4=/\/Home\/Vote\//;
            var reg5=/\/Home\/Auction\//;
            var reg6=/\/Home\/Integral\//;
            var reg7=/\/Home\/Connect\//;
            var nowurl=document.URL;
            if(reg1.test(nowurl)){
                $('#cplb').addClass("nav_on");
            }else if(reg2.test(nowurl)){
                $('#cplb').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg3.test(nowurl)){
                $('#xsqg').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg4.test(nowurl)){
                $('#tptj').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg5.test(nowurl)){
                $('#pmsc').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg6.test(nowurl)){
                $('#jfdh').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg7.test(nowurl)){
                $('#lxwm').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }
        })

    </script>
    <script type="text/javascript">
        url="<?php echo U('Index/buyCart');?>";
        delurl="<?php echo U('Cart/del');?>";
        pub="/Public";
        //退出
        function logout(){
            layer.confirm("你确定要退出吗？",{icon:3,btn:['确定','取消']},function(){
                $.get("<?php echo U('Home/Member/logout');?>",function(res){
                    if(res.status=="ok"){
                        layer.msg(res.msg,{icon:1,time:1000},function(){
                            window.location.href="<?php echo U('Home/Index/index');?>"
                        })
                    }
                })
            })
        }
        //我的购物车删除
        function del(gid){
            $.get(delurl,{gid:gid},function(res){
                if(res.status=="ok"){
                    $("div.hd_Shopping_list").click();
                }else{
                    layer.msg(res.msg,{icon:2});
                }
            });
        }
        //会员中心判断是否登陆过
        function islogin(){
            var mid=$("#islogin").val();
            if(mid){
                window.location.href="<?php echo U('Home/Personal/showlist');?>";
            }else{
                layer.confirm("登陆后才能进入",{icon:4,btn:['去登陆','算了吧']},function(){
                    window.location.href="<?php echo U('Home/Member/login');?>";
                })
            }
        }
        //我的订单判断是否登陆
        function isorder(){
            var mid=$("#islogin").val();
            if(mid){
                window.location.href="<?php echo U('Home/Personal/order');?>";
            }else{
                layer.confirm("登陆后才能查看",{icon:4,btn:['去登陆','算了吧']},function(){
                    window.location.href="<?php echo U('Home/Member/login');?>";
                })
            }
        }
    </script>

    <title>产品详细页</title>
</head>
<body>

<!--顶部样式-->
<div id="header_top">
    <input type="hidden" value="<?php echo (session('mid')); ?>" id="islogin"/>
    <div id="top">
        <div class="Inside_pages">
            <?php if($_SESSION['shop_']['mid']>= 1): ?><div class="Collection">下午好,<?php echo (session('username')); ?>,欢迎光临锦宏颜！<em></em><a href="#">收藏我们</a></div>
                <?php else: ?>
                <div class="Collection">下午好,欢迎光临锦宏颜！<em></em><a href="#">收藏我们</a></div><?php endif; ?>
            <div class="hd_top_manu clearfix">
                <ul class="clearfix">
                    <!--<li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="#" class="red">[请登录]</a> 新用户<a href="#" class="red">[免费注册]</a></li>-->
                    <?php if($_SESSION['shop_']['mid']>= 1): ?><li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                            欢迎光临本店！<a id="logout" href="javascript:logout()" class="red">[退出]</a>
                        </li>
                        <?php else: ?>
                        <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                            欢迎光临本店！<a href="<?php echo U('Home/Member/login');?>" class="red">[登录]</a>
                            新用户<a href="<?php echo U('Home/Member/register');?>" class="red">[免费注册]</a>
                        </li><?php endif; ?>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="javascript:isorder()">我的订单</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Home/Cart/mycart');?>">购物车</a> </li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Connect/showlist');?>">联系我们</a></li>
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                        <a href="javascript:islogin()" class="red">[会员中心]</a>
                    </li>
                    <li class="hd_menu_tit phone_c" data-addclass="hd_menu_hover"><a href="#" class="hd_menu "><em class="iconfont icon-shouji"></em>手机版</a>
                        <div class="hd_menu_list erweima">
                            <ul>
                                <img src="/Public/Home/images/erweima.jpg"  width="100px" height="100"/>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--顶部样式1-->
    <div id="header"  class="header page_style">
        <div class="logo"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/logo.png" /></a></div>
        <!--结束图层-->
        <div class="Search">
            <!--<p><input name="" type="text"  class="text"/><input name="" type="submit" value="搜 索"  class="Search_btn"/></p>-->
            <form action="<?php echo U('Home/ProductList/searchlist',array('maxprice'=>0,'minprice'=>0));?>" method="get">
                <p>
                    <input name="words" type="text"  value="<?php echo ($cx); ?>" class="text"/>
                    <input name="" type="submit" value="搜 索"  class="Search_btn" />
                </p>
            </form>
            <p class="Words"><a href="<?php echo U('Home/ProductList/catelist',array('path'=>1,'minprice'=>0,'maxprice'=>0));?>">甜品</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>3,'minprice'=>0,'maxprice'=>0));?>">零食</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>5,'minprice'=>0,'maxprice'=>0));?>">水果</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>7,'minprice'=>0,'maxprice'=>0));?>">生鲜蔬菜</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>8,'minprice'=>0,'maxprice'=>0));?>">肉类</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>2,'minprice'=>0,'maxprice'=>0));?>">饮品</a></p>
        </div>
        <!--购物车样式-->
        <div class="hd_Shopping_list" id="Shopping_list">
            <div class="s_cart"><em class="iconfont icon-cart2"></em><a href="#">我的购物车</a>
                <!--<i class="ci-right">&gt;</i>-->
                <!--<i class="ci-count" id="shopping-amount">
                <?php if($_SESSION['shop_']['sum']>= 0): echo (session('sum')); ?>
                    <?php else: ?>
                    0<?php endif; ?>
            </i>-->
            </div>
            <div class="dorpdown-layer">
                <div class="spacer"></div>
                <!--<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>-->
                <ul class="p_s_list">
                </ul>
                <div class="Shopping_style">
                    <div class="p-total">共<b id="totalnum"></b>件商品　共计<strong id="totalprice"></strong></div>
                    <a href="<?php echo U('Home/Cart/myCart');?>" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
                </div>
            </div>
        </div>
    </div>
    <!--菜单导航样式-->
    <div id="Menu" class="clearfix">
        <div class="index_style clearfix">
            <div id="allSortOuterbox" class="display">
                <div class="t_menu_img"></div>
            </div>
            <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail",	});</script>
            <!--菜单栏-->
            <div class="Navigation" id="Navigation">
                <!--<ul class="Navigation_name">-->
                <ul class="Navigation_name">
                    <li id="sy"><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
                    <li id="cplb"><a href="<?php echo U('Home/ProductList/showlist',array('bid'=>0,'minprice'=>0,'maxprice'=>0));?>">产品列表</a></li>
                    <li id="xsqg"><a href="<?php echo U('Home/Sale/showlist');?>">限时抢购</a><em class="hot_icon"></em></li>
                    <li id="tptj"><a href="<?php echo U('Home/Vote/showlist');?>">投票统计</a></li>
                    <li id="pmsc"><a href="<?php echo U('Home/Auction/showlist');?>">拍卖商城</a></li>
                    <li id="jfdh"><a href="<?php echo U('Home/Integral/showlist');?>">积分兑换</a></li>
                    <li id="lxwm"><a href="<?php echo U('Home/Connect/showlist');?>">联系我们</a></li>
                </ul>
            </div>
            <script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>
            <!-- <a href="#" class="link_bg"><img src="/Public/Home/images/link_bg_03.png" /></a>-->
        </div>
    </div>
</div>





<style>
    .pic_inner #div1{width:100%;height:48px;;text-align:center;line-height:48px;font-size:16px;color:#ffffff}
    .pic_inner #div2{width:100%;height:50px;line-height:50px;}
    .pic_inner #div2 span{float:left;width:200px;height:48px;font-size:16px;padding-left:10px;display: inline-block;color:#ffffff}
    .pic_inner #div2 #auction{border-radius:10px;float:left;width:100px;height:30px;text-align:center;
        margin-left:30px;;background-color:white;line-height:30px;margin-top:10px;display: inline-block;
        font-size:16px;color:#FF7200}
    .pic_inner #div2 #auction2{border-radius:10px;float:left;width:100px;height:30px;text-align:center;
        margin-left:30px;;background-color:white;line-height:30px;margin-top:10px;display: inline-block;
        font-size:16px;color:#999;}
    .pic_inner #div2 #auction:hover{background-color:#999;color:#ffffff}
    div.layui-layer-title{color:#FF3333;font-size:24px;}
    /*.layer-anim{box-shadow: 1px 1px 50px #ff6976  }*/
</style>

<div class="limit_style" id="">
    <div id="slideBox" class="slideBox">
        <div class="hd">
            <ul class="smallUl"></ul>
        </div>
        <div class="bd">
            <ul>
                <?php if(is_array($adslist5)): $i = 0; $__LIST__ = $adslist5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/Ads/index');?>" target="_blank"><div style="background:url(/Public/Admin/Uploads/ads/<?php echo ($val["adlogo"]); ?>
) no-repeat rgb(255, 227, 130); background-position:center; width:100%; height:350px;">
                    </div></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <!--<li><a href="#" target="_blank"><div style="background:url(/Public/Home/images/AD/ad-9.jpg) no-repeat rgb(255, 227, 130); background-position:center; width:100%; height:350px;"></div></a></li>
                <li><a href="#" target="_blank"><div style="background:url(/Public/Home/images/AD/ad-9.jpg) no-repeat rgb(255, 227, 130); background-position:center ; width:100%; height:350px;"></div></a></li>
                <li><a href="#" target="_blank"><div style="background:url(/Public/Home/images/AD/ad-9.jpg) no-repeat rgb(226, 155, 197); background-position:center; width:100%; height:350px;"></div></a></li>-->
            </ul>
        </div>
        <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
        <a class="prev" href="javascript:void(0)"></a>
        <a class="next" href="javascript:void(0)"></a>

    </div>
    <script type="text/javascript">
        jQuery("#slideBox").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true});
    </script>
</div>
<div id="ProductMenu" class="sw_categorys_nav">
    <div class="container">
        <div style="line-height:50px;height:50px;font-size:20px;padding-left:40px;color:#FF7200;">
            每个商品最多被十人参与竞价，每个人对同一个商品只有三次竞价的机会
        </div>
    </div>
</div>
<div class="Inside_pages clearfix">
    <!--限时团购-->
    <div class="limit_style Preferential_list">
        <div class="pic_sort clearfix" id="Area">
            <input type="hidden" value="<?php echo (session('mid')); ?>" id="mid">
            <?php if(is_array($auctionInfo)): $k = 0; $__LIST__ = $auctionInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val2): $mod = ($k % 2 );++$k; if($val2['status'] == 0): ?><input class="yjy" type="hidden" value="<?php echo ($val2['endtime']); ?>" id="end<?php echo ($k); ?>"/>
                    <ul class="list">
                        <li id="timer<?php echo ($k); ?>" class="pic_time"></li>
                        <li class="pic_img">
                                <a class="gif"><img style="margin-top:10px;" width="300" height="200" src="/Public/Admin/Uploads/goods/<?php echo ($val2["pic"]); ?>"></a>
                        </li>
                        <li class="pic_inner">
                            <div id="div2">
                                <span>最高价:<b>￥<?php echo ($val2["maxprice"]); ?>&nbsp;RMB</b></span>
                                    <a id="auction2" class="endHome yijiaoyi">已成功交易</a>
                            </div>
                        </li>
                    </ul>
                    <?php else: ?>
                <input type="hidden" value="<?php echo ($val2['starttime']); ?>" id="start<?php echo ($k); ?>"/>
                <input type="hidden" value="<?php echo ($val2['endtime']); ?>" id="end<?php echo ($k); ?>"/>
                <ul class="list">
                    <li id="timer<?php echo ($k); ?>" class="pic_time"></li>
                    <li class="pic_img">
                        <?php if($time >= $val2['endtime']): ?><a class="gif"><img style="margin-top:10px;" width="300" height="200" src="/Public/Admin/Uploads/goods/<?php echo ($val2["pic"]); ?>"></a>
                            <?php else: ?>
                            <a href=""><img style="margin-top:10px;" width="300" height="200" src="/Public/Admin/Uploads/goods/<?php echo ($val2["pic"]); ?>"></a><?php endif; ?>
                        <!--<a class="gif" id="img" href=""><img style="margin-top:10px;" width="300" height="200" src="/Public/Admin/Uploads/goods/<?php echo ($val2["pic"]); ?>"></a>-->
                    </li>
                    <li class="pic_inner">
                        <div id="div2">
                            <span>最高价:<b>￥<?php echo ($val2["maxprice"]); ?>&nbsp;RMB</b></span>
                            <?php if($time >= $val2['endtime']): ?><a id="auction2" class="endHome">拍卖已收场</a>
                                <?php else: ?>
                                <a id="auction" href="javascript:auction(<?php echo ($val2['id']); ?>)">我要竞拍</a><?php endif; ?>
                            <!--<a id="auction" href="javascript:auction(<?php echo ($val2['id']); ?>)">我要竞拍</a>-->
                        </div>
                    </li>
                </ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
<script>
    function auction(id){
        var mid=document.getElementById("mid").value;
        if(mid){
            layer.open({
                type:2,
                title:"我的竞拍",
                skin:'demo-class',
                area:["500px","70%"],
                shadeClose: true,
                shade: 0.8,
                content:"<?php echo U('Auction/auctionDetail');?>?ag_id="+id
            })
        }else{
            layer.confirm("你好，登录后才能竞拍?",{icon:4,btn:['去登陆','算了吧']},function(){
                layer.open({
                    type:2,
                    title:"",
                    skin:'demo-class',
                    area:["480px","56%"],
                    shadeClose: true,
                    shade: 0.8,
                    content:"<?php echo U('Auction/tologin');?>"
                })
            })
        }
    }
</script>
<script>
    $(function(){
        setInterval(changTime, 1000);    //每一秒都循环一次函数
        function changTime(){
            for(i=1;i<=9;i++){document.getElementById("timer"+i).innerHTML = getTime1(i);}
        }
        function getTime1(i) {
            var now = new Date().getTime(); //获取当前的
            var end = ($('#end'+i).val()) * 1000;
            var temp = end - now;
            if (temp <= 0) {
                return "拍卖已收场";
            }
            else {
                var temp2 = new Date();
                temp2.setTime(temp);
                var sec = Math.floor((temp) / 1000 % 60);
                var min = Math.floor(temp / (60 * 1000) % 60);
                var hou = Math.floor(temp / (60 * 60 * 1000) % 24);
                var day = Math.floor(temp / (24 * 60 * 60 * 1000));
                return "剩余时间 "+ day + "天 " + hou + "小时 " + min + "分钟 " + sec + "秒";
            }
        }
        //点击拍完收场动图
        $(".gif").click(function(){
            layer.msg('此拍卖已经结束',{icon:6,time:2000},function(){
                $('.gif img').attr({src:'/Public/Home/images/loading.gif'});
            });
        })
        //点击拍卖已完结
        $(".endHome").click(function(){
            layer.alert('很遗憾,你来晚了,此拍卖已经结束',{icon:6});
        })
        //已交易处理
        var yjy=$(".yijiaoyi").html();
        if(yjy=="已成功交易"){
            $(".yjy").val(0);
        }
    })
</script>

<!--<div class="slogen">
    <div class="index_style">
        <ul class="wrap">
            <li>
                <a href="#"><img src="/Public/Home/images/slogen_34.png" data-bd-imgshare-binded="1"></a>
                <b>安全保证</b>
                <span>多重保障机制 认证商城</span>
            </li>
            <li><a href="#"><img src="/Public/Home/images/slogen_28.png" data-bd-imgshare-binded="2"></a>
                <b>正品保证</b>
                <span>正品行货 放心选购</span>
            </li>
            <li>
                <a href="#"><img src="/Public/Home/images/slogen_30.png" data-bd-imgshare-binded="3"></a>
                <b>七天无理由退换</b>
                <span>七天无理由保障消费权益</span>
            </li>
            <li>
                <a href="#"><img src="/Public/Home/images/slogen_31.png" data-bd-imgshare-binded="4"></a>
                <b>天天低价</b>
                <span>价格更低，质量更可靠</span>
            </li>
        </ul>
    </div>
</div>-->
<!--底部图层-->
<div class="phone_style">
    <div class="index_style">
        <span class="phone_number"><em class="iconfont icon-dianhua"></em>400-4565-345</span><span class="phone_title">客服热线 7X24小时 贴心服务</span>
    </div>
</div>
<div class="footerbox clearfix">
    <div class="clearfix">
        <div class="">
            <dl>
                <dt>售后保障</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>13));?>">&nbsp;售后政策</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>14));?>">&nbsp;价格保护</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>15));?>">&nbsp;退款说明</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>16));?>">&nbsp;取消订单 </a></dd>
            </dl>
            <dl>
                <dt>支付方式</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>17));?>">&nbsp;货到付款</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>18));?>">&nbsp;在线支付</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>19));?>">&nbsp;分期付款</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>20));?>">&nbsp;异常情况</a></dd>
            </dl>
            <dl>
                <dt>新手上路</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>2));?>">&nbsp;交易条款</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>6));?>">&nbsp;售后流程</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>7));?>">&nbsp;购物流程</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>8));?>">&nbsp;隐私说明 </a></dd>
            </dl>
            <dl>
                <dt>特色服务</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>21));?>">&nbsp;次日送达</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>22));?>">&nbsp;送货入库</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>23));?>">&nbsp;无忧退换货</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>24));?>">&nbsp;全国联保</a></dd>
            </dl>
            <dl>
                <dt>配送与支付</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>9));?>">&nbsp;保险需求测试</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>10));?>">&nbsp;专题及活动</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>11));?>">&nbsp;挑选保险产品</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>12));?>">&nbsp;常见问题 </a></dd>
            </dl>
        </div>
    </div>
    <div class="text_link">
        <p>
            <a href="#">关于我们</a>｜ <a href="#">公开信息披露</a>｜ <a href="#">加入我们</a>｜ <a href="#">联系我们</a>｜ <a href="#">版权声明</a>｜ <a href="#">隐私声明</a>｜ <a href="#">网站地图</a></p>
        <p>蜀ICP备11017033号 Copyright ©2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
    </div>
</div>
<!--右侧菜单栏购物车样式-->
<div class="fixedBox">
    <ul class="fixedBoxList">
        <li class="fixeBoxLi user">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="<?php echo U('Personal/showlist');?>">
                    <span class="fixeBoxSpan iconfont icon-yonghu"></span> <strong>用户</strong>
                </a>
                <?php else: ?>
                <a href="<?php echo U('Member/login');?>">
                    <span class="fixeBoxSpan iconfont icon-yonghu"></span> <strong>用户</strong></a><?php endif; ?>
        </li>

        <li class="fixeBoxLi Service "> <span class="fixeBoxSpan iconfont icon-service"></span> <strong>客服</strong>
            <div class="ServiceBox">
                <div class="bjfffs"></div>

                <dl onclick="javascript:;">
                    <dd> <strong style="float: left;top:12px;left: 30px;position: absolute">QQ客服1</strong>
                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=993001867&site=qq&menu=yes">
                            <img border="0" src="http://wpa.qq.com/pa?p=2:993001867:52" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
                    </dd><br><br>
                    <dd> <strong style="float: left;top:52px;left: 30px;position: absolute">QQ客服2</strong>
                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=211663882&site=qq&menu=yes">
                            <img border="0" style="" src="http://wpa.qq.com/pa?p=2:211663882:52" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
                        <!--                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=591813766&site=qq&menu=yes">
                                                    <img border="0" src="http://wpa.qq.com/pa?p=2:591813766:53" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>-->
                    </dd>
                </dl>

            </div>
        </li>
        <li class="fixeBoxLi code cart_bd " style="display:block;" id="cartboxs">
            <span class="fixeBoxSpan iconfont icon-erweima"></span> <strong>微信</strong>
            <div class="cartBox">
                <div class="bjfff"></div>
                <div class="QR_code">
                    <p><img src="/Public/Home/images/two-code.png" width="150px" height="150px" style=" margin-top:10px;" /></p>
                    <span style="color: #000">微信扫一扫，关注我们</span>
                </div>
            </div>
        </li>
        <li class="fixeBoxLi Home">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="<?php echo U('Personal/collection');?>"> <span class="fixeBoxSpan iconfont  icon-shoucang"></span> <strong>收藏</strong> </a>
                <?php else: ?>
                <span class="fixeBoxSpan iconfont  icon-shoucang"></span> <strong>收藏</strong><?php endif; ?>
        </li>
        <li class="fixeBoxLi Home">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="<?php echo U('Personal/foot');?>"> <span class="fixeBoxSpan iconfont  icon-zuji"></span> <strong>足迹</strong> </a>
                <?php else: ?>
                <span class="fixeBoxSpan iconfont  icon-zuji"></span> <strong>足迹</strong><?php endif; ?>
        </li>
        <li class="fixeBoxLi Home">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="#"> <span class="fixeBoxSpan iconfont  icon-fankui"></span> <strong>反馈</strong> </a>
                <?php else: ?>
                <span class="fixeBoxSpan iconfont  icon-fankui"></span> <strong>反馈</strong><?php endif; ?>
        </li>
        <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan iconfont icon-top"></span> <strong>返回顶部</strong> </li>
    </ul>
</div>

</body>
</html>