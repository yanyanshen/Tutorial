<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Admin\Model\AdvertisingModel;
class AdvertisingController extends BgController{
//    广告遍历出来
    public function advertising(){
        $a = M('Advertising');
        $where=array();
        $search=I('get.search');
        if($search){
            $where['name']=array('like',"%$search%");
        }
        $totalRows = $a->where($where)->count();
        //创建分页对象时，分页对象需要总记录数和分页条数
        $page = new \Think\Page($totalRows,7);
        $page -> rollPage =5; //分页列表上显示多少条
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%   %HEADER%');
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        $pageHtml = $page->show();//生成分页的连接诶效果（分页工具条的html代码）
        //2.查询出当前页面的列表数据
            $ad = $a ->where($where)-> limit($page->firstRow,$page->listRows)->select();
        $this -> assign('ad',$ad);
        $this -> assign('pageHtml',$pageHtml);//分配分页栏到模版
        $this->display();
    }
//    添加广告模块
    public function add(){
        if(IS_POST){
            $data['name'] = I('ad_name');
            $data['sale'] = I('ad_sale');
            $data['place'] = I('ad_place');
            $data['url'] = I('ad_url');
            $data['status'] = I('ad_rem');
            $data['details'] = I('advertising');
            $data['createtime'] = time();
            if($_FILES['ad_pic']['tmp_name']!=''){
                $upload = new \Think\Upload();//实例化上传类
                $upload ->maxSize = 6666666666; //设置文件上传大小
                $upload ->exts = array('jpg','gif','png','jpeg',',');
                $upload ->rootPath = './uploads/'; //设置图片路径
                $upload ->savePath = 'AdImgs/'; //设置附件上传目录
                $upload->autoSub = false;
                //附加的
                $upload->saveRule = uniqid; //上传规则
                $upload->thumbRemoveOrigin = true; //删除原图
                //附加的
                $info = $upload->uploadOne($_FILES['ad_pic']);
                //组装sql语句，让图片融入$data['image'],让活动商品也融入$data['activity'].
                if($info){
                    $data['image'] = basename($info['savepath'].$info['savename']);
                }else{
                   echo $this->error($upload->getError());
                }
            }
            $mod = D('advertising');
            if($mod->create($data)){
                if($mod->add()){
                    echo $this->success('广告添加成功');
                }else{
                    echo $this->error('添加广告失败！');
                }
            }else{
              echo  $this->error($mod->getError(''));
            }
            return;
        }
        $this->display();
    }
    //广告编辑
    public function edit(){
        $id = I('id');
        $amod = M('Advertising')->find($id);
        $this->assign('amod', $amod);
        if (IS_POST) {
            $data['name'] = I('ad_name');
            $data['sale'] = I('ad_sale');
            $data['place'] = I('ad_place');
            $data['url'] = I('ad_url');
            $data['status'] = I('ad_rem');
            $data['details'] = I('advertising');
            $data['createtime'] = time();
            $data['id'] = I('ad_id');
            if ($_FILES['ad_pic']['tmp_name']!=''){
                $upload = new \Think\Upload();
                $upload->maxSize = 6666666666;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg',',');
                $upload->rootPath = './uploads/';
                $upload->savePath = 'AdImgs/';
                $upload->autoSub = false;
                $info = $upload->uploadOne($_FILES['ad_pic']);
                if($info){
                    //删掉原来的图片
                    $cp = M('Advertising')->find($id);
                    unlink($cp['image']);
                    $data['image'] = basename($info['savepath'].$info['savename']);
                }else{
                    echo $this->error($upload->getError());
                }
            }
            $mod =D("Advertising");
            if($mod-> create($data)){
                if($mod->save()){
                     echo $this->success('编辑成功');
                }else{
                    echo $this ->error('编辑失败');
                }
            }else{
                echo $this->error($mod->getError());
            }
            return;
        }
        $this->display();
    }

    //广告删除
    public function del(){
        $id = I('id');
        if(M('advertising')->delete($id)){
            $this->redirect('advertising');
        }
    }
    //广告批量删除
    public function tdel(){
        $tdel = I("tdel");
        $tdel = implode(',',$tdel); //implode 让数组拆分成字符串形式
        $mod = M('Advertising');
        if($mod->delete($tdel)){
           echo $this->success('删除成功');
        }else{
           echo $this->error('删除失败');
        }
    }
}