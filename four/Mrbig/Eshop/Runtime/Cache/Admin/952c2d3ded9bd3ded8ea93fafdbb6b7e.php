<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/Style/skin.css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/cjyy/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/cjyy/jquery.validate.js"></script>
    <script type="text/javascript" src="/Public/Admin/cjyy/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/uploadPreview.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/kindeditor/themes/default/default.css"></script>
    <style>
        td.error{
            color:#a98673
        }
    </style>

    <script type="text/javascript">
        $(function(){
            var validate = $('#form1').validate({
                //设置验证规则
                rules: {
                    name:{
                        required:true,
                        remote: {
                            url: '<?php echo U("Admin/Brand/checkName");?>',
                            type: 'post'
                        }
                    },
                    logo:{
                        required:true
                    },
                    description:{
                        required:true
                    }
                },
                messages: {
                    name:{
                        required:'请填写品牌名称',
                        remote:'该品牌已存在'

                    },
                   logo: {
                        required: '请加入品牌logo'
                    },
                    description: {
                        required: '详情描述不能为空'
                    }
                },
                success: function (label) {
                    label.addClass("ok");
                },
                validClass: "ok",
                errorElement: 'td',
                errorPlacement: function (error, element) {
                    error.appendTo(element.parent());

                }
            })

            jQuery.validator.onfocus = true;

            $('#se').click(function() {
                if (validate.form()) {
                    $('#form1').ajaxSubmit(function(res){
                        layer.msg(res.msg,{icon:6,time:1000},function(){
                            location.href="<?php echo U('/Admin/Brand/brandList');?>";
                        })
                    });
                    return false;
                }

            });
        })
    </script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <!-- 头部开始 -->
    <tr>
        <td width="17" valign="top" background="/Public/Admin/Images/mail_left_bg.gif">
            <img src="/Public/Admin/Images/left_top_right.gif" width="17" height="29" />
        </td>
        <td valign="top" background="/Public/Admin/Images/content_bg.gif">
            <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" background=".//Public/Admin/Images/content_bg.gif">
                <tr><td height="31"><div class="title">添加栏目</div></td></tr>
            </table>
        </td>
        <td width="16" valign="top" background="/Public/Admin/Images/mail_right_bg.gif"><img src="/Public/Admin/Images/nav_right_bg.gif" width="16" height="29" /></td>
    </tr>
    <!-- 中间部分开始 -->
    <tr>
        <!--第一行左边框-->
        <td valign="middle" background="/Public/Admin/Images/mail_left_bg.gif">&nbsp;</td>
        <!--第一行中间内容-->
        <td valign="top" bgcolor="#F7F8F9">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <!-- 空白行-->
                <tr><td colspan="2" valign="top">&nbsp;</td><td>&nbsp;</td><td valign="top">&nbsp;</td></tr>
                <tr>
                    <td colspan="4">
                        <table>
                            <tr>
                                <td width="100" align="center"><img src="/Public/Admin/Images/mime.gif" /></td>
                                <td valign="bottom"><h3 style="letter-spacing:1px;">MrBig,改变空间，改变生活！</h3></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- 一条线 -->
                <tr>
                    <td height="40" colspan="4">
                        <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                            <tr><td></td></tr>
                        </table>
                    </td>
                </tr>
                <!-- 添加栏目开始 -->
                <tr>
                    <td width="2%">&nbsp;</td>
                    <td width="96%">
                        <table width="100%">
                            <tr>
                                <td colspan="2">
                                    <form action="<?php echo u('saveBrand');?>"  method="post" enctype="multipart/form-data" id="form1">
                                        <table width="100%" class="cont">
                                            <tr>
                                                <td width="2%">&nbsp;</td>
                                                <td width="10%">品牌名称</td>
                                                <td width="20%"><input class="text" type="text" name="name" value="" /></td>
                                                <td width="2%">&nbsp;</td>
                                            </tr>

                                            <tr>
                                                <td width="2%">&nbsp;</td>
                                                <td class="td_right">品牌logo：</td>
                                                <td class="">
                                                    <div id="imgdiv"><img id="imgShow" width="100" height="100" /></div>
                                                    <input type="file" name="logo" id="up_img"/>
                                                </td>
                                                <td width="2%">&nbsp;</td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td width="2%">&nbsp;</td>
                                                <td>品牌详情</td>
                                                <td><textarea  class="text" type="text" name="description"  id="ked"></textarea></td>
                                                <td width="2%">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td colspan="3"><input id="se" class="btn" type="button" value="提交" /></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="2%">&nbsp;</td>
                </tr>
                <!-- 添加栏目结束 -->
                <tr>
                    <td height="40" colspan="4">
                        <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                            <tr><td></td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="2%">&nbsp;</td>
                    <td width="51%" class="left_txt">
                        <img src="/Public/Admin/Images/icon_mail.gif" width="16" height="11"> 客户服务邮箱：rainman@foxmail.com<br />
                        <img src="/Public/Admin/Images/icon_phone.gif" width="17" height="14"> 官方网站：<a href="http://www.rain-man.cn">http://www.rain-man.cn</a>
                    </td>
                    <td>&nbsp;</td><td>&nbsp;</td>
                </tr>
            </table>
        </td>
        <td background="/Public/Admin/Images/mail_right_bg.gif">&nbsp;</td>
    </tr>
    <!-- 底部部分 -->
    <tr>
        <td valign="bottom" background="/Public/Admin/Images/mail_left_bg.gif">
            <img src="/Public/Admin/Images/buttom_left.gif" width="17" height="17" />
        </td>
        <td background="/Public/Admin/Images/buttom_bgs.gif">
            <img src="/Public/Admin/Images/buttom_bgs.gif" width="17" height="17">
        </td>
        <td valign="bottom" background="/Public/Admin/Images/mail_right_bg.gif">
            <img src="/Public/Admin/Images/buttom_right.gif" width="16" height="17" />
        </td>
    </tr>
</table>
<script>
    /*    KindEditor.ready(function(K) {
     K.create('#ked', {
     allowFileManager : true
     });
     });*/
    KindEditor.ready(function(K) {
        K.create('#ked', {
            resizeType : 1,
            allowPreviewEmoticons : true,
            allowImageUpload : true,
            items : [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link'],  afterBlur: function(){this.sync();}
        });
    });

    window.onload=function(){
        new uploadPreview({ UpBtn: "up_img", DivShow: "imgdiv", ImgShow: "imgShow" });
    }
</script>
</body>

</html>