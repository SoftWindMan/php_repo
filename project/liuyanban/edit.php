<?php
	include './conn.php';
	
	$id =$_GET['id'];
	$sql = "select * from guestbook where id=$id";
	$rs = mysqli_query($conn, $sql);
	if(!empty($rs)) {
		$row = mysqli_fetch_assoc($rs);
	}
	mysqli_close($conn);
?>

	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>留言板</title>
		</head>
		<body>
		
			<!-- 提交表单 -->
			<form action="edit_save.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<p>用户名：<input type="text" name="username" value="<?php echo $row['username'];?>" /></p>
				<p>留言：<textarea cols="80px" rows="10px" name="content" /><?php echo $row['content'];?></textarea></p>
				<p><input type="submit" value="保存" /></p>
			</form>
		</body>
	</html>