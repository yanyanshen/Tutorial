<?php
namespace Admin\Controller;
use Admin\Model\OrderModel;
use Home\Model\OrdergoodsModel;
use Think\Controller;
use Think\Page;

class OrderController extends Controller{
    public function _initialize(){
        if(!session('admin_uid')){
            $this->redirect('Adminlogin/login');
           /* $this->error('请先登录!',U('Adminlogin/login'));*/
        }
    }
    public function index(){

    }
    public function orderList(){
        $obj=new OrderModel();
        $data['orderstatus']=I('status')?I('status'):0;
        $order=$obj->getAllOrder($data);
        $count=count($order);
        $page=new Page($count,10);
        $show=$page->show();
        $orderList=$obj->getAllOrder($data,$page->firstRow,$page->listRows);
        $ordergoods=new OrdergoodsModel();
        foreach($orderList as $k=>$v){
            $orderList[$k]['goods']=$ordergoods->getGoodsByOrderId($v['id']);
        }
        $this->assign('orderList',$orderList);
        $this->assign('page',$show);
        $this->display();
    }

    //渲染发货模板
    public function sendOrder(){
        $orderid=I('orderid');
        $this->assign('orderid',$orderid);
        $this->display();
    }
    //发货
    public function saveLogistics(){
        $data['id']=I('orderid');
        $data['logisticsname']=I('logisticsname');
        $data['logisticsinfo']=I('logisticsinfo');
        $obj=new OrderModel();
        if($obj->saveLogistics($data)){
            echo "发货成功";
        }else{
            echo "发货失败";
        }
    }
    //删除订单
    public function delOrder(){
        $id=I('orderid');
        $obj=new OrderModel();
        if($obj->delOrder($id)){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }


    //导出到Excel相关操作
    public function exportExcel($expTitle,$expCellName,$expTableData){
        ob_clean();
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = '订单信息'.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor('PHPExcel.PHPExcel','','.php');
        vendor('PHPExcel.PHPExcel.IOFactory','','.php');
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        $objPHPExcel->setActiveSheetIndex(0)->setTitle('订单信息');
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '数据表:'.$expTitle.'  导出时间:'.date('Y-m-d H:i:s').'   操作人:'.session('admin_name'));//写入首行信息
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->getActiveSheet()->getColumnDimension($cellName[$i])->setWidth(15);//设置单元格宽度
            $objPHPExcel->getActiveSheet()->getStyle($cellName[$i].'2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//设置单元格居中
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]); //写入表格抬头
        }
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);//设置单元格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(35);//设置单元格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(70);//设置单元格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(45);//设置单元格宽度
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
    public  function expOrders(){//导出Excel
        $xlsName  = "Order";
        $xlsCell  = array(
            array('id','订单ID'),
            array('ordersyn','订单号'),
            array('createtime','创建时间'),
            array('orderstatus','订单状态'),
            array('prices','订单总价'),
            array('address','发货地址'),
            array('logisticsname','物流公司'),
            array('logisticsinfo','物流编号')
        );
        $xlsModel = M('order');
        $map['createtime']=array('between',array(strtotime(date('Y-m-d')),strtotime(date('Y-m-d'))+3600*24));
        $xlsData  = $xlsModel->where($map)->field('id,ordersyn,createtime,orderstatus,prices,address,logisticsname,logisticsinfo')->select();
        foreach ($xlsData as $k => $v)
        {
            $xlsData[$k]['createtime']=date('Y-m-d H:i:s',$v['createtime']);
            switch($v['orderstatus']){
                case 1:
                    $xlsData[$k]['orderstatus']='未付款';
                    break;
                case 2:
                    $xlsData[$k]['orderstatus']='等待发货';
                    break;
                case 3:
                    $xlsData[$k]['orderstatus']='已发货';
                    break;
                case 4:
                    $xlsData[$k]['orderstatus']='待评价';
                    break;
                case 5:
                    $xlsData[$k]['orderstatus']='已评价';
                    break;
            }
        }
        $this->exportExcel($xlsName,$xlsCell,$xlsData);

    }
}