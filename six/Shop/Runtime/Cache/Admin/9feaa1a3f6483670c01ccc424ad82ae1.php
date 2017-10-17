<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/layer.js"></script>

        <style>
            .table_a tr{
                height: 70px;
            }
            .table_a tr td input{
                width: 300px;
                height: 25px;
            }
        </style>
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》修改商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./admin.php?c=goods&a=showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="./admin.php?c=goods&a=add" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>购买账户：</td>
                    <td><input type="text" name="" value="<?php echo ($order["username"]); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>物流公司：</td>
                    <td>
                        <select name="send">
                            <option>韵达快递</option>
                            <option>圆通快递</option>
                            <option>顺丰快递</option>
                            <option>申通快递</option>
                            <option>邮政EMS</option>
                            <option>国通快递</option>
                            <option>邮政小包</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>物流编号：</td>
                    <td><input type="text" name="" value="" /></td>
                </tr>
                <tr>
                    <td>订单编号：</td>
                    <td><input type="text" name="ordersyn" value="<?php echo ($order["ordersyn"]); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>购买商品：</td>
                    <td>
                        <?php if(is_array($order['goods'])): $i = 0; $__LIST__ = $order['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?><div style="width: 200px;height: 200px;float: left">
                            <img src="/uploads/n2/<?php echo reset(explode(',',$goods['image']));?>" alt=""/>
                            <div><?php echo ($goods["goodsname"]); ?></div>
                            <div>￥50</div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>收件人姓名：</td>
                    <td><input type="text" name="" value="<?php echo ($order["name"]); ?>"  /></td>
                </tr>
                <tr>
                    <td>联系电话：</td>
                    <td><input type="text" name="" value="<?php echo ($order["mobile"]); ?>" /></td>
                </tr>
                <tr>
                    <td>收货地址：</td>
                    <td><input type="text" name="" value="<?php echo ($order["address"]); ?>" /></td>
                </tr>
                <tr>
                    <td>订单留言：</td>
                    <td><input type="text" name="" value="<?php echo ($order["message"]); ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="button" name="submit" value="发货" style="width: 100px;height: 30px">
                        <input type="button" value="取消" style="width: 100px;height: 30px">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>
<script type="text/javascript">
    $("input[name='submit']").click(function(){
        var ordersyn=$("input[name='ordersyn']").val();
        var status="<?php echo ($status); ?>";
        $.post("<?php echo U('Order/send');?>",{ordersyn:ordersyn},function(res){
            if(res.status==1){
                layer.msg("发货成功",{icon:1,time:1000},function(){location.href="<?php echo U('Order/orderList');?>?status="+status})
            }
        })
    })
</script>