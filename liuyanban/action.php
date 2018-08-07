<?php
	include './conn.php';

	$act = $_GET['act'];
	$id = $_GET['id'];
	
	//置顶、取消置顶、点赞、回复
	switch ($act) {
		case 'istop':
			$sql = "update guestbook set istop=1 where id=$id";
			break;
		case 'canceltop':
			$sql = "update guestbook set istop=0 where id=$id";
			break;
		case 'praise':
			$sql = "update guestbook set praise=praise+1 where id=$id";
			break;
		case 'savecomment':
			$username = $_POST['username'];
			$content = $_POST['content'];
			$sql = "insert into comment(book_id, username, content) values($id, '$username', '$content')";
			break;
		default:
			echo '参数有误';
			break;
	}
	
	$r = mysqli_query($conn, $sql);
	if($r) {
		echo '操作成功';
		echo "<a href='index.php'>返回首页</a>";
	} else {
		echo '操作失败';
		
	}
	mysqli_close($conn);