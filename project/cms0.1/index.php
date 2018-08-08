<?php
	require dirname(__FILE__).'/template.inc.php';
	$_tpl = new Templates();
	
	//注入变量
	$_name = '李炎恢';
	$_array = array(1, 2, 3, 4);
	$_tpl->assign('name', $_name);
	$_tpl->assign('a', 5<4);
	$_tpl->assign('array', $_array);
	
	//载入tpl文件
	$_tpl->display('index.tpl');