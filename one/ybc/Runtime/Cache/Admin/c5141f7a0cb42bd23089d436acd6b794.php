<?php if (!defined('THINK_PATH')) exit();?>
<table class="tablelist">
        <thead>
        <tr>
            <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
            <th>商品ID</th>
            <th>商品主图</th>
            <th>商品名称</th>
            <th>商品分类</th>
            <th>商品品牌</th>
            <th>市场价格</th>
            <th>商城价格</th>
            <th>商品规格</th>
            <th>商品库存</th>
            <th>添加时间</th>
            <th>备注</th>
            <th>状态</th>
            <th>操作</th>
            <th>编辑</th>
        </tr>
        </thead>
    <tbody class="result">
    <?php if(is_array($goodslist)): $k = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
            <td><?php echo ($k+$firstrow); ?></td>
            <td><?php echo ($val['id']); ?></td>
            <td><img src="/Uploads/goodsPic/100/100_<?php echo ($val['pic']); ?>" alt=""/></td>
            <td><?php echo ($val['goodsname']); ?></td>
            <td><?php echo ($val['path']); ?></td>
            <td><?php echo ($val['brandname']); ?></td>
            <td><?php echo ($val['oldprice']); ?></td>
            <td><?php echo ($val['price']); ?></td>
            <td><?php echo ($val['weight']); ?>/g</td>
            <td><?php echo ($val['num']); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$val['addtime'])); ?></td>
            <?php if(($val['group'] == 1)): ?><td>团购商品</td>
                <?php elseif(($val['ad'] == 1)): ?>
                <td>广告商品</td>
                <?php else: ?>
                <td>无</td><?php endif; ?>
            <td><?php echo ($val['active']==0?'下架':'展示'); ?></td>
            <td><a onclick="javascript:active(<?php echo ($val['id']); ?>);" style="cursor: pointer" class="tablelink"><?php echo ($val['active']==0?'上架':'下架'); ?></a></td>
            <td><a href="<?php echo U('Goods/edit');?>?id=<?php echo ($val['id']); ?>" class="tablelink">编辑</a>   |  <a onclick="javascript:delet(<?php echo ($val['id']); ?>)" style="cursor: pointer" class="tablelink">删除</a>|
                <a class="tablelink" href="<?php echo U('Group/publish',array('id'=>$val['id']));?>">发布团购</a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    </tbody>
</table>
    <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($firstrow/5+1); ?>&nbsp;</i>页</div>
        <ul class="paginList">
            <li class="pag"><?php echo ($page); ?></li>
        </ul>
    </div>