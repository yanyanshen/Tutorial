<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends CommonController {

    public function search()
    {
        $mid=session('mid');
        $b=count($_SESSION['m'.$mid]);
        $this->assign('num',$b);

        $content=I('get.keywords');


        $goods=M('goods');
        $data['goodsname']=array('like',"%{$content}%");
        //$data['bid']=I('get.bid');
       // $data['cid']=I('get.cid');



        $count=$goods->where($data)->count();
        $limitRows = 4; // 设置每页记录数

        $p = new \Org\Util\AjaxPage($count, $limitRows,"search"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p->firstRow . "," . $p->listRows;


        $slist=$goods->where($data)->order('id desc')->limit($limit_value)->select();
        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成

       // dump($slist);
        $this->assign('count',$count);
        $this->assign('slist',$slist);
        $this->assign('catename',$content);
        $this->assign('page',$page);


        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->assign('keywords',$content);
            $this->display();
        }


}
//二级分类搜索
    public function search2()
    {

        $content=I('get.cid');
        $content2=I('get.catename');
        $goods=M('goods');
        $data['cid']=$content;
        //$data['bid']=I('get.bid');
        // $data['cid']=I('get.cid');



        $count=$goods->where($data)->count();
        $limitRows = 2; // 设置每页记录数

        $p = new \Org\Util\AjaxPage($count, $limitRows,"search2"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p->firstRow . "," . $p->listRows;


        $slist2=$goods->where($data)->order('id desc')->limit($limit_value)->select();
        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成

        // dump($slist);
        $this->assign('count',$count);
        $this->assign('slist',$slist2);
        $this->assign('catename',$content2);
        $this->assign('page',$page);
        if(IS_AJAX){
            $this->display('result');
        }else{
            //$this->assign('keywords',$content3);
            $this->display('search');
        }
    }

//按价格搜索
    public function search3()
    {

        if(I('get.gt')){
            $lt=I('get.lt');$gt=I('get.gt');
            $map['price'] = array('between',"$lt,$gt");
            $content3="价格".$lt."元到".$gt."元";
        }else{
            $lt=I('get.lt');
            $map['price'] = array('egt',"$lt");
            $content3="价格在".$lt."元以上";
        }
        $goods=M('goods');
        $count=$goods->where($map)->count();
        $limitRows = 2; // 设置每页记录数

        $p = new \Org\Util\AjaxPage($count, $limitRows,"search3"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p->firstRow . "," . $p->listRows;


        $slist3=$goods->where($map)->order('id desc')->limit($limit_value)->select();
        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成

        // dump($slist);
        $this->assign('count',$count);
        $this->assign('slist',$slist3);

        $this->assign('lt',$lt);$this->assign('gt',$gt);
        $this->assign('catename',$content3);
        $this->assign('page',$page);

        if(IS_AJAX){
            $this->display('result');
        }else{
            //$this->assign('keywords',$content3);
            $this->display('search');
        }


    }



    public function search4()
    {

        $content=I('get.bid');
        $content2=I('get.catename');
        $goods=M('goods');
        $data['bid']=$content;
        //$data['bid']=I('get.bid');
        // $data['cid']=I('get.cid');



        $count=$goods->where($data)->count();
        $limitRows = 2; // 设置每页记录数

        $p = new \Org\Util\AjaxPage($count, $limitRows,"search4"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p->firstRow . "," . $p->listRows;


        $slist4=$goods->where($data)->order('id desc')->limit($limit_value)->select();
        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成

        // dump($slist);
        $this->assign('count',$count);
        $this->assign('slist',$slist4);
        $this->assign('catename',$content2);
        $this->assign('content',$content);
        $this->assign('page',$page);

        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->assign('keywords',$content2);
            $this->display('search');
        }


    }








}