<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/laydate/laydate.js"></script>
<script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
<script type="text/javascript">
    $(function(){
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true,
                filterMode: true,
                afterBlur:function(){
                    this.sync('#content7');
                }
            });
        });
    })
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
    <script type="text/javascript">
        $(function(){
            $(".btn").click(function(){
                $.post("<?php echo U('Index/send_message');?>",$("#form1").serialize(),function(res){
                    if(res.status==1){
                        layer.msg(res.info,{icon:6,time:2000},function(){
                            location=location.href;
                        })
                    }else{
                        layer.msg(res.info,{icon:5,time:2000})
                    }
                })
            })
        })
    </script>

</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">系统管理</a></li>
    <li><a href="#">发送站内信</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">

    <form action="" method="post" id="form1">
    <ul class="forminfo">

        <li><label>消息标题<b>*</b></label><input name="title" type="text" class="dfinput" value=""  placeholder="请填写站内信标题" style="width:360px;"/></li>

        <li><label>消息内容<b>*</b></label>
            <textarea id="content7" name="message" style="width:670px;height:250px;visibility:hidden;"></textarea>
        </li>
    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="马上发送"/></li>
    </ul>

    </form>

    </div>
	</div>
    </div>
</body>

</html>