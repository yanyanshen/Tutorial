$(document).ready(function(){
    $("input").eq(1).click(function(){
        $(".box img").attr("src","images/f1.jpg");
    });

     $("[type=button]").first().click(function(){
         $(".box img").slideUp(3000);
     });

});