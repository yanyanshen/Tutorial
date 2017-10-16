// 淘宝风聚焦图动效
$(document).ready(function(){
    $(".jqzoom").imagezoom();
    
    $("#thumblist li a").hover(function(){
        $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
        $(".jqzoom").attr('src',$(this).find("img").attr("mid"));
        $(".jqzoom").attr('rel',$(this).find("img").attr("big"));
    });
});
// 勾选商品种类
$(function(){ 
  $(".sale .ul2 li").eq(0).addClass("select");
   $(".sale .ul2 li").click(function(){
        var index=$(this).index();
        $(".sale .ul2 li").eq(index).addClass("select").siblings().removeClass("select");
        });
});
// // 数量加减时 
$(function () {
        var t = $("#text_box1");
        $("#min1").click(function () {
            t.val(parseInt(t.val()) - 1)
            if(t.val()<0){t.val(0);}
            setTotal(); GetCount(); 
        })
        $("#add1").click(function () {
            t.val(parseInt(t.val()) + 1)
            setTotal(); GetCount();
        })             
})
// 猜您喜欢 覆盖层
 $(function(){
        //给每个li中a添加元素overlay
        $(".guess li").append("<span class='overlay'></span>");
        //经过li时让overlay,txt过渡动画
        $(".guess li").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });        
     }); 
// 获取商品详情距离顶部部多高
// 置顶导航和返回顶部js
$(function(){
    $(document).scroll(function(){
      var h=$(".container .content .detail").offset();
       console.log(h);
       var w=$("body").scrollTop();
       if (w>200){
          $(".toTop").fadeIn();
       }else{
          $(".toTop").fadeOut();
       }
       if (w>924){
          $(".rightNav").fadeIn();
       }else{
          $(".rightNav").fadeOut();
       }
    });
    $(".toTop").click(function(){
        $("body").animate({scrollTop: 0},1000);
    });    
});
