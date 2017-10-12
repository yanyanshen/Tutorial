<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 190
            });
            $(".select3").uedSelect({
                width : 100
            });
        });
    </script>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">订单管理</a></li>
        <li><a href="#">订单编辑</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('Admin/Order/edit',array('oid'=>$orderinfo['oid']));?>" method="post">
                <ul class="forminfo">
                    <li><label>订单编号<b>*</b></label>
                        <br/><?php echo ($orderinfo['ordersyn']); ?> </li>
                    <li><label>商品名称<b>*</b></label>
                         <br/><?php echo ($goodslist['goodsname']); ?>
                    <li><label>购买数量<b>*</b></label>
                    <br/><?php echo ($goodsinfo['buynum']); ?> </li>
                    </li> <li><label>商品总计<b>*</b></label>
                         <br/><?php echo ($orderinfo['prices']); ?> </li>
                    <li><label>用户名<b>*</b></label>
                        <br/><?php echo ($userinfo['username']); ?> </li>
                    <li><label>收货人<b>*</b></label>
                        <br/><?php echo ($addressinfo['name']); ?> </li>
                    <li><label>联系方式<b>*</b></label>
                        <br/><?php echo ($addressinfo['tel']); ?> </li>
                    <li><label>发货地址<b>*</b></label>
                        <br/><?php echo ($addressinfo['address']); ?> </li>
                    <li>创建时间<b> :</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo (date("y-m-d h:i:s",$orderinfo["createtime"])); ?> </li>
                    <li><label>订单状态<b>*</b></label>
                        <div class="vocation">
                            <select class="select2" name="status"  >
                                <option value="<?php echo ($orderinfo["status"]); ?>" ><?php switch($orderinfo["status"]): case "1": ?>已下单，未付款<?php break;?>
                                    <?php case "2": ?>已付款，未发货<?php break;?>
                                    <?php case "3": ?>已发货，未签收<?php break;?>
                                    <?php case "4": ?>客户签收，订单完成<?php break;?>
                                    <?php case "5": ?>已取消<?php break;?>
                                    <?php case "6": ?>申请退货<?php break;?>
                                    <?php case "7": ?>退货中<?php break;?>
                                    <?php case "8": ?>已退货<?php break;?>
                                    <?php case "9": ?>商家已取消，缺货<?php break;?>
                                    <?php default: ?>未知<?php endswitch;?></option>
                                <option value="1">已下单，为付款</option>
                                <option value="2">已付款，为发货</option>
                                <option value="3">已发货，未签收</option>
                                <option value="4">客户签收，订单完成</option>
                                <option value="5">已取消</option>
                                <option value="6">申请退货</option>
                                <option value="7">退货中</option>
                                <option value="8">已退货</option>
                                <option value="9">商家已取消，缺货</option>
                            </select>
                        </div>
                    <li><label>&nbsp;</label><input type="submit" class="btn" value="保存"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>

</body>

</html>