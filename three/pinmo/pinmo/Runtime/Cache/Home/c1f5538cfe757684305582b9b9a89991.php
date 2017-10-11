<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>品墨书城-首页</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
        <link rel="stylesheet" href="/Public/Home/css/shop_home.css" type="text/css" />
        <script type="text/javascript" src="/Public/Home/js/jquery-1.8.2.js" ></script>
        <script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
        <script type="text/javascript" src="/Public/Home/js/focus.js" ></script>
        <script type="text/javascript" src="/Public/Home/js/shop_home_tab.js" ></script>
		<script type="text/javascript" src="/Public/Home/js/smohan.fixednav.js" ></script>
    <style type="text/css">
        .big:hover {
            transform: scale(1.3, 1.3);
            transition: .3s transform;
        }


    </style>

</head>
<body>

	
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


	<!-- Body -wll-2013/03/24 -->
	<div class="shop_bd clearfix">
            <!-- 第一块区域  -->
            <div class="shop_bd_top clearfix">
                <div class="shop_bd_top_left"></div>
                <div class="shop_bd_top_center">
                    <!-- 图片切换  begin  -->
                    <div class="xifan_sub_box">

                      <div id="p-select" class="sub_nav"><div class="sub_no" id="xifan_bd1lfsj"> <ul></ul></div></div>
                      <div id="xifan_bd1lfimg">


                         <div>
                             <?php if(is_array($list5)): $k = 0; $__LIST__ = $list5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><dl class="" >
                            <dt><a href="<?php echo ($value["adurl"]); ?>" title="<?php echo ($value["des"]); ?>" target="_blank"><img src="/Uploads/<?php echo ($value["adpic"]); ?>" width="1000px" height="350px" alt="" /></a></dt>
                            <dd><h2><a href="" target="_blank"><?php echo ($value["des"]); ?></a></h2></dd>
                          </dl><?php endforeach; endif; else: echo "" ;endif; ?>


                        </div>

                      </div>


                    <script type="text/javascript">movec();</script>
                    <!-- 图片切换  end -->
                    <div class="clear"></div>
                   <!-- <div class="shop_bd_top_center_hot"><img src="/Public/Home/images/index.guanggao.png" /></div>-->
                         </div>

                    </div>


                <!-- 右侧 End -->
            </div>
            <div class="clear"></div>
            <!-- 第一块区域 End -->

            <!-- 第二块区域 -->
            <div class="shop_bd_2 clearfix">
                <!-- 特别推荐 -->
                <div class="shop_bd_tuijian">
                    <ul class="tuijian_tabs">
                        <li class="hover"  onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');" onclick="return false;" id="tuijian_content_btn_1"><a href="javascript:void(0);">特别推荐</a></li>
                        <li onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');" onclick="return false;" id="tuijian_content_btn_2" ><a href="javascript:void(0);">热门商品</a></li>
                        <li onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');" onclick="return false;" id="tuijian_content_btn_3"><a href="javascript:void(0);">新品上架</a></li>
                    </ul>
                    <div class="tuijian_content">
                        <div id="tuijian_content_1" class="tuijian_shangpin" style="display: block;">
                            <ul>
                                <?php if(is_array($glist4)): $i = 0; $__LIST__ = $glist4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                                    <dl>
                                        <dt><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><img class="big" src="/Uploads/<?php echo ($value["goodspic"]); ?>" width="160px" height="160px"/></a></dt>
                                        <dd><a href="" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a></dd>
                                        <dd> 商城价：<em><?php echo ($value["price"]); ?></em>元</dd>
                                    </dl>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>


                            </ul>
                        </div>

                        <div id="tuijian_content_2" class="tuijian_shangpin">
                            <ul>
                                <?php if(is_array($glist5)): $i = 0; $__LIST__ = $glist5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                                        <dl>
                                            <dt><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>" ><img class="big" src="/Uploads/<?php echo ($value["goodspic"]); ?>" width="160px" height="160px"/></a></dt>
                                            <dd><a href="" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a></dd>
                                            <dd> 商城价：<em><?php echo ($value["price"]); ?></em>元</dd>
                                        </dl>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

                            </ul>
                        </div>
                        <div id="tuijian_content_3" class="tuijian_shangpin tuijian_content">
                            <ul>
                                <?php if(is_array($glist6)): $i = 0; $__LIST__ = $glist6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                                        <dl>
                                            <dt><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><img class="big" src="/Uploads/<?php echo ($value["goodspic"]); ?>" width="160px" height="160px"/></a></dt>
                                            <dd><a href="" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a></dd>
                                            <dd> 商城价：<em><?php echo ($value["price"]); ?></em>元</dd>
                                        </dl>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

                            </ul>
                        </div>

                    </div>

                </div>
                <!-- 特别推荐 End -->

                <!-- y右一广告 -->
                <?php if(is_array($list1)): $k = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><div class="shop_bd_shoufa"><a href=""><img src="/Uploads/<?php echo ($value["adpic"]); ?>" width="242px" height="288px" alt="" title="<?php echo ($list1["des"]); ?>"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                    <!-- 右一广告 End -->

            </div>
            <div class="clear"></div>
            <!-- 第二块区域 End -->

            <!-- 第三块区域 男女服饰 -->
            <div class="shop_bd_home_block clearfix">

                <!-- 左边广告 -->
                <?php if(is_array($list2)): $k = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><div class="shop_bd_home_block_left">
                    <img src="/Uploads/<?php echo ($value["adpic"]); ?>" width="208px" height="456px">
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <!-- 左边 End -->

                <!-- 中间 -->
                <div class="shop_bd_home_block_center">
                    <ul class="tabs-nav">
                        <li><a href="javascript:void(0);">文学推荐</a></li>
                    </ul>
                    <div class="tabs-panel">
                        <ul>

                            <?php if(is_array($glist1)): $i = 0; $__LIST__ = $glist1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                                <dl>
                                    <dt><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><img class="big" src="/Uploads/<?php echo ($value["goodspic"]); ?>" title="<?php echo ($value["description"]); ?>"/></a></dt>
                                    <dd class="goodsname"><a href="" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a></dd>
                                    <dd>商城价：<em><?php echo ($value["price"]); ?></em>元</dd>
                                </dl>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>


                        </ul>
                    </div>
                </div>
                <!-- 中间 End -->

                <!-- 右边商品排行 -->
                <div class="shop_bd_home_block_right">
                    <div class="title"><h3>人气排行</h3></div>
                    <ol class="saletop-list">
                        <?php if(is_array($glist7)): $k = 0; $__LIST__ = $glist7;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><li class="top clearfix">
                             <dl>
                                <dt class="goods-name">
                                    <a href="" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a>
                                </dt>
                                <dd class="nokey"><?php echo ($k); ?></dd>
                                <dd class="goods-pic">
                                    <a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><span class="thumb size60"><img class="big" src="/Uploads/<?php echo ($value["goodspic"]); ?>"/></span></a>
                                </dd>
                                <dd class="goods-price"><em><?php echo ($value["price"]); ?></em></dd>
                            </dl>

                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                        <?php if(is_array($glist4)): $k = 0; $__LIST__ = $glist4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><li class="normal">
                            <i><?php echo ($k+4); ?></i>
                            <a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>


                    </ol>
                    <?php if(is_array($list7)): $k = 0; $__LIST__ = $list7;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><div class="saletop-list_adv_pic"><a href=""><img src="/Uploads/<?php echo ($value["adpic"]); ?>" width="219px" height="97px"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <!-- 右边商品排行 -->

                <!-- 品牌展示 -->
                <div class="shop_bd_home_block_bottom">
                    <img src="/Public/Home/images/hengfu.jpg" width="750px" height="53px"/>
                </div>
                <!-- 品牌展示 End -->

            </div>
            <div clas="clear"></div>
            <!-- 第三块区域 End -->

            <!-- 第四块区域 男女服饰 -->
            <div class="shop_bd_home_block clearfix">

                <!-- 左边广告 -->
               <?php if(is_array($list3)): $k = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><div class="shop_bd_home_block_left">
                    <img src="/Uploads/<?php echo ($value["adpic"]); ?>" width="208px" height="456px">
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <!-- 左边 End -->

                <!-- 中间 -->
                <div class="shop_bd_home_block_center">
                    <ul class="tabs-nav">
                        <li><a href="javascript:void(0);">人文社科</a></li>
                    </ul>
                    <div class="tabs-panel">
                        <ul>


                            <?php if(is_array($glist2)): $i = 0; $__LIST__ = $glist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                                    <dl>
                                        <dt><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><img class="big" src="/Uploads/<?php echo ($value["goodspic"]); ?>" title="<?php echo ($value["description"]); ?>"/></a></dt>
                                        <dd class="goodsname"><a href="" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a></dd>
                                        <dd>商城价：<em><?php echo ($value["price"]); ?></em>元</dd>
                                    </dl>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>

                        </ul>
                    </div>
                </div>
                <!-- 中间 End -->

                <!-- 右边商品排行 -->
                <div class="shop_bd_home_block_right">
                    <div class="title"><h3>销量排行</h3></div>
                    <ol class="saletop-list">
                        <?php if(is_array($glist8)): $k = 0; $__LIST__ = $glist8;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><li class="top clearfix">
                                <dl>
                                    <dt class="goods-name">
                                        <a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a>
                                    </dt>
                                    <dd class="nokey"><?php echo ($k); ?></dd>
                                    <dd class="goods-pic">
                                        <a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>" style="text-decoration:none;text-align: center"><span class="thumb size60"><img class="big" src="/Uploads/<?php echo ($value["goodspic"]); ?>"/></span></a>
                                    </dd>
                                    <dd class="goods-price"><em><?php echo ($value["price"]); ?></em></dd>
                                </dl>

                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                        <?php if(is_array($glist5)): $k = 0; $__LIST__ = $glist5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><li class="normal">
                                <i><?php echo ($k+4); ?></i>
                                <a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ol>
                    <?php if(is_array($list8)): $k = 0; $__LIST__ = $list8;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><div class="saletop-list_adv_pic"><a href=""><img src="/Uploads/<?php echo ($value["adpic"]); ?>" width="219px" height="97px"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <!-- 右边商品排行 -->

                <!-- 品牌展示 -->
                <div class="shop_bd_home_block_bottom">
                    <img src="/Public/Home/images/hengfu.jpg" width="750px" height="53px"/>
                </div>
                <!-- 品牌展示 End -->

            </div>
            <div clas="clear"></div>
            <!-- 第四块区域 End -->

            <!-- 第五块区域 男女服饰 -->
            <div class="shop_bd_home_block clearfix">

                <!-- 左边广告 -->
                <?php if(is_array($list4)): $k = 0; $__LIST__ = $list4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><div class="shop_bd_home_block_left">
                    <img src="/Uploads/<?php echo ($value["adpic"]); ?>" width="208px" height="456px">
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <!-- 左边 End -->

                <!-- 中间 -->
                <div class="shop_bd_home_block_center">
                    <ul class="tabs-nav">
                        <li><a href="javascript:void(0);">政治军事</a></li>
                    </ul>
                    <div class="tabs-panel">
                        <ul>
                            <?php if(is_array($glist3)): $i = 0; $__LIST__ = $glist3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                                    <dl>
                                        <dt><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><img class="big" src="/Uploads/<?php echo ($value["goodspic"]); ?>" title="<?php echo ($value["description"]); ?>"/></a></dt>
                                        <dd class="goodsname"><a href="" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a></dd>
                                        <dd>商城价：<em><?php echo ($value["price"]); ?></em>元</dd>
                                    </dl>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>

                        </ul>
                    </div>
                </div>
                <!-- 中间 End -->

                <!-- 右边商品排行 -->
                <div class="shop_bd_home_block_right">
                    <div class="title"><h3>新品排行</h3></div>
                    <ol class="saletop-list">
                        <?php if(is_array($glist9)): $k = 0; $__LIST__ = $glist9;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><li class="top clearfix">
                                <dl>
                                    <dt class="goods-name">
                                        <a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a>
                                    </dt>
                                    <dd class="nokey"><?php echo ($k); ?></dd>
                                    <dd class="goods-pic">
                                        <a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><span class="thumb size60"><img class="big" src="/Uploads/<?php echo ($value["goodspic"]); ?>"/></span></a>
                                    </dd>
                                    <dd class="goods-price"><em><?php echo ($value["price"]); ?></em></dd>
                                </dl>

                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                        <?php if(is_array($glist6)): $k = 0; $__LIST__ = $glist6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><li class="normal">
                                <i><?php echo ($k+4); ?></i>
                                <a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>" style="text-decoration:none;text-align: center"><?php echo ($value["goodsname"]); ?></a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ol>
                    <?php if(is_array($list9)): $k = 0; $__LIST__ = $list9;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><div class="saletop-list_adv_pic"><a href=""><img src="/Uploads/<?php echo ($value["adpic"]); ?>" width="219px" height="97px"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <!-- 右边商品排行 -->

                <!-- 品牌展示 -->
                <div class="shop_bd_home_block_bottom">
                    <img src="/Public/Home/images/hengfu.jpg" width="750px" height="53px"/>
                </div>
                <!-- 品牌展示 End -->

            </div>
            <div clas="clear"></div>
            <!-- 第五块区域 End -->

            <div class="faq">
                <dl>
                    <dt>帮助中心</dt>
                    <dd><a href=""><span>积分兑换说明</span></a></dd>
                    <dd><a href=""><span>积分明细</span></a></dd>
                    <dd><a href=""><span>查看已购买商</span></a></dd>
                    <dd><a href=""><span>我要买</span></a></dd>
                    <dd><a href=""><span>忘记密码</span></a></dd>
                </dl>

                <dl>
                    <dt>店主之家</dt>
                    <dd><a href=""><span>如何申请开店</span></a></dd>
                    <dd><a href=""><span>商城商品推荐</span></a></dd>
                    <dd><a href=""><span>如何发货</span></a></dd>
                    <dd><a href=""><span>查看已售商品</span></a></dd>
                    <dd><a href=""><span>如何管理店铺</span></a></dd>
                </dl>

                <dl>
                    <dt>支付方式</dt>
                    <dd><a href=""><span>公司转账</span></a></dd>
                    <dd><a href=""><span>邮局汇款</span></a></dd>
                    <dd><a href=""><span>分期付款</span></a></dd>
                    <dd><a href=""><span>在线支付</span></a></dd>
                    <dd><a href=""><span>如何注册支付</span></a></dd>
                </dl>

                <dl>
                    <dt>售后服务</dt>
                    <dd><a href=""><span>退款申请</span></a></dd>
                    <dd><a href=""><span>返修/退换货</span></a></dd>
                    <dd><a href=""><span>退换货流程</span></a></dd>
                    <dd><a href=""><span>退换货政策</span></a></dd>
                    <dd><a href=""><span>联系卖家</span></a></dd>
                </dl>

                <dl>
                    <dt>客服中心</dt>
                    <dd><a href=""><span>修改收货地址</span></a></dd>
                    <dd><a href=""><span>商品发布</span></a></dd>
                    <dd><a href=""><span>会员修改个人</span></a></dd>
                    <dd><a href=""><span>会员修改密码</span></a></dd>

                </dl>

                <dl>
                    <dt>关于我们</dt>
                    <dd><a href=""><span>合作及洽谈</span></a></dd>
                    <dd><a href=""><span>招聘英才</span></a></dd>
                    <dd><a href=""><span>联系我们</span></a></dd>
                    <dd><a href=""><span>关于Shop</span></a></dd>
                </dl>


            </div>
            <div class="clear"></div>
	</div>
    <div id="goTop" style="color:#fff;width: 30px;height: 30px;background: red;float:right;margin-right: 50px;margin-top:auto;text-align: center;line-height: 25px;position:fixed;right:25px;bottom: 50px;"><a href="#">top</a></div>

    <!-- Body End -->

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
<script type="text/javascript">
window.onscroll=function g(){
var goTop=document.getElementById('goTop');
var sTop=document.documentElement.scrollTop ||document.body.scrollTop;
if(sTop>0){
goTop.style.display="block"
}else{
goTop.style.display="none"
}
}
</script>
</html>