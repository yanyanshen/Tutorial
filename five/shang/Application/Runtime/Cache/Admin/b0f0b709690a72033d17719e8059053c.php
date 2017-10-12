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
            <b><?php echo ($adminname); ?>，早上好，欢迎使用后台管理系统</b>
        </div>

        <div class="welinfo">
            <span><img src="/Public/Admin/images/time.png" alt="时间" /></span>
            <i>您上次登录的时间：<?php if(($time) > "0"): echo ($time); endif; ?></i> <i>您上次登录IP：<?php echo ($ip); ?></i>
            <i>如非本人操作，请及时更改密码</i>
        </div>

        <div class="xline"></div>

        <div class="box"></div>

        <div class="welinfo">
            <span><img src="/Public/Admin/images/dp.png" alt="提醒" /></span>
            <b>服务器信息</b>
        </div>

        <ul class="infolist">
        <li><span>服务器软件：<?php echo ($serverSoftware); ?></span></li>
        <li><span>开发语言：<?php echo ($developLang); ?></span></li>
        <li><span>数据库：<?php echo ($database); ?></span></li>
        </ul>

        <div class="xline"></div>

        <div class="uimakerinfo"><b>版权所有：美伦美尚网 </b>(<a href="http://<?php echo ($serverName); ?>" target="_blank"><?php echo ($serverName); ?></a>)</div>


    </div>
    

</body>

</html>