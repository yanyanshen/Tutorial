<?php if (!defined('THINK_PATH')) exit();?><div>
    <ul>
        <?php if(is_array($slist)): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                <dl>

                    <dt><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><img src="/three17/pinmo/Uploads/<?php echo ($value["goodspic"]); ?>" /></a></dt>

                    <dd class="title"><a href=""><?php echo mb_substr($value['goodsname'],0,12,"utf-8");?></a></dd>
                    <dd class="content">
                        <span class="goods_jiage">￥<strong><?php echo ($value["price"]); ?></strong></span>
                        <span class="goods_chengjiao">最近成交<?php echo ($value["salenum"]); ?>笔</span>
                    </dd>
                </dl>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>

    </ul>

</div>
<div class="pagination" id="page" style="clear: both">
    <p><?php echo ($page); ?></p>

</div>