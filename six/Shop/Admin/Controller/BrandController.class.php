<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
class BrandController extends BgController {
    public function add(){



        $this->display('add');

    }
    public function show(){
        $brand=D("Brands");
//        $info=$brand->show();
//        $this->assign("info",$info);
        $where=I("get.where");

        if($where){
            $res="";
            if(str_replace($where,'','男装品牌')!='男装品牌'){
                $res.=",1";
            }
            if(str_replace($where,'','女装品牌')!='女装品牌'){
                $res.=",2";
            }
            if(str_replace($where,'','国内品牌')!='国内品牌'){
                $res.=",3";
            }
            if(str_replace($where,'','国外品牌')!='国外品牌'){
                $res.=",4";
            }
            if($res){
                $res=substr($res,1);
                $res="or type in (".$res.")";
            }
            $where="bname like '%".$where."%' or website like '%".$where."%' ".$res;
        }else{
            $where="";
        }
        /*        var_dump(str_replace($where,'','国内品牌'));
                exit;*/
        $count=$brand->where($where)->count();

//        $page=new \Think\Page($count,4);
        $page=new \Org\Yh\AjaxPage($count,4,"show");
//        $page->setConfig('header','<span class="rows">&nbsp;&nbsp;&nbsp;共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
//        $page->setConfig('prev','上页');
//        $page->setConfig('next','下页');
//        $page->setConfig('first','首页');
//        $page->setConfig('end','尾页');
//        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show=$page->show();
        $list=$brand->order('addtime')->limit($page->firstRow.','.$page->listRows)->where($where)->select();
        $this->assign('show',$show);
        $this->assign('list',$list);
        $this->assign('where',I("get.where"));
        $this->assign("empty","<tr><td class='empty'colspan='7' style='color:red;text-align: center;font-size: 30px'>没有符合条件的分类</td></tr>");
//        $this->display('show');
        if(IS_AJAX){
            $this->display('show');
        }else{
            $this->display();
        }
    }
    public function update(){
        $brand=D("Brands");
        $info=$brand->update(I("get.id"));
        $this->assign("brand",$info);
        $this->display('update');
    }
    public function addbrand(){
        if($_POST){
            $brand=D("Brands");
            $upload = new \Think\Upload();
            $upload->maxsize = 666666666;
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');;
            $upload->rootPath = "./Uploads/";
            $upload->savePath = "./logo_h/";
            $upload->autoSub = false;
            $info = $upload->upload();
            $filepath = "./Uploads/logo_h/";
            $filename=$filepath. $info["logo"]["savename"];
            $image = new \Think\Image;
            $image->open($filename);
            $image->thumb(125, 38)->save('./Uploads/logo/' . $info["logo"]['savename']);
            $_POST["logo"] = $info["logo"]["savename"];


//        $brands = $brand->show1($_POST);
//        $this->assign("brands", $brands);
            $result=$brand->addbrand(I("post."));
            if($result){
                unset($_FILES);
                echo $this->success("添加成功");
            }else{
                echo $this->error("添加失败");
            }
        }else{
            echo $this->error("添加失败");
        }


    }
    public function updateBrand()
    {
        if (count($_POST) >= 5) {
            $brand = D("Brands");

            $upload = new \Think\Upload();
            $upload->maxsize = 666666666;
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');;
            $upload->rootPath = "./Uploads/";
            $upload->savePath = "./logo_h/";
            $upload->autoSub = false;
            $info = $upload->upload();
            if ($info) {
                $filepath = "./Uploads/logo_h/";
                $filename = $filepath . $info["logo"]["savename"];
                $image = new \Think\Image;
                $image->open($filename);
                $image->thumb(125, 38)->save('./Uploads/logo/' . $info["logo"]['savename']);
                $_POST["logo"] = $info["logo"]["savename"];
                $info = $brand->updatebrand(I("post."));
            } else {
                $brand = D("Brands");
                $info = $brand->updatebrand(I("post."));
            }
            if ($info) {
                unset($_FILES);
                echo $this->success("更新成功");
            } else {
                echo $this->error("更新失败");
            }
        }else{
            echo $this->error("更新失败");
        }
    }
    public function del(){
        $brand=M('Brands');
        $id=I('get.id');
        $where=array('id'=>$id);
        $result=$brand->where($where)->delete();
        if($result){
            echo '已成功删除！';

        }
    }

}