<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<title>ɾ���û���Ϣ</title>
</head>
<body>
<?PHP
  //ֻ�й���Ա��ǿ��ɾ����Ʒ��Ȩ��
  include('..\class\Users.php');
  $UserId=$_GET["userid"];
  $obj = new Users();
  $obj->delete($UserId);
  echo "<script>alert('�û���Ϣɾ���ɹ���');</script>";
?>
</body>
<script language="javascript">
  // ˢ�¸������ڣ��ӳٴ˹ر�
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>