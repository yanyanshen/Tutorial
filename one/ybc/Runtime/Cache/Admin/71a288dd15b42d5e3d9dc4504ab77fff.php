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
            line-height: 25px;
            background: #f0ead8;
            border-radius: 5px;
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
        active=function(id){
            layer.confirm('你确定要删除这篇文章吗？',{
                title:'温馨提示',
                btn:['确定','取消']
            },function(){
                $.post("<?php echo U('del');?>",{id:id},function(res) {
                    layer.msg(res.info,{icon:1,time:1500},function(){
                        location=window.location.href;
                    })
                })
                })
            };

        $("#export").click(function(){
            layer.confirm("确认导出?",{
                btn:['确认','取消'],
                title:"温馨提示"
            },function(){
                layer.msg("正在导出",{icon:6,time:2000},function(){
                    location="<?php echo U('export');?>";
                })
            })
        })



    })
</script>
</head>
<body>
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">文章管理</a></li>
    <li><a href="#">文章列表</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual">



  	<div id="tab2" class="tabson">
     <form action="<?php echo U('index');?>" method="get">
    <ul class="seachform">
    <li><label>文章查询</label><input name="keyword" type="text" class="scinput" value="<?php echo ($keyword); ?>"/></li>
    <li><label>查询类型</label>
    <div class="vocation">
    <select class="select3" name="way">

        <?php switch($way): case "title": ?><option  value="title" selected>按标题</option>
                <option  value="author">按作者</option>
                <option  value="teatag">按标签</option>
                <option  value="content">按内容</option><?php break;?>
            <?php case "author": ?><option  value="title" >按标题</option>
                <option  value="author" selected>按作者</option>
                <option  value="teatag">按标签</option>
                <option  value="content">按内容</option><?php break;?>
            <?php case "teatag": ?><option  value="title" >按标题</option>
                <option  value="author">按作者</option>
                <option  value="teatag" selected>按标签</option>
                <option  value="content">按内容</option><?php break;?>
            <?php case "content": ?><option  value="title" >按标题</option>
                <option  value="author">按作者</option>
                <option  value="teatag">按标签</option>
                <option  value="content" selected>按内容</option><?php break;?>
            <?php default: ?>
            <option  value="title" >按标题</option>
            <option  value="author">按作者</option>
            <option  value="teatag">按标签</option>
            <option  value="content">按内容</option><?php endswitch;?>

    </select>
    </div>
    </li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
    <li><label>&nbsp;</label><input name="" type="button" class="scbtn" id="export" value="导出文章表"/></li>
    </ul>
    </form>

        <div class="ybfy">

    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>标题</th>
        <th>作者</th>
        <th>标签</th>
        <th>文章简介</th>
        <th>发布时间</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>


        
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        <td><?php echo ($k+$firstRow); ?></td>
        <td><?php echo ($val["title"]); ?></td>
        <td><?php echo ($val["author"]); ?></td>
        <td><?php echo ($val["teatag"]); ?></td>
        <td><?php echo (truncate_cn($val["descript"],100,'',0)); ?>......</td>
        <td><?php echo (date("Y-m-d H:i:s",$val["dateline"])); ?></td>
        <td><a href="<?php echo U('modify');?>?id=<?php echo ($val['id']); ?>" class="tablelink">修改</a> &nbsp;&nbsp;&nbsp;&nbsp;
            <a onclick="javascript:active(<?php echo ($val['id']); ?>);"   style="cursor: pointer" class="tablelink">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        <?php if(empty($list)): ?><tr align="center">
                <td colspan="7">没有查询到所需条件的相关文章</td>
            </tr><?php endif; ?>
        

    
        </tbody>
    </table>
    
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

    function search(id) {
        var keywords = $("input[name='keywords']").val();
        var way=$("select[name='wany']").val();

        var id = id ? id : 1;
        $.get("<?php echo U('index');?>", {"p": id, "keywords": keywords,"way":way}, function (res) {
            $('.ybfy').html(res);
        })
    }


	</script>
    
    
    
    
    
    </div>


</body>

</html>