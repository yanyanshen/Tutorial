<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php if(is_array($imgInfo)): $i = 0; $__LIST__ = $imgInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><img src="/CommentImg/<?php echo ($v["imageurl"]); echo ($v["imagename"]); ?>" alt=""/><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>