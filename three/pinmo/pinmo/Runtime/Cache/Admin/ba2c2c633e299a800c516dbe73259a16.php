<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/three17/pinmo/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/three17/pinmo/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/three17/pinmo/Public/Admin/js/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="/three17/pinmo/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/three17/pinmo/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/three17/pinmo/Public/Admin/editor/kindeditor.js"></script>
    <script src="/three17/pinmo/Public/Admin/layer/layer.js"></script>
    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });



    </script>
    <style>
    #adlist{width:90%;}
    #page a{
        display: inline-block;
        width: 18px;
        height:18px;
        padding:5px;
        margin: 2px;
        text-decoration: none;
        text-align: center;
        line-height: 18px;
        border: 1px solid #c2ccd1;
        background: #3eafe0;
        color:#000;
    }
    #page a:hover{
        background: #FF6B00;
        color:#fff;
    }
    #page span.current{
        display: inline-block;
        width: 18px;
        height:18px;
        padding:5px;
        margin: 2px;
        text-decoration: none;
        text-align: center;
        line-height: 18px;
        border: 1px solid #c2ccd1;
        background: #EDF6FA;
        color:#000;
        font-weight: bold;
    }



</style>
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
            <table class="tablelist" id="adlist">
                <thead>
                <tr>
                    <th>编号<i class="sort"><img src="/three17/pinmo/Public/Admin/images/px.gif" /></i></th>
                    <th>广告名称</th>
                    <th>广告位置</th>
                    <th>广告图片</th>
                    <th>广告描述</th>
                    <th>广告上架</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($ad)): $k = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr>

                        <td><?php echo ($k+$firstRow); ?></td>
                        <td><?php echo ($value["adname"]); ?></td>
                        <td><?php echo ($value["position"]); ?></td>
                        <td><img src="/three17/pinmo/Uploads/<?php echo ($value["adpic"]); ?>"  width="200px" height="100px"/></td>
                        <td><?php echo ($value["des"]); ?></td>
                        <td><?php echo ($value['state']==1?'上架':'下架'); ?></td>
                        <td><a href="javascript:del(<?php echo ($value['id']); ?>);" class="tablelink">删除</a>
                            <a href="<?php echo u('Admin/Ad/edit',array('id'=>$value['id']));?>" class="tablelink">编辑</a>
                            <a href="javascript:state(<?php echo ($value['id']); ?>);" class="tablelink"><?php echo ($value['state']==1?'下架':'上架'); ?></a></td>
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
<script>
    function del(id) {
        layer.confirm('您是真的要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("<?php echo U('Admin/Ad/del');?>", {'id': id}, function (res) {
                if (res.status == 'ok') {
                    layer.alert(res.msg, {
                        yes:function(){
                            location.href="<?php echo U('Admin/Ad/adlist');?>";
                        }
                    });
                } else {
                    layer.alert(res.msg);
                }
                ;
            })
        })
    }
function state(id){
    $.post("<?php echo U('Admin/Ad/state');?>", {'id': id}, function (res) {
        if (res.status == 'ok') {
            layer.alert(res.msg, {
                yes:function(){
                    location.href="<?php echo U('Admin/Ad/adlist');?>";
                }
            });
        } else {
            layer.alert(res.msg);
        }
        ;
    })
}
</script>
</html>