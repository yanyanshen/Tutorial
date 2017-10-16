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
    <style type="text/css">
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
        <li><a href="#">系统设置</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="<?php echo U('Admin/Goods/recycle');?>" method="get">
                <ul class="seachform">
                    <li><label>综合查询</label><input name="keywords" value="<?php echo ($keywords); ?>" type="text" class="scinput" /></li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>商品图片</th>
                    <th>商品名称</th>
                    <th>商品分类</th>
                    <th>商品品牌</th>
                    <th>市场价格</th>
                    <th>商城价格</th>
                    <th>库存量</th>
                    <th>销售数量</th>
                    <th>发布时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                        <td><input name="" type="checkbox" value="" /></td>
                        <td><?php echo ($k+$firstRow); ?></td>
                        <td><img src="/Public/Admin/Uploads/goods/<?php echo ($val['pic']); ?>" style="width:50px;height: 50px;"> </td>
                        <td><?php echo ($val["goodsname"]); ?></td>
                        <td><?php echo ($val["catename"]); ?></td>
                        <td><?php echo ($val["bname"]); ?></td>
                        <td><?php echo ($val["marketprice"]); ?></td>
                        <td><?php echo ($val["price"]); ?></td>
                        <td><?php echo ($val["num"]); ?></td>
                        <td><?php echo ($val["salenum"]); ?></td>
                        <td><?php echo date('Y-m-d H:i:s',$val['addtime']);?></td>
                        <td><a href="javascript:regain(<?php echo ($val['id']); ?>)" class="tablelink">恢复</a>
                            <a href="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink">删除</a>
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
<script>
    function regain(gid){
        layer.confirm("是否要恢复数据",{icon:3,title:'恢复'},function(){
            $.get("<?php echo U('Goods/regain');?>",'id='+gid,function(res){
                if(res.status=='ok'){
                    layer.msg(res.msg,{icon:6,time:1000},function(){
                        window.location.href="<?php echo U('Goods/recycle');?>";
                    })
                }else{
                    layer.msg(res.msg,{icon:5,time:1000});
                }
            },'json')
        })
    }
    function del(gid){
        layer.confirm('确定彻底删除',{icon:6,title:'删除'},function(){
            $.get("<?php echo U('Goods/del');?>","id="+gid,function(res){
                if(res.status=='ok'){
                    layer.msg(res.msg,{icon:1,time:1000},function(){})
                    window.location.href="<?php echo U('Goods/recycle');?>";
                }else{
                    layer.msg(res.msg,{icon:2,time:1000})
                }
            },'json')
        })
    }
</script>
</html>