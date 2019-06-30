<?php
/**
 * 项目数据表
 */
namespace app\components\table;

class CommonTable{
    const TB_AUTH_APP = 'tb_auth_app'; //应用表
    const TB_AUTH_APP_VERSION = 'tb_auth_app_version'; //应用版本表
    const TB_AUTH_USER_APP = 'tb_auth_user_app'; //用户应用表
	const TB_AUTH_RULE = 'tb_auth_rule'; //功能表
	const TB_AUTH_USER = 'tb_auth_user'; //系统用户表
	const TB_AUTH_GROUP = 'tb_auth_group'; //用户组表
	const TB_AUTH_GROUP_ACCESS = 'tb_auth_group_access'; //用户-用户组关联表
	const TB_AUTH_GROUP_RULE = 'tb_auth_group_rule'; //用户组功能表
	const TB_AUTH_USER_RULE = 'tb_auth_user_rule'; //用户功能表

	const TB_AUTH_DEPARTMENT = 'tb_auth_department'; //部门表
    const TB_AUTH_POSITION = 'tb_auth_position'; //岗位表

    const TB_AUTH_USER_COMPANY = 'tb_auth_user_company'; //用户所管公司
    const TB_AUTH_COMPANY = 'tb_auth_company'; //公司
    
	const TB_AUTH_LOGIN_LOG = 'tb_auth_login_log'; //登录日志表
	const TB_AUTH_ACCESS_LOG = 'tb_auth_access_log'; //访问日志表
}