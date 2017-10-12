<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>
<style>
    #layui-layer-shade2{
        position: relative;
        top:100px;
        left:400px;
    }
</style>

</head>

<body style="background:url(/Public/Admin/images/topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="index.html" target="_parent"><img src="/Public/Admin/images/logo.png" title="系统首页" /></a>
    </div>
        
 <!--    <ul class="nav">
 <li>
     <a href="main.html" target="rightFrame" class="selected">
         <img src="/Public/Admin/images/icon01.png" title="工作台" />
     <h2>工作台</h2>
     </a>
 </li>
    
 </ul> -->
            
    <div class="topright">    
    <ul>
    <li><span><img src="/Public/Admin/images/help.png" title="帮助"  class="helpimg"/></span><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    <li><a href="javascript:logout()" target="_parent">退出</a></li>
    </ul>

    <div class="user">
    <span>admin</span>
    <i>消息</i>
    <b>5</b>
    </div>
    </div>

</body>
<script>
    function logout(){
        //询问框
        if(confirm('您确定要退出当前账户?')){
            $.get("<?php echo U('Admin/Admin/logout');?>",'',function(res){
                if(res.status=='ok'){
                    parent.location.reload();//刷新包含框架的页面
                }
            })
        }
    }
</script>
</html>