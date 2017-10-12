<?php
namespace Admin\Controller;
use Admin\Model\AdminModel;
use Think\Controller;
class AdminController extends Controller
{
    public function add_admin()
    {
        $this->display();
    }


    public function checkName()
    {
        $code = trim(I('post.name'));
        $ad = M("admin");
        if (!$ad->where(array("name" => $code))->find()) {
            echo 'true';
        } else {
            echo 'false';
        }
    }


    public function checkLevel()
    {
        $code = trim(I('post.id_law'));
        if ($code > 0) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    //渲染管理员列表模板
    public function saveAdmin()
    {
        if (IS_POST) {
            if (session('level') > 0) {
                $ad = $_POST;
                $ad['create_time'] = time();

                $ad['password']=trim(md5($ad['password']));
                $ad['repwd']=trim(md5($ad['repwd']));


                $data = new AdminModel();
                if ($data->create($ad)) {
                    if (false !== $data->add()) {
                        $this->ajaxReturn(array(status => 'ok', 'msg' => '添加成功!'));
                    } else {
                        $this->ajaxReturn(array(status => 'error', 'msg' => '添加失败!'));
                    }
                }
            } else {
                $this->ajaxReturn(array(status => 'error', 'msg' => '对不起您没有权限!'));
            }
        }
    }

    public function adminList()
    {
        $adminsearch['name'] = I('name') ? I('name') : '';
        $obj = new AdminModel();

       /*print_r($_SESSION);*/

        $admin = $obj->getAllAdmin($adminsearch['name']);
        $count = count($admin);
        $page = new \Think\Page($count, 4);
        foreach ($adminsearch as $k => $v) {
            $page->parameter[$k] = $v;
        }
        $show = $page->show();
        $adminlist = $obj->getAllAdmin($adminsearch, $page->firstRow, $page->listRows);
        $this->assign('adminlist', $adminlist);
        $this->assign('page', $show);
        $this->display();
    }


    //渲染编辑管理员模板
      public function editAdmin(){
       $data['id']=I('id');
       $obj=new AdminModel();
       $admin=$obj->getAdminById($data['id']);
       $this->assign('admin',$admin);
       $this->display('edit');
   }


    //保存再编辑内容
  /*  public function editSave(){
        if(IS_POST) {
            $ad = $_POST;
            $ad['create_time'] = time();
            $ad['id'] = I('id');
            $data = new AdminModel();
            if($data->editSave($ad)){
                $this->ajaxReturn(array(status=>'ok','msg'=>'编辑成功!'));
            }elseif(is_int($data->editSave($ad))){
                $this->ajaxReturn(array(status=>'error','msg'=>'数据未变更!'));
            }else{
                $this->ajaxReturn(array(status=>'error','msg'=>'编辑失败!'));
            }
        }

    }*/


/**/

     public function editSave(){
           if(IS_POST) {
               $ad = $_POST;
               $ad['create_time'] = time();
               $ad['id'] = I('id');
               $data = new AdminModel();
               if(session('level')>0){
                   if($data->editSave($ad)){
                       $this->ajaxReturn(array(status=>'ok','msg'=>'编辑成功!'));
                   }elseif(is_int($data->editSave($ad))){
                       $this->ajaxReturn(array(status=>'error','msg'=>'数据未变更!'));
                   }else{
                       $this->ajaxReturn(array(status=>'error','msg'=>'编辑失败!'));
                   }
               }elseif($ad['id']==session('aid')){
                   $ad['id_law']=0;
                   if($data->editSave($ad)){
                       $this->ajaxReturn(array(status=>'ok','msg'=>'编辑成功!'));
                   }elseif(is_int($data->editSave($ad))){
                       $this->ajaxReturn(array(status=>'error','msg'=>'数据未变更!'));
                   }else{
                       $this->ajaxReturn(array(status=>'error','msg'=>'编辑失败!'));
                   }
               }else{
                   $this->ajaxReturn(array(status=>'error','msg'=>'您没有权限!'));
               }

           }}






    //删除管理员
    public function delAdmin(){
        if(IS_POST){
            if(session('level')>0){
        $data['id']=I('id');
        $obj=new AdminModel();
        if($obj->delAdmin($data)){
            $this->ajaxReturn(array('status'=>'ok','message'=>'删除成功!'));
        }else{
            $this->ajaxReturn(array('status'=>'error','message'=>'删除失败!'));
        }
        }else{
                $this->ajaxReturn(array('status'=>'error','message'=>'对不起您没有权限!'));
            }
}
}
    public function delMoreAdmins(){
        if(session('level')>0){
        $obj=new AdminModel();
        $data=I('post.data');
        for($i=0;$i<=count($data);$i++){
            $obj->delAdmins($data[$i]['value']);
        }
        $this->ajaxReturn(array('message'=>'删除成功!'));
         } else
          {
      $this->ajaxReturn(array('status' => 'error', 'message' => '对不起您无权限!'));
         }

}}