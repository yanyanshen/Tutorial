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
        <td style='width:54pt' align="center">用户名</td>
        <td style='width:54pt' align="center">订单序列号</td>
        <td style='width:54pt' align="center">商品价格</td>

        <td style='width:54pt' align="center">订单创建时间</td>
        <td style='width:54pt' align="center">订单状态</td>
    </tr>
    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
            <td style="text-align: center"><?php echo ($k+$firstRow); ?></td>
            <td style="text-align: center;width: 240px;"><?php echo ($val["username"]); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($val["orderno"]); ?></td>
            <td style="text-align: center;width: 60px;"><?php echo ($val["price"]); ?></td>
   
            <td style="text-align: center;width: 100px;"><?php echo date('Y-m-d H:i:s',$val['create_time']);?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($val["statusname"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>