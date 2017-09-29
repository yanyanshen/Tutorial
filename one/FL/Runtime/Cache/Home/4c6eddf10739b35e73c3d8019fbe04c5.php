<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>订单处理</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="format-detection" content="telephone=no" />
    <meta name=""/>
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/shopping-mall-index.css" />
    <link rel="stylesheet" href="/Public/Home/css/tasp.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <link href="/Public/Home/css/orderconfirm.css" rel="stylesheet" />
    <script src="/Public/Home/js/jquery.js"></script>
    <script src="/Public/js/layer/layer.js"></script>

    <style>
        #page{width:auto;}
        #comm-header-inner,#content{width:950px;margin:auto;}
        #logo{padding-top:26px;padding-bottom:12px;}
        #header .wrap-box{margin-top:-67px;}
        #logo .logo{position:relative;overflow:hidden;display:inline-block;width:140px;height:35px;font-size:35px;line-height:35px;color:#f40;}
        #logo .logo .i{position:absolute;width:140px;height:35px;top:0;left:0;background:url(http://a.tbcdn.cn/tbsp/img/header/logo.png);}
    </style>
</head>
<body data-spm="1">

<!--top 开始-->
<div class="top">
    <div class="top-con w1200">
        <ul class="t-con-l f-l">
            <li><span><span style="font-weight:bold;color:red"><?php echo session('name')?session('name'):'';?></span><?php echo session('name')?'，':'您好，';?>欢迎来到丰林</span></li>
            <li><a href="<?php echo u('Custom/login');?>"><?php echo session('mid')?'':'请登陆';?></a></li>
            <li><a href="javascript:out();"><?php echo session('mid')?'退出':'';?></a></li>
            <li><a href="<?php echo u('Custom/register');?>">免费注册</a></li>
        </ul>
        <ul class="t-con-r f-r">
            <li><a href="<?php echo u('User/index');?>">我 (个人中心)</a></li>

            <li><a href="<?php echo u('User/order');?>">我的订单</a></li>
            <li class="erweima">
                <a href="#">扫描二维码</a>
                <div class="ewm-tu">
                    <a href="#"><img src="/Public/Home/images/erweima-tu.jpg" /></a>
                </div>
            </li>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
</div>

<!--logo search 开始-->
<div class="hd-info1 w1200">
    <div class="logo f-l">
        <h1><a href="<?php echo u('Index/index');?>" title="中林网站"><img src="/Public/images/logo.png" /></a></h1>
    </div>
    <div class="dianji f-r">
    </div>
    <div class="search f-r">
        <ul class="sp">
            <div style="clear:both;"></div>
        </ul>
        <div class="srh">
            <div class="ipt f-l">
                <form action="<?php echo U('Search/index');?>" method="get" id="classform">
                    <input type="text" placeholder="搜索商品..." ss-search-show="sp" name="prods" value="<?php echo ($dd); ?>"/>
                </form>
            </div>
            <button id="jk" class="f-r">搜 索</button>
            <div style="clear:both;"></div>
        </div>
        <ul class="sp2">
            <?php if(is_array($classProd)): $i = 0; $__LIST__ = array_slice($classProd,3,9,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valclass): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Search/index',array('class_name'=>$valclass['class_name']));?>"><?php echo ($valclass['class_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <div style="clear:both;"></div>
        </ul>
    </div>
    <div style="clear:both;"></div>
</div>

<!--订单创建-->
    <div id="page">

    <div id="content" class="grid-c">

        <div id="address" class="address" style="margin-top: 20px;" data-spm="2">

                <h3>确认收货地址
                     <span class="manage-address">
                     <!--<a href="<?php echo U('User/site');?>" class="J_MakePoint"  style="cursor:pointer;">管理收货地址</a>-->
                     <span onclick="toggleForm()" class="J_MakePoint"  style="cursor:pointer; color:#f00;">管理收货地址</span>
                     </span>
                </h3>
            <div class="management" style="display: none">
                <div class="tanchuang-con">
                    <div class="tc-title">
                        <h3>我的收货地址<font class="xinxi">请认真填写以下信息！</font></h3>
                    </div>

                    <form action="<?php echo u('User/site');?>" method="post" id="form1">
                        <ul class="tc-con2">
                            <li class="tc-li1" style="text-align:left">
                                    <select id="seachprov" name="seachprov" onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>&nbsp;&nbsp;
                                    <select id="seachcity" name="homecity" onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;
                                    <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict"></select></span>
                                    <input type="hidden" name="site" id="site"/>

                            </li>
                            <li class="tc-li1">
                                <p class="l-p">详细地址<span>*</span></p>
                                <textarea class="textarea1" placeholder="请如实填写您的详细信息，如街道名称、门牌号、楼层号和房间号。" name="site_content"></textarea>
                                <div style="clear:both;"></div>
                            </li>
                            <li class="tc-li1">
                                <p class="l-p">邮政编码<span></span></p>
                                <input type="text" id='zip' name="site_zip" />
                                <div style="clear:both;"></div>
                            </li>
                            <li class="tc-li1">
                                <p class="l-p">收货人姓名<span>*</span></p>
                                <input type="text" name="site_name"/>
                                <div style="clear:both;"></div>
                            </li>
                            <li class="tc-li1">
                                <p class="l-p">联系电话<span>*</span></p>
                                <input type="text" name="site_tel"/>
                                <div style="clear:both;"></div>
                            </li>
                        </ul>
                        <button class="btn-pst2" id="submit12">保存</button>
                    </form>
                </div>
            </div>


        </div>
        <form name="addrForm" id="addrForm" action="#"  >
            <ul id="address-list" class="address-list  sitee">
                <?php if(is_array($site)): $i = 0; $__LIST__ = $site;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="J_Addr J_MakePoint clearfix  J_DefaultAddr  <?php echo ($vo["site_m"]); ?>"  >
                        <div class="address-info">
                            <p class="p7" ><a href="#" id="kllk" onclick="setSite(<?php echo ($vo['site_id']); ?>)">设为默认地址</a></p>
                            <label for="kllk" class="user-address">
                                <?php echo ($vo["site_area"]); ?> ---- <?php echo ($vo["site_content"]); ?>----<?php echo ($vo["site_name"]); ?>收------电话：<?php echo ($vo["site_tel"]); ?>-----------邮编：<?php echo ($vo["site_zip"]); ?>
                            </label>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <ul id="J_MoreAddress" class="address-list hidden">

            </ul>

        </form>

            <div>
                <h3 class="dib">确认订单信息</h3>
                <div class="f-l pages">
                    <?php echo ($page); ?>
                </div>
                <table cellspacing="0" cellpadding="0" class="order-table" id="J_OrderTable" summary="统一下单订单信息区域">
                    <thead>
                    <tr>
                        <th class="s-title">店铺宝贝<hr/></th>
                        <th class="s-price">单价(元)<hr/></th>
                        <th class="s-amount">数量<hr/></th>
                        <th class="s-agio">优惠方式(元)<hr/></th>
                        <th class="s-total">小计(元)<hr/></th>
                    </tr>
                    </thead>



                    <tbody data-spm="3" class="J_Shop" data-tbcbid="0" data-outorderid="47285539868"  data-isb2c="false" data-postMode="2" data-sellerid="1704508670">
                    <tr class="first"><td colspan="5"></td></tr>
                    <tr class="shop blue-line">
                        <td colspan="3">
                            <span>用户名：<strong style="color:#f00"><?php echo session('name');?></strong></span>

                        </td>
                        <td colspan="2" class="promo">
                            <div>
                                <ul class="scrolling-promo-hint J_ScrollingPromoHint">
                                </ul>
                            </div>
                        </td>
                    </tr>



            <form action="<?php echo U('Order/orderc');?>" method="post" id="formm">
                    <?php if(is_array($cart)): $i = 0; $__LIST__ = $cart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="item" data-lineid="19614514619:31175333266:35612993875" data-pointRate="0">
                        <td class="s-title">
                            <a href="<?php echo u('Detail/index',array('prod_id'=>$vo['prod_id']));?>" target="_blank" title="<?php echo ($vo["prod_name"]); ?>" class="J_MakePoint">
                                <img src="/Uploads/Prod/<?php echo ($vo["prod_pic"]); ?>" class="itempic"><span class="title J_MakePoint"><?php echo ($vo["prod_name"]); ?></span></a>

                            <div class="props">
                                <span>品牌: <?php echo ($vo["prod_desc"]); ?> </span>
                                <span>产地: <?php echo ($vo["prod_area"]); ?> </span>
                                <span>报装:  <?php echo ($vo["prod_pack"]); ?> </span>
                                <span>重量:  <?php echo ($vo["prod_weight"]); ?> </span>

                            </div>
                            <a title="消费者保障服务，卖家承诺商品如实描述" href="#" target="_blank">
                                <img src="http://img03.taobaocdn.com/tps/i3/T1bnR4XEBhXXcQVo..-14-16.png"/>
                            </a>
                            <div>
                                <span style="color:gray;">卖家承诺72小时内发货</span>
                            </div>
                        </td>
                        <td class="s-price">
                          <span class='price '>
                         <em class="style-normal-small-black J_ItemPrice"  >¥<span class="single_price"><?php echo ($vo["prod_price"]); ?></span></em>
                          </span>
                        </td>
                        <td class="s-amount">
                            <!--<a href="javascript:jian(<?php echo ($i); ?>);" class="decrement" >-</a>&nbsp;-->
                            <input type="text" value="<?php echo ($vo["num"]); ?>"  class="num" id="buynum<?php echo ($i); ?>"  onkeyup="chgnum(this)" style="width:60px;" disabled/>&nbsp;
                            <input type="hidden" name="<?php echo ($i); ?>[]" value="<?php echo ($vo["num"]); ?>"/>
                            <input type="hidden" name="<?php echo ($i); ?>[]" value="<?php echo ($vo["prod_id"]); ?>"/>
                            <input type="hidden" name="<?php echo ($i); ?>[]" value="<?php echo ($vo["prod_price"]); ?>"/>
                            <!--<a href="javascript:jia(<?php echo ($i); ?>);" class="increment">+</a>-->
                        </td>
                        <td class="s-agio">
                            <div class="J_Promotion promotion">无优惠</div>
                        </td>
                        <td class="s-total">

                            <span class='price '>
                                <em class="style-normal-bold-red J_ItemTotal "  >¥ <span class="prices"><?php echo ($vo["prod_price"]); ?></span></em>

                             </span>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <input type="hidden" name="tot" id="tot" value=""/>

            </form>

                    <tr class="item-service">
                        <td colspan="5" class="servicearea" style="display: none"></td>

                    </tr>


                    <tr class="blue-line" style="height: 2px;"><td colspan="5"></td></tr>
                    <tr class="other other-line">
                        <td colspan="5">
                            <ul class="dib-wrap">
                                <li class="dib extra-info f-r">

                                    <div class="shoparea">
                                        <ul class="dib-wrap">
                                            <li class="dib title">店铺优惠：</li>
                                            <li class="dib sel"><div class="J_ShopPromo J_Promotion promotion clearfix"></div></li>
                                            <li class="dib fee">
                                                <span class='price '>
                                                <em class="style-normal-bold-black J_ShopPromo_Result"  >0.00</em>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="shoppointarea"></div>

                                    <div class="farearea">
                                        <ul class="dib-wrap J_farearea">
                                            <li class="dib title">运送方式：</li>
                                            <li class="dib sel" >
                                                <input type="hidden" name="1704508670:2|actualPaidFee" value="0" class="J_ActualPaidFee" />
                                                <input type="hidden" name="1704508670:2|codAllowMultiple" value="true"/>
                                                <input type="hidden" name="1704508670:2|codSellerFareFee" value="" class="J_CodSellerFareFee"/>
                                                <input type="hidden" name="1704508670:2|codServiceFeeRate" value="" class="J_CodServiceFeeRate"/>
                                                <input type="hidden" name="1704508670:2|codPostFee" value="0" class="J_CodPostFee"/>
                                                <select name="1704508670:2|post" class="J_Fare">
                                                    <option data-fare="1500" value=" 2 " data-codServiceType="2" data-level=""  selected="selected"  >
                                                        圆通快递 00.00元
                                                    </option>
                                                    <option data-fare="1500" value=" 2 " data-codServiceType="2" data-level=""  selected="selected"  >
                                                        快递 15.00元
                                                    </option>
                                                    <option data-fare="2500" value=" 7 " data-codServiceType="7" data-level=""  >
                                                        EMS 25.00元
                                                    </option>
                                                    <option data-fare="1500" value=" 1 " data-codServiceType="1" data-level=""  >
                                                        平邮 15.00元
                                                    </option>
                                                </select>

                                            </li>
                                            <li class="dib fee">  <span class='price '>
                                                    <em class="style-normal-bold-red J_FareSum"  >30.00</em>
                                                                    </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="extra-area">
                                        <ul class="dib-wrap">
                                            <li class="dib title">发货时间：</li>
                                            <li class="dib content">卖家承诺订单在买家付款后，72小时内<a href="#">发货</a></li>
                                        </ul>
                                    </div>

                                    <div class="servicearea" style="display: none"></div>
                                </li>
                            </ul>
                        </td>
                    </tr>

                    <tr class="shop-total blue-line">
                        <td colspan="5">店铺合计(不含运费)：
   <span class='price g_price '>
         <span>&yen;</span>
       <em class="style-middle-bold-red J_ShopTotal"  ><b id="totalprice" class="totalprice_a">888.88</b></em>
  </span>

                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5">

                            <div class="order-go" data-spm="4">
                                <?php if(is_array($sit)): $i = 0; $__LIST__ = array_slice($sit,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="J_AddressConfirm address-confirm">
                                    <div class="kd-popup pop-back" style="margin-bottom: 40px;">

                                        <div class="box">
                                            <div class="bd">
                                                <div class="point-in">

                                                    <em class="t">实付款：</em>  <span class='price g_price '>
                                                     <span>&yen;</span><em class="style-large-bold-red"  id="J_ActualFee"  ><span id="tablaa">630.00</span></em>
                                                      </span>
                                                </div>

                                                <ul >
                                                    <li><em>寄送至:</em><span id="J_AddrConfirm" style="word-break: break-all;">
                                                         <?php echo ($vo["site_area"]); ?> ---- <?php echo ($vo["site_content"]); ?>----<?php echo ($vo["site_name"]); ?>收------电话：<?php echo ($vo["site_tel"]); ?>-----------邮编：<?php echo ($vo["site_zip"]); ?>
                                                           </span></li>
                                                    <li><em>收货人:</em><span id="J_AddrNameConfirm"><?php echo ($vo["site_name"]); ?> <?php echo ($vo["site_tel"]); ?> </span></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a href="#"
                                           class="back J_MakePoint" target="_top"
                                          >返回购物车</a>

                                      <input type="button" class="btn-go" id="J_Go" value="提交订单"/>
                                    </div>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="J_confirmError confirm-error">
                                    <div class="msg J_shopPointError" style="display: none;"><p class="error">积分点数必须为大于0的整数</p></div>
                                </div>


                                <div class="msg" style="clear: both;">
                                    <p class="tips naked" style="float:right;padding-right: 0">若价格变动，请在提交订单后联系卖家改价，并查看已买到的宝贝</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <input type="hidden" id="J_useSelfCarry" name="useSelfCarry" value="false" />
            <input type="hidden" id="J_selfCarryStationId" name="selfCarryStationId" value="0" />
            <input type="hidden" id="J_useMDZT" name="useMDZT" value="false" />
            <input type="hidden" name="useNewSplit" value="true" />
            <input type="hidden" id="J_sellerIds" name="allSellIds" value="1704508670" />

    </div>

    <div id="footer"></div>
</div>
<?php echo ($s); ?>
<script>
    $("#J_Go").click(function () {

        layer.confirm('你确定提交订单吗？', {
            time: 0 //不自动关闭
            ,btn: ['确定', '我在想想']
            ,yes: function(index){
                document.getElementById('formm').submit();

            }
        });
    })


    function jian(n){
        var buynum=document.getElementById('buynum'+n).value;
        if(buynum>1){
            document.getElementById('buynum'+n).value=parseInt(buynum)-1;
        }
        getprices();
        gettotalprice();
    }
    function jia(n){
        var buynum=document.getElementById('buynum'+n).value;
        if(buynum<199){
            document.getElementById('buynum'+n).value=parseInt(buynum)+1;
        }
        getprices();
        gettotalprice();
    }

    function chgnum(v){
        if(v.value<1){
            v.value=1;
        }

        if(v.value>199){
            v.value=199;
        }

        if(isNaN(v.value)){
            v.value=1;
        }

        gettotalprice();
    }

    function getprices(){
        var nums=document.getElementsByClassName('num');
        var price=document.getElementsByClassName('single_price');
        var prices=document.getElementsByClassName('prices');
        for(var i=0;i<prices.length;i++){
            prices[i].innerHTML=(price[i].innerHTML*parseInt(nums[i].value)).toFixed(2);

        };
    }

    function gettotalprice(){
        getprices();

        var prices=document.getElementsByClassName('prices');
        var totalprice=0;
        for(var i=0;i<prices.length;i++){
                totalprice+=parseFloat(prices[i].innerHTML);
        };
        totalprice=totalprice.toFixed(2);
        document.getElementById('totalprice').innerHTML=totalprice;
        document.getElementById('tablaa').innerHTML=totalprice;
        document.getElementById('tot').value=totalprice;
    }

    gettotalprice();


</script>
</body>

<script type="text/javascript">
    function toggleForm(){
        if($(".management").css("display")=='none'){
//            $(".management").css({display:'block'});
            $(".management").show();
        }else{
//            $(".management").css({display:'none'});
            $(".management").hide();
        }
    }
</script>

<script type="text/javascript">
    $("#form1").submit(function(){
        $.post("<?php echo u('User/site');?>",$("#form1").serialize(),function(res){
            if(res){
                layer.alert(res);
            }else{
                location.reload();
            }
//                location.reload();
        })
        return false;
    })
</script>

<script type="text/javascript">
    function out(){
        $.post("<?php echo u('Custom/logout');?>",null,function(res){
            if(res.status=='ok'){
                location.reload();
            }
        })
    }
</script>

<script type="text/javascript">
    function setSite(id){
        var url="/Home/Order/index/site_id/"+id;
        $.get(url,null,function(){
            location.reload();
        })
    }
</script>
<script src="/Public/js/Area.js" type="text/javascript"></script>
<script src="/Public/js/AreaData_min.js" type="text/javascript"></script>

<script type="text/javascript">
    $('#jk').click(function(){
        $('#classform').submit();
    })
</script>
</html>