<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>

    <script type="text/javascript">

        function setPriority(nav,id){
            var priority=$(nav).val();
            $.post("<?php echo U('setPriority');?>",{'priority':priority,'id':id},function(res){
                if(res.status==1){
                    layer.tips(res.info, '#pri'+id, {
                        tips: [2, '#3EAFE0']
                    });
                }
            })
        }
        //删除
        function del(id){
            layer.confirm("你确定要删除我吗?",{icon:4,btn:['确定','取消']},function(){
                $.get("<?php echo U('AuthGroup/delete');?>",{id:id},function(res){
                    if(res.status=="ok"){
                        layer.msg(res.msg,{icon:6,time:2000},function(){
                            window.location.href="<?php echo U('AuthGroup/showlist');?>";
                        });
                    }else{
                        layer.alert(res.msg);
                    }
                })
            });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
        });
    </script>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">权限管理</a></li>
        <li><a href="#">管理组列表</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <table class="tablelist">
                <thead>
                <tr>
                    <th>管理组名称</th>
                    <th>成员</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($groupList)): $i = 0; $__LIST__ = $groupList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($value["title"]); ?></td>
                        <td><?php echo ($value["member"]); ?></td>
                        <td>
                            <!--<a href="<?php echo U('addMember',array('gid'=>$value['id']));?>" class="tablelink">添加组员</a> ｜-->
                            <a href="javascript:addMember(<?php echo ($value['id']); ?>)" class="tablelink">添加组员</a> ｜
                            <a href="<?php echo U('allocateRule',array('gid'=>$value['id']));?>" class="tablelink">分配权限</a> ｜
                            <a href="<?php echo U('edit',array('id'=>$value['id']));?>" class="tablelink">编辑</a> ｜
                            <!--<a href="<?php echo U('delete',array('id'=>$value['id']));?>" class="tablelink">删除</a>-->
                            <a href="javascript:del(<?php echo ($value['id']); ?>)" class="tablelink">删除</a>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</div>
</body>
<script type="text/javascript">
    //添加组员
    function addMember(group_id){
        layer.open({
            type:2,
            title:"添加成员",
            skin:'demo-class',
            area:["350px","200px"],
            shadeClose: true,
            shade: 0.8,
            content:"<?php echo U('addMember');?>?group_id="+group_id
        })
    }
</script>
<script type="text/javascript">
    $(function(){
        $("#usual1 ul").idTabs();
        $('.tablelist tbody tr:odd').addClass('odd');
    })
</script>
</html>