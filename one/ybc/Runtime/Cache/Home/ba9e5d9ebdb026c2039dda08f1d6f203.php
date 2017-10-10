<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Home/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Home/js/kindeditor/kindeditor-all-min.js"></script>
<style type="text/css">
    .forminfo b{color: deepskyblue;font-size: 16px}
    .forminfo textarea{width:420px;height:69px;border: 1px solid lightgray;line-height: 60px;text-align: center;font-size: 15px}
    .forminfo li{list-style: none;margin-top: 20px;}
</style>
</head>
<body>
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">
    <ul class="forminfo">
        <li><label><b>商品信息：</b></label>
            <img src="/Uploads/goodsPic/100/100_<?php echo ($goodsInfo['pic']); ?>" /><br/>
            <span style="margin-left: 90px;">名称:  <?php echo ($goodsInfo['goodsname']); ?></span>
        </li>
        <li><label><b>评价内容：</b></label>
            <textarea readonly><?php echo ($commentInfo['text']); ?></textarea>
        </li>
        <li><label><b>评价级别：</b></label>
            <?php if(($commentInfo['level']) == "1"): ?>好评<?php endif; ?>
            <?php if(($commentInfo['level']) == "2"): ?>中评<?php endif; ?>
            <?php if(($commentInfo['level']) == "3"): ?>差评<?php endif; ?>
        </li>
        <li><label><b>评价时间：</b></label>
            <?php echo (date('Y-m-d H:i:s',$commentInfo['addtime'])); ?>
        </li>
        <li><label><b>商家回复：</b></label>
            <textarea readonly><?php echo ($aCommentInfo['text']?$aCommentInfo['text']:'暂无'); ?></textarea>
        </li>
        <li><label><b>回复时间：</b></label>
            <?php echo (date('Y-m-d H:i:s',$aCommentInfo['addtime']?$aCommentInfo['addtime']:'暂无')); ?>
        </li>
    </ul>
    </div>
	</div>
    </div>
</body>
<script type="text/javascript">
    $(function(){

    })
</script>
</html>