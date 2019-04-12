CREATE TABLE IF NOT EXISTS  `user` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键' ,
	`username` varchar(20) NOT NULL COMMENT '用户名' ,
	`auth_key` varchar(32) NOT NULL,
	`password_hash` varchar(255) NOT NULL COMMENT '用户密码' ,
    `password_reset_token` varchar(255) DEFAULT NULL,
	`status` tinyint(1) UNSIGNED DEFAULT 0 COMMENT '用户状态,0为正常,1为禁用' ,
	PRIMARY KEY (id)
) 
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='用户表'
;

INSERT INTO `user` (`username`, `auth_key`, `password_hash`, `password_reset_token`) VALUES('admin', 'U6HW5ghQaofY1aDzdMGew3Rb_CMW8xKu', '$2y$13$9PjQ72iSvimHcpWQwUZjs.IOir.PXyX8W8x6y.yxSuVKxDTxNKGHe', NULL);
