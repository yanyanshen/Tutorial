<?php if (!defined('THINK_PATH')) exit();?><div style="font-size: 13px; margin: 10px 5px; position:relative;" id="div">
    <form action=""></form>
    <table class="table_a" border="1" width="100%">
        <thead><tr style="font-weight: bold;">
            <td>序号</td>
            <td>用户名</td>
            <td>商品名称</td>
            <td>图片</td>
            <td>订单号</td>
            <td>星级评价</td>
            <td>评价时间</td>
            <td>是否已回复</td>
            <td align="center">操作</td>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="product1">
                <td><?php echo ($k); ?></td>
                <td><?php echo ($vo["username"]); ?></td>
                <td><a href="#" style="text-decoration: none"><?php echo ($vo["goodsname"]); ?></a></td>
                <td><img src="/uploads/n3/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>" height="60" width="60"></td>
                <td><?php echo ($vo["oid"]); ?></td>
                <td><?php echo ($vo["level"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$vo["pjtime"])); ?></td>
                <td><?php echo ($vo['return']?'已回复':'未回复'); ?></td>
                <td>
                    <a href="<?php echo U('pingjia/pingjiaReturn',array('id'=>$vo['id']),'');?>" style="text-decoration: none"><?php echo ($vo['return']?'':'回复'); ?></a>
                    <a href="<?php echo U('pingjia/pingjiaDetail',array('id'=>$vo['id']),'');?>" style="text-decoration: none"><?php echo ($vo['return']?'详情':''); ?></a>
                    <a href="#"  class="del" name="<?php echo ($vo['id']); ?>" style="text-decoration: none">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
        <tr>
            <td colspan="20" style="text-align: center;">
                <div class="pages"><?php echo ($show); ?></div>
            </td>
        </tr>
        </tbody>
    </table>
</div>