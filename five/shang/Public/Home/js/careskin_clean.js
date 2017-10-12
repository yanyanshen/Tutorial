$(function(){
    //show翻页、页码增加
    var clone=$(".product .bg ul").eq(0).clone();
    $(".product .bg").append(clone);
    var size=$(".product .bg ul").size();
    var i=0;
    // var i=size;  
    var t = $("#page");  
    $(".add").click(function(){
        i++;
        t.val(parseInt(t.val())+1)  
        if(i>(size-1)){
            t.val(size);
            i=size-1;
         $(".bg").stop().animate({top:-(size-1)*1060});        
        }else{       
            $(".bg").stop().animate({top:-i*1060})}
            // setTotal();  
    });  
    $(".min").click(function(){ 
        i--; 
        console.log(i);
        t.val(parseInt(t.val())-1) 
        if(i<0){
            t.val(1);
            i=0;
         $(".bg").stop().animate({top:i*1060});        
        } 
        $(".bg").stop().animate({top:-i*1400}); 
         // setTotal();
    });
     // $(document).scroll(function(){
     //    var w=$("body").scrollTop();
     //         if (w>700){
     //            $(".toTop").fadeIn();
     //         }else{
     //            $(".toTop").fadeOut();
     //         }
     //      });
});