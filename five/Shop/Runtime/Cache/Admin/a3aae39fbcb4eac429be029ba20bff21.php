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
        <form action="<?php echo U('Article/showlist');?>" method="get">
    <ul class="seachform">
    <li><label>标题查询</label><input value="<?php echo ($keywords?$keywords:''); ?>" name="keywords" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
    </ul>
        </form>
    <table class="tablelist">
    	<thead>
    	<tr>
        <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>标题</th>
        <th>分类</th>
        <th>作者</th>
        <th>是否显示</th>
        <th>发布时间</th>
        <!--<th>新闻内容</th>-->
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo ($k+$firstRow); ?></td>
        <td><?php echo ($val["title"]); ?></td>
        <td><?php echo ($val["cate"]); ?></td>
        <td><?php echo ($val["author"]); ?></td>
        <td><?php echo ($val["active"]?'显示':'隐藏'); ?></td>
            <td><?php echo date("Y-m-d H:i:s",$val['addtime']);?></td>
            <!--<td><?php echo ($val['content']); ?></td>-->
        <td>
            <a href="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink"> 删除</a>
            <?php if($val['active'] == 1): ?><a href="javascript:active(<?php echo ($val['id']); ?>)" class="tablelink">隐藏</a>
            <?php else: ?>
                <a href="javascript:active(<?php echo ($val['id']); ?>)" class="tablelink">显示</a><?php endif; ?>
            <a onclick="detail(<?php echo ($val['id']); ?>)" class="tablelink">查看详情</a>

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
        layer.confirm("确定要删除吗？",{icon:3,title:'提示',btn:['确定','取消']},function(){
            $.get("<?php echo U('Article/del');?>","id="+nid,function(res){
                if(res.status==1){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Article/showlist');?>";
                    })
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }
            })
        });
    }
    //新闻展示和隐藏
    function active(nid){
            $.get("<?php echo U('Article/active');?>","id="+nid,function(res){
                if(res.status==1 || res.status==3){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Article/showlist');?>";
                    })
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }
            })
    }

    //查看详情
   function detail(id){
       $.get("<?php echo U('Admin/Article/detail');?>",function(){
               layer.open({
                   type: 2,
                   area: ['430px','500px'],
                   shadeClose: true, //点击遮罩关闭
                   content: "<?php echo U('Admin/Article/detail');?>?id="+id
           });
       })
   }

</script>
</body>
</html>