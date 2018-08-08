<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><!--{webname}--></title>
	</head>
	<body>
	
		{include file="test.php"}
	
		我将被index.php导入。
		
		{$name}必须经过Parser.class.php解析类解析。<br/>
		
		{if $a}
			<div>我是1号界面</div>
		{else}
			<div>我是2号界面</div>
		{/if}
		
		{#}我是php的注释，在静态文件中看不到，在编译文件中才能看到。{#}<br/>
		
		{foreach $array(key,value)}
			{@key}...{@value}<br/>
		{/foreach}
		
	</body>
</html>