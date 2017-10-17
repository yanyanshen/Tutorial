$(function(){
      //----------------复制第一个图片
        var clone=$(".banner .banner-img li").eq(0).clone();
        $(".banner .banner-img").append(clone);
      //----------------加定时器，轮播
        var i=0;
        function move(){
            if (i==4){
                $(".banner .banner-img").css({left:0});
                i=1;
            }
           var w=document.documentElement.getBoundingClientRect().width;                                 
            $(".banner .banner-img").animate({left:-w*i},500);
            if (i==3){
              $(".banner .banner-btn li").eq(0).addClass("foucs").siblings().removeClass("foucs");
            }else{
              $(".banner .banner-btn li").eq(i).addClass("foucs").siblings().removeClass("foucs");
            }
        }
        var t=setInterval(function(){
            i++;
            move();
        },4000);
      
        //-------------------------鼠标经过banner，停止定时器
        $(".banner").hover(function(){
          clearInterval(t);
        },function(){
          t=setInterval(function(){
            i++;
            move();
          },4000);
        });
        //-------------------------单击按钮
        $(".banner .banner-btn li").click(function(){
          var index=$(this).index();
          var w=document.documentElement.getBoundingClientRect().width;
          $(".banner .banner-img").animate({left:-w*index});
          i=index;
          $(".banner .banner-btn li").eq(i).addClass("foucs").siblings().removeClass("foucs");

        });
});

