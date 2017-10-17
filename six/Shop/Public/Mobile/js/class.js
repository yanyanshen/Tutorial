//.........................table切换
$(function(){
    $(".class .right>div").eq(0).siblings("div").hide();
    $(".class .left ul li").click(function(){
        var i=$(this).index();
        $(".class .right>div").eq(i).show().siblings("div").hide();
        $(this).addClass("active").siblings().removeClass("active");
    })
});

  





















