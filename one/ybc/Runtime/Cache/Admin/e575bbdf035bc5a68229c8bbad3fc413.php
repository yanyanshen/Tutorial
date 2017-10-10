<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script src="/Public/Admin/js/layer/layer.js"></script>

</head>
<script type="text/javascript">
    $(function(){
        $("#usual1 ul").idTabs();
        $('.tablelist tbody tr:odd').addClass('odd');
    })
</script>
<script>
    $(function() {
        stopuse = function (id) {
            $.post('<?php echo U("stopuse");?>', {id: id}, function (res) {
                if (res.status == 1) {
                    layer.msg(res.info, {icon: 1}, function () {
                        location = window.location.href;
                    });
                } else {
                    layer.msg(res.info, {icon: 2});
                }
            })
        }
        startuse = function (id) {
            $.post('<?php echo U("startuse");?>', {id: id}, function (res) {
                if (res.status == 1) {
                    layer.msg(res.info, {icon: 1}, function () {
                        location = window.location.href;
                    });
                } else {
                    layer.msg(res.info, {icon: 2});
                }
            })
        }
    })
</script>
<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">权限管理</a></li>
        <li><a href="#">管理员列表</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <table class="tablelist">
                <thead>
                    <tr>
                        <th>用户名</th>
                        <th>所属组</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($adminList)): $i = 0; $__LIST__ = $adminList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr>
                                <td width="150"><?php echo ($value["username"]); ?></td>
                                <td><?php echo ($value["group"]); ?></td>
                                <td>
                                    <?php echo ($value['active']==1?'正常':'禁用'); ?>
                                </td>
                                <td>
                                    <?php if($value['active'] == 1): ?><a style="cursor: pointer;" class="tablelink" onclick="stopuse(<?php echo ($value["id"]); ?>)">禁用</a>
                                    <?php else: ?>
                                        <a style="cursor: pointer;" class="tablelink" onclick="startuse(<?php echo ($value["id"]); ?>)">激活</a><?php endif; ?> ｜
                                        <a href="<?php echo U('edit',array('id'=>$value['id']));?>" class="tablelink">编辑</a>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                </tbody>
            </table>

        </div>

    </div>

</div>
</body>
</html>