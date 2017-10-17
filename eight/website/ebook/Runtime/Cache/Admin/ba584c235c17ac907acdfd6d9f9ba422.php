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
                <form action="<?php echo U('Rbac/addNodeHandle');?>" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
                    <ul class="forminfo">
                        <li>
                            <label>英文名称<b>*</b></label>
                            <input name="name" type="text" class="dfinput" value=""  style="width:344px;"/>
                        </li>
                        <li>
                            <label>显示中文名称<b>*</b></label>
                            <input name="title" type="text" class="dfinput" value=""  style="width:344px;"/>
                        </li>

                        <li>
                            <label>状态<b>*</b></label>
                            <div>
                                <input type="radio" name="status" value="0">&nbsp;禁用&nbsp;
                                <input type="radio" name="status" value="1" checked="true">&nbsp;开启&nbsp;
                            </div>
                        </li>
                        <li><label>类型<b>*</b></label>
                            <div class="vocation">
                                <select class="select1" name="level">
                                    <option value="1">项目</option>
                                    <option value="2">模板</option>
                                    <option value="3">操作</option>
                                </select>

                            </div>
                        </li>
                        <li><label>父节点<b>*</b></label>
                            <div class="vocation">
                                <select class="select1" name="pid">
                                    <option value="0">根节点</option>
                                    <?php if(is_array($node)): $i = 0; $__LIST__ = $node;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['level'] == 1): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php else: ?><option value="<?php echo ($vo["id"]); ?>">&nbsp;&nbsp;|&nbsp;<?php echo ($vo["title"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <label>排序<b>*</b></label>
                            <input name="sort" type="text" class="dfinput" value="<?php echo ($node["sort"]); ?>"  style="width:344px;"/>
                        </li>


                        <li>
                            <label>&nbsp;</label><input name="" type="submit" class="btn" value="马上发布"/>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>
</html>