<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员详情</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <style>

        td{
            border-bottom: 1px solid #ccc;

        }
        .t1{
            width: 250px;
        }
        .te{
            font-size: 26px;
            text-decoration: double;
            color: orangered;
            margin: 20px auto;
            text-align: center;

        }
    </style>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>
<div class="te">用户详情</div>
<?php if(is_array($abc)): $i = 0; $__LIST__ = $abc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><table style="margin:0 auto; ;width:400px;height: 500px;letter-spacing: 0px">
    <tr>
        <td class="t1">姓名:</td><td><?php echo ($val["username"]); ?></td>
    </tr>
    <tr>
        <td class="t1">id:</td><td><?php echo ($val["id"]); ?></td>
    </tr>
    <tr>
        <td class="t1">性别:</td>

        <?php if($val['gender'] == 0): ?><td>男</td>
            <?php elseif($val['gender'] == 1): ?>
            <td>女</td>
            <?php else: ?>
            <td>保密</td><?php endif; ?>

    </tr>
    <tr>

        <td class="t1" >等级:</td><td style="color: red"><?php echo ($val["level_name"]); ?></td>
    </tr>
    <tr>
        <td class="t1">金钱:</td><td><?php echo ($val["money"]); ?></td>
    </tr>
    <tr>
        <td class="t1">总花费:</td><td><?php echo ($val["costs"]); ?></td>
    </tr>
    <tr>
        <td class="t1">积分:</td><td><?php echo ($val["credit"]); ?></td>
    </tr>
    <tr>
        <td class="t1">QQ:</td><td><?php echo ($val["qq"]); ?></td>
    </tr>
    <tr>
        <td class="t1">手机号:</td><td><?php echo ($val["mobile"]); ?></td>
    </tr>
    <tr>
        <td class="t1">邮箱地址:</td><td><?php echo ($val["email"]); ?></td>
    </tr>
    <tr>
        <td class="t1">用户状态:</td>
        <?php if($val['active'] == 1): ?><td>已启用</td>
            <?php else: ?>
                <td>已禁用</td><?php endif; ?>
    </tr>
    <tr>
        <td class="t1">注册时间:</td><td><?php echo date("Y-m-d H:i:s",$val['addtime']);?></td>
    </tr>

</table><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>