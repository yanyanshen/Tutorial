<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($goodsList["goodsname"]); ?></title>
	<link rel="stylesheet" type="text/css" href="/Public/Home/style/public.css">
	<link rel="stylesheet" type="text/css" href="/Public/Home/style/index.css">
	<link rel="stylesheet" type="text/css" href="/Public/Home/style/detail.css">
    <link rel="stylesheet" href="/Public/Home/style/headerAndFooter.css" />
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <link rel="stylesheet" href="/Public/Home/style/xiangqing.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Home/style/jquery.jqzoom.css">
	<script type="text/javascript" src="/Public/Home/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.jqzoom-core.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.jqzoom').jqzoom({
	            zoomType: 'standard',
	            lens:true,
	            preloadImages: true,
	            alwaysOn:false,
				title:false,
				zoomWidth:430,
				zoomHeight:430,
				xOffset:20,
				yOffset:0
	        });

	});
</script>
    <style type="text/css">
    .empty{
        color: red;
        font-size: 30px;
        margin-left: 510px;
    }
        .box{
            margin:0 auto;
            padding:0;


        }
    </style>
</head>
<body>
<!--  头部开始 -->
<!-- top开始 -->
<div class="top">
    <div class="topCont frm_sty clearfix">
        <p class="fl">  <b style="color:#000;"><?php switch($_SESSION['shang_home']['level']): case "1": ?>普通会员<?php break;?>
            <?php case "2": ?>铜牌会员<?php break;?>
            <?php case "3": ?>银牌会员<?php break;?>
            <?php case "4": ?>金牌会员<?php break;?>
            <?php case "5": ?>钻石会员<?php break; endswitch;?>
            <?php echo (session('username')); ?>&nbsp;&nbsp;&nbsp;&nbsp;</b>欢迎来到美伦美尚！</p>
        <p class="fr">
            <?php if(($_SESSION['shang_home']['id']) > "0"): ?><a href="javascript:logout()">退出</a> &nbsp&nbsp&nbsp
                <a href="<?php echo u('Member/memberinfo');?>">会员中心</a>
                <?php else: ?>
                <a href="<?php echo u('User/login');?>">登录</a>&nbsp&nbsp&nbsp
                <a href="<?php echo u('User/register');?>">注册</a>&nbsp&nbsp&nbsp<?php endif; ?>

        </p>
    </div>
</div>
<!-- top结束 -->
<div class="topNav">
    <div class="topNavCont frm_sty clearfix">
        <h1 class="fl"><img src="/Public/Home/images/logo.png" alt="" height="85px"/></h1>
        <ul class="fl clearfix">
            <li  ><a href="<?php echo u('Index/index');?>" >首页</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'护肤'));?> "  >护肤</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'彩妆'));?>"  >彩妆</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'香水'));?>">香水</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'洗护'));?>">洗护</a></li>


        </ul>
        <form action="<?php echo u('Home/Index/search');?>" method="get" class="fr clearfix">
            <input type="text" class="text" name="name" value="<?php echo ($name); ?>"/>
            <input type="submit" id="submit" value="" />
        </form>
    </div>
</div>
<!-- topNav结束 -->
<!-- 置顶导航istop开始 -->
<div class="istop">
    <div class="istopCont frm_sty clearfix">
        <h1 class="fl"><img src="/Public/Home/images/logo.png" height="85px" alt="" /></h1>
        <ul class="fl clearfix">
            <li><a href="<?php echo u('Index/index');?>" target="_blank">首页</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'护肤'));?> "  >护肤</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'彩妆'));?>"  >彩妆</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'香水'));?>">香水</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'洗护'));?>">洗护</a></li>
        </ul>
        <form action="<?php echo U(Index/search);?>" method="get" class="fr clearfix">
            <input type="text" class="text" name="name"/>
            <input type="submit" id="submit" value=""/>
        </form>
    </div>
</div>
<!-- 置顶导航istop结束 -->
<script>
    function logout(){
        //询问框
        layer.confirm('您确定要退出当前账户?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Home/User/logout');?>",'',function(res){
                if(res.status=='ok'){
                    location.href="<?php echo U('Home/Index/index');?>";
                }
            });
        });
    }

</script>
<!-- 头部结束 -->
<div class="box goodsinfo">
	<div class="lf leftinfo">
		<!--jQzoom开始-->

    	<!--显示上面大图和放大镜-->
    	<div>
       	 	<a href="/Public/Uploads/goods/<?php echo ($goodsList["pic"]); ?>"  class="jqzoom" rel='gal1'  title="triumph">
                <img src="/Public/Uploads/goods/350_<?php echo ($goodsList["pic"]); ?>"  title="triumph" />
        	</a>
    	</div>
    	<!--显示下面三张小图-->
        <div >
            <ul id="thumblist" class="clear"  >
                <?php if(is_array($goodsList['pics'])): $i = 0; $__LIST__ = $goodsList['pics'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?><li><a class="<?php echo ($key?'':'zoomThumbActive'); ?>"  href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '/Public/Uploads/goods/350_<?php echo ($pic); ?>',largeimage: '/Public/Uploads/goods/<?php echo ($pic); ?>'}"><img src='/Public/Uploads/goods/100_<?php echo ($pic); ?>' width="50px"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

	  <!--jQzoom结束-->
	</div>
	<div class="lf rightinfo">
		<div>
            <form action="" method="post" id="form1">
			<h2><?php echo ($goodsList["goodsname"]); ?></h2>
                <input type="hidden" name="gid" value="<?php echo ($goodsList["gid"]); ?>">
			<dl>
                <dd>品牌：<span class='price'><?php echo ($goodsList["brand_name"]); ?></span></dd>
				<dd>价格：<span class='price'><?php echo ($goodsList["price"]); ?></span></dd>
				<dd>销量：<span><?php echo ($goodsList["saled_num"]); ?></span> &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;现余库存：<span><?php echo ($goodsList["num"]); ?></span></dd>
				<dd>上架时间：<span><?php echo date('Y-m-d',$goodsList['createtime']);?></span></dd>
				<dd >
					<span>购买数量:</span>

                    <a href="javascript:jian();" class="decrement">-</a>&nbsp;
					<input type="text" name="buynum" value="1"  id="buynum"/>&nbsp;
					<a href="javascript:jia();" class="increment">+</a>
				</dd>
                <dd><a href="javascript:sc()"  >
                    <img src="/Public/Home/images/heart1.jpg" id="pic" />
                    <span  id="collect" style="display:none"  >加入收藏</span>
                </a>
                </dd>
                <dd>
                    <div id="buy">
                        <a class="tobuy" onclick="buy();">立即购买</a>
                        <a class="tocart" onclick="addtocar();">加入购物车</a>
                    </div>
                </dd>
			</dl>
            </form>
		</div>

	</div>
</div>
<div class="intro_part2">
    <a id="first"></a>
    <div class="information box">
        <div class="intro_infor_title" >
        </div>
        <div class="intro_infor_cont">
            <p style="width: 960px;"><?php echo ($goodsList["description"]); ?></p>
            <p class="notice"></p>
        </div>
    </div>
    <div class="pro_judge" id="fiveth" style="margin-left: 200px;">
        <div class="judge_title"></div>
        <div class="judge_cont" style="margin-left: 320px;">
            <ul>
                <li class="li1">
                </li>
                <li class="li2">
                    <p class="p1"><span>1</span>美白度</p><span class="sp2">5</span>
                    <p class="p1"><span>2</span>收缩毛孔</p><span class="sp2">5</span>
                    <p class="p1"><span>3</span>抗衰老</p><span class="sp2">5</span>
                    <p class="p1"><span>4</span>滋润度</p><span class="sp2">5</span>
                    <p class="p1"><span>5</span>保湿度</p><span class="sp2">5</span>
                    <p class="p1"><span>6</span>低刺激</p><span class="sp2">5</span>
                </li>
                <li class="li3" style="font-size: 18px">
                    <p>该商品使用起来好用吗？
                        与超千万美轮美尚用户分享你的独家秘笈。
                    </p>
                </li>
            </ul>
        </div>
    </div>
<!-- 用户具体评价开始 -->
<?php if(is_array($comList)): $k = 0; $__LIST__ = $comList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class="user box" style="margin:0 0 0 300px">
        <ul>
            <li class="li2 ">
                <div class="user_cont clearfix">
                    <div class="clearfix">
                        <div class="user_judge fl">
                            <div class="title" style="position: relative;">
                                <span class="sp1" style="font-size: 20px;position: relative;left: -140px">序号：<?php echo ($k); ?></span>
                                <span class="sp1" style="font-size: 20px">用户名：<?php echo ($v["username"]); ?></span>
                                <span class="sp1" style="font-size: 20px">评价时间：<?php echo date('Y-m-d H:i:s',$v['time']);?></span>
                            </div>
                            <div class="judgement">
                                <?php echo ($v["message"]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>

<!-- 尾部开始 -->
<!-- footer开始 -->

<!-- bottomNav开始 -->
<div class="bottomNav">
    <div class="bottomNavCont frm_sty">
        <div class="head">
            <ul class="clearfix">
                <li class="li1">行业权威推荐</li>
                <li class="li2">欧洲品牌授权</li>
                <li class="li3">银行战略合作</li>
                <li class="li4">7天无理由退货</li>
                <li class="li5">终身售后服务</li>
            </ul>
        </div>
        <div class="btm clearfix">
            <div class="left fl">
                <ul class="clearfix">
                    <li class="li_big">
                        <ul>新手
                            <li><a href="#">注册新会员</a></li>
                            <li><a href="#">如何订购</a></li>
                            <li><a href="#">正品保障</a></li>
                            <li><a href="#">常见问题</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>支付
                            <li><a href="#">支付方式</a></li>
                            <li><a href="#">分期付款</a></li>
                            <li><a href="#">支付问题</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>配送
                            <li><a href="#">配送方式</a></li>
                            <li><a href="#">包裹签收</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>保障
                            <li><a href="#">服务承诺</a></li>
                            <li><a href="#">价格保护</a></li>
                            <li><a href="#">售后政策</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>帮助
                            <li><a href="#">商务合作</a></li>
                            <li><a href="#">了解我们</a></li>
                            <li><a href="#">人才招聘</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right fr clearfix">
                <p><img src="/Public/Home/images/bottomNav_qrCode.png" alt="" /><br />微信服务号</p>
                <p><img src="/Public/Home/images/bottomNav_qrCode.png" alt="" /><br />商城客户端</p>
            </div>
        </div>
    </div>
</div>
<!-- bottomNav结束 -->
<!-- bottom开始 -->
<div class="bottom">
    <div class="bottomCont frm_sty">
        <p>Copyright © 2008-2016 vip.com，All Rights Reserved 豫ICP备08114786号 ICP经营许可证：豫B7-20090329 网络文化经营许可证：豫网文〔2016〕1601-110 </p>
        <p>使用本网站即表示接受可俪用户协议。版权所有 河南可俪化妆品有限责任公司</p>
        <img src="/Public/Home/images/index_bottom.jpg" alt="" />
    </div>
</div>
<!-- bottom结束 -->
<!-- footer结束 -->
<!-- 侧面导航开始 -->
<!-- 侧面导航开始 -->
<div class="rightNav">
    <ul>
        <li class="li1"><img src="/Public/Home/images/user.png"/>
            <ul>
                <li>
                    <h1><img src="/Public/Home/images/quxiao.png" alt="" /></h1>
                    <h2><img src="/Public/Home/images/nvhai.png"/></h2>
                    <b>您好！请
                        <?php if(($_SESSION['shang_home']['id']) > "0"): ?><a href="javascript:logout()">退出</a> &nbsp&nbsp&nbsp
                            <a href="<?php echo u('Member/memberinfo');?>">会员中心</a>
                            <?php else: ?>
                            <a href="<?php echo u('User/login');?>">登录 </a>
                            &nbsp;| &nbsp;<a href="<?php echo u('User/register');?>">注册</a><?php endif; ?>
                    </b>
                    <h5></h5>
                    <?php if(($_SESSION['shang_home']['id']) > "0"): ?><span class="span2"><a href="<?php echo u('Member/Order');?>">我的订单 </a></span>

                        <?php else: endif; ?>
                </li>
            </ul>

        </li>
        <h4><img src="/Public/Home/images/lineke.png"/></h4>

        <li class="li2">
            <a href="<?php echo U('Home/Mycar/mycar');?>">
                <h3>
                    <img src="/Public/Home/images/shop.png"/>
                </h3>
                <p>购物车</p>
                <h1><?php if(($_SESSION['shang_home']['num']) < "0"): ?>0<?php else: echo (session('num')); endif; ?></h1>
            </a>
        </li>
        <h5><img src="/Public/Home/images/lineke.png"/></h5>

        <li class="li4">
            <a href="javascript:collect(<?php echo (session('id')); ?>);">
                <img src="/Public/Home/images/heart.png"/>
                <p>我的收藏</p>
            </a>
        </li>
        <li class="li5">
            <a href="<?php echo U('Home/Index/myfoot');?>">
            <img src="/Public/Home/images/zuji.png"/>
            <p>我的足迹</p>
            </a>
        </li>
        <li class="li6">
            <p>
            </p>
        </li>
        <li class="li7">
            <p></p>
        </li>
        <li class="li8">
            <img src="/Public/Home/images/totop.png" class="toTop"/>
            <p>返回顶部</p>
        </li>
    </ul>
</div>
<!-- 侧面导航结束 -->
<script>
    function logout(){
        //询问框
        layer.confirm('您确定要退出当前账户?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Home/User/logout');?>",'',function(res){
                if(res.status=='ok'){
                    location.href="<?php echo U('Home/Index/index');?>";
                }
            });
        });
    }
    function collect(v){
        if(v){
            location.href="<?php echo u('Home/Member/collect');?>";
        }else{
            layer.alert('请先登录',{
                yes:function(){
                    location.href="<?php echo u('Home/User/login');?>";
            }})
        }
    }
</script>
<!-- 侧面导航结束 -->
<!-- 尾部结束 -->
</body>
<script type="text/javascript">
    function sc(){
        $.post("<?php echo U('Collect/add');?>",$('#form1').serialize(),function(res){
            if(res.status=='ok'){
                layer.msg(res.msg,{
                    icon: 1,
                    time: 1000
                },function(){
                    location.href="<?php echo U('Member/collect');?>";
                });
            }if(res.status=='login'){
                layer.msg(res.msg,{
                    icon: 7,
                    time: 1000
                },function(){
                    location.href="<?php echo U('User/login');?>";
                });

            }else{
                layer.msg(res.msg,{
                    icon: 2,
                    time: 1000
                });
            }
        });
    }
    $('#pic').mouseenter(function(){
        $('#collect').show();

    });
    $('#pic').mouseleave(function(){
        $('#collect').hide();

    })
    function jian(){
        var buynum=document.getElementById('buynum').value;
        if(buynum>1){
            document.getElementById('buynum').value=parseInt(buynum)-1;
        }
    }

    function jia(){
        var buynum=document.getElementById('buynum').value;
        if(buynum<199){
            document.getElementById('buynum').value=parseInt(buynum)+1;
        }
    }

    document.getElementById('buynum').onkeyup=function(){
        if(this.value<1){
            this.value=1;
        }
        if(this.value>199){
            this.value=199;
        }
        if(isNaN(this.value)){
            this.value=1;
        }
    };
    function buy(){
        $.post("<?php echo U('Order/buy');?>",$('#form1').serialize(),function(res){
            if(res.status=='ok'){
                layer.msg(res.msg,{
                    icon: 1,
                    time: 1000
                },function(){
                    location.href="<?php echo U('Home/Order/order');?>?oid="+res.oid;
                });
            }else if(res.status=='login'){
                layer.msg(res.msg,{
                    icon: 7,
                    time: 1000
                },function(){
                    location.href="<?php echo U('Home/User/login');?>"
                });
            }else{
                layer.msg(res.msg,{
                    icon: 2,
                    time: 1000
                });
            }
        });
    }
    function addtocar(){
        $.post("<?php echo U('Mycar/addtocar');?>",$('#form1').serialize(),function(res){
            if(res.status=='ok'){
                layer.msg(res.msg,{
                    icon: 1,
                    time: 1000
                },function(){
                    location.href="<?php echo U('Mycar/addtocar');?>?gid="+res.gid+'&buynum='+res.buynum;
                });
            }else{
                layer.msg(res.msg,{
                    icon: 2,
                    time: 1000
                });
            }
        });

    }
</script>
</html>