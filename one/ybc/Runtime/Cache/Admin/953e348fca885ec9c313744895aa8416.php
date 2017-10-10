<?php if (!defined('THINK_PATH')) exit();?><html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:x="urn:schemas-microsoft-com:office:excel"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name=ProgId content=Excel.Sheet>
    <meta name=Generator content="Microsoft Excel 11">
</head>
<body>
<table border=1 cellpadding=0 cellspacing=0 width="100%" >
    <tr>
        <td colspan="6" align="center">
            <h2>订单列表</h2>
        </td>
    </tr>
    <tr>
        <td style='width:54pt' align="center">编号</td>
        <td style='width:54pt' align="center">订单编号</td>
        <td style='width:54pt' align="center">用户名</td>
        <td style='width:54pt' align="center">订单状态</td>
        <td style='width:54pt' align="center">订单时间</td>
        <td style='width:54pt' align="center">订单总价</td>
    </tr>
    <?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($k % 2 );++$k;?><tr>
            <td style="text-align: center"><?php echo ($k); ?></td>
            <td style="text-align: center;width: 240px;"><?php echo ($va["ordersyn"]); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($va["username"]); ?></td>
            <td style="text-align: center;width: 60px;"><?php echo ($va["status"]); ?></td>
            <td style="text-align: center;width: 200px;"><?php echo date("Y-m-d H:i:s",$va['addtime']);?></td>
            <td style="text-align: center;width: 100px;">￥<?php echo ($va["price"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>