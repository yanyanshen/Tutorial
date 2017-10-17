<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/jquery.validate.min.js"></script>
        <script src="/Public/Admin/js/jQuery.form.js"></script>
        <style>
            /*td{position: relative}*/
            /*label.error{position: absolute;left: 400px;}*/
            /*label.ok {*/
                /*color: green;*/
            /*}*/
            input.error{float: left}
            .dx input{}
            textarea{float: left}
            label.error{float: left;margin-left: 20px;color: red;}

        </style>
        <script>
            $(function () {
                var validate=$('#form1').validate({
                    //验证规则
                    rules:{
                        goodsname:{
                            required:true
                        },
                        saleprice:{
                            required:true
                        },
                        markprice:{
                            required:true
                        },
                        goodsnum:{
                            required:true
                        },
                        image:{
                            required:true
                        },
                        goodsintro:{
                            required:true
                        },
                        goodspro:{
                            required:true
                        },
                        goodsdetail:{
                            required:true
                        }
                    },
                    //设置提示信息
                    messages:{
                        goodsname:{
                            required:'商品名不能为空'
                        },
                        saleprice:{
                            required:'市场价格不能为空'
                        },
                        markprice:{
                            required:'本站价格不能为空'
                        },
                        goodsnum:{
                            required:'商品数量不能为空'
                        },
                        image:{
                            required:'商品图片怒能为空'
                        },
                        goodsintro:{
                            required:'商品简介不能为空'
                        },
                        goodspro:{
                            required:'商品参数不能为空'
                        },
                        goodsdetail:{
                            required:'商品详情不能为空'
                        }
                    }
                })

                //添加更多图片按钮
                $("#addmorefile").click(function(){
                    $("#goodsfile").append("<div><input type='file' name='image[]' class='input-text lh30' size='10'></div>");
                });
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
    </style>
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：评价管理-》评价回复</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('Goods/goodsList');?>">【评价列表】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="<?php echo U('pingjia/pingjiaReturn');?>" method="post" enctype="multipart/form-data" id="form1">
              <table border="1" width="100%" class="table_a">
                <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"/>
                <!--<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"/>-->
                <!--<tr>-->
                    <!--<td>用户名</td>-->
                    <!--<td><input type="text" name="goodsname" placeholder="请填写用户名称" value="<?php echo ($data["username"]); ?>"/></td>-->
                <!--</tr>-->
                <tr>
                    <td>商品名称</td>
                    <td><input type="text" name="goodsname" placeholder="请填写商品名称" value="<?php echo ($data["goodsname"]); ?>"/></td>
                </tr>
                <!--<tr>-->
                    <!--<td>商品分类</td>-->
                    <!--<td>-->
                        <!--<div class="vocation" style="display:inline-block;">-->
                            <!--<select class="select2" name="firstCate">-->
                            <!--</select>-->
                        <!--</div>-->
                        <!--<div class="vocation"  style="display:inline-block;">-->
                            <!--<select class="select2" name="secondCate" >-->
                                <!--<option value="0" >请选择</option>-->
                            <!--</select>-->
                        <!--</div>-->
                        <!--<div class="vocation"  style="display:inline-block;">-->
                            <!--<select class="select2" name="thirdCate" >-->
                                <!--<option value="0" >请选择</option>-->
                            <!--</select>-->
                        <!--</div>-->
                    <!--</td>-->
                <!--</tr>-->
                <!--<tr>-->
                    <!--<td>所属品牌</td>-->
                    <!--<td>-->
                        <!--<select name="bid" id="">-->
                            <!--<option value="">商品品牌</option>-->
                            <!--<?php if(is_array($brands)): $k = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>-->
                                <!--<option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["bname"]); ?></option>-->
                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                        <!--</select>-->
                    <!--</td>-->
                <!--</tr>-->
                <tr>
                    <td>订单号</td>
                    <td><input type="text" name="oid" value="<?php echo ($data['oid']); ?>"/></td>
                </tr>

                <tr>
                    <td>星级评价</td>
                    <td><input type="text" name="level" value="<?php echo ($data["level"]); ?>"/></td>
                </tr>
                  <tr>
                      <td>评语</td>
                      <td><input type="text" name="level" value="<?php echo ($data["pingjia"]); ?>"/></td>
                  </tr>
                <tr>
                    <td>评价时间</td>
                    <td><input type="text" name="pjtime" value="<?php echo (date('Y-m-d H:i:s',$data["pjtime"])); ?>"/></td>
                </tr>
                <!--<tr>-->
                    <!--<td class="td_right">商品图片：</td>-->
                    <!--<td class="" id="goodsfile">-->
                        <!--<div>-->
                            <!--<input type="file" name="image[]" class="input-text lh30" size="10">-->
                            <!--&nbsp;&nbsp;<a href="javascript:void(0)" id="addmorefile">添加更多图片</a>-->
                        <!--</div>-->
                    <!--</td>-->
                <!--</tr>-->
                <!--<tr>-->
                    <!--<td>商品属性</td>-->
                    <!--<td class="dx">-->
                        <!--<input type="checkbox" name="is_show" value="1" checked />是否上架-->
                        <!--<input type="checkbox" name="hot_sale" value="1" />热门商品-->
                        <!--<input type="checkbox" name="tj" value="1"/>推荐商品-->
                    <!--</td>-->
                <!--</tr>-->
                <!--<tr>-->
                    <!--<td>商品简介</td>-->
                    <!--<td>-->
                        <!--<textarea name="goodsintro" rows="7" cols="50"></textarea>-->
                    <!--</td>-->
                <!--</tr>-->
                <!--<tr>-->
                    <!--<td>商品参数</td>-->
                    <!--<td>-->
                        <!--<textarea name="goodspro" id="goodspro"></textarea>-->
                    <!--</td>-->
                <!--</tr>-->
                <tr>
                    <td>商品图片</td>
                    <td>
                        <a data-clk="" href="" target="_blank"><img data-lazy-img="done" width="110" height="110"  src="/uploads/n0/<?php echo reset(explode(',',$data['image']));?>" class=""></a>
                        <!--<a name="picdetail" id="picdetail"><img width="130" height="130" src="/uploads/n0/<?php echo reset(explode(',',$data['image']));?>" alt=""/></a>-->
                    </td>
                </tr>
                <!--<tr>-->
                    <!--<td>评价详情</td>-->
                    <!--<td>-->
                        <!--<textarea name="pingjiadetail" id="pingjiadetail"><?php echo ($data["level"]); ?></textarea>-->
                    <!--</td>-->
                <!--</tr>-->
                <tr>
                    <td>回复详情</td>
                    <td>
                        <textarea name="return" id="returndetail"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="回复" id="submit" class="button">
                        <input type="reset" value="重置" class="button">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </body>
    <script src="/Public/Admin/js/kindeditor/kindeditor-all-min.js"></script>
    <script src="/Public/Admin/js/laydate.js"></script>
    <script>
        KindEditor.ready(function(K) {
            window.editor = K.create('#picdetail');

        });
        KindEditor.ready(function(m) {
            window.editor = m.create('#pingjiadetail');

        });
        KindEditor.ready(function(n) {
            window.editor = n.create('#returndetail',{
                allowFileManager:true,
                afterBlur:function(){
                    this.sync("#returndetail");
                }
            });

        });

    </script>
</html>