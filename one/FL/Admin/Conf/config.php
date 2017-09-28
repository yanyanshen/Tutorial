<?php
return array(
    'SHOW_PAGE_TRACE'=> true ,
    'DB_TYPE' => 'mysql',
    'DB_HOST' => '172.16.11.90',
    'DB_NAME' =>'fl',
    'DB_USER' =>'root',
    'DB_PWD' =>'123456',
    'DB_PORT' =>'3306',
    'DB_PREFIX' =>'fl_',
    'DB_CHARSET' => 'utf8',
	//'配置项'=>'配置值'
    'SESSION_PREFIX'=>'fl_admin',
    'COOKIE_PREFIX'=>'fl_admin',
    //定义模板常量
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__.'/Public/'.MODULE_NAME,
    )
);