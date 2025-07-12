CREATE TABLE `sequence_number` (
   `key` varchar(50) NOT NULL DEFAULT '' COMMENT 'key值',
   `counter` int unsigned NOT NULL DEFAULT '0' COMMENT '计次',
   `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
   PRIMARY KEY (`key`) USING BTREE
) ENGINE=InnoDB COMMENT='编码计次表';