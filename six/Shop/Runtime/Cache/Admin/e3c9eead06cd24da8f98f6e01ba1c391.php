<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>添加商品</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
    <!--//此处引入三级联动-->
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/ckfinder/ckfinder.js"></script>
    <script type="text/javascript">
        $(function(){


            //分类联动菜单
            var getCate=function(pid,name){
                $.post('<?php echo U("Category/childCate");?>',{pid:pid},function(res){
                    if(res){
                        var str='<option value="0" selected>请选择</option>';
                        for(var i in res){
                            str+='"<option value="' + res[i].id + '">' + res[i].catename + '</option>"';
                        }
                        $('select[name="'+name+'"]').html(str);
                        $('select[name="'+name+'"]').parent().find(".uew-select-text").text($('select[name="'+name+'"]').find(':selected').text());
                    };
                },'json')
            }
            getCate(0,'firstCate');

            $('select[name="firstCate"]').change(function(){
                getCate($(this).val(),'secondCate');
                $(this).parents('.vocation').next('.vocation').show();
                $('select[name="thirdCate"]').html('<option value="0" selected>请选择</option>').parent().find(".uew-select-text").text('请选择');
            })

            $('select[name="secondCate"]').change(function(){
                getCate($(this).val(),'thirdCate');
                $(this).parents('.vocation').next('.vocation').show();
            })


        })
       $(function(){
            $("form[name='form1']").submit(function(){
                $.post("<?php echo U('Category/addCate');?>",$(this).serialize(),function(res){
                    if(res.status){
                        layer.msg("添加成功");
                        function url(){
                            location.href='<?php echo U("Category/add");?>';
                        }
                        setTimeout(url,1000)
                    }else{
                        layer.msg("添加失败");
                    }
                },'json');
                return false;
            })

        })

    </script>

    <script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all-min.js"></script>
    <script>
        $(function(){
            /*             KindEditor.ready(function(K) {
             K.create('#f_goods_introduce', {
             allowFileManager : false
             });
             });*/
            /*KindEditor.ready(function(K) {
             K.create('#f_goods_introduce', {
             resizeType : 1,
             allowPreviewEmoticons : false,
             allowImageUpload : false,
             items : [
             'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
             'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
             'insertunorderedlist', '|', 'emoticons', 'image', 'link']
             });
             });*/



        })
    </script>

    <style>
        .button {
            background-color: #3b95c8;
            display: inline-block;
            outline: none;
            cursor: pointer;
            color:#fff;
            border: 0px;
            text-align: center;
            text-decoration: none;
            font: 14px/100% Arial, Helvetica, sans-serif;
            padding: .5em 1.5em .55em;
            text-shadow: 0 1px 1px rgba(0,0,0,.5);
            -webkit-border-radius: .5em;
            -moz-border-radius: .5em;
            border-radius: .3em;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            box-shadow: 0 1px 2px rgba(0,0,0,.2);
        }
        .button:hover {
            text-decoration: none;
        }
        .button:active {
            position: relative;
            top: 1px;
        }
        /*.button{*/
        /*border: 0px;*/
        /*width:137px;height:35px; background:url(/Public/Admin/img/btnbg.png) no-repeat;*/
        /*font-size:14px;font-weight:bold;color:#fff; cursor:pointer;}*/
    </style>

</head>

<body>

<div class="div_head">
            <span>
                <span style="float:left">当前位置是：分类管理-》添加分类</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('Category/cateList');?>">【返回】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
    <form action="<?php echo U('Category/addCate');?>" method="post" enctype="multipart/form-data" name="form1">
        <table border="1" width="100%" class="table_a">
            <tr>
                <td>分类名称</td>
                <td><input type="text" name="f_goods_name" /></td>
            </tr>
            <tr>
                <td>分类位置</td>
                <td>
                     <span class="fl">
                      <div class="select_border">
                          <div class="select_containers">
                              <div class="vocation" style="display:inline-block;">
                                  <select class="select2" name="firstCate">
                                  </select>
                              </div>
                              <div class="vocation"  style="display:inline-block;">
                                  <select class="select2" name="secondCate" >
                                      <option value="0" >请选择</option>
                                  </select>
                              </div>
                              <div class="vocation"  style="display:inline-block;">
                                  <select class="select2" name="thirdCate" >
                                      <option value="0" >请选择</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                    </span>
                </td>
            </tr>

            <!--           <tr>
                           <td>商品品牌</td>
                           <td>
                               <select name="f_goods_brand_id">
                                   <option value="0">请选择</option>
                                   {foreach from=$s_brand_info key=_k item=_v}
                                   <option value="<?php echo ($_v["brand_id"]); ?>"><?php echo ($_v["brand_name"]); ?></option>
                                   {/foreach}
                               </select>
                           </td>
                       </tr>
                       <tr>
                           <td>商品价格</td>
                           <td><input type="text" name="f_goods_price" /></td>
                       </tr>
                       <tr>
                           <td>商品图片</td>
                           <td><input type="file" name="f_goods_image" /></td>
                       </tr>
                       <tr>
                           <td>商品详细描述</td>
                           <td>
                               <textarea name="f_goods_introduce" id="f_goods_introduce"></textarea>
                           </td>
                       </tr>-->

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="添加" class="button">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>