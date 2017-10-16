<?php if (!defined('THINK_PATH')) exit();?><section class="order">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><dl>
            <dt>
                <time>订单编号:<?php echo ($value["order_syn"]); ?></time><br/>
                <time>下单时间:<?php echo date("Y-m-d",$value["addtime"]);?></time>
                <span><?php echo ($value['status']["status_name"]); ?></span>
            </dt>
            <?php if(is_array($value['goods'])): $i = 0; $__LIST__ = $value['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><ul>
                    <a href="detail.html">
                        <figure><img src="/Public/Admin/Uploads/goods/<?php echo ($val['pic']); ?>"/></figure>
                        <li>
                            <p><?php echo ($val['goodsname']); ?></p>
                            <!--<small>颜色：经典绮丽款</small>
                            <span>尺寸：XL</span>-->
                            <b>￥<?php echo ($val['price']); ?></b>
                            <strong>×<?php echo ($val['buynum']); ?></strong>
                        </li>
                    </a>
                </ul><?php endforeach; endif; else: echo "" ;endif; ?>
            <dd>
                <h3>商品总额</h3>
                <i>￥<?php echo ($value["order_price"]); ?></i>
            </dd>
            <dd>
                <?php if($value['status']['id'] == 1): ?><input onclick="topay(<?php echo ($value['id']); ?>)" id="pay" type="button" value="<?php echo ($value['status']['member_opt']); ?>" class="order-que"/>
                    <?php elseif($value['status']['id'] == 2): ?>
                    <input type="button" value="<?php echo ($value['status']['member_opt']); ?>" class="order-que"/>
                    <?php elseif($value['status']['id'] == 3): ?>
                    <input onclick="confirm(<?php echo ($value['id']); ?>)" id="confirm" type="button" value="<?php echo ($value['status']['member_opt']); ?>" class="order-que"/>
                    <?php elseif($value['status']['id'] == 4): ?>
                    <input onclick="comment(<?php echo ($value['id']); ?>)" id="comment" type="button" value="<?php echo ($value['status']['member_opt']); ?>" class="order-que"/>
                    <?php elseif($value['status']['id'] == 5): ?>
                    <input type="button" value="<?php echo ($value['status']['member_opt']); ?>" class="order-que"/><?php endif; ?>
                <!--<input type="button" value="查看物流" onclick="javascript:location.href='wuliu.html'" />-->
                <input type="button" value="删除订单" />
            </dd>
        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
</section>
<div id="orderPage"><?php echo ($page); ?></div>
<input name="where" value="<?php echo ($where); ?>" id="where">