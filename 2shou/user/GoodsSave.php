<?PHP
ob_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?PHP 
  include('isUser.php'); 
  session_start();
?>
<html>
<head>
<title>������Ʒ��Ϣ</title>
</head>
<body>
<?PHP  
  //�õ��������������Ϊadd���ʾ��Ӳ��������Ϊedit���ʾ���Ĳ���
  $StrAction=$_GET["action"];
  // ����Goods���󣬱�����Ʒ����
  include('..\Class\Goods.php');
  $obj = new Goods();
  $obj->GoodsName=$_POST["aname"];
  $obj->TypeId=$_POST["typeid"];
  $obj->SaleOrBuy=intval($_GET["flag"])+1;
  $obj->GoodsDetail=$_POST["adetail"];
  $obj->Price=$_POST["sprice"];
  $obj->StartTime=$_POST["stime"];
  $obj->OldNew=$_POST["oldnew"];
  $obj->Phone=$_POST["phone"];
  $obj->OwnerId=$_SESSION["user_id"];
  if ($StrAction=="edit")
  {
    $gid=$_GET["gid"];
    $obj->update($gid);
  }
  else
  {
    $obj->ImageUrl=$_POST["goodsimage"];
    $obj->insert();
  } 
  echo "<script>alert('��Ʒ��Ϣ����ɹ���');</script>";
?>
</body>
<script language="javascript">
  // ˢ�¸������ڣ��ӳٴ˹ر�
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>