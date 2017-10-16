<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script src="/Public/Admin/js/layer/layer.js"></script>


    <script type="text/javascript">
        $(document).ready(function(e) {
            //异步提交表单
            $('.btn').click(function(){
                $.post("<?php echo U('AuthGroup/edit');?>",$('#form1').serialize(),function(res){
                    if(res.status=="ok"){
                        layer.msg(
                                res.msg,
                                {icon:1,time:2000},
                                function(){
                                    window.location.href="<?php echo U('AuthGroup/showlist');?>";
                                }
                        );
                    }else{
                        layer.alert(res.msg);
                    }
                })
                return false;
            })

      })
  </script>
</head>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">权限管理</a></li>
        <li><a href="#">添加管理组</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('AuthGroup/edit');?>" method="post" id="form1">
                <input name="group_id" type="hidden" class="dfinput" value="<?php echo ($data['id']); ?>"  style="width:400px;"/>
            <ul class="forminfo">
                <li><label>角色名称<b>*</b></label><input name="title" type="text" class="dfinput" value="<?php echo ($data['title']); ?>"  style="width:400px;"/></li>
                <li>
                    <label>角色组员<b>*</b></label>
                    <?php if(is_array($Uids)): $i = 0; $__LIST__ = $Uids;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><span style="float:left;margin-right: 25px;">
                        <label for="<?php echo ($value["uid"]); ?>" style="width: 70px"><?php echo ($value["adminname"]); ?></label>
                        <input name="uid[]" <?php echo ($value['uid']?'checked':''); ?> id="<?php echo ($value["uid"]); ?>" type="checkbox" value="<?php echo ($value["uid"]); ?>" class="dfinput"  style="width:18px;"/>
                         </span><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
                <li><label>&nbsp;</label><input type="submit" class="btn" value="确认添加"/></li>
            </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>