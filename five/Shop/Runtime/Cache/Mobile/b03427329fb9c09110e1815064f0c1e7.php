<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>我的收藏</title>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/style.css"/>
    <script src="/Public/Mobile/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="/Public/Mobile/js/jaliswall.js"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <style>
        .contaniner .list .wall{position: relative; display: block; width: 100%; overflow: hidden; margin: 2% 0; z-index: 0;}
        .contaniner .list .wall .pic{ width:100%; margin-bottom: 8%; float: left; background-color: #fff; padding-bottom: 3%;}

        .contaniner .list .wall .pic a{ width: 100%; display: block;}
        .contaniner .list .wall .pic img{ width: 100%;}
        .contaniner .list .wall .pic p{ font-size: 1.45em; width: 90%; margin: 2% 5%; text-align: justify; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: #333;}
        .contaniner .list .wall .pic b{ color: #FC605A; font-size: 1.7em; font-weight: normal; margin-right: 4%; margin-left: 4%; }
        .contaniner .list .wall .pic del{ color: #999; font-size: 1.169em; }
    </style>
    <script type="text/javascript">
        $(window).load(function(){
            $(".loading").addClass("loader-chanage")
            $(".loading").fadeOut(300);
            $('.wall').jaliswall({ item: '.pic' });

            $(".text-top").on("touchstart",function(){
                $(".collectbar").fadeToggle(500);
            });
        })
    </script>
</head>
<!--loading页开始-->
<div class="loading">
    <div class="loader">
        <div class="loader-inner pacman">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!--loading页结束-->
<body>
<header class="top-header fixed-header">
    <a class="icona" href="javascript:history.go(-1)">
        <img src="/Public/Mobile/images/left.png"/>
    </a>
    <h3>抢购促销</h3>

</header>

<div class="contaniner fixed-conta">
    <div style="margin-top: 3%;"></div>
    <section class="list">
        <ul class="wall">

            <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><li class="pic">

                    <?php if($time > $value['endtime']): ?><a href="javascript:change(<?php echo ($k); ?>);">
                            <img id="ch<?php echo ($k); ?>" src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($value['pic']); ?>"/></a>
                        <?php else: ?>
                        <a href="<?php echo U('Detail/detail',array('gid'=>$value['gid']));?>">
                            <img src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($value['pic']); ?>"/></a><?php endif; ?>

                        <p><?php echo ($value["goodsname"]); ?></p>
                        <b>￥<?php echo ($value["price"]); ?></b><del>￥<?php echo ($value["marketprice"]); ?></del>
                        <div class="collectbar">
                            <label for="collect<?php echo ($value['id']); ?>" onselectstart="return false" class="label<?php echo ($value['id']); ?>"></label>
                            <input type="checkbox" value="<?php echo ($value['id']); ?>" onclick="mycheck(<?php echo ($value['id']); ?>)" id="collect<?php echo ($value['id']); ?>"/>
                        </div>

                    <div style="width:300px;height: 70px;background: pink;margin: auto;border-radius:10px;">
                        <div class="time" id="time<?php echo ($k); ?>" style="font-family: '微软雅黑';font-size: 24px;font-weight: bolder;line-height: 70px;text-align: center;"></div>
                        <input type="hidden" value="<?php echo ($value['endtime']); ?>" id="endTime<?php echo ($k); ?>"/>
                        <script>
                            function change(id){
                                layer.open({
                                    content: '该宝贝已抢购完'
                                    ,skin: 'msg'
                                    ,time: 2 //2秒后自动关闭
                                });
                            }
                            $(function(){
                                setInterval(changTime, 1000);    //每一秒都循环一次函数
                                function changTime(){
                                    for(i=1;i<=9;i++){document.getElementById("time"+i).innerHTML = getTime1();}
                                }
                                function getTime1() {
                                    var now = new Date().getTime(); //获取当前的
                                    var end = ($('#endTime'+i).val()) * 1000;
                                    var temp = end - now;
                                    if (temp <= 0) {return "抢购已结束";}
                                    else {
                                        var temp2 = new Date();
                                        temp2.setTime(temp);
                                        var sec = Math.floor((temp) / 1000 % 60);
                                        var min = Math.floor(temp / (60 * 1000) % 60);
                                        var hou = Math.floor(temp / (60 * 60 * 1000) % 24);
                                        var day = Math.floor(temp / (24 * 60 * 60 * 1000));
                                        return day + "天 " + hou + "小时 " + min + "分钟 " + sec + "秒";
                                    }
                                }
                            })
                        </script>
                    </div>
                </li><?php endforeach; endif; else: echo "$empty" ;endif; ?>
        </ul>
    </section>
    <div class="kong" style="margin-bottom: 16%;"></div>
</div>
<br /><br /><br />
<footer class="page-footer fixed-footer">
    <ul>
        <li class="active">
            <a href="<?php echo U('Index/index');?>">
                <img src="/Public/Mobile/images/footer01.png"/>
                <p>首页</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Category/cateList');?>">
                <img src="/Public/Mobile/images/footer002.png"/>
                <p>分类</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Cart/cartList');?>">
                <img src="/Public/Mobile/images/footer003.png"/>
                <p>购物车</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Personal/personalList');?>">
                <img src="/Public/Mobile/images/footer004.png"/>
                <p>个人中心</p>
            </a>
        </li>
    </ul>
</footer>
</body>
</html>