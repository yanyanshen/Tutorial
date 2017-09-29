<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script language="JavaScript" src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
    <script language="JavaScript" src="/Public/Admin/js/layer/layer.js"></script>
</head>
<body>
<input type="button" class="btn" value="清空缓存" style="width:100px; height:40px; background-color: #3994C8; font-size:16px; color:#fff; text-align: center" >
</body>
<script type="text/javascript">
    $(".btn").click(function(){
        $.post("<?php echo u('/Home/Index/clearAllCache');?>",null,function(res){
            layer.alert(res);
        })
    })
</script>
</html>