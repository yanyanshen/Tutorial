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
                        <a href="main.html" target="rightFrame">后台首页</a>
                        <i></i>
                    </div>
                  <!--   <ul class="sub-menus">
                      <li><a href="javascript:;">文件管理</a></li>
                      <li><a href="javascript:;">模型信息配置</a></li>
                      <li><a href="javascript:;">基本内容</a></li>
                      <li><a href="javascript:;">自定义</a></li>
                  </ul> -->
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Rbac/addRole');?>" target="rightFrame">添加角色</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Rbac/roleList');?>" target="rightFrame">角色列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Rbac/addNode');?>" target="rightFrame">添加权限</a>
                        <i></i>
                    </div>
                </li>
                 <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Rbac/nodeList');?>" target="rightFrame">权限列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Rbac/adduser');?>" target="rightFrame">添加管理员</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                    <cite></cite>
                    <a href="<?php echo U('Admin/Rbac/userlist');?>" target="rightFrame">管理员列表</a>
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
                        <a href="<?php echo U('Admin/Category/categorylist');?>" target="rightFrame">分类列表</a>
                        <i></i>
                    </div>
                </li>
                
                <li>
                    <div class="header">
                    <cite></cite>
                    <a href="<?php echo U('Admin/Category/categoryadd');?>" target="rightFrame">添加分类</a>
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
                        <a href="<?php echo U('Admin/Goods/goodslist');?>" target="rightFrame">商品列表</a>
                        <i></i>
                    </div>
                </li>
                
                <li>
                    <div class="header">
                    <cite></cite>
                    <a href="<?php echo U('Admin/Goods/goodsadd');?>" target="rightFrame">添加商品</a>
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
                        <a href="<?php echo U('Admin/Member/member');?>" target="rightFrame">会员列表</a>
                        <i></i>
                    </div>
                </li>
            </ul>    
        </dd> 

        <dd>
            <div class="title">
                <span><img src="/Public/Admin/images/leftico01.png" /></span>订单管理
            </div>
            <ul class="menuson">       
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="list.html" target="rightFrame">订单列表</a>
                        <i></i>
                    </div>
                </li>
            </ul>    
        </dd>         
    </dl>
    
</body>
</html>