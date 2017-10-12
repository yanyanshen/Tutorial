
     //  toTop的js
$(function(){
         $(document).scroll(function(){
        var c=$("body").scrollTop();
        if(c<1000){
            $(".toTop").fadeOut();
        }else{
            $(".toTop").fadeIn();
        } 
    });
        $(".toTop").click(function(){
                $("body").animate({scrollTop:0},1000);
        }); 
    });

// part3淘宝风焦点图


window.onload=function(){
// 第一个
        var bigImg=document.getElementById("big");
        var small=document.getElementById("small");
        var lis=small.getElementsByTagName("li");

        for(var i=0;i<lis.length;i++){
            lis[i].w=i;
            lis[i].onmouseover=function(){
            bigImg.src="images/recommend_lancome_part3_btm1_"+this.w+".jpg";
            }
        }

// 第二个
         var bigImg1=document.getElementById("big1");
        var small1=document.getElementById("small1");
        var lis1=small1.getElementsByTagName("li");

        for(var a=0;a<lis1.length;a++){
            lis1[a].w1=a;
            lis1[a].onmouseover=function(){
            bigImg1.src="images/recommend_lancome_part3_btm3_"+this.w1+".jpg";
            }
        }
        
// 第三个
         var bigImg2=document.getElementById("big2");
        var small2=document.getElementById("small2");
        var lis2=small2.getElementsByTagName("li");

        for(var b=0;b<lis2.length;b++){
            lis2[b].w2=b;
            lis2[b].onmouseover=function(){
            bigImg2.src="images/recommend_lancome_part3_btm6_"+this.w2+".jpg";
    
            }
        }    

// 第四个
         var bigImg3=document.getElementById("big3");
        var small3=document.getElementById("small3");
        var lis3=small3.getElementsByTagName("li");

        for(var c=0;c<lis3.length;c++){
            lis3[c].w3=c;
            lis3[c].onmouseover=function(){
            bigImg3.src="images/recommend_lancome_part3_btm9_"+this.w3+".jpg";
            }
        }    

// 第五个
         var bigImg4=document.getElementById("big4");
        var small4=document.getElementById("small4");
        var lis4=small4.getElementsByTagName("li");

        for(var d=0;d<lis3.length;d++){
            lis4[d].w4=d;
            lis4[d].onmouseover=function(){
            bigImg4.src="images/recommend_lancome_part3_btm11_"+this.w4+".jpg";
    
            }
        }    
// 第六个
         var bigImg5=document.getElementById("big5");
        var small5=document.getElementById("small5");
        var lis5=small5.getElementsByTagName("li");

        for(var e=0;e<lis3.length;e++){
            lis5[e].w5=e;
            lis5[e].onmouseover=function(){
            bigImg5.src="images/recommend_lancome_part3_btm15_"+this.w5+".jpg";
    
            }
        }    
// 第七个
         var bigImg6=document.getElementById("big6");
        var small6=document.getElementById("small6");
        var lis6=small6.getElementsByTagName("li");

        for(var f=0;f<lis6.length;f++){
            lis6[f].w6=f;
            lis6[f].onmouseover=function(){
            bigImg6.src="images/recommend_lancome_part3_btm17_"+this.w6+".jpg";
    
            }
        }    
// 第八个
         var bigImg7=document.getElementById("big7");
        var small7=document.getElementById("small7");
        var lis7=small7.getElementsByTagName("li");

        for(var g=0;g<lis7.length;g++){
            lis7[g].w7=g;
            lis7[g].onmouseover=function(){
            bigImg7.src="images/recommend_lancome_part3_btm18_"+this.w7+".jpg";
    
            }
        }    
// 第九个
         var bigImg8=document.getElementById("big8");
        var small8=document.getElementById("small8");
        var lis8=small8.getElementsByTagName("li");

        for(var h=0;h<lis8.length;h++){
            lis8[h].w8=h;
            lis8[h].onmouseover=function(){
            bigImg8.src="images/recommend_lancome_part3_btm21_"+this.w8+".jpg";
    
            }
        }    
// 第十个
         var bigImg9=document.getElementById("big9");
        var small9=document.getElementById("small9");
        var lis9=small9.getElementsByTagName("li");

        for(var j=0;j<lis9.length;j++){
            lis9[j].w9=j;
            lis9[j].onmouseover=function(){
            bigImg9.src="images/recommend_lancome_part3_btm23_"+this.w9+".jpg";
    
            }
        }    

}

