<?PHP
  ob_start();
  include('isUser.php');
  session_start();
  if (!$_SESSION["Passed"])
  {
    header("Location: ../index.php");
  } 
  $UserId=$_GET["uid"];
?>
<html>
<head>
<title>用户管理</title>
</head>
<body>
<?PHP 
  $OriPwd=$_POST["OriPwd"];
  $Pwd=$_POST["Pwd"];
  //设置SQL语句，判断是否存在此用户
  include('..\Class\Users.php');
  $objUser = new Users();
  $objUser->UserId = $UserId;
  $objUser->UserPwd = $OriPwd;
  if(!$objUser->CheckUser())
  {
    print "不存在此用户名或密码错误！";
?>
	<Script Language="JavaScript">	
      setTimeout("history.go(-1)",1600);	  	  
  	</Script>
<?PHP  
  }
  else
  {
     $objUser->UserPwd = $Pwd;
	 $objUser->setpwd($UserId);
     echo "<script>alert('密码修改成功！');</script>";
     $_SESSION["user_pwd"]=trim($Pwd);
?>
    <Script Language="JavaScript">
      setTimeout("window.close()",1600);	
    </Script>
<?PHP  
} 
?>	
</body>
</html>