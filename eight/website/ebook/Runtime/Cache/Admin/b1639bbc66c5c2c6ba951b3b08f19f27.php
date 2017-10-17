<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>

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
                            <th>序号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                            <th>名称</th>
                            <th>上次登录时间</th>
                            <th>上次登录IP</th>
                            <th>所属管理员组</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center">
                                <td><?php echo ($vo['id']); ?></td>
                                <td><?php echo ($vo['username']); ?></td>
                                <td><?php echo date('Y-m-d H:i:s',$vo['logintime']);?></td>
                                <td><?php echo ($vo['loginip']); ?></td>
                                <td><?php if($vo["username"] == C("RBAC_SUPERADMIN")): ?>超级管理员<?php else: echo ($vo['Role'][0]['name']); endif; ?></td>
                                <td><a href="<?php echo U('rbac/deleteuser',array('id'=>$vo['id']));?>" onclick="return confirm('您是否真的删除这个用户呢？')" title="删除">【删除】</a></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>

               <div class="pagin">
                    <div class="message">共<i class="blue">1256</i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>
                    <ul class="paginList">
                    <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
                    <li class="paginItem"><a href="javascript:;">1</a></li>
                    <li class="paginItem current"><a href="javascript:;">2</a></li>
                    <li class="paginItem"><a href="javascript:;">3</a></li>
                    <li class="paginItem"><a href="javascript:;">4</a></li>
                    <li class="paginItem"><a href="javascript:;">5</a></li>
                    <li class="paginItem more"><a href="javascript:;">...</a></li>
                    <li class="paginItem"><a href="javascript:;">10</a></li>
                    <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>
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