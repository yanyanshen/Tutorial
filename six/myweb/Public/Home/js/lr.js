 // 使用用户名/使用邮箱/使用手机号 注册页面切换  验证程序
 $(function(){
        $(".reg div").first().show();
        $(".reg ul li").first().addClass("active");
        $(".reg ul li").click(function(){
            $(this).addClass("active").siblings().removeClass("active");
            var i=$(this).index();
            console.log(i);
            $(".reg div").eq(i).show().siblings("div").hide();
        });
    });

window.onload=function(){
        var user=document.getElementsByName("user")[0];
        var pass1=document.getElementsByName("pass1")[0];
        var pass2=document.getElementsByName("pass2")[0];
        var mail=document.getElementsByName("mail")[0];
        var tel=document.getElementsByName("tel")[0];
        var msgUser=document.getElementById("msgUser");
        var msgPass1=document.getElementById("msgPass1");
        var msgPass2=document.getElementById("msgPass2");
        var msgMail=document.getElementById("msgMail");
        var msgTel=document.getElementById("msgTel");
    // 用户名注册验证程序
        // 用户名验证程序
            username.onblur=function(){
                var lenUser=user.value.length;
                if (lenUser<4||lenUser>16){
                    msgUser.innerHTML="用户名长度不合法（4-16位）";
                    msgUser.style.color="red";
                    return false;
                }else if (!/^[A-Za-z]/.test(user.value)){ 
                    msgUser.innerHTML="首字符不是字母";
                    msgUser.style.color="red";
                    return false;
                }else if (!/^\w{4,16}$/.test(user.value)){
                    msgUser.innerHTML="用户名存在非法字符！";
                    msgUser.style.color="red";
                    return false;
                }else{
                    msgUser.innerHTML="用户名可用";
                    msgUser.style.color="green";
                }
                }

        // 密码验证程序
                 pass1.onblur=function(){
                    var lenPass1=pass1.value.length;
                    if (lenPass1<6||lenPass1>15){
                        msgPass1.innerHTML="密码长度不合法（6-15位）";
                        msgPass1.style.color="red";
                        return false;
                    }
                    else if (!/^\w{6,15}$/.test(pass1.value)){
                        msgPass1.innerHTML="密码存在非法字符！";
                        msgPass1.style.color="red";
                        return false;
                    }else{
                        msgPass1.innerHTML="密码格式正确";
                        msgPass1.style.color="green";
                    }
                }

                pass2.onblur=function(){
                    if(pass1.value===pass2.value){
                        msgPass2.innerHTML="密码确认通过";
                        msgPass2.style.color="green";
                    }else{
                        msgPass2.innerHTML="密码确认失败！";
                        msgPass2.style.color="red";
                    }
                }

        // 手机号验证程序
                tel.onblur=function(){
                    if (!/^[1][3|4|5|7|8][0-9]\d{8}$/.test(tel.value)){
                        msgTel.innerHTML="手机号码格式有误";
                        msgTel.style.color="red";
                         return false;
                    }else{
                        msgTel.innerHTML="手机号码格式正确";
                        msgTel.style.color="green";
                    }
                }


        // 邮箱验证程序
                mail.onblur=function(){
                    if (!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(mail.value)){
                        msgMail.innerHTML="您输入的邮箱格式有误";
                        msgMail.style.color="red";
                         return false;
                    }else{
                        msgMail.innerHTML="邮箱格式正确";
                        msgMail.style.color="green";
                    }
                }


    // 邮箱注册页面验证程序
            
             var mail2=document.getElementsByName("mail2")[0];
             var msgMail2=document.getElementById("msgMail2");
             var pass2_1=document.getElementsByName("pass2_1")[0];
             var pass2_2=document.getElementsByName("pass2_2")[0];
             var msgPass2_1=document.getElementById("msgPass2_1");
             var msgPass2_2=document.getElementById("msgPass2_2");
         // 邮箱注册页面验证程序
                 mail2.onblur=function(){
                    if (!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(mail2.value)){
                        msgMail2.innerHTML="您输入的邮箱格式有误";
                        msgMail2.style.color="red";
                         return false;
                    }else{
                        msgMail2.innerHTML="邮箱格式正确";
                        msgMail2.style.color="green";
                    }
                }

                // 密码验证程序
                 pass2_1.onblur=function(){
                    var lenPass2_1=pass2_1.value.length;
                    if (lenPass2_1<6||lenPass2_1>15){
                        msgPass2_1.innerHTML="密码长度不合法（6-15位）";
                        msgPass2_1.style.color="red";
                        return false;
                    }
                    else if (!/^\w{6,15}$/.test(pass2_1.value)){
                        msgPass2_1.innerHTML="密码存在非法字符！";
                        msgPass2_1.style.color="red";
                        return false;
                    }else{
                        msgPass2_1.innerHTML="密码格式正确";
                        msgPass2_1.style.color="green";
                    }
                }

                pass2_2.onblur=function(){
                    if(pass2_1.value===pass2_2.value){
                        msgPass2_2.innerHTML="密码确认通过";
                        msgPass2_2.style.color="green";
                    }else{
                        msgPass2_2.innerHTML="密码确认失败！";
                        msgPass2_2.style.color="red";
                    }
                }

    // 手机号注册页面验证程序
            var tel2=document.getElementsByName("tel2")[0];
            var msgTel2=document.getElementById("msgTel2");
            var pass3_1=document.getElementsByName("pass3_1")[0];
            var pass3_2=document.getElementsByName("pass3_2")[0];
            var msgPass3_1=document.getElementById("msgPass3_1");
            var msgPass3_2=document.getElementById("msgPass3_2");

        // 手机号验证程序
                tel2.onblur=function(){
                    if (!/^[1][3|4|5|7|8][0-9]\d{8}$/.test(tel2.value)){
                        msgTel2.innerHTML="手机号码格式有误";
                        msgTel2.style.color="red";
                         return false;
                    }else{
                        msgTel2.innerHTML="手机号码格式正确";
                        msgTel2.style.color="green";
                    }
                }

        // 密码验证程序
                 pass3_1.onblur=function(){
                    var lenPass3_1=pass3_1.value.length;
                    if (lenPass3_1<6||lenPass3_1>15){
                        msgPass3_1.innerHTML="密码长度不合法（6-15位）";
                        msgPass3_1.style.color="red";
                        return false;
                    }
                    else if (!/^\w{6,15}$/.test(pass3_1.value)){
                        msgPass3_1.innerHTML="密码存在非法字符！";
                        msgPass3_1.style.color="red";
                        return false;
                    }else{
                        msgPass3_1.innerHTML="密码格式正确";
                        msgPass3_1.style.color="green";
                    }
                }

                pass3_2.onblur=function(){
                    if(pass3_1.value===pass3_2.value){
                        msgPass3_2.innerHTML="密码确认通过";
                        msgPass3_2.style.color="green";
                    }else{
                        msgPass3_2.innerHTML="密码确认失败！";
                        msgPass3_2.style.color="red";
                    }
                }


                var conform=document.getElementById("conform");
                    conform.onclick=function () {

                        var time = 30;
                        if(/^[1][3|4|5|7|8][0-9]\d{8}$/.test(tel2.value)){

                function timeCountDown(){
                    if(time==0){
                        clearInterval(timer);
                        conform.value="获取短信验证码";
                        // sends.checked = 1;
                        return true;
                    }
                    conform.value=time+"S后再次发送";
                    time--;
                    return false;
                    // sends.checked = 0;
                }
               
                timeCountDown();
                var timer = setInterval(timeCountDown,1000);

                }
                    }

}           
