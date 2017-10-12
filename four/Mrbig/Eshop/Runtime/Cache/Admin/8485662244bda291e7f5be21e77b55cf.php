<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <title>瑞曼科技 - 网站后台管理中心</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="达人家具网站后台" />
    <meta name="keywords" content="达人，网站后台，电商网站" />
    <meta name="Author" content="MrBig" />
    <meta name="CopyRight" content="达人家具" />
</head>
<frameset rows="64,*"  frameborder="no" border="0" framespacing="0">
    <!--头部-->
    <frame src="<?php echo U('Admin/Index/top');?>" name="top" noresize="noresize" frameborder="0"  scrolling="no" marginwidth="0" marginheight="0" />
    <!--主体部分-->
    <frameset cols="185,*">
        <!--主体左部分-->
        <frame src="<?php echo U('Admin/Index/left');?>" name="left" noresize="noresize" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" />
        <!--主体右部分-->
        <frame src="<?php echo U('Admin/Index/main');?>" name="main" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" />
</frameset>
</html>