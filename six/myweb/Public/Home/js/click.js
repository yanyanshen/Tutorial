 // 支付方式
 $(function(){ 
  $(".wayCont ul li").first().addClass("select");
   $(".wayCont ul li").click(function(){
        var index=$(this).index();
        $(".wayCont ul li").eq(index).addClass("select").siblings().removeClass("select");
        });

// 快递方式
     $(".optCont ul li").first().addClass("select");
      $(".optCont ul li").click(function(){
        var index=$(this).index();
        $(".optCont ul li").eq(index).addClass("select").siblings().removeClass("select");
        });

// 弹出层
   $(function(){
           // setTimeout(function(){
           //      $(".overlay").show();
           //      $(".pop").show();
           //  },5000);
           
            $(".show a").click(function(){
                $(".overlay").fadeIn(500);
                $(".pop").fadeIn(500);
            });
           $(".pop h3 a").click(function(){
              $(".overlay").hide();
                $(".pop").hide();
           });
       });

 });



