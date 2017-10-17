$(function(){
    // 克隆第一个图片
    var clone=$(".lb-img li").eq(0).clone();
    $(".lb-img").append(clone);
    var size=$(".lb-img>li").size();
    // console.log(size+":");
    var width=$(".lb").width();
    console.log(width);
    // 实现轮播
    var i=0;
    function move(){
         if (i==size){
            $(".lb-img").css({left:0});
            i=1;
        }
        if (i==-1){
           i=2;
        $(".lb-img").stop.animate({left:-i*900});  
        }

      $(".lb-img").stop().animate({left:-i*900});
     }

    var t=setInterval(function(){
        i++;
        move();
    },3000);

    //鼠标悬停时停止轮播，离开后继续轮播

    $(".lb").hover(function(){
        clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
        },3000);
    });
    
    //单击后退按钮
    $(".lb .btn_l").click(function(){
        i--;
        move();
    });
    $(".lb .btn_r").click(function(){
        i++;
        move();
    });
});

// $(function(){
//     var clone=$(".lb-img li").eq(0).clone();
//     $(".lb-img").append(clone);
//     var size=$(".lb-img").size()

//     var i=0;

//     var t=setInterval(function(){
//         i++;
//         if (i==size){
//             $(".lb-img").css({left:0});
//             i=1;
//         }
//         $(".lb-img").animate({left:-i*900},800);
//     },1000);
// })




