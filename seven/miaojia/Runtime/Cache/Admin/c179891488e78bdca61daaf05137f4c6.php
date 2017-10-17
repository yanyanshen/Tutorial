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
            //导出操作
            $("#export").click(function(){
                location.href="<?php echo u('expCategory');?>";
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
            $("#delChk").click(function(){
                if($(':checked').size()>0){   //size()对象，用于匹配当前元素的个数
                    layer.confirm('你确定要删除吗？',{
                                btn:['确认','取消']
                            },function(){
                                $.ajax({
                                    url:"<?php echo u('delChk');?>",
                                    type:'post',
                                    data:{data:$("#form1").serializeArray()},
                                    success:(function(data){
                                        layer.msg(data.message,{
                                            icon:1,
                                            time:3000
                                        },function(){
                                            location.reload();
                                        })
                                    })
                                })
                            },function(){
                                //取消删除的操作
                                layer.msg('取消了删除！')
                            }
                    );
                }
            })
        });
    </script>
</head>
<body>
<div id="search_bar" class="mt10">
    <div class="box">
        <div class="box_border">
            <div class="box_top"><b class="pl15">搜索</b></div>
            <div class="box_center pt10 pb10">
                <form action="<?php echo u('categoryList');?>" method="post" autocomplete="off" disableautocomplete>
                    <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>分类名称:</td>
                            <td><input type="text" name="catename" class="input-text lh25" size="10">&nbsp;&nbsp;<input type="submit" value="确定" class="ext_btn ext_btn_submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="button" class="mt10">
    <a href="<?php echo u('add_category');?>"><input type="button" name="button" class="btn btn82 btn_add" value="新增"></a>
    <input type="button" name="delChk" id="delChk" class="btn btn82 btn_del" value="删除">
    <input type="button" name="chkAll" id="chkAll" class="btn btn82 btn_checked" value="全选">
    <input type="button" name="reChkAll" id="reChkAll" class="btn btn82 btn_nochecked" value="反选">
    <input type="button" name="button" id="export" class="btn btn82 btn_export" value="导出">
</div>


<div id="table" class="mt10">
    <div class="box span10 oh">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table">
            <tr>
                <th width="30">编号</th>
                <th width="50">分类名称</th>
                <th width="100" colspan="3">所属上级分类</th>
                <th width="100">是否显示</th>
                <th width="100">操作</th>
            </tr>
            <?php if(is_array($cateList)): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr">
                    <td class="td_center"><input type="checkbox" name="chk[]" value="<?php echo ($vo["id"]); ?>"></td>
                    <td><?php echo ($vo["catename"]); ?></td>
                    <td colspan="3"><?php echo ($vo["pathname"]); ?></td>
                    <td><?php echo ($vo['flag']?'显示':'不显示'); ?></td>
                    <td><a href="<?php echo u('editCategory',array('id'=>$vo['id']));?>">编辑</a>&nbsp;&nbsp;<a href="<?php echo u('delCategory',array('id'=>$vo['id']));?>">删除</a> </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
                <?php echo ($page); ?>
    </div>
</div>
</body>
</html>