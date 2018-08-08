<?php
	//连接数据库
	$server = '127.0.0.1';
	$user = 'root';
	$port = 3306;
	$passwd = '123';
	$db = 'liuyanban_db';
	$conn = mysqli_connect($server, $user, $passwd, $db);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}