 $(function(){
    console.log(1);
        $(".news div").first().show();
        $(".news ul li").first().addClass("active");
        $(".news ul li").click(function(){
            $(this).addClass("active").siblings().removeClass("active");
            var i=$(this).index();
            $(".news>div").eq(i).show().siblings("div").hide();
        });

 // 全选
         var i=0;
 $("#Checkbox1").click(function () {
    i++;
        if(i%2==1){
          //   $(".gwc_tb2 input[name=newslist]").each(function () {
          // $(this).attr("checked", true);});
           $(".news input[type=checkbox]").prop("checked", true);
           
      }else{
           $(".news input[type=checkbox]").prop("checked", false);
       }
  });
    });



