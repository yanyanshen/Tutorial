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
    <script type="text/javascript" src="/Public/Admin/cjyy/layer/layer.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/Style/skin.css" />
    <script type="text/javascript" src="/Public/Admin/cjyy/jquery.validate.js"></script>
    <script type="text/javascript" src="/Public/Admin/cjyy/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Admin/cjyy/upImg60.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all.js"></script>
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
        })
    </script>
    <style>
        input.error {
            border-color: #dda483;

        }
        .picc{
            float: left;
            margin:5px;

        }
        .selectImg{
            display: block;
            width:60px;
            height:23px;
            line-height:23px;
            margin:0px;
            padding:3px 5px;
            border:1px solid #ccc;
            border-radius:5px;
            background: #1B75B6;
            font-size:13px;
            text-align:center;
            color:#fff;
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
                <tr><td height="31"><div class="title">添加商品</div></td></tr>
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
                <form action="<?php echo U('/Admin/Goods/addgood');?>" class="jqtransform" id="jqtransform" method="post" enctype="multipart/form-data" >
                    <table class="form_table pt15 pb15" width="80%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="td_right">商品名称：</td>
                            <td class=""><input type="text" name="name" class="input-text lh15" size="25"></td>
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
                        <tr >
                            <td class="td_right">所属品牌：</td>
                            <td class="">
                                <select name="brandid" class="select" id="brandCate">
                                  <?php if(is_array($brand)): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo (mb_substr($vo["name"],0,20,'UTF-8')); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                              </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_right">商城价：</td>
                            <td class=""><input type="text" name="price" class="input-text lh30" size="25"></td>
                        </tr>
                        <tr>
                            <td class="td_right">市场价：</td>
                            <td class=""><input type="text" name="marketprice" class="input-text lh30" size="25"></td>
                        </tr>
                        <tr>
                            <td class="td_right">商品图片：</td>
                            <td class="">
                                <div class="picc">
                                <p id="preview1" ><img id="imghead1"  border=0 src='' alt=""></p><span></span>
                                <input type="file" id="image1" name="pic[]" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                                <label for="image1"  class="selectImg">选择图片</label>
                                </div>
                                <div class="picc">
                                <p id="preview2" ><img id="imghead2"  border=0 src='' alt=""></p><span></span>
                                <input type="file" id="image2" name="pic[]" onchange="previewImage(this,'preview2','imghead2')" style="display:none;" >
                                <label for="image2"  class="selectImg">选择图片</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_right">&nbsp;&nbsp;&nbsp;&nbsp;：</td>
                            <td class="">
                                <div class="picc">
                                    <p id="preview3" ><img id="imghead3"  border=0 src='' alt=""></p><span></span>
                                    <input type="file" id="image3" name="pic[]" onchange="previewImage(this,'preview3','imghead3')" style="display:none;" >
                                    <label for="image3"  class="selectImg">选择图片</label>
                                </div>
                                <div class="picc">
                                    <p id="preview4" ><img id="imghead4"  border=0 src='' alt=""></p><span></span>
                                    <input type="file" id="image4" name="pic[]" onchange="previewImage(this,'preview4','imghead4')" style="display:none;" >
                                    <label for="image4"  class="selectImg">选择图片</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_right">是否上架：</td>
                            <td class="" style="height: 30px">
                                <input type="radio" name="state" value="1" checked="checked" id="sj"/>
                                <label for="sj">上架</label>
                                <input type="radio" name="state" value="0" id="xj"/>
                                <label for="xj">下架</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_right">库存数：</td>
                            <td class=""><input type="text" name="num" class="input-text lh30" size="25"></td>
                        </tr>
                        <tr>
                            <td class="td_right">商品描述：</td>
                            <td class="">
                                <textarea  class="text" type="text" name="information"  id="ked">
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_right">&nbsp;</td>
                            <td class="" style="width: auto">
                                <button type="button" class="ext_btn ext_btn_submit" id="addgood">添&nbsp;加&nbsp;商&nbsp;品</button>
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
<script type="text/javascript">
    var validate = $('#jqtransform').validate({
        //设置验证规则
        rules: {
            name:{
                required:true,
                remote: {
                    url: '<?php echo U("Admin/Goods/checkName");?>',
                    type: 'post'
                }
            },
            cid:{
                required:true
            },
            price:{
                required:true,
                number:true,
                maxlength:10
            },
            marketprice:{
                required:true,
                number:true,
                maxlength:10
            },
            pic:{
                required:true
            },
            num:{
                required:true,
                number:true,
                maxlength:5
            }
        },
        messages: {
            name:{
                required:'不能为空',
                remote: '商品已存在'
            },
            cid:{
                required:'不能为空'
            },
            price:{
                required:'不能为空',
                number:'请输入数字',
                maxlength:'最多10位'
            },
            marketprice:{
                required:'不能为空',
                number:'请输入数字',
                maxlength:'最多10位'
            },
            pic:{
                required:'图片不能为空'
            },
            num:{
                required:'不能为空',
                number:'请输入数字',
                maxlength:'最多5位'
            }

        },
        success: function (label) {
            label.addClass("ok");
        },
        validClass: "ok",
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());

        }
    });
    jQuery.validator.onfocus = true;
    $('#addgood').click(function(){
        if (validate.form()) {
            $('#jqtransform').ajaxSubmit(function(res) {
                if(res.status=='ok'){
                    layer.confirm(res.msg,{
                                btn:['继续添加','商品列表']
                            },
                            function(){
                                layer.msg('ok',{time:1000},function(){
                                    location.href="<?php echo U('/Admin/Goods/add');?>";
                                })
                            },
                            function(){
                                layer.msg('冲向商品列表',{time:1000},function(){
                                    location.href="<?php echo U('/Admin/Goods/glist');?>";
                                })
                            })
                }

            })
            return false;

        }
    });
    //富文本框
    KindEditor.ready(function(K) {
        K.create('#ked', {
            resizeType : 1,
            allowPreviewEmoticons : true,
            allowImageUpload : true,
            items : [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link'],  afterBlur: function(){this.sync();}
        });
    });
    </script>
</body>
</html>