//-----------------------------------------------JS

//-----------------------------------------------JQ
$(function(){
      var w=document.documentElement.getBoundingClientRect().width;
    //------------------------------------轮播banner
        var i=0;
        var clone=$(".banner .banner-img li").eq(0).clone();
        $(".banner .banner-img").append(clone);
        function move(){
            if (i==6){
                $(".banner .banner-img").css({left:0});
                i=1;
            }
            $(".banner .banner-img").animate({left:-w*i},1000); 
            if(i==5){
                    $(".banner .banner-btn li").eq(0).addClass("focus").siblings().removeClass("focus");
            }else{
                    $(".banner .banner-btn li").eq(i).addClass("focus").siblings().removeClass("focus");
            }
        }
        var t=setInterval(function(){
            i++;   
            move();  
          },3000);
        $(".banner").hover(function(){
            clearInterval(t);
            $(".banner span").fadeIn();
        },function(){
            $(".banner span").fadeOut();
            t=setInterval(function(){
            i++; 
            move();    
          },3000);
        });
        $(".prev").click(function(){
            i--;
            if(i<0){
                i=0;
            }
            move();
        })
        $(".banner .next").click(function(){
            i++;
            move();
        })
        $(".banner .banner-btn li").click(function(){
            var a=$(this).index();
            $(".banner-img").animate({left:-w*a},1000);
            i=a;
            $(this).addClass("focus").siblings().removeClass("focus");
            });
//-------------------------------------------------双行文本滚动
        var h=$(".text").height();
        setInterval(function(){
            $(".text ul").animate({top:-h},1000,function(){
                $(this).find("li").first().appendTo(this);
                $(this).css({top:0});
            });
        },2000);
//------------------------------------------------试用页table切换
  $(".u2").show().siblings().hide();
  $(".check div").hover(function(){
    var a=$(this).index();
    $(".wrapper").children("div").eq(a).fadeOut(500).siblings().fadeIn(500);
    $(".check div span").eq(a).addClass("focus").parent().parent().siblings().find("span").removeClass("focus");
   });
});