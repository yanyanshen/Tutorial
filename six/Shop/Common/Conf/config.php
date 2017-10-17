<?php
return array(
    'TMPL_PARSE_STRING'=>array(    //定义的模板常量
        '__SKIN__'=>'./Shop/Public',
        
    ),
      /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'six',          // 数据库名
//    'DB_USER'               =>  'root',      // 用户名
    'DB_USER'               =>  'six',      // 用户名
//    'DB_PWD'                =>  'root',          // 密码
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sk_',    // t据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采
    'SHOW_PAGE_TRACE' =>true,

 /*   'GEETEST_ID'            =>'ed4d57291e874e081bf75a14e0036d92',
    'GEETEST_KEY'           =>'f6e939e2f377afc37874d00d73d3547f'*/

    //极验证码
    'GEETEST_ID'             => 'ed4d57291e874e081bf75a14e0036d92',//极验id  仅供测试使用
    'GEETEST_KEY'            => 'f6e939e2f377afc37874d00d73d3547f',//极验key 仅供测试使用


    //邮件发送
    'EMAIL_FROM_NAME'        => '云和',   // 发件人
    'EMAIL_SMTP'             => 'smtp.163.com',   // smtp
    'EMAIL_USERNAME'         => '15637138806@163.com',   // 账号
    'EMAIL_PASSWORD'         => '003003li',  // 密码  注意: 163和QQ邮箱是授权码；不是登录的密码
    'EMAIL_SMTP_SECURE'      => '',   // 链接方式 如果使用QQ邮箱；需要把此项改为  ssl
    'EMAIL_SMTP_WORD'        =>'',


//荣联

    'RONGLIAN_ACCOUNT_SID'   =>'8aaf0708586696ef01586b5db08f0480',
    'RONGLIAN_ACCOUNT_TOKEN' =>'690d44182a1c45d49e674f2ac9b96d51',
    'RONGLIAN_APPID'         =>'8aaf0708586696ef01586b5db0f40485',
    //权限认证
        'AUTH_CONFIG' => array(
            'AUTH_ON' => true, //认证开关
            'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
            'AUTH_GROUP' => 'sk_auth_group', //用户组数据表名
            'AUTH_GROUP_ACCESS' => 'sk_auth_group_access', //用户组明细表
            'AUTH_RULE' => 'sk_auth_rule', //权限规则表
            'AUTH_USER' => 'sk_admin',//用户信息表






//微信公众号开启
   'TOKEN'=>'shop'
       )







);