<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_manager.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-1.8.2.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
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

	<!-- 我的个人中心 -->
	<div class="shop_member_bd clearfix">
		<!-- 左边导航 -->
        <div class="shop_member_bd_left clearfix">

    <div class="shop_member_bd_left_pic">
        <a href="<?php echo U('Home/MemberCenter/photo');?>"><img src="/Uploads/<?php echo ($photo); ?>" /></a>
    </div>
    <div class="clear"></div>
    <dl>
        <dt>我的账户</dt>
        <dd><span><a href="<?php echo U('Home/MemberCenter/grxx');?>">个人资料</a></span></dd>
        <dd><span><a href="<?php echo U('Home/MemberCenter/password_edit');?>">密码修改</a></span></dd>
        <dd><span><a href="<?php echo U('Home/MemberCenter/member_info');?>">完善个人信息</a></span></dd>
    </dl>
    <dl>
        <dt>收货地址</dt>
        <dd><span><a href="<?php echo U('Home/Address/address');?>">收货地址管理</a></span></dd>
    </dl>
    <dl>
        <dt>我的交易</dt>
        <dd><span><a href="<?php echo U('Home/MemberCenter/order');?>">已购买商品</a></span></dd>
        <dd><span><a href="<?php echo U('Home/MemberCenter/favorite');?>">我的收藏</a></span></dd>
        <dd><span><a href="<?php echo U('Home/MemberCenter/comment');?>">评价管理</a></span></dd>

    </dl>
</div>
		<!-- 左边导航 End -->
		
		<!-- 右边购物列表 -->
		<div class="shop_member_bd_right clearfix">
			
			<div class="shop_meber_bd_good_lists clearfix">
				<div class="title"><h3>订单列表</h3></div>
				<table>
					<thead class="tab_title">
						<th style="width:380px;"><span>商品信息</span></th>
						<th style="width:150px;"><span>单价</span></th>
						<th style="width:80px;"><span>数量</span></th>

					</thead>
					<tbody>
                        <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order1): $mod = ($i % 2 );++$i;?><tr><td colspan="3">
							<table class="good">
								<thead >
									<tr><th style="width:280px;" >
										<span><strong>订单号码：</strong><?php echo ($order1["ordernum"]); ?></span>
									</th>
                                        <th style="width:70px;">
                                            <span><strong>订单总价：</strong>￥<?php echo ($order1["prices"]); ?></span>
									</th>
                                        <th style="width:120px;">
                                            <span><strong>订单状态：</strong>
                                                <?php switch($order1["status"]): case "1": ?>未付款<?php break;?>
                                                    <?php case "2": ?>已付款<?php break;?>
                                                    <?php case "3": ?>已发货<?php break;?>
                                                    <?php case "4": ?>已签收<?php break;?>
                                                    <?php case "5": ?>已评价<?php break;?>
                                                    <?php case "6": ?>申请退货<?php break;?>
                                                    <?php case "7": ?>已退货<?php break;?>
                                                    <?php case "8": ?>订单已取消<?php break;?>
                                                    <?php case "9": ?>取消订单中<?php break;?>
                                                    <?php default: endswitch;?>
                                                </span>
									</th>
                                        <th style="width:120px;">
                                            <span><strong>操作：</strong>
                                                <?php switch($order1["status"]): case "1": ?><a href="javascript:pay(<?php echo ($order1['id']); ?>)">去付款</a> <a href="javascript:del(<?php echo ($order1['id']); ?>)">取消订单</a><?php break;?>
                                                    <?php case "2": ?><a href="javascript:del(<?php echo ($order1['id']); ?>)">取消订单</a><?php break;?>
                                                    <?php case "3": ?><a href="javascript:sign(<?php echo ($order1['id']); ?>)">签收</a> <a href="javascript:del(<?php echo ($order1['id']); ?>)">取消订单</a><?php break;?>
                                                    <?php case "4": ?><a href="javascript:back(<?php echo ($order1['id']); ?>)">退货</a> <a href="<?php echo U('Home/MemberCenter/discuss',array('id'=>$order1['id']));?>">评价</a><?php break;?>
                                                    <?php default: endswitch;?>
                                                </span>
									</th>
                                    </tr>
								</thead>
                                <?php if(is_array($order1["temp"])): $k = 0; $__LIST__ = $order1["temp"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ordergoods): $mod = ($k % 2 );++$k;?><tbody>
									<tr>
										<td class="dingdan_pic"><img src="/Uploads/<?php echo ($ordergoods["goodspic"]); ?>" /></td>
										<td class="dingdan_title"><span><a href="<?php echo U('Home/Goods/details',array('id'=>$ordergoods['goodsid']));?>"><?php echo ($ordergoods["goodsname"]); ?></a></span></td>
                                        <td><a href="#" class="price"><?php echo ($ordergoods["price"]); ?></a></td>
                                        <td style="text-align: center">
                                            <input readonly="readonly" style="width: 100%;height: 22px; border: 0; text-align: center" type="text" value="<?php echo ($ordergoods["goodsnum"]); ?>" class=" dingdan_shuliang" name='buynum' id="buynum<?php echo ($k); ?>" onkeyup="chgnum(this)"/>&nbsp;
									</tr>
								</tbody><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>
						</td></tr><?php endforeach; endif; else: echo "" ;endif; ?>

					</tbody>
				</table>
			</div>
		</div>
		<!-- 右边购物列表 End -->

	</div>
	<!-- 我的个人中心 End -->

	<!-- Footer - wll - 2013/3/24 -->
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
	<!-- Footer End -->
</body>
<script>
    function pay(id){
        $.post("<?php echo U('Home/Shopcar/justpay');?>",{'id':id}, function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes:function(){
                        location.href="<?php echo U('Home/MemberCenter/order');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })}
    function back(id){
        $.post("<?php echo U('Home/Shopcar/back');?>",{'id':id}, function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes:function(){
                        location.href="<?php echo U('Home/MemberCenter/order');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })}
    function sign(id){
        $.post("<?php echo U('Home/Shopcar/sign');?>",{'id':id}, function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes:function(){
                        location.href="<?php echo U('Home/MemberCenter/order');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })}
    function del(id) {
        //alert($('#form').serialize());
        layer.confirm('您是真的要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
        $.post("<?php echo U('Home/Shopcar/delor');?>", {'id':id}, function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes: function () {
                        location.href = "<?php echo U('Home/MemberCenter/order');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })
    })}
   /* function discuss(id) {
            $.post("<?php echo U('Home/Shopcar/discuss1');?>", {'id':id}, function (res) {
                if (res.status == 'ok') {
                    layer.alert(res.msg, {
                        yes: function () {
                            location.href = "<?php echo U('Home/MemberCenter/order');?>";
                        }
                    });
                } else {
                    layer.alert(res.msg);
                }
            })
            layer.close(index);
        });
        //alert($('#form').serialize());

    }*/
</script>

</html>