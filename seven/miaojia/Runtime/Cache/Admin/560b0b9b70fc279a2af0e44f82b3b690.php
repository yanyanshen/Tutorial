<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品列表</title>
    <link rel="stylesheet" href="/Public/Admin/css/common.css">
    <link rel="stylesheet" href="/Public/Admin/css/main.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/colResizable-1.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>

    <script type="text/javascript">
        $(function(){
            $(".list_table").colResizable({
                liveDrag:true,
                gripInnerHtml:"<div class='grip'></div>",
                draggingClass:"dragging",
                minWidth:30
            });
            $("#export").click(function(){
                location.href="<?php echo u('expGoods');?>";
            })
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
            $("#delMoreGoods").click(function(){
                if($(":checked").size()>0){
                    layer.confirm('确认删除么?',{
                        btn:['确认','取消'],
                        shade:false
                    },function(){
                        $.ajax({
                            type:"post",
                            url:"<?php echo u('delMoreGoods');?>",
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
    </script>
</head>
<body>
<div id="search_bar" class="mt10">
    <div class="box">
        <div class="box_border">
            <div class="box_top"><b class="pl15">搜索</b></div>
            <div class="box_center pt10 pb10">
                <form action="<?php echo u('goodsList');?>" method="post">
                    <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>商品名称:</td>
                            <td><input type="text" name="goodsname" class="input-text lh25" size="10">&nbsp;&nbsp;<input type="submit" value="确定" class="ext_btn ext_btn_submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="button" class="mt10">
    <a href="<?php echo u('add_goods');?>"><input type="button" name="button" class="btn btn82 btn_add" value="新增"></a>
    <input type="button" name="delMoreGoods" id="delMoreGoods" class="btn btn82 btn_del" value="删除">
    <input type="button" name="chkAll" id="chkAll" class="btn btn82 btn_checked" value="全选">
    <input type="button" name="reChkAll" id="reChkAll" class="btn btn82 btn_nochecked" value="反选">
    <input type="button" id="export" class="btn btn82 btn_export" value="导出">

    <form action="<?php echo u('impGoods');?>" method="post" enctype="multipart/form-data">
        <input type="file" name="import">&nbsp;&nbsp;
        <input type="submit" id="import" class="btn btn82 btn_export" value="导入">
    </form>
</div>


<div id="table" class="mt10">
    <div class="box span10 oh">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
            <tr>
                <th width="30">选择商品</th>
                <th width="50">商品图片</th>
                <th width="100" colspan="3">商品名称</th>
                <th width="100">所属分类</th>
                <th width="100">是否在售</th>
                <th width="100">是否推荐热销</th>
                <th width="100">操作</th>
            </tr>
            <form id="form1">
            <?php if(is_array($goodsList)): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr">
                    <td class="td_center"><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="chk[]"></td>
                    <td><img src="/upload/n3/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>" width="50" height="50"/></td>
                    <td colspan="3"><?php echo (mb_substr($vo["goodsname"],0,20,'UTF-8')); ?></td>
                    <td><?php echo ($vo["catename"]); ?></td>
                    <td><?php echo ($vo['issale']?'在售':'下架'); ?></td>
                    <td><?php echo ($vo['tj']?'推荐':'未推荐'); ?>&nbsp;&nbsp;<?php echo ($vo['hot']?'热销':'未热销'); ?></td>
                    <td><a href="<?php echo u('editGoods',array('id'=>$vo['id']));?>">编辑</a>&nbsp;&nbsp;<a href="<?php echo u('delGoods',array('id'=>$vo['id']));?>">删除</a> </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </form>
        </table>
        <?php echo ($page); ?>
    </div>
</div>
</body>
</html>