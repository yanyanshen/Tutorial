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
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>


    <script type="text/javascript">
        $(document).ready(function(e) {

            $(".select1").uedSelect({
                width: 345
            });
            $(".select2").uedSelect({
                width: 167
            });
            $(".select3").uedSelect({
                width: 100
            });
            //异步提交表单
            $('.btn').click(function(){
                $.post("<?php echo U('AdminNav/addlist');?>",$('#form1').serialize(),function(res){
                    if(res.status==1){
                        layer.msg(
                                res.info,
                                {icon:1},
                                function(){
                                    location.href=res.url;
                                }
                        );
                    }else{
                        layer.alert(res.info);
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
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="" method="post" id="form1">
            <ul class="forminfo">
                <li><label>上级菜单<b>*</b></label><input type="text" class="dfinput" disabled value="<?php echo ((isset($pname) && ($pname !== ""))?($pname):'顶级菜单'); ?>"  style="width:400px;"/></li>
                <input name="pid" type="hidden" class="dfinput" value="<?php echo ((isset($pid) && ($pid !== ""))?($pid):0); ?>"  style="width:400px;"/>
                <li><label>菜单名称<b>*</b></label><input name="navname" type="text" class="dfinput" placeholder="请填写菜单名称"  style="width:400px;"/></li>
                <li><label>菜单链接<b>*</b></label><input name="navurl" type="text" class="dfinput" placeholder="请填写菜单链接"  style="width:400px;"/></li>
                <li><label>菜单优先级<b>*</b></label><input name="priority" type="text" class="dfinput" placeholder="请填写菜单优先级" style="width:400px;"/></li>
                <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确认添加"/></li>
            </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>