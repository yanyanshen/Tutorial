<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
    <script src="/Public/Admin/layer/layer.js"></script>

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
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
    <style>
        #page a{
            display: inline-block;
            width: 18px;
            height:18px;
            padding:5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 18px;
            border: 1px solid #c2ccd1;
            background: #3eafe0;
            color:#000;
        }
        #page a:hover{
            background: #FF6B00;
            color:#fff;
        }
        #page span.current{
            display: inline-block;
            width: 18px;
            height:18px;
            padding:5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 18px;
            border: 1px solid #c2ccd1;
            background: #EDF6FA;
            color:#000;
            font-weight: bold;
        }
    </style>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">系统设置</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
  
     
  	<div id="tab2" class="tabson">
    <table class="tablelist">
    	<thead>
    	<tr>
        <th style="text-align: center">编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th style="text-align: center">订单编号</th>
        <th style="text-align: center">用户名</th>
        <th style="text-align: center">下单时间</th>
        <th style="text-align: center">订单状态</th>
        <th style="text-align: center">订单操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($order)): $k = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($k % 2 );++$k;?><tr style="background-color: #f5891c">

        <td style="text-align: center"><?php echo ($k+$firstRow); ?></td>
        <td style="text-align: center"><?php echo ($order["ordernum"]); ?></td>
        <td style="text-align: center"><?php echo ($order["temp"]["0"]["username"]); ?></td>
        <td style="text-align: center"><?php echo (date('Y-m-d H:i:s',$order["creatime"])); ?></td>
        <td style="text-align: center"><?php switch($order["status"]): case "1": ?>未付款<?php break;?>
            <?php case "2": ?>已付款<?php break;?>
            <?php case "3": ?>已发货<?php break;?>
            <?php case "4": ?>已签收<?php break;?>
            <?php case "5": ?>已评价<?php break;?>
            <?php case "6": ?>申请退货<?php break;?>
            <?php case "7": ?>已退货<?php break;?>
            <?php case "8": ?>订单已取消<?php break;?>
            <?php case "9": ?>取消订单<?php break;?>

            <?php default: endswitch;?></td>
        <td style="text-align: center"><?php switch($order["status"]): case "1": ?><a href="javascript:delorder(<?php echo ($order['id']); ?>)">取消订单</a><?php break;?>
            <?php case "3": ?><a href="javascript:delorder(<?php echo ($order['id']); ?>)">取消订单</a><?php break;?>
            <?php case "7": ?>已退货<?php break;?>
            <?php case "8": ?>订单无效<?php break;?>
            <?php case "2": ?><a href="javascript:gogoods(<?php echo ($order['id']); ?>)">发货</a> <a href="javascript:delorder(<?php echo ($order['id']); ?>)">取消订单</a><?php break;?>
            <?php case "9": ?><a href="javascript:delorder(<?php echo ($order['id']); ?>)">同意</a> <a href="javascript:gogoods(<?php echo ($order['id']); ?>)">发货</a><?php break;?>
            <?php case "6": ?><a href="javascript:agree(<?php echo ($order['id']); ?>)">同意</a>  <a href="javascript:gogoods(<?php echo ($order['id']); ?>)">发货</a> <a href="javascript:delorder(<?php echo ($order['id']); ?>)">取消订单</a><?php break;?>
            <?php default: endswitch;?>

        </td>
        </tr>

            <tr>
                <?php if(is_array($order["temp"])): $i = 0; $__LIST__ = $order["temp"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ordergoods): $mod = ($i % 2 );++$i;?><tbody>
                    <tr>
                        <td class="dingdan_pic" style="text-align: center"><img width="50px" src="/Uploads/<?php echo ($ordergoods["goodspic"]); ?>" /></td>
                        <td class="dingdan_title" style="text-align: center">商品名：<span><?php echo ($ordergoods["goodsname"]); ?></span></td>
                        <td style="text-align: center">商品价格：<a href="#" class="price"><?php echo ($ordergoods["price"]); ?></a></td>
                        <td style="text-align: center">
                            购买数量： <?php echo ($ordergoods["goodsnum"]); ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr style="background-color: #6FA5DB">
            <td style="text-align: center" colspan="6"><span>收货信息</span>
                收货人：<?php echo ($order['temp']['0']['recever']); ?>&nbsp;&nbsp;&nbsp;&nbsp;
                联系电话：<?php echo ($order['temp']['0']['mobile']); ?>&nbsp;&nbsp;&nbsp;&nbsp;
                邮编：<?php echo ($order['temp']['0']['post']); ?>&nbsp;&nbsp;&nbsp;&nbsp;
                收货地址<?php echo ($order['temp']['0']['address1']); ?>
                <?php echo ($order['temp']['0']['address2']); ?>
            </td>

        </tr>
    
        </tbody>
    </table>

        <div id="page">
            <?php echo ($page); ?>
        </div>
  
    
    </div>  
       
	</div> 
 
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
    
    
    
    
    
    </div>


</body>
<script>
    function delorder(id) {
        //alert($('#form').serialize());
        $.post("<?php echo U('Admin/Order/delorder');?>", {'id':id}, function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes: function () {
                        location.href = "<?php echo U('Admin/Order/order');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })
    }
    function gogoods(id) {
        //alert($('#form').serialize());
        $.post("<?php echo U('Admin/Order/gogoods');?>", {'id':id}, function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes: function () {
                        location.href = "<?php echo U('Admin/Order/order');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })
    }
    function agree(id) {
        //alert($('#form').serialize());
        $.post("<?php echo U('Admin/Order/agree');?>", {'id':id}, function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes: function () {
                        location.href = "<?php echo U('Admin/Order/order');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })
    }
</script>

</html>