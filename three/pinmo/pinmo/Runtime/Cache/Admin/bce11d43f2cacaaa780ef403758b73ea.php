<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/three17/pinmo/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/three17/pinmo/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/three17/pinmo/Public/Admin/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/three17/pinmo/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/three17/pinmo/Public/Admin/js/select-ui.min.js"></script>

    <style>
        div.error{
            color:#ff0300;
            font-weight: bold;
            font-size: 14px;
            position: absolute;
        }
    </style>


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
	<form id="admin" action="<?php echo U('Admin/Admin/edit');?>"  method="post">
            <ul class="forminfo">
                <li><label>管理员名称<b>*</b></label>
                    <input readonly="readonly" name="adminname" type="text" class="dfinput" value="<?php echo ($adminname); ?>"  style="width:167px;"/></li>
                <li><label>原密码<b>*</b></label>
                    <input id="password1" name="password1" type="password" class="dfinput" value=""  style="width:167px;"/></li>
                <li><label>新密码<b>*</b></label>
                    <input id="password" name="password" type="password" class="dfinput" value=""  style="width:167px;"/></li>
                <li><label>重复密码<b>*</b></label>
                    <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                    <input name="repassword" type="password" class="dfinput" value=""  style="width:167px;"/></li>

                <li><label>&nbsp;</label><input  type="button" class="btn" value="修改"/></li>
            </ul>
            </form>
        </div>

    </div>

</div>
    
</body>
<script src="/three17/pinmo/Public/Admin/layer/layer.js" type="text/javascript"></script>
<script src="/three17/pinmo/Public/Admin/js/jquery.validate.min.js" type="text/javascript"></script>
<script>
    var validate=$('#admin').validate({
                rules:{
                    password1:{
                        required:true,
                        remote:{
                            url:"<?php echo U('Admin/Admin/checkPwd',array('adminname'=>$adminname));?>",
                            type:'post'
                        }
                    },
                    password:{
                        required:true,
                        minlength:6
                    },
                    repassword:{
                        required:true,
                        equalTo:'#password'

                    }
                },
                messages:{
                    password1:{
                        required:'密码不能为空',
                        remote:'原密码不正确'


                    },
                    password:{
                        required:'密码不能为空',
                        minlength:'密码不能小于6个字符'
                    },
                    repassword:{
                        required:'请输入重复密码',
                        equalTo:'两次密码不一致'
                    }
                },
                success: function(label) {
                    label.addClass("ok");
                },
                validClass: "ok",
                errorElement:'div',
                errorPlacement: function(error, element) {
                    error.appendTo( element.parent());
                }
            })
    $('.btn').click(function(){

        if(validate.form()){
           // alert($('#admin').serialize());
                $.post("<?php echo U('Admin/Admin/edit');?>", $('#admin').serialize(), function (res) {
                    if (res.status == 'ok') {
                        layer.alert(res.msg, {
                            yes: function () {
                                location.href = "<?php echo U('Admin/Admin/adminlist');?>";
                            }
                        });
                    } else {
                        layer.alert(res.msg);
                    }
                })
            }
        })



 </script>

</html>