<?php
return array(
	//'配置项'=>'配置值'
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称
    'DEFAULT_CHARSET'       =>  'utf-8', // 默认输出编码
    'DEFAULT_TIMEZONE'      =>  'PRC',  // 默认时区
    'MULTI_MODULE'          =>  true, // 是否允许多模块 如果为false 则必须设置 DEFAULT_MODULE
    'SHOW_PAGE_TRACE'       =>  true,  //页面Trace，页面调试工具
    'URL_HTML_SUFFIX'       =>  '.html',
    'HTML_CACHE_ON'         =>  true, // 开启静态缓存
    'HTML_CACHE_TIME'       =>  60,   // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX'      =>  '.html', // 设置静态缓存文件后缀
//    'HTML_CACHE_RULES'      =>  array(
//        'Index:index'=>array('{:module}_{:controller}_{:action}',60)
//    )  // 定义静态缓存规则
);