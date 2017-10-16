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
    <style>
        .catepage{
            float: right;
            margin-top:30px ;
        }
        .catepage a{
            border-radius: 50px;
            margin: 2px;
            width: 25px;
            height: 25px;
            line-height: 25px;
            border: 1px solid #ccc;
            display: inline-block;
            text-align: center;
            background-color:#3C95C8 ;
            padding: 5px;
            font-weight: bolder;

        }
        .catepage a:hover{
            background-color: white;
            color: #00aaee;
            font-weight: bolder;
        }
        .current{
            border-radius: 50px;
            width: 25px;
            height: 25px;
            border: 1px solid #ccc;
            line-height: 23px;
            display: inline-block;
            padding: 5px;
            text-align: center;
        }
        .tablelist tr th{
            text-align: center;
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
   <form action="<?php echo U('Member/showlist');?>" method="get" id="selForm">
    <ul class="seachform">
    
    <li><label>综合查询</label><input name="keywords" value="<?php echo ($keywords?$keywords:''); ?>" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input name="sub" type="submit" class="scbtn" value="查询"/></li>
    
    </ul>
       </form>

    <table class="tablelist" style="text-align: center">

<tr>
        <th>编号</th>
        <th>id</th>
        <th>会员名</th>
        <th>状态</th>
        <th>添加时间</th>
        <th>性别</th>
        <th>等级</th>
        <th>余额</th>
        <th>花费</th>
        <th>积分</th>
        <th>状态控制</th>

</tr>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                            <td width="80px"><?php echo ($k+$firstRow); ?></td>
                            <td><?php echo ($val["id"]); ?></td>
                            <td><?php echo ($val["username"]); ?></td>
                            <?php if($val['active'] == 0): ?><td><a href="javascript:enabled(<?php echo ($val['id']); ?>);">已禁用</a>
                                    <?php else: ?>
                                <td><a href="javascript:disabled(<?php echo ($val['id']); ?>);">已启用</a><?php endif; ?>
                            <td><?php echo date("Y-m-d H:i:s",$val['addtime']);?></td>
                            <?php if($val['gender'] == 0): ?><td>男</td>
                                <?php elseif($val['gender'] == 1): ?>
                                <td>女</td>
                                <?php else: ?>
                                <td>保密</td><?php endif; ?>
                            <if>
                            <td><?php echo ($val["level_name"]); ?></td>
                            </if>
                            <td><?php echo ($val["money"]); ?></td>
                            <td><?php echo ($val["costs"]); ?></td>
                            <td><?php echo ($val["credit"]); ?></td>
                            <td><a href="<?php echo U('Admin/Member/detail',array('id'=>$val['id']));?>">　详情　</a>
                            <?php if($val['active'] == 0): ?><a href="javascript:enabled(<?php echo ($val['id']); ?>);">　启用　</a>
                                <?php else: ?>
                                <a href="javascript:disabled(<?php echo ($val['id']); ?>);">　禁用　</a><?php endif; ?>
                                 <a href="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink" style="color: red">　删除　</a></td>

                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

        <div class="catepage">
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
    //禁用
            function disabled(aid){
               layer.confirm("确定禁用？",{
                 icon:3,
                    title:'提示',
                    btn:['确定','取消']
                    },function(){
                        $.get("<?php echo U('Member/disabled');?>","id="+aid,function(res){
                        if(res.status=="ok"){
                        layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Member/showlist');?>";
                        });
                        }else{
                        layer.msg(res.msg,{icon:2,time:1000});
                        }

                        },'json')
                        })
                        }
    //启用
            function enabled(aid){
            layer.confirm("确定启用？",{
            icon:3,
            title:'提示',
            btn:['确定','取消']
            },function(){
            $.get("<?php echo U('Member/enabled');?>","id="+aid,function(res){
            if(res.status=="ok"){
            layer.msg(res.msg,{icon:1,time:1000},function(){
            window.location.href="<?php echo U('Member/showlist');?>";
            });
            }else{
            layer.msg(res.msg,{icon:2,time:1000});
            }

            },'json')
            })
            }
    //删除
            function del(aid){
            layer.confirm("确定删除？",{
            icon:3,
                title:'提示',
                    btn:['确定','取消']
                },function(){
                    $.get("<?php echo U('Member/del');?>","id="+aid,function(res){
                        if(res.status=="ok"){
                            layer.msg(res.msg,{icon:1,time:1000},function(){
                                window.location.href="<?php echo U('Member/showlist');?>";
                            });
                        }else{
                            layer.msg(res.msg,{icon:2,time:1000});
                        }

                    },'json')
                })
            }
            </script>

</html>