<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加商品</title>
    <link rel="stylesheet" href="/Public/Admin/css/common.css">
    <link rel="stylesheet" href="/Public/Admin/css/main.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/colResizable-1.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript" src="/Public/Admin/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/Public/Admin/ckfinder/ckfinder.js"></script>

    <script type="text/javascript">
        $(function(){
            $(".list_table").colResizable({
                liveDrag:true,
                gripInnerHtml:"<div class='grip'></div>",
                draggingClass:"dragging",
                minWidth:30
            });
            //页面加载完成赋值顶级分类
            $.each(<?php echo ($fCate); ?>, function(i, n){
                var option="<option value='"+ n.id+"'>"+n.catename+"</option>";
                $("#firstCate").append(option);
            });
            //顶级分类变化，赋值二级分类
            $("#firstCate").change(function(){
                if($("#firstCate").val()==0 && $("#secondCate").length>0){
                    $("#secondCate").remove();
                }else{
                    $.getJSON('<?php echo u('firstChildCate');?>',{fpid:$("#firstCate").val()},function(data){
                        if(data && $("#secondCate").length<=0){
                            var sel="<select name=\"secondCate\" class=\"select\" id=\"secondCate\"><option value=\"0\">二级分类</option></select>"
                            $(".select_containers").append(sel);
                        }
                        $("#secondCate option").eq(0).siblings().remove();
                        $.each(data, function(i, n){
                            var option="<option value='"+ n.id+"'>"+n.catename+"</option>";
                            $("#secondCate").append(option);
                        });
                    });
                }
            });

        });

    </script>
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
                <!-- 添加栏目开始 -->
                <tr>
                    <td width="2%">&nbsp;</td>
                    <td width="96%">

<!--编辑内容-->
<div id="forms" class="mt10">
     <div class="box">
          <div class="box_border">
              <div class="box_center">
                    <form action="<?php echo u('addCategory');?>" class="jqtransform" method="post">
                          <table class="form_table pt15 pb15" width="100%" border="0" cellpadding="0" cellspacing="0">
                               <tr>
                                 <td class="td_right">分类名称：</td>
                                 <td class=""><input type="text" name="catename" class="input-text lh30" size="40"></td>
                               </tr>
                                <tr >
                                 <td class="td_right">所属分类：</td>
                                 <td class="">
                                     <span class="fl">
                                         <div class="select_border">
                                             <div class="select_containers">
                                                 <select name="firstCate" class="select" id="firstCate">
                                                     <option value="0">顶级分类</option>
                                                 </select>
                                             </div>
                                         </div>
                                     </span>
                                 </td>
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
<!--编辑内容结束-->
                    <td width="2%">&nbsp;</td>
                </tr>
                <!-- 添加栏目结束 -->
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