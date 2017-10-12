<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/Style/skin.css" />
    <script type="text/javascript" src="/Public/Admin/Js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>

</head>
    <body>
        <table cellpadding="0" width="100%" height="64" background="/Public/Admin/Images/top_top_bg.gif">
            <tr valign="top">
                <td width="50%"><a href="javascript:void(0)"   id="top"><img style="border:none" src="/Public/Admin/Images/logo.png" /></a></td>
                <td width="30%" style="padding-top:13px;font:15px Arial,SimSun,sans-serif;color:#FFF">管理员：<b><?php echo (session('aname')); ?></b> 您好，感谢登陆使用！</td>
                <td style="padding-top:10px;" align="center"><a href="javascript:void(0)"><!--<img style="border:none" src="/Public/Admin/Images/index.gif" />--></a></td>
               <td style="padding-top:10px;" align="center"><a   href="javascript:logout()" target="_parent" ><img style="border:none" src="/Public/Admin/Images/out.gif" /></a> </td>
            </tr>
        </table>
    </body>
<script>
    function logout(){
        $.ajax({
            type:"post",
            url:"<?php echo u('Admin/Login/loginout');?>",
            data:'',
            success:function(data){
                alert(data.status);
                if(data.status=='ok'){
                    top.location.href="<?php echo U('/Admin/Login/index');?>";

                }
            }
        })

    }
</script>


</html>