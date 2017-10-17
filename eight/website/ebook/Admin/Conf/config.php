<?php
return array(
	//'配置项'=>'配置值'

    'RBAC_SUPERADMIN'=>'admin',//超级管理员
    'ADMIN_AUTH_KEY'=>'superadmin',//超级管理员识别
    'USER_AUTH_ON'=>true,//是否开启验证
    'USER_AUTH_TYPE'=>1,//验证类型（1：登录验证，2：时时验证）
    'USER_AUTH_KEY'=>'uid',//用户认证识别号
    'NOT_AUTH_MODULE'=>'Index',//无需认证的控制器
    'NOT_AUTH_ACTION'=>'index,deletecategory,addRoleHandle,addNodeHandle,deletenode,addUserHandle,deleteuser,setAccess',//无需认证的动作方法
    'REQUIRE_AUTH_MODULE' => 'Rbac,Category', // 默认需要认证模块
    'REQUIRE_AUTH_ACTION' => '', // 默认需要认证操作
    'RBAC_ROLE_TABLE'=>'ebook_role',//角色表名称
    'RBAC_USER_TABLE'=>'ebook_role_user',//角色与用户表的中间表名称
    'RBAC_ACCESS_TABLE'=>'ebook_access',//权限表名称
    'RBAC_NODE_TABLE'=>'ebook_node',//节点表名称
);