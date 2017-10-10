<?php if (!defined('THINK_PATH')) exit();?>
    <table class="tablelist">
            <thead>
            <tr>
                <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                <th>品牌logo</th>
                <th>品牌名称</th>
                <th>添加时间</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
        <tbody>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                <td><?php echo ($k+$firstrow); ?></td>
                <td><img src="/Uploads/brandsPic/logopic/100_<?php echo ($val['pic']); ?>" alt=""/></td>
                <td><?php echo ($val['brandname']); ?></td>
                <td><?php echo (date("Y-m-d H:s:i",$val['addtime'])); ?></td>
                <td><?php echo ($val['active']==0?'下架':'展示'); ?></td>
                <td><a  onclick="javascript:active(<?php echo ($val['id']); ?>);" style="cursor: pointer"   class="tablelink"><?php echo ($val['active']==0?'展示':'下架'); ?></a>   |  <a onclick="javascript:delet(<?php echo ($val['id']); ?>)" style="cursor: pointer" class="tablelink">删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
        <div class="pagin">
            <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($firstrow/3+1); ?>&nbsp;</i>页</div>
            <ul class="paginList">
                <li class="pag"><?php echo ($page); ?></li>
            </ul>
        </div>