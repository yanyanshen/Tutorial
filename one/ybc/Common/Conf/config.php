<?php
return array(
	//'配置项'=>'配置值'
    'CONTROLLER_LEVEL'=>1,
    'URL_PARAMS_BIND_TYPE'  =>  0,       // URL变量绑定的类型 0 按变量名绑定 1 按变量顺序绑定
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'one',          // 数据库名
    'DB_USER'               =>  'one',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'ybc_',    // 数据库表前缀
    //'SHOW_PAGE_TRACE'       =>  true,
    //极验证码
    'GEETEST_ID'             => '2551c81197d44e02ba20400490561185',//极验id  仅供测试使用
    'GEETEST_KEY'            => '38a5d6c33026e98ba0537207d49695ad',//极验key 仅供测试使用

    'TMPL_PARSE_STRING'  =>array(
        '__UPLOADS__' => __ROOT__.'/Uploads'
    ),



    //邮件发送
    'EMAIL_FROM_NAME'        => '一杯茶茶叶商城',   // 发件人
    'EMAIL_SMTP'             => 'smtp.163.com',   // smtp
    'EMAIL_USERNAME'         => '13007637174@163.com',   // 账号
    'EMAIL_PASSWORD'         => 'rbj520',   // 密码  注意: 163和QQ邮箱是授权码；不是登录的密码
    'EMAIL_SMTP_SECURE'      => '',   // 链接方式 如果使用QQ邮箱；需要把此项改为  ssl


    /*//邮件配置
    'MSTPSERVER'             =>'smtp.163.com',
    'SMTPSERVERPORT'         =>25,
    'SMTPUSERMAIL'           =>'13007637174@163.com',
    'SMTPUSER'               =>'13007637174',
    'SMTPPASS'               =>'rbj520',*/


    //权限控制配置
    /*'AUTH_CONFIG'=>array(
        'AUTH_ON'  =>true,//认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP' => 'ybc_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS' => 'ybc_auth_group_access', //用户组明细表
        'AUTH_RULE' => 'ybc_auth_rule', //权限规则表
        'AUTH_USER' => 'ybc_admin'//用户信息表
    )*/



);