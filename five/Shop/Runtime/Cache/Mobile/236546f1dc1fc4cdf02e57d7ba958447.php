<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>地址管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/style.css"/>
    <script src="/Public/Mobile/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $(".loading").addClass("loader-chanage")
            $(".loading").fadeOut(300)
        })
    </script>
    <style>
        #box{width:100%;height:200px;margin-top:10px;background-color:white;}
        .contain{width:100%;height:50px;line-height:50px;padding-left:10px;}
        .sp1{padding-left:0px;font-size:18px;width:80px;text-align:right;display:inline-block}
        .sp2{width:74%;display:inline-block;line-height:50px;font-size:18px;}
        #radio{width:26px;height:26px;float:right;}
    </style>
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
<header class="top-header fixed-header">
    <a class="icona" href="javascript:history.go(-1)">
        <img src="/Public/Mobile/images/left.png"/>
    </a>
    <h3>地址管理</h3>

    <a class="text-top" >
    </a>
</header>

<div class="contaniner fixed-conta">
    <form action="<?php echo U('Address/setDefault');?>" method="post" class="change-address" id="save">
        <input name="oid" value="<?php echo ($oid); ?>" type="hidden">
        <?php if(is_array($addressInfo)): $i = 0; $__LIST__ = $addressInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val1): $mod = ($i % 2 );++$i;?><div id="box">
              <div class="contain">
                  <span class="sp1">收货人:</span>
                  <span class="sp2"><?php echo ($val1["name"]); ?></span>
              </div>
              <div class="contain">
                  <span class="sp1">联系方式:</span>
                  <span class="sp2"><?php echo ($val1["mobile"]); ?></span></div>
              <div class="contain">
                  <span class="sp1">收货地址:</span>
                  <span class="sp2"><?php echo ($val1["address"]); ?></span>
              </div>
              <div class="contain">
                  <span class="sp1">默认地址:</span>
                  <span class="sp2"><input id="radio" <?php echo ($val1["isdefault"]?"checked":""); ?> value="<?php echo ($val1['id']); ?>" name="radio" type="radio"/></span>
              </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <input id="editSub" type="submit" value="保存" />
    </form>
</div>

<script src="/Public/Mobile/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(".checkboxa label").on('touchstart',function(){
        if($(this).hasClass('checkd')){
            $(".checkboxa label").removeClass("checkd");
        }else{
            $(".checkboxa label").addClass("checkd");
        }
    })
</script>
<script>
   $(function(){
        $("#editSub").click(function(){
            $.post("<?php echo U('Address/setDefault');?>",$("#save").serialize(),function(res){
                if(res.status=="ok"){
                    //信息框
                    layer.open({
                        content:res.msg
                        ,btn: '返回'
                        ,yes:function(index){
                            location.href="<?php echo U('Order/orderList');?>?oid="+res.oid;
                            layer.close(index);
                        }
                    });
                }else{
                    layer.open({
                        content: res.msg
                        ,btn: '我知道了'
                    });
                }
            })
            return false;
        })
    })
</script>

</body>
</html>