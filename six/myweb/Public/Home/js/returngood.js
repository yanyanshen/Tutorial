 $(function(){
        $(".news div").eq(0).show();
        $(".news ul li").first().addClass("active");
        $(".news ul li").click(function(){
            $(this).addClass("active").siblings().removeClass("active");
            var i=$(this).index();
            $(".news div").eq(i).show().siblings("div").hide();
        });
    });





