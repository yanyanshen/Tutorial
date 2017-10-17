<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title>分类列表</title>

    <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
    <script src="/Public/Admin/js/jQuery-1.8.2.min.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/layer.js"></script>
    <script>
        $(function(){
            $('.delete').click(function(){
                var name=$(this).attr("name");
                layer.confirm('真的要删除吗?', {icon: 3, title:'标题'}, function(index){
                    $.post("<?php echo U('Nev/delNev');?>",{id:name},function(res){
                        if(res.status==0){
                            layer.msg(res.info);
                        }else{
                            layer.msg(res.info);
                            function url(){
                                location.href="<?php echo U('Nev/nevList');?>";
                            }
                            setTimeout(url,500);
                        }

                    })
                });
//                layer.confirm('确定要下架吗?',{icon:9,title:'上下架操作'},function(index){
//                    layer.msg('');
//                });
            })


            $(".priority").change(function(){
                var id=$(this).attr("name");
                var v=$(this).val();
                $.post("<?php echo U('Nev/updatePri');?>",{id:id,priority:v},function(res){})


            })
        })


    </script>
    <style>
        table th,table td{font-size: 15px;}

    </style>
</head>
<body>
<style>
    .tr_color{background-color: #9F88FF}
</style>
<div class="div_head">
            <span>
                <span style="float: left;">当前位置是：管理员管理-》菜单列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('Nev/addNev');?>">【添加菜单】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px; margin: 10px 5px;">
    <table class="table_a" border="1" width="100%">
        <tbody><tr style="font-weight: bold;">
            <td width="100px">优先级</td>
            <td width="20%">菜单名称</td>
            <td width="40%">菜单规则</td>
            <td align="center">操作</td>
        </tr>

        <?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr id="product1">
                <td width="100"><input type="text" name="<?php echo ($val['id']); ?>" value="<?php echo ($val['priority']); ?>" class="priority"></td>
                <td><?php echo str_repeat("&nbsp;",$val["level"]-1);?>|- -<?php echo ($val["name"]); ?></td>

                <td width="50%"><?php echo ($val["url"]); ?></td>
                <!--<td><a onclick="confirm('已展示！')" href="<?php echo U('Category/zhanshi',array('id'=>$value['id']));?>"  style="text-decoration: none" >展示</a>-->
                <!--<a href="<?php echo U('Category/xiajia/',array('id'=>$value['id']));?>" style="text-decoration: none" onclick="confirm('已下架！')">下架</a>-->
                <!--<a href="<?php echo U('Category/del',array('id'=>$value['id']));?>" style="text-decoration: none" onclick="return confirm('确定要删除吗？')">删除</a>-->
                <!--</td>-->
                <td>
                    <a href="<?php echo U('Nev/addNev',array('id'=>$val['id']));?>" style="text-decoration: none" class="lay" name="<?php echo ($val['id']); ?>">添加子菜单</a>
                    <a href="<?php echo U('Nev/updateNev',array('id'=>$val['id']));?>" style="text-decoration: none">编辑</a>
                    <a href="javascript:void(0);" style="text-decoration: none" name="<?php echo ($val['id']); ?>" class="delete">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>