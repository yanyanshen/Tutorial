<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员列表</title>
    <link rel="stylesheet" href="/Public/Admin/css/common.css">
    <link rel="stylesheet" href="/Public/Admin/css/main.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/colResizable-1.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>

    <script type="text/javascript">
        $(function(){
            $(".list_table").colResizable({
                liveDrag:true,
                gripInnerHtml:"<div class='grip'></div>",
                draggingClass:"dragging",
                minWidth:30
            });

        });
    </script>
</head>
<body>

<div id="table" class="mt10">
    <div class="box span10 oh">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table" style="text-align: center">
            <tr>
                <th width="30">管理员编号</th>
                <th width="50">管理员账号</th>
                <th width="50">管理员等级</th>
                <th width="50">操作</th>
            </tr>
            <?php if(is_array($adminList)): $i = 0; $__LIST__ = $adminList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr">
                    <td class="td_center"><?php echo ($vo["id"]); ?></td>
                    <td><?php echo ($vo["username"]); ?></td>
                    <td><?php echo ($vo["level"]); ?></td>
                    <td><a href="<?php echo u('editAdmin',array('id'=>$vo['id']));?>">编辑</a>&nbsp;&nbsp;<a href="<?php echo u('delAdmin',array('id'=>$vo['id']));?>">删除</a> </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>

    </div>
</div>
</body>
</html>