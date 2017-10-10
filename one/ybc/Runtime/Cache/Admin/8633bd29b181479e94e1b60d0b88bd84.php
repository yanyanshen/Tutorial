<?php if (!defined('THINK_PATH')) exit();?>
<table class="tablelist">
    <thead>
    <tr>

        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>分类名称</th>
        <th>上级分类</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>



    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
            <td><?php echo ($k+$firstRow); ?></td>
            <td><?php echo ($val["adcatename"]); ?></td>
            <td><?php echo ($val["path"]); ?></td>
            <td><?php echo ($val['active']==1?'展示':'下架'); ?></td>
            <td><a onclick="javascript:active(<?php echo ($val['id']); ?>);" style="cursor:pointer;" class="tablelink"><?php echo ($val['active']==0?'展示':'下架'); ?></a>  &nbsp;&nbsp;&nbsp;
                <a onclick="javascript:del(<?php echo ($val['id']); ?>);" class="tablelink" style="cursor:pointer;">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    <?php if(empty($list)): ?><tr align="center">
            <td colspan="5">没有查询到任何相关分类</td>
        </tr><?php endif; ?>

    </tbody>
</table>

<!-- 分页信息-->

<div class="pagin">
    <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($firstRow/4+1); ?>&nbsp;</i>页</div>
    <ul class="paginList">
        <li class="pag"><?php echo ($page); ?></li>
    </ul>
</div>