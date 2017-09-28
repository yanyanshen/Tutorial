<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

		//首页商品展示
        $prodList1=self::getProdList(1,3,1);
        $prodList1_1=self::getProdList(1,4,0);
        $prodList2=self::getProdList(5,3,1);
        $prodList2_2=self::getProdList(5,4,0);
        $prodList3=self::getProdList(11,3,1);
        $prodList3_3=self::getProdList(11,4,0);
        $prodList4=self::getProdList(14,3,1);
        $prodList4_4=self::getProdList(14,4,0);
        $prodList5=self::getProdList(8,3,1);
        $prodList5_5=self::getProdList(8,4,0);
        $this->assign("prodList1",$prodList1);
        $this->assign("prodList1_1",$prodList1_1);
        $this->assign("prodList2",$prodList2);
        $this->assign("prodList2_2",$prodList2_2);
        $this->assign("prodList3",$prodList3);
        $this->assign("prodList3_3",$prodList3_3);
        $this->assign("prodList4",$prodList4);
        $this->assign("prodList4_4",$prodList4_4);
        $this->assign("prodList5",$prodList5);
        $this->assign("prodList5_5",$prodList5_5);

        //首页分类展示
        $classList=self::getClassList();
        $this->assign("secondClassList",$classList[1]);
        $this->assign("secondClassList1",$classList[2]);
        $this->assign("firstClassList",$classList[0]);
        //楼层分类展示

        $floorClassList1=self::getSecondClassByCid(1);
        $floorClassList2=self::getSecondClassByCid(5);
        $floorClassList3=self::getSecondClassByCid(11);
        $floorClassList4=self::getSecondClassByCid(14);
        $floorClassList5=self::getSecondClassByCid(8);
        $this->assign("floorClassList1",$floorClassList1);
        $this->assign("floorClassList2",$floorClassList2);
        $this->assign("floorClassList3",$floorClassList3);
        $this->assign("floorClassList4",$floorClassList4);
        $this->assign("floorClassList5",$floorClassList5);

         //楼层品牌展示
        $firstFloorBrands=self::getFloorBrands(1,8);
        $secondFloorBrands=self::getFloorBrands(5,8);
        $thirdFloorBrands=self::getFloorBrands(11,8);
        $forthFloorBrands=self::getFloorBrands(14,8);
        $fifthFloorBrands=self::getFloorBrands(8,8);
        $this->assign("firstFloorBrands",$firstFloorBrands);
        $this->assign("secondFloorBrands",$secondFloorBrands);
        $this->assign("thirdFloorBrands",$thirdFloorBrands);
        $this->assign("forthFloorBrands",$forthFloorBrands);
        $this->assign("fifthFloorBrands",$fifthFloorBrands);

        //轮播广告展示
        $adBanner=self::getAdvertise(0);
        $firstBannerUrl=$adBanner[0]['ad_url'];
        $firstBannerPic=$adBanner[0]['ad_pic'];
        $this->assign("firstBannerUrl",$firstBannerUrl);
        $this->assign("firstBannerPic",$firstBannerPic);
        $this->assign("adBanner",$adBanner);

        //顶层广告展示
        $adFloor=self::getAdvertise(1);
        $this->assign("adFloor",$adFloor);

        // 足迹
        $pp=D('prod');
        $s='';
        foreach($_COOKIE["fl_home"] as $v){
            $s=$s.$v.',';
        }
        $wh['prod_id']=array("in","$s");
        $d= $pp->where($wh)->select();
        $d=array_reverse($d);
        $ss=count($d);
        $this->assign('zj',$d);
        $this->assign('zjss',$ss);
        // 足迹结束

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
        //购物车数据结束

        $this->display();
    }

    public function getClassList(){
        //获取分类列表
        if(!$list=S("list")) {
            $class = M("Class");
            $list[0] = $class->where("class_pid=0")->select();
            foreach ($list[0] as $v) {
                $secondClass[] = $class->where("class_pid={$v['class_cid']}")->limit(3, 8)->order("class_path")->select();
            }
            foreach ($secondClass as $v1) {
                foreach ($v1 as $v2) {
                    $secondClassList[] = $v2;
                }
            }
            $list[1] = $secondClassList;
            foreach ($list[0] as $val) {
                $secondClass1[] = $class->where("class_pid={$val['class_cid']}")->order("class_path")->select();
            }
            foreach ($secondClass1 as $val1) {
                foreach ($val1 as $val2) {
                    $secondClassList1[] = $val2;
                }
            }
            $list[2] = $secondClassList1;

            S(array(
                'type'=>'memcache',
               'host'=>'127.0.0.1',
                'port'=>'11211',
                'expire'=>86400
            ));
            S("list",$list);
        }
        return $list;

    }
    
    protected function getSecondClassByCid($cid){
        $class=M("Class");
        $classList=$class->where(array("class_pid"=>$cid))->limit(8)->select();
        return $classList;
    }

    protected function getProdCid($cid){
        //获取商品分类ID
        $class=M("Class");
        $where['class_path']=array('like',array("$cid","%,$cid" ,"%,$cid,%" ,"$cid,%"),'OR');
        $cidArr=$class->where($where)->field("class_cid")->select();
        if($cidArr){
            foreach($cidArr as $v){
                $cidList[]=$v['class_cid'];
            }
        }
        return $cidList;
    }

    protected function getProdList($cid=0,$num=0,$picSize=0){
        //获取商品列表
        $cidList=self::getProdCid($cid);
        $prod=M("Prod");
        if($cid>0){
            $where['prod_cid']=array('in',$cidList);
            $where['prod_go']=0;
            $where['prod_show_big']=$picSize;
        }else{
            $where="prod_go=0 and prod_show_big=$picSize";
        }
        $prodList=$prod->where($where)->limit($num)->select();
        return $prodList;
    }

     protected function getFloorBrands($cid=1,$num=8){
        //获取楼层品牌
        $cidList=self::getProdCid($cid);
        $prod=M("Prod");
        $whereP['prod_cid']=array('in',$cidList);
        $whereP['prod_go']=0;
        $bidArr=$prod->where($whereP)->field('prod_bid')->group('prod_bid')->select();
        foreach($bidArr as $bidVal){
            $bidList[]=$bidVal['prod_bid'];
        }
        $brand=M("Brand");
        $whereB['brand_bid']=array('in',$bidList);
        $whereB['brand_pic']=array('like',array("%.jpg" ,"%.png ","%.gif","%.jpeg"),'OR');
        $brandList=$brand->where($whereB)->limit($num)->select();
        return $brandList;
    }

    protected function getAdvertise($ad_type=1){
        //获取广告
        $ad=M("Advertise");
        $where['ad_type']=$ad_type;
        $where['ad_isshow']=1;
        $adlist=$ad->order("ad_pos_id")->group("ad_pos_id")->where($where)->limit(5)->select();
        return $adlist;
    }

    public function clearAllCache(){

        $mem=new \Think\Cache\Driver\Memcache();
        $mem->clear();

        $path1='E:/fl/FL/Html';
        $path2='E:/fl/FL/Runtime/Data';
        $path3='E:/fl/FL/Runtime/Temp';
        $filesource=opendir($path1);
        while($file=readdir($filesource)){
            if($file!='.'&&$file!='..'){
                unlink($path1.'/'.$file);
            }
        }
        closedir($path1);

        $filesource=opendir($path2);
        while($file=readdir($filesource)){
            if($file!='.'&&$file!='..'){
                unlink($path2.'/'.$file);
            }
        }
        closedir($path2);

        $filesource=opendir($path3);
        while($file=readdir($filesource)){
            if($file!='.'&&$file!='..'){
                unlink($path3.'/'.$file);
            }
        }
        closedir($path3);

        echo "已清空";
    }
}