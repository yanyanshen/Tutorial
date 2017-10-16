<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        tr{height: 30px;}
        td.radio1{color: #000;font-weight: bolder;font-family:"微软雅黑"}
        label{height: 30px;width: 100px; text-align:right;line-height:30px;display: block;background-color: #CCC;color:#000;
              border-radius:10px;}
        input.text1{height: 30px; width:240px; margin-top:10px;}
        #sub{ width: 100px;height: 40px;margin-top: 10px;text-align: center;line-height: 40px;border-radius: 10px;
            font-size: 20px;color: #000000;font-weight: bolder;cursor: pointer;}
    </style>
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
</head>
<body>
<form action="<?php echo U('Order/tosend');?>" method="post" id="form1">
    <input name="id" type="hidden" value="<?php echo ($val['id']); ?>">
    <table>
        <tr>
            <td><label>订单号:</label></td>
            <td><input class="text1" type="text" value="<?php echo ($val['order_syn']); ?>" name="order_syn"/></td>
        </tr>
        <tr>
            <td><label>收货人:</label></td>
            <td><input class="text1" type="text" value="<?php echo ($val['username']); ?>" name="username"/></td>
        </tr>
        <tr>
            <td><label>联系方式:</label></td>
            <td><input class="text1" type="text" value="<?php echo ($val['mobile']); ?>" name="mobile"/></td>
        </tr>
        <tr>
            <td><label>收货地址:</label></td>
            <td><input class="text1" type="text" value="<?php echo ($val['address']); ?>" name="address"/></td>
        </tr>
        <tr>
            <td><label>选择快递:</label></td>
            <td class="radio1">
                <?php if($val['delivery'] == 1): ?><input checked type="radio" value="1" name="delivery"/>圆通快递
                    <?php elseif($val['delivery'] == 2): ?>
                    <input checked type="radio" value="2" name="delivery"/>中通快递
                    <?php else: ?>
                    <input checked type="radio" value="3" name="delivery"/>顺丰快递<?php endif; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input id="sub" type="button" value="确认发货">
            </td>
        </tr>
    </table>
</form>
</body>
<script>
    $(function(){
        $("#sub").click(function(){
            $.post("<?php echo U('Order/tosend');?>",$("#form1").serialize(),function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        parent.location.href="<?php echo U('Order/showlist');?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:1000})
                }
            })
        })
    })
</script>
</html>