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
<script type="text/javascript" src="/PublicAdmin/editor/kindeditor.js"></script>

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
                <form action="<?php echo U('rbac/addUserHandle');?>" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
                    <ul class="forminfo">
                        <li><label>管理员名<b>*</b></label><input name="username" type="text" class="dfinput" value=""  style="width:300px;"/></li>
                        <li><label>密码<b>*</b></label><input name="password" type="text" class="dfinput" value=""  style="width:300px;"/></li>
                        <li><label>确认密码<b>*</b></label><input name="qpassword" type="text" class="dfinput" value=""  style="width:300px;"/></li>
                        <li><label>所属角色<b>*</b></label>
                            <div class="vocation">
                                <select class="select1" name="role_id">
                                <?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>    
                                </select>

                            </div>
                        </li>
                        <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="添加管理员"/></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>
</html>