<?php
return array(
	//'配置项'=>'配置值'
    'SHOW_PAGE_TRACE'=>true,                    //开启页面trace调试功能
    //配置数据库的相关信息
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '172.16.11.178', // 服务器地址
    'DB_NAME'               =>  'pmshop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '1234',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'pm_',    // 数据库表前缀
    //'URL_PARAMS_BIND'       =>  true, // URL变量绑定到操作方法作为参数
    'URL_HTML_SUFFIX'       =>  'html',     //伪静态设置
    'DEFAULT_TIMEZONE'=>'Asia/ShangHai' // 设置默认时区为新加坡
);