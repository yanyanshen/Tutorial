 // 支付方式
 $(function(){ 
  $(".wayCont ul li").first().addClass("select");
     $(".shaddress:first p:first").addClass("p1");

     $("#orderaddress").html($(".shaddress:first p:first").siblings('.p2').text()+' 收货人:'+"<span id='name'>"+$(".shaddress:first p:first").text()+"</span>");
   $(".wayCont ul li").click(function(){
        var index=$(this).index();
        $(".wayCont ul li").eq(index).addClass("select").siblings().removeClass("select");
        });
     $(".shaddress").each(function(){
         $(this).find("p:first").click(function(){
             $(this).addClass('p1');
             $(this).parent().siblings().find("p:first").removeClass('p1');
             //alert($(this).text()+$(this).siblings('.p2').text())
             $("#orderaddress").html($(this).siblings('.p2').text()+' 收货人:'+"<span id='name'>"+$(this).text()+"</span>");
         });
     })

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
                setup();preselect('北京市');promptinfo();
                $("#s3").change(promptinfo);
            });
           $(".pop h3 a").click(function(){
              $(".overlay").hide();
                $(".pop").hide();
           });
       });

 });



