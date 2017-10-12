<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品列表</title>
    <link rel="stylesheet" href="/Public/Admin/css/common.css">
    <link rel="stylesheet" href="/Public/Admin/css/main.css">
    <script type="text/javascript" src="/Public/Admin/cjyy/jQuery-1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/colResizable-1.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript" src="/Public/Admin/cjyy/jquery.validate.js"></script>
    <script type="text/javascript" src="/Public/Admin/cjyy/layer/layer.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".list_table").colResizable({
                liveDrag:true,
                gripInnerHtml:"<div class='grip'></div>",
                draggingClass:"dragging",
                minWidth:30
            });

            $("#chkAll").click(function(){
                $("input[name='chk[]']").each(function(){
                    $(this).attr('checked',true);
                })
            })

            $("#reChkAll").click(function(){
                $("input[name='chk[]']").each(function(){
                    if($(this).attr('checked')){
                        $(this).attr('checked',false);
                    }else{
                        $(this).attr('checked',true);
                    }
                })
            })
            $("#delMoreGoods").click(function(){
                if($(":checked").size()>0){
                    layer.confirm('确认删除么?',{
                        btn:['确认','取消'],
                        shade:false
                    },function(){
                        $.ajax({
                            type:"post",
                            url:"<?php echo u('delMoreGoods');?>",
                            data:{data:$("#form1").serializeArray()},
                            success:(function(data){
                                layer.msg(data.message,{
                                    icon:1,
                                    time:2000
                                },function(){
                                    location.reload();
                                    $("input[name='chk[]']").each(function(){
                                        $(this).attr('checked',false);
                                    })
                                });
                            })
                        })
                    },function(){
                        //取消删除实际操作代码
                        $("input[name='chk[]']").each(function(){
                            $(this).attr('checked',false);
                        })
                    });
                }
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
            background: #f0ead8;
            color:#08c;
        }
        #page a:hover{
            background: #333;
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
            background: #00A9E8;
            color:#fff;
            font-weight: bold;
        }
        #addGoods{
            float:right;
            margin-right: 30px;
        }
    </style>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <!-- 头部开始 -->
    <tr>
        <td width="17" valign="top" background="/Public/Admin/Images/mail_left_bg.gif">
            <img src="/Public/Admin/Images/left_top_right.gif" width="17" height="29" />
        </td>
        <td valign="top" background="/Public/Admin/Images/content_bg.gif">
            <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" background=".//Public/Admin/Images/content_bg.gif">
                <tr><td height="31"><div class="title">收货成功</div></td></tr>
            </table>
        </td>
        <td width="16" valign="top" background="/Public/Admin/Images/mail_right_bg.gif"><img src="/Public/Admin/Images/nav_right_bg.gif" width="16" height="29" /></td>
    </tr>
    <!-- 中间部分开始 -->
    <tr>
        <!--第一行左边框-->
        <td valign="middle" background="/Public/Admin/Images/mail_left_bg.gif">&nbsp;</td>
        <!--第一行中间内容-->
        <td valign="top" bgcolor="#F7F8F9">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <!-- 空白行-->
                <tr><td colspan="2" valign="top">&nbsp;</td><td>&nbsp;</td><td valign="top">&nbsp;</td></tr>
                <tr>
                    <td colspan="4">
                        <table>
                            <tr>
                                <td width="100" align="center"><img src="/Public/Admin/Images/mime.gif" /></td>
                                <td valign="bottom"><h3 style="letter-spacing:1px;">MrBig,改变空间，改变生活！</h3></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- 一条线 -->

                <tr>
                    <td height="40" colspan="4">
                        <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                            <tr><td></td></tr>
                        </table>
                    </td>
                </tr>
                <!-- 产品列表开始 -->
                <tr>
                    <td width="2%">&nbsp;</td>
                    <td width="96%">
                        <table width="100%">
                            <input type="button" name="addGoods"  id="addGoods" class="ext_btn ext_btn_submit" value="添加商品"><br>
                            <tr>
                                <td colspan="2">
                                    <form action="" method="" id="form1">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
                                            <tr style="background-color:#E7F1FE">
                                                <th width="15%">订单编号</th>
                                                <th width="10%">用户名</th>
                                                <th width="10%">订单总价</th>
                                                <th width="15%">下单时间</th>
                                                <th width="25%">收货地址</th>
                                                <th width="10%">订单状态</th>
                                                <th width="15%">操作订单</th>
                                            </tr>
                                            <?php if(is_array($arr)): $k = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="tr">
                                                    <td><?php echo (mb_substr($vo["oid"],0,20,'UTF-8')); ?></td>
                                                    <td><?php echo ($vo["use"]); ?></td>
                                                    <td><?php echo ($vo["pmoney"]); ?></td>
                                                    <td><?php echo ($vo["time"]); ?></td>
                                                    <td><?php echo ($vo["add"]); ?></td>
                                                    <td><img id="d<?php echo ($vo["id"]); ?>" src="/Public/Admin/pay/p4.jpg" width="40" height="40" /></td>
                                                    <td>
                                                        <a href="javascript:see(<?php echo ($vo["id"]); ?>)" class="ext_btn ext_btn_submit">订单详情</a>
                                                    </td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </table>
                                        <div id="page">
                                            <?php echo ($page); ?>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="2%">&nbsp;</td>
                </tr>
                <!-- 产品列表结束 -->
                <tr>
                    <td height="40" colspan="4">
                        <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                            <tr><td></td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="2%">&nbsp;</td>
                    <td width="51%" class="left_txt">
                        <img src="/Public/Admin/Images/icon_mail.gif" width="16" height="11"> 客户服务邮箱：rainman@foxmail.com<br />
                        <img src="/Public/Admin/Images/icon_phone.gif" width="17" height="14"> 官方网站：<a href="http://www.rain-man.cn">http://www.rain-man.cn</a>
                    </td>
                    <td>&nbsp;</td><td>&nbsp;</td>
                </tr>
            </table>
        </td>
        <td background="/Public/Admin/Images/mail_right_bg.gif">&nbsp;</td>
    </tr>
    <!-- 底部部分 -->
    <tr>
        <td valign="bottom" background="/Public/Admin/Images/mail_left_bg.gif">
            <img src="/Public/Admin/Images/buttom_left.gif" width="17" height="17" />
        </td>
        <td background="/Public/Admin/Images/buttom_bgs.gif">
            <img src="/Public/Admin/Images/buttom_bgs.gif" width="17" height="17">
        </td>
        <td valign="bottom" background="/Public/Admin/Images/mail_right_bg.gif">
            <img src="/Public/Admin/Images/buttom_right.gif" width="16" height="17" />
        </td>
    </tr>
</table>
<script>
    function see(id){
        layer.open({
            type: 2,
            title: '订单详情',
            shadeClose: true,
            shade: 0.8,
            area: ['500px', '70%'],
            content: "/Admin/Order/seeOrder/id/"+id
        });
    }
    function del(id) {
        layer.confirm('确定要删除这个商品吗？', {
            btn: ['删除', '取消']
        }, function () {
            $.post("<?php echo U('/Admin/Goods/delGoods');?>", {'id': id}, function (res) {
                if (res.status == 'ok') {
                    layer.msg(res.msg,{time:20000},function(){
                        location.href = "<?php echo U('/Admin/Goods/glist');?>";
                    });
                }else{layer.msg(res.msg,{time:2000});}
            })
        })
    }

</script>
</body>
</html>