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
    #orderPage{width: 400px;height: 50px; float: right}
    #orderPage span{display:inline-block;width:30px;height:30px;margin-left:10px;background-color:#D86C01;text-align:center;margin-top:10px;line-height:30px;font-size:10px;}
    #orderPage a{display:inline-block;width:30px;height:30px;margin-left:10px;background-color:#D86C01;text-align:center;margin-top:10px;line-height:30px;}
</style>

<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
    <div class="m_content">
        <style>
    body{ margin:0; padding:0; font-size:12px; font-family:"Microsoft YaHei"; line-height:25px; color:#555555;}
    div,table{ margin:0 auto;}
    a{ color:#555555; text-decoration:none; cursor:pointer;}
    a:hover{ color:#ff4e00; text-decoration:none; cursor:pointer;}
    img{border:0;}
    .i_bg{ width:100%; min-width:1200px; overflow:hidden;}
    .bg_color{background-color:#f6f6f6;}
    .m_content{width:1210px; overflow:hidden; margin-top:20px;}
    .m_left{width:211px; overflow:hidden; padding:5px; float:left;}
    .left_n{height:35px; line-height:35px; overflow:hidden; background:url(/Public/Home/images/sp/m_t.png) no-repeat 31px center; background-color:#090909; color:#FFF; font-size:14px; text-indent:68px; margin-bottom:10px;}
    .left_m{overflow:hidden; background-color:#FFF; padding-bottom:20px; margin-bottom:10px; -webkit-box-shadow:0 0 5px #e0e0e0; -moz-box-shadow:0 0 5px #e0e0e0; box-shadow:0 0 5px #e0e0e0;}
    .left_m_t{height:35px; line-height:35px; overflow:hidden; color:#3e3e3e; font-size:14px; text-indent:68px; margin-bottom:10px; border-bottom:1px solid #e2e2e2;}
    .t_bg1{background:url(/Public/Home/images/sp/m_i_1.png) no-repeat 31px center;}
    .t_bg2{background:url(/Public/Home/images/sp/m_i_2.png) no-repeat 31px center;}
    .t_bg3{background:url(/Public/Home/images/sp/m_i_3.png) no-repeat 31px center;}
    .t_bg4{ background:url(/Public/Home/images/sp/m_i_4.png) no-repeat 31px center;}
    .left_m ul li{height:28px; line-height:28px; overflow:hidden; color:#3e3e3e; text-indent:68px;}
    .left_m ul li a{color:#3e3e3e;}
    .left_m ul li a:hover, .left_m ul li a.now{ color:#ff4e00;}
    .m_right{width:970px; height:auto !important; min-height:737px; height:737px; background-color:#FFF; float:right; display:inline; margin:5px; padding-bottom:50px; -webkit-box-shadow:0 0 5px #e0e0e0; -moz-box-shadow:0 0 5px #e0e0e0; box-shadow:0 0 5px #e0e0e0;}
    .m_des{overflow:hidden; margin-top:45px; padding-bottom:30px; margin-bottom:20px; border-bottom:1px dotted #b6b6b6;}
    .m_user{ height:20px; line-height:20px; overflow:hidden; color:#3e3e3e; font-size:14px; font-weight:bold; }
    .m_notice{ height:35px; line-height:35px; overflow:hidden; background:url(/Public/Home/images/sp/n_not.png) no-repeat left center; padding-left:32px;}
    .mem_t{ width:870px; height:50px; line-height:50px; overflow:hidden; color:#333333; font-size:16px;}
    .mem_tit{ width:930px; height:50px; line-height:50px; overflow:hidden; color:#333333; font-size:16px; }
</style>
    <!--Begin 用户中心 Begin -->
        <div class="m_left">
            <div class="left_n">管理中心</div>
            <div class="left_m">
                <div class="left_m_t t_bg2">会员中心</div>
                <ul>
                    <li><a href="<?php echo U('Personal/memberInfo');?>">用户信息</a></li>
                    <li><a href="<?php echo U('Personal/memberLevel');?>">会员等级</a></li>
                    <li><a href="<?php echo U('Personal/collection');?>">我的收藏</a></li>
                    <li><a href="<?php echo U('Personal/foot');?>">我的足迹</a></li>
                    <li><a href="<?php echo U('Personal/auction');?>">我的拍卖</a></li>
                    <li><a href="<?php echo U('Personal/point');?>">我的积分</a></li>
                    <li><a href="<?php echo U('Personal/comment');?>">我的评论</a></li>
                    <li><a href="<?php echo U('personal/draw');?>">幸运抽奖</a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg1">订单中心</div>
                <ul>
                    <li><a href="<?php echo U('Home/Personal/order');?>">我的订单</a></li>
                    <li><a href="<?php echo U('Home/Personal/address');?>">收货地址</a></li>
                </ul>
            </div>

            <div class="left_m">
                <div class="left_m_t t_bg4">购物中心</div>
                <ul>
                    <li><a href="<?php echo U('Personal/myCart');?>">购物车</a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg4">我的信息</div>
                <ul>
                    <li><a href="<?php echo U('Message/notRead');?>">未读信息<font color="red">(<?php echo (session('num1')); ?>)</font></a></li>
                    <li><a href="<?php echo U('Message/hasRead');?>">已读信息<font color="red">(<?php echo (session('num2')); ?>)</font></a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg3">账户中心</div>
                <ul>
                    <li><a href="<?php echo U('Personal/safety');?>">账户安全</a></li>
                    <li><a href="<?php echo U('Personal/feedback');?>">我的反馈</a></li>
                </ul>
            </div>
        </div>
        </body>
        </html>

        <div class="right_style">
            <div class="info_content">
                <div class="title_Section"><span>订单管理</span></div>
                <div class="Order_Sort">
                    <ul>
                        <li><a href="<?php echo U('Home/Personal/order',array('order_status'=>1));?>"><img src="/Public/Home/images/icon-dingdan1.png"><br>未付款</a></li>
                        <li><a href="<?php echo U('Home/Personal/order',array('order_status'=>2));?>"><img src="/Public/Home/images/delivery.ico"><br>未发货</a></li><a href="#"></a>
                        <li class="noborder" style="width: 220px"><a href="<?php echo U('Home/Personal/order',array('order_status'=>3));?>"><img src="/Public/Home/images/icon-weibiaoti101.png"><br>未签收</a></li>
                        <li><a href="<?php echo U('Home/Personal/order',array('order_status'=>5));?>"><img src="/Public/Home/images/icon-dingdan.png"><br>已完成</a></li>
                    </ul>
                </div>
                <div class="Order_form_list">
                    <table>
                        <thead>
                        <tr><td class="list_name_title0">商品</td>
                            <td class="list_name_title1">商品单价(元)</td>
                            <td class="list_name_title2">购买数量</td>
                            <td class="list_name_title4">订单总价(元)</td>
                            <td class="list_name_title5">订单状态</td>
                            <td class="list_name_title6">操作</td>
                        </tr></thead>

                        <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$orderVal): $mod = ($i % 2 );++$i;?><tr class="Order_info">
                            <td colspan="6" class="Order_form_time">下单时间：<?php echo date("Y-m-d H:i:s",$orderVal['addtime']);?> | 订单号：<?php echo ($orderVal['order_syn']); ?><em></em></td>
                        </tr>
                        <tr class="Order_Details">
                            <td colspan="3">
                                <table class="Order_product_style">
                                    <tbody>
                                    <?php if(is_array($orderVal['goods'])): $i = 0; $__LIST__ = $orderVal['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsVal): $mod = ($i % 2 );++$i;?><tr>
                                        <td>
                                            <div class="product_name clearfix">
                                                <a href="#" class="product_img"><img src="/Public/Admin/Uploads/goods/<?php echo ($goodsVal['pic']); ?>" width="80px" height="80px"></a>
                                                <a href="3"><?php echo (mb_substr($goodsVal['goodsname'],0,15,'utf-8')); ?></a>
                                                <p class="specification"><?php echo ($goodsVal['introduction']); ?></p>
                                            </div>
                                        </td>
                                        <td><?php echo ($goodsVal['price']); ?></td>
                                        <td><?php echo ($goodsVal['buynum']); ?></td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody></table>
                            </td>
                            <td class="split_line"><?php echo ($goodsVal['order_price']); ?></td>
                            <td class="split_line"><?php echo ($goodsVal['status_name']); ?></td>
                            <td class="operating">
                                <?php if($orderVal['order_status'] == 1): ?><a href="<?php echo U('Home/Order/showlist',array('oid'=>$orderVal['id']));?>"><?php echo ($orderVal['status']['member_opt']); ?></a>
                                    <?php elseif($orderVal['order_status'] == 2): ?>
                                    <span><?php echo ($orderVal['status']['member_opt']); ?></span>
                                    <?php elseif($orderVal['order_status'] == 3): ?>
                                    <a href="javascript:qianshou(<?php echo ($orderVal['id']); ?>)"><?php echo ($orderVal['status']['member_opt']); ?></a>
                                    <?php elseif($orderVal['order_status'] == 4): ?>
                                    <a href="<?php echo U('Personal/comment',array('oid'=>$orderVal['id']));?>"><?php echo ($orderVal['status']['member_opt']); ?></a>
                                    <?php elseif($orderVal['order_status'] == 5): ?>
                                    <span><?php echo ($orderVal['status']['member_opt']); ?></span><?php endif; ?>
                                <a href="javascript:delOrder(<?php echo ($orderVal['id']); ?>)">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                        <!--<tbody>
                        <tr class="Order_info"><td colspan="6" class="Order_form_time">下单时间：2015-12-3 | 订单号：445454654654654<em></em></td></tr>
                        <tr class="Order_Details">
                            <td colspan="3">
                                <table class="Order_product_style">
                                    <tbody><tr>
                                        <td>
                                            <div class="product_name clearfix">
                                                <a href="#" class="product_img"><img src="images/products/p_12.jpg" width="80px" height="80px"></a>
                                                <a href="3">天然绿色多汁香甜无污染水蜜桃</a>
                                                <p class="specification">礼盒装20个/盒</p>
                                            </div>
                                        </td>
                                        <td>5</td>
                                        <td>2</td>
                                    </tr>
                                    </tbody></table>
                            </td>
                            <td class="split_line">100</td>
                            <td class="split_line">已发货，待收货</td>
                            <td class="operating">
                                <a href="#">查看详细</a>
                                <a href="#">删除</a>
                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr class="Order_info"><td colspan="6" class="Order_form_time">下单时间：2015-12-3 | 订单号：445454654654654<em></em></td></tr>
                        <tr class="Order_Details">
                            <td colspan="3">
                                <table class="Order_product_style">
                                    <tbody><tr>
                                        <td>
                                            <div class="product_name clearfix">
                                                <a href="#" class="product_img"><img src="images/products/p_12.jpg" width="80px" height="80px"></a>
                                                <a href="3">天然绿色多汁香甜无污染水蜜桃</a>
                                                <p class="specification">礼盒装20个/盒</p>
                                            </div>
                                        </td>
                                        <td>5</td>
                                        <td>2</td>
                                    </tr>
                                    </tbody></table>
                            </td>
                            <td class="split_line">100</td>
                            <td class="split_line">已发货，待收货</td>
                            <td class="operating">
                                <a href="#">查看详细</a>
                                <a href="#">删除</a>
                            </td>
                        </tr>
                        </tbody>-->
                    </table>
                    <div id="orderPage"><?php echo ($page); ?></div>
                </div>
                <script>jQuery(".Order_form_list").slide({titCell:".Order_info", targetCell:".Order_Details",defaultIndex:1,delayTime:300,trigger:"click",defaultPlay:false,returnDefault:false});</script>
            </div>
        </div>
        </div>
    </div>

<script type="text/javascript">
    //订单删除
    function delOrder(oid){
        layer.confirm("你确定要删除我吗?",{icon:3,btn:['确定','取消']},function(){
            $.get("<?php echo U('Order/delOrder');?>",{id:oid},function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.reload();
                    })
                }else{
                    layer.msg(res.msg,{icon:2,time:1000})
                }
            })
        })
    }
    //订单签收
    function qianshou(oid){
        $.get("<?php echo U('Order/qianshou');?>",{id:oid},function(res){
            if(res.status=="ok"){
                layer.msg(res.msg,{icon:1,time:1000},function(){
                    window.location.reload();
                })
            }else{
                layer.msg(res.msg,{icon:2,time:1000})
            }
        })
    }
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