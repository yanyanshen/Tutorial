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
        <b>Admin早上好，欢迎使用后台管理系统</b>
    </div>
    
    <div class="welinfo">
        <span><img src="/Public/Admin/images/time.png" alt="时间" /></span>
        <i>您上次登录的时间：2013-10-09 15:22</i> <i>您上次登录IP：2013-10-09 15:22</i> 如非本人操作，请及时更改密码
    </div>
    
    <div class="xline"></div>
    
    <ul class="iconlist">
        <li><img src="/Public/Admin/images/ico02.png" /><p><a href="<?php echo u('Notice/noticeadd','Admin');?>">发布文章</a></p></li>
        <li><img src="/Public/Admin/images/ico03.png" /><p><a href="<?php echo u('Notice/noticeList','Admin');?>">数据统计</a></p></li>
        <li><img src="/Public/Admin/images/ico04.png" /><p><a href="<?php echo u('Notice/noticeList','Admin');?>">文件上传</a></p></li>
    </ul>
 <div class="xline"></div>
    <div class="box"></div>
    
    <div class="welinfo">
        <span><img src="/Public/Admin/images/dp.png" alt="提醒" /></span>
        <b>服务器信息</b>
    </div>
    
    <ul class="infolist">
    <li><span>服务器软件：</span></li>
    <li><span>开发语言：</span></li>
    <li><span>数据库:</span></li>
    </ul>
    
    <div class="xline"></div>
    
    <div class="uimakerinfo"><b>版权所有：爱家网</b>(<a href="http://www.myweb.com" target="_blank">www.myweb.com</a>)</div>
    
 
    
    
    </div>
    
    

</body>

</html>