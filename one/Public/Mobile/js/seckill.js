// //.............倒计时
window.onload=function(){
        setInterval(function(){
          var today=new Date();
            var data="2016-12-20 00:00:00";
            var T=Date.parse(data);
            var T1=(T-today.getTime());//总毫秒
            var s=24*60*60*1000;
           var day=T1/s;
            D=Math.floor(day);//天数
           var hours=(day-D)*24;
            H=Math.floor(hours);//小时
            var min=(hours-H)*60;
            M=Math.floor(min);//分
            var sec=(min-M)*60;
            S=Math.floor(sec);//秒

          if(H<10){
            H="0"+H;
          }
          if(M<10){
            M="0"+M;
          }
           if(S<10){
            S="0"+S;
          }
          var time=D+"天"+H+":"+M+":"+S;
          var time1=document.getElementById("time");
                time1.innerHTML=time;
    });
  };

window.onload();