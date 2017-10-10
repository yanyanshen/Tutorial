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
<style type="text/css">
    .pag a,.pag span{
        display: inline-block;
        width:25px;
        height:25px ;
        padding: 5px;
        margin: 5px;
        text-decoration: none;
        text-align: center;
        border-radius: 5px;
        line-height: 25px;
        background: #f0ead8;
        color:#000000;
        border: 1px solid #c2d2d7;
    }
    .pag a:hover{
        background: #ccc;
        color:#000000;
    }
    .pag span{
        background: #15fffa;
        color: #ccc;
        font-weight: bold;
    }
    .del:hover{
        color:#00a4ac;
    }
</style>
  
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
    $(function(){
        /***********上下架操作********/
        active=function(id){
           layer.confirm('是否确定该操作？',{
               title:'温馨提示',
               btn:['确定','取消']
           },function(){
               $.get("<?php echo U('Adcategory/putAway');?>",{id:id},function(res){
                   if(res){
                       layer.msg(res,{time:1000,icon:1},function(){
                           location=location.href;
                       })
                   }else{
                       layer.msg('操作失败',{time:1000,icon:2},function(){
                           location=location.href;
                       })
                   }

               })
           })
        };
    })
</script>
    <script type="text/javascript">
        $(function(){
            /* **********删除操作***********/
            del=function(id){
                layer.confirm('是否确定删除？',{
                    title:'温馨提示',
                    btn:['确定','取消']
                },function(){
                    $.get("<?php echo U('del');?>",{id:id},function(res){
                        if(res){
                            layer.msg(res,{icon:1,time:1500},function(){
                                location=location.href;
                            });
                        }else{
                            layer.msg('删除失败',{icon:2,time:1500},function(){
                                location=location.href;
                            })
                        }
                    })
                })
            }
        })
    </script>

</head>

<body>
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">广告管理</a></li>
    <li><a href="#">广告分类列表</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
  
     
  	<div id="tab2" class="tabson">

     <form action="<?php echo U('Adcategory/index');?>"  method="get">
    <ul class="seachform">
    <li><label>分类查询</label><input name="search" type="text" placeholder="请输入您要查询的分类名称" value="<?php echo ($search); ?>" class="scinput" style="width: 200px " /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
    </ul>
     </form>

    <div class="ybfy">



    <table class="tablelist">
    	<thead>
    	<tr>

        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>分类名称</th>
        <th>上级分类</th>
        <th>状态</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>



        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        <td><?php echo ($k+$firstRow); ?></td>
        <td><?php echo ($val["adcatename"]); ?></td>
        <td><?php echo ($val["path"]); ?></td>
        <td><?php echo ($val['active']==1?'展示':'下架'); ?></td>
        <td><a onclick="javascript:active(<?php echo ($val['id']); ?>);" style="cursor:pointer;" class="tablelink"><?php echo ($val['active']==0?'展示':'下架'); ?></a>  &nbsp;&nbsp;&nbsp;
            <a onclick="javascript:del(<?php echo ($val['id']); ?>);" class="tablelink" style="cursor:pointer;">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        <?php if(empty($list)): ?><tr align="center">
                <td colspan="5">没有查询到任何相关分类</td>
            </tr><?php endif; ?>
    
        </tbody>
    </table>

        <!-- 分页信息-->

       <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($firstRow/4+1); ?>&nbsp;</i>页</div>
        <ul class="paginList">
        <li class="pag"><?php echo ($page); ?></li>
        </ul>
    </div>

    </div>
    
    </div>  
       
	</div> 
 
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');

     function search(id){
         var keywords = $("input[name='keywords']").val();

         var id = id ? id : 1;
         $.get("<?php echo U('index');?>", {"p": id, "keywords": keywords}, function (res) {
             $('.ybfy').html(res);
         })
     }


	</script>
    
    
    
    
    
    </div>


</body>

</html>