CREATE TABLE `comment` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`book_id` int(11) DEFAULT NULL,
	`username` varchar(20) DEFAULT NULL,
	`content` text,
	`intime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 comment '评论表';

CREATE TABLE `guestbook` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(20) DEFAULT NULL,
	`content` text,
	`intime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`istop` tinyint(4) DEFAULT '0',
	`praise` int(11) DEFAULT '0',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 comment '留言表';