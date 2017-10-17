<?php if (!defined('THINK_PATH')) exit();?><!--
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <style type="text/css">
        .content{
            margin: 200px;
            color:#008855;
            font-weight: bold;
        }
        .content a{
            color:#ff0000;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="content">
    欢迎您,尊敬的管理员<?php echo (session('admin_name')); ?>,您上次登录时间为<?php echo (session('lastlogintime')); ?>,上次登录IP为<?php echo (session('lastloginip')); ?>,如果此信息您有疑问，请<a href="<?php echo u('Admin/editAdmin',array('id'=>session('admin_uid')));?>">点此修改密码</a>
</div>
</body>
</html>-->
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/Public/Admin/css/right.css">
    <link rel="stylesheet" href="/Public/Admin/css/common.css">
    <link rel="stylesheet" href="/Public/Admin/css/main.css">
</head>
<body>
<div id="forms" class="mt10">
    <div class="box">
        <div class="box_border">
            <div class="box_top"><b class="pl15">当前位置：首页</b></div>
        </div>
    </div>
</div>
<div class="mainindex">
    <div class="welinfo">
        <span><img src="/Public/Admin/images/sun.png" alt="天气" /></span>
        <b>尊敬的管理员：<span style="color:#f00; font-weight: bold;"><?php echo (session('admin_name')); ?>&nbsp;</span>早上好，欢迎使用后台管理系统</b>
    </div>

    <div class="welinfo">
        <span><img src="/Public/Admin/images/time.png" alt="时间" /></span>
        <b>您上次登录时间为：<span style="color:#f00; font-weight: bold;"><?php echo (session('lastlogintime')); ?></span></b>
        <b>上次登录IP为：<span style="color:#f00; font-weight: bold;"><?php echo (session('lastloginip')); ?></span></b>
        如非本人操作，请<a href="<?php echo u('Admin/editAdmin',array('id'=>session('admin_uid')));?>">点此修改密码</a>
    </div>

    <div class="welinfo">
        <span><img src="/Public/Admin/images/dp.png" alt="提醒" /></span>
        <b>服务器信息</b>
    </div>

    <ul class="infolist">
        <li><span>服务器软件：<?php echo ($_SERVER['SERVER_SOFTWARE']); ?></span></li>
        <li><span>开发语言：PHP/5.4.45</span></li>
        <li><span>数据库：<?php echo ($mysql_version); ?></span></li>
    </ul>
</div>
<div class="xline"></div>

</body>
</html>