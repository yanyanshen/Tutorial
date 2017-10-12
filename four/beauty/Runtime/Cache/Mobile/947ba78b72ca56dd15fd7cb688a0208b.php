<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link href="/beauty/Public/Mobile/goodsdetail/css/mall.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="child_header">
    <!--可以返回到上一个页面，相当于是历史页面-->
    <div class="goback"><a href="javascript:history.back(-1)"><i></i></a></div>
    <div class="current_location"><span>图文详情</span></div>
</div>
<div class="goods_box">
    <?php if(is_array($fuimg)): $i = 0; $__LIST__ = $fuimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fu): $mod = ($i % 2 );++$i;?><img src="/Uploads/<?php echo ($fu["picurl"]); echo ($fu["picname"]); ?>" width="100%"><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</body>
</html>