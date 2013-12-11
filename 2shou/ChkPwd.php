<?PHP 
  ob_start();
  session_start();
  //如果尚未定义Passed对象，则将其定义为False，表示没有通过身份认证
  if(empty($_SESSION["Passed"])
  {
    $_SESSION["Passed"]=false;
  } 
  //如果UserName是空，则转向login.htm
  if($_SESSION["Passed"]==false)
  {
    //读取从表单传递过来的身份数据
    $UserName=$_POST["UserName"];
    $UserPwd=$_POST["UserPwd"];
    if($UserName=="")
    {
      $Errmsg="请输入用户名和密码";
    }
    else
    {
      //============从表Users中读取用户数据==============
$ActiveConnection    echo $Conn;
//设置游标类型
    $rs.$CursorType=3;
//打开记录集
    $rs.$Open"SELECT * FROM Users WHERE UserName='".trim($UserName)."'";
//=============身份验证===========================
    if ($rs$EOF)
    {

      $Errmsg="用户不存在";
    }
      else
    {
      if ($UserPwd!=$rs$Fields["UserPwd"])
      {
        $Errmsg="密码不正确";
      }
        else
      {
//登录成功	      
        $Errmsg="";
        $Passed_session=true;
        $UserName_session=$rs.$Fields["UserName"];
        $UserPwd_session=$rs.$Fields["UserPwd"];
//	      Response.Write("登录成功，请进入<a href=index.asp>首页</a>")	      
      } 
    } 
  } 
} 


if (!$Passed_session)
{
?>
<html>
<head><title>请输入用户名和密码</TITLE><link rel="stylesheet" href="style.css">
</head>
<body>

<script Language="JavaScript">
function ChkFields() {
if (document.MyForm.UserName.value=='') {
window.alert ("请输入用户名！")
return false
}
return true
}
</script>

<p align="center"><font color="#0000FF" size="5" face="隶书">身 份 验 证</font></p> 

<p align="center"><font color="#800000">　<?PHP echo $Errmsg; ?></font></p>
<form method="POST" action="<?PHP echo ${"PATH_INFO"}; ?>" name="MyForm" onsubmit ="return ChkFields()">
  <p align="center">用户名： <input type="text" name="UserName" size="20"></p>
  <p align="center">密码：<input type="password" name="UserPwd" size="20"></p>
  <p align="center"><input type="submit" value="提交" name="B1">&nbsp;&nbsp;<input type="reset" value="全部重写" name="B2"></p>
</form>
<p align="center">　</p>
</body>
</html>
<?PHP 
  exit();
} 
?>