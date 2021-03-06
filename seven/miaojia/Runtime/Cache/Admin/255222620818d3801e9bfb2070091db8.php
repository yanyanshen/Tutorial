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
        $(".delUser").click(function(){
            $.ajax({
                type:"get",
                url:"<?php echo u('delUser');?>",
                data:"id="+$(this).attr("rel"),
                success:function(data){
                    layer.msg(data,{
                        icon:1,
                        time:2000
                    },function(){
                        location.reload();
                    })
                }
            })
        });

            $("#expUsers").click(function(){
                location.href="<?php echo u('expUsers');?>";
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
                <form action="<?php echo u('userList');?>" method="post">
                    <table class="form_table" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>账号:</td>
                            <td><input type="text" name="username" class="input-text lh25" size="10">&nbsp;&nbsp;<input type="submit" value="确定" class="ext_btn ext_btn_submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="button" class="mt10">
    <input type="button" name="expUsers" id="expUsers" class="btn btn82 btn_export" value="导出">
</div>


<div id="table" class="mt10">
    <div class="box span10 oh">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="list_table" style="text-align: center">
            <tr>
                <th width="30">会员编号</th>
                <th width="30">用户名</th>
                <th width="20">用户等级</th>
                <th width="50">剩余金额</th>
                <th width="50">当前状态</th>
                <th width="50">注册时间</th>
                <th width="50">生日</th>
                <th width="50">操作</th>
            </tr>
            <?php if(is_array($userList)): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr">
                    <td class="td_center"><input type="checkbox" name="chk[]" value="<?php echo ($vo["id"]); ?>"/> </td>
                    <td><?php echo ($vo["username"]); ?></td>
                    <td><?php echo ($vo["level"]); ?></td>
                    <td><?php echo ($vo["money"]); ?></td>
                    <td><?php echo ($vo['status']?'<span style="color:#008855;font-weight: bold">正常</span>':'<span style="color:#ff0000">冻结</span>'); ?></td>
                    <td><?php echo (date('Y-m-d H:i:s',$vo["regtime"])); ?></td>
                    <td><?php echo (date('Y-n-d',$vo["birthday"])); ?></td>
                    <td><a href="<?php echo u('editUser',array('id'=>$vo['id']));?>">编辑</a>&nbsp;&nbsp;<a href="javascript:void (0)" class="delUser" rel="<?php echo ($vo["id"]); ?>">删除</a> </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <?php echo ($page); ?>
    </div>
</div>
</body>
</html>