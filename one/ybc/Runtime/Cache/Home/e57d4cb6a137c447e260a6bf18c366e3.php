<?php if (!defined('THINK_PATH')) exit();?><ul>
    <?php if(empty($consume)): ?><div class="Integral_Number"><em></em>你消费的积分：<b>0分</b></div>
        <?php else: ?>
        <div class="Integral_Number"><em></em>你消费的积分：<b><?php echo ($consume); ?>分</b></div><?php endif; ?>
        <?php if(is_array($point)): $i = 0; $__LIST__ = $point;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="Integral_Number">当前剩余积分：<b><?php echo ($v["points"]); ?>分</b></div><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if(empty($order)): ?><span style="color: red;font-size: 16px;width: 100px;margin-left:400px ">暂时没有数据</span>
        <?php else: ?>
        <table>
            <thead>
            <tr>
                <td style="width: 188px">积分兑换订单号</td>
                <td style="width: 188px">消耗积分</td>
                <td style="width: 188px">兑换日期</td>
                <td style="width: 188px">订单状态</td>
                <td style="width: 188px">操作</td>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valu): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($valu["ordersyn"]); ?></td>
                    <td style="color: #FF0000"><?php echo ($valu["orderpoints"]); ?>分</td>
                    <td><?php echo (date('Y-m-d H:i:s',$valu["addtime"])); ?></td>
                    <td><?php echo ($valu["orderstatus"]); ?></td>
                    <td>
                        <a href="<?php echo U('IntegralOrder/lookorder');?>?id=<?php echo ($valu["id"]); ?>" style="color: #0099FF">查看</a>
                        <?php if(($valu['status'] == 1) OR ($valu['status'] == 3)): ?><a onclick="mnext(<?php echo ($valu["id"]); ?>,<?php echo ($valu["status"]); ?>);" style="cursor: pointer;color: #0099FF"><?php echo ($valu["mnext"]); ?></a><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div>
            <div class="message">共<i><?php echo ($count1); ?></i>条记录，当前显示第&nbsp;<i style="color: deepskyblue"><?php echo ($firstRow1/5+1); ?>&nbsp;</i>页</div>
            <div class="page" onclick="search1()" style="float:right;"><?php echo ($page); ?></div>
        </div><?php endif; ?>
</ul>