<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑会员</title>
    <link rel="stylesheet" href="/Public/Admin/css/common.css">
    <link rel="stylesheet" href="/Public/Admin/css/main.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/colResizable-1.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Home/js/dist/jquery.validator.min.js?local=zh_CN"></script>
    <script type="text/javascript" src="/Public/Admin/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/Public/Admin/ckfinder/ckfinder.js"></script>

    <script type="text/javascript">
        $(function(){
            $(".list_table").colResizable({
                liveDrag:true,
                gripInnerHtml:"<div class='grip'></div>",
                draggingClass:"dragging",
                minWidth:30
            });
            $("form").validator({
                fields:{
                    username:"用户名:required",
                    repasswd:"确认密码:match(passwd)",
                    level:"用户等级:required;integer",
                    money:"用户金额:required;"
                },
                valid:function(form){
                    $(form).ajaxSubmit(function (data) {
                        if(data=='保存成功'){
                            layer.msg(data+",正在跳转到用户列表",{
                                icon:1,
                                time:2000
                            },function(){
                                location.href="<?php echo u('userList');?>";
                            })
                        }else{
                            layer.msg(data,{
                                icon:2,
                                time:2000
                            },function(){
                                location.reload();
                            })
                        }
                    })
                }
            })
        });

    </script>
</head>
<body>
<div id="forms" class="mt10">
    <div class="box">
        <div class="box_border">
            <div class="box_top"><b class="pl15">编辑会员</b></div>
            <div class="box_center">
                <form action="<?php echo u('editSave');?>" class="jqtransform" method="post">
                    <table class="form_table pt15 pb15" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <input type="hidden" name="id" value="<?php echo ($user["id"]); ?>"/>
                        <tr>
                            <td class="td_right">账号：</td>
                            <td class=""><input type="text" name="username" class="input-text lh30" size="40" value="<?php echo ($user["username"]); ?>"></td>
                        </tr>
                        <tr>
                            <td class="td_right">密码：</td>
                            <td class=""><input type="text" name="passwd" class="input-text lh30" size="40"></td>
                        </tr>
                        <tr>
                            <td class="td_right">确认密码：</td>
                            <td class=""><input type="text" name="repasswd" class="input-text lh30" size="40"></td>
                        </tr>
                        <tr>
                            <td class="td_right">用户等级：</td>
                            <td class=""><input type="text" name="level" class="input-text lh30" size="40" value="<?php echo ($user["level"]); ?>"></td>
                        </tr>
                        <tr>
                            <td class="td_right">用户金额：</td>
                            <td class=""><input type="text" name="money" class="input-text lh30" size="40" value="<?php echo ($user["money"]); ?>"></td>
                        </tr>
                        <tr>
                            <td class="td_right">用户状态：</td>
                            <td class=""><input type="checkbox" name="status" value="1" <?php if(($user["status"]) == "1"): ?>checked<?php endif; ?>/><?php if(($user["status"]) == "1"): ?><span style="color: #006634;">正常</span><?php else: ?><span style="color: #ff0000;">冻结</span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <td class="td_right">&nbsp;</td>
                            <td class="">
                                <input type="submit" class="btn btn82 btn_save2" value="保存">
                                <input type="reset" class="btn btn82 btn_res" value="重置">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>