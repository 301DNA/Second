<?PHP
ob_start();
include('isAdmin.php'); 
?>
<html>
<head>
<title>�޸Ĺ���Ա����</title>
</head>
<body>
<?PHP 
  session_start();
  $OriPwd=$_POST["OriPwd"];
  $Pwd=$_POST["Pwd"];
  //�ж��Ƿ���ڴ��û�
  include('..\Class\Users.php');
  $obj = new Users();
  $obj->UserId=$_SESSION["UserName"];
  $obj->UserPwd=$OriPwd;
  if($obj->CheckUser()==false)
  {
    print("�����ڴ��û������������");
?>
	<Script Language="JavaScript">	
      setTimeout("history.go(-1)",1600);	  	  
  	</Script>
<?PHP 
  }
  else
  {
    $obj->UserPwd=$Pwd;
    $obj->setpwd($obj->UserId);
	echo "<script>alert('��������ɹ���');</script>";
    $_SESSION["UserPwd"]=trim($Pwd);
  } 
?>	
</body>
</html>