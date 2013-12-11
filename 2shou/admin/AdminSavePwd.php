<?PHP
ob_start();
include('isAdmin.php'); 
?>
<html>
<head>
<title>修改管理员密码</title>
</head>
<body>
<?PHP 
  session_start();
  $OriPwd=$_POST["OriPwd"];
  $Pwd=$_POST["Pwd"];
  //判断是否存在此用户
  include('..\Class\Users.php');
  $obj = new Users();
  $obj->UserId=$_SESSION["UserName"];
  $obj->UserPwd=$OriPwd;
  if($obj->CheckUser()==false)
  {
    print("不存在此用户名或密码错误！");
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
	echo "<script>alert('更改密码成功！');</script>";
    $_SESSION["UserPwd"]=trim($Pwd);
  } 
?>	
</body>
</html>