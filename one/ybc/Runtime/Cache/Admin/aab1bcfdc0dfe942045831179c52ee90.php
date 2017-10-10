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
    <script src="/Public/Admin/js/layer/layer.js"></script>

    <script type="text/javascript">
        //修改优先级
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
    <script type="text/javascript">
        del=function(id){
            layer.confirm("你确定要删除吗？",{
                btn:['确定','取消'],
                title:"温馨提示"
            },function(){
                $.get("<?php echo U('del');?>",{'id':id},function(res){
                    if(res.status==1){
                        layer.msg(res.info,{icon:6,time:2000},function(){
                            location=location.href;
                        })
                    }else{
                    }
                })
            })
        }
    </script>

</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统管理</a></li>
        <li><a href="#">菜单列表</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <table class="tablelist">
                <thead>
                <tr>
                    <th>排序</th>
                    <th>菜单名</th>
                    <th>链接</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($navList)): $i = 0; $__LIST__ = $navList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr >
                        <td width="100"><input type="text" id="pri<?php echo ($value["id"]); ?>" value="<?php echo ($value["priority"]); ?>" onchange="setPriority(this,<?php echo ($value["id"]); ?>)"  style="height:30px;width: 50px"/></td>
                        <td><?php echo str_repeat('&nbsp;',12*($value['level']-1));?>|--<?php echo ($value["navname"]); ?></td>
                        <td><?php echo ($value["navurl"]); ?></td>
                        <td>
                            <a href="<?php echo U('add',array('pid'=>$value['id'],'pname'=>$value['navname']));?>" class="tablelink">添加子菜单</a>
                            <a href="<?php echo U('edit',array('id'=>$value['id']));?>" class="tablelink">编辑</a>
                            <a  onclick="javascript:del(<?php echo ($value['id']); ?>);" style="cursor: pointer;" class="tablelink">删除</a>
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
</html>