<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/common.css" rel="stylesheet" type    ="text/css" />
<script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
<link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />



<!--[if IE 7]>
<link rel="stylesheet" href="assets//Public/Home/css/font-awesome-ie7.min.css">
<![endif]-->
<title>产品列表</title>
    <script type="text/javascript">
        $(function(){
            addcart=function(id){
                $.post("<?php echo U('Goodslist/addcart');?>",{id:id},function(res){
                      if(res.status==1){
                          getMyCart();
                          getMyCart1();
                          refreshCart();
                            layer.msg(res.info,{time:1000,icon:1})



                      }else{
                          layer.msg(res.info,{time:1000,icon:2
                                  })
                      }
                })


            }
        })
    </script>
    <script type="text/javascript">
        $(function(){
            addcollect=function(id){
                $.post("<?php echo U('Goodslist/addcollect');?>",{id:id},function(res){
                    if(res.status==1){
                        layer.msg(res.info,{time:1000,icon:1})
                        str="collect"+id;
                        sss='';
                        sss+="<a  onclick='deletcollect("+id+")'  class='p-o-btn Collect'' style='width: 70px;cursor: pointer'>取消收藏</a>";
                        sss+="<a onclick='addcart("+id+")'  style='cursor: pointer' class='p-o-btn shop_cart'><em></em>加入购物车</a>";
                        $("#"+str).html(sss);


                    }else{
                        layer.msg(res.info,{time:1000,icon:6})


                    }
                })


            }


            deletcollect=function(id){
                $.post("<?php echo U('Goodslist/deletcollect');?>",{id:id},function(res){
                    if(res.status==1){
                        layer.msg(res.info,{time:1000,icon:1})
                        str="collect"+id;
                        sss='';
                        sss+="<a  onclick='addcollect("+id+")'  class='p-o-btn Collect'' style='width: 70px;cursor: pointer'>收藏</a>";
                        sss+="<a onclick='addcart("+id+")'  style='cursor: pointer' class='p-o-btn shop_cart'><em></em>加入购物车</a>";
                        $("#"+str).html(sss);

                    }else{
                        layer.msg(res.info,{time:1000,icon:6})


                    }
                })


            }


        })
    </script>
    <style>
        .p_f_name .active{
            background-color: #999;
            height: 24px;
            line-height: 24px;
            color: #ffffff;
            text-align: center;
    }
        .Filter .Filter_list .Filter_Entire .brand{
             display: block;
             text-align: center;
             padding: 5px;
            background-color: #999;
            color: #ffffff;
            width: 34px;
            height: 14px;
            line-height: 15px;
        }

        .Filter .Filter_list .Filter_Entire .brand1{
            margin-top: 3px;
            display: block;
            text-align: center;
            padding: 5px;
            background-color: #ffffff;
            color: #000000;
            width: 34px;
            height: 14px;
            line-height: 15px;
        }
        .Filter .Filter_list .Filter_title span{ display:block; float:right; margin-right:20px;margin-top:6px;}
        .Filter .Filter_list .p_f_name{ padding:5px; line-height:30px; float:left; width:1018px;margin-top: 3px}
        .Filter .Filter_list .p_f_name a{
            display:block;
            width:38px;
            padding:0px 10px;
            float:left;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            course:hand;
        }
        .Sorted .Sorted_style a {
            display: block;
            float: left;
            width: 40px;
            border-right: 1px solid #fff;
            line-height: 40px;
            height: 40px;
            padding: 0px 10px;
            text-align: center;
        }
        .Paging_style .current{
            color:#000000;
            background: #ffffff;
            margin:0px 5px;
            font-size:15px;
            padding:4px 10px;
             font-weight: bold;
        }
        .Paging_style a{
            color:#000000;
            margin:0px 5px;
            font-size:15px;
            padding:4px 10px;
            border:1px solid #ddd;
            -moz-border-radius: 3px;      /* Gecko browsers */
            -webkit-border-radius: 3px;   /* Webkit browsers */
            border-radius:3px;            /* W3C syntax */
        }
        .Paging_style{
               float: none;
              margin: 50px auto;
        }
        .Paging_style .result{
             float: left;
             font-size: 12px;
            color:#000000;

        }
        .Paging_style .result em{
            color: #f60;
            font-weight: bold;
        }


        .gl-item .p-o-btn.Collect {
            padding: 0px;
            text-align: center;
        }

    </style>
    <script type="text/javascript">
        jQuery.fn.addFavorite = function(l, h) {
            return this.click(function() {
                var t = jQuery(this);
                if(jQuery.browser.msie) {
                    window.external.addFavorite(h, l);
                } else if (jQuery.browser.mozilla || jQuery.browser.opera) {
                    t.attr("rel", "sidebar");
                    t.attr("title", l);
                    t.attr("href", h);
                } else {
                    layer.alert("浏览器不支持，请使用Ctrl+D将本页加入收藏夹！",{title:"提示",icon:7});
                }
            });
        };
        $(function(){
            $('#fav').addFavorite(document.title,"www.ybc.com");

            refreshCart=function(){
                $.post("<?php echo U('Cart/getNum');?>",'',function(res){
                    if(res.info){
                        $("#cartNum").text(res.info);
                    }
                })
            }
            refreshCart();
        });
    </script>
</head>

<script type="text/javascript">

</script>

<body>
<!--顶部样式-->
<div id="top">
    <div class="top">
        <div class="Collection"><em></em><a href="javascript:;" title="收藏我们" id="fav">收藏我们</a></div>
        <div class="hd_top_manu clearfix">
            <ul class="clearfix">
                <?php if(!isset($_SESSION['ybc_id'])): ?><li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="<?php echo U('Login/login');?>" class="red">[请登录]</a> 新用户<a href="<?php echo U('Registered/registered');?>" class="red">[免费注册]</a></li>
                    <?php else: ?>
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="<?php echo U('UserCenter/usercenter');?>" class="red">[<?php echo (session('ybc_username')); ?>]</a><a href="<?php echo U('Login/logout');?>" class="red">[退出登录]</a></li><?php endif; ?>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Order/myOrderList');?>">我的订单</a></li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Cart/cart');?>">购物车(<b id="cartNum">0</b>)</a> </li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('UserCenter/myCollect');?>">我的收藏</a></li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a></li>
            </ul>
        </div>
    </div>
</div>
<!--logo和搜索样式-->
<div id="header"  class="header">
  <div class="logo">
  <a href="<?php echo U('Index/index');?>"><img src="/Public/Home/images/logo.png" /></a>
  <div class="phone">
   免费咨询热线:<span class="telephone">400-3454-343</span>
  </div>
  </div>
  <div class="Search">
      <form action="<?php echo U('Goodslist/index');?>?<?php echo ($category1?'&':''); echo ($brand?'&':''); echo ($cate?'&':''); echo ($price?'&':''); echo ($order?'&':''); ?>" method="get">
          <p>
              <?php if($category1): ?><input type="hidden" name="category1" value="<?php echo ($category1); ?>"/><?php endif; ?>
              <?php if($brand): ?><input type="hidden" name="brand" value="<?php echo ($brand); ?>"/><?php endif; ?>
              <?php if($cate): ?><input type="hidden" name="cate" value="<?php echo ($cate); ?>"/><?php endif; ?>
              <?php if($price): ?><input type="hidden" name="price" value="<?php echo ($price); ?>"/><?php endif; ?>
              <?php if($order): ?><input type="hidden" name="order" value="<?php echo ($order); ?>"/><?php endif; ?>
              <input name="keywords" type="text"  value="<?php echo ($keywords); ?>" class="text"/><input name="" type="submit" value="" class="Search_btn"/>
          </p>
      </form>
	<p class="Words">
        <a href="<?php echo U('goodslist/index');?>?category1=26">乌龙茶</a>
        <a href="<?php echo U('goodslist/index');?>?category1=27">绿茶</a>
        <a href="<?php echo U('goodslist/index');?>?category1=28">红茶</a>
        <a href="<?php echo U('goodslist/index');?>?category1=29">黑茶</a>
        <a href="<?php echo U('goodslist/index');?>?category1=30">黄茶</a>
        <a href="<?php echo U('goodslist/index');?>?category1=44">茶具</a>
    </p>
</div>
</div>
<!--导航栏样式-->
<div id="Menu" class="clearfix">
<div class="Menu_style">
  <div id="allSortOuterbox" class="display">
    <div class="Category"><a href="#" class="Menu_img"><em></em></a></div>
    <div class="hd_allsort_out_box_new">
	 <!--左侧栏目开始-->
	 <div class="Menu_list">
	    <div class="menu_title">茶叶品种</div>
         <a href="<?php echo U('goodslist/index');?>?category1=26">乌龙茶</a>
         <a href="<?php echo U('goodslist/index');?>?category1=27">绿茶</a>
         <a href="<?php echo U('goodslist/index');?>?category1=28">红茶</a>
         <a href="<?php echo U('goodslist/index');?>?category1=29">黑茶</a>
         <a href="<?php echo U('goodslist/index');?>?category1=30">黄茶</a>
	</div>
    <div class="Menu_list">
	    <div class="menu_title">茶叶价格</div>
        <a href="<?php echo U('Goodslist/index');?>?price=1">0-50</a>
        <a href="<?php echo U('Goodslist/index');?>?price=2">50-150</a>
        <a href="<?php echo U('Goodslist/index');?>?price=3">150-500</a>
        <a href="<?php echo U('Goodslist/index');?>?price=4">500-1000</a>
        <a href="<?php echo U('Goodslist/index');?>?price=5">1000以上</a>
	</div>
     <div class="Menu_list">
	    <div class="menu_title">推荐茶叶</div>
        <ul class="recommend">
            <?php if(is_array($adNameIfo)): $i = 0; $__LIST__ = $adNameIfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" title="<?php echo ($val["goodsname"]); ?>"><?php echo (truncate_cn($val["goodsname"],30,'',0)); ?>...</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
	</div>
	</div>
	</div>
    <div class="Navigation" id="Navigation">
		 <ul class="Navigation_name">
             <li><a class="nav_on" id="mynav1"  href="<?php echo U('Index/index');?>"><span>首页</span></a></li>
             <li class="<?php echo ($category1==26?'oonn':''); ?>"><a class="nav_on" id="mynav2"  href="<?php echo U('goodslist/index');?>?category1=26"><span>乌龙茶</span></a></li>
             <li class="<?php echo ($category1==27?'oonn':''); ?>"><a class="nav_on" id="mynav3"  href="<?php echo U('goodslist/index');?>?category1=27"><span>绿茶</span></a></li>
             <li class="<?php echo ($category1==29?'oonn':''); ?>"><a class="nav_on" id="mynav5"  href="<?php echo U('goodslist/index');?>?category1=29"><span>黑茶</span></a></li>
             <li class="<?php echo ($category1==44?'oonn':''); ?>"><a class="nav_on" id="mynav4"  href="<?php echo U('goodslist/index');?>?category1=44"><span>茶具</span></a></li>
             <li><a class="nav_on" id="mynav8"  href="<?php echo U('Group/index');?>"><span>今日团购</span></a></li>
             <li><a class="nav_on" id="mynav7"  href="<?php echo U('Integral/integral');?>"><span>积分商城</span></a></li>
             <li><a class="nav_on" id="mynav6"  href="<?php echo U('Sign/index');?>"><span>每日签到</span></a></li>
             <li><a class="nav_on" id="mynav9"  href="<?php echo U('Index/lianxiwomen');?>"><span>联系我们</span></a></li>
		 </ul>
		</div>
    <script type="text/javascript">
        $(function(){
            $("#Navigation>ul>li").mouseenter(function(){
                $(this).addClass('on');
            })
            $("#Navigation>ul>li").mouseleave(function(){
                $(this).removeClass('on');
            })
        })
    </script>
    <!--购物车-->

    <div class="hd_Shopping_list" id="Shopping_list">
        <div class="s_cart"><em></em><a href="<?php echo U('Cart/cart');?>">我的购物车</a> <i class="ci-right">&gt;</i><i class="ci-count" id="shopping-amount">0</i></div>
        <div class="dorpdown-layer" style="width: 321px">
            <div class="spacer"></div>
            <div class="prompt"></div><div class="nogoods"  style="height: 69px;"><b></b>购物车中还没有商品，赶紧选购吧！</div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(function() {
        getMyCart = function () {
            $.post("<?php echo U('Cart/getMyCart');?>", '', function (res) {
                if (res.status == 1) {
                    var str = '';
                    var num = 0;
                    var price = 0;
                    str += "<div class='spacer'></div><ul class='p_s_list' style='max-height: 240px;overflow: auto; margin-bottom: 50px;'>";
                    for (var i in res.info) {
                        num += parseInt(res['info'][i]['buynum']);
                        price += (parseInt(res['info'][i]['buynum']) * parseInt(res['info'][i]['price']));
                        str += "<li><div class='img'><img style='width: 50px;height: 50px' src='/Uploads/goodsPic/100/100_" + res['info'][i]['pic'] + "'></div>";
                        str += "<div class='content'><p>产品名称：</p><p>";
                        str += "<a href='<?php echo U('Home/Detail/detail');?>?id=" + res['info'][i]['id'] + "' title=" + res['info'][i]['goodsname'] + ">";
                        str += res['info'][i]['goodsname'].substring(0, 13);
                        str += " </a></p></div>";
                        str += "<div class='Operations'> <p class='Price' style='color: lightslategray'>￥<span class='singlePrice'>";
                        str += res['info'][i]['price'];
                        str += "</span>   x   <span class='buyNums'>";
                        str += res['info'][i]['buynum'];
                        str += "<span/></p><p><a class='del' onclick='delCart(" + res['info'][i]['id'] + ");' style='cursor: pointer'>移除</a></p></div> </li>";
                    }
                    str += "<ul/>";
                    str += "<div class='Shopping_style' style='position: absolute;bottom: 0px; width: 290px;'><div class='p-total'>共  <b>" + num + "</b> 件商品　共计￥<strong id='totalPrice1' style='font-size: 16px; color: #ff5555;'>" + price + "</strong></div>";
                    str += "<a href='<?php echo U('Cart/cart');?>' id='btn-payforgoods' class='Shopping'>去购物车结算</a></div>";
                    $(".dorpdown-layer").html(str);
                    $("#shopping-amount").text(num);
                } else {
                    var str = '';
                    str += "<div class='spacer'></div><div class='prompt'></div><div class='nogoods'  style='height: 69px;'><b></b>购物车中还没有商品，赶紧选购吧！</div>";
                    $(".dorpdown-layer").html(str);
                    $("#shopping-amount").text(0);
                }
            })
        }
        getMyCart();
        delCart=function(gid){
            $.post("<?php echo U('Cart/delCart');?>",{gid:gid},function(res){
                if (res.status==1) {
                    layer.msg('移除成功',{time:1000,icon:1},function(){
                        getMyCart();
                        getMyCart1();
                        refreshCart();
                    });
                }else{
                    layer.msg('移除失败',{time:1000,icon:2},function(){
                        getMyCart();
                        getMyCart1();
                        refreshCart();
                    });
                }
            })
        }
    })
</script>

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

<!--内页样式-->
 <div class="Inside_pages">
    <div class="products">
    <!--当前位置（面包屑）-->
     <div class="Location_link" id="md1">
     <em></em><a href="<?php echo U('index/index');?>">产品中心</a>  &gt;   <a href="<?php echo U('index');?>?<?php echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($price?"price=$price":''); ?>"><?php echo ($catename['catename']?$catename['catename']:全部商品); ?></a>
     </div>
    <!--筛选条件样式-->
      <div class="products_Select marginbottom">
       <div class="Filter">
  <div class="Filter_list clearfix" >
   <div class="Filter_title"><span>品牌：</span></div>
   <div class="Filter_Entire"><a class="<?php echo ($brand?'brand1':'brand'); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($cate?"cate=$cate":''); echo ($cate?'&':''); echo ($price?"price=$price":''); ?>">全部</a></div>
   <div class="p_f_name">
       <?php if(is_array($brandlist)): $i = 0; $__LIST__ = $brandlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a  class="<?php echo ($brand==$val['id']?'active':''); ?>"  href="<?php echo U('index');?>?<?php echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($cate?"cate=$cate":''); echo ($cate?'&':''); echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($price?"price=$price":''); echo ($price?'&':''); ?>brand=<?php echo ($val['id']); ?>" title="<?php echo ($val['brandname']); ?>"><?php echo ($val['brandname']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
   </div>
  </div>
           <div class="Filter_list clearfix">
               <div class="Filter_title"><span>一级分类：</span></div>
               <div class="Filter_Entire"><a class="<?php echo ($category1?'brand1':'brand'); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($price?"price=$price":''); ?>">全部</a></div>
               <div class="p_f_name">
                   <?php if(is_array($cate1)): $i = 0; $__LIST__ = $cate1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a class="<?php echo ($category1==$val['id']?'active':''); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($price?"price=$price":''); echo ($price?'&':''); ?>category1=<?php echo ($val['id']); ?>"><?php echo ($val['catename']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
               </div>
           </div>
           <?php if(empty($cate2)): else: ?>
   <div class="Filter_list clearfix">
       <div class="Filter_title"><span>二级分类：</span></div>
       <div class="Filter_Entire"><a class="<?php echo ($cate?'brand1':'brand'); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($price?"price=$price":''); ?>">全部</a></div>
       <div class="p_f_name">
           <?php if(is_array($cate2)): $i = 0; $__LIST__ = $cate2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a  class="<?php echo ($cate==$val['id']?'active':''); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($price?"price=$price":''); echo ($price?'&':''); ?>cate=<?php echo ($val['id']); ?>" title="<?php echo ($val['catename']); ?>"><?php echo ($val['catename']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>
   </div><?php endif; ?>
  <div class="Filter_list clearfix">
  <div class="Filter_title"><span>价格：</span></div>
  <div class="Filter_Entire"><a class="<?php echo ($price?'brand1':'brand'); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($cate?"cate=$cate":''); ?>">全部</a></div>
  <div class="p_f_name">
      <a class="<?php echo ($price==1?'active':''); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($cate?"cate=$cate":''); echo ($cate?'&':''); ?>price=1" title="0-50">0-50</a>
      <a class="<?php echo ($price==2?'active':''); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($cate?"cate=$cate":''); echo ($cate?'&':''); ?>price=2" title="50-150">50-150</a>
      <a class="<?php echo ($price==3?'active':''); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($cate?"cate=$cate":''); echo ($cate?'&':''); ?>price=3" title="150-500" >150-500</a>
      <a class="<?php echo ($price==4?'active':''); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($cate?"cate=$cate":''); echo ($cate?'&':''); ?>price=4" title="500-1000" >500-1000</a>
      <a class="<?php echo ($price==5?'active':''); ?>" href="<?php echo U('index');?>?<?php echo ($keywords?"keywords=$keywords":''); echo ($keywords?'&':''); echo ($category1?"category1=$category1":''); echo ($category1?'&':''); echo ($brand?"brand=$brand":''); echo ($brand?'&':''); echo ($cate?"cate=$cate":''); echo ($cate?'&':''); ?>price=5" title="1000以上">1000以上</a>
  </div>
  </div>
 </div>
      </div>
      <!--产品列表列表-->
      <div class="products_list marginbottom" id="info1">
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
      </div>


    </div>    
      <!--友情链接-->

 </div>
 <!--底部样式-->
<div class="footerbox">
    <!--友情链接-->
    <div class="Links">
        <div class="link_title">友情链接</div>
        <div class="link_address"><a href="http://www.t0001.com/" target="_blank">河南茶叶协会</a>  <a href="http://news.t0001.com/" target="_blank">茶叶咨询频道</a>  <a href="http://news.t0001.com/" target="_blank">茶叶动态频道</a> <a href="http://news.t0001.com/" target="_blank">名家紫砂馆 </a>   <a href="http://news.t0001.com/" target="_blank">中国茶友会频道</a> <a href="http://news.t0001.com/" target="_blank">茶叶论坛</a> <a href="http://news.t0001.com/" target="_blank">茶叶大全</a></div>
    </div>
</div>
<div class="footer">
    <div class="streak"></div>
    <div class="footerbox clearfix">
        <div class="left_footer">
            <div class="img"><img src="/Public/Home/images/img_33.png" /></div>
            <div class="phone">
                <h2>服务咨询电话</h2>
                <p class="Numbers">400-3455-334</p>
            </div>
        </div>
        <div class="right_footer">
            <dl>
                <dt><em class="icon_img"></em>购物指南</dt>
                <dd><a href="#">怎样购物</a></dd>
                <dd><a href="#">积分政策</a></dd>
                <dd><a href="#">会员优惠</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">产品信息</a></dd>
                <dd><a href="#">怎样购物</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>配送方式</dt>
                <dd><a href="#">快递资费及送达时间</a></dd>
                <dd><a href="#">快递覆盖地区查询</a></dd>
                <dd><a href="#">验货与签收</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">产品信息</a></dd>
                <dd><a href="#">怎样购物</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>配送方式</dt>
                <dd><a href="#">货到付款</a></dd>
                <dd><a href="#">支付宝</a></dd>
                <dd><a href="#">财付通</a></dd>
                <dd><a href="#">网银支付</a></dd>
                <dd><a href="#">银联支付</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>售后服务</dt>
                <dd><a href="#">退换货原则</a></dd>
                <dd><a href="#">退换货要求与运费规则</a></dd>
                <dd><a href="#">退换货流程</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>关于我们</dt>
                <dd><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a></dd>
                <dd><a href="#">友情链接</a></dd>
                <dd><a href="#">媒体报道</a></dd>
                <dd><a href="#">新闻动态</a></dd>
                <dd><a href="#">企业文化</a></dd>

            </dl>
        </div>
    </div>
    <div class="slogen">
        <div class="footerbox clearfix ">
            <ul class="wrap">
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_02.png" data-bd-imgshare-binded="1"></a>
                    <b>正品保证</b>
                    <span>正品行货 放心选购</span>
                </li>
                <li><a href="#"><img src="/Public/Home/images/icon_img_03.png" data-bd-imgshare-binded="2"></a>
                    <b>满68元包邮</b>
                    <span>购物满68元，免费快递</span>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_04.png" data-bd-imgshare-binded="3"></a>
                    <b>厂家直供</b>
                    <span>价格更低，质量更可靠</span>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_05.png" data-bd-imgshare-binded="4"></a>
                    <b>权威认证</b>
                    <span>政府扶持单位，安全保证</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="footerbox Copyright">
        <p><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a> | <a href="#">隐私申明</a> | <a href="#">成为供应商</a> | <a href="#">茶叶</a> | <a href="#">博客</a> |<a href="#">友情链接</a> | <a href="#">网站地图</a></p>
        <p>Copyright 2010 - 2016 巴山雀舌 河南巴山雀舌茗茶实业有限公司 zuipin.cn All Rights Reserved </p>
        <p>豫ICP备10200063号-1</p>
        <a href="#" class="return_img"></a>
    </div>
</div>
 <!--右侧菜单栏购物车样式-->
<script type="text/javascript">
    $(function(){
        getMyCart1=function(){
            $.post("<?php echo U('Cart/getMyCart');?>",'',function(res){
                if(res.status==1){
                    var str='';
                    var num=0;
                    var price=0;
                    str+="<div class='mycart' style='font-size: 15px;color: #008800;height: 29px;'><b>我的购物车</b></div><ul class='p_s_list' style='overflow: auto;max-height: 272px;margin-bottom: 40px;'>";
                    for(var i in res.info){
                        num+=parseInt(res['info'][i]['buynum']);
                        price+=(parseInt(res['info'][i]['buynum'])*parseInt(res['info'][i]['price']));
                        str+="<li class='goodsList' style='height: 60px;'><div class='img' style='float: left;margin-left: 6px;'><img style='width:55px;height:55px' src='/Uploads/goodsPic/100/100_"+res['info'][i]['pic']+"'></div>";
                        str+="<div class='content' style='float: left;width: 120px;height: 60px;'><p class='goodsNames' style='float: left;margin-left: 6px;color: lightslategray;height: 22px'>产品名称：</p><p class='goodsName' style='float: left;margin-left: 9px;margin-top: 5px;height: 22px'>";
                        str+="<a href='<?php echo U('Home/Detail/detail');?>?id="+res['info'][i]['id']+"' title="+res['info'][i]['goodsname']+">";
                        str+=res['info'][i]['goodsname'].substring(0,9);
                        str+=" </a></p></div>";
                        str+="<div class='Operations' style='float: right;height: 60px;'> <p class='Price' style='color: lightslategray;height: 22px'>￥<span class='singlePrice'>";
                        str+=res['info'][i]['price'];
                        str+="</span>   x   <span class='buyNums1'>";
                        str+=res['info'][i]['buynum'];
                        str+="</span><p><a class='del1' onclick='delCart("+res['info'][i]['id']+");' style='cursor: pointer'>移除</a></p></div> </li><hr/>";
                    }
                    str+="<ul/>";
                    str+="<div class='Shopping_style' style='position: absolute;width: 280px;height: 34px;line-height: 34px;'><div class='p-total' style='float: left;margin-left: 5px'>共  <b>"+num+"</b> 件商品　共计￥<b class='tPrice' id='totalPrice2' style='font-size: 16px; color: #ff5555;'>"+price+"</b></div>";
                    str+="<a href='<?php echo U('Cart/cart');?>' id='btn-payforgoods1' class='Shopping' style='height:22px;line-height:22px;font-size:10px;margin-top:10px;margin-right:10px;float:right;background-color:#008800;color:#fff0f0;border-radius:2px'>去购物车结算</a></div>";
                    $("#cartGoods").html(str);
                    $("#cartBox-num").text(num);
                }else{
                    var str='';
                    str+="<div class='message' style='height: 83px;'><b></b>购物车中还没有商品，赶紧选购吧！</div>";
                    $("#cartGoods").html(str);
                    $("#cartBox-num").text(0);
                }
            })
        }
        getMyCart1();
    });
</script>
<div class="fixedBox">
    <ul class="fixedBoxList">
        <?php if(isset($_SESSION['ybc_id'])): ?><li class="fixeBoxLi user"><a href="<?php echo U('UserCenter/usercenter');?>"> <span class="fixeBoxSpan"></span> <strong>用户</strong></a> </li>
            <?php else: ?>
            <li class="fixeBoxLi user"><a href="<?php echo U('Login/login');?>"> <span class="fixeBoxSpan"></span> <strong>用户</strong></a> </li><?php endif; ?>

        <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
            <p class="good_cart" id="cartBox-num">0</p>
            <a href="<?php echo U('Cart/cart');?>"><span class="fixeBoxSpan"></span> <strong>购物车</strong></a>
            <div class="cartBox" id="cartGoods">
                <span class="mycart"><b>我的购物车</b></span>
                <div class="message">购物车内暂无商品，赶紧选购吧</div>
            </div>
        </li>

        <li class="fixeBoxLi Service "> <span class="fixeBoxSpan"></span> <strong>客服</strong>
            <div class="ServiceBox">
                <dl onclick="javascript:;">
                    <dt><img src="/Uploads/public/kefu1.png" width="60" height="60"></dt>
                    <dd><strong>QQ客服1</strong>
                        <p class="p1">9:00-22:00</p>
                        <p class="p2"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=781075774&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:781075774:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
                    </dd>
                </dl>
                <dl onclick="javascript:;">
                    <dt><img src="/Uploads/public/kefu1.png" width="60" height="60"></dt>
                    <dd><strong>QQ客服2</strong>
                        <p class="p1">9:00-22:00</p>
                        <p class="p2"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=872233743&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:872233743:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
                    </dd>
                </dl>
            </div>
        </li>

        <li class="fixeBoxLi code cart_bd " style="display:block;" id="cartbox">
            <span class="fixeBoxSpan"></span> <strong>微信</strong>
            <div class="cartBox">
                <div class="QR_code">
                    <p><img src="/Uploads/public/erweima.png" width="150px" height="150px" style=" margin-top:10px;" /></p>
                    <p>微信扫一扫，关注我们</p>
                </div>
            </div>
        </li>

        <li class="fixeBoxLi Home" id="collectLi">
            <a href="<?php echo U('UserCenter/myCollect');?>"> <span class="fixeBoxSpan"></span> <strong>收藏</strong></a>
        </li>
        <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan"></span> <strong>返回顶部</strong> </li>
    </ul>
</div>
</body>
<script type="text/javascript">
    function goodsinfo(id){    //异步分页
        var id=id?id:1;
        $.get("<?php echo U('goodslist/index');?>",{"p":id},function(res){
            $('#info1').html(res);
            $("html,body").animate({scrollTop:$("#md1").offset().top},100)

        })
    }
</script>
</html>