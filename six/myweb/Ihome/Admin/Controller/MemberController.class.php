<?php

namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller{
    /*后台管理系统会员列表*/
    public function memberList(){
        $member=M('Member');
        $count=$member->count();    //查询数据条数
        $page=new \Think\Page($count,4);    //实例化分页类 传入纵记录数与每页显示记录数
        $show=$page->show();    //分页显示输出

        $memberList=$member->limit($page->firstRow.','.$page->listRows)->select();
        $n=$page->firstRow;
        $this->assign('memberList',$memberList);
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->assign('firstRow',$n);
        $this->assign('num',($n+4)/4);
        $this->assign('listRows',$page->listRows);
        $this->display('Member/list');
    }

    //会员搜索功能
    public function search(){
        $username=$_GET['username'];
        $this->assign('username',$username);
        //连接数据库 根据条件查询
        $member=M('Member');    //M方法调用默认模版
        $condition=array('username'=>$username);
        $count=$member->where($condition)->count();   //统计记录数目
        $page=new \Think\Page($count,10);    //实例化分页类 传入总记录数 与每页显示记录数
        $show=$page->show();    //分页显示输出
        $memberList=$member->where($condition)->limit($page->firstRow.','.$page->listRows)->select();
        $n=$page->firstRow;
        //显示到页面上
        $this->assign('memberList',$memberList);
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->assign('firstRow',$n);
        $this->assign('num',($n+10)/10);  //显示的是当前页码
        $this->display('Member/list');
    }

//获取客户端ip地址
    function get_client_ip($type = 0) {
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip     =   trim($arr[0]);
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = ip2long($ip);
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }

        /*后台管理系统会员添加*/
        public function MemberAdd(){
            if(!empty($_POST)){
                $member=M('Member');
                $data['pwd']=md5(trim($_POST['pwd']));
                $data['username']=$_POST['username'];
                $data['mobile']=$_POST['mobile'];
                $data['email']=$_POST['email'];
                $data['createtime']=time();
                $data['lastlogintime']=time();
                $data['lastloginip']=get_client_ip();
                $res=$member->add($data);
               if($res){
                    $this->success("添加成功");
                }else{
                    $this->error("添加失败");
                }
            }
            $this->display('Member/add');
        }


    //判断用户名是否已被注册
    public function check_user(){
        $data['username']=$_POST['username'];
        $member=M('Member');
        $d=$member->where($data)->find();
        if($d){
            echo "false";
        }else{
            echo "true";
        }
    }
//检测手机号码是否已被使用
    public function checkMobile(){
        $data['mobile']=$_POST['mobile'];
        $member=M("Member");
        $res=$member->where($data)->find();
        if($res){
            echo "false";
        }else{
            echo "true";
        }
    }
    //后台会员删除
    public function delete($mid){
        $member=M('Member');
        $res=$member->delete($mid);
        if($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    //后台会员详情
    public function memDetail($mid){
        //echo $mid;
        $member=M('Member');
        $list=$member->select($mid);
        //var_dump($data);
        $this->assign('list',$list);
        $this->display('Member/detail');
    }
}