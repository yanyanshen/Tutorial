<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/Threelinkage/linkage.css" rel="stylesheet"  type="text/css"/>
    <script src="/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
    <script src="/Public/Home/js/geo.js" type="text/javascript"></script>
    <script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.validate.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />

    <title>添加收货地址</title>
</head>
<style type="text/css">
    #s1,#s2,#s3{ width: 50px; height: 34px; display: inline-block; border-radius: 0px;}

    input.error { border: 1px solid #EA5200;background: #ffdbb3;}
    div.error {
        background:url("/Public/Home/images/error.png") no-repeat 5px 2px;
        margin-left:75px;
        margin-top: 5px;
        padding-left: 22px;
        padding-bottom: 2px;
        font-weight: bold;
        color: #EA5200;
        vertical-align: middle
    }


</style>
<script type="text/javascript">
    var index=parent.layer.getFrameIndex(window.name);//获取窗口索引

    $(function(){
        var validate=$("#form1").validate({
            rules:{
                name:{ required:true},
                town:{ chkpct:true},
                address:{ required:true, minlength:5},
                postcode:{ required:true, postCode:true},
                phone:{ required:true, mobile:true}
            },
            messages:{
                name:{ required:"收件人不能为空"},
                town:{ chkpct:"请选择地址到县级"},
                address:{ required:"不能为空", minlength:"最少5个字"},
                postcode:{ required:"不能为空", postCode:"请正确填写您的邮政编码"},
                phone:{ required:"不能为空", mobile:"请正确填写您的手机号码"}
            },
            errorElement:'div',
            errorPlacement: function(error, element) {
                error.appendTo( element.parent());
            }
        })
        jQuery.validator.addMethod("chkpct", function(value, element) {
            if(value=="市、县级市、县"){
                res=false;
            }else{
                res=true;
            }
            return this.optional(element) || res;
        }, "请选择地址");
        jQuery.validator.addMethod("postCode", function(value, element) {
            var codeReg= /^[0-9]{6}$/;
            return this.optional(element) || (codeReg.test(value));
        }, "请正确填写您的邮政编码");
        jQuery.validator.addMethod("mobile", function(value, element) {
            var mobileReg = /^1[34578]{1}[0-9]{9}$/;
            return this.optional(element) || (mobileReg.test(value));
        }, "请正确填写您的手机号码");

        $("#submit_btn").click(function(){
            if(validate.form()){
                $.post("<?php echo U('IntegralOrder/addA');?>",$("#form1").serialize(),function(res){
                    parent.layer.msg(res.info,{time:1000},function(){
                        parent.location.reload();
                    });

                },"json")
            }
        })

    })
</script>
<body onload="setup();preselect('省份');">
<!--用户中心(地址管理界面)-->
<div class="user_style clearfix" id="user" style="width: 400px; height: 320px;">
    <div class="clearfix user" >
        <!--右侧内容样式-->
        <div class="right_style r_user_style" style="width: 400px; height: 320px;">
            <div class="user_Borders" style="height: 300px;">
                <div class="about_user_info">
                    <form id="form1" name="form1" method="post" action="">
                        <div class="user_layout" style="height: 320px;">
                            <ul>
                                <li class="li"><label class="user_title_name">收件人姓名：</label><input name="name" type="text" class="add_text"><i>*</i></li>
                                <li class="li"><label class="user_title_name">选择地址：</label>
                                    <div class="add_text" style="float: left; border: 0px; padding: 0px;" >
                                        <select class="select" name="province" id="s1" style="margin: 0px;width: 80px; border-color: #ccc; border-radius: 0px;">
                                            <option></option>
                                        </select>
                                        <select class="select" name="city" id="s2" style="margin: 0px; margin-left: 9px; width: 80px; border-color: #ccc; border-radius: 0px;">
                                            <option></option>
                                        </select>
                                        <select class="select" name="town" id="s3" style="margin: 0px; margin-left: 9px; width: 80px; border-color: #ccc; border-radius: 0px;">
                                            <option></option>
                                        </select>
                                    </div>
                                    <i>*</i>
                                </li>
                                <li class="li"><label class="user_title_name">详细地址：</label><input name="address" type="text" class="add_text"><i>*</i></li>
                                <li class="li"><label class="user_title_name">邮&nbsp;&nbsp;&nbsp;编：</label><input name="postcode" type="text" class="add_text"><i>*</i></li>
                                <li class="li"><label class="user_title_name">手&nbsp;机&nbsp;号：</label><input name="phone" type="text" class="add_text"><i>*</i></li>
                            </ul>
                            <div class="operating_btn" style="margin-top: 30px;"><input id="submit_btn" type="button" value="确认" class="submit—btn"></div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>