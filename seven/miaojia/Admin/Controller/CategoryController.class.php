<?php
namespace Admin\Controller;
use Admin\Model\CategoryModel;
use Think\Controller;
use Think\Page;

class CategoryController extends Controller {
    public function _initialize(){
      if(!session('admin_uid')){
         $this->redirect('Adminlogin/login');
            /*$this->error('请先登录!',U('Adminlogin/login'));*/
        }
    }
    public function index(){

    }
    //分类列表
    public function categoryList(){
        $obj=new CategoryModel();
        $catename['catename']=I('catename')?I('catename'):'';
        $cate=$obj->getAllCate($catename['catename']);
        $count=count($cate);
        $page=new Page($count,20);
        foreach($catename as $k=>$v){
            $page->parameter[$k]=$v;
        }
        $show=$page->show();
        $cateList=$obj->getAllCate($catename['catename'],$page->firstRow,$page->listRows);
        foreach($cateList as $k=>$v){
            $pathname='';
            foreach(explode(',',$v['path']) as $key=>$val){
                $pathid=$obj->getCate($val);
                $pathname.='>>'.$pathid['catename'];
            }
            $cateList[$k]['pathname']=substr($pathname,2);

        }
        $this->assign('cateList',$cateList);
        $this->assign('page',$show);
        $this->display();
    }

    //删除分类
    public function delCategory(){
        $cate['id']=I('id');
        $obj=new CategoryModel();
        if($obj->delCategory($cate['id'])){
            $this->success('删除成功');
        }else{
            $this->error('存在下级分类，不允许删除');
        }
    }
    //删除check选定的商品
    public function delChk(){
        $data=I('post.data');
        $obj=new CategoryModel();
        for($i=0;$i<=count($data);$i++){
            $obj->delCategory($data[$i]['value']);
        }
        $this->ajaxReturn(array('message'=>'删除成功！优先删除的是下一级的分类'));
    }

    //渲染添加分类模板并且把顶级分类赋值
    public function add_category(){
        $obj=new CategoryModel();
        $fCate=$obj->firstCate();
        $this->assign('fCate',$fCate);
        $this->display();
    }

    //当顶级分类有变化时，赋值二级分类
    public function firstChildCate(){
        $obj=new CategoryModel();
        $sCate=$obj->firstChildCate(I('fpid'));
        echo $sCate;
    }

    //添加分类到数据库
    public function addCategory(){
        if(!I('catename')){
            $this->error('对不起，分类名称不能为空!','',1);
        }else{
            $cate['first']=I('firstCate');
            $cate['second']=I('secondCate')?I('secondCate'):0;
            $cate['catename']=I('catename');
            $obj=new CategoryModel();
            echo $obj->addCategory($cate);
        }
    }

    //编辑分类模板输出
    public function editCategory(){
        $id=I('id');
        $obj=new CategoryModel();
        $fCate=$obj->firstCate();    //输出顶级分类
        $cate=$obj->getCate($id);     //根据ID查找分类
        $catePath=explode(',',$cate['path']);    //将查询出来的分类的path以“，”的形式分割成关联数组。
        if(count($catePath)==3){
            $cate['fCate']=$catePath[0];
            $cate['sCate']=$catePath[1];
        }elseif(count($catePath)==2){
            $cate['fCate']=$catePath[0];
            $cate['sCate']=0;
        }elseif(count($catePath)==1){
            $cate['fCate']=0;
            $cate['sCate']=0;
        }
        $this->assign('cate',$cate);
        $this->assign('fCate',$fCate);
        $this->assign('cateid',$id);
        $this->display('edit_category');
    }

    //编辑分类插入数据库
    public function saveCategory(){
        if(!I('catename')){
            $this->error('对不起，分类名称不能为空!','',1);
        }else{
            $cate['first']=I('firstCate');
            $cate['second']=I('secondCate')?I('secondCate'):0;
            $cate['catename']=I('catename');
            $cate['id']=I('id');
            $obj=new CategoryModel();
            if($obj->saveCategory($cate)){
                $this->success('编辑成功','',2);
            }
        }
    }

    //导出到excel成员方法
    public function exportExcel($expTitle,$expCellName,$expTableData){
        ob_clean();     //用来丢弃输出缓冲区中的内容
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = '商品分类信息'.date('—YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor('PHPExcel.PHPExcel','','.php');
        vendor('PHPExcel.PHPExcel.IOFactory','','.php');
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        $objPHPExcel->setActiveSheetIndex(0)->setTitle('商品分类信息');
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '数据表:'.$expTitle.'  导出时间:'.date('Y-m-d H:i:s').'   操作人:'.session('account'));//写入首行信息
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
    public function expCategory(){
        $xlsName  = "User";
        $xlsCell  = array(
            array('id','商品ID'),
            array('catename','分类名称'),
            array('pid','所属上级分类ID'),
            array('path','分类路径'),
            array('flag','分类状态'),
        );
        $xlsModel = M('category');
        $xlsData  = $xlsModel->Field('id,catename,pid,path,flag')->select();
        $this->exportExcel($xlsName,$xlsCell,$xlsData);

    }


}