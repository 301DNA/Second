<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<title>ɾ��������Ϣ</title>
</head>
<body>
<?PHP
  //ֻ�й���Ա��ǿ��ɾ�������Ȩ��
  include('..\class\Goods.php');
  $gid=$_GET["gid"];
  $obj = new Goods();
  $obj->delete($gid);
  echo "<script>alert('��Ʒ��Ϣ�ɹ�ɾ����');</script>";
?>
</body>
<script language="javascript">
  // ˢ�¸������ڣ��ӳٴ˹ر�
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>