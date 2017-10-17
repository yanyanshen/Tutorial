<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/node.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
    <script type="text/javascript">
        $(function(){
            $('input[level=1]').click(function(){
                var inputs=$(this).parents('.app').find('input');
                $(this).attr('checked')?inputs.attr('checked','checked'):
                        inputs.removeAttr('checked');
            });
            $('input[level=2]').click(function(){
                var inputs=$(this).parents('dl').find('input');
                $(this).attr('checked')?inputs.attr('checked','checked'):
                        inputs.removeAttr('checked');
            });
        });
    </script>
    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
        });
    </script>
</head>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

            <form method="post" action="<?php echo U('Rbac/setAccess');?>" name="listForm">
            <div id="wrap">
                <a href="<?php echo U('Rbac/rolelist');?>" class="add-app">返    回</a>
                <?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
                        <p>
                            <input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>_1" level="1" <?php if($app['access']): ?>checked='checked'<?php endif; ?>/>
                            <strong><?php echo ($app["title"]); ?></strong>
                        </p>
                        <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
                                <dt style="margin:0px 20px;">
                                    <input type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>_2" level="2" <?php if($action['access']): ?>checked='checked'<?php endif; ?>/>
                                    <strong style=><?php echo ($action["title"]); ?></strong>
                                </dt>
                                <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd style="float:left;margin:20px 40px;">
                                        <input type="checkbox" name="access[]" value="<?php echo ($method["id"]); ?>_3" level="3" <?php if($method['access']): ?>checked='checked'<?php endif; ?>/>
                                        <strong><?php echo ($method["title"]); ?></strong>
                                    </dd><?php endforeach; endif; ?>
                            </dl><?php endforeach; endif; ?>
                        </div><?php endforeach; endif; ?>
        </div>
        <input type="hidden" name="rid" value="<?php echo ($rid); ?>"/>
       <input type="submit" value="保  存" style="display:block;width: 100px;height:28px; margin: 20px auto;cursor:pointer;background: #0b99d8;color: #fff;border-radius:4px;"/>
      </form>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</body>
</html>