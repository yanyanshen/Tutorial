<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改会员</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
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
            <form action="<?php echo U('Admin/User/index');?>" method="post">
                <ul class="forminfo">
                    <li>用户名<b>&nbsp&nbsp&nbsp: </b> <?php echo ($list["username"]); ?></li>
                    <li>会员昵称<b> :</b>  <?php echo ($list["nickname"]); ?> </li>
                    <li>会员邮箱<b> :</b>  <?php echo ($list["email"]); ?> </li>
                    <li>消费额度<b> :</b>  <?php echo ($list["expense"]); ?> </li>
                    <li>会员地址<b> :</b>  <?php echo ($list["address"]); ?> </li>
                    <li>会员电话<b> :</b>  <?php echo ($list["tel"]); ?> </li>
                    <li>添加时间<b> :</b>  <?php echo (date("Y-m-d H:i:s",$list["birthday"])); ?></li>
                    <li>会员等级<b> :</b> <?php switch($list["level"]): case "0": ?>禁用<?php break;?>
                          <?php case "1": ?>注册会员<?php break;?>
                          <?php case "2": ?>铜牌会员<?php break;?>
                          <?php case "3": ?>银牌会员<?php break;?>
                          <?php case "4": ?>金牌会员<?php break;?>
                          <?php case "5": ?>钻石会员<?php break;?>
                          <?php default: ?>非法<?php endswitch;?>

                         </li>
                    <li><label>&nbsp;</label><input type="submit" class="btn" value="返回"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>

</body>

</html>