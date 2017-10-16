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
   <style>
       body .demo-class .layui-layer-title{background:#3fafe1; color: #333 border: none;}
       body .demo-class .layui-layer-btn{border-top:1px solid #E9E7E7}
       body .demo-class .layui-layer-btn a{background:#333;}
       body .demo-class .layui-layer-btn .layui-layer-btn1{background:#999;}
       body .demo-class {width: 500px;height: 300px;}
       .page{  float: right;  }
       .page a,.page span{  display: inline-block;  background: yellowgreen;  margin-left: 5px;  width: 24px;  height: 24px;  text-align: center;  line-height: 24px;  font-weight: bolder;  }
       .page span{background: #ececec;}
       .page a:hover{  background: #ececec;  }
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
        <li><a href="#">评论页面</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="<?php echo U('GoodsComment/comment');?>" method="get">
                <ul class="seachform">
                    <li><label>综合查询</label><input name="keywords" value="<?php echo ($keywords); ?>" type="text" class="scinput" /></li>
                    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>用户名</th>
                    <th>商品名</th>
                    <th>是否回复</th>
                    <th>评论时间</th>
                    <th>是否展示</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr>
                    <td><input name="" type="checkbox" value="" /></td>
                    <td><?php echo ($k+$firstRow); ?></td>
                    <td><?php echo ($value['username']); ?></td>
                    <td><?php echo ($value['goodsname']); ?></td>
                    <?php if( $value['isreply'] == 0): ?><td>未回复</td>
                        <?php else: ?>
                        <td>已回复</td><?php endif; ?>
                    <td><?php echo date('Y-m-d H:i:s',$value['addtime']);?></td>
                    <?php if($value['isshow'] == 1): ?><td>展示</td>
                        <?php else: ?>
                        <td>隐藏</td><?php endif; ?>
                    <td><a href="<?php echo U('GoodsComment/detail',array('id'=>$value['id']));?>" class="tablelink">查看详情</a>
                        <?php if($value['isreply'] == 0): ?><a href="javascript:reply(<?php echo ($value['id']); ?>)" class="tablelink">回复</a><?php endif; ?>
                        <a href="javascript:del(<?php echo ($value['id']); ?>)" class="tablelink"> 删除</a>
                        <?php if($value['isshow'] == 1): ?><a href="javascript:disabled(<?php echo ($value['id']); ?>)" class="tablelink">隐藏</a>
                            <?php else: ?>
                            <a href="javascript:enabled(<?php echo ($value['id']); ?>)" class="tablelink">显示</a><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
<script>
    //回复
    function reply(cid){
        layer.open({
            type:2,
            title:'回复',
            skin:'demo-class',
            content:"<?php echo U('answer');?>?id="+cid
        })
    }
    //删除
    function del(cid){
            layer.confirm('确定删除?',{icon:2,title:'提示'},function(){
                $.get("<?php echo U('GoodsComment/del');?>","id="+cid,function(res){
                    if(res.status=='ok'){
                        layer.msg(res.msg,{icon:1,time:1000},function(){
                            window.location.href="<?php echo U('GoodsComment/comment');?>";
                        })
                    }else{
                        layer.msg(res.msg,{icon:2,time:1000});
                    }
                })
            })
    }
    //显示

    function enabled(cid){
        $.get("<?php echo U('GoodsComment/enabled');?>","id="+cid,function(res){
            if(res.status=='ok'){
                layer.msg(res.msg,{icon:1,time:1000},function(){
                    window.location.href="<?php echo U('GoodsComment/comment');?>";
                })
            }else
            {
                layer.msg(res.msg,{icon:2,time:1000});
            }
        },'json')
    }
    function disabled(cid){
        $.get('<?php echo U("GoodsComment/disabled");?>',"id="+cid,function(res){
            if(res.status=='ok'){
                layer.msg(res.msg,{icon:1,time:1000},function(){
                    window.location.href="<?php echo U('GoodsComment/comment');?>";
                })
            }else
            {
                layer.msg(res.msg,{icon:2,time:1000});
            }
        },'json')
    }


</script>
</html>