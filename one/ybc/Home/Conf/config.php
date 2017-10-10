<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING'  =>array(
        '__STATIC__' => __ROOT__.'/Public/'.MODULE_NAME
    ),
    'HTML_CACHE_ON' => true, // 开启静态缓存
    'HTML_CACHE_TIME' => 10, // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX' => 'shtml', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES' => array( // 定义静态缓存规则
    // 定义格式1 数组方式
    'Index:' => array('{:module}/{:controller}/{:action}', 10),
)

);