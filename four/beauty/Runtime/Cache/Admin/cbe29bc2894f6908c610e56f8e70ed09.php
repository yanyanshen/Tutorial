<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>

    <style type="text/css">

        input{
            margin-bottom: 6px;
        }
        lable.error{
            font-size: 14px;
            font-weight: bold;
            color: #FF0000;
        }
        lable.ok{
            font-size: 14px;
            font-weight: bold;
            color: #38D63B;
        }

    </style>
<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
</script>
  
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">信息管理</a></li>
    <li><a href="#">站内信内容</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">

    <ul class="forminfo">
    <li><label>发件人<b>*</b></label><input value="<?php echo ($username); ?>" class="dfinput" disabled /></li>
    <li><label>主题<b>*</b></label><input value="<?php echo ($title); ?>" type="text" class="dfinput" disabled /></li>
    <li><label>内容<b>*</b></label><textarea style="width:345px;height:300px;border: 1px solid #D4E7F0;font-size: 16px" disabled ><?php echo ($content); ?></textarea></li>
    <li><label>&nbsp;</label><a href="<?php echo U('Message/index');?>"><input type="button" class="btn" value="返回"/></a></li>
    </ul>

    </div>
	</div>
    </div>
</body>


</html>