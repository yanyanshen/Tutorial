<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf8");
class AdController extends Controller{
    //在本控制器所以方法之前会执行该方法，防止未登录进入
    public function _initialize(){
        if(session('aid')<1||session('status')<1){
            header('location:/Admin/Login/login');
        }}
    public function index()
    {
        $search['title'] = array('like', "%" . I('get.key') . "%");
        $search['pid'] = array('like', "%" . I('get.pid') . "%");
        $name=I('get.key');
        $pid=I('get.pid');
        $ad = M('Ads');
        $count = $ad->where($search)->count();//满足条件的数量
        $page = new \Think\Page($count, 5);//实例化分页
        $show = $page->show();//分页显示输出

        $list = $ad->where($search)->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('list', $list);
        $this->assign('count', $count);
        $this->assign('page', $show);
        $this->assign('firstRow', $page->firstRow);
        $this->assign('name',$name);
        $this->assign('pid',$pid);
        $this->display();
    }

    //添加
    public function add()
    {

        if (IS_POST) {
            $name =trim(I('post.title'));
            if (!$name) {
                echo "<script>alert('广告标题不能为空');location='add'</script>";
            } else {
                $ad = M('Ads');
                $find = $ad->where("title='$name'")->find();
                if ($find) {
                    echo "<script>alert('该标题已经存在');location='add'</script>";
                } else {
                    $upload = new \Think\Upload();
                    $upload->maxSize = 3145728;//设置附件上传大小
                    $upload->exts = array('jpg', 'png', 'jpeg');//上传类型
                    $upload->rootPath = './Public/Uploads/';//上传根目录
                    $upload->savePath = 'Ad/';//上传目录
                    $upload->autoSub = false;//关闭自动子目录
                    $file = $upload->upload();
                    if ($file) {
                        //插入数据库
                        $data['title'] = $name;
                        $data['pid'] = trim($_POST['pid']);
                        $data['top'] = trim($_POST['top']);
                        $data['addtime'] = time();
                        $data['pic'] = $file['pic']['savename'];
                        if ($ad->add($data)) {
                            echo "<script>alert('添加成功');location='index'</script>";
                        }else{
                            echo "<script>alert('添加失败');location='index'</script>";
                        }
                    } else {
                        $this->error($upload->getError());// $this->error('图片上传失败',U('Ad/add'), 1);
                    }
                }
            }
        } else {
            $this->display();
        }
    }

    //删除
    public function del(){
        $id=$_GET['id'];
        $ad=M('Ads');
        $ad->where("id='$id'")->delete();
        if($ad){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }
    }
//编辑
    public function edit(){

        $id=I('get.id');
        $ad=M('Ads');
        $adinfo=$ad->where("id='$id'")->find();
        if(IS_POST){
            $data['id']=$id;
            $data['title']=trim(I('post.title'));
            $data['top']=trim(I('post.top'));
            $res=$ad->save($data);
            if($res>=0){
                echo "<script>alert('保存成功');location='../../index'</script>";
            }else{
                echo "<script>alert('保存失败');location='../../index'</script>";
            }
        }else{
            $this->assign('adinfo',$adinfo);
            $this->display('edit');
        }
    }
//顶置
    public function on(){
        $date['id']=$_GET['id'];
        $date['top']=1;
        $ad=M('Ads');
        $res=$ad->save($date);
        if($res){
            echo "<script>alert('置顶成功');location='../../index'</script>";
        }else{
            echo "<script>alert('置顶失败');location='../../index'</script>";
        }
    }
//取消顶置
    public function off(){
        $date['id']=$_GET['id'];
        $date['top']=0;
        $ad=M('Ads');
        $res=$ad->save($date);
        if($res){
            echo "<script>alert('取消成功');location='../../index'</script>";
        }else{
            echo "<script>alert('取消失败');location='../../index'</script>";
        }
    }
}





