<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script language="JavaScript" src="/Public/Admin/js/layer/layer.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/Public/Admin/images/logo.ico" media="screen" />

    <script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})

})	
</script>

</head>
<body style="background:url(/Public/Admin/images/topbg.gif) repeat-x;">

    <div class="topleft" style="width: 187px">
    <a href="../Index/index.html" target="_parent"><img src="/Public/Admin/images/logo.ico" title="系统首页" /></a>
    </div>
    <div class="topcenter" style="margin:0px 148px 0px 0px;">
            <li style="float: left; text-align:left;margin-top: 10px; padding-top:10px; " >
            <a href="<?php echo U('Index/index');?>" target="_parent" class="red" style="float:left;font-weight:bold ;color:#20B2AA;line-height: 35px;font-size:22px;">一杯茶后台管理</a>
            </li>
    </div>
    <div class="topright">    
    <ul>
    <li><a href="<?php echo U('Login/login');?>"  target="_parent" class="red"><?php echo (session('aname')); ?></a></li>
    <li><a href="javascript:logout();" class="red">[退出登录]</a></li>
    </ul>
    </div>

</body>
<script>
    function logout(){
        $.post("<?php echo U('Login/logout');?>",'',function(res){
            if(res.status){
                parent.location=res.url;
            }
        })
    }
</script>
</html>