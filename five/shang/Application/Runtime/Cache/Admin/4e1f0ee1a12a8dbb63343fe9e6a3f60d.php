<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加会员</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script src="/Public/Admin/js/layer/layer.js"></script>
    <script src="/Public/Admin/js/jquery.validate.js"></script>
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
        <li><a href="#">会员管理</a></li>
        <li><a href="#">会员添加</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="" method="post" id="form1">
                <ul class="forminfo">
                    <li>会员姓名<b>*</b>&nbsp &nbsp<input name="username" type="text" class="dfinput" style="width:167px"/></li>
                    <li>会员密码<b>*</b>&nbsp&nbsp <input name="pwd" type="password" class="dfinput" style="width:167px"/></li>
                    <li>确认密码<b>*</b>&nbsp&nbsp <input name="repwd" type="password" class="dfinput" style="width:167px"/></li>
                    <li><label>会员等级<b>*</b></label>
                        <div class="vocation" style="position: relative;left:-16px;">
                            <select  class="select2" name="level">
                                <option value="5" >&nbsp;钻石会员&nbsp;</option>
                                <option value="4" >&nbsp;金牌会员&nbsp;</option>
                                <option value="3" >&nbsp;银牌会员&nbsp;</option>
                                <option value="2" >&nbsp;铜牌会员&nbsp;</option>
                                <option value="1" selected >&nbsp;注册会员&nbsp;</option>
                                <option value="0" >&nbsp;禁用&nbsp;</option>
                            </select>
                        </div>

                    </li>
                    <li><label>&nbsp;</label><input type="submit" class="btn" value="添加"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>

</body>


</html>