<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" type="image/x-icon" href="/Public/Admin/images/logo.ico" media="screen" />
<title>一杯茶系统管理后台</title>
</head>

<frameset rows="88,*,31" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="<?php echo U('top');?>" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset cols="187,*" frameborder="no" border="0" framespacing="0">
    <frame src="<?php echo U('left');?>" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="<?php echo U('main');?>" name="rightFrame" id="rightFrame" title="rightFrame" />
  </frameset>
  <frame src="<?php echo U('footer');?>" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" title="bottomFrame" />
  <noframes>
  	<body>
		你的浏览器不支持框架集
	</body>
  </noframes>
</frameset>

</html>