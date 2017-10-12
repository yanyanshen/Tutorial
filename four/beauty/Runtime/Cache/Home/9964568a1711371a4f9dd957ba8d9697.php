<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <style>
        .pic{width: 100px;height:100px;float: left;}
        .team_icon{float: left;width: 100px;height: 100px;line-height:100px;text-align: center;}
        .jiesheng{float: left;width: 100px;height: 50px;}
        .totalprice{float: left;}
        .footer{background-color: black;color: white;width: 900px;height: 60px;line-height: 60px;}
        .footer #comtobuy{background-color: red;border-radius:8px;display:inline-block;height: 40px;width: 120px;text-align: center;text-decoration: none;color: white;line-height: 40px;}
    </style>
</head>
<body>
<form action="" method="post" id="com">
<div style="width: 900px;margin: 0 auto;">
<div class="top" style="width: 900px;float: left;">
    <?php if(is_array($goodsinfo1)): $i = 0; $__LIST__ = $goodsinfo1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods1): $mod = ($i % 2 );++$i;?><div class="pic"><a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$goods1['id']));?>"><img src="/Uploads/<?php echo ($goods1["imageurl"]); ?>300_<?php echo ($goods1["imagename"]); ?>" alt="" style="width: 100px;height: 100px;"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="team_icon"><img src="/Public/Home/images/yhimages/jia_b.gif" /></div>
    <?php if(is_array($goodsinfo2)): $i = 0; $__LIST__ = $goodsinfo2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods2): $mod = ($i % 2 );++$i;?><div class="pic"><a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$goods2['id']));?>"><img src="/Uploads/<?php echo ($goods2["imageurl"]); ?>300_<?php echo ($goods2["imagename"]); ?>" alt="" style="width: 100px;height: 100px;"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="team_icon"><img src="/Public/Home/images/yhimages/jia_b.gif" /></div>
    <?php if(is_array($goodsinfo3)): $i = 0; $__LIST__ = $goodsinfo3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods3): $mod = ($i % 2 );++$i;?><div class="pic"><a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$goods3['id']));?>"><img src="/Uploads/<?php echo ($goods3["imageurl"]); ?>300_<?php echo ($goods3["imagename"]); ?>" alt="" style="width: 100px;height: 100px;"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="team_icon"><img src="/Public/Home/images/yhimages/equl.gif" /></div>
    <div class="totalprice">
        <p style="color: red;font-weight: bold;">套餐价：<span><?php echo ($totalprice); ?></span></p>
        <p style="color: #ccc;font-weight: bold;"><span>价格：<del>￥<?php echo ($marketprice); ?></del></span></p>
        <p>已搭配<span>&nbsp;2&nbsp;</span>件</p>
    </div>
    <div class="jiesheng"><span style="background-color: black;color: white;line-height:50px;padding: 5px;margin-left: 5px;">省￥<?php echo ($jiesheng); ?></span></div>
</div>
<div class="middle1" style="width: 900px;margin: 0 auto;float: left;">
    !请选择套餐内的商品信息
</div>

<div class="middle2" style="float: left;margin: 10px 15px;">
    <?php if(is_array($goodsinfo)): $k = 0; $__LIST__ = $goodsinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($k % 2 );++$k;?><div class="content" style="float: left;width: 400px;">
        <div class="image" style="float: left;">
        <a href=""><img src="/Uploads/<?php echo ($goods["imageurl"]); ?>300_<?php echo ($goods["imagename"]); ?>" alt="" style="width: 100px;height: 100px;"/></a>
        </div>
        <div style="float: left;width: 150px;height: 120px;margin-left: 30px;">
            <p>含量:
            <span style="display:inline-block;width: 50px;height: 20px;">
                    <input type="text" value="<?php echo ($goods["ml"]); ?>ml" name="xinghao[]" style="width: 50px;border: 2px solid red;line-height: 10px;text-align: center;" readonly/>
            </span>
            </p>
            <p>数量：<span><input type="text" name="salenum[]" value="<?php echo ($combuynum); ?>" readonly style="width: 60px;border: none;"/></span></p>
            <p>库存：<span><input type="text" name="num" value="<?php echo ($goods["num"]); ?>" style="width: 60px;border: none;" readonly/></span></p>
           <input type="hidden" name="gid[]" value="<?php echo ($goods["id"]); ?>"/>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

    <div class="footer" style="float: left;margin-top: 140px;">
        <span style="margin-right: 20px;margin-left: 500px;">购买 <?php echo ($combuynum); ?> 套</span>
        <span style="margin-right: 30px;">合计：￥<input type="text" value="<?php echo ($totalprice); ?>" name="totalprice" style="width: 60px;background-color: black;color: white;border: none;" readonly/></span>
        <span><input type="button" value="确定购买套餐" id="comtobuy"/></span>
        <input type="hidden" value="<?php echo (session('mid')); ?>" name="mid"/>
    </div>
</div>
</form>
</body>
</html>
<script type="text/javascript">
   $(function(){
       $('#comtobuy').click(function(){
           mid=$('input[name="mid"]').val();
           if(mid){
               $.post("<?php echo U('Home/MyCart/comtobuy');?>",$('#com').serialize(),function(res){
                    if(res.status==1){
                        parent.location="<?php echo U('Home/MyCart/comorder');?>"+'?oid='+res.info;
                    }
               })
           }
       })

    })
</script>