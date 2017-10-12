<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf8");
class UserController extends Controller{
    //在本控制器所以方法之前会执行该方法，防止未登录进入
    public function _initialize(){
        if(session('aid')<1||session('status')<1){
            header('location:/Admin/Login/login');
        }}
    //添加
    public function add(){

        if(IS_POST){
            $user=D('User');
            if($user->create()){
                $id=$user->add( );
                if($id){
                    echo "<script>alert('添加成功');location='index'</script>";
                }else{
                    echo "<script>alert('添加失败');location=''</script>";
                }
            }else{
                $error=$user->geterror();
                echo "<script>alert('$error');location= ''</script>";

            }
        }else{
            $this->display();
        }
    }
    //列表
    public function index(){
        $user = M('User');
        //搜索
        $search['username'] = array('like',"%".I('get.key')."%");//搜索条件
        $search['level'] = array('like',"%".I('get.level')."%");
        $username=I('get.key');
        $level=I('get.level');
        $count = $user->where($search)->count();//满足条件的总数
        $page = new \Think\Page($count, 2);//实例化分页类
        $show = $page->show();//分页显示输出

        $list = $user->where($search)->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('list', $list);
        $this->assign('page', $show);
        $this->assign('firstRow',$page->firstRow);
        $this->assign('username',$username);
        $this->assign('level',$level);
        $this->display();
    }
    //删除
    public function del(){
        $id=$_GET['id'];
        $user=M('User');
        $user->where("id='$id'")->delete();
        if($user){
            $this->ajaxReturn(array('status' => 'ok', 'msg' => '删除成功'));
        }else{
            $this->ajaxReturn(array('status' => 'ok', 'msg' => '删除失败'));
        }
    }
    //编辑
    public function edit(){
        $id=$_GET['id'];
        $user=M('User');
        $list=$user->where("id='$id'")->find();
        $this->assign('list',$list);
        $this->display();
    }
     //解禁
    public function on(){
        $date['id']=$_GET['id'];
        $user=M('User');
        $date['level']=1;
        $date['expense']=0;
        $res=$user->save($date);
        if($res){
            $this->ajaxReturn(array('status' => 'ok', 'msg' => '解禁成功'));
        }else{
            $this->ajaxReturn(array('status' => 'ok', 'msg' => '解禁失败'));
        }
    }
//禁用
    public function off(){
        $date['id']=$_GET['id'];
        $date['level']=0;
        $user=M('User');
        $res=$user->save($date);
        if($res){
            echo "<script>alert('禁用成功');location='../../index'</script>";
        }else{
            echo "<script>alert('禁用失败');location='../../index'</script>";
        }
    }



}