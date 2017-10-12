// JavaScript Docume 
$(function(){
    var clone=$(".banner_bg li").eq(0).clone();
    $(".banner_bg").append(clone);
    var size=$(".banner_bg li").size();
    // -----------------实现轮播
    var i=0;
    function move(){
        //当已经轮播到最后一幅图，也就是第一幅图时
        if (i==size){
            $(".banner_bg").css({left:0});
            i=1;
        }
        if (i==size-1){
            $(".banner_menu li").eq(0).addClass("select").siblings().removeClass("select");
        }else{
            $(".banner_menu li").eq(i).addClass("select").siblings().removeClass("select");
        }
        //两幅图之间的过渡，以及按钮相应的显示
        $(".banner_bg").stop().animate({left:-i*1920});
    }
    //--------------------按钮
    for(var j=0;j<size-1;j++){
        $(".banner_menu").append("<li></li>");
    }

    $(".banner_menu li").eq(0).addClass("select");

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
    $(".banner_menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".banner_menu li").eq(index).addClass("select").siblings().removeClass("select");
         $(".banner_bg").stop().animate({left:-index*1920});
    });
    var t=setInterval(function(){
        i++;
        move();
    },3000);
    // 覆盖层
    $(".hot_cont ul li div").append("<span class='overlay'></span>");
    $(".hot_cont ul li").hover(function(){
        $(this).find(".txt").slideToggle().next().slideToggle(); 
    });
     });
//小轮播
// $(function(){
//     var t=setInterval(function(){
//       $(".lunbo ul").stop().animate({left:-228},1000,function(){
//           $(this).find("li").first().appendTo(this);
//           $(this).css({left:0});
//       });
//     },2000)
    //鼠标经过时停止轮播
//     $(".new_cont").hover(function(){
//         clearInterval(t);
//         console.log(1);
//     },function(){
//       t=setInterval(function(){
//       $(".new_cont ul").stop().animate({left:-228},1000,function(){
//           $(this).find("li").first().appendTo(this);
//           $(this).css({left:0})});    
//     },2000);  
//     });
// });

$(function(){
    var clone=$(".new_cont ul").eq(0).clone();
    $(".new_cont").append(clone);
    var size=$(".new_cont ul").size();
    console.log(size);
    // -----------------实现轮播
    var i=0;
    function move(){

        if (i==size){
            $(".new_cont").css({left:0});
            i=1;
        }
        if(i==-1){
            i=1;
            $(".new_cont").stop().animate({left:-i*1200});
        }

        $(".new_cont").stop().animate({left:-i*1200});
    }    
    $(".lunbo").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },2000);
    });
    var t=setInterval(function(){
        i++;
        move();
    },4000);
    // 单击前进后退
    $(".bt .li1").click(function(){
        i--;
        console.log(i);
        move();
    });
    // 单击前进前进
    $(".bt .li2").click(function(){
        i++;
        console.log(i);
        move();
    });
});
// 洁面轮播
$(function(){
    var clone=$(".clean_bg li").eq(0).clone();
    $(".clean_bg").append(clone);
    var size=$(".clean_bg li").size();
    // -----------------实现轮播
    var i=0;
    function move(){
        //当已经轮播到最后一幅图，也就是第一幅图时
        if (i==size){
            $(".clean_bg").css({left:0});
            i=1;
        }
        if (i==size-1){
            $(".clean_menu li").eq(0).addClass("select").siblings().removeClass("select");
        }else{
            $(".clean_menu li").eq(i).addClass("select").siblings().removeClass("select");
        }
        //两幅图之间的过渡，以及按钮相应的显示
        $(".clean_bg").stop().animate({left:-i*300});
    }
    //--------------------按钮
    for(var j=0;j<size-1;j++){
        $(".clean_menu").append("<li></li>");
    }

    $(".clean_menu li").eq(0).addClass("select");

    //鼠标悬停时停止轮播，离开后继续轮播
    
    $(".clean_m").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },3000);
    });
    
    //单击按钮显示相应图片
    $(".clean_menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".clean_menu li").eq(index).addClass("select").siblings().removeClass("select");
         $(".clean_bg").stop().animate({left:-index*300});
    });
    var t=setInterval(function(){
        i++;
        move();
    },3000);
});
// 水轮播
$(function(){
    var clone=$(".shui_bg li").eq(0).clone();
    $(".shui_bg").append(clone);
    var size=$(".shui_bg li").size();
    // -----------------实现轮播
    var i=0;
    function move(){
        //当已经轮播到最后一幅图，也就是第一幅图时
        if (i==size){
            $(".shui_bg").css({left:0});
            i=1;
        }
        if (i==size-1){
            $(".shui_menu li").eq(0).addClass("select").siblings().removeClass("select");
        }else{
            $(".shui_menu li").eq(i).addClass("select").siblings().removeClass("select");
        }
        //两幅图之间的过渡，以及按钮相应的显示
        $(".shui_bg").stop().animate({left:-i*300});
    }
    //--------------------按钮
    for(var j=0;j<size-1;j++){
        $(".shui_menu").append("<li></li>");
    }

    $(".shui_menu li").eq(0).addClass("select");

    //鼠标悬停时停止轮播，离开后继续轮播
    
    $(".pro_shui_m").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },3000);
    });
    
    //单击按钮显示相应图片
    $(".shui_menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".shui_menu li").eq(index).addClass("select").siblings().removeClass("select");
         $(".shui_bg").stop().animate({left:-index*300});
    });
    var t=setInterval(function(){
        i++;
        move();
    },3000);
});
// 面霜轮播
$(function(){
    var clone=$(".cream_bg li").eq(0).clone();
    $(".cream_bg").append(clone);
    var size=$(".cream_bg li").size();
    // -----------------实现轮播
    var i=0;
    function move(){
        //当已经轮播到最后一幅图，也就是第一幅图时
        if (i==size){
            $(".cream_bg").css({left:0});
            i=1;
        }
        if (i==size-1){
            $(".cream_menu li").eq(0).addClass("select").siblings().removeClass("select");
        }else{
            $(".cream_menu li").eq(i).addClass("select").siblings().removeClass("select");
        }
        //两幅图之间的过渡，以及按钮相应的显示
        $(".cream_bg").stop().animate({left:-i*300});
    }
    //--------------------按钮
    for(var j=0;j<size-1;j++){
        $(".cream_menu").append("<li></li>");
    }

    $(".cream_menu li").eq(0).addClass("select");

    //鼠标悬停时停止轮播，离开后继续轮播
    
    $(".cream_m").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },3000);
    });
    
    //单击按钮显示相应图片
    $(".cream_menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".cream_menu li").eq(index).addClass("select").siblings().removeClass("select");
         $(".cream_bg").stop().animate({left:-index*300});
    });
    var t=setInterval(function(){
        i++;
        move();
    },3000);
});
// 面膜轮播
$(function(){
    var clone=$(".mianmo_bg li").eq(0).clone();
    $(".mianmo_bg").append(clone);
    var size=$(".mianmo_bg li").size();
    // -----------------实现轮播
    var i=0;
    function move(){
        //当已经轮播到最后一幅图，也就是第一幅图时
        if (i==size){
            $(".mianmo_bg").css({left:0});
            i=1;
        }
        if (i==size-1){
            $(".mianmo_menu li").eq(0).addClass("select").siblings().removeClass("select");
        }else{
            $(".mianmo_menu li").eq(i).addClass("select").siblings().removeClass("select");
        }
        //两幅图之间的过渡，以及按钮相应的显示
        $(".mianmo_bg").stop().animate({left:-i*300});
    }
    //--------------------按钮
    for(var j=0;j<size-1;j++){
        $(".mianmo_menu").append("<li></li>");
    }

    $(".mianmo_menu li").eq(0).addClass("select");

    //鼠标悬停时停止轮播，离开后继续轮播
    
    $(".mianmo_m").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },3000);
    });
    
    //单击按钮显示相应图片
    $(".mianmo_menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".mianmo_menu li").eq(index).addClass("select").siblings().removeClass("select");
         $(".mianmo_bg").stop().animate({left:-index*300});
    });
    var t=setInterval(function(){
        i++;
        move();
    },3000);
});
// tab选项卡
$(function(){
    $(".pro_clean_r ul div").first().addClass("select");
    $(".pro_clean_r div").first() .show();
    $(".pro_clean_r ul #li1,#li2,#li3").hover(function(){  
        $(this).addClass("select").siblings().removeClass("select");
        var i=$(this).index();
        $(".pro_clean_r ul div").eq(i).show().siblings("div").hide();
    });
        });
$(function(){
    $(".pro_shui_r ul div").first().addClass("select");
    $(".pro_shui_r ul div").first() .show();
    $(".pro_shui_r ul #li4,#li5,#li6").hover(function(){  
        $(this).addClass("select").siblings().removeClass("select");
        var i=$(this).index();
        $(".pro_shui_r ul div").eq(i).show().siblings("div").hide();
    });  
});
$(function(){
    $(".pro_cream_r ul div").first().addClass("select");
    $(".pro_cream_r ul div").first() .show();
    $(".pro_cream_r ul #li7,#li8,#li9").hover(function(){  
        $(this).addClass("select").siblings().removeClass("select");
        var i=$(this).index();
        $(".pro_cream_r ul div").eq(i).show().siblings("div").hide();
    });  
});
$(function(){
    $(".pro_mianmo_r ul div").first().addClass("select");
    $(".pro_mianmo_r ul div").first() .show();
    $(".pro_mianmo_r ul #li10,#li11,#li12").hover(function(){  
        $(this).addClass("select").siblings().removeClass("select");
        var i=$(this).index();
        $(".pro_mianmo_r ul div").eq(i).show().siblings("div").hide();
    });  
});
     

