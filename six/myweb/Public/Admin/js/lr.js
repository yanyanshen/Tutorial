 // 使用用户名/使用邮箱/使用手机号 注册页面切换  验证程序
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

