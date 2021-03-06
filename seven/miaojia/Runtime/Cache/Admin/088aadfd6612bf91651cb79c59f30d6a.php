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
            //页面加载完成赋值顶级分类,默认为0
            $.each(<?php echo ($fCate); ?>, function(i, n){   //$.each是对数组进行遍历。其中的i和n为附加参数。
                var option="<option value='"+ n.id+"'>"+n.catename+"</option>";
                $("#firstCate").append(option);    //append插入
            });
            //顶级分类变化，赋值二级分类
            $("#firstCate").change(function(){
                if($("#firstCate").val()==0 && $("#secondCate").length>0){
                    $("#secondCate").remove();
                }else{
                    //$.getJSON( )方法函数主要用来从服务器获取json编码的数据
                    $.getJSON('<?php echo u('firstChildCate');?>',{fpid:$("#firstCate").val()},function(data){
                        if(data && $("#secondCate").length<=0){
                            var sel="<select name=\"secondCate\" class=\"select\" id=\"secondCate\"><option value=\"0\">二级分类</option></select>"
                            $(".select_containers").append(sel);
                        }
                        //在二级分类中，当path的值为0的时候，移除顶级分类。siblings()返回被选元素的所有同胞元素.
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
<div id="forms" class="mt10">
    <div class="box">
        <div class="box_border">
            <div class="box_top"><b class="pl15">添加分类</b></div>
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
                                <!--<input type="reset" name="button" class="btn btn82 btn_res" value="重置">-->
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