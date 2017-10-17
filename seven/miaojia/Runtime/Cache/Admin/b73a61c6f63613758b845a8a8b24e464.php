<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发货</title>
    <link rel="stylesheet" href="/Public/Admin/css/common.css">
    <link rel="stylesheet" href="/Public/Admin/css/main.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script src="/Public/Home/js/dist/jquery.validator.min.js?local=zh_CN"></script>
    <script type="text/javascript" src="/Public/Home/js/layer.js"></script>
    <script src="/Public/Home/js/jquery.form.js"></script>
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

            $("form").validator({
                fields:{
                    logisticsname:"物流公司:required",
                    logisticsinfo:"物流编号:required"
                },
                valid:function(form){
                    var me= this;
                    me.holdSubmit();
                    $(form).ajaxSubmit(function(data){
                        if(data=='发货成功'){
                            layer.msg(data+'正在跳转到订单列表',{
                                icon:1,
                                time:3000
                            },function(){
                                location.href="<?php echo u('orderList');?>";
                            })
                        }else{
                            layer.msg(data,{
                                icon:2,
                                time:3000
                            },function(){
                                me.holdSubmit(false);
                            })
                        }
                    })
                }
            })
        })
    </script>
</head>
<body>
<div id="forms" class="mt10">
    <div class="box">
        <div class="box_border">
            <div class="box_top"><b class="pl15">添加分类</b></div>
            <div class="box_center">
                <form action="<?php echo u('saveLogistics');?>" class="jqtransform" method="post">
                    <input type="hidden" name="orderid" value="<?php echo ($orderid); ?>"/>
                    <table class="form_table pt15 pb15" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="td_right">物流公司：</td>
                            <td class=""><input type="text" name="logisticsname" class="input-text lh30" size="40"></td>
                        </tr>
                        <tr>
                            <td class="td_right">物流编号：</td>
                            <td class=""><input type="text" name="logisticsinfo" class="input-text lh30" size="40"></td>
                        </tr>
                        <tr>
                            <td class="td_right">&nbsp;</td>
                            <td class="">
                                <input type="submit" class="btn btn82 btn_save2" value="保存">
                                <input type="reset" name="button" class="btn btn82 btn_res" value="重置">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>