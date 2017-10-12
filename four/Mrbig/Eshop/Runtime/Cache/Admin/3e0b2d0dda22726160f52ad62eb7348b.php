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
                <tr><td height="31"><div class="title">商品列表</div></td></tr>
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
                        <div class="box_center pt10 pb10">
                            <form action="<?php echo u('glist');?>" method="post">
                                <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>商品名称:</td>
                                        <td><input type="text" name="name" class="input-text lh25" size="10">
                                            &nbsp;&nbsp;<input type="submit" value="查询" class="ext_btn ext_btn_submit" id="55"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <table width="100%">
                            <input type="button" name="chkAll" id="chkAll" class=" ext_btn ext_btn_submit" value="全选">&nbsp;&nbsp;
                            <input type="button" name="reChkAll" id="reChkAll" class="  ext_btn ext_btn_submit" value="反选">&nbsp;&nbsp;
                            <input type="button" name="delMoreGoods" id="delMoreGoods" class="  ext_btn ext_btn_submit" value="多项删除"> &nbsp;&nbsp;
                            <input type="button" name="addGoods"  id="addGoods" class="ext_btn ext_btn_submit" value="添加商品"><br>
                            <tr>
                                <td colspan="2">
                                    <form action="" method="" id="form1">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
                                            <tr style="background-color:#E7F1FE">
                                                <th width="15">选中</th>
                                                <th width="30">商品名称</th>
                                                <th width="60">商品图片</th>
                                                <th width="25">商城价</th>
                                                <th width="25">市场价</th>
                                                <th width="60">所属分类</th>
                                                <th width="20">是否上架</th>
                                                <th width="50">添加时间</th>
                                                <th width="30">库存</th>
                                                <th width="100">操作</th>
                                            </tr>
                                            <?php if(is_array($goodsList)): $k = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="tr">
                                                    <td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" id="input" name="chk[]"></td>
                                                    <td><?php echo (mb_substr($vo["name"],0,20,'UTF-8')); ?></td>
                                                    <!-- <td><img src="/upload/n3/<?php echo (array_shift(explode(',',(isset($vo["pic"]) && ($vo["pic"] !== ""))?($vo["pic"]):'default.jpg'))); ?>" width="50" height="50"/></td>-->
                                                    <td>
                                                        <img src="/upload/n3/<?php echo (array_shift(explode(',',$vo["pic"]))); ?>" width="50" height="50"/>
                                                        <!--<img src="/upload/n3/<?php echo (array_pop(explode(',',$vo["pic"]))); ?>" width="50" height="50"/>-->
                                                    </td>
                                                    <td><?php echo ($vo["price"]); ?></td>
                                                    <td><?php echo ($vo["marketprice"]); ?></td>
                                                    <td><?php echo ($vo["catename"]); ?></td>
                                                    <td><?php echo ($vo['state']?'在售':'下架'); ?></td>
                                                    <td><?php echo date("Y-m-d H:i:s",$vo['creattime']);?></td>
                                                    <td><?php echo ($vo["num"]); ?></td>
                                                    <td>
                                                        <div class="ext_btn ext_btn_submit" href="#" id="cut(<?php echo ($vo['id']); ?>)" onclick="cut(<?php echo ($vo['id']); ?>)"><?php echo ($vo['state']?'下架':'上架'); ?></div>
                                                        <a id="ed" class="ext_btn ext_btn_submit" href="<?php echo u('edit',array('id'=>$vo['id']));?>">编辑</a>
                                                        <div class="ext_btn ext_btn_submit" href="#"  onclick="del(<?php echo ($vo['id']); ?>)">删除</div>
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
    function cut(id) {
        $.post("<?php echo U('/Admin/Goods/goodsissale');?>", {'id': id}, function (res) {
            if (res.status == 'ok') {
                layer.msg(res.msg,{time:1000},function(){
                    location.href = "<?php echo U('/Admin/Goods/glist');?>";
                });
            }
        })
    }
    $('#addGoods').click(function(){
        location.href = "<?php echo U('/Admin/Goods/add');?>";
    });
    function del(id) {
        layer.confirm('确定要删除这个商品吗？', {
            btn: ['删除', '取消']
        }, function () {
            $.post("<?php echo U('/Admin/Goods/delGoods');?>", {'id': id}, function (res) {
                if (res.status == 'ok') {
                    layer.msg(res.msg,{time:2000},function(){
                        location.href = "<?php echo U('/Admin/Goods/glist');?>";
                    });
                }else{layer.msg(res.msg,{time:2000});}
            })
        })
    }

</script>
</body>
</html>