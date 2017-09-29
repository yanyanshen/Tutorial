<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>魔吻巧克力</title>
</head>
<body>
<?php if(is_array($adData)): $i = 0; $__LIST__ = $adData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adVal): $mod = ($i % 2 );++$i; echo ($adVal["prod_id"]); echo ($adVal["prod_name"]); echo ($adVal["prod_area"]); ?><img src="/Uploads/Prod/<?php echo ($adVal["prod_pic"]); ?>" alt=""/><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>