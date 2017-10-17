<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>添加权限</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/ckfinder/ckfinder.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".submit").click(function(){
                $(".sub").click();
            })






            $("form[name='form1']").submit(function(){
                var id=$("input[name='pid']").val();
                $.post("<?php echo U('Nev/updateNev');?>",$(this).serialize(),function(res){
                    if(res.status!=0){
                        layer.msg(res.info);
                        function url(){
                                location.href='<?php echo U("Nev/NevList");?>?id='+id;
                        }
                        setTimeout(url,1000)
                    }else{
                        layer.msg(res.info);
                    }
                },'json');
                return false;
            })


        })

    </script>





</head>

<body>

<div class="div_head">
            <span>
                <span style="float:left">当前位置是：权限管理-》添加管理组</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('Rule/addRule');?>">【返回】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
    <form action="<?php echo U('Nev/addNev');?>" method="post" enctype="multipart/form-data" name="form1">
        <table border="1" width="100%" class="table_a">
            <tr>
                <td width="20%">上级菜单</td>
                <td><input type="text" name="pname" value="<?php echo ((isset($info["pname"]) && ($info["pname"] !== ""))?($info["pname"]):'顶级菜单'); ?>" disabled/></td>
                <td><input type="hidden" name="pid" value="<?php echo ((isset($info["pid"]) && ($info["pid"] !== ""))?($info["pid"]):'0'); ?>"/></td>
                <td><input type="hidden" name="id" value="<?php echo ((isset($info["id"]) && ($info["id"] !== ""))?($info["id"]):'0'); ?>"/></td>
            </tr>
            <tr>
                <td width="20%">菜单名称</td>
                <td><input type="text" name="name" value="<?php echo ($info["name"]); ?>"/></td>
            </tr>
            <tr>
                <td width="20%">菜单链接</td>
                <td><input type="text" name="url" value="<?php echo ($info["url"]); ?>"/></td>
            </tr>
            <tr>
                <td width="20%">菜单优先级</td>
                <td><input type="text" name="priority" value="<?php echo ($info["priority"]); ?>"/></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" align="center">
                    <a class="submit" style="display: inline-block;padding:4px 12px;background-color:#3b95c8;border-radius: 5px;color:white;">确认添加</a>
                    <input type="submit" value="添加" style="display: none" class="sub">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>