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
    <script type="text/javascript" src="/Public/Admin/js/jqurey.form.js"></script>
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
        function getAll()
        {
            var tit = document.getElementById("operAll");
            var inputs = document.getElementsByTagName("input");
            for(var i = 0; i < inputs.length; i++)
            {
                if(inputs[i].type == "checkbox")
                {
                    if(tit.checked == true)
                    {
                        inputs[i].checked = true;
                    }else{
                        inputs[i].checked = false;
                    }
                }
            }
        }
    </script>
    <script type="text/javascript">
        function del(bid){
            layer.confirm("你确定要删除吗？",{
                icon:3,
                title:'提示',
                btn:['确定','取消']
            },function(){
                $.get("<?php echo U('Brand/del');?>","id="+bid,function(res){
                    if(res.status=="ok"){
                        layer.msg(res.msg,{icon:1,time:1000},function(){
                            window.location.href="<?php echo U('Brand/showlist');?>";
                        });
                    }else{
                        layer.msg(res.msg,{icon:2,time:1000});
                    }

                },'json')
            })
        }
    </script>
    <style type="text/css">
        .search_style{left:10px;height: 30px;margin-bottom: 10px;  border:1px solid #ddd; padding:30px 20px; position:relative; margin-top:20px; }
        .search_style .title_names{ position:absolute; top:-20px; font-size:18px; background-color:#ffffff; padding:5px 20px; left:10px;}
        #page a,#page span{
            display: inline-block;width: 18px;height: 18px;padding: 5px;margin: 2px;text-decoration: none;background: #f0ead8;
            color: #009900;border: 1px solid #c9e2b3;
        }
        #page a:hover{
            background: #333;
            color: #fff;

        }
        #page span {
            background: #333;
            color: #fff;
            font-weight: bold;
        }
        .td-manage a{
            cursor: pointer;
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
            <ul class="seachform">

            <div class="search_style">
                <div class="title_names">搜索查询</div>
                <ul class="search_content">
                    <form action="<?php echo U('Admin/Brand/showlist');?>" method="post">
                        <li><label>品牌名称</label><input value="<?php echo ($scwords?$scwords:''); ?>" name="bname" type="text" class="scinput" placeholder="输入品牌名称"  /></li>
                        <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                    </form>
                </ul>
            </div>

            <div class="table_menu_list">
                <table class="tablelist" id="sample-table">
                    <thead>
                    <tr>
                        </th>
                        <th width="50px">排序</th>
                        <th width="80px">ID</th>
                        <th width="120px">品牌LOGO</th>
                        <th width="120px">品牌名称</th>
                        <th width="350px">描述</th>
                        <th width="180px">加入时间</th>
                        <th width="70px">状态</th>
                        <th width="200px">操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                            <td width="80px"><?php echo ($k+$firstRow); ?></td>
                            <td width="50px" id="myID"><?php echo ($val["id"]); ?></td>
                            <td>
                                <?php if($val["logo"] == 0): ?><img src="/Public/Admin/Uploads/brand/default.png"  width="130"/>
                                    <?php else: ?><img src="/Public/Admin/Uploads/brand/<?php echo ($val["logo"]); ?>"  width="130"/><?php endif; ?>
                            </td>
                            <td><?php echo ($val["bname"]); ?></td>
                            <td><?php echo (mb_substr($val["description"],0,40,'utf-8')); ?>...</td>
                            <td><?php echo (date("Y-m-d",$val["addtime"])); ?></td>
                            <td ><?php echo ($val['active']?'已启用':'已禁用'); ?></td>
                            <div id="myAct" style="display:none"><?php echo ($val['active']); ?></div>
                            <td class="td-manage">
                                <!--<a href="<?php echo U('Admin/Brand/showlist',array('id'=>$val['id'],'active'=>$val['active']));?>"><?php echo ($val['active']?'禁用':'启用'); ?> </a>-->
                                <!--<a href="javascript:isShow(<?php echo ($val['id']); ?>)"><?php echo ($val['active']?'禁用':'启用'); ?> </a>-->
                                <?php if($val['active'] == 0): ?><a href="javascript:enabled(<?php echo ($val['id']); ?>)">启用</a>
                                    <?php else: ?>
                                    <a href="javascript:disabled(<?php echo ($val['id']); ?>)">禁用</a><?php endif; ?>
                                <!--<?php echo U('Admin/Brand/showlist',array('id'=>$val['id'],'active'=>$val['active']));?>-->
                               <!-- <a id="opt"><?php echo ($val['active']?'禁用':'启用'); ?> </a>-->
                            <a href="<?php echo U('Admin/Brand/edictlist',array('id'=>$val['id']));?>">编辑</a>
                            <a id="opt" href="javascript:del(<?php echo ($val['id']); ?>)">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
                </table>
                <div id="page" style="margin-top: 20px;float: right;"><?php echo ($page); ?></div>
            </div>
                <!--<div id="page" style="margin-top: 20px;"><?php echo ($page); ?></div>-->
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
<script type="text/javascript">
    //禁用品牌
    function disabled(bid){
            layer.confirm("你确定要启用我吗？",{
                icon:3,
                title:'提示',
                btn:['确定','取消']
            },function(){
                $.get("<?php echo U('Brand/disabled');?>","id="+bid,function(res){
                    if(res.status=="ok"){
                        layer.msg(res.msg,{icon:1,time:1000},function(){
                            window.location.href="<?php echo U('Brand/showlist');?>";
                        });
                    }else{
                        layer.msg(res.msg,{icon:2,time:1000});
                    }

                },'json')
            })
    }
    //启用品牌
    function enabled(bid){
        layer.confirm("你确定要启用我吗？",{
            icon:3,
            title:'提示',
            btn:['确定','取消']
        },function(){
            $.get("<?php echo U('Brand/enabled');?>","id="+bid,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Brand/showlist');?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }

            },'json')
        })
    }
</script>
</body>
</html>