<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>管理收货地址</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_manager.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_shdz_835.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-1.8.2.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/geo.js" ></script>
</head>
<body onload="setup();preselect('河南省');promptinfo();">
		
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
				<div class="title"><h3>管理收货地址<a style="float:right;" href="javasrcipt:void(0);" id="new_add_shdz_btn">新增收货地址</a></h3></div>
				<div class="clear"></div>
			<!-- 收货人地址 Title End -->
			<div class="shop_bd_shdz clearfix">
				<div class="shop_bd_shdz_lists clearfix">
					<ul>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($i % 2 );++$i;?><li><em><?php echo ($address["address1"]); ?>></em><em><?php echo ($address["address2"]); ?></em><em>邮编<?php echo ($address["post"]); ?></em><em><?php echo ($address["recever"]); ?>(收)</em><em><?php echo ($address["mobile"]); ?></em><span class="admin_shdz_btn"><a href="<?php echo U('Home/Address/edit',array('id'=>$address['id']));?>">编辑</a><a  href="javascript:del(<?php echo ($address['id']); ?>);" >删除</a><a  href="javascript:defa(<?php echo ($address['id']); ?>);" ><?php echo ($address['isdefault']==0?'设为默认':'默认地址'); ?></a></span></li><?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>
				</div>
				<!-- 新增收货地址 -->
				<div id="new_add_shdz_contents" style="display:none;" class="shop_bd_shdz_new clearfix">
					<div class="title">新增收货地址</div>
					<div class="shdz_new_form">
						<form action="<?php echo U('Home/Address/addeidt');?>" name="form" id="form" method="post" >
							<ul>

								<li><label for="name"><span>*</span>收货人姓名：</label><input name="recever" id="name" type="text" class="name" /></li>
                                <li><label for="address">所在地址:</label>
                                    <!--<select class="select" name="province" id="s1">
                                        <option></option>
                                    </select>
                                    <select class="select"  name="city" id="s2">
                                        <option></option>
                                    </select>
                                    <select class="select" name="town"  id="s3">
                                        <option></option>
                                    </select>
                                    <input id="address" name="address1" type="hidden" value="" />-->
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
						</from>
					</div>
				</div>
				<!-- 新增收货地址 End -->
			</div>
			<div class="clear"></div>
			</div>
		</div>
		<!-- 右边购物列表 End -->

	</div>
	<!-- 我的个人中心 End -->

	<!-- Footer - wll - 2013/3/24 -->
	<include file="public/footer">
	<!-- Footer End -->
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
        <script src="/Public/Home/js/jquery-1.8.2.js"></script>
        <script src="/Public/Home/js/jquery.validate.min.js"></script>
        <script src="/Public/Home/layer/layer.js"></script>
        <script>
            //删除操作
            function del(id) {
                layer.confirm('您是真的要删除吗？', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    $.post("<?php echo U('Home/Address/del');?>", {'id': id}, function (res) {
                        if (res.status == 'ok') {
                            layer.alert(res.msg, {
                                yes:function(){
                                    location.href="<?php echo U('Home/Address/address');?>";
                                }
                            });
                        } else {
                            layer.alert(res.msg);
                        }
                        ;
                    })
                })
            }
            //设为默认操作
            function defa(id) {
                    $.post("<?php echo U('Home/Address/defa');?>", {'id': id}, function (res) {
                        if (res.status == 'ok') {
                            layer.alert(res.msg, {
                                yes:function(){
                                    location.href="<?php echo U('Home/Address/address');?>";
                                }
                            });
                        } else {
                            layer.alert(res.msg);
                        }
                        ;
                    })
                }
            //添加地址操作
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

                $('#submit').click(function(){
                    if(validate.form()){
                        $.post("<?php echo U('Home/Address/addeidt');?>",$('#form').serialize(),function(res){
                            if(res.status=='ok'){
                                layer.alert(res.msg,{
                                    yes:function(){
                                        location.href="<?php echo ($_SERVER['HTTP_REFERER']); ?>";
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
</body>
</html>