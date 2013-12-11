<?PHP
ob_start();
?>
<?PHP
  session_start();
  // 取输入的用户名和密码以及用户类别
  $UID=$_POST["loginname"];
  $PSWD=$_POST["password"];
  include('..\Class\Users.php');
  $objUser = new Users();
  $objUser->UserId=$UID;
  $objUser->UserPwd=$PSWD;
  // 判断用户名密码是否正确
  if($objUser->CheckUser())
  {
    // 把用户名和密码放入Session
    $objUser->GetUsersInfo($UID);
    $_SESSION["UserName"]=$UID;
    $_SESSION["UserPwd"]=$PSWD;
    $_SESSION["UserType"]=$objUser->UserType;
    header("Location: "."index.php");
  }
  else
  {
    header("Location: "."login.php");
  } 
?>