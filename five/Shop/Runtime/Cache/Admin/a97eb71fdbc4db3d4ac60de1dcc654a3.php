<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div>

    <p>文档标题：<?php echo ($info['title']); ?></p>
    <p>文档作者：<?php echo ($info['author']); ?></p>
    <p>文档类别：<?php echo ($info['cate']); ?></p>
    <p>文档内容：<?php echo ($info['content']); ?></p>
</div>
</body>
</html>