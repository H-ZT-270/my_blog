CREATE TABLE IF NOT EXISTS  `admin_user` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键' ,
	`username` varchar(20) NOT NULL COMMENT '用户名' ,
	`password_hash` varchar(255) NOT NULL COMMENT '用户密码(加密)',
	`mobile` int(11) NOT NULL COMMENT '手机',
	`email` varchar(100) NOT NULL COMMENT '邮箱',
	`nickname` varchar(20) NOT NULL COMMENT '昵称',
	`remark` varchar(255) NOT NULL COMMENT '个人备注',
	`avatar` varchar(255) NOT NULL COMMENT '头像',
	`auth_key` varchar(32) NOT NULL COMMENT '自动登录key',
    `password_reset_token` varchar(255) DEFAULT NULL,
	`status` tinyint(1) UNSIGNED DEFAULT 0 COMMENT '用户状态,0为正常,1为禁用' ,
	`create_at` int(11) NOT NULL COMMENT '创建时间',
	`update_at` int(11) NOT NULL COMMENT '更新时间',
	PRIMARY KEY (id)
) 
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='用户表'
;

