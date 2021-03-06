<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>商品详情</title>
<meta name="Keywords" content="">
<meta name="Description" content="">
<!-- 移动设备支持 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link href="/Public/Mobile/goodsdetail/css/mall.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/Public/Mobile/goodsdetail/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/Public/Mobile/goodsdetail/js/jquery.Spinner.js"></script>
    <script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <style>
        #layercart ul{text-align: center;}
        #layercart ul li:first-child{font-weight: bold;font-size: 14px;margin: 0 auto;}
        #layercart ul li a{display: inline-block;background-color: red;width: 50%;height: 20px;
            margin: 0 5px;line-height: 20px;color: white;font-size: 14px;padding: 3px;border-radius: 3px;}
        .layui-m-anim-up{height: 120px;}

        #form3 dl div{margin: 10px 0;width: 100%;}
        #form3 dl div input{width: 70%;height: 30px;}
        #form3 dl .div4 input{width: 100px;margin: 0 10px;}
        #form3 dl .div6 dd{float: left;margin: 0 5px;width: 30%;text-align: center;}
        #form3 dl dd label.error{font-size: 12px;font-weight: bold;color: red;display:block;text-align: center;}
        #form3 dl dd label.ok{display:block; color:green;text-align: center;}
    </style>
</head>

<body class="body_color">
<form action="" id="goods" method="post">
<?php if(is_array($goodslist)): $i = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?><div class="mall_main">
    <div id="child_header">
        <div class="goback"><a href="javascript:history.back(-1)"><i></i></a></div>
        <div class="current_location"><span>商品详情</span></div>
    </div>
    <form action="<?php echo U('Mobile/Goods/goodsdetail');?>" method="post">
	<div id="banner_box" class="box_swipe">
		<ul>
            <?php if(is_array($zhuimg)): $i = 0; $__LIST__ = $zhuimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zhu): $mod = ($i % 2 );++$i;?><li><img src="/Uploads/<?php echo ($zhu["imageurl"]); echo ($zhu["imagename"]); ?>"></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php if(is_array($fuimg)): $i = 0; $__LIST__ = $fuimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fu): $mod = ($i % 2 );++$i;?><li><img src="/Uploads/<?php echo ($fu["picurl"]); echo ($fu["picname"]); ?>"></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<ol>
			<li class="on"></li>&nbsp;
			<li></li>&nbsp;
			<li></li>&nbsp;
			<li></li>&nbsp;
		</ol>
	</div>
<!--点赞的异步-->
    <a class="praise_icon" href="javascript:;"><?php echo ($gcount); ?></a>
        <script type="text/javascript">
            $(function(){
                $('.praise_icon').click(function(){
                    var gid=$('input[name="gid"]').val();
                    $.post('<?php echo U("Mobile/Goods/goodscount");?>',{gid:gid},function(res){
                        if(res.status==1){
                            $('.praise_icon').text(parseInt(res.info));
                        }else{
                            if(res.info=='1'){
                                layer.open({
                                    content: '<div style="position: relative;top:40px">一天只能赞3次哦</div>'
                                    ,skin: 'msg'
                                    ,time: 2 //2秒后自动关闭
                                });
                            }
                            if(res.info=='2'){
                                layer.open({
                                    content: '<div style="position: relative;top:40px">登录之后才能点赞哦</div>'
                                    ,skin: 'msg'
                                    ,time: 2//2秒后自动关闭
                                    ,style:'line-heght:100px;'
                                });
                            }
                        }
                    })
                })
            })
        </script>

            <input type="hidden" name="gid" value="<?php echo ($goods["id"]); ?>"/>
    <div class="des_goods">
        <p style="border: 1px solid white;"><?php echo (mb_substr($goods["goodsname"],0,20,utf8)); ?><a href="<?php echo U('Mobile/Goods/countpaihang');?>" style="color: red;font-weight: bold;float: right;">点赞排行</a></p>
        <p><span class="sp_style1"><?php echo (mb_substr($goods["goodsname"],0,10,utf8)); ?></span><em class="em_integral">积分：<?php echo ($goods["score"]); ?></em></p>
        <p>
            <span class="pr">原价</span>
            <span class="sp_style2">¥<?php echo ($goods["marketprice"]); ?></span>
        </p>
        <p>
            <span class="pr">本店价格</span><span class="sp_style3" style="color: red;">
            ¥<input type="text" value="<?php echo ($goods["saleprice"]); ?>" readonly style="color: red;border: none;"/>
            </span>
        </p>
        <div class="jiathis_style_m" style="display: inline-block;border: 1px solid white;"></div>
        <script type="text/javascript" src="/Public/Mobile/js/jiathis_m.js" charset="utf-8"></script>
        <p><span class="pr">服务</span><span>由微分销销售和发货并提供售后服务</span></p>
        <hr/>
        <div class="spec_select">
            <div class="title">
                <a href="javascript:goodslayer();" class="dblock">商品属性<i style="float: right;">&gt;</i></a>
            </div>
            <hr style="width: 100%;"/>
            <div class="title">
                <a href="<?php echo U('Mobile/Goods/imgdetail',array('gid'=>$goods['id']));?>" class="dblock">图文详情<i style="float: right;">&gt;</i></a>
            </div>
        </div>
        <hr/>
        <div class="goods_activity">
             <span class="pr">备注:</span>
            <input type="hidden" value="<?php echo ($uservip); ?>" name="uservip"/>
            <?php if(is_array($ruleslist)): $i = 0; $__LIST__ = $ruleslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rules): $mod = ($i % 2 );++$i;?><a href=""><span class="sp_style3" style="color: red;"><?php echo ($rules["rules"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
            <span style="margin-left: 20px;">月销量：<?php echo ($goods["salenum"]); ?>件</span>
            <div style="height: 10px;width: 100%;background-color: lightgray"></div>
            <p><span class="pr">服务承诺</span><span>7天无理由退货 正品保证</span></p>
            <div style="height: 10px;width: 100%;background-color: lightgray"></div>
            <div style="width: 100%;height: 150px;">
                <div style="margin-top: 10px;">宝贝评价<span>(<?php echo ($totalcount1); ?>)</span></div>
                <div class="goods_box">
                    <div class="commentcontent" id="allreview">
                        <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                            <?php if(is_array($commresponlist1)): $i = 0; $__LIST__ = $commresponlist1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment1): $mod = ($i % 2 );++$i;?><tr valign="top">
                                    <td width="160"><img src="/UserImg/photo<?php echo ($comment1["imgpath"]); echo ($comment1["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($comment1["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
                                    <td width="180">
                                        型号：<font color="#999999"><?php echo ($comment1["ml"]); ?>ml</font>
                                        <br /><font color="orange"><?php echo ($comment1["costatus"]); ?></font>
                                    </td>
                                    <td>
                                        <?php echo ($comment1["content"]); ?><br />
                                        <?php if($comment1["imageurl"] != ''&&$comment1["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($comment1["imageurl"]); echo ($comment1["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                                            <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$comment1['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                                        <font color="#999999"><?php echo (date('Y-m-d',$comment1["coaddtime"])); ?></font>
                                    </td>
                                    <td>
                                        <?php if($comment1["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($comment1["response"]); ?><br />
                                            <font color="#999999"><?php echo (date('Y-m-d',$comment1["readdtime"])); ?></font><?php endif; ?>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </div>
                    <span style="text-align: center;margin: 0 auto;display: block;"><a href="<?php echo U('Mobile/Goods/allcomment',array('gid'=>$goods['id']));?>" style="border:1px solid red;color: red;display: inline-block;width: 150px;height: 35px;border-radius: 5px;line-height: 35px;text-align: center; ">查看全部评价</a></span>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script type="text/javascript">
        //点击属性的时候的弹框
        function goodslayer() {
            layer.open({
                type: 1
                ,content:'<div>'+
                '<?php if(is_array($goodslist)): $i = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?>'+
            '<div style="width: 100%;height: 100px;">'+
            '<div style="float: left;margin-right: 35px;"><img src="/Uploads/<?php echo ($goods["imageurl"]); ?>100_<?php echo ($goods["imagename"]); ?>" alt=""/></div>'+
            '<div style="float:left;width: 180px;margin-top: 15px;text-align: center;">'+
            '<span style="color: red;width: 100%;display: inline-block;text-align: center;" class="price">'+
              '<del style="color: #CCCCCC;">'+
              '<span>本店价格：</span>'+
            '¥ <input type="text" value="<?php echo ($goods["saleprice"]); ?>" class="memprice" readonly style="color: #CCCCCC;border:none;width:25%;"/>'+
            '</del><br/>'+
                '<span>黄金会员价：</span>'+
                '¥ <input type="text" value="<?php echo ($goods["saleprice1"]); ?>" class="saleprice" readonly style="color: red;border:none;width:25%;"/>'+
            '</span><br/>'+
            '<span style="margin: 40px 0;">库存<?php echo ($goods["num"]); ?>件</span><br/>'+
            '<span>请选择商品类别</span>'+
            '</div>'+
            '</div>'+
                '<?php endforeach; endif; else: echo "" ;endif; ?>'+
            '<div style="margin-top: 20px;">'+
            '<div class="spec_select" style="border: 1px solid white;">'+
            '<ul>'+
            '<li class="liguige">'+
                '<span>商品规格:</span>'+
            '<?php if(is_array($typelist)): $i = 0; $__LIST__ = $typelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>'+
            '<em class="<?php echo ($key?"":"click"); ?>" style="width: 50px;margin: 0 5px;text-align: center;cursor: pointer;"><?php echo ($type["ml"]); ?>ml</em>'+
            '<?php endforeach; endif; else: echo "" ;endif; ?>'+
            '<input type="hidden" name="xinghao" id="xinghao" value="<?php echo ($typelist[0]["ml"]); ?>ml"/>'+
            '</li>'+
            '</ul>'+
            '</div>'+
            '</div>'+
            '<div style="margin-top: 16px;">'+
            '<span style="margin-left: 10px;">购买数量</span>'+
            '<div class="num" style="display: inline-block;float: right;">'+
            '<input type="button" value="-" onclick="jian1();" class="n_btn_1"/>'+
                '<input type="text" value="1" id="combuynum" name="combuynum" class="n_ipt"  readonly style="width: 20px;text-align: center;"/>'+
            '<input type="button" value="+" onclick="jia1();" class="n_btn_2"/>'+
            '</div>'+
            '</div>'+
            '<div>'+
            '<a href="javascript:addcartlayer();" style="display:inline-block;cursor:pointer;background-color: orangered;margin-bottom: 0;width: 50%;color:white;height: 30px;float: left;margin-top: 22px;text-align: center;line-height: 30px;">加入购物车</a>'+
            '<a href="javascript:tobuylayer();" style="display:inline-block;cursor:pointer;background-color: red;margin-bottom: 0;width: 50%;color:white;height: 30px;float: right;margin-top: 22px;text-align: center;line-height: 30px;">立即购买</a>'+
            '</div>'+
            '</div>'+';'
            ,anim: 'up'
            ,style: 'position:fixed; bottom:0; left:0; width: 100%; height: 250px; padding: 0;margin:0; border:none;'
            });
        }

    </script>
    <div class="bottomdiv clearfix">
        <div class="inner clearfix">
            <div class="fl btn_sure">
                <a href="javascript:tobuylayer();" class="tobuy">立即购买</a>
            </div>
            <input type="hidden" name="mid" value="<?php echo (session('mid')); ?>"/>
            <div class="fl btn_buy_detail">
                <a class="addshop_cat" href="javascript:addcartlayer();">加入购物车</a>
            </div>
        </div>

    </div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</form>
<script type="text/javascript" src="/Public/Mobile/js/jquery.validate.min.js"></script>
<script type="text/javascript">
  function tobuylayer() {
      mid = $('input[name="mid"]').val();
      uservip=$('input[name="uservip"]').val();
      layer.open({
          type: 1
          , content: '<div>' +
          '<form action="<?php echo U('Mobile/Order/tobuy');?>" method="post" id="tobuy">' +
      '<?php if(is_array($goodslist)): $i = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?>' +
      '<input type="hidden" name="gid" value="<?php echo ($goods["id"]); ?>"/>' +
      '<div style="width: 100%;height: 100px;">' +
      '<div style="float: left;margin-right: 35px;"><img src="/Uploads/<?php echo ($goods["imageurl"]); ?>100_<?php echo ($goods["imagename"]); ?>" alt=""/></div>' +
      '<div style="float:left;width: 180px;margin-top: 15px;text-align: center;">' +
      '<span style="color: red;width: 100%;display: inline-block;text-align: center;"  class="price">' +
      '<del style="color: #CCCCCC;">'+
      '<span>本店价格：</span>'+
      '¥ <input type="text" value="<?php echo ($goods["saleprice"]); ?>" class="memprice" readonly style="color: #CCCCCC;border:none;width:25%;"/>'+
      '</del><br/>'+
      '<span>黄金会员价：</span>'+
      '¥ <input type="text" value="<?php echo ($goods["saleprice1"]); ?>" name="price" class="saleprice" readonly style="color: red;border:none;width:25%;"/>'+
      '</span><br/>' +
      '<span style="margin: 40px 0;">库存<?php echo ($goods["num"]); ?>件</span><br/>' +
      '<span>请选择商品类别</span>' +
      '</div>' +
      '</div>' +
      '<?php endforeach; endif; else: echo "" ;endif; ?>' +
      '<div style="margin-top: 20px;">' +
      '<div class="spec_select" style="border: 1px solid white;">' +
      '<ul>' +
      '<li class="liguige">' +
      '<span>商品规格:</span>' +
      '<?php if(is_array($typelist)): $i = 0; $__LIST__ = $typelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>' +
      '<em class="<?php echo ($key?"":"click"); ?>" style="width: 50px;margin: 0 5px;text-align: center;cursor: pointer;"><?php echo ($type["ml"]); ?>ml</em>' +
      '<?php endforeach; endif; else: echo "" ;endif; ?>' +
      '<input type="hidden" name="xinghao" value="<?php echo ($typelist[0]["ml"]); ?>ml"/>' +
      '</li>' +
      '</ul>' +
      '</div>' +
      '</div>' +
      '<div style="margin-top: 16px;">' +
      '<span style="margin-left: 10px;">购买数量</span>' +
      '<div class="num" style="display: inline-block;float: right;">' +
      '<input type="button" value="-" onclick="jian();" class="n_btn_1"/>' +
      '<input type="text" value="1" id="buynum1" name="buynum" class="n_ipt"  readonly style="width: 20px;text-align: center;"/>' +
      '<input type="button" value="+" onclick="jia();" class="n_btn_2"/>' +
      '</div>' +
      '</div>' +
      '<div>' +
      '<a class="addconfirm1" style="display:inline-block;color: white;cursor:pointer;background-color: red;margin-bottom: 0;width: 100%;height: 30px;float: left;margin-top: 22px;text-align: center;line-height: 30px;">确定</a>' +
      '</div>' +
      '</form>' +
      '</div>' + ';'
      ,anim:'up'
      ,style:'position:fixed; bottom:0; left:0; width: 100%; height: 250px; padding: 0;margin:0; border:none;'
  });
  $('.addconfirm1').live('click', function () {
      if (mid) {
          if(uservip==3){
              $('#tobuy').submit();
          }else{
              layer.open({
                  content:'黄金会员才能购买哦,去消费升级会员吧'
                  ,skin: 'msg'
                  ,time: 2 //2秒后自动关闭
                  ,end:function(){
                    location="<?php echo U('Mobile/Index/index');?>"
                  }
              });
          }
      }
      else {
          layer.open({
              type: 1
              , content: "<div style='width:100%;height:400px;background:white;text-align: center;margin-right: 5%;'>" +
              '<form id="form3" method="post" enctype="multipart/form-data" action="">' +
              '<dl>' +
              '<div class="div1">' +
              '<dd><img src="/Public/Mobile/images/Image-1.png"/></dd>' +
              '</div>' +
              '<div class="div2">' +
              '<dd>用户名：<input name="username" type="text" style="margin-left: 15px;"/></dd>' +
              '</div>' +
              '<div class="div3">' +
              '<dd>密&nbsp;&nbsp;&nbsp;码：<input name="password" type="password" style="margin-left: 15px;"/></dd>' +
              '</div>' +
              '<div class="div5" style="text-align:center;border: 1px solid black;float: left;">' +
              '<input type="submit" value="登录" style="width: 100%;border-radius: 5px;height: 30px;background-color: red; "/>' +
              '</div>' +
              '<div class="div6">' +
              '<dd style="font-size: 12px;">还没有商城会员</dd>' +
              '<dd><a href="<?php echo U('Mobile/Register/index');?>" style="font-size: 12px;">立即注册</a></dd>' +
             '<dd><a href="<?php echo U('Mobile/ ChangPassword/index');?>" style="font-size: 12px;">忘记密码</a></dd>' +
              '</div>' +
              '</dl>' +
              '</form>' +
              '</div>' + ';'
              , anim:'up'
              , style:'position:fixed; left:0; top:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;background-color:rgba(0,0,0,0.5)'
        });
     }
          //进行登陆验证
  var validate=$('#form3').validate({
      rules:{
          username:{
              required:true,
              remote:{
                  url:'<?php echo U("Mobile/Order/layer");?>',
                  type:'post'
              }
          },
          password: {
              required: true
          }
      },
      messages:{
          username:{
              required:'用户名不能为空',
              remote:'用户名不存在'
          },
          password: {
              required:'密码不能为空'
          }
      },
      success: function(label) {
          label.addClass("ok").text('验证通过');
      },
      validClass: "ok"
  })
  $('#form3').submit(function(){
      if(validate.form()){
          $.post("<?php echo U('Mobile/Order/layerLogin');?>",$('#form3').serialize(),function(response){
              if(response.status==0){
                  layer.open({
                      content: '登录失败，请稍后再试'
                      ,skin: 'msg'
                      ,time: 2 //2秒后自动关闭
                  });
              }else{
                  layer.open({
                      content:'<div style="position: relative;top:40px">登录成功</div>'
                      ,skin: 'msg'
                      ,time: 2 //2秒后自动关闭
                      ,end:function(){
                          $('#tobuy').submit();
                      }
                  });
              }
          },'json');
      }
      return false;
  })
  })
}




</script>
<script src="/Public/Mobile/goodsdetail/js/swipe2.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        new Swipe(document.getElementById('banner_box'), {
            speed: 500,
            auto: 3000,
            callback: function(){
                var lis = $(this.element).next("ol").children();
                lis.removeClass("on").eq(this.index).addClass("on");
            }
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        $(".spec_select ul li em").live('click',function(){
            $(this).addClass("click").siblings().removeClass("click");
            $(this).siblings('input').val($(this).text());
        })
    })
//商品价格随着属性的改变而改变的异步
    $('.liguige em').live('click',function(){
        gid=$('input[name="gid"]').val();
        ml=$(this).text();
        $.post("<?php echo U('Mobile/Huiyuan/saleprice');?>",{gid:gid,xinghao:ml},function(resinfo){
            if(resinfo.status){
                $('.price .saleprice').val(resinfo.info['memprice']);
                $('.price .memprice').val(resinfo.info['saleprice']);
            }
        })
    })
</script>
<!--商品数量加减-->
<script type="text/javascript">
    $(function(){
        $("#a").Spinner({value:1, min:0, len:3, max:10000});
    });
</script>
<script type="text/javascript">
    jQuery(function($){
        $('.box_list ul li').click(function(){
            var index = $('.box_list ul li').index(this);
            $(this).addClass('current').siblings('li').removeClass('current');
            $('.box_list .goods_box:eq('+index+')').show().siblings('.goods_box').hide();
        })
    })
</script>
<!--商品评价的JS-->
<script type="text/javascript">
    jQuery(function(){
        jQuery('.goods_box .ul li').click(function(){
            i=jQuery(this).index();
            jQuery('.goods_box .ul li').removeClass('active').eq(i).addClass('active');
            jQuery('#div1>div').hide().eq(i).show();
        })
    });

</script>

<script type="text/javascript">
    //套餐加减的js
    function jian(){
        var buynum=$('#buynum1').val();
        if(buynum>1){
            $('#buynum1').val(parseInt(buynum)-1);
        }
    }

    function jia(){
        var buynum=$('#buynum1').val();
        if(buynum<199){
            $('#buynum1').val(parseInt(buynum)+1);
        }
    }

    function jian1(){
        var buynum=$('#combuynum').val();
        if(buynum>1){
            $('#combuynum').val(parseInt(buynum)-1);
        }
    }

    function jia1(){
        var buynum=$('#combuynum').val();
        if(buynum<199){
            $('#combuynum').val(parseInt(buynum)+1);
        }
    }
</script>

</body>
</html>