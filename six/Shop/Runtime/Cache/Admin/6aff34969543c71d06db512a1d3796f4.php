<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>评价列表</title>

        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/jquery.validate.min.js"></script>

        <script src="/Public/Admin/js/layer.js"></script>
        <link rel="stylesheet" href="/Public/Admin/css/OrderPage.css">
        <script>
            $(function(){
                $('.del').click(function(){
                    var a=$(this).attr("name");
                    layer.confirm('真的要删除吗?', {icon: 3, title:'评价编辑'}, function(index){
                        location.href="<?php echo U('pingjia/pingjiadel');?>?id="+a

                    });
                })
            })
        </script>
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
            .empty{font-size: 30px;position: absolute;top: 40px;color: red;}

             a{
                 text-decoration: none;
             }

        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：评价管理-》评价列表</span>
                <!--<span style="float: right; margin-right: 8px; font-weight: bold;">-->
                    <!--<a style="text-decoration: none;" href="<?php echo U('Goods/add_goods');?>">【添加商品】</a>-->
                <!--</span>-->
            </span>
        </div>
        <div></div>
        <!--<div class="div_search">-->
            <!--<span>-->
                <!--<form action="<?php echo U('Goods/goodsList');?>" method="get">-->
                   <!--商品名称: <input type="text" name="goodsname" value="">-->
                    <!--&lt;!&ndash;本站价格:   <input type="text" name="markprice" value="">&ndash;&gt;-->
                    <!--价&nbsp;&nbsp;格: 从 <input type="text" name="price1">到 <input type="text" name="price2">-->
                    <!--添加时间: 从 <input type="text" name="time1" id="time1" >-->
                    <!--到 <input type="text" name="time2" id="time2">-->
                    <!--<input type="submit" value="搜索">-->
                <!--</form>-->
            <!--</span>-->
        <!--</div>-->
        <div style="font-size: 13px; margin: 10px 5px; position:relative;" id="div">
            <form action=""></form>
            <table class="table_a" border="1" width="100%">
                <thead><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>用户名</td>
                        <td>商品名称</td>
                        <td>图片</td>
                        <td>订单号</td>
                        <td>星级评价</td>
                        <td>评价时间</td>
                        <td>是否已回复</td>
                         <td align="center">操作</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="product1">
                        <td><?php echo ($k); ?></td>
                        <td><?php echo ($vo["username"]); ?></td>
                        <td><a href="#" style="text-decoration: none"><?php echo ($vo["goodsname"]); ?></a></td>
                        <td><img src="/uploads/n3/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>" height="60" width="60"></td>
                        <td><?php echo ($vo["oid"]); ?></td>
                        <td><?php echo ($vo["level"]); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$vo["pjtime"])); ?></td>
                        <td><?php echo ($vo['return']?'已回复':'未回复'); ?></td>
                        <td>
                            <a href="<?php echo U('pingjia/pingjiaReturn',array('id'=>$vo['id']),'');?>" style="text-decoration: none"><?php echo ($vo['return']?'':'回复'); ?></a>
                            <a href="<?php echo U('pingjia/pingjiaDetail',array('id'=>$vo['id']),'');?>" style="text-decoration: none"><?php echo ($vo['return']?'详情':''); ?></a>
                            <a href="#"  class="del" name="<?php echo ($vo['id']); ?>" style="text-decoration: none">删除</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <div class="pages"><?php echo ($show); ?></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
    <!--//-->
    <script>
        function pingjiaList(i){
            var id=i?i:1;
            $.get("<?php echo U('pingjiaList');?>",{"p":id},function(res){
                $("#div").html(res);
            })
        }
    </script>

    <!-- 时间插件 -->
    <link href="/Public/Admin/js/datetimepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/datetimepicker/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/datetimepicker/datepicker-zh_cn.js"></script>
    <link rel="stylesheet" media="all" type="text/css" href="/Public/Admin/js/datetimepicker/time/jquery-ui-timepicker-addon.min.css" />
    <script type="text/javascript" src="/Public/Admin/js/datetimepicker/time/jquery-ui-timepicker-addon.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/datetimepicker/time/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>
    <script>
        $.timepicker.setDefaults($.timepicker.regional['zh-CN']);
        $("#time1").datetimepicker();
        $("#time2").datetimepicker();
    </script>
</html>