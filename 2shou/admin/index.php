<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=gb2312">
<title>旧物交易系统后台管理</title>
<style type = "text/css">
	body {
		background:url(image/background/2.jpg);
	}
</style>
</head>

<frameset framespacing="1" border="1" bordercolor= #333399  frameborder="yes">
	<frameset cols="150,*">
		<frame name="contents" target="main" src="left.php" scrolling="auto" frameborder=0>
		<frame name="main" src="BulletinList.php" scrolling="auto" noresize frameborder=0>
	</frameset>
	<noframes>
	<body>

	<p>此网页使用了框架，但您的浏览器不支持框架。</p>

	</body>
	</noframes>
</frameset>
</html>