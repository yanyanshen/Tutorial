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
		<!-- 在具体实现的时候，根据情况选择其中一种情况 -->
		<!-- 购物车为空 -->

			<!--<div class="empty_cart mb10">
				<div class="message">
					<p>购物车内暂时没有商品，您可以<a href="index.html">去首页</a>挑选喜欢的商品</p>
				</div>
			</div>-->
		<!-- 购物车为空 end-->
		
		<!-- 购物车有商品 -->
		<div class="shop_gwc_bd_contents clearfix">
			<!-- 购物流程导航 -->
			<div class="shop_gwc_bd_contents_lc clearfix">
				<ul>
					<li class="step_a hover_a">确认购物清单</li>
					<li class="step_b">确认收货人资料及送货方式</li>
					<li class="step_c">购买完成</li>
				</ul>
			</div>
			<!-- 购物流程导航 End -->

			<!-- 购物车列表 -->
			<!--<table>
				<thead>
					<tr>
						<th colspan="2"><span>商品</span></th>
						<th><span>单价(元)</span></th>
						<th><span>数量</span></th>
						<th><span>小计</span></th>
						<th><span>操作</span></th>
					</tr>
				</thead>

				<tbody>
                <?php if(is_array($carinfo)): $k = 0; $__LIST__ = $carinfo;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$carlist): $mod = ($k % 2 );++$k;?><tr>
						<td class="gwc_list_pic"><a href="<?php echo U('Home/Goods/details',array('id'=>$carlist['id']));?>"><img width="39px" height="60px" src="/Uploads/<?php echo ($carlist["goodspic"]); ?>" /></a></td>
						<td class="gwc_list_title"><a href="<?php echo U('Home/Goods/details',array('id'=>$carlist['id']));?>"><?php echo ($carlist["goodsname"]); ?> </a></td>
						<td class="gwc_list_danjia"><span>￥<strong id="danjia_00<?php echo ($k); ?>"><?php echo ($carlist["price"]); ?></strong></span></td>
						<td class="gwc_list_shuliang"><span><a class="good_num_jian this_good_nums" did="danjia_00<?php echo ($k); ?>" xid="xiaoji_00<?php echo ($k); ?>" ty="-" valId="goods_00<?php echo ($k); ?>" href="javascript:void(0);">-</a><input type="text" value="<?php echo ($carlist["num"]); ?>" id="goods_00<?php echo ($k); ?>" class="good_nums" /><a href="javascript:void(0);" did="danjia_00<?php echo ($k); ?>" xid="xiaoji_00<?php echo ($k); ?>" ty="+" class="good_num_jia this_good_nums" valId="goods_00<?php echo ($k); ?>">+</a></span></td>
						<td class="gwc_list_xiaoji"><span>￥<strong id="xiaoji_00<?php echo ($k); ?>" class="good_xiaojis"><?php echo ($carlist["price"]); ?></strong></span></td>
						<td class="gwc_list_caozuo"><a href="">收藏</a><a href="javascript:void(0);" class="shop_good_delete">删除</a></td>
					</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>

					&lt;!&ndash;<tr>
					模板
						<td class="gwc_list_pic"><a href=""><img src="/Public/Home/images/4_7b5239c3f153ae4b67ff760f54408a5b.jpg_tiny.jpg" /></a></td>
						<td class="gwc_list_title"><a href="">双层花架简约韩式田园欧式地中海风格宜家纯白架现代花盆架电话架 </a></td>
						<td class="gwc_list_danjia"><span>￥<strong id="danjia_005">2550.00</strong></span></td>
						<td class="gwc_list_shuliang"><span><a class="good_num_jian this_good_nums" did="danjia_005" xid="xiaoji_005" ty="-" valId="goods_005" href="javascript:void(0);">-</a><input type="text" value="1" id="goods_005" class="good_nums" /><a href="javascript:void(0);" did="danjia_005" xid="xiaoji_005" ty="+" class="good_num_jia this_good_nums" valId="goods_005">+</a></span></td>
						<td class="gwc_list_xiaoji"><span>￥<strong id="xiaoji_005" class="good_xiaojis">2550.00</strong></span></td>
						<td class="gwc_list_caozuo"><a href="">收藏</a><a href="javascript:void(0);" class="shop_good_delete">删除</a></td>
					</tr>&ndash;&gt;

					

					
				</tbody>
				<tfoot>
					<tr>
						<td colspan="6">
							<div class="gwc_foot_zongjia">商品总价(不含运费)<span>￥<strong id="good_zongjia"></strong></span></div>
							<div class="clear"></div>
							<div class="gwc_foot_links">
								<a href="" class="go">继续购物</a>
								<a href="" class="op">确认并填写订单</a>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>-->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="day_list">
                <thead>

                <tr>
                    <th class="xuhao"></th>
                    <th width="15%">商品图片</th>
                    <th width="30%">商品名称</th>
                    <th width="10%">商品单价(元)</th>
                    <th width="20%">商品数量</th>
                    <th width="10%">小计(元)</th>
                    <th width="5%">操作</th>
                </tr>
                </thead>

                <form action="" method="post" id="form">
                    <input type="hidden" id="prices" name="prices" />

                    <tbody id="pageBody">
                    <?php if(is_array($carinfo)): $k = 0; $__LIST__ = $carinfo;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$carlist): $mod = ($k % 2 );++$k;?><tr>
                        <td class="xuhao" style="color: #ff0000"><input checked="checked" onchange="gettotalprice();"
                                                                        type="checkbox" name="chk[]" value=<?php echo ($carlist["id"]); ?>>
                            <!--<input checked="checked" onchange="gettotalprice();"
                                   type="checkbox" name="pic[]" value=<?php echo ($carlist["goodspic"]); ?>> -->
                            <input type="hidden"  name="pic[]"  value="<?php echo ($carlist["goodspic"]); ?>"/>
                        </td>
                        <td>

                            <a href="<?php echo U('Home/Goods/details',array('id'=>$carlist['id']));?>">
                                <img src="/Uploads/<?php echo ($carlist["goodspic"]); ?>" alt=""
                                     style="width:80px;margin:10px;"/>
                            </a>
                        </td>
                        <td><a href="<?php echo U('Home/Goods/details',array('id'=>$carlist['id']));?>"><?php echo ($carlist["goodsname"]); ?></a></td>
                        <td><a href="#" class="price"><?php echo ($carlist["price"]); ?></a></td>
                        <td>
                            <a href="javascript:jian(<?php echo ($k); ?>);" class="decrement">-</a>&nbsp;
                            <input style="width: 22px;height: 22px; text-align: center" type="text" value="<?php echo ($carlist["num"]); ?>" class="num" name='buynum<?php echo ($carlist["id"]); ?>' id="buynum<?php echo ($k); ?>" onkeyup="chgnum(this)"/>&nbsp;
                            <a href="javascript:jia(<?php echo ($k); ?>);" class="increment">+</a>
                        <td class="prices">3088.00</td>
                        <td><a href="javascript:del(<?php echo ($carlist['id']); ?>);">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                    <tr>
                        <td class="xuhao" style="color: #ff0000">
                            <input type="checkbox" checked="checked" onchange="gettotalprice();" id="chkAll" name="chkAll"/>
                        </td>
                        <td class="xuhao" style="color: #ff0000">
                            <a href="">全选</a>
                        </td>
                        <td colspan="5" id="buy">
                            <span>总价:<b id="totalprice">￥888.88</b></span>
                            <a href="javascript:playorder()" class="tobuy">去下单</a>
							<a href="<?php echo U('Home/Index/index');?>" class="tobuy">继续购物</a>
                        </td>
                    </tr>

                    </tbody>
                </form>
            </table>
			<!-- 购物车列表 End -->
		</div>
		<!-- 购物车有商品 end -->

	</div>
	<!-- 购物车 Body End -->

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
<script type="text/javascript">

    function chk(){
        var chkAll=document.getElementById('chkAll');
        var chks=document.getElementsByName('chk[]');
        for(var i=0;i<chks.length;i++){
            chks[i].checked=chkAll.checked;
        }
    }
    document.getElementById('chkAll').onclick=chk;

    function jian(n){
        var buynum=document.getElementById('buynum'+n).value;
        if(buynum>1){
            document.getElementById('buynum'+n).value=parseInt(buynum)-1;
        }
        getprices();
        gettotalprice();
    }
    function jia(n){
        var buynum=document.getElementById('buynum'+n).value;
        if(buynum<199){
            document.getElementById('buynum'+n).value=parseInt(buynum)+1;
        }
        getprices();
        gettotalprice();
    }

    function chgnum(v){
        if(v.value<1){
            v.value=1;
        }
        if(v.value>199){
            v.value=199;
        }
        if(isNaN(v.value)){
            v.value=1;
        }

        gettotalprice();
    }

    function getprices(){
        var nums=document.getElementsByClassName('num');
        var price=document.getElementsByClassName('price');
        var prices=document.getElementsByClassName('prices');
        for(var i=0;i<price.length;i++){

            prices[i].innerHTML=parseInt(price[i].innerHTML)*parseInt(nums[i].value);

        };
    }

    function gettotalprice(){
        getprices();
        var inputs=document.getElementsByName('chk[]');
        var prices=document.getElementsByClassName('prices');
        var totalprice=0;
        for(var i=0;i<inputs.length;i++){
            if(inputs[i].checked){
                totalprice+=parseInt(prices[i].innerHTML);
            };
        };
        document.getElementById('totalprice').innerHTML='￥'+totalprice;
        document.getElementById('prices').value=totalprice;
    }

    gettotalprice();
	
	//下单的ajax代码
    function playorder(){

        $.post("<?php echo U('Home/Shopcar/playorder');?>",$('#form').serialize(),function(res){
            if(res.status=='ok'){
                layer.alert(res.msg,{
                    yes:function(){
                        location.href="<?php echo U('Home/Shopcar/playorder');?>";
                    }
                });

            }else{
                layer.alert(res.msg);
            };
        })
    }
    //删除购物车商品
    function del(id){
        layer.confirm('您是真的要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
        $.post("<?php echo U('Home/Shopcar/del');?>", {'id': id}, function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes:function(){
                        location.href="<?php echo U('Home/Shopcar/addcar');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })
    }
    )}
</script>
</html>