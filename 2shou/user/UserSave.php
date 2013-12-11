<html>
<head>
<title>保存用户信息</title>
</head>
<body>
<?PHP  
  include('..\Class\Users.php');
  $objUser = new Users(); //创建User对象，用于访问个人信息表
  $uid=$_POST["userid"]; // 用户账号
  $objUser->UserId=$uid; // 用户账号
  $objUser->UserPwd=$_POST["pwd"]; // 用户密码
  $objUser->Name=$_POST["username"]; // 用户姓名
  $objUser->Sex=intval($_POST["sex"]); // 用户性别 
  $objUser->Address=$_POST["address"]; // 居住公寓
  $objUser->Phone=$_POST["phone"]; // 手机号码
  
  if ($_POST["isadd"]=="new")
  {
    //判断此用户是否存在
    if($objUser->HaveUsers($uid))
    {
?>
			<script language="javascript">
				alert("已经存在此用户名！");
				history.go(-1);
			</script>
<?PHP 
    }
    else
    {
      $objUser->UserType=0; // 用户类型
      $objUser->insert();
    } 
  }
  else
  {
    //更新用户信息
    $objUser->update($objUser->UserId);
  } 
  echo "<script>alert('用户信息已成功保存！');</script>";
?>
</body>
<script language="javascript">
	opener.location.reload();
	setTimeout("window.close()",800);
</script>
</html>