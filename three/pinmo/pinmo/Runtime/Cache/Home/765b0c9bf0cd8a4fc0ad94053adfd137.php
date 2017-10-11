<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>编辑收货地址</title>
	<link rel="stylesheet" href="/three13(2)/pinmo/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/three13(2)/pinmo/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/three13(2)/pinmo/Public/Home/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/three13(2)/pinmo/Public/Home/css/shop_manager.css" type="text/css" />
	<link rel="stylesheet" href="/three13(2)/pinmo/Public/Home/css/shop_form.css" type="text/css" />
    <script type="text/javascript" src="/three13(2)/pinmo/Public/Home/js/jquery-1.8.2.js" ></script>
    <script type="text/javascript" src="/three13(2)/pinmo/Public/Home/js/topNav.js" ></script>
    <script type="text/javascript" src="/three13(2)/pinmo/Public/Home/js/geo.js" ></script>
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
                            <a href="<?php echo U('Home/Shopcar/addcar');?>" class="topNavHover">购物车<b><?php echo ($num); ?></b>种商品<i></i></a>

                        </div>
                    </li>

                    <li>
                        <div class="topNav_menu">
                            <a href="<?php echo U('Home/MemberCenter/favorite');?>" class="topNavHover">我的收藏<i></i></a>

                        </div>
                    </li>

                    <li>
                        <div class="topNav_menu">
                            <a href="#">帮助中心</a>
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

            <?php if(is_array($list6)): $i = 0; $__LIST__ = $list6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><h1 class="logo"><a href=""><img src="/three13(2)/pinmo/Uploads/<?php echo ($value["adpic"]); ?>" alt="" width="250px" height="80px"/></a><span>1234</span></h1><?php endforeach; endif; else: echo "" ;endif; ?>
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
                    <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value1): $mod = ($i % 2 );++$i;?><li id="cat_1" class="">
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

                    <li class="more"><a href="">查看更多分类</a></li>
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
<script src="/three13(2)/pinmo/Public/Home/js/jquery-1.8.2.js"></script>
<script src="/three13(2)/pinmo/Public/Home/layer/layer.js"></script>
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
</script>


	<!-- Header End -->	

	<!-- 我的个人中心 -->
	<div class="shop_member_bd clearfix">
		<!-- 左边导航 -->
        <div class="shop_member_bd_left clearfix">

    <div class="shop_member_bd_left_pic">
        <a href="<?php echo U('Home/MemberCenter/photo');?>"><img src="/three13(2)/pinmo/Uploads/<?php echo ($photo); ?>" /></a>
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
				<div class="title"><h3>编辑收货地址</h3></div>
				<div class="clear"></div>
				<div class="shop_home_form">
					<form action="<?php echo U('Home/Address/edit');?>" name="form1" id="form" class="shop_form" method="post" >
						<ul>
							<li><label><span>*</span>收货人姓名：</label><input name="recever" type="text" class="form-text" value="" /></li>

                            <li><label for="address">所在地址:</label>
                                <select style="height: 29px" class="select"  id="s1">
                                    <option></option>
                                </select>
                                <select style="height: 29px" class="select"  id="s2">
                                    <option></option>
                                </select>
                                <select style="height: 29px" class="select"  id="s3" onchange="promptinfo();">
                                    <option></option>
                                </select>
                                <input id="address" name="address1" type="hidden" value="" />
                            </li>
                            <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                            <li><label><span>*</span>所在地：</label><input name="address2" type="text" class="form-text" value="" /></li>
							<li><label>邮编：</label><input name="post" type="text" class="form-text" value="" /></li>
							<li><label>手机号：</label><input name="mobile" type="text" class="form-text" value="" /></li>
							<li class="bn"><label>&nbsp;</label><input type="button" class="form-submit" value="保存修改" /></li>
						</ul>
					</form>
				</div>
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
    function promptinfo()
    {
        var address = document.getElementById('address');
        var s1 = document.getElementById('s1');
        var s2 = document.getElementById('s2');
        var s3 = document.getElementById('s3');
        address.value = s1.value + s2.value + s3.value;
    }

</script>
<script src="/three13(2)/pinmo/Public/Home/js/jquery.validate.min.js"></script>
<script src="/three13(2)/pinmo/Public/Home/layer/layer.js"></script>
<script type="text/javascript">
    $(function(){
        var validate=$('#form').validate({
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

        $('.form-submit').click(function(){
            if(validate.form()){
                $.post("<?php echo U('Home/Address/edit');?>",$('#form').serialize(),function(res){
                    if(res.status=='ok'){
                        layer.alert(res.msg,{
                            yes:function(){
                                location.href="<?php echo U('Home/Address/address');?>";
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
</html>