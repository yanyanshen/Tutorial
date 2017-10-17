<?php
namespace Admin\Controller;
use Think\Controller;
class PingjiaController extends Controller
{

    public function pingjiaList()
    {
        $pj = M('Pingjia');
        $orderg = M('Ordergoods');
        $count = $pj->count();
        $perpage=8;
//        $page = new \Think\Page($count, 6);
        $page=new \Org\Yh\AjaxPage($count,$perpage,"pingjiaList");
//        $page->setConfig('header', '<span class="rows">&nbsp;&nbsp;&nbsp;共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
//        $page->setConfig('prev', '上页');
//        $page->setConfig('next', '下页');
//        $page->setConfig('first', '首页');
//        $page->setConfig('end', '尾页');
//        $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show = $page->show();
        $list=$pj->join('sk_users on sk_users.id=sk_pingjia.uid')->join('sk_goods on sk_goods.id=sk_pingjia.gid')->field('sk_pingjia.id,sk_pingjia.return,sk_pingjia.goodsname,sk_pingjia.oid,sk_pingjia.pjtime,sk_pingjia.level,sk_users.username,sk_goods.image')->order('pjtime')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('show', $show);
        $this->assign('list', $list);
//        print_r($list);
//        $this->display();
        if(IS_AJAX){
            $this->display('pjList');
        }else{
            $this->display();
        }
    }


    public function pingjiaReturn($id)
    {
        $pj = D('Pingjia');
        if (!empty($_POST)){
            $data1=$_POST;
            unset($data1["id"]);
            $datanew = $pj->where("id=".I('post.id'))->save($data1);
            if ($datanew) {
                $this->redirect('pingjiaList', array(), 3, '回复成功');
            } else {
                $this->redirect('pingjiaReturn', array(), 3, '回复失败');
            }
        } else {
            $list=$pj->join('sk_users on sk_users.id=sk_pingjia.uid')->join('sk_goods on sk_goods.id=sk_pingjia.gid')->field('sk_pingjia.pingjia,sk_pingjia.id,sk_pingjia.goodsname,sk_pingjia.oid,sk_pingjia.pjtime,sk_pingjia.level,sk_users.username,sk_goods.image')->where('sk_pingjia.id='.$id)->find();
            $this->assign('data', $list);
           $this->display();
        }


    }
    public function pingjiaDetail($id){
        $pj=M('Pingjia');
        $data=$pj->join('sk_users on sk_users.id=sk_pingjia.uid')->join('sk_goods on sk_goods.id=sk_pingjia.gid')->field('sk_pingjia.return,sk_pingjia.pingjia,sk_pingjia.goodsname,sk_pingjia.oid,sk_pingjia.pjtime,sk_pingjia.level,sk_users.username,sk_goods.image')->where('sk_pingjia.id='.$id)->find();
        $arr=$_SESSION;
        $aname=$arr["admin"]["username"];
        $aid=$arr["admin"]["id"];
        $this->assign('aid',$aid);
        $this->assign('aname',$aname);
        $this->assign('data',$data);
        $this->display();
    }
    public function pingjiadel($id){
        $pj=M('Pingjia');
        $res=$pj->where('sk_pingjia.id='.$id)->delete();
        if($res){
            $this->redirect('pingjiaList', array(), 1, '已成功删除');
        }else{
            $this->redirect('pingjiaList', array(), 1, '删除失败');
        }
    }

}





















