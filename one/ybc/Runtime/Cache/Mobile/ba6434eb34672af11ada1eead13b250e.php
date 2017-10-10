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
        .one{ margin-top: 1rem; padding:0 1rem; font-size: 2rem; color: #ee0000; }
        .two{ margin-top: 1rem; padding:0 1rem; font-size: 1.5rem; }
        .three{ margin-top: 1rem; padding:0 1rem; height: auto; display: inline-block; font-size: 1rem; width: 100%; overflow: hidden; }
        .three textarea{ resize: none; float: right; width: 70%; border: 0;padding: 0; height:auto; }
        .three span{ float: left; width: 30% }
        .three img{ width: 100% }
    </style>
</head>
<script type="text/javascript">
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


</script>
<body>
    <div style="display: inline-block; background:#000;color:#fff;width: 100%;height: 4rem;line-height: 4rem;padding-left: 0.8rem;">
        <a href="javascript:history.go(-1);" style="font-size: 2rem;text-decoration: none; color: #fff  ;">&lt; 售后详情</a>
    </div>
    <div class="one"><?php echo ($info['status']==1?'审核中':''); echo ($info['status']==2?'未通过':''); echo ($info['status']==3?'已通过':''); echo ($info['status']==4?'已取消':''); ?></div>
    <div class="two">申请时间：<?php echo date("Y-m-d H:i:s",$info['applytime']);?></div>
    <?php if($info['cltime']): ?><div class="two">处理时间：<?php echo date("Y-m-d H:i:s",$info['cltime']);?></div><?php endif; ?>
    <hr/>
    <div class="three"><span>申请原因：</span><textarea readonly><?php echo ($info["reason"]); ?></textarea></div>
    <div class="three"><span>申请理由：</span><textarea readonly><?php echo ($info["message"]); ?></textarea></div>
    <div class="three"><span>上传图片：</span>
        <?php if(is_array($picList)): $i = 0; $__LIST__ = $picList;if( count($__LIST__)==0 ) : echo "无" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><img src="/Uploads/servicePic/<?php echo ($v); ?>" alt=""/><?php endforeach; endif; else: echo "无" ;endif; ?>
    </div>
    <?php if(($info["status"]) == "1"): ?><div onclick="can(<?php echo ($sid); ?>)" style="margin: 1rem auto; text-align: center; padding: 0.5rem; width: 6rem;border-radius: 0.3rem; background: #ee0000; color: #fff;">取消申请</div><?php endif; ?>
</body>
</html>