<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/Style/skin.css" />
    <link rel="stylesheet" href="/Public/Admin/css/common.css">
    <link rel="stylesheet" href="/Public/Admin/css/main.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/colResizable-1.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
    <script type="text/javascript">
        $(function(){

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
            $("#delMoreMessages").click(function(){
                if($(":checked").size()>0){
                    layer.confirm('确认删除么?',{
                        btn:['确认','取消'],
                        shade:false
                    },function(){
                        $.ajax({
                            type:"post",
                            url:"<?php echo u('delMoreMessages');?>",
                            data:{data:$("#form1").serializeArray()},
                            success:(function(data){
                                layer.msg(data.message,{
                                    icon:1,
                                    time:2000
                                },function(){
                                    location.reload();
                                });
                            })
                        })
                    },function(){
                        //取消删除实际操作代码
                    });
                }
            });

    });
        function delMessage(id) {
            layer.confirm('确定要删除这条留言吗？', {
                btn: ['删除', '取消']
            }, function () {
                $.post("<?php echo U('/Admin/Message/delMessage');?>", {'id': id}, function (res) {
                    if (res.status == 'ok') {
                        layer.msg(res.message,{time:1000},function(){
                            location.href = "<?php echo U('/Admin/Message/messageList');?>";
                        });
                    }else{layer.msg(res.message,{time:2000});}
                })
            })
        }

    </script>

    <style>
        #page{
            margin-left: -900px;
        }
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
        #b{
            width:800px;
            height:80px;
            background: #EEF2FB;
        }
        .b{
            width:800px;
            height:80px;
            background: #EEF2FB;
        }
       .po{
            margin-left: 780px;
        }
         .move{
              margin-left: 25px;
          }
       .zan{
              margin-left: 30px;
          }
        #input{
            position:relative;
            margin-left: -200px;
            top: 50px;
        }
        #chkAll{
        margin-left: 28px;
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
                <tr><td height="31"><div class="title">添加栏目</div></td></tr>
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
                            <form action="<?php echo u('messageList');?>" method="post" >
                                <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>留言用户:</td>
                                        <td><input type="text" name="aname" class="input-text lh25" size="
                                        18"  width="100px">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit"
                                       value="查询" class="ext_btn ext_btn_submit" ></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <br>
                        <input type="button" name="chkAll" id="chkAll" class=" ext_btn ext_btn_submit" value="全选">&nbsp;&nbsp;
                        <input type="button" name="reChkAll" id="reChkAll" class="  ext_btn ext_btn_submit" value="反选">&nbsp;&nbsp;
                        <input type="button" name="delMoreMessages" id="delMoreMessages" class="  ext_btn ext_btn_submit" value="删除"><br>
                        <br> <form action="" method="" id="form1">
                                            <?php if(is_array($messagelist)): $k = 0; $__LIST__ = $messagelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div>
                                                    <span class="flo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["aname"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span ><?php echo date("Y-m-d H:i:s",$vo['ctime']);?></span>
                                                    <input type="checkbox" value="<?php echo ($vo["id"]); ?>" id="input" name="chk[]">
                                                    <div class=" b move" id="showdiv" ><br>&nbsp;&nbsp;<?php echo ($vo["content"]); ?></div><br>
                                                    <!--<textarea class=" b move" id="showdiv" type="text"  >&nbsp;&nbsp;<?php echo ($vo["content"]); ?></textarea>-->
                                                    <a class="ext_btn ext_btn_submit po" href="#" onclick="delMessage(<?php echo ($vo['id']); ?>)">删除</a><br><br>

                                                </div><?php endforeach; endif; else: echo "" ;endif; ?>

                                        <div id="page" ><?php echo ($page); ?></div>
                                    </form>

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

</body>
</html>