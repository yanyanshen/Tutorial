<?php if (!defined('THINK_PATH')) exit();?>
<script type="text/javascript">
    $(function(){
        $('.prev1').click(function(){

            location=$('#mypage .current').prev('#big').attr("href");
        })
        $('.next1').click(function(){
            location=$('#mypage .current').next('#big').attr("href");
        })

    })
</script>


<?php if(empty($res)): ?><div style="width: 1200px;height: 100px;">
        <h1 style="text-align: center">抱歉，没有找到符合条件的相关商品</h1>
    </div>
    <?php else: ?>
    <div class="Sorted">
        <div class="Sorted_style">
            <a class="<?php echo ($order?'':'on'); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($cate?"cate=$cate":''); echo ($cate?'&':''); echo ($price?"price=$price":''); ?>">综合<i class="icon-angle-down"></i></a>
            <a class="<?php echo ($order==1?'on':''); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($cate?"cate=$cate":''); echo ($cate?'&':''); echo ($price?"price=$price":''); echo ($price?'&':''); ?>order=1">销量<i class="icon-angle-down"></i></a>
            <a class="<?php echo ($order==2?'on':''); echo ($order==4?'on':''); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($cate?"cate=$cate":''); echo ($cate?'&':''); echo ($price?"price=$price":''); echo ($price?'&':''); echo ($order==2?'order=4':'order=2'); ?>">价格<i class="icon-angle-down"></i></a>
            <a class="<?php echo ($order==3?'on':''); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($cate?"cate=$cate":''); echo ($cate?'&':''); echo ($price?"price=$price":''); echo ($price?'&':''); ?>order=3">新品<i class="icon-angle-down"></i></a>
        </div>
        <!--页数-->


        <div class="s_Paging" style="width: 200px;">
            <a class="<?php echo ($nowpage==$totalpage?'on':'next1'); ?>" style="cursor: pointer;display: inline-block;width: 37px;height: 37px; border: 1px solid #ccc;border-left:0px;line-height: 37px;text-align: center;float: right; ">&gt;</a>
            <a class="<?php echo ($nowpage==1?'on':'prev1'); ?>" style="cursor: pointer;display: inline-block;width: 37px;height: 37px; border: 1px solid #ccc;line-height: 37px;text-align: center;float: right; ">&lt;</a>
            <span style="float: right"><?php echo ($nowpage); ?>/<?php echo ($totalpage); ?></span>

        </div>
    </div>
    <!--产品列表样式-->
    <div id="info">
        <div class="p_list clearfix">
            <ul>

                <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="gl-item">
                        <div class="Borders">
                            <div class="img"><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>"><img src="/Uploads/goodsPic/800/800_<?php echo ($val['pic']); ?>" style="width:220px;height:220px"/></a></div>
                            <div class="name"><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>"><?php echo ($val['goodsname']); ?></a></div>
                            <div class="Price">商城价：<b>¥<?php echo ($val['price']); ?></b><span>原价：<em><?php echo ($val['oldprice']); ?></em></span></div>
                            <div class="Review">已有<a href="#"><?php echo ($val['commentnum']); ?></a>评论</div>
                            <div class="p-operate" id="collect<?php echo ($val['id']); ?>">
                                <?php if(empty($val['collect'])): ?><a  onclick="addcollect(<?php echo ($val['id']); ?>)"    class="p-o-btn Collect" style="width:70px;cursor: pointer;">收藏</a>
                                    <?php else: ?>
                                    <a  onclick="deletcollect(<?php echo ($val['id']); ?>)"  class="p-o-btn Collect" style="width: 70px;cursor: pointer;">取消收藏</a><?php endif; ?>


                                <a onclick="addcart(<?php echo ($val['id']); ?>)"  style="cursor: pointer" class="p-o-btn shop_cart"><em></em>加入购物车</a>
                            </div>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="Paging_style">
                <div id="mypage" style="text-align: center;">
                    <span class="result">共<em><?php echo ($total); ?></em>件商品，当前显示第<em><?php echo ($nowpage); ?></em>页</span>
                    <ul class="paginList">
                        <li class="pag"><?php echo ($page); ?></li>
                    </ul>
                </div>


            </div>
        </div>

    </div><?php endif; ?>