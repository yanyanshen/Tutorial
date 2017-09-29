<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>

    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
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
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

<form action="<?php echo u('Admin/Class/classList');?>" method="post" id="searchForm">
    <ul class="searchform">
        <li><label>综合查询</label><input name="key" type="text" class="scinput" value="<?php echo ($keywords); ?>"/></li>
        <!--<li><label>&nbsp;</label><a href="cateAction.php?act=search" >查询</a></li>-->
        <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
    </ul>
</form>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" id="headCheck"/></th>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>分类名称</th>
                    <th>CID</th>
                    <th>PID</th>
                    <th>分类类别</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($classList)): $k = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cval): $mod = ($k % 2 );++$k;?><tr>
                        <td><input name="" type="checkbox" value="" /></td>
                        <td><?php echo ($firstRow+$k); ?></td>
                        <td><?php echo ($cval["class_name"]); ?></td>
                        <td><?php echo ($cval["class_cid"]); ?></td>
                        <td><?php echo ($cval["class_pid"]); ?></td>
                        <td><?php echo ($cval["class_path"]); ?></td>
                        <td><?php echo date("Y-m-d H:i:s",$cval[class_createtime]);?></td>
                        <td><a href="<?php echo u('Admin/Class/editClass',array('class_cid'=>$cval['class_cid']));?>" class="tablelink">编辑</a><?='&nbsp;&nbsp;&nbsp;'?> <a href="#" class="tablelink" onclick="del(<?php echo ($cval['class_cid']); ?>)"> 删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                </tbody>
            </table>

            <div id="page">
                <?php echo ($page); ?>
            </div>


        </div>

    </div>

    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>

    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</div>

</body>
<script type="text/javascript">
    function del(id){
        var url="/Admin/Class/delClass/class_cid/"+id;
        layer.alert('确定要删除这个分类吗？',{
            btn:['删除','取消']
        },function(){
            $.post(url,null,function(res){
                layer.alert(res,function(){
                    location.reload();
                });
            })
        })
    }
</script>


<script type="text/javascript">
    $("#headCheck").click(function(){
        if($("#headCheck").attr("checked")=="checked"){
            $("[type=checkbox]").attr("checked",$("#headCheck").attr("checked"));
        }else{
            $("[type=checkbox]").removeAttr("checked");
        }
    })


</script>

</html>