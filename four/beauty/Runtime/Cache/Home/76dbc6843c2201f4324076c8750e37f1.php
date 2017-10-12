<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/fonts/iconfont.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/css/reset.css" />
    <link rel="stylesheet" href="/Public/Home/css/shoppingCart.css" />
    <link rel="stylesheet" href="/Public/Home/css/headerAndFooter.css" />
    <script src="/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
    <!--<script src="/Public/Home/js/lrtk.js" type="text/javascript"></script>-->
    <script src="/Public/Home/js/shoppingCart.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
    <title>beauty</title>
</head>
<script type="text/javascript">
    $(document).ready(function () {
    });

    $(function() {
        $('#OUT').click(function () {
            $.post("<?php echo U('Home/Login/LoginOut');?>", '', function (res) {
                if (res.status == 1) {
                    layer.open({
                        content: res.info,
                        icon: 1,
                        yes: function () {
                            location.href = "<?php echo U('Home/index/index');?>";
                        }
                    })
                } else {
                    layer.open({
                        content: res.info,
                        icon: 2,
                        title: '错误提示'
                    });
                }
            }, 'json')
        });
    })



</script>
<body>
<!--顶部图层-->
<div id="header_top">
    <div id="top">
            <div class="Inside_pages">
                <div class="Collection">您好，欢迎光临<?php echo session('mname')?session('mname'):'';?>！<a id="OUT"  style="color: #ff0000; cursor: pointer"><?php echo session('mname')?'退出':'';?></a>
                </div>
                <div class="hd_top_manu clearfix">
                    <ul class="clearfix">
                        <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                            欢迎光临本店！
                            <a href="<?php echo U('Home/Login/Login');?>" class="red">
                                <?php echo session('mname')? '':'[请登录]';?>
                            </a>
                            <?php echo session('mname')? '':'新用户';?>
                            <a href="<?php echo U('Home/Register/Register');?>" class="red">
                                <?php echo session('mname')?'':'[免费注册]';?>
                            </a>
                        </li>
                        <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Index/index');?>">我的首页</a></li>
                        <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Member/Orderform');?>">我的订单</a></li>
                        <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Home/MyCart/tocart');?>">购物车</a> </li>
                        <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover">
                            <a href="#" class="hd_menu">网站导航</a>
                            <div class="hd_menu_list">
                                <ul>
                                    <li><a href="<?php echo U('Home/Footprint/footprint');?>">足迹</a></li>
                                    <li><a href="<?php echo U('Home/Feedback/index');?>">反馈</a></li>
                                    <li><a href="<?php echo U('Home/Member/index');?>">用户中心</a></li>
                                    <li><a href="<?php echo U('Home/Member/showCollect');?>">我的收藏</a></li>

                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
    <!--样式-->
    <!--顶部样式2-->

    <!--购物车开始-->
    <!-- 导航开始 -->
    <div class="nav clearfix frm_sty">
        <div class="topNav frm_sty clearfix">
            <div class="Process"><img src="/Public/Home/images/Process_img_01.png" /></div>

        </div>
    </div>
    <!-- 导航结束 -->
    <!-- 分割线 -->
    <div class="fenge" style="background-color: red;margin-top: 0;">
    </div>
    <!-- 分割线 -->
    <!-- 购物车 -->
    <div class="shop frm_sty">
        <table cellpadding="0" cellspacing="0" class="gwc_tb1">
            <tr>
                <td class="tb1_td1" style="width: 50px;">全选</td>
                <td class="tb1_td3"  style="width: 270px;">商品</td>
                <td class="tb1_td4"  style="width: 90px;">属性</td>
                <td class="tb1_td4" style="width: 90px;">积分</td>
                <td class="tb1_td4" style="width: 90px;">单价</td>
                <td class="tb1_td5" style="width: 90px;">数量</td>
                <td class="tb1_td6"  style="width: 100px;">总价</td>
                <td class="tb1_td7" style="width: 100px;">操作</td>
            </tr>
        </table>
        <form action="<?php echo U('MyCart/cartbuy');?>" method="post" id="topay">
        <?php if(is_array($cartlist)): $i = 0; $__LIST__ = $cartlist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><table cellpadding="0" cellspacing="0" class="gwc_tb2">
            <tr>
                <td class="tb2_td1" style="width:50px;">
                    <input type="checkbox" value="<?php echo ($v['gid']); ?>" name="goods[<?php echo ($v['gid']); echo ($v["ml"]); ?>]" man=<?php echo ($v['rules'][0][0]); ?>" jian="<?php echo ($v['rules'][0][1]); ?>" />

                </td>
                <td class="tb2_td2" style="width: 120px;"><a href="#">
                    <img src="/Uploads/<?php echo ($v["imageurl"]); ?>100_<?php echo ($v["imagename"]); ?>"/></a>
                </td>
                <td class="tb2_td3"  style="width: 120px;">
                    <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$v['gid']));?>"><?php echo ($v["goodsname"]); ?></a>
                </td>
                <td class="tb1_td4"  style="width: 90px;"><input type="text" name="ml[<?php echo ($v['gid']); echo ($v["ml"]); ?>]" value="<?php echo ($v["ml"]); ?>ml" style="width: 80px;text-align: center;"/></td>
                <span style="position: absolute;right: 510px;color: red;width: 100px;height: 30px;margin-top: 10px;">
                    <?php echo ($v[0]['rules']); ?>
                </span>
                <td class="tb1_td4" style="width: 90px;"><?php echo ($v["score"]); ?>R</td>
                <td class="tb1_td4" style="width: 90px;"><?php echo ($v["saleprice"]); ?></td>
                <td class="tb1_td5" style="width: 90px;">
                    <input name=""  style=" width:20px; height:18px;border:1px solid #ccc;" type="button" value="-" />
                    <input name="buynum[<?php echo ($v['gid']); echo ($v["ml"]); ?>]" type="text" value="<?php echo ($v["buynum"]); ?>" class="buynum" style=" width:30px; text-align:center; border:1px solid #ccc;" />
                    <input style=" width:20px; height:18px;border:1px solid #ccc;" type="button" man=<?php echo ($v['rules'][0][0]); ?>" jian="<?php echo ($v['rules'][0][1]); ?>" value="+" />
                    <input type="hidden" value="<?php echo ($v["saleprice"]); ?>"/>
                </td>
                <td class="tb1_td6"   style="width: 100px;">
                    <label class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;">
                        <input type="text" readonly class="sumprice" name="sumprice[<?php echo ($v['gid']); echo ($v["ml"]); ?>]" value="<?php echo ($v["sumprice"]); ?>" style="width: 80px;text-align: center;"/></label>
                </td>
                    <td class="tb1_td7" style="width: 100px;"><a href="javascript:;" cid="<?php echo ($v["id"]); ?>" class="tocartdelete">删除 </a></td>
            </tr>
        </table><?php endforeach; endif; else: echo "$empty" ;endif; ?>


        <table cellpadding="0" cellspacing="0" class="gwc_tb3">
            <tr>
                <td class="tb1_td1"><input id="checkAll" class="allselect" type="checkbox" /></td>
                <td class="tb1_td1">全选</td>
                <td class="tb3_td1">
                    <input type="hidden" value="<?php echo (session('mid')); ?>"/>
                    <a href="" class="alldelete">全部删除</a>
                </td>
                <td class="tb3_td2">已选商品 <label id="shuliang" style="color:#ff5500;font-size:14px; font-weight:bold;">0</label> 件</td>
                <input type="hidden" name="mid" value="<?php echo (session('mid')); ?>"/>
                <td class="tb3_td3">合计(不含运费):<span>￥</span> <span style=" color:#ff5500;"><label id="zong1" style="">
                    <input type="text" readonly name="zong" value="0"/></label>  </span> </td>
                <td class="tb3_td4" style="width: 75px;height: 30px;border: 1px solid #0000ff;background-color: red;font-weight: bold;cursor: pointer">
                    <a href="<?php echo U('Home/Index/index');?>" style="color: #ffffff;">继续购物</a>
                </td>
                <td id="cartbuy" class="tb3_td4" style="background-color: red;width: 75px;height: 30px;color: #ffffff;border: 1px solid black;cursor: pointer">
                    <input type="submit" id="tocartbuy" value="去结算" style="border: none;background-color: red;cursor: pointer;color: white;"/>
                </td>
            </tr>
        </table>

        </form>

    </div>
    <script type="text/javascript">
        $(function(){
           $('.alldelete').click(function(){
               sibl=$(this).parents('.gwc_tb3');
                if($('.allselect:checked').val()){
                    $.post('<?php echo U("Home/MyCart/alldelete");?>',function(response){
                        if(response.status){
                            layer.msg('删除成功',{time:800},function(){
                                sibl.siblings('.gwc_tb2').hidden();
                            });
                        }else{
                            layer.msg('请稍后再试');
                        }
                    })
                }else{
                    layer.msg('请选中所有的商品');
                }
           })
        })
    </script>
    <script type="text/javascript">
        $('#topay').submit(function(){
            check=$('input:checked').val();
            if(!check){
                layer.msg('您还没有选择要结算的商品哦',{time:600,icon:1});
                return false;
            }
        })

    </script>

    <!-- 购物车结束 -->
    <!-- 浏览开始 -->
    <script type="text/javascript">
        $(function(){
            $('.tocartdelete').click(function(){
                //得到购物车中商品的id
                a=$(this);
                id=$(this).attr('cid');
                $.post('<?php echo U("Home/MyCart/tocartdelete");?>',{cid:id},function(resp){
                    if(resp.status==1){
                        layer.msg(resp.info,{time:500},function(){
                            a.parents('table').hide();
                        });
                    }else{
                        layer.msg(resp.info,{time:500});
                    }
                })
            })
        })

    </script>
    <!-- table结束 -->
    <div class="table frm_sty clearfix">
        <ul class="clearfix ul1">
            <li><a href="#">最近查看过</a></li>
        </ul>
        <div class="tu3">
            <ul class="ul2 clearfix">
                <?php if(is_array($goodsinfo)): $i = 0; $__LIST__ = $goodsinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                    <img src="/Uploads/<?php echo ($v["imageurl"]); echo ($v["imagename"]); ?>" alt="" />
                    <h2><a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$v['gid']));?>"><?php echo ($v["goodsname"]); ?></a></h2>
                    <h3>￥<?php echo ($v["saleprice"]); ?></h3>
                    <h4><a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$v['gid']));?>" style="color: white;text-decoration: none;">查看</a></h4>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>

<!--购物车结束-->
<!--底部图层-->

    <div class="phone_style">
    <div class="index_style">
        <span class="phone_number"><em class="iconfont icon-dianhua"></em>400-4565-345</span><span class="phone_title">客服热线 7X24小时 贴心服务</span>
    </div>
</div>
<div class="footerbox clearfix">
    <div class="clearfix">
        <div class="">
            <?php if(is_array($footer)): $i = 0; $__LIST__ = $footer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><dl>
                <dt><?php echo ($data["fname"]); ?></dt>
                <?php if(is_array($data["child"])): $i = 0; $__LIST__ = $data["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Home/Index/news',array('id'=>$v['id']));?>" target="_blank"><?php echo ($v["fname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div class="text_link">
        <p>
            <a href="#">关于我们</a>｜ <a href="#">公开信息披露</a>｜ <a href="#">加入我们</a>｜ <a href="#">联系我们</a>｜ <a href="#">版权声明</a>｜ <a href="#">隐私声明</a>｜ <a href="#">网站地图</a></p>
        <p>蜀ICP备11017033号 Copyright ©2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
    </div>
</div>
</div>
</body>
</html>
<!--右侧菜单栏购物车样式-->
<script type="text/javascript">
    function checkLength(which) {
        var maxChars = 50; //
        if(which.value.length > maxChars){
            alert("您出入的字数超多限制!");
            // 超过限制的字数了就将 文本框中的内容按规定的字数 截取
            which.value = which.value.substring(0,maxChars);
            return false;
        }else{
            var curr = maxChars - which.value.length; //250 减去 当前输入的
            document.getElementById("sy").innerHTML = curr.toString();
            return true;
        }
    }
</script>