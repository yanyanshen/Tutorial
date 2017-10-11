//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});





//提示

$('#mobile').click(function(){
    layer.tips('请输入手机号','#mobile',{
        tips:[4,'#90D690']
    });
})
$('#email').click(function(){
    layer.tips('请输电子邮箱','#email',{
        tips:[4,'#90D690']
    });
})
$('#username').click(function(){
    layer.tips('请输入以字母开头6-16位用户名，不支持符号汉字','#username',{
        tips:[4,'#90D690']
    });
})
$('#pwd').click(function(){
    layer.tips('请输入6-14位密码','#pwd',{
        tips:[4,'#90D690']
    });
})
$('#repwd').click(function(){
    layer.tips('再输入一次相同的密码','#repwd',{
        tips:[4,'#90D690']
    });
})
$('#yzm').click(function(){
    layer.tips('请输入验证码','#yzm',{
        tips:[4,'#90D690']
    });
})

//协议
function chkProtocol(){
    var res=false;
    if(!protocol.checked){
        document.getElementsByClassName('login')[0].style.backgroundColor="#ccc";
        document.getElementsByClassName('login')[0].style.cursor="default";
    }else{
        document.getElementsByClassName('login')[0].style.backgroundColor="#27AE60";
        document.getElementsByClassName('login')[0].style.cursor="pointer";
        res=true;
    };
    return res;
}

/*//表单验证
$(function() {
    var validate=$('#msform').validate({
        //设置验证规则
        rules: {

            mobile: {
                required: true,
                mobile: true
            },

            //email: 'email',

            yzm:{
                required:true,
                remote:{
                    url:"{:U('Home/Member/chkverify')}",
                    type:'post'
                }
            },

            username: {
                required: true,
                username: true,
                remote: {
                    url: "{:U('Home/Member/chkUsername')}",
                    type: 'post'
                }
            },

            pwd: {
                required: true,
                minlength: 6,
                maxlength: 16
            },

            repwd: {
                required: true,
                equalTo: "#pwd"
            },

            protocol:{
                required: true
            }
        },


        //设置提示信息
        messages: {
            username: {
                required: '用户名不能为空',
                minlength: '用户名至少需要6个字符',
                maxlength: '用户名最多16个字符',
                remote: '用户名已被注册'
            },

            pwd: {
                required: '密码不能为空',
                minlength: '密码长度至少6个字符',
                maxlength: '密码长度最多16个字符'
            },

            repwd: {
                required: '重复密码不能为空',
                equalTo: '两次密码输入不一致'
            },

            email: '请输入正确邮箱',

            mobile: {
                required: '手机号码不能为空',
                mobile: '请输入正确手机号',
                remote:'该手机号已注册'
            },

            yzm:{
                required:'请输入验证码',
                remote:'验证码不正确'
            },

            protocol:'请接受协议'
        },

        success: function (label) {
            label.addClass("ok");
        },

        validClass: "ok",

        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }
    })


    //手机号验证
    jQuery.validator.addMethod("mobile", function (value, element) {
        var mobileReg = /^1[34578]{1}[0-9]{9}$/;
        return this.optional(element) || (mobileReg.test(value));
    }, '请填写正确手机号');


    //用户名规则
    jQuery.validator.addMethod("username", function(value, element) {
    var usernameReg = /^[A-Za-z][A-Za-z0-9_]{5,16}$/;
    return this.optional(element) || (usernameReg.test(value));
}, "用户名格式不正确");



    jQuery.validator.onfocus=true;
    $('#loginBtn').click(function(){
        if(validate.form()){
            $.post("/Home/Member/reg",$('#msform').serialize(),function(res){
                if(res.status=='ok'){
                    layer.alert(res.msg,{
                        icon: 1,
                        skin: 'layer-ext-moon',
                        yes:function(){
                            location.href="/home";
                        }
                    });

                }else{
                    layer.alert(res.msg,{
                        icon: 2,
                        skin: 'layer-ext-moon'});
                };
            })
        }

    })



})*/




