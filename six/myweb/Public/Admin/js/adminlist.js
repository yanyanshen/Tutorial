//function adminList(){
    function ajax(data){
        $.ajax({
            url:"update",
            type:"post",
            data:data,
            success:(function (rel){
                window.location.reload();
                layer.msg(rel, function(index){
                });
            })
        })
    }
    function post(b,a,vip,vip_name,uid){
        if(b=='username') {
            layer.prompt({
                title: '请输入新的管理员名称',
                formType: 0 //prompt风格，支持0-2
            }, function(input){
                if (input.trim() == '') {
                    layer.msg("不能为空")
                } else {
                    var data = 'username=' + input;
                    $.ajax({
                        url: "check",
                        type: "post",
                        data: data,
                        success: (function (rel) {
                            $('#tx').html(rel)
                            if (rel == '') {
                                var data = {'username': input, 'id': a};
                                ajax(data)
                            } else {
                                layer.msg("管理员名称重复")
                            }
                        })
                    })
                }
            });
        }
        if(b=="phone"){
            layer.prompt({
                title: '请输入新的手机号码',
                formType: 0 //prompt风格，支持0-2
            }, function(input){
                if (input.trim() == '') {
                    layer.msg("不能为空")
                } else {
                    var data={'phone':input,'id':a}
                    ajax(data);
                }
            });
        }
        if(b=="vip") {
            if (vip> 0) {
                if(vip_name==1){
                    if(a==10000){
                        layer.msg('非法操作')
                    }else if(a==uid){
                        layer.msg('你不能操作自己，请联系站长')
                    }else{
                        var data = {'vip': 0, 'id': a};
                        ajax(data);
                    }
                }else{
                    var data = {'vip': 1, 'id': a};
                    ajax(data);
                }
            } else {
                layer.msg('你没有权限修改')
            }
        }
        if (b == "email") {
            layer.prompt({
                title: '请输入新的邮箱',
                formType: 0 //prompt风格，支持0-2
            }, function(input){
                if (input.trim() == '') {
                    layer.msg("不能为空")
                } else {
                    var data = {'email': input, 'id': a}
                    ajax(data);
                }
            });
        }
        if(b=="del") {
            if (vip> 0) {
                if(a==10000){     ////判断超级管理员不能删除自己
                    layer.msg('非法操作')
                }else if(a==uid){
                    layer.msg('非法操作')
                }else{
                    layer.prompt({
                        title: '请输入你的密码确认删除',
                        formType: 1 //prompt风格，支持0-2
                    }, function(input){
                        var pwd= input.trim()
                        var data = {'id': uid, 'pwd': pwd}
                        $.ajax({
                            url:"checkPwd",
                            type:"post",
                            data:data,
                            success:(function (rel){
                              if(rel!="true"){
                                  layer.alert("密码错误")
                              }else{
                                  var data = { 'id': a};
                                  $.ajax({
                                      url:"del",
                                      type:"post",
                                      data:data,
                                      success:(function (rel){
                                          layer.alert(rel, function(index){
                                              window.location.reload();
                                          });
                                      })
                                  })
                              }
                            })
                        })
                    });
                }
            } else {
                layer.msg('你没有权限修改')
            }
        }
    }

//}