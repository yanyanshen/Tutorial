<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/ckadmin.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
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
                <input type="hidden" id="hiden" value="<?php echo (session('vip')); ?>"/>
            <li><a href="#">系统设置</a></li>
            </ul>
        </div>
        <div class="formbody">
            <div id="usual1" class="usual">
                <div id="tab1" class="tabson">
                    <form action="<?php echo U('Admins/add_admin');?>" enctype="multipart/form-data" method="post">
                    <ul class="forminfo">
                        <li style="position: relative"><label>管理员名称<b>*</b></label>
                            <input name="username" id="username" type="text" class="dfinput" value="" style="width:345px;"/>
                            <span id="tx" style=";color: red ;position: absolute;left: 315px;top: 10px"></span>
                        </li>
                        <li  style="position: relative ;"><label>密码<b>*</b></label>
                            <input id="pwd" name="pwd" type="text" class="dfinput" value="" style="width:345px; ">
                            <span id="tx2" style="color: red ;position: absolute;left: 350px;top: 10px"></span>
                        </li>
                        <li  style="position: relative ;"><label>手机号<b>*</b></label>
                            <input name="phone" id="phone" type="text" class="dfinput" value=""  style="width:345px;"/>
                            <span id="tx3" style="color: red ;position: absolute;left: 340px;top: 10px"></span>
                        </li>
                        <li  style="position: relative ;"><label>邮箱<b>*</b></label>
                            <input name="email" id="email" type="text" class="dfinput" value=""  style="width:345px;"/>
                            <span id="tx4" style="color: red ;position: absolute;left: 350px;top: 10px"></span>
                        </li>
                        <li style="height: 35px;line-height: 35px"><label>管理员类别<b>*</b></label>
                             管&nbsp;理&nbsp;员 <input type="radio" name="vip" value="0" checked="checked"/>&nbsp;&nbsp;
                             超级管理员 <input type="radio" name="vip" value="1"/>
                        </li>
                        <li><label>&nbsp;</label>
                            <input type="submit" class="btn" value="确认添加" id="su" />
                        </li>
                    </ul>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
     var a=  $('#hiden').val()
           if(a!=1){
               alert('请联系超级管理员添加')
               $('.btn').hide();
           }else{
               $('.btn').show();
           }


    </script>
</html>