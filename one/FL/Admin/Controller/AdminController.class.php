<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller{

    //登陆验证
     public function login(){
             if(IS_POST){
                    $Admin=D('Admin');

                    if($arr=$Admin->login()){

                        if($arr['admin_go']){
                            $this->ajaxReturn(array('status'=>'error','msg'=>'用户被禁用'));
                        }else{
                            session('mid',$arr['id']);
                            session('name',trim(I('post.username')));

                             $data['login_lasttime']=$arr['login_time'];
                            $data['login_lastip']=$arr['login_ip'];
                            $Admin->where(array('id'=>$arr['id']))->save($data);

                            $newData['login_time']=time();
                            $newData['login_ip']=$_SERVER[REMOTE_ADDR];
                            $Admin->where(array('id'=>$arr['id']))->save($newData);

                            $this->ajaxReturn(array('status'=>'ok','msg'=>'用户登录成功'));
                        }

                    }else{
                        $this->ajaxReturn(array('status'=>'error','msg'=>'用户名密码错误'));
                    }
            }else{
                    $this->display('login');
            }
    }

    //退出登录
    public function logout(){
        session('mid',null);
        session('name',null);
//        redirect(U("Admin/admin/login"),1,"退出成功");
        echo "<script>location='../index'</script>";
    }

                //后台管理员列表页
            public function adminList(){

                $Admin=M("Admin");
                $where['username']=array('like',"%".I("post.key")."%"); //like模糊查询 针对custom_username用户名
                $count=$Admin->where($where)->count();  //count() 函数返回数组中元素的数目

                $page=new \Think\Page($count,5); // 实例化分页类 传入总记录数和每页显示的记录数(5)
                $show=$page->show();  // 分页显示输出      //firstRow从第几条开始  listRows拿几条
                $adminList=$Admin->where($where)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();

                if($count>0){
                $map['key']=I("post.key");   //搜索
                foreach($map as $key=>$val){
                    $page->parameter[$key]=urlencode($val);
                }

                $firstRow=$page->firstRow;
                $this->assign("firstRow",$firstRow);    //便利的是5页 每次翻页是5页
                $this->assign("page",$show);           //输出分页
                $this->assign("adminList",$adminList); //便利的时5条

                $this->assign("keywords",$map['key']);  //给查询模板传值
                }
                $this->display();

            }
    public function toggleAdmin(){
        //更改管理员禁用启用状态
        //print_r($_GET);
        $admin_id=I("get.id");
        //echo $custom_id;
        $admin=M("Admin");
        $admin_go=$admin->where(array("id"=>$admin_id))->getField("admin_go");
        $data['admin_go']=$admin_go?0:1;
        if($admin->where(array("id"=>$admin_id))->save($data)>0){
            echo "状态修改成功！";
        };
    }


        //添加管理员
    public function addAdmin(){
        if(IS_POST){
            $Admin=D('Admin');

            if($data=$Admin->create()){
                $data['pwd']=md5($data['pwd']);
                $data['time']=time();
                $mid=$Admin->add($data);
            }else{
                $info['status']='error';
                $info['msg']= $Admin->getError();
                $this->ajaxReturn($info);
            };

            if($mid){
                session('aid',$mid);
                session('aname',trim(I('post.username')));
                $info['status']='ok';
                $info['msg']='用户添加成功';
            }else{
                $info['status']='error';
                $info['msg']='用户添加失败';
            }
            $this->ajaxReturn($info);
        }else{
            $this->display();
        }
    }

        //管理员列表编辑  （修改管理员密码）
    public function editAdmin(){
       $Admin=M('Admin'); // 实例化Admin数据库实例化
        if(IS_POST){
            $data['id']=I('post.id');
            $data['pwd']=I('post.newpwd');
            $data['pwd']=md5($data['pwd']);
            $result=$Admin->save($data);

            if($result){
                $info['status']='ok';
                $info['msg']='密码修改成功';
            }else{
                $info['status']='error';
                $info['msg']='密码修改失败';
            }
            $this->ajaxReturn($info);
        }else{
            $id=I('get.id'); // 拿到这个id
            $user=$Admin->find($id);
            $this->assign('user',$user);
            $this->display();
        }

    }



    //删除管理员
    public function delAdmin(){
        $id=I("get.id");
        $prod=M("Admin");
        if($prod->where(array("id"=>$id))->delete()>0){
            echo "删除成功";
        };
    }



    //检测用户名是否重复
    public function chkUsername(){
        $Admin=M('Admin');
        $username=I('post.username');
        if($Admin->where(array('username'=>$username))->count()){
            echo  'false';
        }else{
            echo 'true';
        }
    }



    //修改密码时判断和以前密码是否一致
    public function chkPwd(){
        if(IS_POST){
            $Admin= D('Admin');
            if($min=$Admin->chkPwd()){
                echo 'true';
            }else{
                echo 'false';
            }
        }
    }


 }
