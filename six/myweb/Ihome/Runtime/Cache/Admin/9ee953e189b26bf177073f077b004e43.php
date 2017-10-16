<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
    <script type="text/javascript" src="/Public/layer-v2.4/layer.js"></script>
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
            <form action="<?php echo U('Link/addlink');?>" enctype="multipart/form-data" method="post">
                <ul class="forminfo">
                    <li style="position: relative"><label>链接名称<b>*</b></label>
                        <input name="title" id="username" type="text" class="dfinput" value="" style="width:345px;"/>
                        <span id="tx" style=";color: red ;position: absolute;left: 330px;top: 10px"></span>
                    </li>
                    <li  style="position: relative ;"><label>链接目标<b>*</b></label>
                        <input id="pwd" name="link" type="text" class="dfinput" value="" style="width:345px; ">
                        <span id="tx2" style="color: red ;position: absolute;left: 330px;top: 10px"></span>
                    </li>
                    <li  style="position: relative ;"><label>联系方式<b>*</b></label>
                        <input name="phone" id="phone" type="text" class="dfinput" value=""  style="width:345px;"/>
                        <span id="tx3" style="color: red ;position: absolute;left: 340px;top: 10px"></span>
                    </li>
                    <li  style="position: relative ;"><label>图片<b>*</b></label>
                        <input name="img" id="email" type="file"  value=""  style="width:345px;"/>
                        <span id="tx4" style="color: red ;position: absolute;left: 350px;top:0px"></span>
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
    $(function(){
        var user=false;
        $("#username").blur(function(){
            if($(this).val().trim()=='' ){
                $('#tx').html("标题名称不能为空")}else{
                $('#tx').html("")
                user=true;
            }
        })

        var pwd=false
        $("#pwd").blur(function (){
            var a=$(this).val()
            if(a==''){
                $("#tx2").html("链接目标不能为空")
            }else{
                    $('#tx2').html(" ")
                    pwd=true
            }
        })
        var phone=false;
        $("#phone").blur(function(){
            var a=$(this).val()
            if(a==''){
                $('#tx3').html("手机号不能为空")
            }else{
                var reg=  /^1[3-9]\d{9}$/;
                if(!reg.test(a)){
                    $('#tx3').html("手机号码不正确")
                }else{
                    $('#tx3').html(" ")
                    phone=true
                }
            }
        })
        var email=false;
        $("#email").hover(function(){
            var a=$(this).val()
            if(a==''){
                $('#tx4').html("图片不能为空")
            }else{
                    email=true
                    $('#tx4').html(" ")
            }
        })
        $("#su").bind("click",function(event){   ///阻止表单提交
            if(user==true){
                if(pwd==true){
                    if(phone==true){
                        if(email==true){
                            return true
                        }
                        return false;
                    }
                    return false;
                }
                return false;
            }
            return false;
        })
    })







</script>
</html>