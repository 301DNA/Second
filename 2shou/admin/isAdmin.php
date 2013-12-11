<?PHP
  ob_start();
  session_start();
  if ($_SESSION["UserType"]!=1)
  {
    header("Location: "."login.php");
  } 
?>