<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>购物车页面</title>
    <link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/css/shop_gouwuche.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-1.8.2.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
    <!-- <script type="text/javascript" src="/Public/Home/js/jquery.goodnums.js" ></script>
     <script type="text/javascript" src="/Public/Home/js/shop_gouwuche.js" ></script>-->
    <style>
        #buy{
            height:80px;
            text-align: right;
            font-size: 16px;
        }
        #buy b{
            font-weight: bold;
            font-size: 24px;
            color:red;
        }
        #buy a{
            display: inline-block;
            width: 100px;
            height:30px;
            line-height:30px;
            text-align: center;
            color:white;
            font-size: 20px;
            font-weight: bold;
            border-radius:8px;
            padding: 5px 10px;
            cursor: pointer;

        }
        #buy .tobuy{
            background: #f27102;
            color:#fff;
            margin:0 50px;
        }
        #buy .tobuy:hover{
            background: #ff0000;

        }
    </style>
</head>
<body>
<!-- Header  -wll-2013/03/24 -->

<script>

    window.onscroll = function(){
        var ht=document.documentElement.scrollTop || document.body.scrollTop;
        if(ht>10){$("#daohang").css({"position":"fixed","margin":"auto","right":"0px","left":"0","top":"0","z-index":"999"});}
        else{$("#daohang").css({"position":"relative"});}
    }
</script>
<!-- Header  -wll-2013/03/24 -->
<div class="shop_hd">
    <!-- Header TopNav -->
    <div class="shop_hd_topNav">
        <div class="shop_hd_topNav_all">
            <!-- Header TopNav Left -->
            <div class="shop_hd_topNav_all_left">
                <p>您好<?php echo (session('mname')); ?>，欢迎来到品墨书城
                    <?php if(($_SESSION['pm_home']['mid']) > "0"): ?><a href="javascript:logout();">退出</a>
                        <?php else: ?>
                        [<a href="<?php echo U('Home/Login/login');?>">登录</a>][<a href="<?php echo U('Home/Register/register');?>">注册</a>]<?php endif; ?>
                </p>
            </div>
            <!-- Header TopNav Left End -->

            <!-- Header TopNav Right -->
            <div class="shop_hd_topNav_all_right">
                <ul class="topNav_quick_menu">

                    <li>
                        <div class="topNav_menu">
                            <a href="<?php echo U('Home/MemberCenter/grxx');?>" class="topNavHover">个人中心<i></i></a>
                            <div class="topNav_menu_bd" style="display:none;" >
                                <ul>
                                    <li><a title="已买到的商品" target="_top" href="<?php echo U('Home/MemberCenter/order');?>">已买到的商品</a></li>
                                    <li><a title="个人主页" target="_top" href="<?php echo U('Home/MemberCenter/grxx');?>">个人主页</a></li>
                                    <!-- <li><a title="我的好友" target="_top" href="#">我的好友</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <!--<div class="topNav_menu">
                            <a href="#" class="topNavHover">卖家中心<i></i></a>
                            <div class="topNav_menu_bd" style="display:none;">
                                <ul>
                                  <li><a title="已售出的商品" target="_top" href="#">已售出的商品</a></li>
                                  <li><a title="销售中的商品" target="_top" href="#">销售中的商品</a></li>
                                </ul>
                            </div>
                        </div>-->
                    </li>

                    <li>
                        <div class="topNav_menu">
                            <a href="<?php echo U('Home/Shopcar/addcar');?>" class="topNavHover">购物车(<b style="color:red;"><?php echo ($num); ?></b>)种商品</a>

                        </div>
                    </li>

                    <li>
                        <div class="topNav_menu">
                            <a href="<?php echo U('Home/MemberCenter/favorite');?>" class="topNavHover">我的收藏</a>

                        </div>
                    </li>

                    <li>
                        <div class="topNav_menu">
                            <a href="javascript:help();">帮助中心</a>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- Header TopNav Right End -->
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!-- Header TopNav End -->

    <!-- TopHeader Center -->
    <div class="shop_hd_header">
        <div class="shop_hd_header_logo">

            <?php if(is_array($list6)): $i = 0; $__LIST__ = $list6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><h1 class="logo"><a href=""><img src="/Uploads/<?php echo ($value["adpic"]); ?>" alt="" width="250px" height="80px"/></a><span>1234</span></h1><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="shop_hd_header_search">
            <ul class="shop_hd_header_search_tab">
                <li id="search" style="visibility: hidden" class="current"></li>

            </ul>
            <div class="clear"></div>
            <div class="search_form">
                <form method="get" action="<?php echo U('Home/Search/search');?>">
                    <div class="search_formstyle">
                        <input type="text" class="search_form_text" name="keywords" value="<?php echo ($keywords); ?>" placeholder="搜索其实很简单！" />
                        <input type="submit" class="search_form_sub" name="secrch_submit" value="" title="搜索" />
                    </div>
                </form>
            </div>
            <div class="clear"></div>
            <div class="search_tag">
                <a href="<?php echo U('Home/Search/search',array('keywords'=>'余罪'));?>">余罪</a>
                <a href="<?php echo U('Home/Search/search',array('keywords'=>'时间之间'));?>">时间之间</a>
                <a href="<?php echo U('Home/Search/search',array('keywords'=>'悟空传'));?>">悟空传</a>
                <a href="<?php echo U('Home/Search/search',array('keywords'=>'魔兽'));?>">魔兽</a>
                <a href="<?php echo U('Home/Search/search',array('keywords'=>'历史上的今天'));?>">历史上的今天</a>
            </div>

        </div>
    </div>
    <div class="clear"></div>
    <!-- TopHeader Center End -->

    <!-- Header Menu -->
    <div class="shop_hd_menu" id="daohang">
        <!-- 所有商品菜单 -->

        <div id="shop_hd_menu_all_category" class="shop_hd_menu_all_category"><!-- 首页去掉 id="shop_hd_menu_all_category" 加上clsss shop_hd_menu_hover -->
            <div class="shop_hd_menu_all_category_title"><h2 title="所有商品分类"><a href="javascript:cate();">所有商品分类</a></h2><i></i></div>
            <div id="shop_hd_menu_all_category_hd" class="shop_hd_menu_all_category_hd">
                <ul class="shop_hd_menu_all_category_hd_menu clearfix">
                    <!-- 单个菜单项 -->
                    <!--<li><h3><a href="">品牌推荐</a></h3>
                   <div class="cat_menu clearfix" style="margin-bottom: 0px">
                        <dl class="clearfix">
                    <?php if(is_array($blist)): $i = 0; $__LIST__ = $blist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><dd><img src="/Uploads/<?php echo ($value["pic"]); ?>" width="150px" style="margin:5px "/></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                       </div>
                    <li>-->
                    <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value1): $mod = ($i % 2 );++$i;?><li id="cat_1" class="" style="margin-top: 10px">
                            <h3><a href="<?php echo U('Home/Index/letter',array('cid'=>$value1['cid'],'catename'=>$value1['catename']));?>" title=""><?php echo ($value1["catename"]); ?></a></h3>
                            <div id="cat_1_menu" class="cat_menu clearfix" style="">

                                <?php if(is_array($value1)): $i = 0; $__LIST__ = $value1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value2): $mod = ($i % 2 );++$i; if(is_array($value2)): $i = 0; $__LIST__ = $value2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value3): $mod = ($i % 2 );++$i;?><dl class="clearfix">

                                            <dt><a href="<?php echo U('Home/Search/search2',array('cid'=>$value3['cid'],'catename'=>$value3['catename']));?>"><?php echo ($value3["catename"]); ?></a></dt>

                                            <dd>

                                                <a href=""><?php echo ($value["catename"]); ?></a>



                                            </dd>

                                        </dl><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>

                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <!-- 单个菜单项 End -->
                </ul>
            </div>
        </div>
        <!-- 所有商品菜单 END -->

        <!-- 普通导航菜单 -->
        <ul class="shop_hd_menu_nav">
            <li class="current_link"><a href="<?php echo U('Home/Index/index');?>"><span>首页</span></a></li>
            <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="link"><a href="<?php echo U('Home/Index/letter',array('cid'=>$value['path'],'catename'=>$value['catename']));?>"><span><?php echo ($value["catename"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>


            <!--<li class="link"><a href="<?php echo U('Home/Index/letter',array('pid'=>24));?>"><span>社科频道</span></a></li>
            <li class="link"><a href="<?php echo U('Home/Index/letter',array('pid'=>30));?>"><span>经营频道</span></a></li>
            <li class="link"><a href="<?php echo U('Home/Index/letter',array('pid'=>36));?>"><span>文教频道</span></a></li>
            <li class="link"><a href="<?php echo U('Home/Index/letter',array('pid'=>43));?>"><span>生活频道</span></a></li>
            <li class="link"><a href="<?php echo U('Home/Index/letter',array('pid'=>16));?>"><span>音象</span></a></li>-->

        </ul>
        <!-- 普通导航菜单 End -->
    </div>
    <!-- Header Menu End -->



</div>



</div>
<div class="clear"></div>
<script src="/Public/Home/js/jquery-1.8.2.js"></script>
<script src="/Public/Home/layer/layer.js"></script>
<script>

    function logout() {
        layer.confirm('您是真的要退出吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("<?php echo U('Home/Login/logout');?>", null, function (res) {
                if (res.status == 'ok') {
                    layer.alert(res.msg, {
                        yes:function(){
                            location.href="<?php echo U('Home/Index/index');?>";
                        }
                    });
                }
            })
        })
    }
    function help(){
         //为了layer.ext.js加载完毕再执行
            layer.alert("有任何问题请拨打400-8888888，我们将提供令您满意的解决方案！"
            );

    }

</script>


<!-- Header End -->

<!-- 购物车 Body -->
<div class="shop_gwc_bd clearfix">

    <div class="shop_gwc_bd_contents clearfix">
        <!-- 购物流程导航 -->
        <div class="shop_gwc_bd_contents_lc clearfix">
            <ul>
                <li class="step_a">确认购物清单</li>
                <li class="step_b">确认收货人资料及送货方式</li>
                <li class="step_c " style="background-position:left -500px;">购买完成</li>
            </ul>
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="day_list">
                <tbody id="pageBody">
                <tr>
                    <td colspan="5" id="buy">
                        <span><b id="totalprice">订单已经完成，查看详情，请前往个人中心。</b></span>
                        <a href="<?php echo U('Home/MemberCenter/order');?>" class="tobuy">查看详情</a>
                        <a href="<?php echo U('Home/Index/index');?>" class="tobuy">继续购物</a>
                    </td>
                </tr>

                </tbody>

        </table>
    </div>
    </div>
<!-- Footer - wll - 2013/3/24 -->
<div class="clear"></div>
<div class="shop_footer">
    <div class="shop_footer_link">
        <p>
            <a href="">首页</a>|
            <a href="">招聘英才</a>|
            <a href="">广告合作</a>|
            <a href="">品墨书城</a>|
            <a href="">关于我们</a>
        </p>
    </div>
    <div class="shop_footer_copy">
        <p>Copyright 2008-2016 PmStore Inc.,All rights reserved.</p>
    </div>
</div>
<!-- Footer End -->
</body>
</html>