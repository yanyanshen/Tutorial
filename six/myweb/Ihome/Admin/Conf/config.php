<?php
return array(
//'配置参数' => '配置值',
    'MODULE_DENY_LIST'      =>  array('Common','Runtime','Wap'),
    'DEFAULT_MODULE'        =>  'Admin',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称
    'DEFAULT_CHARSET'       =>  'utf-8', // 默认输出编码'
    'DEFAULT_TIMEZONE'      =>  'PRC',  // 默认时区
    'MULTI_MODULE'          =>  true, // 是否允许多模块 如果为false 则必须设置 DEFAULT_MODULE
    'SHOW_PAGE_TRACE'       =>  true,  //页面Trace，页面调试工具
    'URL_HTML_SUFFIX'       =>  'html',
    //默认错误跳转对应的模板文件
    'TMPL_ACTION_ERROR' => 'Public:error',
    //默认成功跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Public:success'
);