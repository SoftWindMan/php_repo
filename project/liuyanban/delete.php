<?php
	include './conn.php';

	$id = $_GET['id'];
	if(!is_numeric($id)) {
		exit('id不是一个数字。');
	}
	$sql = "delete from guestbook where id=$id";
	if(mysqli_query($conn, $sql)) {
//		header('Location:index.php');
		echo "<script>alert('删除成功');location.href='./index.php'</script>";
	} else {
		echo mysqli_error($conn);
	}

function alertMessage($alertMessage, $locationUrl) {
	echo "<script>alert('$alertMessage'); location.href='$locationUrl'</script>";
}
