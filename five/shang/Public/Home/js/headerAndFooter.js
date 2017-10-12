
//置顶导航istop的js
    $(function(){
         $(document).scroll(function(){
        var c=$("body").scrollTop();
        //   navTop的js
        if (c>140){
                $(".istop").fadeIn();
             }else{
                $(".istop").fadeOut();
             }
    });
        $(".toTop").click(function(){
                $("body").animate({scrollTop:0},1000);
        }); 
    });

//  toTop的js
  $(function(){
         $(document).scroll(function(){
        var c=$("body").scrollTop();
        
        
        //  toTop的js
        if(c>140){
            $(".toTop").fadeIn();
        }else{
            $(".toTop").fadeOut();
        } 
    });
        $(".toTop").click(function(){
                $("body").animate({scrollTop:0},1000);
        }); 
    });

// rightNav样式
$(function(){
      var T;
      $(".rightNav li").click(function(){
          var i=$(this).index();
          T=$("body .floor").eq(i).offset().top;
          $(this).addClass("focus").siblings().removeClass("focus");
          $("body").animate({scrollTop: T},1000);
      });
     
      $(document).scroll(function(){
         var T=$("body").scrollTop();
             for(var j=0;j<7;j++){
                divT=$("body .floor").eq(j).offset().top;
                if (T>divT){
                  $(".rightNav li").eq(j).addClass("focus").siblings().removeClass("focus");
                }
             }
      }); 

  });    