<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
    <style type="text/css">
        div.pagin{background-color: red;}
        div.pagin div{float: right}
        div.pagin span{text-align:center;line-height: 30px; display: inline-block;width: 30px;height: 30px; background-color:orange;}
        div.pagin a{text-align:center;line-height: 30px;display: inline-block;width: 30px;height: 30px; background-color:gray;}
    </style>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>


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
    
    <form action="<?php echo U('Admin/showlist');?>" method="get" id="selForm">
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
        <th>名称</th>
        <th>所属组</th>
        <th>性别</th>
        <th>上次登录时间</th>
        <th>本次登录时间</th>
        <th>是否禁用</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
            <td><input name="" type="checkbox" value="" /></td>
            <td><?php echo ($k+$firstRow); ?></td>
            <td><?php echo ($val["adminname"]); ?></td>
            <td><?php echo ($val["group"]); ?></td>
                <?php if($val['gender'] == 0): ?><td>男</td>
                    <?php elseif($val['gender'] == 1): ?>
                    <td>女</td>
                    <?php else: ?>
                    <td>保密</td><?php endif; ?>
            <td><?php echo date("Y-m-d H:i:s",$val['lastlogintime']);?></td>
            <td><?php echo date("Y-m-d H:i:s",$val['logintime']);?></td>
                <?php if($val['active'] == 0): ?><td>已禁用</td>
                    <?php else: ?>
                    <td>已启用</td><?php endif; ?>
            <td>
                <?php if($val['active'] == 0): ?><a href="javascript:enabled(<?php echo ($val['id']); ?>);" class="tablelink">启用</a>
                    <?php else: ?>
                    <a href="javascript:disabled(<?php echo ($val['id']); ?>);" class="tablelink">禁用</a><?php endif; ?>
                <a href="<?php echo U('Admin/Admin/updlist',array('id'=>$val['id']));?>" class="tablelink">编辑</a>
                <!--<a href="<?php echo U('Admin/Admin/del',array('id'=>$val['id']));?>" class="tablelink">删除</a>-->
                <a href="javascript:del(<?php echo ($val['id']); ?>);" class="tablelink">删除</a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
       <div class="pagin">
        <!--<div class="message">共<i class="blue">1256</i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>-->
           <div><?php echo ($page); ?></div>
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
    //搜索表单查询
  /*  $(function(){
        $(".scbtn").click(function(){
            $.post("<?php echo U('Admin/selAdmin');?>",$("#selForm").serialize(),function(res){

            });
        })
    })*/
</script>
<script type="text/javascript">
    //删除
    function del(aid){
        layer.confirm("你确定要删除我吗？",{
            icon:3,
            title:'提示',
            btn:['确定','取消']
        },function(){
            $.get("<?php echo U('Admin/del');?>","id="+aid,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Admin/showlist');?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }

            },'json')
        })
    }
    //禁用
    function disabled(aid){
        layer.confirm("你确定要禁用我吗？",{
            icon:3,
            title:'提示',
            btn:['确定','取消']
        },function(){
            $.get("<?php echo U('Admin/disabled');?>","id="+aid,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Admin/showlist');?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }

            },'json')
        })
    }
    //启用
    function enabled(aid){
        layer.confirm("你确定要启用我吗？",{
            icon:3,
            title:'提示',
            btn:['确定','取消']
        },function(){
            $.get("<?php echo U('Admin/enabled');?>","id="+aid,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Admin/showlist');?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }

            },'json')
        })
    }
</script>
</html>