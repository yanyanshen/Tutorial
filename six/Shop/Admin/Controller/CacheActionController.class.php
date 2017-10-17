<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
class CacheActionController extends BgController{
    //清除缓存
    public function clear(){
        header("Content-type: text/html; charset=utf-8");
        //清文件缓存
        $dirs = array('Shop/Runtime/');
        @mkdir('Runtime',0777,true);
        //清理缓存
        foreach($dirs as $value) {
            $this->rmdirr($value);
        }
//        echo '<div style="color:red;">系统缓存清除成功！</div>';
            $this->redirect('Index/index');
    }
    //处理方法
    public function rmdirr($dirname) {
        if (!file_exists($dirname)) {
            return false;
        }
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);
        }
        $dir = dir($dirname);
        if($dir){
            while (false !== $entry = $dir->read()) {
                if ($entry == '.' || $entry == '..') {
                    continue;
                }
                //递归
                $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
            }
        }
        $dir->close();
        return rmdir($dirname);
    }
}
?>
