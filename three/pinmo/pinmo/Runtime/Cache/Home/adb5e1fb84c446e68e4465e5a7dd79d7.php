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
    <script type="text/javascript" src="/Public/Home/js/jquery.goodnums.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/shop_gouwuche.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/geo.js" ></script>

    <style type="text/css">
    .shop_bd_shdz_title{width:1000px; margin-top: 10px; height:50px; line-height: 50px; overflow: hidden; background-color:#F8F8F8;}
    .shop_bd_shdz_title h3{width:120px; text-align: center; height:40px; line-height: 40px; font-size: 14px; font-weight: bold;  background:#FFF; border:1px solid #E8E8E8; border-radius:4px 4px 0 0; float: left;  position: relative; top:10px; left:10px; border-bottom: none;}
    .shop_bd_shdz_title p{float: right;}
    .shop_bd_shdz_title p a{margin:0 8px; color:#555555;}

	.shop_bd_shdz_lists{width:1000px;}
	.shop_bd_shdz_lists ul{width:1000px;}
	.shop_bd_shdz_lists ul li{width:980px; border-radius: 3px; margin:5px 0; padding-left:18px; line-height: 40px; height:40px; border:1px solid #FFE580; background-color:#FFF5CC;}
	.shop_bd_shdz_lists ul li label{color:#626A73; font-weight: bold;}
	.shop_bd_shdz_lists ul li label span{padding:10px;}
	.shop_bd_shdz_lists ul li em{margin:0 4px; color:#626A73;}

	.shop_bd_shdz{width:1000px; margin:10px auto 0;}
	.shop_bd_shdz_new{border:1px solid #ccc; width:998px;}
	.shop_bd_shdz_new div.title{width:990px; padding-left:8px; line-height:35px; height:35px; border-bottom:1px solid #ccc; background-color:#F2F2F2; font-color:#656565; font-weight: bold; font-size:14px;}
	.shdz_new_form{width:980px; padding:9px;}
	.shdz_new_form ul{width:100%;}
	.shdz_new_form ul li{clear:both; width:100%; padding:5px 0; height:25px; line-height: 25px;}
	.shdz_new_form ul li label{float:left;width:100px; text-align: right; padding-right: 10px;}
	.shdz_new_form ul li label span{color:#f00; font-weight: bold; font-size:14px; position: relative; left:-3px; top:2px;}
    </style>

</head>
<body onload="setup();preselect('河南省');promptinfo();">
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
					<li class="step_b hover_b">确认收货人资料及送货方式</li>
					<li class="step_c">购买完成</li>
				</ul>
			</div>
			<!-- 购物流程导航 End -->
			<div class="clear"></div>
			<!-- 收货地址 title -->
			<div class="shop_bd_shdz_title">
				<h3>收货人地址</h3>
                <p><a href="javasrcipt:void(0);" id="new_add_shdz_btn">新增收货地址</a></p>
			</div>
			<div class="clear"></div>
			<!-- 收货人地址 Title End -->

			<div class="shop_bd_shdz clearfix">

                <!-- 新增收货地址 -->
                <div id="new_add_shdz_contents" style="display:none;" class="shop_bd_shdz_new clearfix">
                    <div class="title">新增收货地址</div>
                    <div class="shdz_new_form">
                        <form action="<?php echo U('Home/Address/addeidt');?>" name="form" id="addform" method="post" >
                            <ul>
                                <li><label for="name"><span>*</span>收货人姓名：</label><input name="recever" id="name" type="text" class="name" /></li>
                                <li><label for="address">所在地址:</label>
                                    <select class="select" name="province" id="s1">
                                        <option></option>
                                    </select>
                                    <select class="select" name="city" id="s2">
                                        <option></option>
                                    </select>
                                    <select class="select" name="town" id="s3" onchange="promptinfo();">
                                        <option></option>
                                    </select>
                                    <input id="address" name="address1" type="hidden" value="" />
                                </li>
                                <li><label for=""><span>*</span>详细地址：</label><input name="address2" type="text" class="xiangxi" /></li>
                                <li><label for=""><span></span>邮政编码：</label><input name="post" type="text" class="youbian" /></li>
                                <li><label for=""><span></span>电话：</label><input name="mobile" type="text" class="dianhua" /></li>
                                <li><label for="">&nbsp;</label><input id="submit" type="button" value="增加收货地址" /></li>
                            </ul>
                            </form>
                    </div>
                </div>
            </div>
                <form action="" id="form1">
                    <div class="shop_bd_shdz_lists clearfix">

                        <ul>
                            <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "收货地址为空，快去添加地址吧！" ;else: foreach($__LIST__ as $key=>$address): $mod = ($i % 2 );++$i;?><li><label>寄送至：<span><input type="radio" name="add" value="<?php echo ($address["id"]); ?>" <?php echo ($address['isdefault']?'checked':''); ?> /></span></label><?php echo ($address["address1"]); ?><em><?php echo ($address["address2"]); ?></em><em><?php echo ($address["recever"]); ?>(收)</em><em><?php echo ($address["mobile"]); ?></em></li><?php endforeach; endif; else: echo "收货地址为空，快去添加地址吧！" ;endif; ?>
                        </ul>
                    </div>
			<div class="clear"></div>
			<!-- 购物车列表 -->
                <div class="clear"></div>
                <!-- 购物车列表 -->
                <div class="shop_bd_shdz_title">
                    <h3>确认购物清单</h3>
                </div>
                <div class="clear"></div>
                <table>
                    <thead>
                    <tr>
                        <th colspan="1.5"><span>图片</span></th>
                        <th colspan="2"><span>商品</span></th>
                        <th><span>单价(元)</span></th>
                        <th><span>数量</span></th>
                        <th><span>小计</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <input type="hidden" id="prices" name="prices" />
                    <tbody id="pageBody">
                    <?php if(is_array($orderinfo)): $k = 0; $__LIST__ = $orderinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($k % 2 );++$k;?><tr>
                            <td style="display: none"    class="xuhao" style="color: #ff0000"><input checked="checked" onchange="gettotalprice();" type="checkbox" name="chk[]" value=<?php echo ($order["goodsid"]); ?>></td>
                            <input type="hidden"  name="ordernum" value="<?php echo ($order["ordernum"]); ?>" />

                            <td>
                                <a href="<?php echo U('Home/Goods/details',array('id'=>$order['id']));?>">
                                    <img src="/Uploads/<?php echo ($order["goodspic"]); ?>" alt=""
                                         style="width:80px;margin:10px;"/>
                                </a>
                            </td>
                            <td colspan="2"><a href="<?php echo U('Home/Goods/details',array('id'=>$order['id']));?>"><?php echo ($order["goodsname"]); ?></a></td>
                            <td><a href="#" class="price"><?php echo ($order["price"]); ?></a></td>
                            <td>
                                <div style="visibility: hidden"><a  href="javascript:jian(<?php echo ($k); ?>);" class="decrement">-</a>&nbsp;</div>
                                <input readonly="readonly" style="width: 22px;height: 22px; text-align: center" type="text" value="<?php echo ($order["goodsnum"]); ?>" class="num" name='buynum<?php echo ($order["goodsid"]); ?>' id="buynum<?php echo ($k); ?>" onkeyup="chgnum(this)"/>&nbsp;
                                <div style="visibility: hidden"><a href="javascript:jia(<?php echo ($k); ?>);" class="increment">+</a></div>
                            <td class="prices">3088.00</td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                        <tr>
                            <td> <input type="radio" name="pay[]" checked/>支付宝支付</td>
                            <td> <input type="radio" name="pay[]"/>微信支付</td>
                            <td> <input type="radio" name="pay[]"/>银联支付</td>
                            <td colspan="3">请在此处输入支付账户<input style="font-size: 15px" type="text" name="account" /></td>
                        </tr>

                   <!-- <tr>
                        <td style="display: none" class="xuhao" style="color: #ff0000">
                            <input type="checkbox" checked="checked" onchange="gettotalprice();" id="chkAll" name="chkAll"/>
                        </td>

                        <td colspan="5" id="buy">
                            <span>总价:<b id="totalprice">￥888.88</b></span>
                            <a href="javascript:pay()" id="submi" class="tobuy">马上付款</a>
                            <a href="javascript:delorder()" class="tobuy">取消订单</a>
                        </td>
                    </tr>-->

                    <tr>
                        <td style="display: none" class="xuhao" style="color: #ff0000">
                            <input type="checkbox" checked="checked" onchange="gettotalprice();" id="chkAll" name="chkAll"/>
                        </td>

                        <td colspan="5" id="buy">
                            <span>总价:<b id="totalprice">￥888.88</b></span>
                            <a id="submi" class="tobuy">马上付款</a>
                            <a href="javascript:delorder()" class="tobuy">取消订单</a>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <!-- 购物车列表 End -->
            </form>
		</div>
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
    jQuery(function(){
        jQuery("#new_add_shdz_btn").toggle(function(){
            jQuery("#new_add_shdz_contents").show(500);
        },function(){
            jQuery("#new_add_shdz_contents").hide(500);
        });
    });

    function promptinfo()
    {
        var address = document.getElementById('address');
        var s1 = document.getElementById('s1');
        var s2 = document.getElementById('s2');
        var s3 = document.getElementById('s3');
        address.value = s1.value + s2.value + s3.value;
    }


</script>
<script src="/Public/Home/js/jquery.validate.min.js"></script>
<script src="/Public/Home/layer/layer.js"></script>
<script>
$(function() {
    var validate1 = $('#form1').validate({
        rules: {
            account: {
                required: true
            }
        },
        messages: {
            account: {
                required: '账号不能为空'
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }
    })
    jQuery.validator.onfocus = true;
    $('#submi').click(function () {
        if (validate1.form()) {
            layer.prompt({
                title: '请输入您的支付密码',
                formType: 1 //prompt风格，支持0-2
            }, function (pass) {
                $.post("<?php echo U('Home/Shopcar/pay');?>", $('#form1').serialize(), function (res) {
                    if (res.status == 'ok') {
                        layer.alert(res.msg, {
                            yes: function () {
                                location.href = "<?php echo U('Home/Shopcar/orderend');?>";
                            }
                        });
                    } else {
                        layer.alert(res.msg);
                    }
                })
            })
        }
    })
})

    //添加地址操作
    $(function(){
        var validate=$('#addform').validate({
            //设置验证规则
            rules:{
                recever:{
                    required:true,
                    minlength:2,
                    maxlength:15
                },
                address1:{
                    required:true,
                    minlength:5,
                    maxlength:20
                },

                address2:{
                    required:true
                },
                post:{
                    required:true,
                    isZipCode:true
                },
                mobile:{
                    required:true,
                    call:true
                }

            },
            messages:{
                recever:{
                    required:'收货人姓名不能为空',
                    minlength:'收货人姓名至少需要2个字符',
                    maxlength:'收货人姓名最多15个字符'
                },
                address1:{
                    required:'所在地址不能为空',
                    minlength:'所在地址至少5个字符',
                    maxlength:'所在地址最多20个字符'
                },

                address2:{
                    required:'所在地不能为空'
                },
                post:{
                    required:'邮编不能为空',
                    isZipCode:'邮编格式不正确'
                },
                mobile:{
                    required:'手机号码不能为空',
                    call:'手机号码格式不正确'
                }

            },
            /*            success: function(label) {
             label.addClass("ok");
             },
             validClass: "ok",*/
            errorElement:'div',
            errorPlacement: function(error, element) {
                error.appendTo( element.parent());
            }

        })
        //自定义验证手机号码
        jQuery.validator.addMethod('call',function(value,elevent){
            var callreg=/^[1]{1}[3578]{1}\d{9}$/;
            return this.optional(elevent) || (callreg.test(value))},"请正确的填写手机号码");
        //自定义验证邮箱
        jQuery.validator.addMethod("isZipCode", function(value, element) {
            var tel = /^[0-9]{6}$/;
            return this.optional(element) || (tel.test(value));
        }, "请正确填写您的邮政编码");
        jQuery.validator.onfocus=true;

        $('#submit').click(function(){
            //alert(validate.form());
            if(validate.form()){
                //alert(ddd);
                $.post("<?php echo U('Home/Address/addeidt');?>",$('#addform').serialize(),function(res){
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

        })

    })

</script>
<script>

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


    function delorder() {
        //alert($('#form').serialize());
        $.post("<?php echo U('Home/Shopcar/delorder');?>", $('#form1').serialize(), function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes: function () {
                        location.href = "<?php echo U('Home/Index/index');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })
    }

</script>
</html>