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
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all-min.js"></script>
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
<style type="text/css">
    .forminfo b{color: deepskyblue;font-size: 16px}
    .forminfo textarea{width:420px;height:69px;border: 1px solid lightgray;line-height: 60px;text-align: center;font-size: 15px}
</style>
</head>
<body>
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">评价列表</a></li>
    <li><a href="#">评价详情</a></li>
    </ul>
    </div>
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">

    <ul class="forminfo">
    <form action="<?php echo U('editComment');?>" method="post">
    <li><label><b>商品信息：</b></label>
        <input name="" type="text" class="dfinput" readonly value="ID:<?php echo ($goodsInfo['id']); ?>  名称:  <?php echo ($goodsInfo['goodsname']); ?>" style="width:520px;font-size: 15px;"/>
    </li>
   
    <li><label><b>用户名&nbsp;&nbsp;&nbsp;：</b></label>
        <input type="text" class="dfinput" readonly value="<?php echo ($memberName); ?>" style="width:129px;"/>
    </li>
    
    <li><label><b>评价内容：</b></label>
        <textarea readonly><?php echo ($commentInfo['text']); ?></textarea>
    </li>

    <li><label><b>评价级别：</b></label>
        <?php if(($commentInfo['level']) == "1"): ?><input type="text" class="dfinput" readonly value="好评" style="width:129px;"/><?php endif; ?>
        <?php if(($commentInfo['level']) == "2"): ?><input type="text" class="dfinput" readonly value="中评" style="width:129px;"/><?php endif; ?>
        <?php if(($commentInfo['level']) == "3"): ?><input type="text" class="dfinput" readonly value="差评" style="width:129px;"/><?php endif; ?>
    </li>

    <li><label><b>评价时间：</b></label>
        <input type="text" class="dfinput" readonly value="<?php echo (date('Y-m-d H:i:s',$commentInfo['addtime'])); ?>" style="width:169px;"/>
    </li>

    <?php if($aCommentInfo): ?><li><label><b>回复人&nbsp;&nbsp;&nbsp;：</b></label>
            <input type="text" class="dfinput" readonly value="<?php echo ($adminName); ?>" style="width:129px;"/>
        </li>
        <li><label><b>回复内容：</b></label>
            <textarea readonly><?php echo ($aCommentInfo['text']); ?></textarea>
        </li>
        <li><label><b>回复时间：</b></label>
            <input type="text" class="dfinput" readonly value="<?php echo (date('Y-m-d H:i:s',$aCommentInfo['addtime'])); ?>" style="width:169px;"/>
        </li>
        <li><label>&nbsp;</label><input type="button" id="ok" class="btn" value="返回"/></li>
    <?php else: ?>
        <li><label><b>回复Ta：</b></label>
            <textarea name="aComment" ></textarea>
        </li>
        <li><label>&nbsp;</label><input type="button" class="btn" id="reply" value="确认回复"/></li>
        <li><label>&nbsp;</label><input type="button" id="ok" class="btn" value="返回"/></li><?php endif; ?>
    </form>
    </ul>
    
    </div>
	</div>
    </div>
</body>
<script type="text/javascript">
    $(function(){
        $('#ok').click(function(){
            location.href="<?php echo U('commentList');?>";
        })
        $('#reply').click(function(){
            $.post("<?php echo U('editComment');?>",{ cid:<?php echo ($commentInfo['id']); ?>,aComment:$('[name="aComment"]').val()},function(res){
                if(res.status==1){
                    layer.msg(res.info,{time:1500,icon:1},function(){
                        location=window.location.href;
                    });
                }else{
                    layer.msg(res.info,{time:1500,icon:6});
                }
            });
        })
    })
</script>
</html>