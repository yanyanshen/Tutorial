<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员详情</title>
    <link rel="stylesheet" href="/Public/Admin/css/reg.css">
    <script src="/Public/Admin/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Admin/js/lr.js"></script>

</head>
<body>

<!-- 添加模块开始 -->
<div class="reg wid_1200">
    <ul class="clearfix">
        <li><a href="#">会员详情</a></li>

    </ul>
    <div>
        <form>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p>用户名：<input type="text" name="usename" value="<?php echo ($v["username"]); ?>"></p><br />
            <p>性&nbsp;&nbsp;&nbsp;&nbsp;别：<input type="text" value="<?php echo ($v["sex"]); ?>" name="username"></p><br />
            <p>出生日期：<input type="text" class="password" name="birthday" value=<?php echo ($v["year"]); ?>-<?php echo ($v["month"]); ?>-<?php echo ($v["day"]); ?>></p><br />
            <p>手机号：<input type="text" name="mobile" value="<?php echo ($v["mobile"]); ?>"></p><br />
            <p>E-mail：<input type="text" name="email" value="<?php echo ($v["email"]); ?>"></p><br />
            <p>创建时间：<input type="text" name="createtime" value="<?php echo (date('Y-m-d H:i:s',$v["createtime "])); ?>"></p><br />
            <p>上次登录时间：<input type="text" name="lastlogintime" value="<?php echo (date('Y-m-d H:i:s',$v["lastlogintime"])); ?>"></p><br />
            <p>上次登录ip：<input type="text" name="lastloginip" value="<?php echo ($v["lastloginip"]); ?>"></p><br /><?php endforeach; endif; else: echo "" ;endif; ?>
            </form>
    </div>

</div>
</body>
</html>