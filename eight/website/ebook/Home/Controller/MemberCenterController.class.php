<?php
namespace Home\Controller;
use Think\Controller;
class MemberCenterController extends Controller{
    public function member_info(){
        //加载标题：
        $title = "淘书网-用户中心-会员中心-个人信息";
        $this->assign("title", $title);
        //查缓存：
        if (session('?mid')){
            $id=session('mid');
            //查数据库：
            $data = M('Member');
            //获取头像：
            $userPic = $data->where("userid=".$id)->getField('userPic');
            $this->assign("userPic", $userPic);
            //获取昵称：
            $nickname = $data->where("userid=".$id)->getField('nickname');
            $this->assign("nickname", $nickname);
            //获取性别：
            $sex = $data->where("userid=".$id)->getField('sex');
            $this->assign("sex", $sex);
            //获取年龄：
            $age = $data->where("userid=".$id)->getField('age');
            $this->assign("age", $age);
            //获取联系电话：
            $mobile = $data->where("userid=".$id)->getField('mobile');
            $this->assign("mobile", $mobile);
            //获取联系邮箱：
            $email = $data->where("userid=".$id)->getField('email');
            $this->assign("email", $email);
            //获取身份证号：
            $idNumber = $data->where("userid=".$id)->getField('idNumber');
            $this->assign("idNumber", $idNumber);
            //获取收货地址：
            $address = $data->where("userid=".$id)->getField('address');
            $this->assign("address", $address);
            //输出页面：
            $this->display();
        }else{
            echo "<script>alert('您还没有登录，请先登录');window.location.href='/Home/Login/login'</script>";
        }
    }
    public function member_editor(){
        //加载标题：
        $title = "淘书网-用户中心-会员中心-修改资料";
        $this->assign("title", $title);
        //查缓存：
        if(session('?mid')){
            $id=session('mid');
            //查数据库：
            $data = M('Member');
            //获取头像：
            $userPic = $data->where("userid=".$id)->getField('userPic');
            $this->assign("userPic", $userPic);
            //获取昵称：
            $nickname = $data->where("userid=".$id)->getField('nickname');
            $this->assign("nickname", $nickname);
            //获取性别：
            $sex = $data->where("userid=".$id)->getField('sex');
            $this->assign("sex", $sex);
            //获取年龄：
            $age = $data->where("userid=".$id)->getField('age');
            $this->assign("age", $age);
            //获取联系电话：
            $mobile = $data->where("userid=".$id)->getField('mobile');
            $this->assign("mobile", $mobile);
            //获取联系邮箱：
            $email = $data->where("userid=".$id)->getField('email');
            $this->assign("email", $email);
            //获取身份证号：
            $idNumber = $data->where("userid=".$id)->getField('idNumber');
            $this->assign("idNumber", $idNumber);
            //获取收货地址：
            $address = $data->where("userid=".$id)->getField('address');
            $this->assign("address", $address);
            //修改资料：
            if ($_POST) {
                //头像上传：
                $upload = new \Think\Upload();
                $upload->maxSize = 3145728;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->rootPath = './Uploads/';
                $upload->autoSub = false;
                $userPic = $upload->upload();
                if ($userPic) {
                    foreach ($userPic as $file) {
                        $editorInfo['userPic'] = $file['savename'];
                        $newInfo = $data->where("userid=".$id)->save($editorInfo);
                    }
                }
                if (I('post.nickname')) {
                    $editorInfo['nickname'] = I('post.nickname');
                    $newInfo = $data->where("userid=".$id)->save($editorInfo);
                }
                if (I('post.sex')) {
                    $editorInfo['sex'] = I('post.sex');
                    $newInfo = $data->where("userid=".$id)->save($editorInfo);
                }
                if (I('post.age')) {
                    $editorInfo['age'] = I('post.age');
                    $newInfo = $data->where("userid=".$id)->save($editorInfo);
                }
                if (I('post.mobile')) {
                    $editorInfo['mobile'] = I('post.mobile');
                    $newInfo = $data->where("userid=".$id)->save($editorInfo);
                }
                if (I('post.email')) {
                    $editorInfo['email'] = I('post.email');
                    $newInfo = $data->where("userid=".$id)->save($editorInfo);
                }
                if (I('post.idNumber')) {
                    $editorInfo['idNumber'] = I('post.idNumber');
                    $newInfo = $data->where("userid=".$id)->save($editorInfo);
                }
                if (I('post.address')) {
                    $editorInfo['address'] = I('post.address');
                    $newInfo = $data->where("userid=".$id)->save($editorInfo);
                }
                if ($newInfo) {
                    echo "<script>alert('修改成功！');window.location.href='/Home/MemberCenter/member_info'</script>";
                } else {
                    echo "<script>alert('请输入修改内容！');window.location.href='/Home/MemberCenter/member_editor'</script>";
                }
            }
            //输出页面：
            $this->display();
        } else {
            echo "<script>alert('您还没有登录，请先登录');window.location.href='/Home/Login/login'</script>";
        }
    }
    public function member_safe(){
        //加载标题：
        $title = "淘书网-用户中心-会员中心-账号安全";
        $this->assign("title", $title);
        //查缓存：
        if (session('?mid')) {
            $id=session('mid');
            //查数据库：
            $data = M('Member');
            //获取用户名：
            $username = $data->where("userid=".$id)->getField('username');
            $this->assign("username", $username);
            //获取密保手机：
            $mobile = $data->where("userid=".$id)->getField('mobile');
            $this->assign("mobile", $mobile);
            //获取密保邮箱：
            $email = $data->where("userid=".$id)->getField('email');
            $this->assign("email", $email);
            if ($_POST) {
                //修改密保：
                if (I('post.mobile')) {
                    $editorInfo['mobile'] = I('post.mobile');
                    $newInfo = $data->where("userid=".$id)->save($editorInfo);
                }
                if (I('post.email')) {
                    $editorInfo['email'] = I('post.email');
                    $newInfo = $data->where("userid=".$id)->save($editorInfo);
                }
                //修改密码：
                if (I('post.oldPassword')) {
                    $oldPassword = $data->where("userid=".$id)->getField('password');
                    if (md5(I('post.oldPassword')) == $oldPassword) {
                        if (I('post.newPassword')) {
                            $newPassword = md5(I('post.newPassword'));
                            if (I('post.repeatPassword')) {
                                $repeatPassword = md5(I('post.repeatPassword'));
                                if ($repeatPassword == $newPassword) {
                                    $editorInfo['password'] = $newPassword;
                                    $newInfo = $data->where("userid=".$id)->save($editorInfo);
                                } else {
                                    echo "<script>alert('前后两次输入的密码不一致！');window.location.href='/Home/MemberCenter/member_safe'</script>";
                                }
                            } else {
                                echo "<script>alert('请再次输入新密码！');window.location.href='/Home/MemberCenter/member_safe'</script>";
                            }
                        } else {
                            echo "<script>alert('请输入新密码！');window.location.href='/Home/MemberCenter/member_safe'</script>";
                        }
                    } else {
                        echo "<script>alert('密码输入错误！');window.location.href='/Home/MemberCenter/member_safe'</script>";
                    }
                }
                if ($newInfo) {
                    echo "<script>alert('修改成功！');window.location.href='/Home/MemberCenter/member_safe'</script>";
                } else {
                    echo "<script>alert('请输入修改内容！');window.location.href='/Home/MemberCenter/member_safe'</script>";
                }
            }
            //输出页面：
            $this->display();
        } else {
            echo "<script>alert('您还没有登录，请先登录');window.location.href='/Home/Login/login'</script>";
        }
    }
    public function member_address(){
        //加载标题：
        $title = "淘书网-用户中心-会员中心-收货地址";
        $this->assign("title", $title);
        //查缓存：
        if (session('?mid')) {
            $id=session('mid');
            //查数据库：
            $data = M('Member');
            //获取用户名：
            $username = $data->where("userid=".$id)->getField('username');
            $this->assign("username", $username);
            //获取昵称：
            $nickname = $data->where("userid=".$id)->getField('nickname');
            $this->assign("nickname", $nickname);
            //获取联系电话：
            $mobile = $data->where("userid=".$id)->getField('mobile');
            $this->assign("mobile", $mobile);
            //获取联系邮箱：
            $email = $data->where("userid=".$id)->getField('email');
            $this->assign("email", $email);
            //获取收货地址：
            $address = $data->where("userid=".$id)->getField('address');
            $this->assign("address", $address);
            //修改收货地址：
            if ($_POST) {
                if (I('post.address')) {
                    $editorInfo['address'] = I('post.address');
                    $newInfo = $data->where("userid=".$id)->save($editorInfo);
                }
                if ($newInfo) {
                    echo "<script>alert('修改成功！');window.location.href='/Home/MemberCenter/member_address'</script>";
                } else {
                    echo "<script>alert('请输入修改内容！');window.location.href='/Home/MemberCenter/member_address'</script>";
                }
            }
            //输出页面
            $this->display();
        } else {
            echo "<script>alert('您还没有登录，请先登录');window.location.href='/Home/Login/login'</script>";
        }
    }
}