<?php

namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller{
    public $checkList;


    public function cart($e){
        $c=$_SESSION['fl_home']['mid'];
        $pid=$e["id"];
        $num=$e['num'];
        $cu=D("prod");

        if($c){
            if($_SESSION["cart_$c"]["$pid"]){

                if($_SESSION["cart_$c"]["$pid"][0]["num"]<200){

                    $_SESSION["cart_$c"]["$pid"][0]["num"]=$_SESSION["cart_$c"]["$pid"][0]["num"]+$num;
                    return "添加成功";
                }else{
                    return "添加失败";
                }

            }else{
                $pa=$cu->where("prod_id=$pid")->select();
                $pa[0]['num']=$num;
                $_SESSION["cart_$c"]["$pid"]=$pa;
                return "添加成功";
            }
        }else{
            if($_SESSION["cart"]["$pid"]){
                if($_SESSION["cart"]["$pid"][0]["num"]<200){
                    $_SESSION["cart"]["$pid"][0]["num"]=$_SESSION["cart"]["$pid"][0]["num"]+$num;
                    return "添加成功";
                }else{
                    return "添加失败";
                }

            }else{
                $pa=$cu->where("prod_id=$pid")->select();
                $pa[0]['num']=$num;
                $_SESSION["cart"]["$pid"]=$pa;
                return "添加成功";
            }
            return"添加成功";

        }


    }


    public function index(){
        $deprods=self::defaultProd();
        $debrand=self::defaultBrand();
             $inputprods=$_GET['prods'];
        $smallclass=self::smallClass($_GET['class_cid']);
        $declass=self::defaultClass();
        $brand=self::getForm2($_GET['prods']);
        $tuijianprod=self::tuijianProd();
        $this->assign("inputprods",$inputprods);
        $this->assign("classcid",$_GET['class_cid']);
        $this->assign("class2cid",$_GET['class2_cid']);
        $this->assign("brandbid",$_GET['brand_bid']);
        $this->assign("tuijianProd",$tuijianprod);
        $this->assign("Pages",$deprods['page']);
        $this->assign("zongheProd",$deprods['prod']);
        $this->assign("smallClass",$smallclass);
        $this->assign("brandPic",$debrand);
        $this->assign("bigClass",$declass);
        $this->assign("brands",$debrand);
        // $dd=trim($_GET['prods']);
        $dd=str_replace('_','/',trim($_GET['prods']));//0730新增

            $hobbyname = $_GET['hobby'];

            for ($ii = 0; $ii < count($hobbyname); $ii++) {
                $hobbyname1 .= $hobbyname[$ii] . ",";
            }
            $this->assign("hobbyname", $hobbyname1);

        if($_GET['hobbyname']) {
           $hobbyname2= $_GET['hobbyname'];
            $this->assign("hobbyname",$hobbyname2);
        }



        $this->assign("dd",$dd);


        if(!empty($dd)) {
            $prods = self::getForm1($_GET['prods']);
            $this->assign("zongheProd", $prods['prod']);
            $this->assign("Pages",$prods['page']);
            $brand=self::getForm2($_GET['prods']);
            $this->assign("brandPic",$brand);
            $class=self::getForm3($_GET['prods']);
            $this->assign("smallClass",$class);
            if(empty($brand)){
                $brands=self::defaultBrand();
                $this->assign("brandPic",$brands);

            }

            if (($prods['prod'])=="您要搜索的商品不存在") {

                $this->assign("tishi", "您搜索的商品不存在");
            }
        }
        if(!empty($_GET['hobby'])){
        $hobbyprods=self::getHobby($_GET['hobby']);

            $this->assign("zongheProd",$hobbyprods['prod']);
            $this->assign("Pages",$prods['page']);
            if (empty($hobbyprods['prod'])) {
                $this->assign("tishi", "您搜索的商品不存在");
            }
        }
        if($_GET['pinpai']==1){
        if(!empty($_GET['prods'])){
        $prods=self::getBrand($_GET);
            $this->assign("zongheProd",$prods['prod']);
            $this->assign("Pages",$prods['page']);
            $brand=self::getForm2($_GET['prods']);
            $this->assign("brandPic",$brand);
            $class=self::getForm3($_GET['prods']);
            $this->assign("smallClass",$class);
        }
            else {
                $brandprods = self::getBrand($_GET['brand_bid']);
                $this->assign("zongheProd", $brandprods['prod']);
                $this->assign("Pages", $brandprods['page']);
                if (empty($brandprods['prod'])) {
                    $this->assign("tishi", "您搜索的商品不存在");

                }
            }
        }

        if($_GET['bigclass']==1){
           $bigclassname= $_GET['class_cid'];
            $this->assign("bcn",$bigclassname);
            $bigprod=self::bigClass($_GET);
            $this->assign("zongheProd",$bigprod['prod']);
            $this->assign("Pages",$bigprod['page']);
            if(empty($bigprod['prod'])){
                $this->assign("tishi","您搜索的商品不存在");

        }

        }


        if($_GET['smallclass']==1){

        $prods=self::getForm4($_GET);
            $this->assign("zongheProd",$prods['prod']);
            $this->assign("Pages",$prods['page']);
            if(!is_array($prods['prod'])){

                $this->assign("tishi",$prods['prod']);

            }

            $this->assign("smallClass",$prods['smallclass']);
        }


        if($_GET['bigclass']==1 && !empty($_GET['prods'])){
            $smallclass1=self::keepClass($_GET);
            $this->assign("smallClass",$smallclass1);
            $bigclassname= $_GET['class_cid'];
            $this->assign("bcn",$bigclassname);
            $bigprod=self::bigClass($_GET);
            $this->assign("zongheProd",$bigprod['prod']);
            $this->assign("Pages",$bigprod['page']);
        }
        if($_GET['zonghe']==1){
            $zongheprod=self::getZonghe($_GET);
            $this->assign("zongheProd",$zongheprod['prod']);
            $this->assign("Pages",$zongheprod['page']);
            if(empty($zongheprod['prod']))
            {
                $this->assign("tishi","您搜索的结果不存在");
            }

        }
        if($_GET['xiaoliang']==1){
            $zongheprod=self::getSale($_GET);
            $this->assign("zongheProd",$zongheprod['prod']);
            $this->assign("Pages",$zongheprod['page']);
            if(empty($zongheprod['prod']))
            {
                $this->assign("tishi","您搜索的结果不存在");
            }
        }
        if($_GET['xinpin']==1){
            $xinpinprod=self::getNewprod($_GET);
            $this->assign("zongheProd",$xinpinprod['prod']);
            $this->assign("Pages",$xinpinprod['page']);
            if(empty($xinpin['prod']))
            {
                $this->assign("tishi","您搜索的结果不存在");
            }
        }
        if($_GET['form2']==1){
            $inputprods=self::getInput($_GET);
            $this->assign("zongheProd",$inputprods['prod']);
            $this->assign("Pages",$inputprods['page']);
            if(empty($inputprods['prod'])){
                $this->assign("tishi","您搜索的结果不存在");
            }
        }




    //buycar

        //购物车
        $cid=$_SESSION["fl_home"]['mid'];
        if($cid){
            $z=array_reverse($_SESSION["cart_$cid"]);
            $this->assign('cart',$z);
            $this->assign('count',count($_SESSION["cart_$cid"]));
        }else{
            $z=array_reverse($_SESSION["cart"]);
            $this->assign('cart',$z);
            $this->assign('count',count($_SESSION["cart"]));
        }

        //足迹
        cookie("[ $prod_id]", $prod_id);
        $prod=M("Prod");
        $s='';
        foreach($_COOKIE["fl_home"] as $v){
            $s=$s.$v.',';
        }
        $wh['prod_id']=array("in","$s");
        $d= $prod->where($wh)->select();
        $d=array_reverse($d);
        $ss=count($d);
        $this->assign('zj',$d);
        $this->assign('zjss',$ss);




        if(IS_AJAX){

            if(!$_POST['item']){
//                $this->ajaxReturn(array('data'=>$_POST));

                $data = $this->cart($_POST);

            }

            $cid=$_SESSION["fl_home"]['mid'];
            if($cid){
                $z=array_reverse($_SESSION["cart_$cid"]);
                $this->assign('cart',$z);
                $this->assign('count',count($_SESSION["cart_$cid"]));
                $count=count($_SESSION["cart_$cid"]);
            }else{
                $z=array_reverse($_SESSION["cart"]);
                $this->assign('cart',$z);
                $this->assign('count',count($_SESSION["cart"]));
                $count=count($_SESSION["cart"]);
            }

            foreach($z as $key=>$val){
                $totalPrice+=$val[0]['prod_price']*$val[0]['num'];
            }

            if($_POST['item']){
                $this->assign("url",$_SERVER[REQUEST_URI]);
                $this->assign("totalPrice",$totalPrice);
                $this->display('cartPage');
            }else{
            $this->ajaxReturn(array("status"=>"$data","count"=>$count));
            }
        }else{
            $this->display();
        }

// buycar end
//        $this->display();

    }
    protected function defaultProd(){
        $prod=M('Prod');
        $prodcount=$prod->count();
        $Page=new \Think\Page($prodcount,16);
        $show=$Page->show();
        $prodlist=$prod->where("prod_go=0")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $prods['prod']=$prodlist;
        $prods['page']=$show;

    return $prods;
    }
    protected function defaultBrand(){

        $brand=M('Brand');
        $brandcount=$brand->count();
        $brandlist=$brand->select();
        $hb=0;
        if(!empty($_GET['hobby']) ) {
            $hb=1;
            $this->assign("Hb",$hb);
            $hbarr=$_GET['hobby'];
            $count = count($_GET['hobby']);
            for ($i = 0; $i < $count; $i++) {
                $bidlist.=$hbarr[$i].",";
            }
            $where['brand_bid']=array("in",$bidlist);
            $count1=$brand->where($where)->count();
            $brandlist1=$brand->where($where)->getField('brand_bid',$count);
        }
        foreach($brandlist as $key=>$val){
            $brandlist[$key]['check']=0;
            foreach($brandlist1 as $k=>$v){

                if($val['brand_bid']==$v){

                    $brandlist[$key]['check']=1;
                }
            }
        }
     if(!empty($_GET['hobbyname'])){
         $hb=1;
         $bidlist=$_GET['hobbyname'];
         $this->assign("Hb",$hb);
         $where['brand_bid']=array("in",$bidlist);
         $count1=$brand->where($where)->count();
         $brandlist1=$brand->where($where)->getField('brand_bid',$count);
     }
        foreach($brandlist as $key=>$val){
            $brandlist[$key]['check']=0;
            foreach($brandlist1 as $k=>$v){

                if($val['brand_bid']==$v){

                    $brandlist[$key]['check']=1;
                }
            }

     }
        $this->checkList=$brandlist;

        return $brandlist;

    }

    protected function defaultClass(){
        $class=M('Class');
   $classpid=$class->where("class_pid=0")->select();
     return $classpid;
    }
    protected function smallClass($getcid){
        $class=M('Class');
        if(!empty($getcid)){
            $where['class_path']=array('like',array("$getcid,%,%"),'OR');
            $smallclass=$class->where($where)->select();
        }
        else{
            $where['class_path']=array('like',array("%,%,%"),'OR');
            $smallclass=$class->where($where)->limit(40)->select();
        }
        return $smallclass;
    }

    protected function getBrand($get){
       $brandbid= $_GET['brand_bid'];
        $prods=M('Prod');
        $count=$prods->where("prod_bid=$brandbid")->count();
            $Page=new \Think\Page($count,16);
            $show=$Page->show();
            $prods1['prod']=$prods->where("prod_bid=$brandbid")->limit($Page->firstRow.','.$Page->listRows)->select();
            $prods1['page']=$show;


        return $prods1;
    }
    protected function getForm1($get){

        $prods=M('prod');
        $prodscount=$prods->count();
        $prods1['prod']=$prods->where("prod_go=0")->select();

            $Page = new \Think\Page($prodscount,16);
            $show = $Page->show();
            $prodslist = $prods->where("prod_go=0")->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $prods1['prod'] = $prodlist;
            $prods1['page'] = $show;

        if(!empty($get)){

            $where['prod_name']=array('like',array("%$get","$get%","%$get%"),'OR');
             $prodcount=$prods->where($where)->count();
            $Page = new \Think\Page($prodscount, 16);
                $show = $Page->show();
                $prodslist = $prods->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();
                $prods1['prod'] = $prodlist;
                $prods1['page'] = $show;

            if(empty($prods1['prod']))
            {
                $where3['class_name']=array('like',array("%$get","%$get%","$get%"),'OR');
                $class=M('Class');
                $classcount=$class->where($where3)->count();
                $classlist=$class->where($where3)->getField('class_path',$classcount);

                for($i=0;$i<$classcount;$i++)
                {
                   $classpath= strrpos($classlist[$i],',');
                    $getcid.=substr($classlist[$i],$classpath+1).",";
                }
          if(!empty($getcid)){
            $where5['prod_cid']=array('in',$getcid);
              $count=$prods->where($where5)->count();
                  $Page=new \Think\Page($count,16);
                  $show=$Page->show();
                  $prodlist=$prods->where($where5)->limit($Page->firstRow . ',' . $Page->listRows)->select();
                  $prods1['prod']=$prodslist;
                  $prods1['page']=$show;

          }
            }

        if(empty($prods1['prod'])){

              $where1['brand_name']=array('like',array("%$get","$get%","%$get%"),'OR');

              $brand=M('Brand');

              $brand1=$brand->where($where1)->count();
            if($brand1>0) {
                $brand2 = $brand->where($where1)->getField('brand_bid', $brand1);

                $where2['prod_bid'] = array('in', $brand2);
                $prodcount1 = $prods->where($where2)->count();
                $Page = new \Think\Page($prodcount1, 16);
                    $show = $Page->show();
                    $prodlist = $prods->where($where2)->limit($Page->firstRow . ',' . $Page->listRows)->select();
                    $prods1['prod'] = $prodlist;
                    $prods1['page'] = $show;

            }
          }
        }
        if(empty($prods1['prod'])){
        $prods1['prod']="您要搜索的商品不存在";
        }
        return $prods1;
    }
    protected function getForm2($get){
        $prods = self::getForm1($_GET['prods']);
        $prods1=$prods['prod'];
        $count=count($prods1);
        if($count>0) {
            for ($i = 0; $i < $count; $i++) {
                $prodsbid .= $prods1[$i]['prod_bid'] . ",";
            }
        }
        $brands=M('Brand');
        $where['brand_bid']=array('in',$prodsbid);
        $brandname=$brands->where($where)->select();
        return $brandname;
    }
    protected function getForm3($get){

        $prods=self::getForm1($_GET['prods']);
        $prods1=$prods['prod'];
        $count=count($prods1);
        if($count>0) {
            for ($i = 0; $i < $count; $i++) {
                $prodscid .= $prods1[$i]['prod_cid'] . ",";
            }
        }

        $class=M('Class');
        $where['class_cid']=array('in',$prodscid);
        $classname=$class->where($where)->select();
        return $classname;

    }
    protected function getForm4($get){

    $prods=M('Prod');
        $where['prod_cid']=$get['class2_cid'];

        $count=$prods->where($where)->count();
        $Page = new \Think\Page($count, 16);
            $show = $Page->show();
            $prodslist['prod'] = $prods->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $prodslist['page'] =$show;

        if(empty($prodslist['prod']))
        {
            $prodslist['prod']="您搜索的商品不在";
        }
        $class=M('Class');
      $classpath= $_GET['class_path'];
        $bigpid1=strpos($classpath,",");
        $bigpid=substr($classpath,0,$bigpid1);

        $prodbigcid=$class->where("class_cid=$bigpid")->select();
        $whereclass['class_path']=array("like",array("$bigpid,%,%"),'OR');
        $prodslist['smallclass']=$class->where($whereclass)->select();
     return $prodslist;
    }

protected function tuijianProd(){
    $prods=M('Prod');
    $where['prod_go']=0;
    $prodlist['prod']=$prods->where($where)->select();

     shuffle($prodlist['prod']);
    return $prodlist['prod'];
}
        protected function getZonghe($get){
            $prods=M('Prod');
            $count=$prods->count();
            $Page=new\Think\Page($count,16);
            $show=$Page->show();
            $prods1['prod']=$prods->limit($Page->firstRow.','.$Page->listRows)->select();
            $prods1['page']=$show;

            if(!empty($get['brand_bid'])){

                $brandbid= $_GET['brand_bid'];
                $prods=M('Prod');
                $count=$prods->where("prod_bid=$brandbid")->count();
                    $Page=new\Think\Page($count,16);
                    $show=$Page->show();
                    $prods1['prod']=$prods->where("prod_bid=$brandbid")->limit($Page->firstRow.','.$Page->listRows)->select();
                    $prods1['page']=$show;

             }

            if(!empty($get['class_cid'])){
                $cid=$get['class_cid'];

                $classcid=M('Class');
        $where['class_path']=array('like',array("$cid,%,%"),'OR');
            $classcount=$classcid->where($where)->count();
                $classname=$classcid->where($where)->getField("class_cid",$classcount);
          for($i=0;$i<$classcount;$i++){
              $prodsclass.=$classname[$i].',';
          }

                $prods=M('Prod');
                $where['prod_cid']=array('in',$prodsclass);
                $count=$prods->where($where)->count();
                $prods1['prod']=$prods->where($where)->select();

                    $Page=new\Think\Page($count,16);
                    $show=$Page->show();
                    $prods1['prod']=$prods->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
                    $prods1['page']=$show;


            }
            if($_GET['prods']){
                $prodsname=$_GET['prods'];
                $where['prod_name']=array("like",array("%$prodsname%"),'OR');
                $count=$prods->where($where)->count;

                $Page=new\Think\Page($count,16);
                $show=$Page->show();
                $prods1['prod']=$prods->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;
            }

            if(!empty($get['class2_cid'])){
                $smallcid=$get['class2_cid'];
                $where['prod_cid']=$smallcid;

                $prods=M('Prod');
                $count=$prods->where($where)->count();


                    $Page=new\Think\Page($count,16);
                    $show=$Page->show();
                    $prods1['prod']=$prods->where("prod_cid=$smallcid")->limit($Page->firstRow.','.$Page->listRows)->select();
                    $prods1['page']=$show;


            }
          if($_GET['prods']){
              $prodsname=$_GET['prods'];
              $where['prod_name']=array("like",array("%$prodsname%"),'OR');
              $count=$prods->where($where)->count();

              $Page=new\Think\Page($count,16);
              $show=$Page->show();
              $prods1['prod']=$prods->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;
          }
            if($_GET['hobbyname']){
               $prodbid=$_GET['hobbyname'];
                $where['prod_bid']=array("in",$prodbid);
                $count=$prods->where($where)->count();
                $Page=new\Think\Page($count,16);
                $show=$Page->show();
                $prods1['prod']=$prods->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;
            }
            return $prods1;
}
    protected function bigClass($get){
        $cid=$get['class_cid'];

        $classcid=M('Class');
        $where['class_path']=array('like',array("$cid,%,%"),'OR');
        $classcount=$classcid->where($where)->count();
        $classname=$classcid->where($where)->getField("class_cid",$classcount);
        for($i=0;$i<$classcount;$i++){
            $prodsclass.=$classname[$i].',';
        }
        $prods=M('Prod');
        $where['prod_cid']=array('in',$prodsclass);
        $count=$prods->where($where)->count();
            $Page=new\Think\Page($count,16);
            $show=$Page->show();
            $prods1['prod']=$prods->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            $prods1['page']=$show;


        return $prods1;
    }
    protected function getSale($get){
        $prods=M('Prod');
        $count=$prods->count();
        $Page=new\Think\Page($count,16);
        $show=$Page->show();
        $prods1['prod']=$prods->order("prod_offt desc")->limit($Page->firstRow.','.$Page->listRows)->select();
        $prods1['page']=$show;
        if(!empty($get['brand_bid'])){
            $brandbid= $_GET['brand_bid'];
            $prods=M('Prod');
            $count=$prods->count();
                $Page=new\Think\Page($count,16);
                $show=$Page->show();
                $prods1['prod']=$prods->order("prod_offt desc")->where("prod_bid=$brandbid")->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;



        }
        if(!empty($get['class_cid'])){
            $cid=$get['class_cid'];

            $classcid=M('Class');
            $where['class_path']=array('like',array("$cid,%,%"),'OR');
            $classcount=$classcid->where($where)->count();
            $classname=$classcid->where($where)->getField("class_cid",$classcount);
            for($i=0;$i<$classcount;$i++){
                $prodsclass.=$classname[$i].',';
            }
            $prods=M('Prod');
            $where['prod_cid']=array('in',$prodsclass);
            $prodcount=$prods->where($where)->count();
            $Page=new\Think\Page($prodcount,16);
                $show=$Page->show();
                $prods1['prod']=$prods->order("prod_offt desc")->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;


        }
        if(!empty($get['class2_cid'])){
            $smallcid=$get['class2_cid'];

            $prods=M('Prod');
            $prodcount=$prods->where("prod_cid=$smallcid")->count();
                $Page=new\Think\Page($prodcount,16);
                $show=$Page->show();
                $prods1['prod']=$prods->order("prod_offt desc")->where("prod_cid=$smallcid")->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;

        }
        if($_GET['prods']){
            $prodsname=$_GET['prods'];
            $where['prod_name']=array("like",array("%$prodsname%"),'OR');
            $count=$prods->where($where)->count();

            $Page=new\Think\Page($count,16);
            $show=$Page->show();
            $prods1['prod']=$prods->where($where)->order("prod_offt desc")->limit($Page->firstRow.','.$Page->listRows)->select();
            $prods1['page']=$show;
        }
        if($_GET['hobbyname']){
            $prodbid=$_GET['hobbyname'];
            $where['prod_bid']=array("in",$prodbid);
            $count=$prods->where($where)->count();
            $Page=new\Think\Page($count,16);
            $show=$Page->show();
            $prods1['prod']=$prods->where($where)->order("prod_offt desc")->limit($Page->firstRow.','.$Page->listRows)->select();
            $prods1['page']=$show;
        }
        return $prods1;

    }
    protected function getNewprod($get){
        $prods=M('Prod');
        $count=$prods->count();
        $Page=new\Think\Page($count,16);
        $show=$Page->show();
        $prods1['prod']=$prods->order("prod_createtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
        $prods1['page']=$show;
        if(!empty($get['brand_bid'])){
            $brandbid= $_GET['brand_bid'];
            $prods=M('Prod');
            $count=$prods->count();
                $Page=new\Think\Page($count,16);
                $show=$Page->show();
                $prods1['prod']=$prods->order("prod_createtime desc")->where("prod_bid=$brandbid")->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;

        }
        if(!empty($get['class_cid'])){
            $cid=$get['class_cid'];

            $classcid=M('Class');
            $where['class_path']=array('like',array("$cid,%,%"),'OR');
            $classcount=$classcid->where($where)->count();
            $classname=$classcid->where($where)->getField("class_cid",$classcount);
            for($i=0;$i<$classcount;$i++){
                $prodsclass.=$classname[$i].',';
            }

            $prods=M('Prod');
            $where['prod_cid']=array('in',$prodsclass);
            $count=$prods->where($where)->count();
            $Page=new\Think\Page($count,16);
                $show=$Page->show();
                $prods1['prod']=$prods->order("prod_createtime desc")->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;


        }
        if(!empty($get['class2_cid'])){
            $smallcid=$get['class2_cid'];

            $prods=M('Prod');
            $count=$prods->where("prod_cid=$smallcid")->count();
            $Page=new\Think\Page($count,16);
                $show=$Page->show();
                $prods1['prod']=$prods->order("prod_createtime desc")->where("prod_cid=$smallcid")->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;

        }
        if($_GET['prods']){
            $prodsname=$_GET['prods'];
            $where['prod_name']=array("like",array("%$prodsname%"),'OR');
            $count=$prods->where($where)->count();

            $Page=new\Think\Page($count,16);
            $show=$Page->show();
            $prods1['prod']=$prods->where($where)->order("prod_createtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
            $prods1['page']=$show;
        }
        if($_GET['hobbyname']){
            $prodbid=$_GET['hobbyname'];
            $where['prod_bid']=array("in",$prodbid);
            $count=$prods->where($where)->count();
            $Page=new\Think\Page($count,16);
            $show=$Page->show();
            $prods1['prod']=$prods->where($where)->order("prod_createtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
            $prods1['page']=$show;
        }
        return $prods1;
    }

    protected function keepClass($get){

        $getpath=$get['class_cid'];
        $class=M('Class');
        $where['class_path']=array('like',array("$get,%,%"),'OR');
        if(is_array($get)) {
            $where['class_path'] = array('like', array("$getpath,%,%"), 'OR');
        }
        $class1=$class->where($where)->select();
        return $class1;

    }
    protected function getInput($get){
        $small=trim($_GET['small']);
        $big=trim($_GET['big']);
        $prods=M('Prod');
            if(!empty($small)) {
                $where['prod_sale_price'] = array("EGT", $small);
            }
            if(!empty($big)){
                $where['prod_sale_price']=array("ELT",$big);
            }
            if(!empty($small)&&!empty($big))
            {
                $where['prod_sale_price']=array("between","$small,$big");
            }
            $count=$prods->where($where)->count();
            $Page=new\Think\Page($count,16);
            $show=$Page->show();
            $prods1['prod']=$prods->order('prod_sale_price asc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            $prods1['page']=$show;

            if(!empty($_GET['brand_bid'])){
                $prodbid=$_GET['brand_bid'];
                $where['prod_bid']=$prodbid;
                $count=$prods->where($where)->count();
                $Page=new\Think\Page($count,16);
                $show=$Page->show();
                $prods1['prod']=$prods->order('prod_sale_price asc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;

            }
            if(!empty($_GET['class_cid'])){
                $prodcid=$_GET['class_cid'];
                $class=M('Class');
                $whereclass['class_path']=array('like',array("$prodcid,%,%"),'OR');
                $class1=$class->where($whereclass)->count();
                $class2=$class->where($whereclass)->getField('class_cid',$class1);
                for($i=0;$i<$class1;$i++){
                    $classlist.=$class2[$i].",";
                }
              $where['prod_cid']=array("in",$classlist);
                $count=$prods->where($where)->count();
                $Page=new\Think\Page($count,16);
                $show=$Page->show();
                $prods1['prod']=$prods->where($where)->order("prod_sale_price asc")->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;
            }
            if(!empty($_GET['class2_cid'])){

                    $prodcid=$_GET['class2_cid'];
                $where['prod_cid']=$prodcid;
                $count=$prods->where($where)->count();
                $Page=new\Think\Page($count,16);
                $show=$Page->show();
                $prods1['prod']=$prods->where($where)->order("prod_sale_price asc")->limit($Page->firstRow.','.$Page->listRows)->select();
                $prods1['page']=$show;
            }

        if($_GET['prods']){
            $prodsname=$_GET['prods'];
            $where['prod_name']=array("like",array("%$prodsname%"),'OR');
            $count=$prods->where($where)->count;

            $Page=new\Think\Page($count,16);
            $show=$Page->show();
            $prods1['prod']=$prods->where($where)->order("prod_sale_price desc")->limit($Page->firstRow.','.$Page->listRows)->select();
            $prods1['page']=$show;
        }
        if($_GET['hobbyname']){
            $prodbid=$_GET['hobbyname'];
            $where['prod_bid']=array("in",$prodbid);
            $count=$prods->where($where)->count();
            $Page=new\Think\Page($count,16);
            $show=$Page->show();
            $prods1['prod']=$prods->where($where)->order("prod_sale_price desc")->limit($Page->firstRow.','.$Page->listRows)->select();
            $prods1['page']=$show;
        }
         return $prods1;

    }
    protected function getHobby($get)
    {
        if (!empty($_GET['hobby'])) {


            $bidarr = $_GET['hobby'];

            $bidcount = count($bidarr);;
            for ($i = 0; $i < $bidcount; $i++) {
                $bidlist .= $bidarr[$i] . ",";
            }
            $prods=M('Prod');
          $where['prod_bid']=array("in",$bidlist);
            $count=$prods->where($where)->count();
            $Page=new\Think\Page($count,16);
            $show=$Page->show();
            $prods1['prod']=$prods->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            $prods1['page']=$show;
        }
        return $prods1;
    }
}
