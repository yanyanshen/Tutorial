<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div>
    <div>
        <div><img src="" alt=""/></div>
        <div>
            <span>￥价格</span><br/>
            <span>库存1000件</span><br/>
            <span>请选择商品类别</span>
        </div>
    </div>
    <div>
        <div>型号：</div>
        <div>
            <div class="spec_select">
                <ul>
                    <li class="liguige">
                        <span>商品规格:</span>
                        <?php if(is_array($typelist)): $i = 0; $__LIST__ = $typelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><em style="width: 50px;margin: 0 10px;text-align: center;cursor: pointer;"><?php echo ($type); ?>ml</em><?php endforeach; endif; else: echo "" ;endif; ?>
                        <input type="hidden" name="xinghao"/>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div>
        <div class="num">
            <span>购买数量</span>
            <span id="a" class="Spinner"></span>
           <!-- <span>库存：<?php echo ($goods["num"]); ?>件</span>-->
        </div>
    </div>
    <div>
        <a href="">加入购物车</a>
        <a href="">立即购买</a>
    </div>
</div>
</body>
</html>