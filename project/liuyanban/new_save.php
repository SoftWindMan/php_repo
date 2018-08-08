<?php
	include './conn.php';
	
	//后台处理数据四大步骤
	//1、接收数据
	//2、验证数据有效性
	//3、构造sql，发往服务器，实现操作
	//4、显示服务器返回数据
	$username = $_POST['username'];
	$content = $_POST['content'];

	if(strlen($username)<2) {
		exit('用户名不能小于两个字。');
	}
	if(strlen($content)<1) {
		exit('留言内容不能为空。');
	}
	
	$sql = "insert into guestbook(username, content) values('$username', '$content')";
	if (mysqli_query($conn, $sql)) {
		header('Location:index.php');
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);