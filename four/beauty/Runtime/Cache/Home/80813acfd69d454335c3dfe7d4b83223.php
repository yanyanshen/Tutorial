<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>双11领红包</title>

    <link rel="stylesheet" href="/Public/Home/css/hongbaocss/demo.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/hongbaocss/sweet-alert.css">
    <style type="text/css">
        body { margin: 0; padding: 0; position: relative;  background-position: center; /*background-repeat: no-repeat;*/ width: 100%; height: 100%; background-size: 100% 100%; }
        *{margin:0px;padding:0px;}
        body{background:url("/Public/Home/images/hongbaoimages/bg.jpg") top center;font-size:12px;font-family:"微软雅黑";color:#666666;}
        /*S tmall*/
        .tmall{width:293px; height:365px;background:url("/Public/Home/images/hongbaoimages/hb.jpg") no-repeat top center;	margin:57px auto; position:relative;}
        .tmall a{width:254px; height:64px;border:1px solid #fff;display:block;font-size:32px; color:#872119;text-decoration:none;text-align:center;line-height:78px;
            position:absolute;bottom:62px;left:19px;
        }
        /*E tmall*/

        /*S box*/
        .box{width:298px; height:365px;position:absolute;text-align:center;top:56px;left:533px;
            background:url("/Public/Home/images/hongbaoimages/box.jpg") top center;	display:none;
        }
        .box .b_close{width:32px; height:32px; background:url("/Public/Home/images/hongbaoimages/close.png") no-repeat top right;
            background-size:16px 16px; border-radius:4px;display:block; float:right;
        }
        .box h2{margin-top:80px;color:#FFF; font-size:24px; font-family:"微软雅黑";}
        .box p{margin-top:-74px;font-family:"宋体";}
        .box .pay{width:160px;height:50px;background:#9F3;display:block;text-align:center;
            text-decoration:none;
            margin:55px auto; line-height:50px;font-size:16px;color:#FFF;font-weight:bold;border-radius:10px;}
        .box .pay:hover{background:#F00;}
        /*E box*/

        /*动画函数，盒子出场效果*/
        @keyframes tanshu{
            0%{transform:translateX(-1000px) scale(0)}
            50%{transform:translateX(0px) scale(0.5)}
            100%{transform:translateX(0px) scale(1)}
        }
        /*颤抖的效果*/
        @keyframes chandou{
            0%{transform:rotate(-3deg)}
            50%{transform:rotate(0deg)}
            100%{transform:rotate(3deg)}
        }

        /*调用动画*/
        .showHB{animation:tanshu 0.8s ease alternate both;}
        .showChanD{animation:chandou 0.1s infinite ease alternate both;}
    </style>

    <script type="text/javascript" src="/Public/Home/js/hongbaojs/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/hongbaojs/awardRotate.js"></script>
    <script src="/Public/Home/js/hongbaojs/sweet-alert.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/hongbaojs/ThreeCanvas.js"></script>
    <script type="text/javascript" src="/Public/Home/js/hongbaojs/Snow.js"></script>

    <script type="text/javascript">
        var SCREEN_WIDTH = window.innerWidth;//
        var SCREEN_HEIGHT = window.innerHeight;
        var container;
        var particle;//粒子

        var camera;
        var scene;
        var renderer;

        var starSnow = 1;

        var particles = [];

        var particleImage = new Image();
        //THREE.ImageUtils.loadTexture( "img/ParticleSmoke.png" );
        particleImage.src = '/Public/Home/images/hongbaoimages/ParticleSmoke.png';



        function init() {
            //alert("message3");
            container = document.createElement('div');//container：画布实例;
            document.body.appendChild(container);

            camera = new THREE.PerspectiveCamera( 50, SCREEN_WIDTH / SCREEN_HEIGHT, 1, 10000 );
            camera.position.z = 1000;
            //camera.position.y = 50;

            scene = new THREE.Scene();
            scene.add(camera);

            renderer = new THREE.CanvasRenderer();
            renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
            var material = new THREE.ParticleBasicMaterial( { map: new THREE.Texture(particleImage) } );
            //alert("message2");
            for (var i = 0; i < 260; i++) {
                //alert("message");
                particle = new Particle3D( material);
                particle.position.x = Math.random() * 2000-1000;

                particle.position.z = Math.random() * 2000-1000;
                particle.position.y = Math.random() * 2000-1000;
                //particle.position.y = Math.random() * (1600-particle.position.z)-1000;
                particle.scale.x = particle.scale.y = 0.5;
                scene.add( particle );

                particles.push(particle);
            }

            container.appendChild( renderer.domElement );


            //document.addEventListener( 'mousemove', onDocumentMouseMove, false );
            document.addEventListener( 'touchstart', onDocumentTouchStart, false );
            document.addEventListener( 'touchmove', onDocumentTouchMove, false );
            document.addEventListener( 'touchend', onDocumentTouchEnd, false );

            setInterval( loop, 1000 / 40 );

        }

        var touchStartX;
        var touchFlag = 0;//储存当前是否滑动的状态;
        var touchSensitive = 80;//检测滑动的灵敏度;
        //var touchStartY;
        //var touchEndX;
        //var touchEndY;
        function onDocumentTouchStart( event ) {

            if ( event.touches.length == 1 ) {

                event.preventDefault();//取消默认关联动作;
                touchStartX = 0;
                touchStartX = event.touches[ 0 ].pageX ;
                //touchStartY = event.touches[ 0 ].pageY ;
            }
        }


        function onDocumentTouchMove( event ) {

            if ( event.touches.length == 1 ) {
                event.preventDefault();
                var direction = event.touches[ 0 ].pageX - touchStartX;
                if (Math.abs(direction) > touchSensitive) {
                    if (direction>0) {touchFlag = 1;}
                    else if (direction<0) {touchFlag = -1;};
                    //changeAndBack(touchFlag);
                }
            }
        }

        function onDocumentTouchEnd (event) {
            // if ( event.touches.length == 0 ) {
            // 	event.preventDefault();
            // 	touchEndX = event.touches[ 0 ].pageX ;
            // 	touchEndY = event.touches[ 0 ].pageY ;

            // }这里存在问题
            var direction = event.changedTouches[ 0 ].pageX - touchStartX;

            changeAndBack(touchFlag);
        }


        function changeAndBack (touchFlag) {
            var speedX = 20*touchFlag;
            touchFlag = 0;
            for (var i = 0; i < particles.length; i++) {
                particles[i].velocity=new THREE.Vector3(speedX,-10,0);
            }
            var timeOut = setTimeout(";", 800);
            clearTimeout(timeOut);

            var clearI = setInterval(function () {
                if (touchFlag) {
                    clearInterval(clearI);
                    return;
                };
                speedX*=0.8;

                if (Math.abs(speedX)<=1.5) {
                    speedX=0;
                    clearInterval(clearI);
                };

                for (var i = 0; i < particles.length; i++) {
                    particles[i].velocity=new THREE.Vector3(speedX,-10,0);
                }
            },100);


        }


        function loop() {
            for(var i = 0; i<particles.length; i++){
                var particle = particles[i];
                particle.updatePhysics();

                with(particle.position)
                {
                    if((y<-1000)&&starSnow) {y+=2000;}

                    if(x>1000) x-=2000;
                    else if(x<-1000) x+=2000;
                    if(z>1000) z-=2000;
                    else if(z<-1000) z+=2000;
                }
            }

            camera.lookAt(scene.position);

            renderer.render( scene, camera );
        }
    </script>


</head>
<body bgcolor="#eae0d9" id="body" onLoad="init()">
<div class="couten" style="position:fixed; width:100%; margin:0 auto; text-align:center; padding-top:5%">
    <div class="turntable-bg">
        <!--tmall start -->
        <div class="tmall" >
            <a href="javascript:" id="t_add"></a>
        </div>
        <!--tmall end -->

        <!--box start-->
        <div class="box showHB">
            <a href="#" class="b_close" ></a>
            <h2>恭喜中奖！！o(∩_∩)o <h2>
                <p class="phong">发红包1元</p>
                <a class="pay" href="<?php echo U('Home/Index/index');?>">前往支付花红包</a>
        </div>
        <div class="box showHB">
            <a href="#" class="b_close" ></a>
            <h2>恭喜中奖！！o(∩_∩)o <h2>
                <p class="phong">发红包5元</p>
                <a class="pay" href="<?php echo U('Home/Index/index');?>">前往支付花红包</a>
        </div>
        <div class="box showHB">
            <a href="#" class="b_close" ></a>
            <h2>恭喜中奖！！o(∩_∩)o <h2>
                <p class="phong">发红包10元</p>
                <a class="pay" href="<?php echo U('Home/Index/index');?>">前往支付花红包</a>
        </div>
        <div class="box showHB">
            <a href="#" class="b_close" ></a>
            <h2>恭喜中奖！！o(∩_∩)o <h2>
                <p class="phong">发红包15元</p>
                <a class="pay" href="<?php echo U('Home/Index/index');?>">前往支付花红包</a>
        </div>
        <div class="box showHB">
            <a href="#" class="b_close"></a>
            <h2>恭喜中奖！！o(∩_∩)o <h2>
                <p class="phong">发红包20元</p>
                <a class="pay" href="<?php echo U('Home/Index/index');?>">前往支付花红包</a>
        </div>
        <div class="box showHB">
            <a href="#" class="b_close"></a>
            <h2>恭喜中奖！！o(∩_∩)o <h2>
                <p class="phong">发红包25元</p>
                <a class="pay" href="<?php echo U('Home/Index/index');?>">前往支付花红包</a>
        </div>
        <div class="box showHB">
            <a href="#" class="b_close"></a>
            <h2>恭喜中奖！！o(∩_∩)o <h2>
                <p class="phong">发红包20元</p>
                <a class="pay" href="<?php echo U('Home/Index/index');?>">前往支付花红包</a>
        </div>
        <div class="box showHB">
            <a href="#" class="b_close"></a>
            <h2>恭喜中奖！！o(∩_∩)o <h2>
                <p class="phong">没有红包没关系，只要心情好</p>
                <a class="pay" href="<?php echo U('Home/Index/index');?>">前往支付花红包</a>
        </div>
        <div class="box showHB">
            <a href="#" class="b_close" ></a>
            <h2>恭喜中奖！！o(∩_∩)o <h2>
                <p class="phong">发红包25元</p>
                <a class="pay" href="<?php echo U('Home/Index/index');?>">前往支付花红包</a>
        </div>
        <div class="box showHB">
            <a href="#" class="b_close" ></a>
            <h2>恭喜中奖！！o(∩_∩)o <h2>
                <p class="phong">发红包30元</p>
                <a class="pay" href="<?php echo U('Home/Index/index');?>">前往支付花红包</a>
        </div>
    </div>
</div>

</body>
</html>

<script type="text/javascript" src="/Public/Home/js/hongbaojs/jquery-1.11.0.min.js"></script>

<script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
<script type="text/javascript">
    $(function(){
        rand1=Math.floor(Math.random()*10);
        $(".tmall").addClass("showHB");

        //点击关闭
        $(".b_close").click(function(){
            $(".box").slideUp();
            $(".tmall").show();
        });
        $('#t_add').click(function(){
            hongbao=$('.phong').eq(rand1).text();
            reg=/\d{1}/;
            if(reg.test(hongbao)){
                $.get('<?php echo U("Home/HongBao/addhongbao");?>',{hongbao:hongbao},function(res){
                        if(res.status==0){
                                layer.msg('今天只能拆一次，明天再来吧',{time:1000},function(){
                                    location='<?php echo U("Home/Member/packet");?>';
                                });
                               }
                        else{
                                $(".tmall").removeClass("showHB").addClass("showChanD");
                                setTimeout(function(){
                                    //获取一个随机数作为红包的下标
                                    $(".tmall").removeClass("showChanD");
                                    $(".box").eq(rand1).show();
                                    $(".tmall").hide();
                                },500);
                      }
                })
            }
        })
    });

</script>