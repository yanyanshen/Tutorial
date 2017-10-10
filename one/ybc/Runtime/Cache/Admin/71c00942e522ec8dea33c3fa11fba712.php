<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        body,ul,li{ margin: 0;padding: 0;list-style: none;}
        .myul{ padding: 20px;}
        .myul li{ margin: 10px;}
        .myul li textarea{ resize: none; width: 300px; height: 50px;}

    </style>
</head>
<body>
<form action="">
        <ul class="myul" style="width: 500px; margin: 200px auto; background-color: #ccc; border-radius: 3px;">
            <li><span>标题：</span><input type="text" required placeholder="标题"/></li>
            <li><span>链接：</span><input type="url" required placeholder="标题"/></li>
            <li><span style="line-height: 50px;">内容：</span><textarea name="" id="" cols="30" rows="10"></textarea></li>
            <li style="text-align: center;"><input type="submit" value="发送"/></li>
        </ul>
</form>
</body>
</html>