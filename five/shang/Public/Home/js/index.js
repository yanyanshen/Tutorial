
// bannerJS样式
$(function(){
    var clone=$(".banner_img li").eq(0).clone();
    $(".banner_img").append(clone);
    var size=$(".banner_img li").size();
    var i=0;
    function move(){
        if (i==size){
            $(".banner_img").css({left:0});
            i=1;
        }
        if (i==-1){
           i=5;
           $(".banner_img").stop().animate({left:-i*1920}); 
        }
        if (i==size-1){
            $(".banner_menu li").eq(0).addClass("select").siblings().removeClass("select");
        }else{
            $(".banner_menu li").eq(i).addClass("select").siblings().removeClass("select");
        }
        $(".banner_img").stop().animate({left:-i*1920});

        $(".banner_menu li").eq(i).addClass("select").siblings().removeClass("select");
    }
    var t=setInterval(function(){
        i++;
        move();
    },3000);
    for(var j=0;j<size-1;j++){
        $(".banner_menu").append("<li></li>");
    }
    $(".banner_menu li").eq(0).addClass("select");
    $(".banner .right").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },3000);
    });
    $(".banner_menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".banner_menu li").eq(index).addClass("select").siblings().removeClass("select");
         $(".banner_img").stop().animate({left:-index*1920});
    });
    $(".banner .right .btn_l").click(function(){
        i--;
        move();
    });
    $(".banner .right .btn_r").click(function(){
        i++;
        move();
    });
    $(".banner .right").mouseenter(function(){
        $(".banner .right div").fadeIn();
    });
    $(".banner .right").mouseleave(function(){
        $(".banner .right div").fadeOut();
    });
});

//1f hotitem的js样式

$(function(){

    var clone=$(".hotitem .hotitemCont .btmCont ul").eq(0).clone();
    $(".hotitem .hotitemCont .btmCont").append(clone);
    var size=$(".hotitem .hotitemCont .btmCont ul").size();
    var i=0;
    function move(){
        if (i==size){
            $(".hotitem .hotitemCont .btmCont").css({top:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".hotitem .hotitemCont .btmCont").stop().animate({top:i*342}); 
        }
        $(".hotitem .hotitemCont .btmCont").stop().animate({top:-i*342}); 
  
    }   

    $(".hotitem .hotitemCont .title1 p .span1").click(function(){
        i--;
        move();
    });
    $(".hotitem .hotitemCont .title1 p .span2").click(function(){
        i++;
        move();
    });
});

// 3f hot的大图轮播js样式
$(function(){
    var clone=$(".hot .hotCont .head .right .li1 .big li").eq(0).clone();
    $(".hot .hotCont .head .right .li1 .big").append(clone);
    var size=$(".hot .hotCont .head .right .li1 .big li").size();
    var i=0;
    function move(){
        if (i==size){
            $(".hot .hotCont .head .right .li1 .big").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".hot .hotCont .head .right .li1 .big").stop().animate({left:-i*520}); 
        }
        if (i==size-1){
            $(".hot .hotCont .head .right .li1 .menu li").eq(0).addClass("select").siblings().removeClass("select");
        }else{
            $(".hot .hotCont .head .right .li1 .menu li").eq(i).addClass("select").siblings().removeClass("select");
        }
        $(".hot .hotCont .head .right .li1 .big").stop().animate({left:-i*520});
        $(".hot .hotCont .head .right .li1 .menu li").eq(i).addClass("select").siblings().removeClass("select");
    }
    var t=setInterval(function(){
        i++;
        move();
    },3000);
    for(var j=0;j<size-1;j++){
        $(".hot .hotCont .head .right .li1 .menu").append("<li></li>");
    }
    $(".hot .hotCont .head .right .li1 .menu li").eq(0).addClass("select");
    $(".hot .hotCont .head .right .li1").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },3000);
    });
    $(".hot .hotCont .head .right .li1 .menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".hot .hotCont .head .right .li1 .menu li").eq(index).addClass("select").siblings().removeClass("select");
         $(".hot .hotCont .head .right .li1 .big").stop().animate({left:-index*520});
    });
    $(".hot .hotCont .head .right .li1 .btn_l").click(function(){
        i--;
        move();
    });
    $(".hot .hotCont .head .right .li1 .btn_r").click(function(){
        i++;
        move();
    });
    $(".hot .hotCont .head .right .li1").mouseenter(function(){
        $(".hot .hotCont .head .right .li1 div").fadeIn();
    });
    $(".hot .hotCont .head .right .li1").mouseleave(function(){
        $(".hot .hotCont .head .right .li1 div").fadeOut();
    });
});

// 3f hot的小图轮播js样式
$(function(){
    var clone=$(".hot .hotCont .head .right .li4 .small li").eq(0).clone();
    $(".hot .hotCont .head .right .li4 .small").append(clone);
    var size=$(".hot .hotCont .head .right .li4 .small li").size();
    var i=0;
    function move(){
        if (i==size){
            $(".hot .hotCont .head .right .li4 .small").css({left:0});
            i=1;
        }
        if (i==-1){
           i=3;
           $(".hot .hotCont .head .right .li4 .small").stop().animate({left:-i*520}); 
        }
        if (i==size-1){
            $(".hot .hotCont .head .right .li4 .menu li").eq(0).addClass("select").siblings().removeClass("select");
        }else{
            $(".hot .hotCont .head .right .li4 .menu li").eq(i).addClass("select").siblings().removeClass("select");
        }
        $(".hot .hotCont .head .right .li4 .small").stop().animate({left:-i*520});
        $(".hot .hotCont .head .right .li4 .menu li").eq(i).addClass("select").siblings().removeClass("select");
    }
    var t=setInterval(function(){
        i++;
        move();
    },3000);
    for(var j=0;j<size-1;j++){
        $(".hot .hotCont .head .right .li4 .menu").append("<li></li>");
    }
    $(".hot .hotCont .head .right .li4 .menu li").eq(0).addClass("select");
    $(".hot .hotCont .head .right .li4").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },3000);
    });
    $(".hot .hotCont .head .right .li4 .menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".hot .hotCont .head .right .li4 .menu li").eq(index).addClass("select").siblings().removeClass("select");
         $(".hot .hotCont .head .right .li4 .small").stop().animate({left:-index*520});
    });
    $(".hot .hotCont .head .right .li4 .btn_l").click(function(){
        i--;
        move();
    });
    $(".hot .hotCont .head .right .li4 .btn_r").click(function(){
        i++;
        move();
    });
    $(".hot .hotCont .head .right .li4").mouseenter(function(){
        $(".hot .hotCont .head .right .li4 div").fadeIn();
    });
    $(".hot .hotCont .head .right .li4").mouseleave(function(){
        $(".hot .hotCont .head .right .li4 div").fadeOut();
    });
});

// btm的换一批
$(function(){
     var i=0,n;
    $(".hot .hotCont .btm .last").click(function(){
        if (i%2==0){
            n=0;
        }else{
            n=1;
        }
       $(".hot .hotCont .btm ul").eq(n).fadeIn().siblings("ul").fadeOut();
       i++;
    });
});


// 5f轮播的js
// li1
$(function(){
    var clone=$(".brand .brandCont .right ul .li1 ul li").eq(0).clone();
    $(".brand .brandCont .right ul .li1 ul").append(clone);
    var size=$(".brand .brandCont .right ul .li1 ul li").size();
    var i=0;
    function move(){
        if (i==size){
            $(".brand .brandCont .right ul li.li1 ul").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".brand .brandCont .right ul .li1 ul").stop().animate({left:-i*398}); 
        }
        $(".brand .brandCont .right ul .li1 ul").stop().animate({left:-i*398});
    }
        i++;
        move();
    $(".brand .brandCont .right ul .li1 .btn_l").click(function(){
        i--;
        move();
    });
    $(".brand .brandCont .right ul .li1 .btn_r").click(function(){
        i++;
        move();
    });
    $(".brand .brandCont .right ul .li1").mouseenter(function(){
        $(".brand .brandCont .right ul .li1 div").fadeIn();
    });
    $(".brand .brandCont .right ul .li1").mouseleave(function(){
        $(".brand .brandCont .right ul .li1 div").fadeOut();
    });
});
// li2
$(function(){
    var clone=$(".brand .brandCont .right ul .li2 ul li").eq(0).clone();
    $(".brand .brandCont .right ul .li2 ul").append(clone);
    var size=$(".brand .brandCont .right ul .li2 ul li").size();
    var i=0;
    function move(){
        if (i==size){
            $(".brand .brandCont .right ul li.li2 ul").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".brand .brandCont .right ul .li2 ul").stop().animate({left:-i*398}); 
        }
        $(".brand .brandCont .right ul .li2 ul").stop().animate({left:-i*398});
    }
        i++;
        move();
    $(".brand .brandCont .right ul .li2 .btn_l").click(function(){
        i--;
        move();
    });
    $(".brand .brandCont .right ul .li2 .btn_r").click(function(){
        i++;
        move();
    });
    $(".brand .brandCont .right ul .li2").mouseenter(function(){
        $(".brand .brandCont .right ul .li2 div").fadeIn();
    });
    $(".brand .brandCont .right ul .li2").mouseleave(function(){
        $(".brand .brandCont .right ul .li2 div").fadeOut();
    });
});
// li3
$(function(){
    var clone=$(".brand .brandCont .right ul .li3 ul li").eq(0).clone();
    $(".brand .brandCont .right ul .li3 ul").append(clone);
    var size=$(".brand .brandCont .right ul .li3 ul li").size();
    var i=0;
    function move(){
        if (i==size){
            $(".brand .brandCont .right ul li.li3 ul").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".brand .brandCont .right ul .li3 ul").stop().animate({left:-i*398}); 
        }
        $(".brand .brandCont .right ul .li3 ul").stop().animate({left:-i*398});
    }
        i++;
        move();
    $(".brand .brandCont .right ul .li3 .btn_l").click(function(){
        i--;
        move();
    });
    $(".brand .brandCont .right ul .li3 .btn_r").click(function(){
        i++;
        move();
    });
    $(".brand .brandCont .right ul .li3").mouseenter(function(){
        $(".brand .brandCont .right ul .li3 div").fadeIn();
    });
    $(".brand .brandCont .right ul .li3").mouseleave(function(){
        $(".brand .brandCont .right ul .li3 div").fadeOut();
    });
});
// li4
$(function(){
    var clone=$(".brand .brandCont .right ul .li4 ul li").eq(0).clone();
    $(".brand .brandCont .right ul .li4 ul").append(clone);
    var size=$(".brand .brandCont .right ul .li4 ul li").size();
    var i=0;
    function move(){
        if (i==size){
            $(".brand .brandCont .right ul li.li4 ul").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".brand .brandCont .right ul .li4 ul").stop().animate({left:-i*398}); 
        }
        $(".brand .brandCont .right ul .li4 ul").stop().animate({left:-i*398});
    }
        i++;
        move();
    $(".brand .brandCont .right ul .li4 .btn_l").click(function(){
        i--;
        move();
    });
    $(".brand .brandCont .right ul .li4 .btn_r").click(function(){
        i++;
        move();
    });
    $(".brand .brandCont .right ul .li4").mouseenter(function(){
        $(".brand .brandCont .right ul .li4 div").fadeIn();
    });
    $(".brand .brandCont .right ul .li4").mouseleave(function(){
        $(".brand .brandCont .right ul .li4 div").fadeOut();
    });
});

// 6f的js 样式

$(function(){
    var clone=$(".man .manCont .btm .btmCont ul").eq(0).clone();
    $(".man .manCont .btm .btmCont").append(clone);
    var size=$(".man .manCont .btm .btmCont ul").size();
    var i=0;
    function move(){
        if (i==size){
            $(".man .manCont .btm .btmCont").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".man .manCont .btm .btmCont").stop().animate({left:i*1200}); 
        }
        $(".man .manCont .btm .btmCont").stop().animate({left:-i*1200}); 
    }   
    $(".man .manCont .btm .btn_l").click(function(){
        i--;
        move();
    });
    $(".man .manCont .btm .btn_r").click(function(){
        i++;
        move();
    });
});

// 7f的js样式
$(function(){
    $(".news .newsCont ul li>a").append("<span class='overlay'></span>");
    $(".news .newsCont ul li").hover(function(){
        $(this).find(".txt").slideToggle().next().slideToggle();
    });
});
      


// leftNav开始
      // $(function(){
      //     var T;
      //     $(".leftNav li").click(function(){
      //         var i=$(this).index();
      //         T=$("body>div").eq(i).offset().top;
      //         $(this).addClass("focus").siblings().removeClass("focus");
      //         $("body").animate({scrollTop: T},1000);
      //     });
         
      //     $(document).scroll(function(){
      //        var T=$("body").scrollTop()+500;
      //            for(var j=0;j<5;j++){
      //               divT=$("body>div").eq(j).offset().top;
      //               if (T>divT){
      //                 $(".leftNav li").eq(j).addClass("focus").siblings().removeClass("focus");
      //               }
      //            }
      //     });            
      // });    
    $(function(){           
  


            $(".leftNav li").click(function(){
              var i=$(this).index();
              if(i==0){
                $("body").animate({scrollTop: 300},400);
              }else if(i==1){
                $("body").animate({scrollTop: 700},400);
             }else if(i==2){
                $("body").animate({scrollTop: 1500},400);
             }else if(i==3){
                $("body").animate({scrollTop: 2400},400);
             }else if(i==4){
                $("body").animate({scrollTop: 3300},400);
             }else{
                 $("body").animate({scrollTop: 0},400);
             };
      });
              $(document).scroll(function(){
             var T=$("body").scrollTop();
                   if(T>=3300){
               $(".leftNav li").eq(4).addClass("focus").siblings().removeClass("focus");
              }else if(T>=2400){
                 $(".leftNav li").eq(3).addClass("focus").siblings().removeClass("focus");
             }else if(T>=1500){
                   $(".leftNav li").eq(2).addClass("focus").siblings().removeClass("focus");
             }else if(T>=700){
                  $(".leftNav li").eq(1).addClass("focus").siblings().removeClass("focus");
             }else if(T>=300){
                $(".leftNav li").eq(0).addClass("focus").siblings().removeClass("focus");
             }else{
                $(".leftNav li").eq(0).addClass("focus").siblings().removeClass("focus");
             };
          });
          $(document).scroll(function(){
             var T=$("body").scrollTop();
             if(T>300){
                  $(".leftNav").slideDown();
             }else{
                 $(".leftNav").slideUp();
             }
          });

 });