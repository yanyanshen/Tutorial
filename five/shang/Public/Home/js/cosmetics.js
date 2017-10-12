$(function(){
   //------------------------克隆第一个图片
    var clone=$(".banner-img li").eq(0).clone();
    $(".banner-img").append(clone);
    var size=$(".banner-img li").size();
    // var width=$(".banner").width();
    // console.log(width);

    //-----------------实现轮播
    var i=0;
    function move(){
        //当已经轮播到最后一幅图，也就是第一幅图时
        if (i==size){
            $(".banner-img").css({left:0});
            i=1;
        }
        if (i==-1){
           i=3;
           $(".banner-img").stop().animate({left:-i*1920}); 
        }
        //当从下标3，轮播到下标4（实际是下标0），按钮应该显示下标0
        if (i==size-1){
            $(".banner-menu li").eq(0).addClass("select").siblings().removeClass("select");
        }else{
            $(".banner-menu li").eq(i).addClass("select").siblings().removeClass("select");
        }
        //两幅图之间的过渡，以及按钮相应的显示
        $(".banner-img").stop().animate({left:-i*1920});
        $(".banner-menu li").eq(i).addClass("select").siblings().removeClass("select");
    }

    var t=setInterval(function(){
        i++;
        move();
    },3000);
    
    //--------------------按钮
    for(var j=0;j<size-1;j++){
        $(".banner-menu").append("<li></li>");
    }

    $(".banner-menu li").eq(0).addClass("select");

    //鼠标悬停时停止轮播，离开后继续轮播
    
    $(".banner").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },3000);
    });
    
    //单击按钮显示相应图片
    $(".banner-menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".banner-menu li").eq(index).addClass("select").siblings().removeClass("select");
        // console.log(index);
         $(".banner-img").stop().animate({left:-index*1920});
    });

    //单击后退按钮
    $(".banner .btn_l").click(function(){
        i--;
        move();
    });
    $(".banner .btn_r").click(function(){
        i++;
        move();
    });


// 品牌展示JS样式
$(".brandShowCont div").first().show();
$(".brandShowCont ul li").first().addClass("active");
    $(".brandShowCont ul li").hover(function(){
            $(this).addClass("active").siblings().removeClass("active");
            var i=$(this).index();
            $(".brandShowCont div").eq(i).show().siblings("div").hide();
        });

// 脸部产品右部上下页切换样式
    var num=$(".lunbo .faceContR ul").size();
    var m=0;
    function dong(){
        $(".lunbo .faceContR").css({left:-m*920});
        if(m==2){
          $(".lunbo .faceContR").css({left:0});
          m=0;
        }
        if(m==-1){
          $(".lunbo .faceContR").css({left:-920});
          m=1;
        }
    }
    $(".face .retSty .after").click(function(){
        m++;
        dong();
    })
    $(".face .retSty .before").click(function(){
        m--;
        dong();
    })

    // 眼部产品右部上下页切换样式
    var num1=$(".lunbo .eyesContR ul").size();
    var n=0;
    function dong1(){
        $(".lunbo .eyesContR").css({left:-n*920});
        if(n==2){
          $(".lunbo .eyesContR").css({left:0});
          n=0;
        }
        if(n==-1){
          $(".lunbo .eyesContR").css({left:-920});
          n=1;
        }
    }
    $(".eyes .retSty .after").click(function(){
        n++;
        dong1();
    })
    $(".eyes .retSty .before").click(function(){
        n--;
        dong1();
    })

   // 唇部产品右部上下页切换样式
    var num2=$(".lunbo .mouseContR ul").size();
    var b=0;
    function dong2(){
        $(".lunbo .mouseContR").css({left:-b*920});
        if(b==2){
          $(".lunbo .mouseContR").css({left:0});
          b=0;
        }
        if(b==-1){
          $(".lunbo .mouseContR").css({left:-920});
          b=1;
        }
    }
    $(".mouse .retSty .after").click(function(){
        b++;
        dong2();
    })
    $(".mouse .retSty .before").click(function(){
        b--;
        dong2();
    })


// 娇兰页面banner轮播js样式
//------------------------克隆第一个图片
    var copy=$(".maybelline_banner_img li").eq(0).clone();
    $(".maybelline_banner_img").append(copy);
    var num3=$(".maybelline_banner_img li").size();
    //-----------------实现轮播
    var c=0;
    function dong3(){
        //当已经轮播到最后一幅图，也就是第一幅图时
        if (c==num3){
            $(".maybelline_banner_img").css({left:0});
            c=1;
        }
        if (c==-1){
           c=3;
           $(".maybelline_banner_img").stop().animate({left:-c*1200}); 
        }
        //当从下标3，轮播到下标4（实际是下标0），按钮应该显示下标0
        if (c==num3-1){
            $(".maybelline_bannerMenu li").eq(0).addClass("choice").siblings().removeClass("choice");
        }else{
            $(".maybelline_bannerMenu li").eq(c).addClass("choice").siblings().removeClass("choice");
        }
        //两幅图之间的过渡，以及按钮相应的显示
        $(".maybelline_banner_img").stop().animate({left:-c*1200});
        $(".maybelline_bannerMenu li").eq(c).addClass("choice").siblings().removeClass("choice");
    }

    var t1=setInterval(function(){
        c++;
        dong3();
    },3000);
    
    //--------------------按钮
    for(var c=0;c<num3-1;c++){
        $(".maybelline_bannerMenu").append("<li></li>");
    }

    $(".maybelline_bannerMenu li").eq(0).addClass("choice");
    //鼠标悬停时停止轮播，离开后继续轮播
    
    $(".maybelline_banner").hover(function(){
        clearInterval(t1);
    },function(){
        t1=setInterval(function(){
            c++;
            dong3();
        },3000);
    });
    
    //单击按钮显示相应图片
    $(".maybelline_bannerMenu li").click(function(){
        var now=$(this).index();
        c=now;
        $(".maybelline_bannerMenu li").eq(now).addClass("choice").siblings().removeClass("choice");
        // console.log(index);
         $(".maybelline_banner_img").stop().animate({left:-now*1200});
    });

    //单击后退按钮
    $(".maybelline_banner .btnl").click(function(){
        c--;
        dong3();
    });
    $(".maybelline_banner .btnr").click(function(){
        c++;
        dong3();
    });
 // 娇兰页面护肤最多购买点击js样式
    var c=0;
    function dong4(){
        $(".popular .popular_img").css({left:-c*1200});
        if(c==2){
          $(".popular .popular_img").css({left:0});
          c=0;
        }
        if(c==-1){
          $(".popular .popular_img").css({left:-1200});
          c=1;
        }
    }
    $(".popular .btl").click(function(){
        c++;
        dong4();
    })
    $(".popular .btr").click(function(){
        c--;
        dong4();
    })
// 娇兰页面彩妆最多购买点击js样式
    var d=0;
    function dong5(){
        $(".popular1 .popular1_img").css({left:-d*1200});
        if(d==2){
          $(".popular1 .popular1_img").css({left:0});
          d=0;
        }
        if(d==-1){
          $(".popular1 .popular1_img").css({left:-1200});
          d=1;
        }
    }
    $(".popular1 .btl1").click(function(){
        d++;
        dong5();
    })
    $(".popular1 .btr1").click(function(){
        d--;
        dong5();
    })
    // 娇兰页面香水最多购买点击js样式
    var e=0;
    function dong6(){
        $(".popular2 .popular2_img").css({left:-e*1200});
        if(e==2){
          $(".popular2 .popular2_img").css({left:0});
          e=0;
        }
        if(e==-1){
          $(".popular2 .popular2_img").css({left:-1200});
          e=1;
        }
    }
    $(".popular2 .btl2").click(function(){
        e++;
        dong6();
    })
    $(".popular2 .btr2").click(function(){
        e--;
        dong6();
    })


});