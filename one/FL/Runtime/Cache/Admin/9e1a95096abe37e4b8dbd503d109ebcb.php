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

    <style type="text/css">
        .coo{
            color: red;
            font-weight: bold;
        }
        .cooo{
            color:#0000ff;
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

<form action="<?php echo u('Admin/Site/siteList');?>" method="post" id="searchForm">

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
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>商品图片</th>
                    <th>商品名称</th>
                    <th>商品单价</th>
                    <th>商品数量</th>
                    <th>商品总价</th>
                    <th>发货状态</th>
<!--                    <th width="200px">联系电话</th>
                    <th width="200px">购买时间</th>
                    <th width="200px">订单金额</th>
                    <th width="200px">订单状态</th>-->
                    <!--<th width="300px">管理员权限</th>-->
                    <th width="200px">操作</th>
                </tr>
                </thead>
                <tbody>

                <?php if(is_array($prods)): $k = 0; $__LIST__ = $prods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pval): $mod = ($k % 2 );++$k;?><tr>
                        <td><input name="" type="checkbox" value="" /></td>
                        <td><?php echo ($firstRow+$k); ?></td>
                        <td><img src="/Uploads/Prod/140_<?php echo ($pval['prod_pic']); ?>" alt="" width="100px" height="100px;"/></td>
                        <td><?php echo ($pval["prod_name"]); ?></td>
                        <td><?php echo ($pval["prod_sale_price"]); ?></td>
                        <td><?php echo ($pval["prod_num"]); ?></td>
                        <td><?php echo ($pval['prod_sale_price']*$pval['prod_num']); ?></td>
                        <td style="<?php echo $pval['prod_send']?'color:#74B93E;':'color:#f00;';?>"><?php echo $pval['prod_send']?'已发货':'未发货';?></td>
                        <td>

                            <?php if($orderStatus == '已付款'): ?><a href="#" class="tablelink" onclick="send(<?php echo ($pval['prod_id']); ?>,<?php echo ($pval['order_feel']); ?>)"> <?php echo $pval['prod_send']?'':'发货';?></a><?php endif; ?>
                        </td>
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
    function go(id){
        var url="/Admin/Admin/toggleAdmin/id/"+id;
        $.post(url,null,function(res){
            layer.alert(res,function(){
                location.reload();
            })
        })
    }

    function del(id){
        layer.confirm('确定要删除吗？',{
            btn:['删除','取消']
        },function(){
            var url="/Admin/Site/delSite/site_id/"+id;
            $.post(url,null,function(res){
                layer.alert(res,function(){
                    location.reload();
                });
            })
        })
    }
</script>

<script type="text/javascript">
    function send(id,feel){
        layer.confirm('确定要发货吗？',{
            btn:['发货','取消']
        },function(){
            var url="/Admin/Site/sendProd/prod_id/"+id+"/order_feel/"+feel;
            $.get(url,null,function(res){
                layer.alert(res,function(){
                    location.reload();
                });
            })
        })
    }

</script>
</html>