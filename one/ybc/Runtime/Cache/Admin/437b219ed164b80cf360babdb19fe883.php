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
<!--<script type="text/javascript" src="editor/kindeditor.js"></script>-->
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>


<!--<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>-->
  
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
        .pag a,.pag span{
            display: inline-block;
            width:20px;
            height:20px ;
            border-radius: 2px;
            padding: 5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 20px;
            background: #D4E7F0;
            color:#000000;
            border: 1px solid #c2d2d7;
        }
        .pag a:hover{
            background: #7AC4DD;
            color:#000000;
        }
        .pag span{
            background: #7AC4DD;
            color: #000000;
            font-weight: bold;
        }
    </style>

<script type="text/javascript">


    var active=function(id){
        $.post("<?php echo U('Integral/show');?>",{id:id},function(res){

            layer.msg(res.info,{time:1000,icon:1},function(){
                location=window.location.href;
            });

        },'json')
    }
</script>
    <script type="text/javascript">


        var delet=function(id){
            $.post("<?php echo U('Integral/delete');?>",{id:id},function(res){

                layer.msg(res.info,{time:1000,icon:1},function(){
                    location=window.location.href;
                });

            },'json')
        }
    </script>
    <script type="text/javascript">
        $(function(){
            $('#Excel').click(function(){
                $.get("<?php echo U('Integral/excel');?>",'',function(res){
                    if(res.status==1){
                        window.open("<?php echo U('Integral/excel');?>?keywords=<?php echo ($keywords); ?>")
                    }else{
                        layer.msg(res.info,{icon:2})
                    }
                })
            })
        })
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
        <form action="<?php echo U('Integral/index');?>" method="get" >
     <li><label>商品名称查询</label><input name="keywords"  value="<?php echo ($keywords); ?>" type="text" class="scinput" /></li>
     <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
     <li><label>&nbsp;</label><input name="" id="Excel" type="button" class="scbtn" style="width: 95px" value="导出商品列表"/></li>
    </form>

    </ul>
    
    
    <table class="tablelist">
        <?php if(empty($goodslist)): else: ?>
    	<thead>
    	<tr>
        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>商品ID</th>
        <th>商品主图</th>
        <th>商品名称</th>
        <th>商品详情</th>
        <th>商品价值</th>
        <th>商品积分</th>
        <th>添加时间</th>
        <th>状态</th>
        <th>操作</th>
        <th>编辑</th>
        </tr>
        </thead><?php endif; ?>
        <tbody>
        <?php if(is_array($goodslist)): $k = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        <td><?php echo ($k+$firstrow); ?></td>
        <td><?php echo ($val['id']); ?></td>
        <td><img src="/Uploads/integralGoodsPic/100/100_<?php echo ($val['pic']); ?>" alt=""/></td>
        <td><?php echo ($val['goodsname']); ?></td>
        <td><?php echo (substr($val['detail'],0,80)); ?></td>
        <td><?php echo ($val['price']); ?></td>
        <td><?php echo ($val['points']); ?></td>
        <td><?php echo (date("Y-m-d H:i:s",$val['addtime'])); ?></td>
        <td><?php echo ($val['active']==0?'下架':'展示'); ?></td>
        <td><a onclick="javascript:active(<?php echo ($val['id']); ?>);" style="cursor: pointer" class="tablelink"><?php echo ($val['active']==0?'上架':'下架'); ?></a></td>
        <td><a href="<?php echo U('Integral/edit');?>?id=<?php echo ($val['id']); ?>" class="tablelink">编辑</a> <a onclick="javascript:delet(<?php echo ($val['id']); ?>)" style="cursor: pointer" class="tablelink">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
        <?php if(empty($goodslist)): ?><span style="font-size: 20px;font-weight: bold;">没有找到相关条件的数据</span>
      <?php else: ?>
       <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($firstrow/5+1); ?>&nbsp;</i>页</div>
        <ul class="paginList">
        <li class="pag"><?php echo ($page); ?></li>
        </ul>
    </div><?php endif; ?>
    
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

</html>