<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>

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
            <li><a href="#">系统设置</a></li>
        </ul>
    </div>

    <div class="formbody">
        <div id="usual1" class="usual">
            <div id="tab1" class="tabson">
                <form action="<?php echo U('Rbac/addRoleHandle');?>" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
                    <ul class="forminfo">
                        <li>
                            <label>角色名称<b>*</b></label>
                            <input name="name" type="text" class="dfinput" value=""  style="width:344px;"/>
                        </li>
                        <li>
                            <label>角色描述<b>*</b></label>
                            <input name="remark" type="text" class="dfinput" value=""  style="width:344px;"/>
                        </li>

                        <li>
                            <label>是否开启<b>*</b></label>
                            <div>
                                <input type="radio" name="status" value="0">&nbsp;关闭&nbsp;<input type="radio" name="status" value="1" checked="true">&nbsp;开启&nbsp;
                            </div>
                        </li>

                        <li>
                            <input name="pid" type="hidden" value="0"/>
                            <label>&nbsp;</label><input name="" type="submit" class="btn" value="马上添加"/>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>
</html>