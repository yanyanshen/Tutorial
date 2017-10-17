/**
 * Created by Administrator on 2016/7/6.
 */
$(function(){
    $(".reg div").first().show();
    $(".reg ul li").first().addClass("active");
    $(".reg ul li").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
        var i=$(this).index();
        console.log(i);
        $(".reg div").eq(i).show().siblings("div").hide();
    });
});