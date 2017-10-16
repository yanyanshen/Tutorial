<?php
namespace Admin\Controller;
use Think\Controller;
class AdminsController extends Controller{
    /*后台管理系统管理员添加*/
    public function adminsAdd(){
        $this->display('Admins/add');
    }
    public function check(){   ///检测用户名
        echo $ab=D('Admin')->ck();

    }
    public function add_admin(){
          $_POST['createpeop']=$_SESSION['username'];
          $_POST['createtime']=time();
          $_POST['pwd']=md5(trim($_POST['pwd']));
         if(D('Admin')->add_admin()){
             $this->success("添加成功");
         }else{
             $this->error("添加失败");
         }
    }

    /*后台管理列表*/
    public function adminsList(){
       $list= D('Admin')->admin();
        $this->assign('vip',$_SESSION['vip']);
       $this->assign('list',$list);
//        $User = D('Admin'); // 实例化User对象
//        $count      = count($User->select());// 查询满足要求的总记录数
//        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
//        $show       = $Page->show();// 分页显示输出
//// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
//        $list = $User->order("vip desc,createtime")->limit($Page->firstRow.','.$Page->listRows)->select();
//        $this->assign('list',$list);// 赋值数据集
//        $this->assign('page',$show);// 赋值分页输出
        $this->display('Admins/list');
    }

    public function update(){   ///执行修改操作
        if( D('Admin')->save($_POST)){
           echo "修改成功";
        }else {
            echo "修改失败";
        }
    }

    public function del(){    ///执行删除操作
        $id=$_POST['id'];
        if( D('Admin')->where("id='$id'")->delete()){
            echo "删除成功";
        }else {
            echo "删除失败";
        }

    }
    public function ser(){      ///管理员查询
       if(IS_POST){
           $key=$_POST['key'];
          $sql=  $map['username'] = array('like',"%$key%");
           $list= D('Admin')->where($map)->select();
           $this->assign('vip',$_SESSION['vip']);
           $this->assign('list',$list);
       }
        $this->display();

    }
    public function checkPwd(){    ///删除密码判断
        if(IS_AJAX){
            $id=$_POST['id'];
            $pwd=md5($_POST['pwd']);
            $User = D("Admin"); // 实例化User对象
            // 查找status值为1name值为think的用户数据
            $data =$User->where("id='$id' AND pwd='$pwd'")->find();
            if($id=$data['id']){
                echo "true";
            }else{
                echo "false";
            }
        }
    }



}