$(function () {
    $('.search input').focus(function (){//得到焦点时触发的时间

        $('.search input').css("border","1px solid #0683D2");
    })
    $('.search input').blur(function (){ //失去焦点时触发的时间
        $('.search input').css("border","1px solid #bfbfbf");
    });
})

//订单管理
$(function(){
    console.log(1);
    $(".orderCont div").first().show();
    $(".orderCont ul li").first().addClass("active");
    $(".orderCont ul li").mousemove(function(){
        $(this).addClass("active").siblings().removeClass("active");
        var i=$(this).index();
        $(".orderCont>div").eq(i).show().siblings("div").hide();
    });
})