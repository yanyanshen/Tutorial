<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title>分类列表</title>

    <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
    <script src="/Public/Admin/js/jQuery-1.8.2.min.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/layer.js"></script>
    <link rel="stylesheet" href="/Public/Admin/css/OrderPage.css">
    <style>
        a{text-decoration: none;}



    </style>
    <script>
        $(function(){
            $('#lay1').click(function(){
                return layer.confirm('真的要删除吗?', {icon: 3, title:'标题'}, function(index){
                    return layer.msg('是的，我要删除');
                });
//                layer.confirm('确定要下架吗?',{icon:9,title:'上下架操作'},function(index){
//                    layer.msg('');
//                });
            })
        })
    </script>
</head>
<body>
<style>
    .tr_color{background-color: #9F88FF}

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
<div class="div_head">
            <span>
                <span style="float: left;">当前位置是：分类管理-》分类列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('Category/add');?>">【添加分类】</a>
                </span>
            </span>
</div>
<div></div>
<div class="div_search">
            <span>
                <form action="<?php echo U('Category/cateList');?>" method="get" class="form1">
                    分类&nbsp;<!--<select name="s_product_mark" style="width: 200px;padding: 4px">
                    <option selected="selected" value="0">请选择</option>
                    <option value="1">苹果apple</option>-->
                    <input type="text" name="where" value="<?php echo ($where); ?>">
                    </select>
                    <input value="查询" type="submit" class="button"/>
                </form>
            </span>
</div>
<div style="font-size: 13px; margin: 10px 5px;" class="fy">
    <table class="table_a" border="1" width="100%">
        <tbody><tr style="font-weight: bold;">
            <td>序号</td>
            <td>分类名称</td>
            <td>分类id</td>
            <td>分类父id</td>
            <td>上级分类</td>
            <td>是否展示</td>
            <td align="center">操作</td>
        </tr>

        <?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr id="product1">
                <td><?php echo ($k); ?></td>
                <td><a href="#" style="text-decoration: none"><?php echo ($value['catename']); ?></a></td>
                <td><?php echo ($value['id']); ?></td>
                <td><?php echo ($value['pid']); ?></td>
                <td><?php echo ($value['pathname']); ?></td>
                <td><a href="#" style="text-decoration: none"><?php echo ($value['flag']==1?展示:下架); ?></a></td>
                <!--<td><a onclick="confirm('已展示！')" href="<?php echo U('Category/zhanshi',array('id'=>$value['id']));?>"  style="text-decoration: none" >展示</a>-->
                <!--<a href="<?php echo U('Category/xiajia/',array('id'=>$value['id']));?>" style="text-decoration: none" onclick="confirm('已下架！')">下架</a>-->
                <!--<a href="<?php echo U('Category/del',array('id'=>$value['id']));?>" style="text-decoration: none" onclick="return confirm('确定要删除吗？')">删除</a>-->
                <!--</td>-->
                <td>
                    <a href="#" style="text-decoration: none" class="lay" name="<?php echo ($value['id']); ?>"><?php echo ($value['flag']==1?下架:展示); ?></a>
                    <script>
                        $(function(){
                            $('.lay').click(function(){
                                var a=$(this).attr("name");
                                layer.confirm('真的要修改吗?', {icon: 3, title:'状态修改'}, function(index){
                                    location.href="<?php echo U('Category/replace');?>?id="+a

                                });
//                layer.confirm('确定要下架吗?',{icon:9,title:'上下架操作'},function(index){
//                    layer.msg('');
//                });
                            })
                        })
                    </script>
                    <a href="<?php echo U('Category/update',array('id'=>$value['id']));?>" style="text-decoration: none">编辑</a>
                    <a href="<?php echo U('Category/del',array('id'=>$value['id']));?>" style="text-decoration: none" onclick="return confirm('确定要删除吗？')">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
        <tr>
            <td colspan="20" style="text-align: right;"><div class="div" style="text-align: center;text-decoration: none"><?php echo ($pagelist); ?></div></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
<script>
    function cateList(i){
        var id=i?i:1;
        var value=$("input[name='where']").val();
        $.get("<?php echo U('cateList');?>",{"p":id,"where":value},function(res){
            $(".fy").html(res);
        })
    }
</script>
</html>