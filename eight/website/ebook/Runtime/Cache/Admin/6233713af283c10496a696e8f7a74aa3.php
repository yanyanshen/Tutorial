<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
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
            <ul class="seachform">
                <li><label>商品查询</label><input name="" type="text" class="scinput" /></li>
                <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>
            </ul>
            <table class="tablelist">
             <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>商品图片</th>
                    <th>商品名称</th>
                    <th>所属分类</th>
                    <th>市场价格</th> 
                    <th>商城价格</th>
                    <th>商品数量</th>
                    <th></th>
                    <th></th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                   <?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><input name="" type="checkbox" value="" /></td>
                        <td><?php echo ($vo['id']); ?></td>
                        <td><img src="/Uploads/<?php echo ($vo['pic']); ?>" /></td>
                        <td><?php echo ($vo['goodsname']); ?></td>
                        <td><?php echo ($vo['catename']); ?></td>
                        <td>￥<?php echo ($vo['marketprice']); ?></td>
                        <td>￥<?php echo ($vo['price']); ?></td>
                        <td><?php echo ($vo['number']); ?></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="<?php echo U('Goods/goodsedit',array('id'=>$vo['id']));?>"  class="tablelink">编辑</a>&nbsp;&nbsp;&nbsp;

                           
                            <a href="<?php echo U('Goods/sc',array('id'=>$vo['id']));?>" class="tablelink">删除</a>
                        </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                





                </tbody>
            </table>
        </div>    
   
 
</div>


</body>

</html>