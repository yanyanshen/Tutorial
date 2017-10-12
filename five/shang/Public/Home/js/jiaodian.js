// 脸部焦点图js
 window.onload=function(){
        var liImg=document.getElementById("lip");
        var bigImg=document.getElementById("bigImg");
        var divObj=document.getElementById("small");
        var imgs=divObj.getElementsByTagName("img");
        var w;
                for (var i=0;i<imgs.length;i++){
                    imgs[i].w=i;
                    
                   imgs[i].onmouseover=function(){
                     bigImg.src="images/cosmetics_pro0"+this.w+".jpg";
               }
      }
      // 眼部焦点js图
     var li02=document.getElementById("lieyes");
     var bigImgeyes=document.getElementById("bigImgeyes");
     var smalleyes=document.getElementById("smalleyes");
     var imgeyes=smalleyes.getElementsByTagName("img");
     var z;
                for (var j=0;j<imgeyes.length;j++){
                    imgeyes[j].z=j;
                    
                   imgeyes[j].onmouseover=function(){
                     bigImgeyes.src="images/cosmetics_pro4"+this.z+".jpg";
               }
      }
      // 唇部焦点js图
     var li03=document.getElementById("limouse");
     var bigImgmouse=document.getElementById("bigImgmouse");
     var smallmouse=document.getElementById("smallmouse");
     var imgmouse=smallmouse.getElementsByTagName("img");
     var a;
                for (var k=0;k<imgmouse.length;k++){
                    imgmouse[k].a=k;
                    
                   imgmouse[k].onmouseover=function(){
                     bigImgmouse.src="images/cosmetics_pro5"+this.a+".jpg";
               }
      }
    }