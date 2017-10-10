<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>商品列表</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="/Public/Mobile/css/list.css" rel="stylesheet">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js" type="text/javascript"></script>
    <script src="/Public/Mobile/js/jquery.lazyload.js" type="text/javascript"></script>
<script>
(function(){
    function w() {
    var r = document.documentElement;
    var a = r.getBoundingClientRect().width;
    // console.log(a);
        if (a > 750 ){
            a = 750;
        } 
        rem = a / 7.5;
        r.style.fontSize = rem + "px"
    }
    var t;
    w();
    window.addEventListener("resize", function() {
        clearTimeout(t);
        t = setTimeout(w, 300)
    }, false);
})();

</script>
    <!--图片延迟加载-->
    <script type="text/javascript">
        $(function(){
            $('img').lazyload({
                effect:"fadeIn"
            })
        })
    </script>
    <style>
          .nav #active{
              background: #d0d5d7;
              width: 1.8rem;
              height: 0.67rem;
          }
          .backToTop {display: none; width: 18px; line-height: 1.2; padding: 5px 0; text-align: center; position: fixed; _position: absolute; right: 20px; bottom: 1.15rem ; _bottom: "auto"; cursor: pointer; opacity: .6; filter: Alpha(opacity=100)}

          .header .search input {
              width: 5.85rem;
              height: 0.7rem;
              font-size: 0.24rem;
              margin-top: 0.2rem;
              background: #fff;
              padding-left: 0.55rem;
          }
          .wrapper {
              width: 7.1rem;
              margin: 0 auto;
          }
          .sear { height: 0.52rem; width: 0.52rem; float: right;
              background: url("/Public/Mobile/images/search1.png") no-repeat;
              background-size: 0.5rem;
              margin-top: 0.4rem;

              background-position: center;
          }
    </style>
</head>

<script type="text/javascript">
      $(function(){
          search=function(){
              keywords=$('.txt').val();
              location.href="<?php echo U('goodslist/index');?>?keywords="+keywords+"<?php echo ($brand?'&brand=':''); echo ($brand?$brand:''); echo ($category1?'&category1=':''); echo ($category1?$category1:''); echo ($order?'&order=':''); echo ($order?$order:''); ?>";
          }
             })
</script>
<!--头部-->
<body>
<div class="header">
    <div class="wrapper">
        <div class="search">
            <input class="txt" name="keywords" type="text" placeholder="输入商品名称关键字" value="<?php echo ($keywords); ?>">
            <div class="sear" onclick="search()"></div>
        </div>
    </div>
</div>

<!--导航-->
<?php if(empty($goodsinfo)): ?><div style="width: 6rem;height: 3rem;">
        <h3 style="text-align: center">抱歉，没有找到符合条件的相关商品</h3 >
    </div>
<?php else: ?>
<div class="nav">
        <ul class="clearfix">
            <li id="<?php echo ($order?'':'active'); ?>"><a  href="<?php echo U('Goodslist/index');?>?<?php echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); ?>">综合排序</a></li>
            <li id="<?php echo ($order==salenum?'active':''); ?>"><a href="<?php echo U('goodslist/index');?>?<?php echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); ?>order=salenum">销量</a></li>
            <li id="<?php echo ($order==price?'active':''); echo ($order==price1?'active':''); ?>"><a href="<?php echo U('goodslist/index');?>?<?php echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($order==price?'order=price1':'order=price'); ?>">价格</a></li>
            <li id="<?php echo ($order==addtime?'active':''); ?>" class="last"><a href="<?php echo U('goodslist/index');?>?<?php echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); ?>order=addtime">新品</a></li>
        </ul>
</div>

<!--产品展示-->
<div class="pro">
    <div class="wrapper">
        <ul class="clearfix">
            <?php if(is_array($goodsinfo)): $k = 0; $__LIST__ = $goodsinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if(($k <= 6)): ?><li class="li0<?php echo ($k); ?>">
                <?php elseif(($k%6 == 0)): ?>
                <li class="li06">
                <?php else: ?>
                <li class="li0<?php echo ($k%6); ?>"><?php endif; ?>
            <a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>">
                <div><i class="pic01"><img class="lazy" data-original="/Uploads/goodsPic/800/800_<?php echo ($val['pic']); ?>" src="/Public/Mobile/images/loading.gif" alt="" style="width:3.38rem;height: 2.98rem"/></i></div>
                <p class="txt" style="width: 3.07rem;font-size: 0.25rem"><?php echo (mb_substr($val['goodsname'],0,20,'utf-8')); ?></p>
                <p><span class="pice">￥<?php echo ($val['price']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="txt01"><?php echo ($val['commentnum']); ?>人评论</span></p>
                <p class="btn"><i></i><i></i><i></i></p>
            </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>

    </div>
</div><?php endif; ?>
<script type="text/javascript">
    $(function(){
        var $backToTopTxt ="<img src='/Public/Mobile/images/gotop.gif'>", $backToTopEle = $('<div class="backToTop"></div>').appendTo($("body"))
                .html($backToTopTxt).attr("title", $backToTopTxt).click(function() {
                    $("html, body").animate({ scrollTop: 0 }, 200);
                }), $backToTopFun = function() {
            var st = $(document).scrollTop(), winh = $(window).height();
            (st > 300)? $backToTopEle.fadeIn(200): $backToTopEle.fadeOut(200);
//IE6下的定位
            if (!window.XMLHttpRequest) {
                $backToTopEle.css("top", st + winh - 100);
            }
        };
        $(window).bind("scroll", $backToTopFun);
        $(function() { $backToTopFun(); });
    });
</script>
<!--底部导航-->
<div class="outside">
    <div class="footer">
        <ul style="width: 100%">
            <li><a href="<?php echo U('Index/index');?>">
                <i><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo U('Category/index');?>">
                <i class="on"><span class="i2"></span></i>
                <h5>分类</h5>
            </a></li>
            <li><a href="<?php echo U('Cart/cart');?>">
                <i><span class="i3"></span></i>
                <h5>购物车</h5>
            </a></li>
            <li class="end"><a href="<?php echo U('UserCenter/usercenter');?>">
                <i><span class="i4"></span></i>
                <h5>我的</h5>
            </a></li>
        </ul>
    </div>
</div>
</body>
</html>