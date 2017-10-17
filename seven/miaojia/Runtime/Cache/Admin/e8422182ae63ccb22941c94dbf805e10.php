<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品列表</title>
    <link rel="stylesheet" href="/Public/Admin/css/common.css">
    <link rel="stylesheet" href="/Public/Admin/css/main.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/colResizable-1.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>

    <script type="text/javascript">
        $(function(){
            $(".list_table").colResizable({
                liveDrag:true,
                gripInnerHtml:"<div class='grip'></div>",
                draggingClass:"dragging",
                minWidth:30
            });
            $("#export").click(function(){
                location.href="<?php echo u('expOrders');?>";
            })
        });
    </script>
</head>
<body>


<div id="button" class="mt10">
    <input type="button" class="btn btn82 btn_export" id="export" value="导出">
</div>


<div id="table" class="mt10">
    <div class="box span10 oh">
        <?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "暂无此状态订单" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table" style="text-align: center">
                <tr>
                    <th width="230" colspan="3">
                        订单编号:<?php echo ($vo["ordersyn"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
                        订单状态:<?php switch($vo["orderstatus"]): case "1": ?>未付款<?php break;?>
                        <?php case "2": ?><span style="color: #ff0000;">等待发货</span><?php break;?>
                        <?php case "3": ?><span style="color: #ff0000;"><a href="javascript:void(0)">已发货</a></span><?php break;?>
                        <?php case "4": ?><span style="color: #ff0000;"><a href="javascript:void(0)" class="toPj">待评价</a></span><?php break;?>
                        <?php case "5": ?><span style="color: #008855;">已评价</span><?php break; endswitch;?>&nbsp;&nbsp;&nbsp;&nbsp;
                        订单创建时间:<?php echo (date('Y-m-d H:i:s',$vo["createtime"])); ?>&nbsp;&nbsp;&nbsp;&nbsp;
                        订单总价:<?php echo ($vo["prices"]); ?>元&nbsp;&nbsp;&nbsp;&nbsp;
                        收货信息:<?php echo ($vo["address"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php switch($vo["orderstatus"]): case "1": ?><a href="<?php echo u('delOrder',array('orderid'=>$vo['id']));?>">删除</a><?php break;?>
                            <?php case "2": ?><a href="<?php echo u('sendOrder',array('orderid'=>$vo['id']));?>">发货</a><?php break;?>
                            <?php case "4": ?><a href="<?php echo u('delOrder',array('orderid'=>$vo['id']));?>">删除</a><?php break;?>
                            <?php case "5": ?><a href="<?php echo u('delOrder',array('orderid'=>$vo['id']));?>">删除</a><?php break; endswitch;?>
                    </th>
                </tr>
                <?php if(is_array($vo["goods"])): $i = 0; $__LIST__ = $vo["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><tr class="tr">
                        <td class="td_center"><img src="/upload/n3/<?php echo (array_shift(explode(',',(isset($vo1["image"]) && ($vo1["image"] !== ""))?($vo1["image"]):'default.jpg'))); ?>"/></td>
                        <td><?php echo (mb_substr($vo1["goodsname"],'0','40','utf-8')); ?>(<?php echo ($vo1["ordergoodsargs"]); ?>)&nbsp;&nbsp;x <?php echo ($vo1["buynum"]); ?>件</td>
                        <td><?php echo ($vo1['siteprice']*$vo1['buynum']); ?>元</td>
                    </tr><?php endforeach; endif; else: echo "暂无此状态订单" ;endif; ?>
            </table><br/><br/><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php echo ($page); ?>
    </div>
</div>
</body>
</html>