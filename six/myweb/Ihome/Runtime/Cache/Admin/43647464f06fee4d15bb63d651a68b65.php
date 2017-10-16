<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>商品详细信息</title>
        <style>
            #content dt{font-size: 25px;font-weight: bolder;color:#3EAFE0;}
            #content dd{font-size: 20px;width: 850px;}
        </style>
    </head>
    <body>
        <div><img src="/Public/Upload/Goodspic/thumb_390_<?php echo ($goodsinfo["pic"]); ?>" alt="" style="position: relative;float:left;width:250px;height:250px;"/></div>
        <div style="position: relative;float: left;left: 10px;" id="content">
            <dt>商品名称:</dt>
            <dd><?php echo ($goodsinfo["goodsname"]); ?></dd>
            <dt>发布时间:</dt>
            <dd><?php echo (date("Y-m-d  H:i",$goodsinfo["createtime"])); ?></dd>
            <dt>商品描述:</dt>
            <dd><?php echo ($goodsinfo["description"]); ?></dd>
        </div>
    </body>
</html>