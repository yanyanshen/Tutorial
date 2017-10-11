<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>商品详细页面</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_list.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/css/shop_goods.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-1.8.2.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/shop_goods.js" ></script>
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

	<div class="clear"></div>
	<!-- 面包屑 注意首页没有 -->
	<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="">首页</a>&nbsp;›&nbsp;
			<a href="">商品详情</a>&nbsp;›&nbsp;
		</span>
	</div>
	<div class="clear"></div>
	<!-- 面包屑 End -->

	<!-- Header End -->
	
	<!-- Goods Body -->
	<div class="shop_goods_bd clear">

		<!-- 商品展示 -->
		<div class="shop_goods_show">
			<div class="shop_goods_show_left">
				<!-- 京东商品展示 -->
				<link rel="stylesheet" href="/Public/Home/css/shop_goodPic.css" type="text/css" />
				<script type="text/javascript" src="/Public/Home/js/shop_goodPic_base.js"></script>
				<script type="text/javascript" src="/Public/Home/js/lib.js"></script>
				<script type="text/javascript" src="/Public/Home/js/163css.js"></script>
				<div id="preview">
					<div class=jqzoom id="spec-n1" onClick="window.open(''/Uploads/<?php echo ($plist['0']['picname']); ?>'')"><IMG height="350" src="/Uploads/<?php echo ($plist['0']['picname']); ?>" jqimg="/Uploads/<?php echo ($plist['0']['picname']); ?>" width="350">
						</div>
						<div id="spec-n5">

                            <div id="spec-list">
								<ul class="list-h">
                                    <?php if(is_array($plist)): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li><img src="/Uploads/<?php echo ($value["picname"]); ?>"> </li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>


					    </div>
					</div>

					<SCRIPT type=text/javascript>
						$(function(){			
						   $(".jqzoom").jqueryzoom({
								xzoom:400,
								yzoom:400,
								offset:10,
								position:"right",
								preload:1,
								lens:1
							});
							$("#spec-list").jdMarquee({
								deriction:"left",
								width:350,
								height:56,
								step:2,
								speed:4,
								delay:10,
								control:true,
								_front:"#spec-right",
								_back:"#spec-left"
							});
							$("#spec-list img").bind("mouseover",function(){
								var src=$(this).attr("src");
								$("#spec-n1 img").eq(0).attr({
									src:src.replace("\/n5\/","\/n1\/"),
									jqimg:src.replace("\/n5\/","\/n0\/")
								});
								$(this).css({
									"border":"2px solid #ff6600",
									"padding":"1px"
								});
							}).bind("mouseout",function(){
								$(this).css({
									"border":"1px solid #ccc",
									"padding":"2px"
								});
							});				
						})
						</SCRIPT>
					<!-- 京东商品展示 End -->

			</div>
			<div class="shop_goods_show_right">
                <?php if(is_array($glist)): $i = 0; $__LIST__ = $glist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><ul>
					<li>
						<strong style="font-size:16px; font-weight:bold;"><?php echo ($value["goodsname"]); ?></strong>
					</li>
                    <li>
                        <label>市场价格：</label>
                        <span><del><strong><?php echo ($value["marketprice"]); ?></strong></del>元</span>
                    </li>
                    <li>
						<label>价格：</label>
						<span><strong><?php echo ($value["price"]); ?></strong>元</span>
					</li>
					<li>
						<label>运费：</label>
						<span>卖家承担运费</span>
					</li>
					<li>
						<label>累计售出：</label>
						<span><strong><?php echo ($value["salenum"]); ?></strong>件</span>
					</li>
					<li>
						<label>评价：</label>
						<span>0条评论</span>
					</li>
                    <form action="<?php echo U('Home/Shopcar/addcar');?>" method="post" id="form">
					<li class="goods_num">
						<label>购买数量：</label>
						<span><a class="good_num_jian" id="good_num_jian" href="javascript:void(0);"></a><input type="text" name="goodsnum" value="1" id="good_nums" class="good_nums" /><a href="javascript:void(0);" id="good_num_jia" class="good_num_jia"></a>(当前库存<?php echo ($value["num"]); ?>件)</span>
					</li>

					<li style="padding:20px 0;margin-left: 50px">
                        <input type="hidden" name="goodsid" value="<?php echo ($value["id"]); ?>"/>

						<span><a href="javascript:goodscar();" class="goods_sub goods_sub_gou" >加入购物车</a></span>
                        <span onclick="javascript:collect(<?php echo ($value["id"]); ?>);" style="font-size:15px;cursor:pointer;padding-left: 40px"> <a style="text-decoration: none;"><b style="color: red">&#9829;</b><?php echo ($b>0?'已收藏':'添加收藏'); ?></a></span>
					</li>
                    </form>

				</ul><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<!-- 商品展示 End -->

		<div class="clear mt15"></div>
		<!-- Goods Left -->
		<div class="shop_bd_list_left clearfix">


			<!-- 热卖推荐商品 -->
            
<div class="shop_bd_list_bk clearfix">
    <div class="title">商品分类</div>
    <div class="contents clearfix">
        <dl class="shop_bd_list_type_links clearfix">
            <dt><strong>品墨书城</strong></dt>
            <dd>
                <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><span><a href="<?php echo U('Home/Index/letter',array('cid'=>$val['cid'],'catename'=>$val['catename']));?>"><?php echo ($val["catename"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; ?>

            </dd>
        </dl>
    </div>
</div>

<div class="shop_bd_list_bk clearfix">
    <div class="title">热卖推荐商品</div>
    <div class="contents clearfix">
        <ul class="clearfix">
            <?php if(is_array($tglist)): $i = 0; $__LIST__ = $tglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="clearfix">
                    <div class="goods_name"><a href=""><?php echo ($value["goodsname"]); ?></a></div>
                    <div class="goods_pic"><span class="goods_price">¥ <?php echo ($value["price"]); ?> </span><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><img src="/Uploads/<?php echo ($value["goodspic"]); ?>" /></a></div>
                    <div class="goods_xiaoliang">
                        <span class="goods_xiaoliang_link"><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>">去看看</a></span>
                        <span class="goods_xiaoliang_nums">已销售<strong><?php echo ($value["salenum"]); ?></strong>笔</span>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>



        </ul>
    </div>
</div>
<!-- 热卖推荐商品 -->
<div class="clear"></div>

<!-- 浏览过的商品 -->
<div class="shop_bd_list_bk clearfix">
    <div class="title">浏览过的商品</div>
    <div class="contents clearfix">
        <ul class="clearfix">
            <?php if(is_array($look1)): $i = 0; $__LIST__ = $look1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="clearfix">
                    <div class="goods_name"><a href=""><?php echo ($value["goodsname"]); ?></a></div>
                    <div class="goods_pic"><span class="goods_price">¥ <?php echo ($value["price"]); ?> </span><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><img src="/Uploads/<?php echo ($value["goodspic"]); ?>" /></a></div>
                    <div class="goods_xiaoliang">
                        <span class="goods_xiaoliang_link"><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>">去看看</a></span>
                        <span class="goods_xiaoliang_nums">已销售<strong><?php echo ($value["salenum"]); ?></strong>笔</span>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>


        </ul>
    </div>
</div>
			<!-- 浏览过的商品 -->

		</div>
		<!-- Goods Left End -->

		<!-- 商品详情 -->
		<script type="text/javascript" src="/Public/Home/js/shop_goods_tab.js"></script>
		<div class="shop_goods_bd_xiangqing clearfix">
			<div class="shop_goods_bd_xiangqing_tab">
				<ul>
					<li id="xiangqing_tab_1" onmouseover="shop_goods_easytabs('1', '1');" onfocus="shop_goods_easytabs('1', '1');" onclick="return false;"><a href=""><span>商品详情</span></a></li>
					<li id="xiangqing_tab_2" onmouseover="shop_goods_easytabs('1', '2');" onfocus="shop_goods_easytabs('1', '2');" onclick="return false;"><a href=""><span>商品评论</span></a></li>
				</ul>
			</div>
			<div class="shop_goods_bd_xiangqing_content clearfix">
				<div id="xiangqing_content_1" class="xiangqing_contents clearfix">
                    <?php if(is_array($glist)): $i = 0; $__LIST__ = $glist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i; echo ($value["description"]); endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div id="xiangqing_content_2" class="xiangqing_contents clearfix"> <!--style="overflow:auto;"-->
                    <div>
                        <?php if(is_array($discuss)): $i = 0; $__LIST__ = $discuss;if( count($__LIST__)==0 ) : echo "该商品暂无评价！" ;else: foreach($__LIST__ as $key=>$discuss): $mod = ($i % 2 );++$i;?><div style="border: 1px solid #000000;width: 730px;margin: 10px">
                                <table>
                                    <tr style="width: 725px;margin: 5px 0;border-bottom: 1px solid #AED2FF;">
                                        <th width="225px" height="25px"><span style="font-size: 15px;">用户名:<?php echo ($discuss["username"]); ?></span></th>
                                        <th width="400px" height="25px"><span style="font-size: 15px;color:#EEDO22">发表时间:<?php echo (date('Y-m-d H:i:s',$discuss["creatime"])); ?></span></th>
                                    </tr>

                                    <tr style="width: 725px;;margin: 5px 0;margin: 10px 0;">
                                        <td width="725px" height="25px"><span style="font-size: 15px">评论内容:</span>&nbsp;&nbsp;<?php echo ($discuss["msg"]); ?></td>
                                    </tr>
                                </table>
                            </div><?php endforeach; endif; else: echo "该商品暂无评价！" ;endif; ?>
                    </div>
				</div>


			</div>
		</div>
		<!-- 商品详情 End -->

	</div>
	<!-- Goods Body End -->

	<!-- Footer - wll - 2013/3/24 -->
	
	<!-- Footer End -->

</body>
<script>
    function goodscar(){
        //  alert($('#form').serialize());
        $.post("<?php echo U('Home/Shopcar/addcar');?>",$('#form').serialize(),function(res){
            if(res.status=='ok'){
                layer.alert(res.msg,{
                    yes:function(){
                        location.href="<?php echo U('Home/Shopcar/addcar');?>";
                    }
                });
            }else if(res.status=='nologin'){
                layer.alert(res.msg,{
                    yes:function(){
                        location.href="<?php echo U('Home/Login/login');?>";
                    }
                });
            }
            else {
                layer.alert(res.msg)
            } });
    };
    function collect(id){
        //  alert($('#form').serialize());
        $.post("<?php echo U('Home/Goods/collect');?>",{'goodsid':id},function(res){

            if(res.status=='ok'){
                layer.alert(res.msg,{
                    yes:function(){
                        location.href="";
                    }
                });
            }else if(res.status=='nologin'){
                layer.alert(res.msg,{
                    yes:function(){
                        location.href="<?php echo U('Home/Login/login');?>";
                    }
                });
            }else{
                layer.alert(res.msg);
            };
        })
    }
</script>
</html>