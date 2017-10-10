<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="/Public/Admin/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Public/Admin/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Admin/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Admin/js/jquery.foucs.js" type="text/javascript"></script>
<title>用户中心</title>
</head>
<style>
    li{
        list-style: none;
    }
</style>
<body style="background-color: floralwhite">
<!--顶部样式-->
    <div class=" right_style r_user_style">
      <div class="user_Borders">
       <div class="about_user_info">
       <div class="user_layout">
<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><ul >
             <?php if($val["avatar"] == 0): ?><li style="margin-top: 20px"><label class="user_title_name">用户头像&nbsp;&nbsp;：</label><div style="border: 1px solid #cccccc;width: 100px;height: 100px;"><img src="/Public/Admin/images/deavatar.jpg" alt="" style="width: 100px;height: 100px;border-radius: 999px"/></div></li>
          <?php else: ?>
                 <li style="margin-top: 20px"><label class="user_title_name">用户头像&nbsp;&nbsp;：</label><div style="border: 1px solid #cccccc;width: 100px;height: 100px;"><img src="/Uploads/avatar/100/100_<?php echo ($val["avatar"]); ?>" alt="" style="width: 100px;height: 100px;border-radius: 999px"/></div></li><?php endif; ?>
          <li style="margin-top: 20px"><label class="user_title_name">用&nbsp;户&nbsp;名&nbsp;&nbsp;：</label><?php echo ($val["username"]); ?></li>
          <li style="margin-top: 20px"><label class="user_title_name">手&nbsp;机&nbsp;号&nbsp;&nbsp;：</label><?php echo ($val["mobile"]); ?></li>
          <li style="margin-top: 20px"><label class="user_title_name">邮箱&nbsp;地址&nbsp;&nbsp;：</label><?php echo ($val["mail"]); ?></li>
          <li style="margin-top: 20px"><label class="user_title_name">Q&nbsp;&nbsp;&nbsp;&nbsp;Q&nbsp;&nbsp;：</label><?php echo ($val["qq"]); ?></li>
          <li style="margin-top: 20px"><label class="user_title_name">当前&nbsp;积分&nbsp;&nbsp;：</label><?php echo ($val["points"]); ?></li>
          <li style="margin-top: 20px"><label class="user_title_name">历史总积分&nbsp;&nbsp;：</label><?php echo ($val["totalpoints"]); ?></li>
             <?php if($val["active"] == 1): ?><li style="margin-top: 20px"><label class="user_title_name">账户&nbsp;状态&nbsp;&nbsp;：</label>已启用</li>
                 <?php else: ?>
          <li style="margin-top: 20px"><label class="user_title_name">账户&nbsp;状态&nbsp;&nbsp;：</label>已停用</li><?php endif; ?>
         </ul><?php endforeach; endif; else: echo "" ;endif; ?>
         </div>

       </div>
      </div>
    </div>


</body>
</html>