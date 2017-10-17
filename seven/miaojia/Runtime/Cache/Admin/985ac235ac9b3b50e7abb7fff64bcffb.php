<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加商品</title>
    <link rel="stylesheet" href="/Public/Admin/css/common.css">
    <link rel="stylesheet" href="/Public/Admin/css/main.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/colResizable-1.3.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/dist/jquery.validator.min.js?local=zh_CN"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer.js"></script>
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
            //添加更多图片按钮
            $("#addmorefile").click(function(){
                $("#goodsfile").append("<div><input type='file' name='image[]' class='input-text lh30' size='10'></div>");
            });

            //分类联动菜单第一级
            $.each(<?php echo ($fCate); ?>,function(i,n){
                var option="<option value='"+ n.id+"'>"+ n.catename+"</option>";
                $("#firstCate").append(option);
            })
            //分类联动菜单第二级
            $("#firstCate").change(function(){
                $.getJSON("<?php echo u('Category/firstChildCate');?>",{fpid:$("#firstCate").val()},function(data){
                    if(data){
                        if($("#secondCate").length<=0){
                            var sel="<select name=\"secondCate\" class=\"select\" id=\"secondCate\"></select>"
                            $(".select_containers").append(sel);
                        }
                        $("#secondCate").empty();
                        $.each(data, function(i, n){
                            var option="<option value='"+ n.id+"'>"+n.catename+"</option>";
                            $("#secondCate").append(option);
                        });
                    }else{
                        if($("#secondCate").length>0){
                            $("#secondCate").remove();
                        }
                    }
                });
            });
            //分类联动菜单第三级,因secondCate是后面append的JQ对象，所以不能用.change方法,必须要用live方法绑定change事件
            $("#secondCate").live('change',function(){
                $.getJSON("<?php echo u('Category/firstChildCate');?>",{fpid:$("#secondCate").val()},function(data){
                    if(data){
                        if($("#thirdCate").length<=0){
                            var sel="&nbsp;&nbsp;<select name=\"thirdCate\" class=\"select\" id=\"thirdCate\"></select>"
                            $(".select_containers").append(sel);
                        }
                        $("#thirdCate").empty();
                        $.each(data, function(i, n){
                            var option="<option value='"+ n.id+"'>"+n.catename+"</option>";
                            $("#thirdCate").append(option);
                        });
                    }else{
                        if($("#thirdCate").length>0){
                            $("#thirdCate").remove();
                        }
                    }
                });
            })

            //CKEDITOR.replace('goodsintro');
           var editor1= CKEDITOR.replace('goodspro');

            var editor2=CKEDITOR.replace( 'goodsdetail',
                    {
                        filebrowserBrowseUrl :  '/Public/Admin/ckfinder/ckfinder.html',
                        filebrowserImageBrowseUrl :  '/Public/Admin/ckfinder/ckfinder.html?Type=Images',
                        filebrowserFlashBrowseUrl :  '/Public/Admin/ckfinder/ckfinder.html?Type=Flash',
                        filebrowserUploadUrl :  '/Public/Admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        filebrowserImageUploadUrl  :  '/Public/Admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl  :  '/Public/Admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                    });

            $("form").validator({
                fields:{
                    goodsname:"商品名称:required;",
                    busiprice:"市场价格:required",
                    siteprice:"本站价格:required"
                },
                valid:function(form){
                  var me = this;
                    me.holdSubmit();
                    var indexloader=layer.msg("玩命提交中...",{icon:16,time:3000});
                    //因为CKeditor的值不能在客户端判断，所以必须要在提交之前把ck的值赋给对应的字段
                    $("textarea[name=goodspro]").val(editor1.document.getBody().getHtml());
                    $("textarea[name=goodsdetail]").val(editor2.document.getBody().getHtml());
                    if($("#thirdCate").length>0){
                        $(form).ajaxSubmit(function(res){
                            if(res=='添加成功'){
                                layer.close(indexloader);
                                layer.msg(res+',即将跳转到商品列表页',{
                                    icon:1,
                                    time:3000
                                },function(){
                                    location.href="<?php echo u('goodsList');?>";
                                })
                            }else{
                                layer.msg(res,{
                                    icon:1,
                                    time:3000
                                },function(){
                                    me.holdSubmit(false);
                                    layer.close(indexloader);
                                })
                            }
                        })
                    }else{
                        layer.msg('商品要添加到三级分类!请先选择分类',{
                            icon:1,
                            time:3000
                        },function(){
                            me.holdSubmit(false);
                        })
                    }
                }
            })

        });

    </script>
</head>
<body>
<div id="forms" class="mt10">
    <div class="box">
        <div class="box_border">
            <div class="box_top"><b class="pl15">添加商品</b></div>
            <div class="box_center">
                <form action="<?php echo u('save_goods');?>" class="jqtransform" method="post" enctype="multipart/form-data">
                    <table class="form_table pt15 pb15" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="td_right">商品名称：</td>
                            <td class=""><input type="text" name="goodsname" class="input-text lh30" size="40" placeholder="请填写商品名称"></td>
                        </tr>
                        <tr>
                            <td class="td_right">市场价格：</td>
                            <td class=""><input type="text" name="busiprice" class="input-text lh30" size="40" id="busiprice"></td>
                        </tr>
                        <tr>
                            <td class="td_right">本站价格：</td>
                            <td class=""><input type="text" name="siteprice" class="input-text lh30" size="40"></td>
                        </tr>
                        <tr >
                            <td class="td_right">所属分类：</td>
                            <td class="">
                    <span class="fl">
                      <div class="select_border">
                          <div class="select_containers">
                              <select name="firstCate" class="select" id="firstCate">
                              </select>
                          </div>
                      </div>
                    </span>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_right">商品味道：</td>
                            <td class=""><input type="text" name="goodsargs" class="input-text lh30" size="40">&nbsp;&nbsp;注:多个口味以英文逗号隔开，如 草莓,柠檬,西瓜</td>
                        </tr>

                        <tr>
                            <td class="td_right">商品净重：</td>
                            <td class=""><input type="text" name="weight" class="input-text lh30" size="40"></td>
                        </tr>

                        <tr>
                            <td class="td_right">商品库存：</td>
                            <td class=""><input type="text" name="goodsnum" class="input-text lh30" size="40"></td>
                        </tr>


                        <tr>
                            <td class="td_right">商品图片：</td>
                            <td class="" id="goodsfile"><div><input type="file" name="image[]" class="input-text lh30" size="10">&nbsp;&nbsp;<a href="javascript:void(0)" id="addmorefile">添加更多图片</a></div></td>
                        </tr>

                        <tr>
                            <td class="td_right">商品属性：</td>
                            <td class="">
                                <input name="issale" type="checkbox" value="1" checked style="width:20px;vertical-align: middle;"/>是否上架
                                <input name="hot" type="checkbox" style="width:20px;vertical-align: middle;" value="1"/>热门商品
                                <input name="tj" type="checkbox" value="1" style="width:20px;vertical-align: middle;"/>推荐商品
                            </td>
                        </tr>

                        <tr>
                            <td class="td_right">商品简介：</td>
                            <td>
                                <textarea name="goodsintro" cols="30" rows="10" class="textarea"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_right">产品参数：</td>
                            <td>
                                <textarea name="goodspro" cols="30" rows="10" class="textarea"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_right">商品详情：</td>
                            <td class="">
                                <textarea name="goodsdetail" id="goodsdetail" cols="30" rows="10" class="textarea"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_right">&nbsp;</td>
                            <td class="">
                                <input type="submit" class="btn btn82 btn_save2" value="保存">
                                <input type="reset" class="btn btn82 btn_res" value="重置">
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