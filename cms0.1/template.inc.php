<?php
	
	//设置utf-8编码
	header('Content-Type:text/html;charset:utf-8');
	
	//网站根目录
	define('ROOT_PATH', dirname(__FILE__));
	
	//引入配置信息
	require ROOT_PATH.'/config/profile.inc.php';
	
	//是否开启缓冲区，后台专用
	define('IS_CACHE', true);
	IS_CACHE ? ob_start() : null;
	
	//引入模板类
	require ROOT_PATH.'/includes/Templates.class.php';
	
