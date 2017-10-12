<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <!--允许全屏-->
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="yes" name="apple-touch-fullscreen"/>
    <meta content="telephone=no,email=no" name="format-detection"/>
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width"/>
    <title>demo</title>
    <link href="/Public/Mobile/commentcss/EvaluationOrder.debug.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Mobile/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <style>
.commentlist{width: 100%;height: 100%;margin: 0;padding: 0;}
        .commentlist ul{width: 100%;margin: 0;padding: 0;}
        .commentlist ul li{width: 20%;float: left;list-style: none;text-align: center;font-size: 16px;}
    </style>
</head>
<body>

<script type="text/javascript">
    var uploadUrl = '<?php echo U("uploadGoodsPic");?>';
    var listUrl = '<?php echo U("index");?>';
</script>

<div class="order-list">
    <div class="com-title" >
        <div style="width: 100%;height: 30px;line-height: 30px;text-align: center;background-color: orangered;font-size: 20px;font-weight: bold;">
            <a title="返回" href="javascript:history.back(-1);" style="color: white;text-align: center;">
                <span style="height: 30px;display:inline-block;float: left;color: white;font-weight: bold;">&lt;</span>
                &nbsp;&nbsp;<span style="display: inline-block;">用户评论列表</span>
            </a>
        </div>
    </div>
    <div class="commentlist">
        <ul>
            <li  style="width: 25%;">图片名称</li>
            <li  style="width: 30%;">评价内容</li>
            <li  style="width: 10%;">类别</li>
            <li  style="width: 25%;">回复内容</li>
            <li  style="width: 10%;">操作</li>
        </ul>
        <?php if(is_array($commentlist)): $i = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><ul style="margin: 5px 0;width: 100%;height:120px;text-align: center;">
            <li style="width: 25%;height: 120px;"><img src="/Uploads/<?php echo ($list["imageurl"]); ?>100_<?php echo ($list["imagename"]); ?>" alt="" style="margin: 0;padding: 0;"/><br/><span style="margin: 0;padding: 0;"><?php echo ($list["ml"]); ?>ml</span></li>
            <li style="width: 30%;height: 120px;line-height: 120px;"><textarea name="" rows="3" style="margin: 0;padding:0;width: 100%;height: 115px;border: none;background-color: aliceblue" readonly><?php echo ($list["content"]); ?></textarea></li>
            <li style="width: 10%;height: 120px;line-height: 120px;"><?php echo ($list["costatus"]); ?></li>
            <?php if($list["respid"] == 2): ?><li style="width: 25%;height: 120px;line-height: 120px;"><textarea name=""  rows="3" style="margin: 0;padding:0;width: 100%;height: 115px;border: none;background-color: aliceblue" readonly><?php echo ($list["response"]); ?></textarea></li>
            <?php else: ?>
                <li style="width: 25%;height: 120px;line-height: 120px;"><textarea name=""  rows="3" style="margin: 0;padding:0;width: 100%;height: 115px;border: none;background-color: aliceblue;" readonly>卖家还未做出回复</textarea></li><?php endif; ?>
            <li style="width: 10%;height: 120px;line-height: 120px;cursor: pointer;" gid="<?php echo ($list["gid"]); ?>" oid="<?php echo ($list["oid"]); ?>" class="deletecomment">删除</li>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
        <div>
            <?php echo ($page); ?>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    function commentlist(id){
        var id=id?id:1;
        $.get("<?php echo U('Mobile/Comment/showusercomment');?>",{"p":id},function(res){
            $('.commentlist').html(res);
        })
    }
</script>
<!--评论删除的异步-->
<script type="text/javascript">
    $(function(){
        $(".deletecomment").click(function(){
            var gid=$(this).attr('gid');
            var oid=$(this).attr('oid');
            a=$(this);
            $.get("<?php echo U('Mobile/Comment/deletecomment');?>",{gid:gid,oid:oid},function(res){
                    if(res.status){
                        layer.open({
                        content: '删除成功'
                        ,skin: 'msg'
                        ,time: 2//2秒后自动关闭
                        ,style:'line-heght:100px;'
                        ,end:function(){
                                a.parents('ul').hide();
                        }
                    });
                }else{
                        layer.open({
                            content: '请稍后再试'
                            ,skin: 'msg'
                            ,time: 2//2秒后自动关闭
                            ,style:'line-heght:100px;'
                        });
                    }
            },'json')
        })
    })
</script>