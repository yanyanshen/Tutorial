<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
    <style type="text/css">
        div.pagin{background-color: red;}
        div.pagin div{float: right}
        div.pagin span{text-align:center;line-height: 30px; display: inline-block;width: 30px;height: 30px; background-color:orange;}
        div.pagin a{text-align:center;line-height: 30px;display: inline-block;width: 30px;height: 30px; background-color:gray;}
    </style>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
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
        <form action="<?php echo U('Order/showlist');?>" method="get">
    <ul class="seachform">
    <li><label>订单号/价格</label><input name="order_syn" value="<?php echo ($order_syn); ?>" type="text" class="scinput" /></li>
        <li><label>订单状态</label>
            <div class="vocation">
                <select class="select2" name="order_status">
                    <option value="<?php echo ($order_status); ?>" ><?php switch($order_status): case "1": ?>已下单，未付款<?php break;?>
                        <?php case "2": ?>已付款，未发货<?php break;?>
                        <?php case "3": ?>已发货，未签收<?php break;?>
                        <?php case "4": ?>已签收，未评价<?php break;?>
                        <?php case "10": ?>已评价，订单完成<?php break;?>
                        <?php case "5": ?>已取消<?php break;?>
                        <?php case "6": ?>申请退货<?php break;?>
                        <?php case "7": ?>退货中<?php break;?>
                        <?php case "8": ?>已退货<?php break;?>
                        <?php case "9": ?>商家已取消，缺货<?php break;?>

                        <?php default: ?>全部<?php endswitch;?></option>
                    <option value="" >全部</option>
                    <option value="1">已下单，为付款</option>
                    <option value="2">已付款，为发货</option>
                    <option value="3">已发货，未签收</option>
                    <option value="4">已签收，未评价</option>
                    <option value="10">已评价，订单完成</option>
                    <option value="5">已取消</option>
                    <option value="6">申请退货</option>
                    <option value="7">退货中</option>
                    <option value="8">已退货</option>
                    <option value="9">商家已取消，缺货</option>

                </select>
            </div>
        </li>
        <li><label>用户名</label><input name="username" type="text" class="scinput" value="<?php echo ($username); ?>"/></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
    </ul>
        </form>
    <table class="tablelist">
    	<thead>
    	<tr>
        <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>序号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>编号</th>
        <th>用户名</th>
        <th>订单状态</th>
        <th>订单金额</th>
        <th>下单时间</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo ($k+$firstRow); ?></td>
        <td><?php echo ($val['order_syn']); ?></td>
        <td><?php echo ($val['username']); ?></td>
        <td><?php echo ($val['status_name']); ?></td>
        <td><?php echo ($val['order_price']); ?></td>
        <td><?php echo date("Y-m-d H:i:s",$val['addtime']);?></td>
        <td>
            <?php if($val['order_status'] == 1): ?>待付款
                <?php elseif($val['order_status'] == 2): ?>
                <a href="javascript:tosend(<?php echo ($val['id']); ?>)" class="tablelink">发货</a>
                <?php elseif($val['order_status'] == 3): ?>
                待确认
                <?php elseif($val['order_status'] == 4): ?>
                待评价
                <?php else: ?>
                订单完成&nbsp;&nbsp;
                <a href="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink"> 移除</a><?php endif; ?>&nbsp;&nbsp;
            <a href="<?php echo U('Order/orderDetail',array('id'=>$val['id']));?>" class="tablelink"> 订单详情</a>
        </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    
       <div class="pagin">
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
        <script type="text/javascript">
           function tosend(oid){
               layer.open({
                   type:2,
                   title:"确认发货信息",
                   skin:'demo-class',
                   area:["500px","45%"],
                   shadeClose: true,
                   shade: 0.8,
                   content:"<?php echo U('tosend');?>?id="+oid
               })
           }
            //删除
            function del(id){
                layer.confirm("你确定要删除我吗",{icon:4,btn:['确定','取消']},function(){
                    $.get("<?php echo U('Order/delete');?>",{oid:id},function(res){
                        if(res.status=="ok"){
                            layer.msg(res.msg,{icon:1,time:2000},function(){
                                window.location.href="<?php echo U('Order/showlist');?>"
                            })
                        }else{
                            layer.alert(res.msg);
                        }
                    })
                })
            }
        </script>
    </div>
</body>

</html>