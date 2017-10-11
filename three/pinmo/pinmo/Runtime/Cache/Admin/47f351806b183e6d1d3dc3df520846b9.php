<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#select1").uedSelect({
                width : 345
            });
            $("#select2").uedSelect({
                width : 167
            });
            $("#select3").uedSelect({
                width : 100
            });
        });
    </script>
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
	<form id="admin" action="<?php echo U('Admin/Admin/add');?>" id="form" method="post">
            <ul class="forminfo">
                <li><label>管理员名称<b>*</b></label>
                    <input name="adminname" type="text" class="dfinput" value=""  style="width:167px;"/></li>
                <li><label>密码<b>*</b></label>
                    <input id="password" name="password" type="password" class="dfinput" value=""  style="width:167px;"/></li>
                <li><label>重复密码<b>*</b></label>
                    <input name="repassword" type="password" class="dfinput" value=""  style="width:167px;"/></li>
                <li><label>账户类型<b>*</b></label>
                    <div class="vocation">
                        <select  name="status" id="select2" >
                            <option value="0">普通管理员</option>
                            <option value="1">超级管理员</option>
                        </select>
                    </div>

                </li>

                <li><label>&nbsp;</label><input  type="button" class="btn" value="添加"/></li>
            </ul>
            </form>
        </div>

    </div>

</div>
    
</body>
<script src="/Public/Admin/layer/layer.js" type="text/javascript"></script>
<script src="/Public/Admin/js/jquery.validate.min.js" type="text/javascript"></script>
<script>
    var validate=$('#admin').validate({
                rules:{
                    adminname:{
                        required:true,
                        minlength:2,
                        maxlength:15,
                        remote:{
                            url:'<?php echo U("Admin/Admin/chkAdminname");?>',
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
                    },
                    status:{
                        required:true
                    }
                },
                messages:{
                    adminname:{
                        required:'用户名不能为空',
                        minlength:'用户名至少需要2个字符',
                        maxlength:'用户名最多15个字符',
                        remote:'用户名已被占用'
                    },
                    password:{
                        required:'密码不能为空',
                        minlength:'密码不能小于6个字符'

                    },
                    repassword:{
                        required:'请输入重复密码',
                        equalTo:'两次密码不一致'
                    },
                    status:{
                        required:'账户类型不能为空'

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
            $.post("<?php echo U('Admin/Admin/add');?>",$('#admin').serialize(),function(res){
                if(res.status=='ok'){
                    layer.alert(res.msg,{
                        yes:function(){
                            location.href="<?php echo U('Admin/Admin/adminlist');?>";
                        }
                    });
                }else{
                    layer.alert(res.msg);
                };
            })
        }

    })

 </script>

</html>