/**
 * Created by Administrator on 2016/7/22.
 */

////清空缓存
$("#clean").click(function(){
    $.post("delDirAndFile",{url:'del'},function(res){
        layer.alert(res)
    });
})
$(".newlist a").hover(function(){
    var id =  $(this).attr('id');
    var that = this;
    $.post("tip",{id:id},function(res){
        layer.tips(res,that,{
            tips:[4,'#6495ED']
        });
    });
})
$("#sql").click(function(){
    $.post("beiFen",{sql:'sql'},function(res){
        layer.msg(res)
    });
});
$("#backsql").click(function(){
    var uid=  $("#uid").attr('class');
    var vip=  $('#uid').attr('value');
    if(vip==1){
        layer.prompt({
            title: '请输入你的密码确认还原数据库',
            formType: 1 //prompt风格，支持0-2
        }, function(input){
            var pwd= input.trim();
            var data = {'id': uid, 'pwd': pwd}
            $.ajax({
                url:'checkPwd',
                type:"post",
                data:data,
                success:(function (rel){
                    if(rel!="true"){
                        layer.alert("密码错误")
                    }else{
                        $.post("Notice/backBeiFen",{sql:'sql'},function(res){
                            layer.msg(res)
                        });
                    }
                })
            })
        });

    }else{
        layer.alert("你没有权限操作")
    }
})
