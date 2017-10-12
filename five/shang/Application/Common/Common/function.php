<?php
/**
 * 生成唯一字符串
 * @param
 * @return string
 */
function uniqStr(){
    return md5(uniqid(microtime(true)));
}
