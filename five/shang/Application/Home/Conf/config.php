<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING'=>array(
        '__STATIC__'=>__ROOT__.'/Public/'.MODULE_NAME,
        '__UPLOAD__'=>__ROOT__.'/Public/'.'Uploads',
    ),
    'SESSION_PREFIX'=>'shang_home',
    'COOKIE_PREFIX'=>'shang_home',

   /* //数据库配置
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '172.16.11.90', // 服务器地址
    'DB_NAME'               =>  'meilunmeishang',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'shang_ ',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 字符集*/
);