<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">

<title>个人信息</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="/Public/Mobile/css/personal.css" rel="stylesheet">
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Mobile/js/jquery.form.js" type="text/javascript"></script>
<script src="/Public/Mobile/js/uploadPreview.min.js" type="text/javascript"></script>
<script src="/Public/Mobile/js/layer_mobile/layer.js" type="text/javascript"></script>
<script>
$(function(){
    function w() {
    var r = document.documentElement;
    var a = r.getBoundingClientRect().width;
    // console.log(a);
        if (a > 750 ){
            a = 750;
        } 
        rem = a / 7.5;
        r.style.fontSize = rem + "px"
    }
    var t;
    w();
    window.addEventListener("resize", function() {
        clearTimeout(t);
        t = setTimeout(w, 300)
    }, false);
});

</script>
    <script>
        $(function(){
            new uploadPreview({ UpBtn: "image1", SpanShow: "imgdiv", ImgShow: "imgShow" });
            $('#imgShow').click(function(){
                $('#image1').click();
            })
            $('#savebtn').click(function(){
                $('#form1').ajaxSubmit(function(res){
                    if(res.status==1){
                        layer.open({
                            content:'保存成功',
                            btn:['确定','取消'],
                            yes:function () {
                                location = "<?php echo U('UserCenter/usercenter');?>"
                            }
                        });
                    }else{
                        layer.open({
                            content:'保存失败',
                            skin:'msg',
                            time:2
                        });
                    }
                })
                return false;
            })
        })
    </script>
</head>
<body>
<!--头部 开始-->
<div class="header">
    <div class="wrapper">
        <p><a href="javascript:history.go(-1)"><返回</a></p>
        <h2><a href="#">个人信息</a></h2>
        <ul>
            <li></li>
            <li></li>
            <li></li>
        </ul></div>
</div>
<!--头部 结束-->
<!--收藏 开始-->
<div class="collect">
    <form method="post" id="form1" action="<?php echo U('UserCenter/saveinfo');?>" enctype="multipart/form-data">
    <?php if(is_array($userInfo)): $i = 0; $__LIST__ = $userInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><ul>
        <?php if(empty($deavatar)): ?><li class="li02" style="height: 1.2rem;line-height: 1.2rem"><a href="#">头像</a>&nbsp;&nbsp;&nbsp;<span id="imgdiv" style="cursor: pointer"><img src="/Uploads/avatar/100/deavatar.jpg" id="imgShow" alt="" style="width: 1.2rem;height: 1.2rem;margin-left: 4rem;padding-top: 0rem;border-radius: 0.6rem"/></span><input accept="image/*" type="file" id="image1" name="avatar" style="display: none"></li>
            <?php else: ?>
        <li class="li02" style="height: 1.2rem;line-height: 1.2rem"><a href="#">头像</a>&nbsp;&nbsp;&nbsp;
            <span id="imgdiv" style="cursor: pointer"><img src="/Uploads/avatar/100/100_<?php echo ($val["avatar"]); ?>" id="imgShow" alt="" style="width: 1.2rem;height: 1.2rem;margin-left: 4rem;padding-top: 0rem;border-radius: 0.6rem"/></span><input accept="image/*" type="file" id="image1" name="avatar" style="display: none"></li><?php endif; ?>
        <li class="li02"><a href="#">会员名</a><input type="text" value="<?php echo ($val["username"]); ?>" name="username" style="width:1.5rem;height: 0.9rem;border: none;margin-left: 3.8rem;outline: none"/></li>
        <?php if($val["sex"] == 1): ?><li class="li02"><a href="#">性别</a><input type="radio" value="1" name="sex" checked style="border: none;margin-left: 4rem;outline: none"/>男<input type="radio" value="2" name="sex" style=""/>女&nbsp;&nbsp;&nbsp;</li>
            <?php else: ?>
        <li class="li02"><a href="#">性别</a><input type="radio" value="1" name="sex" style="border: none;margin-left: 4rem;outline: none"/>男<input type="radio" value="2" name="sex" checked style=""/>女&nbsp;&nbsp;&nbsp;</li><?php endif; ?>
        <li class="li02"><a href="#">手机号</a><input type="text" value="<?php echo ($val["mobile"]); ?>" name="mobile" style="width:1.8rem;height: 0.9rem;border: none;margin-left: 3.8rem;outline: none"/></li>
        <li class="li02"><a href="#">邮箱</a><input type="text" value="<?php echo ($val["mail"]); ?>" name="mail" style="width:3rem;height: 0.9rem;border: none;margin-left: 3rem;outline: none"/>&nbsp;&nbsp;&nbsp;</li>
        <li class="li02"><a href="#">QQ</a><input type="text" value="<?php echo ($val["qq"]); ?>" name="qq" style="width:1.8rem;height: 0.9rem;border: none;margin-left: 4.2rem;outline: none"/>&nbsp;&nbsp;&nbsp;&nbsp;</li>
    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
    <input type="button" value="保存" id="savebtn" style="cursor:pointer;width: 6rem;height: 0.8rem;margin-left: 0.7rem;margin-top: 1rem;border: none;background-color: #f00;color: #ffffff;font-size: 0.4rem"/>
</div>
<!--收藏 结束-->

</body>
</html>