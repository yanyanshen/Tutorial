<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>我的商城</title>
    <script type="text/javascript"  src="/Public/Admin/js/member/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/member/admincp.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/member/common.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/member/jquery.cookie.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/member/min.js"></script>
    <link href="/Public/Admin/css/editor/min.css"  type="text/css" rel="stylesheet"/>
    <link href="/Public/Admin/css/editor/skin_0.css"  type="text/css" rel="stylesheet" />
    <link href="/Public/Admin/css/editor/font-min.css"  type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="/Public/Admin/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var res=$('#user_form').validate({
                rules:{
                    username:{
                        required:true,
                        minlength:6,
                        maxlength:10,
                        remote:{
                            url:'<?php echo U("member/chkUserName");?>?id=<?php echo ($date["id"]); ?>',
                            type:'post'
                        }
                    },
                    password:{
                        required:true,
                        maxlength:10,
                        minlength:6

                    },
                    email:{
                        required:true,
                        email:true
                    },
                    mobile:{
                        required:true,
                        mobile:true,
                        remote:{
                            url:'<?php echo U("member/chkMobile");?>?id=<?php echo ($date["id"]); ?>',
                            type:'post'
                        }
                    }
                },
                messages:{
                    username:{
                        required:'用户名不能为空',
                        minlength:'用户名应在6-10个字符之间',
                        maxlength:'用户名应在6-10个字符之间',
                        remote:'用户名已被占用'
                    },
                    password:{
                        required:'密码不能为空',
                        maxlength:'密码应在6-10个字符之间',
                        minlength:'密码应在6-10个字符之间'
                    },
                    email:{
                        required:'邮箱不能为空',
                        email:'邮箱格式不正确'
                    },
                    mobile:{
                        required:'请输入手机号码',
                        remote:'手机号已被占用'
                    }
                }
            });
            jQuery.validator.addMethod("mobile", function(value, element) {
                var mobileReg = /^1[34578]{1}[0-9]{9}$/;
                return this.optional(element) || (mobileReg.test(value));
            }, "请正确填写您的手机号码");
            $('.btn-s').click(function(){
                if(res.form()){
                    $.post("<?php echo U('member/editor');?>?id=<?php echo ($date['id']); ?>",$('#user_form').serialize(),function(res){
                        if(res.status==1){
                            layer.open({
                                content:res.info,
                                icon:1,
                                yes:function(){
                                    location.href="<?php echo U('member/editor');?>"
                                }
                            })
                        }else{
                            layer.open({
                                content:res.info,
                                icon:2,
                                title:'错误提示'
                            });
                        }
                    },'json');
                }
            })
        })
    </script>
    <style type="text/css" >
        label.validation {
            padding-left: 5px;
        }
        td.vatop.rowform{
            font-size: 15px;
            font-family: "Microsoft YaHei", "Hiragino Sans GB";
            color:#333333;
        }
    </style>
</head>
<body>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <h3>会员管理</h3>
            <ul class="tab-base">
                <li><a href="<?php echo U('member/member');?>?act=member&op=member" ><span style="color:#0D93BF">&lt;&lt;返回列表页</span></a></li>
               <!-- <li><a href="JavaScript:void(0);" class="current"><span>编辑</span></a></li>-->
            </ul>
        </div>
    </div>
    <div class="fixed-empty"></div>
    <form id="user_form" enctype="multipart/form-data" method="post" action="<?php echo U('member/editor');?>?id=<?php echo ($date['id']); ?>">
        <input type="hidden" name="form_submit" value="ok" />
        <input type="hidden" name="member_id" value="2" />
        <input type="hidden" name="old_member_avatar" value="" />
        <input type="hidden" name="member_name" value="admin" />
        <table class="table tb-type2">
            <tbody>
            <tr class="noborder">
                <td colspan="2" class="required"><label>会员:</label></td>
            </tr>

            <tr class="noborder">
                <td class="vatop rowform"><?php echo ($date['username']); ?></td>
                <td class="vatop tips"></td>
            </tr>
            <tr>
                <td colspan="2" class="required"><label for="member_username">用户名:</label></td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform"><input type="text" id="member_username" name="username" class="txt" value="<?php echo ($date['username']); ?>"></td>
                <td class="vatop tips"></td>
            </tr>

            <tr>
                <td colspan="2" class="required"><label for="member_password">密码:</label></td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform"><input type="text" id="member_password" name="password" class="txt" value=""></td>
                <td class="vatop tips"></td>
            </tr>


            <tr>
                <td colspan="2" class="required"><label class="validation" for="member_email">电子邮箱:</label></td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform"><input type="text" value="<?php echo ($date['email']); ?>" id="member_email" name="email" class="txt"></td>
                <td class="vatop tips"></td>
            </tr>

            <tr>
                <td colspan="2" class="required"><label class="member_mobile">手机号码:</label></td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform"><input type="text" value="<?php echo ($date['mobile']); ?>" id="member_mobile" name="mobile" class="txt"></td>
                <td class="vatop tips"></td>
            </tr>


            <!--V3-B11 手机号码-->
            </tbody>
            <tfoot>
            <tr class="tfoot">
                <!--<td colspan="15"><a href="javascript:document.getElementById('user_form').submit();" class="btn-s" id="<?php echo ($date['id']); ?>"><span>提交</span></a></td>-->
                <td colspan="15"><a  class="btn-s" id="<?php echo ($date['id']); ?>" style="cursor: pointer"><span>提交</span></a></td>
            </tr>
            </tfoot>
        </table>
    </form>
</div>
</body>
</html>