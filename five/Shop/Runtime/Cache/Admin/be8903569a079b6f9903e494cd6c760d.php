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


</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <table class="tablelist">
                <thead>
                <tr>

                    <th>权限名称</th>
                    <th>权限规则</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($ruleList)): $k = 0; $__LIST__ = $ruleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr>
                        <td><a href="<?php echo U('AuthRule/showlist',array('pid'=>$value['id']));?>"><?php echo str_repeat('&nbsp;',0*($value['level']-1));?>|--<?php echo ($value["title"]); ?></a></td>
                        <td><?php echo ($value["name"]); ?></td>
                        <td>
                            <a href="<?php echo U('addlist',array('pid'=>$value['id'],'pname'=>$value['title']));?>" class="tablelink">添加子权限</a> |
                            <a href="<?php echo U('AuthRule/showlist',array('pid'=>$value['id']));?>" class="tablelink">查看子级权限</a> |
                            <a href="<?php echo U('edit',array('id'=>$value['id']));?>" class="tablelink">编辑</a> |
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
    $(function(){
        $("#usual1 ul").idTabs();
        $('.tablelist tbody tr:odd').addClass('odd');
    })

</script>
<script type="text/javascript">
    //编辑
 /*   function edit(id){
        $.get("<?php echo U('AuthRole/edit');?>",{id:id},function(res){
            if(res.status=="ok"){
                layer.msg(res.msg,{icon:6,time:2000},function(){
                    window.location.href="<?php echo U('AuthRole/showlist');?>";
                })
            }else{
                layer.alert(res.msg,{icon:5})
            }
        })
    }*/
    //删除
    function del(id){
        layer.confirm("你确定要删除我吗?",{btn:['确定',"取消"]},function(){
            $.get("<?php echo U('AuthRule/delete');?>",{id:id},function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:6,time:2000},function(){
                        window.location.href="<?php echo U('AuthRule/showlist');?>";
                    })
                }else{
                    layer.alert(res.msg,{icon:5})
                }
            })
        })
    }
</script>
</html>