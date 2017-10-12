<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加管理员</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.validate.js "></script>
    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
    </script>
    <style>
        input.error { border: 1px solid red;background: #ffdbb3;}
        label.error{

            padding-left:35px;
            color:#ff0300;
            font-weight: bold;
            font-size: 13px;
        }

    </style>
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
        <li><a href="#">添加管理员</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form id="loginForm" action="" method="post">
                <ul class="forminfo">
                    <li>管理员名称<b>*</b> <input name="adminname" type="text" class="dfinput" /></li>
                    <li>管理员密码<b>*</b> <input name="pwd" id="pwd" type="password" class="dfinput" /></li>
                    <li>请确认密码<b>*</b> <input name="repwd"  type="password" class="dfinput" /></li>
                    <li><label>管理员状态<b>*</b></label>
                        <div class="vocation" style="position: relative;left:-16px;">
                            <select  class="select1" name="status">
                                <option value="2" >&nbsp;超级管理员&nbsp;</option>
                                <option value="1" selected >&nbsp;普通管理员&nbsp;</option>
                            </select>
                        </div>

                    </li>
                    <li><label>&nbsp;</label><input type="button" id="btn" class="btn" value="添加"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(function(){
        $('#btn').click(function(){
                $.post("<?php echo U(Admin/add);?>",$('#loginForm').serialize(),function(res){
                    if(res.status=='ok'){
                        alert(res.msg);
                    }else{
                        alert(res.msg);
                    }
                })
        })
    })
</script>
</html>