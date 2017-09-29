<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台首页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>

</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
    </ul>
</div>

<div class="mainindex">
    <div class="welinfo">
        <span><img src="/Public/Admin/images/sun.png" alt="天气" /></span>
        <b><span style="color:#f00"><?php echo ($username); ?></span>早上好，欢迎使用后台管理系统</b>
    </div>

    <div class="welinfo">
        <span><img src="/Public/Admin/images/time.png" alt="时间" /></span>
        <span>您上次登录的时间:</span><span style="color:#f00"><?php echo date("Y-m-d H:i:s",$loginTime);?>，</span><span>您上次登录IP：</span><span style="color:#f00"><?php echo ($loginIp); ?>，</span> 如非本人操作，请及时更改密码
    </div>

    <div class="xline"></div>

    <!--    <ul class="iconlist">

       <li><img src="images/ico01.png" /><p><a href="#">管理设置</a></p></li>
       <li><img src="images/ico02.png" /><p><a href="#">发布文章</a></p></li>
       <li><img src="images/ico03.png" /><p><a href="#">数据统计</a></p></li>
       <li><img src="images/ico04.png" /><p><a href="#">文件上传</a></p></li>
       <li><img src="images/ico05.png" /><p><a href="#">目录管理</a></p></li>
       <li><img src="images/ico06.png" /><p><a href="#">查询</a></p></li>

    </ul>



    <div class="xline"></div> -->
    <div class="box"></div>

    <div class="welinfo">
        <span><img src="/Public/Admin/images/dp.png" alt="提醒" /></span>
        <b>服务器信息</b>
    </div>

    <ul class="infolist">
        <li><span>服务器软件：<?=$_SERVER[SERVER_SOFTWARE]?></span></li>
        <li><span>开发语言：php</span></li>
        <li><span>数据库：eshop</span></li>
    </ul>

    <div class="xline"></div>

    <div class="uimakerinfo"><b>版权所有：易购网</b>(<a href="http://www.egood.com" target="_blank">www.egood.com</a>)</div>




</div>



</body>

</html>