<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\CategoryModel;

class   CategoryController extends Controller{
    //渲染添加商品模板
    public function add(){


        $this->display('add');
    }
    //从顶级分类找子分类方法
    public function childCate(){
        $cate=new CategoryModel();
        $childCate=$cate->childCate(I("post.pid"));
        echo $childCate;
    }
    //
    //添加分类方法
    public function addCate(){
        if(I("post.f_goods_name")){
            $cate=new CategoryModel();
            $add=$cate->addCate(I("post."));
            if($add){
                echo $this->success("添加成功");
            }else{
                echo $this->error("添加失败");
            }

        }else{
            echo $this->error("添加失败");
        }
    }





    //这个是分类列表方法
    public function cateList()
    {
        $cate = D('category');
//        $lists=$cate->select();
//        $pathname="";
//        foreach($lists as $k=>$v){
//            $where["id"]=array('in',$v["path"]);
//            $pathall=$cate->field("catename")->where($where)->order("path")->select();
//            foreach($pathall as $k1=>$v1){
//                $pathname.=implode(",",$v1).">";
//            }
//            $pathname=mb_substr($pathname,0,-1);
//
//            $lists[$k]["pathname"]=$pathname;
//            $pathname="";
//        }
        //dump($lists);
//
//       $this->assign('lists',$lists);
////        $this->assign('list2',$list2);
//        $this->assign('pathname',$pathname);
        $where1=I("get.where");
        $where2="";
        $where3="";
        if($where1){
            $where2="catename like '%".$where1."%' ";
            $where3="where catename like '%".$where1."%' ";
        }
        //分页效果
        //1 查询总记录条数
        $total=$cate->where($where2)->count();
        //print_r($total);
//        echo $total;
        $per=5;

        // 2 实例化分页对象
        $page_obj=new \Org\Util\AjaxPage($total,$per,"cateList");
        // 3 获取每页分类信息

        $sql="select * from sk_category ".$where3." order by id desc "." limit $page_obj->firstRow ". ',' ." $page_obj->listRows";
        $info=$cate->query($sql);
        $pathname="";
        foreach($info as $k=>$v){
            $where["id"]=array('in',$v["path"]);
            $pathall=$cate->field("catename")->where($where)->order("path")->limit(0,$per)->select();
            foreach($pathall as $k1=>$v1){
                $pathname.=implode(",",$v1)." -> ";
            }
            $pathname=mb_substr($pathname,0,-3);

            $info[$k]["pathname"]=$pathname;
            $pathname="";
        }
        // 4 获得页码列表
        $pagelist=$page_obj->show();
        $this->assign('pagelist',$pagelist);
        $this->assign('info',$info);
        $this->assign("where",$where1);
        $this->assign("empty","<tr><td class='empty'colspan='7' style='color:red;text-align: center;font-size: 30px'>没有符合条件的分类</td></tr>");
        if(IS_AJAX){
            $this->display('clist');
        }else{
            $this->display('cateList');
        }


        //分页方法二
//        $count=$cate->where(I('get.id'))->count();//查询满足条件的总记录数
//        $page=new \Think\Page($count,5);//实例化分页，传入总记录数和煤业显示的记录数；
//        $pages=$page->show();//分页显示输出
//        //print_r($show);
//        //进行分页数据查询，注意limit方法中的参数要使用Page类的属性
//        $list=$cate->limit($page->firstRow.','.$page->listRows)->select();
//
//        $this->assign('firstRow',$page->firstRow);
//        $this->assign('list',$list);
//        $this->assign('pages',$pages);
//
//
//        $this->display('cateList');
    }


    public function xiajia(){
//        echo I('get.id');
        $cate=M('category');
        $data['id']=I('get.id');
        $data['flag']=0;
        $cate->save($data);
        $this->cateList('cateList');
    }
    public function zhanshi(){
        $cate=M('category');
        $data['id']=I('get.id');
        $data['flag']=1;
        $cate->save($data);
        $this->cateList('cateList');
    }

    public function replace(){
        $cate=M('category');
        $id=I('get.id');
        $flag=$cate->query("select flag from sk_category where id={$id}");
//        print_r($flag);
        foreach($flag as $k=>$v){
//            print_r($v['flag']);
            if($v['flag']==0){
                $data['id']=I('get.id');
                $data['flag']=1;
                $cate->save($data);
            }else{
                $data['id']=I('get.id');
                $data['flag']=0;
                $cate->save($data);
            }
        }

        $this->cateList('cateList');
    }
    public function del(){
        $cate=D('category');
        $id=I('get.id');
//        $data['flag']=1;
        $str=$cate->allchild($id);
        $str.=$id;
        $cate->delete($str);

        $this->cateList('cateList');
    }

//public function fenye(){
//    $cate=M('Category');
//    $count=$cate->where(I('get.id'))->count();//查询满足条件的总记录数
//    $page=new \Think\Page($count,5);//实例化分页，传入总记录数和煤业显示的记录数；
//    $show=$page->show();//分页显示输出
//    //print_r($show);
//    //进行分页数据查询，注意limit方法中的参数要使用Page类的属性
//   $list=$cate->limit($page->firstRow.','.$page->listRows)->select();
//    $this->assign('list',$list);
//    $this->assign('page',$show);
//    $this->display('cateList');
//}






//修改分类
    public function update(){
        $id = I("id");
        $cate = M("category");
        $info = $cate->find($id);
        $path = explode(",", $info["path"]);
        $this->assign('info', $info);
        $this->assign('path', $path);
        $this->display();

    }

    public function updatecate(){
        if(I("post.f_goods_name")) {
            $cate = new CategoryModel();
            $add = $cate->updateCate(I("post."));
            if ($add) {
                echo $this->success("添加成功");
            } else {
                echo $this->error("添加失败");
            }
        }else{
            echo $this->error("添加失败");
        }
    }

    public function aa(){
        $cate=D("category");
        echo $cate->allchild(1);
    }














}