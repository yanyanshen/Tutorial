<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>列表页</title>
        <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/Public/Jquery/jQuery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/Public/Jquery/jquery.validate.js"></script>
        <script type="text/javascript" src="/Public/layer/layer.js"></script>
        <!--<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>-->
        <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
        <script type="text/javascript">KE.show({id : 'content7', cssPath : './index.css'});</script>
    <script type="text/javascript">
    $(document).ready(function(e) {
        $(".select1").uedSelect({width : 345});
        $(".select2").uedSelect({width : 167});
        $(".select3").uedSelect({width : 100});
    });
    </script>
        <style type="text/css">
            .page a{display: inline-block;width:18px;height:18px;padding:5px;margin:2px;
                border:1px solid #238ac5;text-align: center;}
            .page span.current{display: inline-block;width:18px;height:18px;padding:5px;margin:2px;
                border:1px solid #238ac5;text-align: center;background:#3d96c9;}
            .page a:hover{background:#999999;color:#1a1a1a;}
        </style>
    </head>
    <body>
        <div class="place">
            <span>位置：</span>
            <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">订单管理</a></li>
            <li><a href="#">订单列表</a></li>
            </ul>
        </div>
        <div class="formbody">
            <div id="usual1" class="usual">
                <div id="tab2" class="tabson">
                    <ul class="seachform">
                        <li><label>综合查询</label><input name="" type="text" class="scinput"/></li>
                        <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>
                    </ul>
                    <table class="tablelist">
                        <thead>
                        <tr>
                            <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                            <th>订单号</th>
                            <th>下单时间</th>
                            <th>用户名</th>
                            <th>商品图片</th>
                            <th>商品名称</th>
                            <th>购买数量</th>
                            <th>应付金额</th>
                            <th>订单状态</th>
                            <!--<th>发货时间</th>-->
                            <!--<th>完成时间</th>-->
                            <th>订单操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($orderlist)): $k = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr>
                                    <td><?php echo ($k+$n); ?></td>
                                    <td><?php echo ($value["ordersyn"]); ?></td>
                                    <td><?php echo (date("Y-m-d H:i:s",$value["createtime"])); ?></td>
                                    <td><?php echo ($value["username"]); ?></td>
                                    <td><img src="/Public/Upload/goodspic/<?php echo ($value["pic"]); ?>" width="150px" height="100px"></td>
                                    <td width="300px"><?php echo (mb_substr($value["goodsname"],0,20,'utf-8')); ?></td>
                                    <td><?php echo ($value["buynum"]); ?></td>
                                    <td><?php echo ($value["prices"]); ?></td>
                                    <td><?php echo ($value["order_status_name"]); ?></td>
                                    <!--<td><?php echo (date("Y-m-d H:i:s",$value["sendtime"])); ?></td>-->
                                    <!--<td><?php echo (date("Y-m-d H:i:s",$value["overtime"])); ?></td>-->
                                    <td><a href="javascript:affirm(<?php echo ($value["id"]); ?>);" class="tablelink">确认发货</a></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="pagin">
                        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($num); ?>&nbsp;</i>页</div>
                        <div class="paginList">
                            <div class="page">
                                <?php echo ($page); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
        $('.tablelist tbody tr:odd').addClass('odd');
        function affirm(id){
            layer.confirm('你确定要发货么？', {
                btn: ['确定','取消']
            }, function(){
                $.get("<?php echo U('Admin/Order/affirm');?>", {id: id},function(v){
                    if(v.status=='ok') {
                        layer.msg(v.msg, {icon: 1, time: 2000}, function () {
                            location.reload();
                        });
                    }else{
                        layer.msg(v.msg, {time: 2000}, function () {
                            location.reload();
                        })
                    }
                })
            }, function(){
                layer.msg('已取消', {icon:1});
            });
        }
    </script>
</html>