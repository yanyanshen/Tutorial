<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <title>管理收货地址</title>
    <style type="text/css">
        a,address,b,big,blockquote,body,cite,code,dd,del,div,dl,dt,em,fieldset,form,h1,h2,h3,h4,h5,h6,html,i,iframe,img,ins,label,legend,li,ol,p,pre,small,span,strong,ul,var{ margin: 0; padding: 0; box-sizing: border-box;}
        body { font-family:"微软雅黑"; font-size:0.28rem; background:#fff;}
        ul,ul li { list-style: none;}
        .nav ul li { padding: 0.3rem 0.5rem;}
        .nav ul li span { float: right;}
        .nav .bot { border-top: 1px solid #eee; padding: 0 0.5rem; height: 1.5rem; line-height:1.5rem; }
        .nav .bot span { float: left; margin-left: 0.2rem;}
        .del { background: url("/Public/Mobile/images/del.jpg") no-repeat;background-size: auto 1.4rem; width: 3rem; text-align: right}
        .nav .bot div .def {  padding: 0; line-height: 1rem; color: #fff; margin-top: 0.25rem; width: 1rem;height: 1rem;border: 1px solid #ccc; text-align: center; float: left;}
        .nav .bot div .def.selected { background-color: #ee0000;}
        .nav .bot div span.selected { color:#ee0000};
    </style>
</head>
<script type="text/javascript">
    $(function(){
        setDef=function(id){
            $.post("<?php echo U('Order/setDef');?>",{id:id},function(res){
                if(res.status==1){
                    location.reload();
                }
            })
        }

        delAdd=function(id,k){
            layer.open({ content:"确定删除吗？",
                btn:['是','否'],
                yes:function(){
                    $.post("<?php echo U('Order/delAdd');?>",{id:id},function(res){
                        if(res.status==1){
                            $("#nav"+k).remove();
                            $("#fgx"+k).remove();
                            layer.open({ content:"已删除",skin:"msg"})
                        }else{
                            layer.open({ content:"删除失败"})
                        }
                    })
                }
            })
        }

        saveAddr=function(id){
            location.href="<?php echo U('Order/addAddr');?>?aid="+id;
        }
    })
</script>
<body>
<div style="display: inline-block; background:#eee;width: 100%;height: 2.5rem;line-height: 2.5rem;padding-left: 0.5rem;">
    <a href="<?php echo U('UserCenter/userCenter');?>" style="font-size: 1.3rem;text-decoration: none; color: #000;">&lt; 管理收货地址</a>
</div>
<?php if(is_array($addrList)): $k = 0; $__LIST__ = $addrList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div id="nav<?php echo ($k); ?>" class="nav">
        <ul onclick="saveAddr(<?php echo ($v["id"]); ?>)">
            <li style="font-size: 1rem;"><?php echo ($v["name"]); ?><span><?php echo ($v["phone"]); ?></span></li>
            <li><?php echo ($v["province"]); echo ($v["city"]); echo ($v["town"]); echo ($v["address"]); ?></li>
        </ul>
        <div class="bot">
            <div onclick="setDef(<?php echo ($v["id"]); ?>);" style="float: left;">
                <div class="def <?php echo ($v['def']?'selected':''); ?>">√</div>
                <span class="<?php echo ($v['def']?'selected':''); ?>">默认地址</span>
            </div>
            <div onclick="delAdd(<?php echo ($v["id"]); ?>,<?php echo ($k); ?>)" class="del" style="float: right;">删除</div>
        </div>
        <div></div>
    </div>
    <div id="fgx<?php echo ($k); ?>" style="width: 100%;height: 0.2rem;background: #ddd;"></div><?php endforeach; endif; else: echo "" ;endif; ?>
<div style="height: 2.1rem;"></div>
<div onclick="location.href='<?php echo U('Order/addAddr');?>'" style="position: fixed;bottom: 0; width: 100%; background: #EE7712; color: #fff; font-size: 1.2rem;text-align: center; padding: 0.3rem;">添加新地址</div>
</body>
</html>