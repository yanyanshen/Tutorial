<?php
return array(
	//'配置项'=>'配置值'
        //'配置项'=>'配置值'
        'SESSION_PREFIX'        =>  'beauty_', // session 前缀
        'COOKIE_PREFIX'         =>  'beauty_',      // Cookie前缀 避免冲突

        'DB_TYPE'               =>  'mysql',     // 数据库类型
        'DB_USER'               =>  'four',      // 用户名
        'DB_PWD'                =>  '123456',          // 密码
        'DB_PREFIX'             =>  'beauty_',    // 数据库表前缀
        'DB_DSN'                =>  'mysql:host=127.0.0.1;port=3306;dbname=four;charset=utf8',
        // 'SHOW_PAGE_TRACE'      =>true,

    //极验验证
     'GEETEST_ID'             => '27cb550818ab3236e754db8997f2d804',//极验id  仅供测试使用
     'GEETEST_KEY'            => '7ecda8377d987a60c20ffb86e9553f28',//极验key 仅供测试使用


    //缓存配置
    'DATA_CACHE_PREFIX'     =>  'beauty',     // 缓存前缀
    'DATA_CACHE_TYPE'       =>  'Memcache',  // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator'MEMCACHE_HOST'         =>   '127.0.0.1',
    'MEMCACHE_HOST'         =>'127.0.0.1',
    'MEMCACHE_PORT'         =>   11211,


    //权限认证
    'AUTH_CONFIG'       => array(
    'AUTH_ON'           => true,                      // 认证开关
    'AUTH_TYPE'         => 1,                         // 认证方式，1为实时认证；2为登录认证。
    'AUTH_GROUP'        => 'beauty_auth_group',        // 用户组数据表名
    'AUTH_GROUP_ACCESS' => 'beauty_auth_group_access', // 用户-用户组关系表
    'AUTH_RULE'         => 'beauty_auth_rule',         // 权限规则表
    'AUTH_USER'         => 'beauty_admin'             // 用户信息表
    )

);