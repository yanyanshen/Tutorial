<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
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
    <form action="" method="post" id="form1">
        <div id="usual1" class="usual">
            <div id="tab1" class="tabson">
                <ul class="forminfo">
                    <li><label>分类名称<b>*</b></label>
                        <input name="class_name" type="text" value="<?php echo ($class_name); ?>" class="dfinput" style="width:167px;">
                    </li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="提交"/></li>
                </ul>
            </div>
        </div>
    </form>
</div>
</body>
<script type="text/javascript">
    $(function(){
        $("#form1").submit(function(){
            if(!$("[name='class_name']").val()){
                $(".forminfo li").eq(1).append("<b>分类名称不能为空</b>");
                return false;
            }
            $.post("<?php echo u('Class/editClass');?>",$("#form1").serialize(),function(res){
                layer.alert(res);
            });
            return false;

        });
    });
</script>
</html>