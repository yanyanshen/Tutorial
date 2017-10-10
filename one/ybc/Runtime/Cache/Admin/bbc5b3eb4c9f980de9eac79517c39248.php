<?php if (!defined('THINK_PATH')) exit();?>
<table class="tablelist">
    <thead>
    <tr>
        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>标题</th>
        <th>作者</th>
        <th>标签</th>
        <th>文章简介</th>
        <th>发布时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>



    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
            <td><?php echo ($k+$firstRow); ?></td>
            <td><?php echo ($val["title"]); ?></td>
            <td><?php echo ($val["author"]); ?></td>
            <td><?php echo ($val["teatag"]); ?></td>
            <td><?php echo (truncate_cn($val["descript"],100,'',0)); ?>......</td>
            <td><?php echo (date("Y-m-d H:i:s",$val["dateline"])); ?></td>
            <td><a href="<?php echo U('modify');?>?id=<?php echo ($val['id']); ?>" class="tablelink">修改</a> &nbsp;&nbsp;&nbsp;&nbsp;
                <a onclick="javascript:active(<?php echo ($val['id']); ?>);"   style="cursor: pointer" class="tablelink">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    <?php if(empty($list)): ?><tr align="center">
            <td colspan="7">没有查询到所需条件的相关文章</td>
        </tr><?php endif; ?>



    </tbody>
</table>

<div class="pagin">
    <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($firstRow/4+1); ?>&nbsp;</i>页</div>
    <ul class="paginList">
        <li class="pag"><?php echo ($page); ?></li>
    </ul>
</div>