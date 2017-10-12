 window.onload=function(){
        var bigImg=document.getElementById("bigImg");
        var divObj=document.getElementById("small");
        var lis=divObj.getElementsByTagName("li");
        var w;
                for (var i=0;i<lis.length;i++){
                    lis[i].w=i;
                    
                   lis[i].onmouseover=function(){
                     bigImg.src="images/xifa"+this.w+".jpg";
                     this.style.border="1px solid red";
               }
                    lis[i].onmouseout=function(){
                        this.style.border="1px solid #999";
                    }
      }

    }




$(function(){ 
    $(".add").click(function(){ 
    var t=$(this).parent().find('input[class*=text_box]'); 
    t.val(parseInt(t.val())+1) 
    setTotal(); 
}) 
$(".min").click(function(){ 
    var t=$(this).parent().find('input[class*=text_box]'); 
    t.val(parseInt(t.val())-1) 
    if(parseInt(t.val())<0){ 
    t.val(0); 
} 
setTotal(); 
}) 
}) 

 


















