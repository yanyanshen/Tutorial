<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\GoodsModel;
use Tools\Page;
use QL\QueryList;
//use Admin\Common\Controller\BgController;

class GoodsController extends Controller {
    //添加商品
    public function add_goods(){

        $goods=D('Goods');
        $cate=D('category');
        $brand=D('brands');

        $brands=$brand->select();
        $cates=$cate->where("pid=0")->select();

        $this->assign("fCate",json_encode($cates));
        $this->assign('brands',$brands);

        $cid="";
        if(isset($_POST['thirdCate'])){
            $cid=$_POST['thirdCate'];
            unset($_POST['thirdCate']);
        }elseif(isset($_POST['secondCate'])){
            $cid=$_POST['secondCate'];
            unset($_POST['secondCate']);
        }elseif(isset($_POST['firstCate'])) {
            $cid=$_POST['firstCate'];
            unset($_POST['firstCate']);
        }



        if(!empty($_POST)){
            // 处理上传的图片

            if($_FILES['image']['tmp_name'][0]){

                $up=new \Think\Upload();
                $up->maxSize=3145728 ;
                $up->exts=array('jpg', 'gif', 'png', 'jpeg');
                $up->rootPath='./uploads/';
                $up->savePath='n0/';
                $up->autoSub=false;

                $info=$up->upload();

                if(!$info){
                    echo $up->getError();
                }else{
                    $filename='';
                    foreach ($info as $k=>$v){
                        $thum=new \Think\Image();
                        $filepath='./uploads/n0/';
                        $fullname=$filepath.$v['savename'];
                        $thum->open($fullname);
                        $thum->thumb(800,800)->save('./uploads/n1/'.$v['savename']);
                        $thum->thumb(350,350)->save('./uploads/n2/'.$v['savename']);
                        $thum->thumb(68,68)->save('./uploads/n3/'.$v['savename']);
                        $filename.=','.$v['savename'];
                    }
                    $_POST['image']=substr($filename,1);

                }
            }

            $_POST["cid"]=$cid;
            $_POST['createtime']=time();
            $info=$goods->create();

            $a=$goods->add();
//            print_r($a);
//            print_r($a);
//            exit;
            if($a){

               echo $this->success('数据添加成功！');

                //$this->redirect('goodsList',array(),2,'数据添加成功！');
            }else{
                echo $this->error('数据添加失败！');

                //$this->redirect('add_goods',array(),2,'数据添加失败！');
            }

        }else{
            $this->display();
        }
    }


    public function add_data(){

        $goods=D('Goods');
        $cate=D('category');
        $brand=D('brands');

        $brands=$brand->select();
        $cates=$cate->where("pid=0")->select();

        $this->assign("fCate",json_encode($cates));
        $this->assign('brands',$brands);

        $cid="";
        if(isset($_POST['thirdCate'])){
            $cid=$_POST['thirdCate'];
            unset($_POST['thirdCate']);
        }elseif(isset($_POST['secondCate'])){
            $cid=$_POST['secondCate'];
            unset($_POST['secondCate']);
        }elseif(isset($_POST['firstCate'])) {
            $cid=$_POST['firstCate'];
            unset($_POST['firstCate']);
        }



        if(isset($_POST)&&$_POST>0){
            // 处理上传的图片

            if($_FILES['image']['tmp_name'][0]){

                $up=new \Think\Upload();
                $up->maxSize=3145728 ;
                $up->exts=array('jpg', 'gif', 'png', 'jpeg');
                $up->rootPath='./uploads/';
                $up->savePath='n0/';
                $up->autoSub=false;

                $info=$up->upload();

                if(!$info){
                    echo $up->getError();
                }else{
                    $filename='';
                    foreach ($info as $k=>$v){
                        $thum=new \Think\Image();
                        $filepath='./uploads/n0/';
                        $fullname=$filepath.$v['savename'];
                        $thum->open($fullname);
                        $thum->thumb(350,350)->save('./uploads/n1/'.$v['savename']);
                        $thum->thumb(150,150)->save('./uploads/n2/'.$v['savename']);
                        $thum->thumb(50,50)->save('./uploads/n3/'.$v['savename']);
                        $filename.=','.$v['savename'];
                    }
                    $_POST['image']=substr($filename,1);

                }
            }

            $_POST["cid"]=$cid;
            $_POST['createtime']=time();
            $info=$goods->create();

            $a=$goods->add();
//            print_r($a);
//            print_r($a);
//            exit;
            if($a){

               echo $this->success('数据添加成功！');

                //$this->redirect('goodsList',array(),2,'数据添加成功！');
            }else{
                echo $this->error('数据添加失败！');

                //$this->redirect('add_goods',array(),2,'数据添加失败！');
            }

        }else{
           echo $this->error('数据添加失败！');
        }
    }

    //商品展示
    public function goodsList(){

        // $model=D('goods');
        // $info=$model->join('sk_brands on sk_goods.bid=sk_brands.id')->search();

        $obj=new GoodsModel();
        $info=$obj->search();
        $this->assign($info);
//        $this->assign('page',$pageString);
//        print_r($info);
        $this->assign('empty','<span class="empty">对不起没有你要找的商品!</span>');

//        $this->display();
        if(IS_AJAX){
            $this->display('gList');
        }else{
            $this->display();
        }

    }
    //修改商品
    public function update_goods($id){
        $goods=D('goods');
        $find=$goods->find($id);
        $img=explode(",",$find["image"]);
        if(!empty($_POST)){
            $up=new \Think\Upload();
            $thum=new \Think\Image();
            $up->maxSize=3145728 ;
            $up->exts=array('jpg', 'gif', 'png', 'jpeg');
            $up->rootPath='./uploads/';
            $up->savePath='n0/';
            $up->autoSub=false;

            $info=$up->upload();
            $images=array();
            $del=array();
            foreach($info as $k=>$v){
                $filepath='./uploads/n0/';
                $fullname=$filepath.$v['savename'];
                $thum->open($fullname);
                $thum->thumb(350,350)->save('./uploads/n1/'.$v['savename']);
                $thum->thumb(150,150)->save('./uploads/n2/'.$v['savename']);
                $thum->thumb(50,50)->save('./uploads/n3/'.$v['savename']);
                $a=substr($k,5);
                $images[$a]=$v["savename"];
            }
            foreach($img as $k1=>$v1){
                if($images[$k1]){
                    $del[]=$img[$k1];
                    $img[$k1]=$images[$k1];
                }
            }

            $_POST["image"]=implode(",",$img);
            unset($_POST["image0"]);
            unset($_POST["image1"]);
            unset($_POST["image2"]);
            unset($_POST["image3"]);


            foreach($del as $k2=>$v2){
                unlink('./Uploads/n0/'. $v2);
                unlink('./Uploads/n1/'. $v2);
                unlink('./Uploads/n2/'. $v2);
                unlink('./Uploads/n3/'. $v2);
            }





            $_POST['is_show']=I('is_show')?I('is_show'):0;
            $_POST['tj']=I('tj')?I('tj'):0;
            $_POST['hot_sale']=I('hot_sale')?I('hot_sale'):0;

            $pid="";
            if(isset($_POST['thirdCate'])&&$_POST['thirdCate']>0){
                $pid=$_POST['thirdCate'];
            }elseif(isset($_POST['secondCate'])&&$_POST['secondCate']>0){
                $pid=$_POST['secondCate'];
            }elseif(isset($_POST['firstCate'])) {
                $pid=$_POST['firstCate'];
            }
            $_POST["cid"]=$pid;

            unset($_POST["thirdCate"]);
            unset($_POST["secondCate"]);
            unset($_POST["firstCate"]);
//            $_POST["goodsintro"]=trim($_POST["goodsintro"]);
//            $_POST["goodspro"]=trim($_POST["goodspro"]);
//            $_POST["goodsdetail"]=trim($_POST["goodsdetail"]);

            $goods->create();
            $a=$goods->field("id,goodsname,cid,goodsnum,saleprice,markprice,is_show,tj,image,goodsintro,goodspro,goodsdetail,hot_sale")->save($_POST);
            if($a){
                echo $this->success('商品修改成功！');
            }else{
                echo $this->error('商品修改失败！');
            }
        }else{
            $info=$goods->find($id);
            $img=explode(",",$info["image"]);
            $info["image"]=$img;
            $cate=M("category");
            $fCate=$cate->field("catename,id")->where("pid=0")->select();

            $path=$cate->field("path")->find($info["cid"]);
            $patharr=explode(",",$path["path"]);
            $this->assign("fCate",json_encode($fCate));
            $this->assign('path',$patharr);
            $this->assign('info',$info);
            $this->display();
        }

    }
    //删除商品
    public function delete_goods(){
        $goods=D('goods');
        $del=$goods->delete(I('id'));
        if($del){
             // $this->redirect('goodsList',array(),2,'商品删除成功');
            echo $this->success('删除成功！');
        }else{
             echo $this->error('删除失败');
        }
    }
    //商品展示
//    public function show(){
//        $goods=D('goods');
//        $info=$goods->select();
//        $info['id']=I('get.id');
//        $info['is_show']=1;
//        $goods->save($info);
//        $this->goodsList('goodsList');
//        
//    }

     //导出excel
    public function exportExcel($expTitle,$expCellName,$expTableData){
        ob_clean();
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = '商品信息'.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor('PHPExcel.PHPExcel','','.php');
        vendor('PHPExcel.PHPExcel.IOFactory','','.php');
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        $objPHPExcel->setActiveSheetIndex(0)->setTitle('商品信息');
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '数据表:'.$expTitle.'  导出时间:'.date('Y-m-d H:i:s').'   操作人:'.session('admin.username'));//写入首行信息
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->getActiveSheet()->getColumnDimension($cellName[$i])->setWidth(15);//设置单元格宽度
            $objPHPExcel->getActiveSheet()->getStyle($cellName[$i].'2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//设置单元格居中
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]); //写入表格抬头
        }
        // 写入内容
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet()->getStyle($cellName[$j].($i+3))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
    /**
     *
     * 导出Excel
     */
    public  function expGoods(){//导出Excel
        $xlsName  = "goods";
        $xlsCell  = array(
            array('id','商品ID'),
            array('goodsname','商品名称'),
            array('saleprice','市场价格'),
            array('markprice','本站价格'),
            array('cid','分类ID'),
            array('goodsnum','库存'),
            array('salenum','销售数量'),
            array('createtime','上传时间')
        );
        $xlsModel = M('goods');
        // print_r($xlsModel);

        $xlsData  = $xlsModel->Field('id,goodsname,saleprice,markprice,cid,goodsnum,salenum,createtime')->select();
        foreach ($xlsData as $k => $v)
        {
            $xlsData[$k]['createtime']=date('Y-m-d H:i:s',$v['createtime']);
            // $xlsData[$k]['hot']=$v['hot']==1?'热销':'非热销';
            // $xlsData[$k]['tj']=$v['tj']==1?'推荐':'非推荐';
            // $xlsData[$k]['issale']=$v['issale']==1?'在售':'下架';
        }
        $this->exportExcel($xlsName,$xlsCell,$xlsData);

    }
}
