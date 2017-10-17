<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv=content-type content="text/html; charset=utf-8" />
    <link href="/Public/Admin/css/admin.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer.js"></script>
</head>
<body>
    <table cellspacing=0 cellpadding=0 width="100%"
           background="/Public/Admin/img/header_bg.jpg" border=0>
        <tr height=56>
            <td width=260><img height=56 src="/Public/Admin/img/header_left.jpg"
                               width=260></td>
            <td style="font-weight: bold; color: #fff; padding-top: 20px"
                align=middle>当前用户： <?php echo ($_SESSION['admin']['username']); ?>&nbsp;&nbsp;
                <a style="color: #fff"  href="<?php echo U('CacheAction/clear');?>" target="_top">清除缓存</a> &nbsp;&nbsp;
                <a style="color: #fff" href="/index.php/Admin/Login/logout" target="_parent" onFocus="this.blur()" >退出系统</a>
            </td>
            <td align=right width=268><img height=56
                                           src="/Public/Admin/img/header_right.jpg" width=268></td></tr></table>
    <table cellspacing=0 cellpadding=0 width="100%" border=0>
        <tr bgcolor=#1c5db6 height=4>
            <td></td>
        </tr>
    </table>
</body>
</html>