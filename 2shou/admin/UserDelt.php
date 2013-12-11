<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<title>删除用户信息</title>
</head>
<body>
<?PHP
  //只有管理员有强制删除商品的权限
  include('..\class\Users.php');
  $UserId=$_GET["userid"];
  $obj = new Users();
  $obj->delete($UserId);
  echo "<script>alert('用户信息删除成功！');</script>";
?>
</body>
<script language="javascript">
  // 刷新父级窗口，延迟此关闭
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>