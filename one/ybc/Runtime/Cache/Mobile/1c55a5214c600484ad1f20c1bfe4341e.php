<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <title>售后</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <style type="text/css">
        html { font-size: 10px;}
        a,address,b,big,blockquote,body,cite,code,dd,del,div,dl,dt,em,fieldset,form,h1,h2,h3,h4,h5,h6,html,i,iframe,img,ins,label,legend,li,ol,p,pre,small,span,strong,ul,var{ margin: 0; padding: 0; box-sizing: border-box;}
        body { font-family:"微软雅黑"; font-size:0.5rem; background:#fff;}
        ul,ul li { list-style: none;}
        .nav{padding: 0.5rem; height: auto;}
        .nav .one{ display: inline-block; height: auto !important; position: relative;font-size: 1.6rem; width: 100%; border-bottom: 0.1rem solid #ccc;}
        .nav .one img{ float: left; width: 30%;}
        .nav .one .right{ float: left; width: 70%; padding: 0 1rem;}
        .nav .one .right .down1{ font-size: 1.4rem; position: absolute;bottom: 0; }
        .nav .one .right .down2{ font-size: 1.4rem; position: absolute;bottom: 0; right: 0; }
        .nav .two { padding: 0.5rem 0; width: 100%;  display: inline-block; line-height: 2rem; height: auto !important; font-size: 1.6rem; border-bottom: 0.1rem solid #ccc; }
        .nav .two span { float: left;}
        .nav .two a { float: right; color: #fff; text-decoration: none; margin-left:1rem; background: #ff0300; padding: 0 0.5rem; border-radius: 0.2rem;}
    </style>
</head>
<script type="text/javascript">
    $(function(){
        $("#getMore").click(function() {
                    $.post("<?php echo U('Services/getMore');?>", {start: "<?php echo ($start); ?>"}, function (res) {
                        $("#getMore").replaceWith(res);
                    })
                }
        )

        can=function(id){
            layer.open({content:"是否取消？",btn:['yes','no'],yes:function(){
                $.post("<?php echo U('Services/cancelSer');?>",{id:id},function(res){
                    if(res.status==1){
                        layer.open({content:res.info,skin:'msg',time:1});
                        setInterval(function(){location.reload();},1000);
                    }else{
                        layer.open({content:res.info,skin:'msg',time:2});
                    }
                })
            }})
        }
    })
</script>
<body>
<div style="display: inline-block; background:#000;color:#fff;width: 100%;height: 4rem;line-height: 4rem;padding-left: 0.8rem;">
    <a href="javascript:history.go(-1);" style="font-size: 2rem;text-decoration: none; color: #fff  ;">&lt; 售后</a>
</div>
<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="nav">
    <div class="one">
        <img onclick="location.href='<?php echo U('Detail/detail');?>?id=<?php echo ($v["gid"]); ?>';" src="/Uploads/goodsPic/100/100_<?php echo ($v["pic"]); ?>" alt=""/>
        <div class="right">
            <div onclick="location.href='<?php echo U('Detail/detail');?>?id=<?php echo ($v["gid"]); ?>';" class="up"><?php echo mb_substr($v['goodsname'],0,28,'utf-8');?></div>
            <div class="down1">￥<?php echo ($v["price"]); ?>×2</div>
            <div class="down2">状态：<?php echo ($v['status']==1?'审核中':''); echo ($v['status']==2?'未通过':''); echo ($v['status']==3?'已通过':''); echo ($v['status']==4?'已取消':''); ?></div>
        </div>
    </div>
        <div class="two">
            <span><?php echo date("Y-m-d",$v['applytime']);?></span>
            <a href="<?php echo U('Services/servDetail');?>?id=<?php echo ($v["id"]); ?>">查看</a>
            <?php if(($v['status']) == "1"): ?><a href='javascript:can(<?php echo ($v["id"]); ?>);'>取消</a><?php endif; ?>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(empty($info)): ?><div style="text-align: center; font-size: 1.5rem;">没有售后信息</div>
    <?php else: ?>
    <div id="getMore" style="text-align: center;height: 3rem;line-height: 3rem;">点击加载更多</div><?php endif; ?>
</body>
</html>