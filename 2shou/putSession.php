<?PHP
  ob_start();
  session_start();
  //取输入的用户名和密码
  $UID=$_POST["loginname"];
  $PSWD=$_POST["password"];

  // 把用户名和密码放入session
  $_SESSION["user_id"]=$UID;
  $_SESSION["user_pwd"]=$PSWD;
  header("Location: index.php");
?>