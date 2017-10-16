<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <style type="text/css">
        div.pagin{background-color: red;}
        div.pagin div{float: right}
        div.pagin span{text-align:center;line-height: 30px; display: inline-block;width: 30px;height: 30px; background-color:orange;}
        div.pagin a{text-align:center;line-height: 30px;display: inline-block;width: 30px;height: 30px; background-color:gray;}
    </style>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
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
            <form action="<?php echo U('Auction/showlist');?>" method="get" id="form1">
            <ul class="seachform">
                <li><label>综合查询</label><input name="keywords" value="<?php echo ($keywords?$keywords:''); ?>" type="text" class="scinput" /></li>
                <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
            </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>图片</th>
                    <th>商品名称</th>
                    <th>起拍价格</th>
                    <th>底价</th>
                    <th>最高价格</th>
                    <th>是否展示</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                    <th>拍卖状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($auctionInfo)): $k = 0; $__LIST__ = $auctionInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val1): $mod = ($k % 2 );++$k;?><tr>
                    <td><input name="" type="checkbox" value="" /></td>
                    <td><?php echo ($k+$firstRow); ?></td>
                    <td><img width="50" height="50" src="/Public/Admin/Uploads/goods/<?php echo ($val1["pic"]); ?>" alt=""/></td>
                    <td><?php echo ($val1["goodsname"]); ?></td>
                    <td><?php echo ($val1["startprice"]); ?></td>
                    <td><?php echo ($val1["commonprice"]); ?></td>
                    <td><?php echo ($val1["maxprice"]); ?></td>
                    <?php if($val1['isshow'] == 1): ?><td>正在展示</td>
                        <?php else: ?>
                        <td>已经隐藏</td><?php endif; ?>
                    <td><?php echo date("Y-m-d H:i:s",$val1["starttime"]);?></td>
                    <td><?php echo date("Y-m-d H:i:s",$val1["endtime"]);?></td>
                    <?php if($val1['status'] == 1): ?><td>正在拍卖</td>
                        <?php else: ?>
                        <td>交易完成</td><?php endif; ?>
                    <td>
                        <a href="<?php echo U('Auction/settime',array('ag_id'=>$val1['ag_id']));?>" class="tablelink">设置时间</a>
                        <?php if($val1['isshow'] == 1): ?><a href="javascript:disabled(<?php echo ($val1['ag_id']); ?>)" class="tablelink">隐藏</a>
                            <?php else: ?>
                            <a href="javascript:enabled(<?php echo ($val1['ag_id']); ?>)" class="tablelink">展示</a><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <div class="pagin">
                <div><?php echo ($page); ?></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>

    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
    <script>
        //隐藏
        function disabled(id){
            $.get("<?php echo U('Auction/disabled');?>",{ag_id:id},function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:2000},function(){
                        window.location.href="<?php echo U('Auction/showlist');?>";
                    })
                }else{
                    layer.msg(res.msg,{icon:2,time:2000})
                }
            })
        }
        //展示
        function enabled(id){
            $.get("<?php echo U('Auction/enabled');?>",{ag_id:id},function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:2000},function(){
                        window.location.href="<?php echo U('Auction/showlist');?>";
                    })
                }else{
                    layer.msg(res.msg,{icon:2,time:2000})
                }
            })
        }
    </script>
</div>
</body>
</html>