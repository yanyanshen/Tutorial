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
<script type="text/javascript" src="editor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/timer/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
<!--<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>-->
    <style>
        .pag a,.pag span{
            display: inline-block;
            width:18px;
            height:18px ;
            padding: 5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 18px;
            background: #68cdff;
            color:#000000;
            border: 1px solid #c2d2d7;
        }
        .pag a:hover{
            background: #ccc;
            color:#000000;
        }
        .pag span{
            background: #999999;
            color: #ccc;
            font-weight: bold;
        }
        .del:hover{
            color:#00a4ac;
        }
    </style>
<script type="text/javascript">
$(document).ready(function(e) {
   /* $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});*/
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
    <script>
        $(function(){
            pdSearch=function(){
                res=$("#search").val();
                if(res=='lasttime'){
                    $("#pointsLi1").css({display:"none"});
                    $("#timeLi1").css({display:"block"});
                    $("#timeLi2").css({display:"block"});
                }else{
                    $("#pointsLi1").css({display:"block"});
                    $("#timeLi1").css({display:"none"});
                    $("#timeLi2").css({display:"none"});

                }
            }
            pdSearch();
            $("#search").change(function(){
                pdSearch();
            });
        })

    </script>
</head>
<script>
$(function(){
    stopuse=function(id){
        $.post('<?php echo U("stopuse");?>',{id:id},function(res){
            if(res.status==1){
                layer.msg(res.info,{icon:1,time:1000},function(){
                    location=window.location.href;
                });
            }else{
                layer.msg(res.info,{icon:2,time:1000});
            }
        })
    }
    startuse=function(id){
        $.post('<?php echo U("startuse");?>',{id:id},function(res){
            if(res.status==1){
                layer.msg(res.info,{icon:1,time:1000},function(){
                    location=window.location.href;
                });
            }else{
                layer.msg(res.info,{icon:2,time:1000});
            }
        })
    }
    deluse=function(id){
        layer.confirm('确定删除该用户?', {icon: 3, title:'提示'}, function(){
            $.post('<?php echo U("deluse");?>',{id:id},function(resp){
                if(resp.status==1){
                    layer.msg(resp.info,{icon:1,time:1000},function(){
                        location=window.location.href;
                    });
                }else{
                    layer.msg(resp.info,{icon:2,time:1000});
                }
            })
        },function(){
            location=window.location.href;
        })
    }
    userdetail=function(id){
                layer.open({
                    type: 2,
                    skin:'layui-layer-lan',
                    title: '用户信息',
                    shadeClose: true,
                    shade: 0.6,
                    area: ['700px', '500px'],
                    content: '<?php echo U("userdetail");?>?id='+id
                });
    }
    $("#excel").click(function(){
        layer.confirm("确认导出?",{
            btn:['确认','取消'],
            title:"温馨提示"
        },function(){
            layer.msg("正在导出",{icon:6,time:2000},function(){
                location="<?php echo U('Member/export');?>";
            })
        })
    })
})
</script>
<body>
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">会员管理</a></li>
    <li><a href="#">会员列表</a></li>
    </ul>
    </div>
    <div class="formbody">
    <div id="usual1" class="usual">
  	<div id="tab2" class="tabson">
        <form action="<?php echo U('index');?>" method="get">
            <ul class="seachform">
            <li><label>查询类型</label>
            <div class="vocation">
            <select id="search" class="select3" name="way">
                <?php switch($way): case "lasttime": ?><option value="lasttime" selected>按登录时间</option>
                        <option value="username">按用户名</option><?php break;?>
                    <?php case "username": ?><option value="lasttime" >按登录时间</option>
                        <option value="username" selected>按用户名</option><?php break;?>
                    <?php default: ?>
                    <option value="lasttime" >按登录时间</option>
                    <option value="username">按用户名</option><?php endswitch;?>
            </select>
            </div>
            </li>
                <li id="pointsLi1"><label>&nbsp;</label><input name="username1" type="text" class="scinput" value="<?php echo ($username1); ?>"/></li>
                <li id="timeLi1"><label>&nbsp;</label><input name="date1" type="text" class="scinput" value="<?php echo ($date1); ?>" placeholder="起始日期" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;至</li>
                    <li id="timeLi2"><label>&nbsp;</label><input name="date2" type="text" class="scinput" value="<?php echo ($date2); ?>" placeholder="终止日期" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/></li>

            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
            <li><label>&nbsp;</label><input id="excel" type="button" class="scbtn" value="导出会员表"/></li>
            </ul>
        </form>
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>ID</th>
        <th>头像</th>
        <th>用户名</th>
        <th>手机号</th>
        <th>上次登录时间</th>
        <th>上次登录IP</th>
        <th>当前积分</th>
        <th>历史总积分</th>
        <th>状态</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($memberlist)): $k = 0; $__LIST__ = $memberlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        <td><?php echo ($k+$firstrow); ?></td>
        <td><?php echo ($val["id"]); ?></td>
            <?php if($val["avatar"] == 0): ?><td><img src="/Public/Admin/images/deavatar.jpg" alt="" style="width: 100px;height: 100px;border-radius: 999px"/></td>
                <?php else: ?>
        <td><img src="/Uploads/avatar/100/100_<?php echo ($val["avatar"]); ?>" alt="" style="border-radius: 50px;width: 100px;height: 100px"/></td><?php endif; ?>
        <td><?php echo ($val["username"]); ?></td>
        <td><?php echo ($val["mobile"]); ?></td>
        <td><?php echo (date('Y-m-d H:i:s',$val["lasttime"])); ?></td>
        <td><?php echo ($val["lastip"]); ?></td>
        <td><?php echo ($val["points"]); ?></td>
        <td><?php echo ($val["totalpoints"]); ?></td>
            <?php if($val["active"] == 1): ?><td>已启用</td>
                <?php else: ?>
        <td style="color: #ff0000">已停用</td><?php endif; ?>
        <td>
            <?php if($val["active"] == 1): ?><a onclick="javascript:stopuse(<?php echo ($val["id"]); ?>);" style="cursor: pointer;color: #0000ff">停用</a><label style="color: #999999;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</label>
                <?php else: ?>
                <a onclick="javascript:startuse(<?php echo ($val["id"]); ?>);" style="cursor: pointer;color: green">启用</a><label style="color: #999999;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</label><?php endif; ?>
                <!--<a onclick="javascript:writeuse(<?php echo ($val["id"]); ?>);" style="cursor: pointer">编辑</a><label style="color: #999999;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</label>-->
                <a onclick="javascript:deluse(<?php echo ($val["id"]); ?>);" style="cursor: pointer;color: #ff0000">删除</a><label style="color: #999999;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</label>
                <a onclick="javascript:userdetail(<?php echo ($val["id"]); ?>);" style="cursor: pointer;color: #0000ff">查看</a><label style="color: #999999;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</label>
            <a href="<?php echo U('message');?>?id=<?php echo ($val['id']); ?>" style="cursor: pointer;color: #0000ff">发送通知</a>
        </td>

        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

        <div class="pagin">
            <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($firstrow/4+1); ?>&nbsp;</i>页</div>
            <ul class="paginList">
                <li class="pag"><?php echo ($page); ?></li>
            </ul>
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

</html>