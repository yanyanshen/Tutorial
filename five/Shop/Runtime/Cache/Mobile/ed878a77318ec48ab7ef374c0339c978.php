<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>修改信息</title>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/style.css"/>
    <script src="/Public/Mobile/js/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $(".loading").addClass("loader-chanage")
            $(".loading").fadeOut(300)
        })
    </script>
</head>
<!--loading页开始-->
<div class="loading">
    <div class="loader">
        <div class="loader-inner pacman">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!--loading页结束-->
<body>
<header class="top-header">
    <a class="icona" href="javascript:history.go(-1)">
        <img src="/Public/Mobile/images/left.png"/>
    </a>
    <h3>修改昵称</h3>

    <a class="iconb" href="shopcar.html">
    </a>
</header>

<div class="contaniner">
    <form action="" method="post" class="nameform">
        <div class="namechange">
            <img src="/Public/Mobile/images/a-icon01.png"/>
            <?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><input type="text" name="username" placeholder="<?php echo ($v['username']); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <p>推荐使用中文，5-25个字符</p>
        <input id="btn" type="button" value="保存"/>
    </form>

</div>
<script>
    $(function () {
          $("#btn").click(function () {
              $.post("<?php echo U(Personal/nameChange);?>",$(".nameform").serialize(),function (res) {
                  if(res.status=="ok"){
                          layer.open({
                              content: res.msg
                              ,skin: 'msg'
                              ,time: 1 //2秒后自动关闭
                              });
                      }
                  else {
                      layer.open({
                          content: res.msg
                          ,skin: 'msg'
                          ,time: 1 //2秒后自动关闭
                      });
                  }
              })
          })
    })
</script>


</body>
</html>