// //.............倒计时  
window.onload=function(){
        setInterval(function(){
          var today=new Date();
          var T=Date.parse("2016/6/24 20:00:00");
          var T1=(T-today.getTime());//总毫秒
          var T2=T1/1000;//总秒数
          T2=Math.round(T2);
          var S=T2%60;//秒数
          var M=(T2-S)/60;//总分钟数
          var H=M/60;//小时
          M=M%60;//分钟数
          H=Math.round(H);
          if(H<10){
            H="0"+H;
          }
          if(M<10){
            M="0"+M;
          }
           if(S<10){
            S="0"+S;
          }
          var time=H+":"+M+":"+S;
          var time1=document.getElementById("time");
                time1.innerHTML=time;  
    });
  };