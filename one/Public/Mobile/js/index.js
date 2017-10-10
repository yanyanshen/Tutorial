//-----------------------------------------------JS
window.onload=function(){
    var search=document.getElementsByTagName("input")[0];
    var val=search.placeholder;
    search.onclick=function(){
        search.placeholder="";
    }
    search.onblur=function(){
        search.placeholder=val;
    }
    setInterval(function(){
          var today=new Date();
          if(today.getHours()%2==0){
              var hours=today.getHours()+2;
          }else{
              var hours=today.getHours()+1;
          }
        if(today.getHours()<6){
              var hours=6;
        }
      var data=today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+' '+hours+':'+00+':'+00;
        var T=Date.parse(data);
          var T1=(T-today.getTime());//总毫秒
          var T2=T1/1000;//总秒数
          var timeh=document.getElementById("time-h");
        if(today.getHours()<6){
            timeh.innerHTML="距离"+06+"点场开始"+"还有:";
        }else{
            timeh.innerHTML="新品推荐";
        }

          T2=Math.round(T2);
          var S=T2%60;//秒数
          var M=(T2-S)/60;//总分钟数
          var H=M/60;//小时
          M=M%60;//分钟数
          H=Math.floor(H);
          if (H<10){
            H="0"+H;
          };
          if (M<10){
            M="0"+M;
          };
          if (S<10){
            S="0"+S;
          };
          var time=H+":"+M+":"+S;
          var time1=document.getElementById("time");
                time1.innerHTML="热门产品";
    });
}
//-----------------------------------------------JQ
$(function(){
      var w=document.documentElement.getBoundingClientRect().width;
    //------------------------------------轮播banner
        var i=0;
        var clone=$(".banner .banner-img li").eq(0).clone();
        $(".banner .banner-img").append(clone);
        function move(){
            if (i==6){
                $(".banner .banner-img").css({left:0});
                i=1;
            }
            $(".banner .banner-img").animate({left:-w*i},1000); 
            if(i==5){
                    $(".banner .banner-btn li").eq(0).addClass("focus").siblings().removeClass("focus");
            }else{
                    $(".banner .banner-btn li").eq(i).addClass("focus").siblings().removeClass("focus");
            }
        }
        var t=setInterval(function(){
            i++;   
            move();  
          },3000);
        $(".banner").hover(function(){
            clearInterval(t);
            $(".banner span").fadeIn();
        },function(){
            $(".banner span").fadeOut();
            t=setInterval(function(){
            i++; 
            move();    
          },3000);
        });
        $(".prev").click(function(){
            i--;
            if(i<0){
                i=0;
            }
            move();
        })
        $(".banner .next").click(function(){
            i++;
            move();
        })
        $(".banner .banner-btn li").click(function(){
            var a=$(this).index();
            $(".banner-img").animate({left:-w*a},1000);
            i=a;
            $(this).addClass("focus").siblings().removeClass("focus");
            });
//-------------------------------------------------双行文本滚动
        var h=$(".text").height();
        setInterval(function(){
            $(".text ul").animate({top:-h},1000,function(){
                $(this).find("li").first().appendTo(this);
                $(this).css({top:0});
            });
        },2000);
//------------------------------------------------试用页table切换
  $(".u2").show().siblings().hide();
  $(".check div").hover(function(){
    var a=$(this).index();
    $(".wrapper").children("div").eq(a).fadeOut(500).siblings().fadeIn(500);
    $(".check div span").eq(a).addClass("focus").parent().parent().siblings().find("span").removeClass("focus");
   });
});