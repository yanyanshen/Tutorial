// 导航获取焦点

$(function(){
   
    $(".topNav .topNavCont ul li").eq(0).addClass("focus");
    $(".topNav .topNavCont ul li").hover(function(){
    $(this).addClass("focus").siblings().removeClass("focus");
    });
});



// banner效果
 $(function(){
    var clone=$(".banner_img li").eq(0).clone();
    $(".banner_img").append(clone);
    var size=$(".banner_img li").size();


    var i=0;
    function move(){
        if (i==size){
            $(".banner_img").css({left:0});
            i=1;
        }
        if(i==-1){
            i=3;
            $(".banner_img").stop().animate({left:-i*1920},4000);
        }
        if (i==size-1){
            $(".banner_menu li").eq(0).addClass("current").siblings().removeClass("current");
        }else{
            $(".banner_menu li").eq(i).addClass("current").siblings().removeClass("current");
        }

    $(".banner_img").stop().animate({left:-i*1920});
    $(".banner_menu li").eq(i).addClass("current").siblings().removeClass("current");
}
    var t=setInterval(function(){
        i++;
        move();
    },4000);

 // 鼠标悬停 
    $(".banner").hover(function(){
           clearInterval(t);
    },function(){
        t=setInterval(function(){
            i++;
            move();
    },4000);
    });
    // 按钮
    for (var j=0;j<size-1;j++){
        $(".banner_menu").append("<li></li>");
    }
    $(".banner_menu li").eq(0).addClass("current");
// 单击按钮显示图片
    $(".banner_menu li").click(function(){
        var index=$(this).index();
        i=index;
        $(".banner_img").stop().animate({left:-i*1920},800);
        $(".banner_menu li").eq(index).addClass("current").siblings().removeClass("current");
    });
// 单击箭头图片前进后退
    $(".banner .btn_l").click(function(){
        i--;
        move();
    });
    $(".banner .btn_r").click(function(){
        i++;
        move();
    });

});
// 品牌街tab
 $(function(){
    $(".cont .wall .wallR div").hide();
        $(".cont .wall .wallR  div").first().show();
        $(".cont .wall .wallR .rt li").first().addClass("click");
        $(".cont .wall .wallR .rt li").hover(function(){
            $(this).addClass("click").siblings().removeClass("click");
            var i=$(this).index();
            $(".cont .wall .wall_cont .wallR div").eq(i).show().siblings("div").hide();
        });
    });
 // 洗发护发teb
 $(function(){
        $(".cont .hair .hair_cont .cont_r div").hide();
        $(".cont .hair .hair_cont .cont_r div").first().show();
        $(".cont .hair .hair_cont .cont_r .rt li").first().addClass("click");
        $(".cont .hair .hair_cont .cont_r .rt li").hover(function(){
            $(this).addClass("click").siblings().removeClass("click");
            var i=$(this).index();
            $(".cont .hair .hair_cont .cont_r div").eq(i).show().siblings("div").hide();
        });
    });
  // 洗发护发覆盖层
  // 
  // 
  // 1
  $(function(){
        //给每个li中a添加元素overlay
        $(".cont .hair .hair_cont .cont_r .hair1 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .hair .hair_cont .cont_r .hair1 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });


  // 2
  $(function(){
        //给每个li中a添加元素overlay
        $(".cont .hair .hair_cont .cont_r .hair2 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .hair .hair_cont .cont_r .hair2 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });
  // 3
$(function(){
        //给每个li中a添加元素overlay
        $(".cont .hair .hair_cont .cont_r .hair3 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .hair .hair_cont .cont_r .hair3 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });
// 4
$(function(){
        //给每个li中a添加元素overlay
        $(".cont .hair .hair_cont .cont_r .hair4 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .hair .hair_cont .cont_r .hair4 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });
// 5

  // 身体清洁teb
 $(function(){
        $(".cont .clear .clear_cont .cont_r div").hide();
        $(".cont .clear .clear_cont .cont_r div").first().show();
        $(".cont .clear .clear_cont .cont_r .rt li").first().addClass("click");
        $(".cont .clear .clear_cont .cont_r .rt li").hover(function(){
            $(this).addClass("click").siblings().removeClass("click");
            var i=$(this).index();
            $(".cont .clear .clear_cont .cont_r div").eq(i).show().siblings("div").hide();
        });
    });
 // 口腔护理teb
 $(function(){
        $(".cont .oral .oral_cont .cont_r div").hide();
        $(".cont .oral .oral_cont .cont_r div").first().show();
        $(".cont .oral .oral_cont .cont_r .rt li").first().addClass("click");
        $(".cont .oral .oral_cont .cont_r .rt li").hover(function(){
            $(this).addClass("click").siblings().removeClass("click");
            var i=$(this).index();
            $(".cont .oral .oral_cont .cont_r div").eq(i).show().siblings("div").hide();
        });
    });
 // 口腔护理覆盖层
  // 1
  $(function(){
        //给每个li中a添加元素overlay
        $(".cont .oral .oral_cont .cont_r .oral1 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .oral .oral_cont .cont_r .oral1 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });


  // 2
  $(function(){
        //给每个li中a添加元素overlay
        $(".cont .oral .oral_cont .cont_r .oral2 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .oral .oral_cont .cont_r .oral2 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });
  // 3
$(function(){
        //给每个li中a添加元素overlay
        $(".cont .oral .oral_cont .cont_r .oral3 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .oral .oral_cont .cont_r .oral3 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });
// 4
$(function(){
        //给每个li中a添加元素overlay
        $(".cont .oral .oral_cont .cont_r .oral4 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .oral .oral_cont .cont_r .oral4 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });

 // 女士护理tab
  $(function(){
        $(".cont .women .women_cont .cont_r div").hide();
        $(".cont .women .women_cont .cont_r div").first().show();
        $(".cont .women .women_cont .cont_r .rt li").first().addClass("click");
        $(".cont .women .women_cont .cont_r .rt li").hover(function(){
            $(this).addClass("click").siblings().removeClass("click");
            var i=$(this).index();
            $(".cont .women .women_cont .cont_r div").eq(i).show().siblings("div").hide();
        });
    });
  // 女士护理覆盖层
  $(function(){
        //给每个li中a添加元素overlay
        $(".cont .women .women_cont .cont_r .women1 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .women .women_cont .cont_r .women1 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });
  $(function(){
        //给每个li中a添加元素overlay
        $(".cont .women .women_cont .cont_r .women2 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .women .women_cont .cont_r .women2 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });
  // 品牌墙图片覆盖层
  $(function(){
        //给每个li中a添加元素overlay
        $(".cont .wall .wall_cont .wallL ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .wall .wall_cont .wallL ul li").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });
  // 身体清洁覆盖层
  // 1
  $(function(){
        //给每个li中a添加元素overlay
        $(".cont .clear .clear_cont .cont_r .clear1 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .clear .clear_cont .cont_r .clear1 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });


  // 2
  $(function(){
        //给每个li中a添加元素overlay
        $(".cont .clear .clear_cont .cont_r .clear2 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .clear .clear_cont .cont_r .clear2 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });
  // 3
$(function(){
        //给每个li中a添加元素overlay
        $(".cont .clear .clear_cont .cont_r .clear3 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .clear .clear_cont .cont_r .clear3 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });
// 4
$(function(){
        //给每个li中a添加元素overlay
        $(".cont .clear .clear_cont .cont_r .clear4 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .clear .clear_cont .cont_r .clear4 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });
// 5
$(function(){
        //给每个li中a添加元素overlay
        $(".cont .clear .clear_cont .cont_r .clear5 ul li a").append("<span class='overlay'></span>");

        //经过li时让overlay,txt过渡动画
        $(".cont .clear .clear_cont .cont_r .clear5 ul li ").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });



$(function(){
    $(document).scroll(function(){
             var w=$("body").scrollTop();
             if (w>500){
                $(".topNav1").fadeIn();
             }else{
                $(".topNav1").fadeOut();
             }
        
      
             var w=$("body").scrollTop();

             if (w>1200){
                $("#toTop").fadeIn();
             }else{
                $("#toTop").fadeOut();
             }
         });
             $("#toTop").click(function(){
              $("body").animate({scrollTop:0},1000);
          });
          
      });   


















// 登录注册特效
$(function(){
           
           
            $(".input a").click(function(){
                $(".overlay").fadeIn(1000);
                $(".pop").fadeIn(1000);
            });
           $(".pop h3 a").click(function(){
              $(".overlay").hide();
                $(".pop").hide();
           });
       });     



   window.onload=function(){
        var user=document.getElementsByName("user")[0];
           password=document.getElementById("t2");
           click=document.getElementById("t3");
       
            // user.focus();

            user.onfocus=function(){
              
              user.value="";
             
              // console.log(user.type);
            }
            password.onfocus=function(){
              
              password.value="";
           
              // console.log(user.type);
            }
            click.onfocus=function(){
              
              click.value="";
             
              // console.log(user.type);
            }
          
        
   }
   $(function(){
           
           
            $(".input a").click(function(){
                $(".overlay").fadeIn(1000);
                $(".pop").fadeIn(1000);
            });
           $(".pop h3 a").click(function(){
              $(".overlay").hide();
                $(".pop").hide();
           });
       });     



   window.onload=function(){
        var user=document.getElementsByName("user")[0];
           password=document.getElementById("t2");
           click=document.getElementById("t3");
       
            // user.focus();

            user.onfocus=function(){
              
              user.value="";
             
              // console.log(user.type);
            }
            password.onfocus=function(){
              
              password.value="";
           
              // console.log(user.type);
            }
            click.onfocus=function(){
              
              click.value="";
             
              // console.log(user.type);
            }
          
        
   }





   window.onload=function(){
        var phone=document.getElementById("t1");
           click=document.getElementById("t2");
           message=document.getElementById("t3");
           password=document.getElementById("t4");
           user=document.getElementById("t5");
            // user.focus();

            phone.onfocus=function(){
              
              phone.value="";
    
            }
            click.onfocus=function(){
              
              click.value="";
    
            }
            message.onfocus=function(){
              
              message.value="";
    
            }
            password.onfocus=function(){
              
              password.value="";
           
            
            }
            user.onfocus=function(){
              
              user.value="";
             
            
            }
          
        
   }

