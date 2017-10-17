<?php
namespace Admin\Controller;
use Admin\Model\UserModel;
use Think\Controller;
use Think\Page;

class UserController extends Controller {
    public function _initialize(){
        if(!session('admin_uid')){
            $this->redirect('Adminlogin/login');
          /*  $this->error('请先登录!',U('Adminlogin/login'));*/
        }
    }
    public function index(){

    }
    //用户列表
    public function userList(){
        $obj=new UserModel();
        $data['username']=I('username');
        $user=$obj->getAllUser($data['username']);
        $count=count($user);
        $page=new Page($count,20);
        foreach($data as $k=>$v){
            $page->parameter[$k]=$v;
        }
        $show=$page->show();
        $userList=$obj->getAllUser($data['username'],$page->firstRow,$page->listRows);
        $this->assign('userList',$userList);
        $this->assign('page',$show);
        $this->display();
    }
    //渲染编辑会员模板
    public function editUser(){
        $id=I('id');
        $obj=new UserModel();
        $user=$obj->getUserById($id);
        $this->assign('user',$user);
        $this->display();
    }
    //保存编辑会员信息到数据库
    public function editSave(){
        $data['id']=I('id');
        $data['username']=I('username');
        $data['passwd']=I('passwd');
        $data['level']=I('level');
        $data['money']=I('money');
        $data['status']=I('status')?1:0;
        $obj=new UserModel();
        if($obj->editSave($data)){
            echo "保存成功";
        }else{
            echo "保存失败";
        }
    }
    //删除会员
    public function delUser(){
        $id=I('id');
        $obj=new UserModel();
        if($obj->delUser($id)){
            echo "删除成功";
        }else{
            echo "删除失败";
        }
    }



    //导出会员
    //导出到excel成员方法
    public function exportExcel($expTitle,$expCellName,$expTableData){
        ob_clean();
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = '用户信息'.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor('PHPExcel.PHPExcel','','.php');
        vendor('PHPExcel.PHPExcel.IOFactory','','.php');
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        $objPHPExcel->setActiveSheetIndex(0)->setTitle('用户信息');
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', '数据表:'.$expTitle.'  导出时间:'.date('Y-m-d H:i:s').'   操作人:'.session('admin_name'));//写入首行信息
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->getActiveSheet()->getColumnDimension($cellName[$i])->setWidth(15);//设置单元格宽度
            $objPHPExcel->getActiveSheet()->getStyle($cellName[$i].'2')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//设置单元格居中
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]); //写入表格抬头
        }
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(35);//设置单元格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);//设置单元格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);//设置单元格宽度
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
    public  function expUsers(){//导出Excel
        $xlsName  = "User";
        $xlsCell  = array(
            array('id','用户ID'),
            array('username','用户账号'),
            array('passwd','用户密码'),
            array('sex','用户性别'),
            array('birthday','用户生日'),
            array('address','用户地址'),
            array('tel','手机号码'),
            array('email','用户邮箱'),
            array('score','用户积分'),
            array('money','用户金额'),
            array('regtime','注册时间'),
            array('level','用户等级'),
            array('status','用户状态')
        );
        $xlsModel = M('user');

        $xlsData  = $xlsModel->Field('id,username,passwd,sex,birthday,address,tel,email,score,money,regtime,level,status')->select();
        foreach ($xlsData as $k => $v)
        {
            $xlsData[$k]['birthday']=date('Y-m-d',$v['birthday']);
            $xlsData[$k]['regtime']=date('Y-m-d',$v['regtime']);
            $xlsData[$k]['status']=$v['status']==1?'正常':'冻结';
        }
        $this->exportExcel($xlsName,$xlsCell,$xlsData);

    }
}