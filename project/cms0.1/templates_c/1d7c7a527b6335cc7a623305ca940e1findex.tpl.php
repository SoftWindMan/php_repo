<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $this->_config["webname"];?></title>
	</head>
	<body>
	
		<?php include "test.php";?>
	
		我将被index.php导入。
		
		<?php echo $this->_vars['name'];?>必须经过Parser.class.php解析类解析。<br/>
		
		<?php  if($this->_vars["a"]) {?>
			<div>我是1号界面</div>
		<?php } else {?>
			<div>我是2号界面</div>
		<?php }?>
		
		<?php /* 我是php的注释，在静态文件中看不到，在编译文件中才能看到。 */?><br/>
		
		<?php foreach ($this->_vars["array"] as $key=>$value) {?>
			<?php echo $key?>...<?php echo $value?><br/>
		<?php }?>
		
	</body>
</html>