/**
 * Created by Administrator on 2016/7/16.
 */
$(function(){
    var user=false;
    $("#username").blur(function(){
        if($(this).val().trim()=='' ){
            $('#tx').html("管理员名称不能为空")}
    })
    $("#username").keyup(function(){
           var len= $(this).val().length;

        if(len<2){
            $('#tx').html("用户名称不能少于2位")}else{
            var data= 'username='+$(this).val();
            $.ajax({
                url:"check",
                type:"post",
                data:data,
                success:(function (rel){
                    $('#tx').html(rel)
                    if(rel==''){
                        user =true
                        $('#tx').html(" ")
                    }else{
                        user=false
                    }
                })
            })
        }

    })

    var pwd=false
    $("#pwd").blur(function (){
        var a=$(this).val()
        if(a==''){
            $("#tx2").html("密码不能为空")
        }else{
            if(a.length<6){
                $("#tx2").html("不能少于6位")
            }else{
                $('#tx2').html(" ")
                pwd=true
            }
        }
    })

    var phone=false;
    $("#phone").blur(function(){
        var a=$(this).val()
        if(a==''){
            $('#tx3').html("手机号不能为空")
        }else{
          var reg=  /^1[3-9]\d{9}$/;
            if(!reg.test(a)){
                $('#tx3').html("手机号码不正确")
            }else{
                $('#tx3').html(" ")
                phone=true
            }
        }
    })

    var email=false;
    $("#email").blur(function(){
        var a=$(this).val()
        if(a==''){
            $('#tx4').html("邮箱不能为空")
        }else{
          var reg=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/
             if(!reg.test(a)){
                 $('#tx4').html("邮箱格式不正确")
             }else{
                 email=true
                 $('#tx4').html(" ")
             }
        }
    })
    $("#su").bind("click",function(event){   ///阻止表单提交
        if(user==true){
            if(pwd==true){
                if(phone==true){
                    if(email==true){
                        return true
                    }
                    return false;
                }
                return false;
            }
            return false;
        }
        return false;
    })
})
