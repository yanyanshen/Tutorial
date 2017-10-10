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
        <td colspan="12" align="center">
            <h2>商品列表</h2>
        </td>
    </tr>
    <tr>
        <td style='width:54pt' align="center">编号</td>
        <td style='width:54pt' align="center">ID</td>
        <td style='width:54pt' align="center">商品名称</td>
        <td style='width:54pt' align="center">商品分类</td>
        <td style='width:54pt' align="center">商品品牌</td>
        <td style='width:54pt' align="center">市场价格</td>
        <td style='width:54pt' align="center">商城价格</td>
        <td style='width:54pt' align="center">商品规格</td>
        <td style='width:54pt' align="center">商品库存</td>
        <td style='width:54pt' align="center">添加时间</td>
        <td style='width:54pt' align="center">备注</td>
        <td style='width:54pt' align="center">状态</td>
    </tr>
    <?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
            <td style="text-align: center"><?php echo ($k); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($val['id']); ?></td>
            <td style="text-align: center;width: 200px;"><?php echo ($val['goodsname']); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($val['path']); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($val['brandname']); ?></td>
            <td style="text-align: center;width: 150px;">￥<?php echo ($val['oldprice']); ?></td>
            <td style="text-align: center;width: 150px;">￥<?php echo ($val['price']); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($val['weight']); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($val['num']); ?></td>
            <td style="text-align: center;width: 200px;"><?php echo date("Y-m-d H:i:s",$val['addtime']);?></td>
                <?php if(($val['group'] == 1)): ?><td style="text-align: center;width: 50px;">团购商品</td>
                <?php elseif(($val['ad'] == 1)): ?>
                <td style="text-align: center;width: 50px;">广告商品</td>
                <?php else: ?>
                <td>无</td><?php endif; ?>

            <td style="text-align: center;width: 50px;"><?php echo ($val['active']==0?'下架':'展示'); ?></td>

        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>