<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧菜单页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson .header").click(function(){
		var $parent = $(this).parent();
		$(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();
		
		$parent.addClass("active");
		if(!!$(this).next('.sub-menus').size()){
			if($parent.hasClass("open")){
				$parent.removeClass("open").find('.sub-menus').hide();
			}else{
				$parent.addClass("open").find('.sub-menus').show();	
			}					
		}
	});
	
	// 三级菜单点击
	$('.sub-menus li').click(function(e) {
        $(".sub-menus li.active").removeClass("active")
		$(this).addClass("active");
    });
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('.menuson').slideUp();
		if($ul.is(':visible')){
			$(this).next('.menuson').slideUp();
		}else{
			$(this).next('.menuson').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>后台管理</div>
    
    <dl class="leftmenu">

        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>系统管理
            </div>
            <ul class="menuson">       
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Index/main');?>" target="rightFrame">后台首页</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AdminNav/index');?>" target="rightFrame">菜单列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AdminNav/add');?>" target="rightFrame">添加菜单</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Index/send_message');?>" target="rightFrame">发送站内信</a>
                        <i></i>
                    </div>
                </li>


            </ul>    
        </dd>



        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>权限管理
            </div>
            <ul class="menuson">

                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AuthGroup/index');?>" target="rightFrame">管理组列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AuthGroup/add');?>" target="rightFrame">添加管理组</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/index');?>" target="rightFrame">管理员列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/add');?>" target="rightFrame">添加管理员</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AuthRule/index');?>" target="rightFrame">权限列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AuthRule/add');?>" target="rightFrame">添加权限</a>
                        <i></i>
                    </div>
                </li>


            </ul>
        </dd>







        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>品牌管理
            </div>
        	<ul class="menuson">       
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Brand/index');?>" target="rightFrame">品牌列表</a>
                        <i></i>
                    </div>
                </li>
                
                <li>
                    <div class="header">
                    <cite></cite>
                    <a href="<?php echo U('Brand/add');?>" target="rightFrame">添加品牌</a>
                    <i></i>
                    </div>                
                </li>

            </ul>    
        </dd>

        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>分类管理
            </div>
            <ul class="menuson">       
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Category/index');?>" target="rightFrame">分类列表</a>
                        <i></i>
                    </div>
                </li>
                
                <li>
                    <div class="header">
                    <cite></cite>
                    <a href="<?php echo U('Category/cate');?>" target="rightFrame">添加分类</a>
                    <i></i>
                    </div>                
                </li>

            </ul>    
        </dd>       

        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>商品管理
            </div>
            <ul class="menuson">       
                <li class="active">
                    <div class="header">
                        <cite></cite>

                        <a href="<?php echo U('Goods/index');?>" target="rightFrame">商品列表</a>
                        <i></i>
                    </div>
                </li>
                
                <li>
                    <div class="header">
                    <cite></cite>
                    <a href="<?php echo U('Goods/add');?>" target="rightFrame">添加商品</a>
                    <i></i>
                    </div>                
                </li>

            </ul>    
        </dd> 

        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>会员管理
            </div>
            <ul class="menuson">       
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Member/index');?>" target="rightFrame">会员列表</a>
                        <i></i>
                    </div>
                </li>
                
               <!-- <li>
                    <div class="header">
                    <cite></cite>
                    <a href="<?php echo U('Member/points');?>" target="rightFrame">积分管理</a>
                    <i></i>
                    </div>                
                </li>-->

            </ul>    
        </dd>

        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>订单管理
            </div>
            <ul class="menuson">
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Order/index');?>" target="rightFrame">订单列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Order/index');?>?status=1" target="rightFrame">待付款订单</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Order/index');?>?status=2" target="rightFrame">待发货订单</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Order/index');?>?status=3" target="rightFrame">待收货订单</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Order/index');?>?status=4" target="rightFrame">待评价订单</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Order/index');?>?status=5" target="rightFrame">已完成订单</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Order/index');?>?status=0" target="rightFrame">失效订单</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>评价管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Comment/commentList');?>" target="rightFrame">评价列表</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>文章管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Article/index');?>" target="rightFrame">文章列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Article/add');?>" target="rightFrame">发布文章</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>




        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>广告管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Adcategory/index');?>" target="rightFrame">广告分类列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Adcategory/addCategory');?>" target="rightFrame">添加广告分类</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Adgood/index');?>" target="rightFrame">广告商品列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Adgood/add');?>" target="rightFrame">添加广告商品</a>
                        <i></i>
                    </div>
                </li>



            </ul>
        </dd>





        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>团购管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Group/index');?>" target="rightFrame">团购列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Group/add');?>" target="rightFrame">发布团购</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Group/send_mail');?>" target="rightFrame">发送团购提醒</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>积分商城
            </div>

            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Integral/index');?>" target="rightFrame">商品列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Integral/add');?>" target="rightFrame">添加商品</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('IntegralOrder/integralOrder');?>" target="rightFrame">订单列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('IntegralOrder/integralOrder');?>?status=1" target="rightFrame">待支付订单</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('IntegralOrder/integralOrder');?>?status=2" target="rightFrame">待发货订单</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('IntegralOrder/integralOrder');?>?status=3" target="rightFrame">待收货订单</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('IntegralOrder/integralOrder');?>?status=5" target="rightFrame">交易完成订单</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>
        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>售后管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Services/index');?>" target="rightFrame">申请列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Services/index');?>?status=1" target="rightFrame">未处理申请</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Services/index');?>?status=2" target="rightFrame">未通过申请</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Services/index');?>?status=3" target="rightFrame">已通过申请</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>





    </dl>
    
</body>
</html>