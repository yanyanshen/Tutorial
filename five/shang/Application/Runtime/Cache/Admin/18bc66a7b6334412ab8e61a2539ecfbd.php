<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript" src="editor/kindeditor.js"></script>
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
                width : 146
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
            background: #3D96C9;
            color:#fff;
        }
        #page a:hover{
            background: #ff2832;
            color:#000;
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
            background:red;
            color:#fff;
            font-weight: bold;
        }
        #page span.rows{
            float:left;
            margin-right:50px;
            margin-top:5px;
            font-size: 20px;
        }
        #page span.rows b{
            font-size: 20px;
            color:red;
        }
    </style>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">订单管理</a></li>
        <li><a href="#">订单列表</a></li>
    </ul>
</div>

<div class="formbody">


    <div id="usual1" class="usual">



        <div id="tab2" class="tabson">
            <form action="<?php echo u('Order/index');?>" method="get">
                <ul class="seachform">
                    <li><label>订单号/价格</label><input name="ordersyn" type="text" class="scinput" value="<?php echo ($ordersyn); ?>"/></li>
                    <li><label>订单状态</label>
                        <div class="vocation">
                            <select class="select2" name="status">
                                <option value="<?php echo ($status); ?>" ><?php switch($status): case "1": ?>已下单，未付款<?php break;?>
                                    <?php case "2": ?>已付款，未发货<?php break;?>
                                    <?php case "3": ?>已发货，未签收<?php break;?>
                                    <?php case "4": ?>客户签收，订单完成<?php break;?>
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
                                <option value="4">客户签收，订单完成</option>
                                <option value="5">已取消</option>
                                <option value="6">申请退货</option>
                                <option value="7">退货中</option>
                                <option value="8">已退货</option>
                                <option value="9">商家已取消，缺货</option>
                            </select>
                        </div>
                    </li>
                    <li><label>用户名</label><input name="username" type="text" class="scinput" value="<?php echo ($name); ?>"/></li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                     <th>时间</th>
                    <th>订单号</th>
                    <th>订单状态</th>
                    <th>成交金额</th>

                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                        <td><?php echo ($k+$firstRow); ?></td>
                        <td><?php echo (date("y-m-d h:i:s",$val["createtime"])); ?></td>
                        <td><?php echo ($val["ordersyn"]); ?></td>
                        <td><?php switch($val["status"]): case "1": ?>已下单，未付款<?php break;?>
                            <?php case "2": ?>已付款，未发货<?php break;?>
                            <?php case "3": ?>已发货，未签收<?php break;?>
                            <?php case "4": ?>客户签收，订单完成<?php break;?>
                            <?php case "5": ?>已取消<?php break;?>
                            <?php case "6": ?>申请退货<?php break;?>
                            <?php case "7": ?>退货中<?php break;?>
                            <?php case "8": ?>已退货<?php break;?>
                            <?php case "9": ?>商家已取消，缺货<?php break;?>
                            <?php default: ?>未知<?php endswitch;?>
                        </td>
                        <td><?php echo ($val["prices"]); ?></td>
                        <td><a href="<?php echo U('Admin/Order/edit',array('oid'=>$val['oid']));?> " class="tablelink">查看</a>
                            <?php if(($val["status"]) == "6"): ?><a href="<?php echo U('Admin/Order/agree',array('oid'=>$val['oid']));?> " class="tablelink">同意退货</a><?php endif; ?>
                            <?php if(($val["status"]) < "3"): ?><a href="javascript:cancel(<?php echo ($val['oid']); ?>)" class="tablelink"> 取消订单</a><?php endif; ?>
                            <?php if(($val["status"]) == "2"): ?><a href="<?php echo U('Admin/Order/send',array('oid'=>$val['oid']));?>" class="tablelink"> 发货</a><?php endif; ?>
                            <?php if(($val["status"]) == "7"): ?><a href="<?php echo U('Admin/Order/over',array('oid'=>$val['oid']));?>" class="tablelink">完成</a><?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <div class="pagin">
                <div class="message">共<b class="blue"><?php echo ($count); ?> </b>条记录</div>

                <ul class="paginList">
                    <li><div id="page">
                        <?php echo ($page); ?>
                    </div></li>
                </ul>
            </div>



        </div>

    </div>
</div>

<script type="text/javascript">
    $("#usual1 ul").idTabs();
</script>

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>

<script>
   function cancel(oid){
        //询问框
        layer.confirm('您确定要取消吗?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Admin/Order/cancel');?>",{'oid':oid},function(res){
                if(res.status=='ok'){
                    layer.alert(res.msg);
                    location.href="<?php echo U('Admin/Order/index');?>";
                }else{
                    layer.alert(res.msg);
                    location.href="<?php echo U('Admin/Order/index');?>";
                }
            });
        });
    }
</script>
</body>

</html>