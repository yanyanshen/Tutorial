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
    <style>
        #page a{
            display: inline-block;
            width: 18px;
            height:18px;
            padding:5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 18px;
            border: 1px solid #c2ccd1;
            background: #3D96C9;
            color:#fff;
        }
        #page a:hover{
            background: deeppink;
            color:#000;
        }
        #page span.current{
            display: inline-block;
            width: 18px;
            height:18px;
            padding:5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 18px;
            border: 1px solid #c2ccd1;
            background:#ff2832;
            color:#000;
            font-weight: bold;
        }
        #page span.rows{
            float:left;
            margin-right:50px;
            margin-top:5px;
            font-size: 20px;
        }
        #page span.rows b{
            font-size: 20px;
            color:red;
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
    <form action="" method="get">
    <ul class="seachform">
    <li><label>综合查询</label><input name="key" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
    </ul>
    </form>
    <table class="tablelist">
    	<thead>
            <tr>
            <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
            <th>姓名</th>
            <th>状态</th>
            <th>上次登录时间</th>
            <th>上次登录ip</th>
            <th>本次登录时间</th>
            <th>本次登录ip</th>
            <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                <td><?php echo ($k+$firstRow); ?></td>
                <td><?php echo ($val["adminname"]); ?></td>
                <td><?php switch($val["status"]): case "0": ?>禁用<?php break;?>
                    <?php case "1": ?>普通<?php break;?>
                    <?php case "2": ?>超级<?php break;?>
                    <?php default: ?>非法<?php endswitch;?></td>
                <td><?php if(($val['time']) > "0"): echo (date("Y-m-d H:i:s",$val["last_time"])); endif; ?></td>
                <td><?php echo ($val["last_ip"]); ?></td>
                <td><?php if(($val['time']) > "0"): echo (date("Y-m-d H:i:s",$val["time"])); endif; ?></td>
                <td><?php echo ($val["ip"]); ?></td>
                <td>

                    <?php if(($admininfo["status"]) == "2"): if(($val["aid"] == $admininfo['aid']) or ($val["status"] < 2)): ?><a href="<?php echo u('Admin/edit',array('aid'=>$val['aid']));?> "  class="tablelink">修改</a>
                        <a href="javascript:del(<?php echo ($val['aid']); ?>)"  class="tablelink">删除</a>
                        <?php if(($val["status"]) < "2"): ?><a id='off' href="javascript:off(<?php echo ($val['aid']); ?>,<?php echo ($val['status']); ?>)" class="tablelink"> <?php if(($val['status']) > "0"): ?>禁用<?php endif; ?></a><?php endif; ?>
                        <a id='on'  href="javascript:on(<?php echo ($val['aid']); ?>)" class="tablelink"> <?php if(($val['status']) == "0"): ?>激活<?php endif; ?></a>
                            <?php else: ?>没有权限<?php endif; ?>
                      <?php else: ?>
                        <?php if($val["aid"] == $admininfo['aid']): ?><a href="<?php echo u('Admin/edit',array('aid'=>$val['aid']));?> "  class="tablelink">修改</a>
                            <?php else: ?>没有权限<?php endif; endif; ?>
                </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
        <div class="pagin">
            <ul class="paginList">
               <li><div id="page">
                   <?php echo ($page); ?>
               </div></li>
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
	</script>

</body>
<script>
    function del(aid){
        //询问框
        layer.confirm('您确定要删除吗?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Admin/del');?>",{aid:aid},function(res){
                if(res.status=='ok'){
                    layer.alert(res.msg,{
                        yes:function(){
                            location.reload();
                        }
                    });
                }else{
                    layer.alert(res.msg);
                }
            })
        })
    }
    function off(aid,status){
            $.get("<?php echo U('Admin/off');?>",{aid:aid,status:status},function(res){
                if(res.status=='ok'){
                    layer.alert(res.msg,{
                        yes:function(){
                            location.reload();
                        }
                    });
                }else{
                    layer.alert(res.msg);
                }
            })
    }
    function on(aid,status){
        $.get("<?php echo U('Admin/on');?>",{aid:aid},function(res){
            if(res.status=='ok'){
                layer.alert(res.msg,{
                    yes:function(){
                        location.reload();
                    }
                });
            }else{
                layer.alert(res.msg);
            }
        })
    }

</script>
</html>