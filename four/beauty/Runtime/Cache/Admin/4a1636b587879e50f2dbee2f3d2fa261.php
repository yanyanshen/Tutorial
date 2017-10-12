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
            <h2>商品列表</h2>
        </td>
    </tr>
    <tr>
        <td style='width:54pt' align="center">编号</td>
        <td style='width:54pt' align="center">商品名称</td>
        <td style='width:54pt' align="center">销售价格</td>
        <td style='width:54pt' align="center">市场价格</td>
        <td style='width:54pt' align="center">分类</td>
        <td style='width:54pt' align="center">品牌</td>
        <td style='width:54pt' align="center">销售数量</td>
        <td style='width:54pt' align="center">库存</td>
    </tr>
    <?php if(is_array($goodsinfo)): $k = 0; $__LIST__ = $goodsinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><tr>
            <td style="text-align: center"><?php echo ($k); ?></td>
            <td style="text-align: center;width: 240px;"><?php echo ($v["goodsname"]); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($v["saleprice"]); ?></td>
            <td style="text-align: center;width: 60px;"><?php echo ($v["marketprice"]); ?></td>
            <td style="text-align: center;width: 200px;"><?php echo ($v["cname"]); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($v["bname"]); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($v["salenum"]); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($v["num"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>