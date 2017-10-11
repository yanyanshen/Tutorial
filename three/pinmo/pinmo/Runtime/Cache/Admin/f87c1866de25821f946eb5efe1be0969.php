<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
<link href="/three17/pinmo/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/three17/pinmo/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/three17/pinmo/Public/Admin/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/three17/pinmo/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/three17/pinmo/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/three17/pinmo/Public/Admin/editor/kindeditor.js"></script>
    <script src="/three17/pinmo/Public/Admin/layer/layer.js"></script>

<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
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
            background: #3eafe0;
            color:#000;
        }
        #page a:hover{
            background: #FF6B00;
            color:#fff;
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
            background: #EDF6FA;
            color:#000;
            font-weight: bold;
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
    
    

    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号<i class="sort"><img src="/three17/pinmo/Public/Admin/images/px.gif" /></i></th>
        <th>分类名称</th>
        <th>CID</th>
        <th>PID</th>
        <th>上级分类</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($catelist)): $k = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$catelist): $mod = ($k % 2 );++$k;?><tr>
        <td><?php echo ($k+$firstRow); ?></td>
        <td><?php echo ($catelist["catename"]); ?></td>
        <td><?php echo ($catelist["cid"]); ?></td>
        <td><?php echo ($catelist["pid"]); ?></td>
        <td><?php echo ($catelist["pathname"]); ?></td>

        <td><a href="javascript:del(<?php echo ($catelist['cid']); ?>);" class="tablelink"> 删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    
        </tbody>
    </table>

        <div id="page">
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

    function del(id) {
        layer.confirm('您是真的要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("<?php echo U('Admin/Category/del');?>", {'id': id}, function (res) {
                if (res.status == 'ok') {
                    layer.alert(res.msg, {
                        yes:function(){
                            location.href="<?php echo U('Admin/Category/catelsit');?>";
                        }
                    });
                } else {
                    layer.alert(res.msg);
                }
                ;
            })
        })
    }
</script>

</html>