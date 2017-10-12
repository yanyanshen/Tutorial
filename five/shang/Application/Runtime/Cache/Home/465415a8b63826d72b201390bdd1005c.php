<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>基本信息</title>
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/YMDClass.mini.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <script src="/Public/Home/js/password.js"></script>
    <script src="/Public/Home/js/geo.js"></script>

    <link rel="stylesheet" href="/Public/Home/style/password.css" />
    <link rel="stylesheet" href="/Public/Home/style/index.css" />
    <link rel="stylesheet" href="/Public/Home/style/headerAndFooter.css" />
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <style type="text/css">
        body .demo-class .layui-layer-title{background:#ccc; color:red; border: none;}
        body .demo-class .layui-layer-content{background:#ccc; color:white; border: none;}
    </style>
</head>
<body>
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
<div class="cont">
    <div class="cont_bg">
        <ul class="sidebar">
            <li class="touxiang"><div><img src="/Public/Uploads/UserPic/<?php echo ((isset($pic['pic']) && ($pic['pic'] !== ""))?($pic['pic']):'5.jpg'); ?>" height="120px" width="120px"></div><div><a href="#"><p><?php echo ($username); ?></p></a></div>
            </li>
            <li><a href="<?php echo u('order');?>">我的订单</a></li>
            <li><a href="<?php echo u('Member/collect');?>">我的收藏</a></li>
            <li><a href="<?php echo u('Member/level');?>" >我的会员等级</a></li>
            <li><a href="<?php echo u('Member/memberinfo');?>">个人信息</a></li>
            <li  style="background-color:#CC0001 ;"><a href="<?php echo u('Member/address');?>" style="color: #fff">收货地址</a></li>

        </ul>
        <!-- tab -->
        <div class="news" style="background-color: #fff">
            <ul class="clearfix">
                <li>管理收货地址</li>
                <li><a href="javascript:add()">新增收货地址</a></li>
            </ul>
            <div class="text">

                <form action=" " id="form1" method="post"  enctype="multipart/form-data">
                    <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><p style="height: 30px;  color: red"  >
                            收货地址:&nbsp<?php echo ($val["address"]); ?>,&nbsp&nbsp&nbsp&nbsp&nbsp收货人:<?php echo ($val["name"]); ?>,&nbsp&nbsp&nbsp&nbsp联系电话:<?php echo ($val["tel"]); ?>
                            &nbsp&nbsp&nbsp&nbsp <a href="javascript:edit(<?php echo ($val['id']); ?>)" >编辑</a>&nbsp&nbsp&nbsp&nbsp<a href="javascript:del(<?php echo ($val['id']); ?>)" >删除</a>&nbsp&nbsp&nbsp&nbsp
                            <a id='off' href="javascript:isdefault(<?php echo ($val['id']); ?> " class="tablelink" style="color: mediumblue;  display: inline-block;font-size: 20px" > <?php if(($val['isdefault']) == "1"): ?>默认地址<?php endif; ?></a>
                            <a id='on'  href="javascript:isdefault(<?php echo ($val['id']); ?>)" class="tablelink"> <?php if(($val['isdefault']) == "0"): ?>设为默认地址<?php endif; ?></a>

                        </p><br /><?php endforeach; endif; else: echo "" ;endif; ?>
                </form>
            </div>

        </div>
    </div>
</div>

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
<!-- 底部开始 -->

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
</body>
<script>

        function add(){
            layer.open({
                type: 2,
                skin: 'demo-class',
                title: '新增地址',
                shadeClose: true,
                shade: 0.8,
                area: ['500px', '50%'],
                content: "<?php echo U('add_address');?>"//调用方法
            });
        }
        function edit(id){
            layer.open({
                type: 2,
                skin: 'demo-class',
                title: '编辑地址',
                shadeClose: true,
                shade: 0.8,
                area: ['500px', '50%'],
                content: "<?php echo U('edit_address');?>?id="+id
            });
        }
        function del(id){
            //询问框
            layer.confirm('您确定要删除吗?', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.get("<?php echo U('Home/Member/add_del');?>",{'id':id},function(res){
                    if(res.status=='ok'){
                        layer.msg(res.msg,{
                            icon:1,
                            time:2000
                        },function(){
                            location.href="<?php echo U('Home/Member/address');?>";
                        })

                    }else{
                        layer.alert(res.msg);
                        location.href="<?php echo U('Home/Member/address');?>";
                    }
                });
            })
        }
function isdefault(id){
        $.get("<?php echo U('Home/Member/isdefault_address');?>",{'id':id},function(res){
            if(res.status=='ok'){
                layer.msg(res.msg,{
                    icon:1,
                    time:2000
                },function(){
                    location.href="<?php echo U('Home/Member/address');?>";
                })
            }else{
                layer.alert(res.msg);
                location.href="<?php echo U('Home/Member/address');?>";
            }
        });
}
</script>





</html>