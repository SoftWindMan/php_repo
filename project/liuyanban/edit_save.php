<?php
	include './conn.php';
	
	$username = $_POST['username'];
	$content = $_POST['content'];
	$id = $_POST['id'];
	
	if(strlen($username)<2) {
		exit('用户名不能小于两个字。');
	}
	if(strlen($content)<1) {
		exit('留言内容不能为空。');
	}
	
	$sql = "update guestbook set username='$username', content='$content' where id=$id";
	$r = mysqli_query($conn, $sql);
	if($r) {
		echo '修改成功';
	} else {
		echo '修改失败';
	}
	mysqli_close($conn);