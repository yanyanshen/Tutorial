window.onload=function(){
        var bigImg=document.getElementById("big");
        var divObj=document.getElementById("small_bg");
        var imgs=divObj.getElementsByTagName("img");
        var w;
                for (var i=0;i<imgs.length;i++){
                    imgs[i].w=i; 
                   imgs[i].onmouseover=function(){
                     bigImg.src="images/xq_"+this.w+".jpg";
               }
      }

    }
// 焦点图选择样式
$(function(){
  // $(".jiaodian ul li").eq(0).addClass("select");
  $(".jiaodian ul li").hover(function(){
      $(this).addClass("select").siblings().removeClass("select");
  },function(){
      $(".jiaodian ul li").removeClass("select");
  });
  // 置顶导航
  $(document).scroll(function(){
             var aa=$("body").scrollTop();
             if (aa>140){
                $(".fixnav").fadeIn();
             }else{
                $(".fixnav").fadeOut();
             }
            });
});
