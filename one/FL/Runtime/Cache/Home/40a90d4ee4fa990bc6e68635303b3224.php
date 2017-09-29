<?php if (!defined('THINK_PATH')) exit();?><h3 class="tbar-panel-header J-panel-header">
    <a href="" class="title"><i></i><em class="title">购物车</em></a>
    <span class="close-panel J-close"></span>
</h3>



<?php if(is_array($cart)): $i = 0; $__LIST__ = array_slice($cart,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tbar-cart-item" >
        <div class="jtc-item-goods">
            <span class="p-img"><a href="#" target="_blank"><img src="/Uploads/Prod/<?php echo ($vo[0]["prod_pic"]); ?>" alt="" height="50" width="50" /></a></span>
            <div class="p-name">
                <a href="#"><?php echo ($vo[0]["prod_name"]); ?></a>
            </div>
            <div class="p-price"><strong>¥<?php echo ($vo[0]["prod_price"]); ?></strong>×<?php echo ($vo[0]["num"]); ?><p  class="mid-je f-r">¥ <span class="prices"><?php echo ($vo[0][prod_price]*$vo[0][num]); ?></span></p></div>

            <a href="<?php echo u('');?>" class="p-del J-del">删除</a>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>



<div class="tbar-panel-footer J-panel-footer">
    <div class="tbar-checkout">
        <div class="jtc-number">商品种类数量： <strong class="J-count">&nbsp;<?php echo ($count); ?></strong> </div>
        <div class="jtc-number"> 商品总价：<strong class="J-count">&nbsp;￥<?php echo ($totalPrice); ?></strong><span id="pric"></span></div>
        <a class="jtc-btn J-btn" href='<?php echo u("User/cart",array("url"=>"goback"));?>' target="_blank">去购物车结算</a>
    </div>
</div>