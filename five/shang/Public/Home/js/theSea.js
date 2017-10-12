
//banner
$(function(){
    //------------------------克隆第一个图片
    var clone=$(".banner-img li").eq(0).clone();
    $(".banner-img").append(clone);
    var size=$(".banner-img li").size();
    var width=$(".banner").width();


    //-----------------实现轮播
    var i=0;
    function move(){

        if (i==size){
            $(".banner-img").css({left:0});
            i=1;
        }
        if (i==-1){
           i=3;
           $(".banner-img").stop().animate({left:-i*1920}); 
        }

        if (i==size-1){
            $(".banner-menu li").eq(0).addClass("select").siblings().removeClass("select");
        }else{
            $(".banner-menu li").eq(i).addClass("select").siblings().removeClass("select");
        }
 
        $(".banner-img").stop().animate({left:-i*1920});
        $(".banner-menu li").eq(i).addClass("select").siblings().removeClass("select");
    }

    var t=setInterval(function(){
        i++;
        move();
    },3000);
    

    for(var j=0;j<size-1;j++){
        $(".banner-menu").append("<li></li>");
    }

    $(".banner-menu li").eq(0).addClass("select");


    
    $(".banner").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },3000);
    });
    

    $(".banner-menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".banner-menu li").eq(index).addClass("select").siblings().removeClass("select");
        // console.log(index);
         $(".banner-img").stop().animate({left:-index*1920});
    });


    $(".banner .btn_l").click(function(){
        i--;
        move();
    });
    $(".banner .btn_r").click(function(){
        i++;
        move();
    });
});
//table选项卡
 $(function(){
             $(".table div").hide();
            $(".table div").first().show();
            $(".table>ul>li").eq(0).addClass("active")
            $(".table>ul>li").hover(function(){
                $(this).addClass("active").siblings().removeClass("active");
                var i=$(this).index();
                $(".table div").eq(i).show().siblings("div").hide();
            })
        })


$(function(){
             $(".table1>div").hide();
            $(".table1>div").first().show();
            $(".table1>ul>li").eq(0).addClass("active")
            $(".table1>ul>li").hover(function(){
                $(this).addClass("active").siblings().removeClass("active");
                var i=$(this).index();
                $(".table1>div").eq(i).show().siblings("div").hide();
            })
       

             $(".table2>div").hide();
            $(".table2>div").first().show();
            $(".table2>ul>li").eq(0).addClass("active")
            $(".table2>ul>li").hover(function(){
                $(this).addClass("active").siblings().removeClass("active");
                var i=$(this).index();
                $(".table2>div").eq(i).show().siblings("div").hide();
            })
     

             $(".table3>div").hide();
            $(".table3>div").first().show();
            $(".table3>ul>li").eq(0).addClass("active")
            $(".table3>ul>li").hover(function(){
                $(this).addClass("active").siblings().removeClass("active");
                var i=$(this).index();
                $(".table3>div").eq(i).show().siblings("div").hide();
            })
        })   



// 护肤轮播
$(function(){
    var clone=$(".tu-1 .box ul").eq(0).clone();
        $(".tu-1 .box").append(clone);
    var size=$(".tu-1 .box ul").size(); 
    var i=1;

        function move(){

        if (i==size){
            $(".box").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".box").stop().animate({left:-i*1038}); 
        }
 
        $(".box").stop().animate({left:-i*1038});
        
    }
	
        var t=setInterval(function(){
            if (i==size){
                $(".tu-1 .box").css({left:0});
                i=1;
            }
            $(".tu-1 .box").animate({left:-i*1038},2000);
            i++;
        },5000);

        $(".tu-1").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },5000);
    });
     $(".table1>h1").click(function(){
        i--;
        move();
    });
    $(".table1>h2").click(function(){
        i++;
        move();
    });    

});




$(function(){
    var clone=$(".tu-2 .box-2 ul").eq(0).clone();
        $(".tu-2 .box-2").append(clone);
    var size=$(".tu-2 .box-2 ul").size(); 
    var i=1;
     function move(){

        if (i==size){
            $(".box-2").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".box-2").stop().animate({left:-i*1038}); 
        }
 
        $(".box-2").stop().animate({left:-i*1038});
        
    }

        var t=setInterval(function(){
            if (i==size){
                $(".tu-2 .box-2").css({left:0});
                i=1;
            }
            $(".tu-2 .box-2").animate({left:-i*1038},2000);
            i++;
        },5000);
        
        $(".tu-2").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },5000);
    });
        $(".table1>h1").click(function(){
        i--;
        move();
    });
    $(".table1>h2").click(function(){
        i++;
        move();
    });    
});



// 化妆品轮播
$(function(){
    var clone=$(".tu-3 .box-3 ul").eq(0).clone();
        $(".tu-3 .box-3").append(clone);
    var size=$(".tu-3 .box-3 ul").size(); 
    var i=1;

        function move(){

        if (i==size){
            $(".box-3").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".box-3").stop().animate({left:-i*1038}); 
        }
 
        $(".box-3").stop().animate({left:-i*1038});
        
    }


        var t=setInterval(function(){
            if (i==size){
                $(".tu-3 .box-3").css({left:0});
                i=1;
            }
            $(".tu-3 .box-3").animate({left:-i*1038},2000);
            i++;
        },5000);
        $(".tu-3").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },5000);
    });
     $(".table2>h1").click(function(){
        i--;
        move();
    });
    $(".table2>h2").click(function(){
        i++;
        move();
    });    

});




$(function(){
    var clone=$(".tu-4 .box-4 ul").eq(0).clone();
        $(".tu-4 .box-4").append(clone);
    var size=$(".tu-4 .box-4 ul").size(); 
    var i=1;
     function move(){

        if (i==size){
            $(".box-4").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".box-4").stop().animate({left:-i*1038}); 
        }
 
        $(".box-4").stop().animate({left:-i*1038});
        
    }

        var t=setInterval(function(){
            if (i==size){
                $(".tu-4 .box-4").css({left:0});
                i=1;
            }
            $(".tu-4 .box-4").animate({left:-i*1038},2000);
            i++;
        },5000);
        
        $(".tu-4").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },5000);
    });
        $(".table2>h1").click(function(){
        i--;
        move();
    });
    $(".table2>h2").click(function(){
        i++;
        move();
    });    
});


// 香水轮播
$(function(){
    var clone=$(".tu-5 .box-5 ul").eq(0).clone();
        $(".tu-5 .box-5").append(clone);
    var size=$(".tu-5 .box-5 ul").size(); 
    var i=1;

        function move(){

        if (i==size){
            $(".box-5").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".box-5").stop().animate({left:-i*1038}); 
        }
 
        $(".box-5").stop().animate({left:-i*1038});
        
    }


        var t=setInterval(function(){
            if (i==size){
                $(".tu-5 .box-5").css({left:0});
                i=1;
            }
            $(".tu-5 .box-5").animate({left:-i*1038},2000);
            i++;
        },5000);
        
        $(".tu-5").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },5000);
    });  

     $(".table3>h1").click(function(){
        i--;
        move();
    });
    $(".table3>h2").click(function(){
        i++;
        move();
    });  


});




$(function(){
    var clone=$(".tu-6 .box-6 ul").eq(0).clone();
        $(".tu-6 .box-6").append(clone);
    var size=$(".tu-6 .box-6 ul").size(); 
    var i=1;
     function move(){

        if (i==size){
            $(".box-6").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
           $(".box-6").stop().animate({left:-i*1038}); 
        }
 
        $(".box-6").stop().animate({left:-i*1038});
        
    }

        var t=setInterval(function(){
            if (i==size){
                $(".tu-6 .box-6").css({left:0});
                i=1;
            }
            $(".tu-6 .box-6").animate({left:-i*1038},2000);
            i++;
        },5000);
        
       $(".tu-6").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },5000);
    });   
        
        $(".table3>h1").click(function(){
        i--;
        move();
    });
    $(".table3>h2").click(function(){
        i++;
        move();
    });  
    
});