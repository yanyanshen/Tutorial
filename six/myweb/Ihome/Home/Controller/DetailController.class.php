<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller{
/*商城详情页控制器*/
    public function detail(){
        $data['gid']=trim($_GET['gid']);
        $detailModel=new \Home\Model\DetailModel();
        $goodsinfo=$detailModel->GoodsInfo($data);
        $goodspic=$detailModel->Goodspic($data);
        $goodscomment=$detailModel->comment($data);
        $guess=$detailModel->guess();
        $this->create();
        $this->history();
        $this->assign('goodspic',$goodspic);
        $this->assign('goodsinfo',$goodsinfo);
        $this->assign('goodscomment',$goodscomment);
        $this->assign('guesslist',$guess);
        $this->display('Detail/DetailPages');
    }
    public function create(){     ////登陆与非登录的浏览记录
        $gid=$_GET['gid'];
        $member=$_SESSION['mid'];
        if($member>0){   ////登陆
            $focus=D('Member_focus')->where("uid='$member'")->find();
            $count= count(D('Member_focus')->where("uid='$member'")->select());
            if($count==1){
                if($focus['history']==null){
                    D('Member_focus')->where("uid='$member'")->save(array("history"=>"$gid"));
                }else{
                    $history= array_count_values(explode(',',$focus['history']));
                    if($history["$gid"]<1){
                        $newgid=$focus['history'].",$gid";
                        D('Member_focus')->where("uid='$member'")->save(array("history"=>"$newgid"));
                    }
                }
            }else{
                $data['uid'] = "$member";
                $data['history'] = "$gid";
                D('Member_focus')->add($data);
            }
        }else{   ////非登录
            if(empty($_SESSION['history'])){
                session('history',$gid);
            }else{
                $cont= array_count_values(explode(',',$_SESSION['history']));
                if($cont["$gid"]<1){
                    $_SESSION['history']=$_SESSION['history']. ','."$gid";
                }

            }
        }


    }

    public function checkFocus(){
        $gid=$_GET['gid'];
        $uid=$_SESSION['mid'];
        if(!empty($_SESSION['mid']) && !empty($_SESSION['mid'])){
            $focus=D('Member_focus')->where("uid='$uid'")->find();
            $count= count(D('Member_focus')->where("uid='$uid'")->select());
            if($count==1){   ///已检测到数组
                $history= array_count_values(explode(',',$focus['focus']));
//                var_dump($history);
                if($history["$gid"]==1){
                    echo "true";

                }else{
                    return "false";
//                        echo "没有关注";
                }

            }

        }

    }

    public function quite(){   ///取消关注
        if(!empty($_SESSION['mid']) && !empty($_SESSION['mid'])){
            $gid=$_GET['gid'];
            $uid=$_SESSION['mid'];
            $focus=D('Member_focus')->where("uid='$uid'")->find();
//        var_dump($focus['focus']);
            $arr=explode(',',$focus['focus']);
            $new=array();
            foreach ($arr as $v){
                if($v!=$gid){
                    $new[]=$v;
                }
            }
            if(D('Member_focus')->where("uid='$uid'")->save(array("focus"=>implode(',',$new)))>0){
                echo "true";
            }
        }



    }


    public function quicklogin(){


        $this->display();

    }

    public function history(){    ///关注，浏览记录
        $member=$_SESSION['mid'];
        if(!empty($_SESSION['mid'])){
            $res=  D('Member_focus')->where("uid='$member'")->find();
        }
        empty($_SESSION['membername'])?$history=array_reverse(explode(',',$_SESSION['history'])):$history=array_reverse(explode(',',$res['history']));  ////浏览记录

        $historyarr=array();
        $i=O;
        foreach ($history as $v){
            $i++;
            $historyarr[$i]= D('Goods')->where("gid='$v'")->find();

        }
        $this->assign('history',$historyarr);
//        $this->display('Member/userinfo');
//        $this->display('Member/member');
    }
}