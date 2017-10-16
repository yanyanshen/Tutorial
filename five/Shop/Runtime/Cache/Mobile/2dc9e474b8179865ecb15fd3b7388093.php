<?php if (!defined('THINK_PATH')) exit();?><div style="margin-top: 3%;"></div>
<section class="list">
    <ul class="wall">

        <?php if(is_array($foot)): $i = 0; $__LIST__ = $foot;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="wall-column">
            <div class="pic">
                <a href="<?php echo U('Detail/detail',array('gid'=>$value['gid']));?>">
                    <img src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($value['pic']); ?>"/>
                    <p><?php echo ($value["goodsname"]); ?></p>
                    <b>￥<?php echo ($value["price"]); ?></b><del>￥<?php echo ($value["marketprice"]); ?></del>
                    <div class="collectbar">
                        <label for="collect<?php echo ($value['id']); ?>"  onselectstart="return false" class="label<?php echo ($value['id']); ?>"></label>
                        <input type="checkbox" value="<?php echo ($value['id']); ?>" onclick="mycheck(<?php echo ($value['id']); ?>)" id="collect<?php echo ($value['id']); ?>"/>
                    </div>
                </a>
            </div>
            </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
    </ul>
</section>
<div class="kong" style="margin-bottom: 16%;"></div>
<div id="orderPage"><?php echo ($page); ?></div>