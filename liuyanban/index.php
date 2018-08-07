<!-- 留言的新增、修改、删除 -->
<!-- 置顶、点赞、举报功能 -->
<?php
include './conn.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>留言板</title>
		<style>
			body form p #two{display: inline-block; vertical-align: top;}
			form.commentform {display: none;}
			p span {display: block; font: 12px/20px arial; margin: 4px 24px; border: 1px solid #ddd;}
		</style>
	</head>
	<body>
		<!-- 添加留言表单 -->
		<form action="new_save.php" method="post">
			<p><em>用户名：</em><input type="text" name="username" style="border:1px solid black" /></p>
			<p><em id="two">留&nbsp;&nbsp;&nbsp;言：</em><textarea cols="50px" rows="10px" name="content" style="border:1px solid black" /></textarea></p>
			<p><input type="submit" value="马上留言" /></p>
		</form>
		
		<!-- 输出留言信息 -->
		<?php
			//页码信息（页数、每页记录数、当前页）
			$pagesize = 3;
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$page_count = ceil(mysqli_num_rows(mysqli_query($conn, 'select * from guestbook')) / $pagesize);
			
			$start = ($page-1) * $pagesize;
			$sql = "select * from guestbook order by istop desc, id desc limit $start, $pagesize";

			$rs = mysqli_query($conn, $sql);
			if(!empty($rs)) {
				while ($row=mysqli_fetch_assoc($rs)) {
					$istop = $row['istop'] ? 'canceltop' : 'istop';
		?>
		<p>
			<?php echo $row['id'];?># <?php echo $row['username'];?> 于 <?php echo $row['intime'];?> 说：<br/><?php echo $row['content'];?>
			<a href="edit.php?id=<?php echo $row['id'];?>">修改</a>
			<a href="delete.php?id=<?php echo $row['id'];?>">删除</a>
			<a href="action.php?act=<?php echo $istop;?>&id=<?php echo $row['id'];?>"><?php echo $row['istop'] ? '取消置顶' : '置顶';?></a>
			<a href="action.php?act=praise&id=<?php echo $row['id'];?>">赞(<?php echo $row['praise'];?>)</a>
			<a href="javascript:show(<?php echo $row['id'];?>)">回复</a>
			
<!-- 			回复信息显示 -->
			<?php
				$id2 = $row['id'];
				$sql2 = "select * from comment where book_id=$id2";
				$rs2 = mysqli_query($conn, $sql2);
				while ($row2=mysqli_fetch_assoc($rs2)) {
			?>
			<span><?php echo $row2['username'];?> 在<?php echo $row2['intime']?> 回复：<?php echo $row2['content']?></span>
			<?php };?>
			
<!-- 			回复表单 -->
			<form method="post" class="commentform" id="comment<?php echo $row['id'];?>" action="action.php?act=savecomment&id=<?php echo $row['id'];?>">
				用户名：<input type="text" name="username"/> 回复：<input type="text" name="content" /><input type="submit" value="提交" />
			</form>
		</p>
		<?php
				}
			}
			for($i=1; $i<=$page_count; $i++) {
		?>
		<a href="index.php?page=<?php echo $i;?>"><?php echo $i;?></a>
		<?php
			}			
			mysqli_close($conn);
		?>
		
<!-- 		回复输入框显示和隐藏 -->
		<script>
			function show(id) {
				var obj = document.getElementById('comment'+id);
				if (obj.style.display=='' || obj.style.display=='none') {
					obj.style.display = 'block';
				} else {
					obj.style.display = 'none';
				}
				
			}
		</script>
	</body>
</html>