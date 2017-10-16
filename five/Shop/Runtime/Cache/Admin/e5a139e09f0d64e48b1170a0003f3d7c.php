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
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <style type="text/css">
        .page{  float: right;  }
        .page a,.page span{  display: inline-block;  background: #0093DD;  margin-left: 5px;  width: 24px;  height: 24px;  text-align: center;  line-height: 24px;  font-weight: bolder;  }
        .page span{background: #ececec;}
        .page a:hover{  background: #ececec;  }
    </style>
    <script type="text/javascript">
        function disabled(bid){
            layer.confirm("确定要更改吗？",{
                icon:3,
                title:'提示'
            },function(){
                $.get("<?php echo U('Category/disabled');?>","id="+bid,function(res){
                    if(res.status=="ok"){
                        layer.msg(res.msg,{icon:1,time:1000},function(){
                            window.location.href="<?php echo U('Category/showlist');?>";   //如果成功刷新页面;
                        });
                    }else{
                        layer.msg(res.msg,{icon:2,time:1000});
                    }
                },'json')
            })
        }
        function enabled(bid){
            layer.confirm("确定要更改吗？",{
                icon:3,
                title:'提示'
            },function(){
                $.get("<?php echo U('Category/enabled');?>","id="+bid,function(res){
                    if(res.status=="ok"){
                        layer.msg(res.msg,{icon:1,time:1000},function(){
                            window.location.href="<?php echo U('Category/showlist');?>";
                        });
                    }else{
                        layer.msg(res.msg,{icon:2,time:1000});
                    }

                },'json')
            })
        }
    function del(bid){
        layer.confirm("确定要删除吗?",{
            icon:2,
            title:'提示'
        },function(){
            $.get("<?php echo U('Category/del');?>","id="+bid,function(res){
                if(res.status=='ok'){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Category/showlist');?>";
                    })
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }
            },'json')
        })
    }
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
        <li><a href="#">分类设置</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="<?php echo U('Admin/Category/keys');?>" method="get">
                <ul class="seachform">
                    <li><label>综合查询</label><input name="keywords" value="<?php echo ($keywords); ?>" type="text" class="scinput" /></li>
                    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <!--<th><input name="" type="checkbox" value="" checked="checked"/></th>-->
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>分类名称</th>
                    <th>分类id</th>
                    <th>分类父id</th>
                    <th>上级分类</th>
                    <th>是否展示</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr>
                        <!--<td><input name="" type="checkbox" value="" /></td>-->
                        <td><?php echo ($k+$firstRow); ?></td>
                        <td><a href="<?php echo U('Admin/Category/showlist',array('pid'=>$value['id']));?>"><?php echo ($value["catename"]); ?></a></td>
                        <td><?php echo ($value["id"]); ?></td>
                        <td><?php echo ($value["pid"]); ?></td>
                        <td><?php echo ($value["pathname"]); ?></td>
                        <td><?php echo ($value['active']==1?'已展示':'已禁用'); ?></td>
                        <td><a href="<?php echo U('Admin/Category/edit',array('id'=>$value['id']));?>" class="tablelink">编辑</a>
                            <?php if($value['active'] == 0): ?><a href="javascript:enabled(<?php echo ($value['id']); ?>)" class="tablelink">展示</a>
                                <?php elseif($value['active'] == 1): ?>
                                <a href="javascript:disabled(<?php echo ($value['id']); ?>)" class="tablelink">禁用</a><?php endif; ?>
                            <a href="javascript:del(<?php echo ($value['id']); ?>)" class="tablelink"> 删除</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                </tbody>
            </table>
            <div class="pagin">
                <div class="message" style="display: block;width: 300px;height: 30px;float: left;font-size: 14px;font-weight: bolder">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue">
                    <?php if($p == 0 ): ?>1
                        <?php else: ?>
                        <?php echo ($p); endif; ?>
                </i>页</div>
                <div class="page" style="display: block;float: right;">
                    <?php echo ($page); ?>
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
</div>
</body>
</html>