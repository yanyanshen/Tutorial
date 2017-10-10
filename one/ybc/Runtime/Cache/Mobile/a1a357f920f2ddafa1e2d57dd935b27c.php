<?php if (!defined('THINK_PATH')) exit(); if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><!-- 评价 开始 -->
    <div class="evaluate">
        <div class="evaluate-top">
            <?php switch($v["orderstatus"]): case "1": ?><p><a href="#"><?php echo ($v["mnext"]); ?></a></p><?php break;?>
                <?php case "2": ?><p><a href="#"><?php echo ($v["mnext"]); ?></a></p><?php break;?>
                <?php case "3": ?><p><a href="javascript:qrsh(<?php echo ($v["id"]); ?>);"><?php echo ($v["mnext"]); ?></a></p><?php break;?>
                <?php case "4": ?><p><a href="#"><?php echo ($v["mnext"]); ?></a></p><?php break;?>
                <?php default: ?>
                <p><a href="#"><?php echo ($v["mnext"]); ?></a></p><?php endswitch;?>
            <p style="padding-left: 0.28rem;color: #000" onclick="goDetail(<?php echo ($v["id"]); ?>)"><?php echo ($v["ordersyn"]); ?></p>
        </div>
        <?php if(is_array($v["goods"])): $i = 0; $__LIST__ = $v["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><div class="evaluate-bottom clearfix">
                <p class="fl"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($va["gid"]); ?>"><img src="/Uploads/goodsPic/100/100_<?php echo ($va["pic"]); ?>" alt=""></a></p>
                <div class="evaluate-bottom-right fl" style="width: 60%;">
                    <p><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($va["gid"]); ?>"><?php echo ($va["goodsname"]); ?></a></p>
                    <p class="money">￥<?php echo ($va["price"]); ?><span><?php echo ($va["buynum"]); ?>件</span></p>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(empty($orderList)): ?><div style='text-align: center;height: 30px;line-height: 30px;margin-top: -25px;'>已加载完所有信息</div>
    <?php else: ?>
    <div id="getMore" style="text-align: center;height: 30px;line-height: 30px;margin-top: -25px;">点击加载更多</div>
<script type="text/javascript">
    $(function(){
        $("#getMore").click(function() {
                    $.post("<?php echo U('Order/getMore');?>", {
                        status: "<?php echo ($status?$status:''); ?>",
                        start: "<?php echo ($start); ?>"
                    }, function (res) {
                        $("#getMore").replaceWith(res);
                    })
                }
        )
    })
</script><?php endif; ?>