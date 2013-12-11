<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<title>删除旧物信息</title>
</head>
<body>
<?PHP
  //只有管理员有强制删除旧物的权限
  include('..\class\Goods.php');
  $gid=$_GET["gid"];
  $obj = new Goods();
  $obj->delete($gid);
  echo "<script>alert('商品信息成功删除！');</script>";
?>
</body>
<script language="javascript">
  // 刷新父级窗口，延迟此关闭
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>