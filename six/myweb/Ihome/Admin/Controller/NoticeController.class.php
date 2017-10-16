<?php
namespace Admin\Controller;
use Think\Controller;
class NoticeController extends Controller{
/*公告栏*/
    public function notice(){
        $this->login();
         $list=D('Notice')->where('fl=0')->order('id desc')->limit(10)->select();
         $this->assign('list',$list);
        $list=D('Notice')->where('fl=1')->order('id desc')->limit(10)->select();
        $this->assign('listto',$list);
        $tipCount=$this->tipList();
        $this->assign('count',$tipCount);
        $userList=$this->newUser();
        $this->assign('userList',$userList);
        $this->display();

    }
/*编辑栏*/
    public function noticeAdd(){

        $this->display('Notice/form');
    }


   public function title(){
         if(IS_GET){
           $title=  D('Notice')->where($_GET)->find();
         }
       $this->assign('title',$title);
       $this->display();
   }


    public function noticelist(){
        $User = D('Notice'); // 实例化User对象
        $count      = count($User->select());// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->order("createtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
       // $list=D('Notice')->limit(10)->select();
       // $this->assign('list',$list);
        $this->display();

    }

    public function add(){;
        if(IS_AJAX){
              $_POST['createtime']=time();
              $_POST['author']=$_SESSION['username'];
            if(D('Notice')->add($_POST)){
                echo "添加成功";
            }else{
                echo "添加失败";
            }
        }
        }

    public function login(){
        $id=$_SESSION['id'];
         $user= D('Admin')->where("id='$id'")->find();
         $logintime=$user['logintime'];
         $vip=$user['vip'];
        $loginip=$user['loginip'];
        $r = mysql_query("SELECT DATABASE()") or die(mysql_error());
        $ser= mysql_result($r,0);
 $info = array(
     'id'=>$id,    ///用户名
     'os'=>$_SERVER['SERVER_SOFTWARE'],
     'www'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
     'kj'=>round((disk_free_space(".")/(1024*1024)),2).'M',
     'vip'=>$vip,
     'logintime'=>$logintime,
     'loginip'=>$loginip,
     'ser'=>$ser
 );
$this->assign('info',$info);
    }



   public function path(){    ///网站目录
        $path= $_SERVER["SCRIPT_NAME"];
        $path= explode('/',$path);
        $count=(count($path))-2;
        $path=$path[$count];
        //$path='../'.$path.'/Ihome/Runtime/Cache';
        return $path;
    }
  public  function del($dir) {
        //先删除目录下的文件：
       $dh=@opendir($dir);
        while ($file=@readdir($dh)) {
            if($file!="." && $file!="..") {
                $fullpath=$dir."/".$file;
                if(!is_dir($fullpath)) {
                   @unlink($fullpath);
                } else {
                    @del($fullpath);
                }
            }
        }
        @closedir($dh);
        //删除当前文件夹：
        if(@rmdir($dir)) {
           return true;
        } else {
           return false;
        }
    }
  public  function delDirAndFile (){
        $path=$this->path();$path=array(
          '../'.$path.'/Ihome/Runtime/Cache/Admin',
          '../'.$path.'/Ihome/Runtime/Data',
          '../'.$path.'/Ihome/Runtime/Logs',
          '../'.$path.'/Ihome/Runtime/Temp',
          '../'.$path.'/Ihome/Runtime/Cache',
      );
          $ab=array();
          foreach   ($path as $v) {
              $ab[] = $this->del($v);
          }
          if($ab[0]==true &&$ab[1]==true && $ab[2]==true &&$ab[3]==true){
              echo  "成功清空模板缓存";
          }else{
              echo "模板缓存已经清空";
          }
    }



public function delnotice(){
    if(IS_AJAX){
       if( D('Notice')->delete($_POST['id'])){
           echo "true";
       }else{
           echo "false";
       }
    }
}
public function tip(){
    if(IS_AJAX){
       $title= D('Notice')->where($_POST)->find();
        echo $title['keyword'];
    }
}

    public function  tipList(){
               $tipList=array(
                   $admin_count=(count(D('Admin')->select())),
                   $user_count=(count(D('Member')->select())),
                  $text_count=(count(D('Notice')->select()))
               );

         return $tipList;
    }
   public function newUser(){
       $user=D('Member')->order('mid desc')->limit(10)->select();
       return $user;
   }


    public function checkPwd(){    ///删除密码判断
        if(IS_AJAX){
            $id=$_POST['id'];
            $pwd=md5($_POST['pwd']);
            $User = D("Admin"); // 实例化User对象
            // 查找status值为1name值为think的用户数据
            $data =$User->where("id='$id' AND pwd='$pwd'")->find();
            if($id=$data['id']){
                echo "true";
            }else{
                echo "false";
            }
        }
    }

    public function  beiFen(){
//备份
        if($_POST['sql']=='sql'){
            $x =D('Ql');
            $x->database='myweb';
            $rs=$x->beiFen('myweb.sql');
            if($rs>0){
                echo "备份成功，文件备份文件保存在根目录下的SQL文件夹";
            }else{
                echo "备份失败请重试";
            }
        }
    }
   public function backBeiFen(){
       if($_POST['sql']='sql'){
           $x =D('Ql');
           $x->database='myweb';
           $rs=$x->huanyuan('myweb.sql');
           if($rs>0){
               echo "还原成功";
           }else{
               echo "还原失败请重试";
           }
       }
   }


}