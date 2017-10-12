<?php
return array(
	//'配置项'=>'配置值'
    'SHOW_PAGE_TRACE'=>true,

    //数据库配置
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '172.16.11.90', // 服务器地址
    'DB_NAME'               =>  'mrshop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'Mr_',    // 数据库表前缀
    'DB_CHARSET'            =>'utf8',  //编辑格式
    //URL配置
    'URL_MODEL'=>2 ,          //更改URL模式
    //'MODULE_DENY_LIST'=>array(),//禁止访问模块
    // 'URL_HTML_SUFFIX'=>''      //静态后缀
    //'URL_CASE_INSENSITIVE' =>true,     //不区分URL大小写
    //'DB_DSN' => 'mysql://root:123456@localhost:3306/shop'
);