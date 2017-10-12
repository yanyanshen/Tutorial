
// 返回顶部
$(function(){
    $(document).scroll(function(){
        var w=$("body").scrollTop();
             if (w>500){
                $(".toTop").fadeIn();
             }else{
                $(".toTop").fadeOut();
             }
          });

            $(".toTop").click(function(){
            $("body").animate({scrollTop:0},1000);
          });

// 置顶导航
    $(document).scroll(function(){
        var w=$("body").scrollTop();
        if (w>800){
                $(".topFixed").fadeIn();
        }else{
                $(".topFixed").fadeOut();
        }
    });






});








