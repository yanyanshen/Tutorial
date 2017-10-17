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
                $.post("<?php echo U('Rule/addRule');?>",$(this).serialize(),function(res){
                    if(res.status!=0){
                        layer.msg(res.info);
                        function url(){
                            if(id!=0){
                                location.href='<?php echo U("Rule/addchild");?>?id='+id;
                            }else{
                                location.href='<?php echo U("Rule/addRule");?>';
                            }
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
                <span style="float:left">当前位置是：权限管理-》添加权限</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('Rule/ruleList');?>">【返回】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
    <form action="<?php echo U('Rule/addRule');?>" method="post" enctype="multipart/form-data" name="form1">
        <table border="1" width="100%" class="table_a">
            <tr>
                <td width="20%">上级权限</td>
                <td><input type="text" name="pname" value="<?php echo ((isset($info["pname"]) && ($info["pname"] !== ""))?($info["pname"]):'顶级权限'); ?>" disabled/></td>
                <td><input type="hidden" name="pid" value="<?php echo ((isset($info["pid"]) && ($info["pid"] !== ""))?($info["pid"]):'0'); ?>"/></td>
            </tr>
            <tr>
                <td width="20%">权限名称</td>
                <td><input type="text" name="title"/></td>
            </tr>
            <tr>
                <td width="20%">权限规则</td>
                <td><input type="text" name="name" /></td>
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