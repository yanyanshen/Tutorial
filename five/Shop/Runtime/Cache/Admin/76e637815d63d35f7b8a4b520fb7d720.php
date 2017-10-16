<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Home/sale/js/jquery-1.7.1.min.js"></script>
    <!--<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>-->
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/timer/WdatePicker.js"></script>


    <!--更改-->
    <link type="text/css" href="/Public/Home/sale/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
    <link type="text/css" href="/Public/Home/sale/css/jquery-ui-timepicker-addon.css" rel="stylesheet" />

    <script type="text/javascript" src="/Public/Home/sale/js/jquery-ui-1.8.17.custom.min.js"></script>
    <script type="text/javascript" src="/Public/Home/sale/js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="/Public/Home/sale/js/jquery-ui-timepicker-zh-CN.js"></script>
    <script type="text/javascript">
        $(function () {

            $(".ui_timepicker").datetimepicker({
                //showOn: "button",
                //buttonImage: "./css/images/icon_calendar.gif",
                //buttonImageOnly: true,
                showSecond: true,
                timeFormat: 'hh:mm:ss',
                stepHour: 1,
                stepMinute: 1,
                stepSecond: 1
            })
        })
    </script>
    <!--更改结束-->

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
    <style type="text/css">
        .logobox{ width:200px; height:130px; border:1px solid #dddddd; margin-left:90px;}
        .resizebox{ width:180px; height:110px; border:1px solid #dddddd;margin:10px; }


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
        <div id="tab1" class="tabson">
            <form id="form1" action="<?php echo U('Admin/Sale/edictlist');?>" method="post">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><ul class="forminfo">
                        <li><label>商品名称<b>*</b></label>
                            <input name="goodsname" type="text"  class="dfinput" disabled value="<?php echo ($val['goodsname']); ?>"  style="width:300px;"/>
                        </li>
                    <input type="hidden" value="<?php echo ($val['id']); ?>" name="id"/>
                        <li>
                            <div class="logobox">
                                <div class="resizebox">
                                    <img src="/Public/Admin/Uploads/goods/<?php echo ($val['pic']); ?>" alt="" height="110px" width="180px"  />
                                </div>
                            </div>
                        </li>
                        <li><label>开始时间<b>*</b></label>
                            <!--<input name="starttime" value="<?php echo date('Y-m-d H:i:m',$list[0]['starttime']);?>" type="text" onfocus="WdatePicker({isShowClear:false,readOnly:true})"  class="Wdate"  style="height:30px;"/>-->
                            <input type="text" name="starttime" class="ui_timepicker" value="<?php echo date('Y-m-d H:i:m',$val['starttime']);?>">
                        </li>
                        <li><label>截止时间<b>*</b></label>
                            <input type="text" name="endtime" class="ui_timepicker" value="<?php echo date('Y-m-d  H:i:m',$val['endtime']);?>">
                            <!--<input class="Wdate" value="<?php echo date('Y-m-d  H:i:m',$list[0]['endtime']);?>" name="endtime" type="text" onfocus="WdatePicker({isShowClear:false,readOnly:true})"     style="height:30px;" />-->
                        </li>

                    <li><label>&nbsp;</label><input id="btn" type="submit" class="btn" value="编辑发布"/></li>
                </ul><?php endforeach; endif; else: echo "" ;endif; ?>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    $(function(){
        $('#form1').submit(function() {
            $(this).ajaxSubmit(function(res) {

                if(res.status=="ok"){

                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Sale/qianggou');?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }
            });
            return false; //阻止表单默认提交
        });

    })
</script>