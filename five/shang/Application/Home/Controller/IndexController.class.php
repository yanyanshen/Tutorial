<?php
namespace Home\Controller;
use Think\Controller;
header("content_type:text/html;charset=utf-8");
class IndexController extends Controller {
    public function index(){
        // 初始化缓存
        $cache = S(array('type'=>'file','prefix'=>'shang_','expire'=>600));
        if(!$cache->brandlist){
            //遍历品牌
            $brand=M('brand');
            $brandlist=$brand->limit(10)->select();
            $brandlist2=$brand->limit(5,4)->select();//三楼
            //遍历分类
            $category=M('Category');
            $catelist=$category->where("pid=0")->select();
            foreach($catelist as $k1=>$v1) {
                $catelist[$k1]['second'] = $category->where(array('pid' => $v1['cid']))->select();
                foreach($catelist[$k1]['second'] as $k2=>$v2){
                    $catelist[$k1]['second'][$k2]['third']= $category->where(array('pid' => $v2['cid']))->select();
                }
            }

            //1f楼层
            $goods=M('goods');
            $goodsList=$goods->order('saled_num desc')->limit(10)->select();



            //2f楼层
            //2f-left
            $brandList2f=$brand->limit(8)->select();
            $this->assign('brandList2f',$brandList2f);
            //2f-right
            $ftwo['description']=array('like',"%".闪购."%");
            $frList=$goods->where($ftwo)->limit(6)->select();


            //遍历轮播5楼品牌馆
            $ad=M('Ads');
            $adlist=$ad->where('pid=1 and top=1')->select();//主
            $adlist1=$ad->where('pid=15')->limit(0,3)->select();
            $adlist2=$ad->where('pid=15')->limit(3,3)->select();
            $adlist3=$ad->where('pid=15')->limit(6,3)->select();
            $adlist4=$ad->where('pid=15')->limit(9,3)->select();

            $adlist11=$ad->where('pid=13')->limit(0,3)->select();//三楼上
            $adlist12=$ad->where('pid=13')->limit(3,4)->select();//三楼下
            $goodsList1=$goods->limit(9,4)->select();//三楼
            $goodsList2=$goods->limit(15,4)->select();//三楼
            $goodsList3=$goods->limit(1,8)->select();//四楼



            $cache->brandlist =$brandlist; // 设置缓存
            $cache->brandlist2 =$brandlist2; // 设置缓存
            $cache->catelist =$catelist; // 设置缓存
            $cache->goodsList =$goodsList; // 设置缓存
            $cache->brandList2f =$brandList2f; // 设置缓存
            $cache->frList =$frList; // 设置缓存
            $cache->adlist =$adlist; // 设置缓存
            $cache->adlist1 =$adlist1; // 设置缓存
            $cache->adlist2 =$adlist2; // 设置缓存
            $cache->adlist3 =$adlist3; // 设置缓存
            $cache->adlist4 =$adlist4; // 设置缓存
            $cache->adlist11 =$adlist11; // 设置缓存
            $cache->adlist12 =$adlist12; // 设置缓存
            $cache->goodsList1 =$goodsList1; // 设置缓存
            $cache->goodsList2 =$goodsList2; // 设置缓存
            $cache->goodsList3 =$goodsList3; // 设置缓存

        }else{
            $brandlist=$cache->brandlist;  // 获取缓存
            $brandlist2 =$cache->brandlist2;
            $catelist=$cache->catelist ;
            $goodsList=$cache->goodsList;
            $brandList2f=$cache->brandList2f;
            $frList= $cache->frList ;
            $adlist=$cache->adlist;
            $adlist1=$cache->adlist1;
            $adlist2=$cache->adlist2;
            $adlist3=$cache->adlist3;
            $adlist4=$cache->adlist4;

            $adlist11=$cache->adlist11 ;
            $adlist12=$cache->adlist12;
            $goodsList1=$cache->goodsList1;
            $goodsList2=$cache->goodsList2;
            $goodsList3=$cache->goodsList3;

        }
        $this->assign('goodsList',$goodsList);//一楼
        $this->assign('brandList2f',$brandList2f);//二楼
        $this->assign('frList',$frList);//二楼
        $this->assign('brand',$brandlist);
        $this->assign('brand2',$brandlist2);//三楼
        $this->assign('catelist',$catelist);
        $this->assign('adlist1',$adlist1);
        $this->assign('adlist2',$adlist2);
        $this->assign('adlist3',$adlist3);
        $this->assign('adlist4',$adlist4);
        $this->assign('adlist',$adlist);
        $this->assign('adlist11',$adlist11);//三楼
        $this->assign('adlist12',$adlist12);//三楼




        $this->assign('goodsList1',$goodsList1);//三楼
        $this->assign('goodsList2',$goodsList2);//三楼
        $this->assign('goodsList3',$goodsList3);//四楼

        $this->assign('catelist',$catelist);//五楼
        $this->assign('adlist',$adlist);//五楼

        $this->display();
    }

    public function search(){
        $search['description|price|goodsname']=array('like',"%".I('get.name')."%");
        $name=trim(I('get.name'));
        if(!$name){
            $count=0;
            $this->assign('count',$count);
            $this->display();

        }else{
            $goods=M('Goods');
            $count=$goodslist=$goods->where($search)->count();
            $page=new \Think\Page($count,8);

            // $limitRows = 8; // 设置每页记录数  无刷新页面
            // $page= new \Org\Util\AjaxPage($count, $limitRows,"search"); //第三个参数是你需要调用换页的ajax函数名

            $show=$page->show();
            $by=I('get.by');
            $goodslist=$goods->where($search)->order($by)->limit($page->firstRow.','.$page->listRows)->select();
            $this->assign('goodslist',$goodslist);
            $this->assign('count',$count);
            $this->assign('name',$name);
            $this->assign('page',$show);
            $this->display('search');
        }


    }
    public function detail(){
        $condition['gid']=I('get.gid');
        $goods=M('Goods as g');
        //查找商品和品牌
        $goodsList=$goods->join('shang_brand as b on g.bid=b.bid')->where($condition)->find();
        $pic=M('pic');
        $pics=$pic->where($condition)->select();
        foreach($pics as $v){
            $goodsList['pics'][]=$v['picname'];
        }
        //查找评论
        $gid=I('get.gid');
        $comment=M('Comment as c');
        $comList=$comment->join('shang_user as u on c.uid=u.id')->where(array('gid'=>$gid))->select();

        $this->assign('empty','<span class="empty">该商品尚未评价过</span>');
        $this->assign('comList',$comList);
        $this->assign('goodsList',$goodsList);
        //浏览记录
        $gid=I('get.gid');
        $_SESSION['m']['m'.$gid]=$gid;
        $this->display();
    }
    //浏览记录展示
    public function myfoot(){
        //$id=session('id');
        $data=$_SESSION['m'];
        foreach($data as $v){
            $goods=M('Goods');
            $goodslist[]=$goods->where("gid=$v")->select();
        }
        $goodslist1=array_reverse(array_splice($goodslist,-8));
        $count=count($goodslist1);
        $this->assign('goodslist',$goodslist1);
        $this->assign('count',$count);
        $this->display();
    }
//删除浏览记录
    public function del(){
        //$id=session('id');
        $gid=I('get.gid');
        if(!$gid){
            //删除全部
            unset($_SESSION['m']) ;
            if($_SESSION['m']);
            $res=true;
        }else{
            //删除一条
            unset($_SESSION['m']['m'.$gid]) ;
            if($_SESSION['m']['m'.$gid]==null){
                $res=true;
            }
        }
        if($res){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }
    }
}

/*
class EmptyController extends Controller{
    public function index(){
    redirect(U('Index/empty','3','控制器'.CONTROLLER_NAME.'不存在'));
}
}*/