<?php
namespace Admin\Controller;
use Think\Controller;
class BrandController extends Controller{
    public function _initialize(){
        if(session('aid')<1){
            $this->redirect('Admin/index');

        }
    }
    public function add(){

        if(IS_POST){
           // $data=I('post.');
            $brand=D('brand');
            if($brand->create()){
                $data=$brand->create();
                $upload=new \Think\Upload();
                $upload->rootPath = './Uploads/';
                $upload->maxSize  =3145728 ;// 设置附件上传大小
                $upload->autoSub  =false ;// 设置附件上传大小
                $upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $info=$upload->upload();
                if(!$info){
                    $this->ajaxReturn(array('status'=>'error','msg'=>'图片不能为空'));
                }
                $data['pic']=$info['pic']['savename'];
                $data['time']=time();
                $a=$brand->add($data);
                if($a>0){
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'品牌添加成功'));
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'品牌添加失败，请重新添加'));
                }
            }else{
                $b=$brand->getError();
                $this->ajaxReturn(array('status'=>'error','msg'=>$b));
            }
        }else{
            $this->display();
        }
    }
    public function brandlist(){
        $brand=M('brand');
        $count=$brand->count();
        $Page = new \Think\Page($count,3);
        $show=$Page->show();
        $brandList=$brand->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $map['key']=I('get.key');
        foreach($map as $key=>$val) {
            $Page->parameter[$key]   =   urlencode($val);
        }
        $this->assign("brand",$brandList);
        $this->assign("page",$show);

        $this->assign("firstRow",$Page->firstRow);
        $this->display();

}
    public function del(){
        $id=I('post.id');
        $del=M('brand');
       $a=$del->where("id=$id")->delete();
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }

    }
}