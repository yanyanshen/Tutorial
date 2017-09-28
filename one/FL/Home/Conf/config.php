<?php
return array(
	//'配置项'=>'配置值'
	 'SESSION_PREFIX'=>'fl_home',
    'COOKIE_PREFIX'=>'fl_home',
    //定义模板常量
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__.'/Public/'.MODULE_NAME,
    ),
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '172.16.11.90', // 服务器地址
    'DB_NAME'               =>  'fl',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'fl_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 字符集


    //定义缓存类型
    'DATA_CACHE_TYPE'=>'Memcache',

    //页面静态缓存
    'HTML_CACHE_ON'         =>  true,
    'HTML_CACHE_TIME'       =>  60,
    'HTML_FILE_SUFFIX'      =>  '.html',
    'HTML_CACHE_RULES'      =>  array(
        // 'Index:index'=>array('{:module}_{:controller}_{:action}',60),
        // 'Detail:index'=>array('{:module}_{:controller}_{:action}_{prod_id}')
    )
);