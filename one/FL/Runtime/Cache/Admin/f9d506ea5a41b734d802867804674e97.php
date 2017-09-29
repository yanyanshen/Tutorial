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
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <?php
 include_once "searchform.php"; ?>
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" id="headCheck"/></th>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>广告位置</th>
                    <th>广告图片</th>
                    <th>广告链接</th>
                    <th>创建时间</th>
                    <th>展示状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(is_array($adList)): $k = 0; $__LIST__ = $adList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aval): $mod = ($k % 2 );++$k;?><tr>
                        <td><input name="" type="checkbox" value="" /></td>
                        <td><?php echo ($firstRow+$k); ?></td>
                        <td><?php echo ($aval["ad_pos_name"]); ?></td>
                        <td><img src="/Uploads/Advertise/<?php echo ($aval["ad_pic"]); ?>" alt="" width="100"/></td>
                        <td><?php echo ($aval["ad_url"]); ?></td>
                        <td><?php echo date("Y-m-d H:i:s",$aval['ad_createtime']);?></td>
                        <td><?php echo ($aval[ad_isshow]?'展示':'未展示'); ?></td>
                        <td><a href="<?php echo u('Admin/Advertise/editAdvertise',array('ad_aid'=>$aval['ad_aid']));?>" class="tablelink">编辑</a><?='&nbsp;&nbsp;&nbsp;'?>
                            <a href="#" class="tablelink" onclick="show(<?php echo ($aval['ad_aid']); ?>)"><?php echo ($aval[ad_isshow]?'不展示':'展示'); ?></a><?='&nbsp;&nbsp;&nbsp;'?>
                            <a href="#" class="tablelink" onclick="del(<?php echo ($aval['ad_aid']); ?>)"> 删除</a></td>
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
    <script type="text/javascript">
        function show(id){
            var url="/Admin/Advertise/toggleAdvertise/ad_aid/"+id;
            $.post(url,null,function(res){
                layer.alert(res,function(){
                    location.reload();
                });
            })
        }
        function del(id){
            var url="/Admin/Advertise/delAdvertise/ad_aid/"+id;
            layer.confirm("确定要删除这项广告吗", {
                btn: ['确定', '取消']
            },function(){
                $.post(url,null,function(res){
                    layer.alert(res,function(){
                        location.reload();
                    })
                })
            });
        }
    </script>

</div>
</body>

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