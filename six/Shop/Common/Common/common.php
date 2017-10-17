<?php

function msubstr($str, $start = 0, $length, $lenth2, $suffix = true) {
    $charset = 'utf-8';
    if (LANG_SET != 'zh') {
        $length = $lenth2;
    }
    $str = preg_replace("/(\<[^\<]*\>|\r|\n|\s|\[.+?\])/is", ' ', $str);
    if (function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif (function_exists('iconv_substr')) {
        $slice = iconv_substr($str, $start, $length, $charset);
        if (false === $slice) {
            $slice = '';
        }
    } else {
        $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("", array_slice($match[0], $start, $length));
    }
    $fix = '';
    if (LANG_SET == 'zh') {
        $slice = str_replace(' ', '', $slice);
        if (strlen($slice) > $length) {
            $fix = '...';
        }
    } else {
        if (strlen($str) > $lenth2) {
            $fix = '...';
        }
    }

    return $suffix ? $slice . $fix : $slice;
}

function getHtmlFormat($content,$num,$num2) {
    $content = strip_tags($content);
    if($num >0){
        $content = msubstr($content, 0, $num, $num2);
    }
    return $content;
}

function getChecked($id, $ids, $rs = 'checked', $default = "") {
    if (!empty($ids)) {
        $ids = explode(",", $ids);
        if (in_array($id, $ids)) {
            return $rs;
        } else {
            return $default;
        }
    }
}

function getEqual($a, $b, $rs='on') {
    if ($a == $b) {
        return $rs;
    }
}
function demo(){

	echo time();


}
