<?php if (!defined('THINK_PATH')) exit();?><ul>
<?php if(is_array($point)): $i = 0; $__LIST__ = $point;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="Integral_Number">你的总积分：<b><?php echo ($v["totalpoints"]); ?>分</b></div>
    <div class="Integral_Number">你当前的积分：<b><?php echo ($v["points"]); ?>分</b></div><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if(empty($integralList)): ?><span style="color: red;font-size: 16px;width: 100px;margin-left:400px ">暂时没有数据</span>
        <?php else: ?>
<table>
    <thead>
    <tr>
        <td>积分获取订单号</td>
        <td>订单金额</td>
        <td>积分</td>
        <td>获取日期</td>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($integralList)): $i = 0; $__LIST__ = $integralList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($val["ordersyn"]); ?></td>
            <td>￥<?php echo ($val["orderprice"]); ?></td>
            <td><?php echo ($val["points"]); ?>分</td>
            <td><?php echo (date('Y-m-d H:i:s',$val["addtime"])); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    </tbody>
</table>
<div>
    <div class="message">共<i><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i style="color: deepskyblue"><?php echo ($firstRow/5+1); ?>&nbsp;</i>页</div>
    <div class="page" onclick="search()" style="float:right;"><?php echo ($page); ?></div>
</div><?php endif; ?>
</ul>