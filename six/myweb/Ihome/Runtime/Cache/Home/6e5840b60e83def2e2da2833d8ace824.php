<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>消息</title>
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Home/js/denglujs.js"></script>
    <link rel="stylesheet" href="/Public/Home/style/denglu.css" />
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
</head>
<body>

<!-- 内容开始 -->
<!--  顶部开始 --> 
<div class="top ">
    <div class="topCont frm_sty">
        <p><a href="#">欢迎光临苗家频道！</a></p>
        <ul class="fr">
            <li><a href="userinfo.html">叶叶</a></li>
            <li><a href="#">退出</a>|</li>
            <li><a href="member.html">会员中心</a>|</li>
            <li><a href="order.html">我的订单</a>|</li>
            <li><a href="#"><span>消息</span>[<span>1</span>]</a>|</li>
            <li class="l1"><a href="#">网站导航</a></li>
        </ul>
    </div>
</div>
    <!-- 导航搜索栏 -->
    <div class="search">
        <div class="searchCont frm_sty clearfix">
        <!-- 标志搜索栏开始 -->
            <h1 class="fl"><img src="/Public/Home/images/Ihomelogo.png" alt="" width=180px></h1>
            <div class="bd fl">
                <form action="<?php echo U('Home/Search/search');?>" method="get" id="searchform">
                    <input name="searchwords" type="text" class="msg"  value="" placeholder="家具">
                    <a href="javascript:document.getElementById('searchform').submit();" class="btn fl">搜索</a>
                </form>
                <p class="msg1">
                    <a href="#">干笋 |</a>
                    <a href="#">腊肉 |</a>
                    <a href="#">银耳环 |</a>
                    <a href="#">糯米糕</a>
                </p>
            </div>
            <div class="buy clearfix">
                <span class="fl">1</span>
                <a class="fl" href="../Cart/mycart.html">购物车</a>
                <!-- <p class="fl"></p> -->
            </div>
    </div>
    <div class="nav">
        <div class="navCont frm_sty">
            <div class="classify fl">
                <div class="fenlei">
                    <h2>全部商品分类</h2>
                    <img class="xiala" src="/Public/Home/images/xiala.png" alt="">
                </div>
                <div class="menu">
                    <div class="menu1">
                            <h4>苗家特产</h4>
                            <a href="#">干货</a>
                            <a href="#">药类</a>
                            <a href="#">肉类</a>
                            <a href="#">豆制品</a>
                            <div class="submenu">
                                <h4>苗家特产</h4>
                                <p>干货</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>

                                <p>药类</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>
                                
                                <p>肉类</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>
                                
                                <p>豆制品</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>
                                
                                <img src="/Public/Home/images/menu1.jpg" alt="">
                                <img src="/Public/Home/images/menu2.jpg" alt="">
                                <img src="/Public/Home/images/menu3.jpg" alt="">
                        </div>
                    </div>
                    <div class="menu1">
                        <h4>苗家工艺</h4>
                        <a href="#">银器</a>
                        <a href="#">刺绣</a>
                        <a href="#">工艺品</a>
                        <div class="submenu">
                                <h4>苗家工艺</h4>
                                <p>银器</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>

                                <p>刺绣</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>
                                
                                <p>工艺品</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>
                                
                                <img src="/Public/Home/images/menu1.jpg" alt="">
                                <img src="/Public/Home/images/menu2.jpg" alt="">
                                <img src="/Public/Home/images/menu3.jpg" alt="">
                            </div>
                    </div>
                    <div class="menu1">
                        <h4>茗茶佳酿</h4>
                        <a href="#">酒类</a>
                        <a href="#">茶类</a>
                        <div class="submenu">
                                <h4>茗茶佳酿</h4>
                                <p>酒类</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>

                                <p>茶类</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>
                                
                                <img src="/Public/Home/images/menu1.jpg" alt="">
                                <img src="/Public/Home/images/menu2.jpg" alt="">
                                <img src="/Public/Home/images/menu3.jpg" alt="">
                            </div>
                    </div>
                    <div class="menu1">
                        <h4>生鲜食品</h4>
                        <a href="#">肉类</a>
                        <a href="#">蔬菜</a>
                        <a href="#">蛋类</a>
                        <a href="#">水果</a>
                        <div class="submenu">
                            <h4>生鲜食品</h4>
                            <p>肉类</p>
                            <a href="#">风干腊肉</a>
                            <a href="#">农家土鸡蛋</a>
                            <a href="#">干香菇</a>
                            <a href="#">红薯粉丝</a>
                            <a href="#">鱼干</a>
                            <a href="#">黑木耳</a>

                            <p>蔬菜</p>
                            <a href="#">风干腊肉</a>
                            <a href="#">农家土鸡蛋</a>
                            <a href="#">干香菇</a>
                            <a href="#">红薯粉丝</a>
                            <a href="#">鱼干</a>
                            <a href="#">黑木耳</a>
                            
                            <p>蛋类</p>
                            <a href="#">风干腊肉</a>
                            <a href="#">农家土鸡蛋</a>
                            <a href="#">干香菇</a>
                            <a href="#">红薯粉丝</a>
                            <!-- <a href="#">鱼干</a>
                            <a href="#">黑木耳</a> -->
                            
                            <p>水果</p>
                            <a href="#">风干腊肉</a>
                            <a href="#">农家土鸡蛋</a>
                            <a href="#">干香菇</a>
                            <a href="#">红薯粉丝</a>
                            <a href="#">鱼干</a>
                            <a href="#">黑木耳</a>
                            
                            <img src="/Public/Home/images/menu1.jpg" alt="">
                            <img src="/Public/Home/images/menu2.jpg" alt="">
                            <img src="/Public/Home/images/menu3.jpg" alt="">
                        </div>
                        
                    </div>
                    <div class="menu1">
                        <h4>休闲零食</h4>
                        <a href="#">坚果类</a>
                        <a href="#">肉制品</a>
                        <a href="#">糖果</a>
                        <div class="submenu">
                                <h4>休闲零食</h4>
                                <p>坚果类</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>

                                <p>肉制品</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>
                                
                                <p>糖果</p>
                                <a href="#">风干腊肉</a>
                                <a href="#">农家土鸡蛋</a>
                                <a href="#">干香菇</a>
                                <a href="#">红薯粉丝</a>
                                <a href="#">鱼干</a>
                                <a href="#">黑木耳</a>
      
                                
                                <img src="/Public/Home/images/menu1.jpg" alt="">
                                <img src="/Public/Home/images/menu2.jpg" alt="">
                                <img src="/Public/Home/images/menu3.jpg" alt="">
                            </div>
                    </div>
                </div>
            </div>
            <ul class="topNav clearfix">
                <li><a href="../Index/index.html">首页</a></li>
                <li><a href="../Index/index.html">苗家特产</a></li>
                <li><a href="../Index/index.html">苗家工艺</a></li>
                <li><a href="../Index/index.html">茗茶佳酿</a></li>
                <li><a href="../Index/index.html">生鲜食品</a></li>
                <li><a href="../Index/index.html">休闲食品</a></li>
            </ul>
        </div>
     
    </div>
</div>

<div class="cont">
    <div class="cont_bg">
        <ul class="sidebar">
            <li class="touxiang"><img src="/Public/Home/images/touxiang.jpg"><a href="#"><p>叶叶</p></a>
            </li>
            <li class="quanbu"><a href="#">全部功能</a></li>
            <li><a href="member.html">会员中心</a></li>
            <li><a href="order.html">我的订单</a></li>
            <li><a href="#">我的优惠券</a></li>
            <li><a href="#">商品收藏</a></li>
            <li><a href="#">我的积分</a></li>
            <li><a href="returngood.html">退款维权</a></li>
            <li><a href="userinfo.html">个人信息</a></li>
            <li><a href="#">收货地址</a></li>
            <li class="kefu"><a href="#">在线客服</a></li>

        </ul>
    
     <!-- tab -->
    <div class="news">
        <ul class="clearfix">
            <li><a href="#">系统信息</a></li>
            <li><a href="#">系统通知</a></li>
        </ul>
        <div class="text">
            <h4>登录提醒<span class="fl">返回消息列表</span></h4>
            <p>         您的账号于2016年04月18日13:19:50登录，如非本人操作，请尽快修改登录密码。不建议在公共场所使用记住密码功能，<br/>  以防账号丢失，退出浏览器时记得清楚缓存，账号安全从小事做起。</p>
        </div>
       
   <div class="text02 clearfix">
         <table cellpadding="0" cellspacing="0" class="gwc_tb1">
        <tr>
          <td class="tb1_td1"><input id="Checkbox1" type="checkbox"  class="allselect"/>  </td>
          <td class="tb1_td2"><a href="#">全选</a></td>
          <td class="tb1_td3"><a href="#">删除</a></td>
          <td class="tb1_td4"><a href="#">标为已读</a></td>
        </tr>    
       </table> 


        <table cellpadding="0" cellspacing="0" class="gwc_tb2" >
        <tr>
          <td class="tb2_td1"><input id="Checkbox2" name="newslist" type="checkbox"  class="allselect"/></td>
          <td class="tb2_td2"><img src="/Public/Home/images/xin01.png"></td>
          <td class="tb2_td3">登录提醒</td>
          <td class="tb2_td4"><a href="#"><span>查看</span>|<span>删除</span></a></td> 
            
          </tr>

       <td class="tb2_td5">您的账号于2016年04月18日13:19:50登录，如非本人操作，请尽快修改登录密码</td>
      </table>

       <table cellpadding="0" cellspacing="0" class="gwc_tb2">
        <tr>
          <td class="tb2_td1"><input id="Checkbox3" name="newslist" type="checkbox"  class="allselect"/></td>
          <td class="tb2_td2"><img src="/Public/Home/images/xin01.png"></td>
          <td class="tb2_td3">登录提醒</td>
          <td class="tb2_td4"><a href="#"><span>查看</span>|<span>删除</span></a></td> 
            
          </tr>
       <td class="tb2_td5">您的账号于2016年04月18日13:19:50登录，如非本人操作，请尽快修改登录密码</td>
       </table>
       <table cellpadding="0" cellspacing="0" class="gwc_tb2" >
        <tr>
          <td class="tb2_td1"><input id="Checkbox4" type="checkbox" name="newslist"  class="allselect"/></td>
          <td class="tb2_td2"><img src="/Public/Home/images/xin01.png"></td>
          <td class="tb2_td3">登录提醒</td>
          <td class="tb2_td4"><a href="#"><span>查看</span>|<span>删除</span></a></td> 
            
          </tr>
       <td class="tb2_td5">您的账号于2016年04月18日13:19:50登录，如非本人操作，请尽快修改登录密码</td>
      </table>
       <table cellpadding="0" cellspacing="0" class="gwc_tb2">
        <tr>
          <td class="tb2_td1"><input id="Checkbox5" type="checkbox" name="newslist" class="allselect"/></td>
          <td class="tb2_td2"><img src="/Public/Home/images/xin02.png"></td>
          <td class="tb2_td3">登录提醒</td>
          <td class="tb2_td4"><a href="#"><span>查看</span>|<span>删除</span></a></td> 
            
          </tr>
       <td class="tb2_td5">您的账号于2016年04月18日13:19:50登录，如非本人操作，请尽快修改登录密码</td>
       </table>
       <table cellpadding="0" cellspacing="0" class="gwc_tb2">
        <tr>
          <td class="tb2_td1"><input id="Checkbox6" type="checkbox" name="newslist" class="allselect"/></td>
          <td class="tb2_td2"><img src="/Public/Home/images/xin02.png"></td>
          <td class="tb2_td3">登录提醒</td>
          <td class="tb2_td4"><a href="#"><span>查看</span>|<span>删除</span></a></td> 
            
          </tr>
       <td class="tb2_td5">您的账号于2016年04月18日13:19:50登录，如非本人操作，请尽快修改登录密码</td>
        </table>
       <table cellpadding="0" cellspacing="0" class="gwc_tb2">
        <tr>
          <td class="tb2_td1"><input id="Checkbox7" type="checkbox" name="newslist" class="allselect"/></td>
          <td class="tb2_td2"><img src="/Public/Home/images/xin02.png"></td>
          <td class="tb2_td3">登录提醒</td>
          <td class="tb2_td4"><a href="#"><span>查看</span>|<span>删除</span></a></td> 
            
          </tr>
       <td class="tb2_td5">您的账号于2016年04月18日13:19:50登录，如非本人操作，请尽快修改登录密码</td>
        </table>
       <table cellpadding="0" cellspacing="0" class="gwc_tb2">
        <tr>
          <td class="tb2_td1"><input id="Checkbox8" type="checkbox" name="newslist" class="allselect"/></td>
          <td class="tb2_td2"><img src="/Public/Home/images/xin02.png"></td>
          <td class="tb2_td3">登录提醒</td>
          <td class="tb2_td4"><a href="#"><span>查看</span>|<span>删除</span></a></td> 
            
          </tr>
       <td class="tb2_td5">您的账号于2016年04月18日13:19:50登录，如非本人操作，请尽快修改登录密码</td>
      </table>
       <table cellpadding="0" cellspacing="0" class="gwc_tb2">
        <tr>
          <td class="tb2_td1"><input id="Checkbox9" type="checkbox" name="newslist" class="allselect"/></td>
          <td class="tb2_td2"><img src="/Public/Home/images/xin02.png"></td>
          <td class="tb2_td3">登录提醒</td>
          <td class="tb2_td4"><a href="#"><span>查看</span>|<span>删除</span></a></td> 
            
          </tr>
       <td class="tb2_td5">您的账号于2016年04月18日13:19:50登录，如非本人操作，请尽快修改登录密码</td>
          
        
       </table>
       
 </div>

        
</div>
</div>
</div>

  

<div class="btn clearfix">
     <ul class="ul1 fl">
        <li class="l1"><a href="#"><下一页</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">...</a></li>
        <li class="l1"><a href="#">下一页></a></li>
     </ul>
      <ul class="ul2 fr">
        <li class="l2"><a href="#">共&nbsp;6&nbsp;页</a></li>
        <li class="l2"><a href="#">到第<input id="text_box1" name="" type="text" value="1" style=" width:25px; text-align:center; border:1px solid #d2d2d2;margin:0 3px;" />页</a></li>
        <li class="l1"><a href="#">确定</a></li>
     </ul>
 </div>  

<!-- 底部开始 -->
<div class="footer">
    <div class="footer_cont frm_sty">
        <div class="service">
            <ul>
                <li class="ser1">
                    <span></span>
                    <h4><a href="#">正品保证</a></h4>
                    <p>正品保障，提供发票</p>
                </li>
                <li class="ser2">
                    <span></span>
                    <h4><a href="#">急速物流</a></h4>
                    <p>急速物流，急速送达</p>
                </li>
                <li class="ser3">
                    <span></span>
                    <h4><a href="#">无忧售后</a></h4>
                    <p>7天无理由退换货</p>
                </li>
                <li class="ser4">
                    <span></span>
                    <h4><a href="#">帮助中心</a></h4>
                    <p>您的购物指南</p>
                </li>
            </ul>
        </div>
        <div class="guild clearfix">
            <ul class="guild01 clearfix">
                <li class="strong"><a href="#">购物指南</a></li>
                <li><a href="#">导购指标</a></li>
                <li><a href="#">免费注册</a></li>
                <li><a href="#">会员等级</a></li>
                <li><a href="#">常见问题</a></li>
                <li><a href="#">品牌大全</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">支付方式</a></li>
                <li><a href="#">易付定支会付</a></li>
                <li><a href="#">网银注册</a></li>
                <li><a href="#">快捷支付</a></li>
                <li><a href="#">分期付款</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">物流配送</a></li>
                <li><a href="#">免运费政策</a></li>
                <li><a href="#">配送服务承诺</a></li>
                <li><a href="#">签收验货</a></li>
                <li><a href="#">物流查询</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">售后服务</a></li>
                <li><a href="#">退换货政策</a></li>
                <li><a href="#">退换货流程</a></li>
                <li><a href="#">退款说明</a></li>
                <li><a href="#">退换货申请</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">商家服务</a></li>
                <li><a href="#">商家入驻</a></li>
                <li><a href="#">培训中心</a></li>
                <li><a href="#">信息公告</a></li>
                <li><a href="#">广告服务</a></li>
                <li><a href="#">商家帮助</a></li>
                <li><a href="#">服务市场</a></li>
            </ul>
            <div class="weixin fr">
                <p>苗家频道客户端</p>
                <img src="/Public/Home/images/erweima.jpg">
            </div>
            
        </div>
    </div>
    <div class="footer_b">
        <p>Copyright @ 2016-2028 苗家频道有限公司版权所有 桂ICP备10101010号-201600001</p>
        
    </div>
</div>
    
</body>
</html>