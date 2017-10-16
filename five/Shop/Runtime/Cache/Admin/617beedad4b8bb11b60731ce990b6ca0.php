<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>-->
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
  <style type="text/css">
      div.pagin{height:30px;float: right}
      div.pagin span{height: 30px;text-align: center;background-color:gray;line-height: 30px;width: 30px;display: inline-block}
      div.pagin a{height: 30px;text-align: center;background-color:orange;line-height: 30px;width: 30px;display: inline-block}
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
        <form action="<?php echo U('News/showlist');?>" method="get">
    <ul class="seachform">
    <li><label>综合查询</label><input value="<?php echo ($keywords?$keywords:''); ?>" name="keywords" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
    </ul>
        </form>
    <table class="tablelist">
    	<thead>
    	<tr>
        <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>标题</th>
        <th>作者</th>
        <!--<th>点击量</th>-->
        <!--<th>评论数</th>-->
        <!--<th>点赞数</th>-->
        <th>是否显示</th>
        <th>是否置顶</th>
        <th>发布时间</th>
        <!--<th>新闻内容</th>-->
        <th>是否评论</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo ($k+$firstRow); ?></td>
        <td><?php echo ($val["title"]); ?></td>
        <td><?php echo ($val["author"]); ?></td>
        <!--<td><?php echo ($val["clicknum"]); ?></td>-->
        <!--<td><?php echo ($val["commentnum"]); ?></td>-->
        <!--<td><?php echo ($val["likenum"]); ?></td>-->
            <?php if($val['isshow'] == 1): ?><td>显示</td>
                <?php else: ?>
                <td>隐藏</td><?php endif; ?>
            <?php if($val['top'] == 1): ?><td>是</td>
                <?php else: ?>
                <td>否</td><?php endif; ?>
            <td><?php echo date("Y-m-d H:i:s",$val['addtime']);?></td>
            <!--<td><?php echo ($val['content']); ?></td>-->
            <?php if($val['iscomment'] == 1): ?><td>已评论</td>
                <?php else: ?>
                <td>未评论</td><?php endif; ?>
        <td>
            <a href="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink"> 删除</a>
            <?php if($val['isshow'] == 1): ?><a href="javascript:tohide(<?php echo ($val['id']); ?>)" class="tablelink">隐藏</a>
            <?php else: ?>
                <a href="javascript:toshow(<?php echo ($val['id']); ?>)" class="tablelink">显示</a><?php endif; ?>
            <?php if($val['top'] == 1): ?><a href="javascript:canceltop(<?php echo ($val['id']); ?>)" class="tablelink"> 取消置顶</a>
            <?php else: ?>
                <a href="javascript:totop(<?php echo ($val['id']); ?>)" class="tablelink"> 置顶</a><?php endif; ?>
        </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    
       <div class="pagin">
        <!--<div class="message">共<i class="blue">1256</i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>-->
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
<script type="text/javascript">
    //新闻删除
    function del(nid){
        layer.confirm("确定要删除我吗？",{icon:3,title:'提示',btn:['确定','取消']},function(){
            $.get("<?php echo U('News/del');?>","id="+nid,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('News/showlist');?>";
                    })
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }
            })
        });
    }
    //新闻隐藏
    function tohide(nid){
            $.get("<?php echo U('News/tohide');?>","id="+nid,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('News/showlist');?>";
                    })
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }
            })
    }
    //新闻展示
    function toshow(nid){
            $.get("<?php echo U('News/toshow');?>","id="+nid,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('News/showlist');?>";
                    })
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }
            })
    }
    //新闻置顶
    function totop(nid){
        $.get("<?php echo U('News/totop');?>","id="+nid,function(res){
            if(res.status=="ok"){
                layer.msg(res.msg,{icon:1,time:1000},function(){
                    window.location.href="<?php echo U('News/showlist');?>";
                })
            }else{
                layer.msg(res.msg,{icon:2,time:1000});
            }
        })
    }
    //取消置顶
    function canceltop(nid){
        $.get("<?php echo U('News/canceltop');?>","id="+nid,function(res){
            if(res.status=="ok"){
                layer.msg(res.msg,{icon:1,time:1000},function(){
                    window.location.href="<?php echo U('News/showlist');?>";
                })
            }else{
                layer.msg(res.msg,{icon:2,time:1000});
            }
        })
    }
</script>
</body>
</html>