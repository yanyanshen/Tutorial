<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />
<link href="/Public/Home/css/detail.css" rel="stylesheet" tyle="text/css" />
<script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
<title>一杯茶/茶叶百科/<?php echo ($info["title"]); ?></title>
    <script type="text/javascript">
        $(function(){
            var keyword="<?php echo ($info['teatag']); ?>";
            $.get("<?php echo U('Article/detail');?>",{'keyword':keyword})
        })
    </script>
</head>

<body style="background-color:white);">
<!--顶部样式-->
<div id="top">
  <div class="top">
    <div class="Collection"><em></em><a href="#">收藏我们</a></div>
	<div class="hd_top_manu clearfix">
	  <ul class="clearfix">
	   <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="#" class="red">[请登录]</a> 新用户<a href="#" class="red">[免费注册]</a></li>
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">我的订单</a></li> 
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="#">购物车(<b>0</b>)</a> </li>
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">联系我们</a></li>
	   <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover"><a href="#" class="hd_menu">客户服务</a>
	    <div class="hd_menu_list">
		   <ul>
		    <li><a href="#">常见问题</a></li>
			<li><a href="#">在线退换货</a></li>
		    <li><a href="#">在线投诉</a></li>
			<li><a href="#">配送范围</a></li>
		   </ul>
		</div>	   
	   </li>
	  </ul>
	</div>
  </div>
</div>
<!--logo和搜索样式-->
<div id="header"  class="header">
  <div class="logo">
  <a href="<?php echo U('Index/index');?>"><img src="/Public/Home/images/logo.png" /></a>
  <div class="phone">
   <em class="icon_img"></em><span style="font-size:30px;font-weight:bold;"><a href="<?php echo U('Article/index');?>">茶叶百科</a></span>
  </div>
  </div>
  <div class="Search">
      <form action="<?php echo U('index');?>" method="get">
    <p><select name="search" id="" style="font-size:14px;color:#000000;width: 80px;height: 40px;background-color: rgb(247,247,247);border: 4px solid rgb(184, 184, 173);margin-left: 10px">

        <?php switch($search): case "title": ?><option value="title" selected>按标题</option>
                <option value="author">按作者</option>
                <option value="teatag">按标签</option>
                <option value="content">按内容</option><?php break;?>
            <?php case "author": ?><option value="title">按标题</option>
                <option value="author" selected>按作者</option>
                <option value="teatag">按标签</option>
                <option value="content">按内容</option><?php break;?>
            <?php case "teatag": ?><option value="title">按标题</option>
                <option value="author">按作者</option>
                <option value="teatag" selected>按标签</option>
                <option value="content">按内容</option><?php break;?>
            <?php case "content": ?><option value="title">按标题</option>
                <option value="author">按作者</option>
                <option value="teatag">按标签</option>
                <option value="content" selected>按内容</option><?php break;?>
            <?php default: ?>
            <option value="title">按标题</option>
            <option value="author">按作者</option>
            <option value="teatag">按标签</option>
            <option value="content">按内容</option><?php endswitch;?>



    </select>
        <input name="keyword" type="text" placeholder="请输入搜索关键字" value="<?php echo ($keyword); ?>"  class="text" /><input name="" type="submit" value=""  class="Search_btn"/></p>
      </form>
</div>
</div>



<!--菜单栏样式-->
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

<!--左边广告栏-->
<div class="left">
    <div class="picMarquee-top">
        <div class="hd">
            <span>向您推荐</span>
            <a class="next"></a>
            <a class="prev"></a>
        </div>
        <div class="bd">
            <ul class="picList">

                <!--------左侧广告栏循环------->
                <?php if(is_array($leftInfo)): $i = 0; $__LIST__ = $leftInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                    <div class="pic"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" target="_blank"><img src="/Uploads/goodsPic/<?php echo ($val["adpic"]); ?>" /></a></div>
                    <div class="title"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" target="_blank"><?php echo (truncate_cn($val["goodsname"],30,'',0)); ?>...</a></div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(".picMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:4,interTime:50});
    </script>
</div>
<!--左边广告结束-->

<!-- 中间内容部分 开始-->
<div class="detail">
    <div class="title" style="color:#333;line-height: 45px;font-size: 20px;padding-top: 20px;"><?php echo ($info["title"]); ?></div>
    <div class="author">发布时间：<?php echo (date('Y-m-d H:i:s',$info["dateline"])); ?>&nbsp;作者：<?php echo ($info["author"]); ?>&nbsp;标签：<?php echo ($info["teatag"]); ?></div>
    <div class="shara"><span>分享到：</span><img class="sina" src="/Public/Home/images/sina.png" alt="" title="分享到新浪微博" style="cursor: pointer"/>
        <a href="javascript:void(0)" onclick="postToWb();return false;" class="tmblog"><img src="/Public/Home/images/tenxun.png" title="分享到腾讯微博" class="tenxun"></a></div>
    <img src="/Uploads/teapic/<?php echo (date('Y-m-d',$info["dateline"])); ?>/<?php echo ($info["teapic"]); ?>" alt="图片" class="pic"/>
    <div class="content" style="font-size: 15px; text-align: left; line-height: 40px;color:rgb(85,85,85);white-space: normal;background-color: white;"><?php echo html_entity_decode($info['content']);?></div>


    <script type="text/javascript">

        /***************************分享到新浪微博API接口**************************/
        $('.sina').click(function(){
            window.sharetitle = $(this).parent().siblings('.title').html();
            window.shareUrl = $(this).parent().siblings('img').attr('src');
            share();
        });
        function share(){
            //d指的是window
            (function(s,d,e){try{}catch(e){}var f='http://v.t.sina.com.cn/share/share.php?',u=d.location.href,p=['url=',e(u),'&title=',e(window.sharetitle),'&appkey=2924220432','&pic=',e(window.shareUrl)].join('');function a(){if(!window.open([f,p].join(''),'mb',['toolbar=0,status=0,resizable=1,width=620,height=450,left=',(s.width-620)/2,',top=',(s.height-450)/2].join('')))u.href=[f,p].join('');};if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})(screen,document,encodeURIComponent);
        }


        /****************************分享到腾讯微博API接口***********************/
        function postToWb(){
            var _url = encodeURIComponent(document.location);
            var _assname = encodeURI("");//你注册的帐号，不是昵称
            var _appkey = encodeURI("801363995");//你从腾讯获得的appkey
            var _pic = $(this).parent().siblings('img').attr('src');//（例如：var _pic='图片url1|图片url2|图片url3....）
            var _t = "<?php echo ($info['title']); ?>";//标题和描述信息
            var metainfo = document.getElementsByTagName("meta");
            for(var metai = 0;metai < metainfo.length;metai++){
                if((new RegExp('description','gi')).test(metainfo[metai].getAttribute("name"))){
                    _t = metainfo[metai].attributes["content"].value;
                }
            }
            _t =  document.title+_t;//请在这里添加你自定义的分享内容
            if(_t.length > 120){
                _t= _t.substr(0,117)+'...';
            }
            _t = encodeURI(_t);

            var _u = 'http://share.v.t.qq.com/index.php?c=share&a=index&url='+_url+'&appkey='+_appkey+'&pic='+_pic+'&assname='+_assname+'&title='+_t;
            window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
        }
    </script>



</div>
<!-- 中间内容部分 结束-->


<!--底部广告部分开始-->
<div class="advertisement">
    <div class="tuijian">根据文章向您推荐</div>
    <div class="slideGroup" style="margin:0 auto">
        <div class="parHd">
            <ul><li>茶叶</li><li>茶具</li></ul>
        </div>
        <div class="parBd">
            <div class="slideBox">
                <ul>
                    <!-------文章茶叶广告循环----->
                    <?php if(is_array($articleTea)): $i = 0; $__LIST__ = $articleTea;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                        <div class="pic"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" target="_blank"><img src="/Uploads/goodsPic/<?php echo ($val["adpic"]); ?>" /></a></div>
                        <div class="title"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" target="_blank"><?php echo (truncate_cn($val["goodsname"],30,'',0)); ?>...</a></div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div><!-- slideBox End -->
            <div class="slideBox">
                <ul>
                    <!-------文章茶具广告循环--------->
                    <?php if(is_array($articleTeaSet)): $i = 0; $__LIST__ = $articleTeaSet;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                        <div class="pic"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" target="_blank"><img src="/Uploads/goodsPic/<?php echo ($val["adpic"]); ?>" /></a></div>
                        <div class="title"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" target="_blank"><?php echo (truncate_cn($val["goodsname"],30,'',0)); ?>...</a></div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><!-- slideBox End -->
        </div><!-- parBd End -->
    </div>
    <script type="text/javascript">
        /*
         SuperSlide组合注意：
         1、内外层mainCell、targetCell、prevCell、nextCell等对象不能相同，除非特殊应用；
         2、注意书写顺序，通常先写内层js调用，再写外层js调用
         */
        /* 内层图片无缝滚动 */
        jQuery(".slideGroup .slideBox").slide({ mainCell:"ul",vis:4,prevCell:".sPrev",nextCell:".sNext",effect:"leftMarquee",interTime:50,autoPlay:true,trigger:"click"});
        /* 外层tab切换 */
        jQuery(".slideGroup").slide({titCell:".parHd li",mainCell:".parBd"});

    </script>

</div>

<!--底部广告开始-->


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

</body>
</html>