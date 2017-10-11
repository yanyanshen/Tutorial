<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script src="/Public/Admin/layer/layer.js"></script>
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
        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>管理员名称</th>
        <th>上次登录时间</th>
        <th>上次登录ip</th>
        <th>是否启用</th>
        <th>账户类型</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($adminlist)): $k = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admin): $mod = ($k % 2 );++$k;?><tr>
        <td><?php echo ($k+$firstRow); ?></td>
        <td><?php echo ($admin['adminname']); ?></td>
        <td><?php echo (date('Y-m-d H:i:s',$admin['creatime'])); ?></td>
        <td><?php echo ($admin['ip']); ?></td>
        <td><?php echo ($admin['power']==1?'启用':'禁用'); ?></td>
            <td><?php switch($admin["status"]): case "0": ?>普通管理员<?php break;?>
                <?php case "1": ?>超级管理员<?php break;?>
                <?php case "2": ?>系统管理员<?php break;?>


                <?php default: endswitch;?></td>

        <td><a href="<?php echo U('Admin/Admin/edit',array('id'=>$admin['id']));?>"  class="tablelink">修改密码</a>     <a href="javascript:opp(<?php echo ($admin['id']); ?>);" class="tablelink"><?php echo ($admin['power']==1?'禁用':'启用'); ?> </a>
           </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

        <div id="page">
            <?php echo ($page); ?>
        </div>

    </div>  
       
	</div> 

    </div>


</body>
<script>

    function opp(id) {
        $.post("<?php echo U('Admin/Admin/opp');?>", {'id':id}, function (res) {
            if (res.status == 'ok') {
                layer.alert(res.msg, {
                    yes: function () {
                        location.href = "<?php echo U('Admin/Admin/adminlist');?>";
                    }
                });
            } else {
                layer.alert(res.msg);
            }
        })
    }
</script>
</html>