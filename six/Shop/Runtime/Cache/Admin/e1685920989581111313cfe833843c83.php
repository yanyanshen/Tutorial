<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>订单列表</title>

        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
        <link href="/Public/Admin/css/OrderPage.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/layer.js"></script>
        <!--<script type="application/javascript" src="/Public/Admin/js/jquery.form.js"></script>-->

    </head>
    <body>
        <style>
            #product1{
                height: 70px;
            }
            .tr_color{background-color: #9F88FF}
            .empty{
                font-size: 30px;
                font-weight: bold;
                width: 100%;
                height: 50px;
                text-align: center;
                line-height: 50px;
                color: #CCCCCC;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                a();
                function a(){
                    $.post("<?php echo U('Order/ordernews');?>",function(res){
                        if(res&&"<?php echo ($status); ?>"!=2){
                            layer.alert('你有新订单需要发货', {
                                skin: 'layui-layer-lan', //样式类名
                                offset: 'rb',
                                title:'新消息',
                                shade: false,
                                closeBtn: 0,
                                btn:['去发货','下次再处理']
                            }, function(){
                                layer.closeAll();

                                    location.href="<?php echo U('Order/orderList');?>?status=2"

                            });
                            $(".layui-layer-btn1").click(function(){
                                //提示过一次之后清除session，本次登录不再提示
                                $.post("<?php echo U('Order/clearSession');?>",function(){})
                            });
                            $(".layui-layer-close1").click(function(){setTimeout(a,5000);})
                            clearTimeout(a);
                        }else{
                            setTimeout(a,5000);
                        }
                    });
                }
            })
        </script>
        <script type="application/javascript">
            $(function(){
                $('.del').click(function(){
                   var a=$(this).children('div').text();//获取oid的值
                    var s="<?php echo ($status); ?>";
                     layer.confirm('删除将不可恢复', {
                     btn: ['删除','取消'] //按钮
                     }, function(){
                         layer.closeAll();
                         $.post('<?php echo U("Order/orderDel");?>',{id:a},function(res){
                             if(res==1){
                                 layer.msg('删除成功',{icon:1});
                                 function url(){
                                     location.href='<?php echo U("Order/orderList");?>?status='+s;
                                 }
                                 setTimeout(url,1000);
                             }
                             else{
                                 layer.msg('删除失败',{time:1000});
                             }
                         })
                     }, function(){
                     });
                })

            })
        </script>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：订单管理-》
                    <?php switch($status): case "1": ?>未付款订单<?php break;?>
                        <?php case "2": ?>等待发货订单<?php break;?>
                        <?php case "3": ?>已发货订单<?php break;?>
                        <?php case "4": ?>已评价订单<?php break;?>
                        <?php default: ?>全部订单<?php endswitch;?>
                </span>

            </span>
        </div>
        <div></div>
        <div class="div_search">
            <span>
                <form action="<?php echo U('Order/orderList');?>" method="post">
                    订单编号<input type="text" name="oid" value="<?php echo ($oid); ?>" style="width: 200px"/>
                    <input value="查询" type="submit" />
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody>
                    <tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>订单编号</td>
                        <td>收件人</td>
                        <td>订单状态</td>
                        <td>总价格</td>
                        <td>商品名称</td>
                        <td>联系方式</td>
                        <td>收货地址</td>
                        <td>创建时间</td>
                        <td align="center">操作</td>
                    </tr>
                    <?php if(is_array($orderlist)): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr id="product1">
                            <td><?php echo ($nowpage?($nowpage-1)*10+$key+1:$key+1); ?></td>
                            <td><a href="javascript:;" class="ordersyn[$k]"><?php echo ($val["ordersyn"]); ?></a></td>
                            <td><?php echo ($val["name"]); ?></td>
                            <td><?php echo ($val["statusname"]); ?></td>
                            <td><?php echo ($val["prices"]); ?></td>
                            <td><?php echo ($val["goodsname"]); ?></td>
                            <td><?php echo ($val["mobile"]); ?></td>
                            <td><?php echo ($val["address"]); ?></td>
                            <td><?php echo (date('Y-m-d H:s:i',$val["createtime"])); ?></td>
                            <?php switch($val["orderstatus"]): case "2": ?><td><a href="javascript:;" class="send">发货</a></td><?php break;?>
                            <?php case "3": ?><td><a href="javascript:;" class="detail">待收货</a></td><?php break;?>
                            <?php default: ?><td><a href="javascript:;"class="del"><div style="display: none;"><?php echo ($val["id"]); ?></div>删除</a></td><?php endswitch;?>
                        </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                    <tr>
                        <td colspan="20" style="text-align: center;padding-top: 20px">
                            <?php echo ($Page); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>

</html>
<script type="text/javascript">
    $(function(){
        var status="<?php echo ($status); ?>";
        $(".send").click(function(){
            var ordersyn=$(this).parent().parent().children().eq(1).text();
                location.href="<?php echo U('Order/orderEdit');?>?ordersyn="+ordersyn+"&&status="+status;
        })
    })
</script>