<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Jquery/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
    <script type="text/javascript">
        KE.show({id : 'content7', cssPath : './index.css'});
    </script>
    <script type="text/javascript">
    $(document).ready(function(e) {$(".select1").uedSelect({width : 345});
        $(".select2").uedSelect({width : 167});
        $(".select3").uedSelect({width : 100});});
    </script>
        <style type="text/css">
            .page a{display: inline-block;width:18px;height:18px;padding:5px;margin:2px;
                border:1px solid #238ac5;text-align: center;}
            .page span.current{display: inline-block;width:18px;height:18px;padding:5px;margin:2px;
                border:1px solid #238ac5;text-align: center;background:#3d96c9;}
            .page a:hover{background:#999999;color:#1a1a1a;}
        </style>
    </head>
    <body>
        <div class="place">
            <span>位置：</span>
            <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">商品管理</a></li>
            <li><a href="#">搜索列表</a></li>
            </ul>
        </div>
        <div class="formbody">
            <div id="usual1" class="usual">
                <div id="tab2" class="tabson">
                    <form action="<?php echo U('Admin/Goods/search');?>" method="get">
                        <ul class="seachform">
                            <li><label>综合查询</label><input name="keywords" type="text" class="scinput"/></li>
                            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                            <ul class="toolbar1">
                                <li class="click"><a href="<?php echo u('Goods/addGoods');?>"><span><img src="/Public/Admin/images/t01.png"/></span>添加</a></li>
                            </ul>
                        </ul>
                    </form>
                    <table class="tablelist">
                        <thead>
                        <tr>
                            <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                            <th>商品图片</th>
                            <th>商品名称</th>
                            <th>颜色</th>
                            <th>市场价格</th>
                            <th>商城价格</th>
                            <th>商品数量</th>
                            <th>上架状态</th>
                            <th>发布时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($goodslist)): $k = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr>
                                <td><?php echo ($k+$firstRow); ?></td>
                                <td><img src="/Public/Upload/Goodspic/thumb_80_<?php echo ($value["pic"]); ?>" alt=""/></td>
                                <td><?php echo ($value["goodsname"]); ?></td>
                                <td><?php echo ($value["color"]); ?></td>
                                <td><?php echo ($value["marketprice"]); ?></td>
                                <td><?php echo ($value["price"]); ?></td>
                                <td><?php echo ($value["num"]); ?></td>
                                <td><?php echo ($value['issale']?'已上架':'已下架'); ?></td>
                                <td><?php echo (date("Y-m-d  H:i",$value["createtime"])); ?></td>
                                <td>
                                    <a href="javascript:edit(<?php echo ($value["gid"]); ?>);" class="tablelink">编辑</a>
                                    <a href="javascript:del(<?php echo ($value["gid"]); ?>);" class="tablelink">删除</a>
                                    <a href="javascript:issale(<?php echo ($value["issale"]); ?>,<?php echo ($value["gid"]); ?>);" class="tablelink"><?php echo ($value['issale']?'下架':'上架'); ?></a>
                                </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="pagin">
                        <div class="message">共查询到<i class="blue"><?php echo ($k); ?></i>条记录</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
        $('.tablelist tbody tr:odd').addClass('odd');
        /*商品编辑操作*/
        function edit(gid){
            layer.confirm('你确定要编辑么？', {
                btn: ['确定','取消']
            }, function(){
                location.href="/admin.php/Admin/Goods/editGoods/gid/"+gid
            }, function(){
                layer.msg('已取消', {icon:1});
            });
        };

        /*商品信息删除操作*/
        function del(id){
            layer.confirm('你确定要删除么？', {
                btn: ['确定','取消']
            }, function(){
                $.get("<?php echo U('Admin/Goods/delGoods');?>",{gid:id});
                layer.msg('删除成功', {icon: 1,time:2000},function(){
                    location.reload();
                });
            }, function(){
                layer.msg('已取消', {icon:1});
            });
        };

        /*商品上下架操作*/
        function issale(issale,gid){
            if(issale==1) {
                layer.confirm('你确定要下架该商品么？', {
                    btn: ['下架', '取消']
                }, function () {
                    $.get("<?php echo U('Admin/Goods/issale');?>", {issale: issale, gid: gid});
                    layer.msg('下架成功', {icon: 1,time:2000},function(){
                        location.reload();
                    });
                }, function () {
                    layer.msg('已取消', {icon: 1});
                });
            }else{
                layer.confirm('你确定要上架该商品么？', {
                    btn: ['上架', '取消']
                }, function () {
                    $.get("<?php echo U('Admin/Goods/issale');?>", {issale: issale, gid: gid});
                    layer.msg('上架成功', {icon: 1,time:2000},function(){
                        location.reload();
                    });
                }, function () {
                    layer.msg('已取消', {icon: 1});
                });
            }
        };
    </script>
</html>