// banner轮播
$(function(){
    var clone=$(".banner-img li:first").clone();
    $(".banner-img").append(clone);
    var size=$(".banner-img li").size();

    // 轮播
    var i=0;
    function move(){
        if (i==size){
            $(".banner-img").css({left:0});
            i=1;
        }
        if (i==-1){
            i=2;
            $(".banner-img").stop().animate({left:-i*1920},1000);
        }
        if (i==size-1){
            $(".banner-menu li").eq(0).addClass("select").siblings().removeClass("select");
        }else{
            $(".banner-menu li").eq(i).addClass("select").siblings().removeClass("select");
        }
        $(".banner-img").stop().animate({left:-i*1920},1000);
        $(".banner-menu li").eq(i).addClass("select").siblings().removeClass("select");
    }

    var t=setInterval(function(){
        i++;
        move();
    },3000);   


    // 添加按钮
    for(var j=0;j<size-1;j++){
       $(".banner-menu").append("<li></li>"); 
    }
    $(".banner-menu li").eq(0).addClass("select");

    // 鼠标悬停时停止轮播，离开后继续轮播
    $(".banner").hover(function(){ 
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },3000);

    });

    // 单击按钮显示相应图片
    $(".banner-menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".banner-menu li").eq(index).addClass("select").siblings().removeClass("select");
        $(".banner-img").stop().animate({left:-index*1920},1000);

    });

    // 单击后退按钮
    $(".banner .btn_l").click(function(){
        i--;
        move();
    });
    $(".banner .btn_r").click(function(){
        i++;
        move();
    });

// tab切换
// 1
    $(".list1:first .tab>div").eq(0).show();
    $(".list1:first .tab>ul>li").first().addClass("active");
    $(".list1:first .tab>ul>li").hover(function(){
        $(this).addClass("active").siblings().removeClass("active");
        var i=$(this).index();
        $(".list1:first .tab>div").eq(i).show().siblings("div").hide();
    });

    $(".list1").eq(1).find(".tab>div").eq(0).show();
    $(".list1").eq(1).find(".tab>ul>li:first").addClass("active");
    $(".list1").eq(1).find(" .tab>ul>li").hover(function(){
        $(this).addClass("active").siblings().removeClass("active");
        var i=$(this).index();
        $(".list1").eq(1).find(" .tab>div").eq(i).show().siblings("div").hide();
    });

    $(".list1").eq(2).find(".tab>div").eq(0).show();
    $(".list1").eq(2).find(".tab>ul>li:first").addClass("active");
    $(".list1").eq(2).find(" .tab>ul>li").hover(function(){
        $(this).addClass("active").siblings().removeClass("active");
        var i=$(this).index();
        $(".list1").eq(2).find(" .tab>div").eq(i).show().siblings("div").hide();
    });

    $(".list1").eq(3).find(".tab>div").eq(0).show();
    $(".list1").eq(3).find(".tab>ul>li:first").addClass("active");
    $(".list1").eq(3).find(" .tab>ul>li").hover(function(){
        $(this).addClass("active").siblings().removeClass("active");
        var i=$(this).index();
        $(".list1").eq(3).find(" .tab>div").eq(i).show().siblings("div").hide();
    });

    $(".list1").eq(4).find(".tab>div").eq(0).show();
    $(".list1").eq(4).find(".tab>ul>li:first").addClass("active");
    $(".list1").eq(4).find(" .tab>ul>li").hover(function(){
        $(this).addClass("active").siblings().removeClass("active");
        var i=$(this).index();
        $(".list1").eq(4).find(" .tab>div").eq(i).show().siblings("div").hide();
    });

    $(".list1").eq(5).find(".tab>div").eq(0).show();
    $(".list1").eq(5).find(".tab>ul>li:first").addClass("active");
    $(".list1").eq(5).find(" .tab>ul>li").hover(function(){
        $(this).addClass("active").siblings().removeClass("active");
        var i=$(this).index();
        $(".list1").eq(5).find(" .tab>div").eq(i).show().siblings("div").hide();
    });


 // 滚屏效果
    var T;
        $(document).scroll(function(){
        var w=$("body").scrollTop();
             if (w>500){
                $(".leftNav").fadeIn();
             }else{
                $(".leftNav").fadeOut();
             }
          });

        $(".leftNav li").click(function(){
              var i=$(this).index();
              T=$("body>div").eq(i+3).offset().top;
              $(this).addClass("focus").siblings().removeClass("focus");
              $("body").animate({scrollTop: T},1000);
        });
       
        $(document).scroll(function(){
            var T=$("body").scrollTop()+500;
                for(var j=0;j<6;j++){
                    divT=$("body>div").eq(j+3).offset().top;
                    if (T>divT){
                      $(".leftNav li").eq(j).addClass("focus").siblings().removeClass("focus");
                    }
                }
        });

        /*$(".topNav li").click(function(){
            var i=$(this).index();
            T=$("body>div").eq(i+3).offset().top;
            $(this).addClass("focus").siblings().removeClass("focus");
            $("body").animate({scrollTop: T},1000);
        });*/

        $(".topFixed li").click(function(){
            var i=$(this).index();
            T=$("body>div").eq(i+3).offset().top;
            $(this).addClass("focus").siblings().removeClass("focus");
            $("body").animate({scrollTop: T},1000);
        });
});


