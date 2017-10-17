<?php
namespace Admin\Controller;
use Admin\Model\CategoryModel;
use Admin\Model\GoodsModel;
use Think\Controller;
use Think\Image;
use Think\Page;
use Think\Upload;
use QL\QueryList;

class GoodsController extends Controller {
    public function _initialize(){
        if(!session('admin_uid')){
            $this->redirect('Adminlogin/login');
           /* $this->error('请先登录!',U('Adminlogin/login'));*/
        }
    }
    public function index(){

    }
    //渲染添加商品模板
    public function add_goods(){
        $obj=new CategoryModel();
        $fCate=$obj->firstCate();
        $this->assign('fCate',$fCate);
        $this->display();
    }
    //保存商品到数据库
    public function save_goods(){
        $goodsinfo=I('post.');
        if(I('thirdCate')){
            $goodsinfo['cid']=I('thirdCate');
        }elseif(!I('thirdCate') && I('secondCate')){
            $goodsinfo['cid']=I('secondCate');
        }elseif(!I('thirdCate') && !I('secondCate')){
            $goodsinfo['cid']=I('firstCate');
        }
        if($_FILES['image']['tmp_name'][0]){
            $upload=new Upload();
            $upload->maxSize=1024*1024*3;
            $upload->exts=array('jpg','gif','png','jpeg');
            $upload->rootPath='./upload/';
            $upload->savePath='n0/';
            $upload->autoSub=false;
            $info=$upload->upload();
            if(!$info){
                echo $upload->getError();
            }else{
                $filename='';
                foreach($info as $k=>$v){
                    $thum=new Image();
                    $filepath='./upload/n0/';
                    $fullname=$filepath.$v['savename'];
                    $thum->open($fullname);
                    $thum->thumb(350,350)->save('./upload/n1/'.$v['savename']);
                    $thum->thumb(150,150)->save('./upload/n2/'.$v['savename']);
                    $thum->thumb(50,50)->save('./upload/n3/'.$v['savename']);
                    $filename.=','.$v['savename'];
                }
                $goodsinfo['image']=substr($filename,1);
            }
        }
        $obj=new GoodsModel();
        if($obj->saveGoods($goodsinfo)){
            echo "添加成功";
        }else{
            echo "添加失败";
        }
    }
    //渲染商品列表模板
    public function goodsList(){
        $goodssearch['goodsname']=I('goodsname');
        $obj=new GoodsModel();
        $goods=$obj->getAllGoods($goodssearch);
        $count=count($goods);
        $page=new Page($count,20);
        foreach($goodssearch as $k=>$v){
            $page->parameter[$k]=$v;
        }
        $show=$page->show();
        $goodsList=$obj->getAllGoods($goodssearch,$page->firstRow,$page->listRows);
        $cate=new CategoryModel();
        foreach($goodsList as $k=>$v){
            $goodscate=$cate->getCate($v['cid']);
            $goodsList[$k]['catename']=$goodscate['catename'];
        }
        $this->assign('goodsList',$goodsList);
        $this->assign('page',$show);
        $this->display();
    }

    //渲染编辑商品模板
    public function editGoods(){
        $id=I('id');
        $obj=new GoodsModel();
        $goods=$obj->getGoodsById($id);
        $cateModel=new CategoryModel();
        $goods['goodsCate']=$cateModel->getParentByChild($goods['cid']);
        $fCate=$cateModel->firstCate();
        $sCate=$cateModel->firstChildCate($goods['goodsCate'][0]);
        $tCate=$cateModel->firstChildCate($goods['goodsCate'][1]);
        $this->assign('goods',$goods);
        $this->assign('fCate',$fCate);
        $this->assign('sCate',$sCate);
        $this->assign('tCate',$tCate);
        $this->display('edit_goods');
    }

    //保存编辑的商品到数据库
    public function editSave(){
        $goodsinfo=I('post.');
        $goodsinfo['issale']=I('issale')?I('issale'):0;
        $goodsinfo['hot']=I('hot')?I('hot'):0;
        $goodsinfo['tj']=I('tj')?I('tj'):0;
        if(I('thirdCate')){
            $goodsinfo['cid']=I('thirdCate');
        }elseif(!I('thirdCate') && I('secondCate')){
            $goodsinfo['cid']=I('secondCate');
        }elseif(!I('thirdCate') && !I('secondCate')){
            $goodsinfo['cid']=I('firstCate');
        }
        if($_FILES['image']['tmp_name'][0]){
            $upload=new Upload();
            $upload->maxSize=1024*1024*3;
            $upload->exts=array('jpg','gif','png','jpeg');
            $upload->rootPath='./upload/';
            $upload->savePath='n0/';
            $upload->autoSub=false;
            $info=$upload->upload();
            if(!$info){
                echo $upload->getError();
            }else{
                $filename='';
                foreach($info as $k=>$v){
                    $thum=new Image();
                    $filepath='./upload/n0/';
                    $fullname=$filepath.$v['savename'];
                    $thum->open($fullname);
                    $thum->thumb(350,350)->save('./upload/n1/'.$v['savename']);
                    $thum->thumb(150,150)->save('./upload/n2/'.$v['savename']);
                    $thum->thumb(50,50)->save('./upload/n3/'.$v['savename']);
                    $filename.=','.$v['savename'];
                }
                $goodsinfo['image']=substr($filename,1);
            }
        }
        $obj=new GoodsModel();
        if($obj->editSave($goodsinfo)){
            $this->success("修改成功",U('goodsList',array('r'=>time())));
        }else{
            $this->error("修改失败");
        }
    }

    //删除商品
    public function delGoods(){
        $id=I('id');
        $obj=new GoodsModel();
        if($obj->delGoods($id)){
            $this->success('删除成功',U('goodsList',array('b'=>uniqid())),2);
        }else{
            $this->error('删除失败');
        }
    }

    //删除checkbox选定商品
    public function delMoreGoods(){
        $data=I('post.data');
        $obj=new GoodsModel();
        for($i=0;$i<=count($data);$i++){
            $obj->delGoods($data[$i]['value']);
        }
        $this->ajaxReturn(array('message'=>'删除成功!'));
    }


    //导出到excel成员方法
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
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '数据表:'.$expTitle.'  导出时间:'.date('Y-m-d H:i:s').'   操作人:'.session('admin_name'));//写入首行信息
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
        $xlsName  = "User";
        $xlsCell  = array(
            array('id','商品ID'),
            array('goodsname','商品名称'),
            array('busiprice','市场价格'),
            array('siteprice','本站价格'),
            array('cid','分类ID'),
            array('goodsargs','商品味道'),
            array('weight','商品净重'),
            array('hot','是否热销'),
            array('tj','是否推荐'),
            array('issale','是否在售'),
            array('goodsnum','库存'),
            array('salenum','销售数量'),
            array('createtime','上传时间')
        );
        $xlsModel = M('goods');

        $xlsData  = $xlsModel->Field('id,goodsname,busiprice,siteprice,cid,goodsargs,weight,hot,tj,issale,goodsnum,salenum,createtime')->select();
        foreach ($xlsData as $k => $v)
        {
            $xlsData[$k]['createtime']=date('Y-m-d H:i:s',$v['createtime']);
            $xlsData[$k]['hot']=$v['hot']==1?'热销':'非热销';
            $xlsData[$k]['tj']=$v['tj']==1?'推荐':'非推荐';
            $xlsData[$k]['issale']=$v['issale']==1?'在售':'下架';
        }
        $this->exportExcel($xlsName,$xlsCell,$xlsData);

    }
    function impGoods(){
        if (!empty($_FILES)) {
            $config = array(
                'maxSize'    =>    3145728,
                'rootPath'   =>    './upload/',
                'savePath'   =>    'file/',
                'saveName'   =>    array('uniqid',''),
                'exts'       =>    array('xls'),
                'autoSub'    =>    true,
                'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);
            $info   =   $upload->upload();
            if (!$info) {
                $this->error($upload->getError());
            } else {
                foreach($info as $file)
                {
                    $file_name='./upload/'.$file['savepath'].$file['savename'];
                }
            }
            vendor('PHPExcel.PHPExcel.IOFactory','','.php');
            $objReader = \PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($file_name,$encode='utf-8');
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow(); // 取得总行数
            $highestColumn = $sheet->getHighestColumn(); // 取得总列数
            for($i=3;$i<=$highestRow;$i++)
            {
                $data['goodsname']= $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
                $data['busiprice'] = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
                $data['siteprice']    = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
                $data['cid']    = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
                $data['goodsargs'] = $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
                $data['weight'] = $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
                $data['hot']= $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue()=='热销'?1:0;
                $data['tj']= $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue()=='推荐'?1:0;
                $data['issale']= $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue()=='在售'?1:0;
                $data['goodsnum']= $objPHPExcel->getActiveSheet()->getCell("K".$i)->getValue();
                $data['createtime']= time();
                M('goods')->add($data);

            }
            $this->success('导入成功,商品已添加到数据库,如需上传图片,请点击编辑添加！',U('goodsList',array('b'=>uniqid())),5);
        }else
        {
            $this->error("请选择上传的文件");
        }

    }
}