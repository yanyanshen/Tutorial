<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>

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
        <li><a href="<?php echo U('Admin/index');?>">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('Gory/gory_edit');?>" method="post">
                <input type="hidden" name="cid" value="<?php echo ($thisCate["cid"]); ?>" />  <!--隐藏域-->
                <ul class="forminfo">
                    <li><label>上级分类<b>*</b></label>
                        <div class="vocation">
                            <select class="select2" name="pid" >
                                <option>添加分类</option>
                                <option value="0" >顶级分类</option>
                                <?php if(is_array($infoL)): $i = 0; $__LIST__ = $infoL;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["cid"]); ?>"  <?php if(($vol["cid"]) == $thisCate["pid"]): ?>selected<?php endif; ?> >
                                    <?php echo ($vol["cname"]); ?><br>
                                    </option>
                                    </option><?php endforeach; endif; else: echo "" ;endif; ?>

                            </select>
                        </div>

                    </li>
                    <li><label>分类名称<b>*</b></label>
                        <input name="cname" type="text" class="dfinput" value="<?php echo ($thisCate["cname"]); ?>"  style="width:167px;"/></li>

                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认编辑"/></li>
                </ul>
            </form>
        </div>

    </div>

</div>


</body>

</html>