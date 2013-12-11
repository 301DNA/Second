<html>
<head>
<link rel="stylesheet" href="../style.css">
<title>修改用户注册</title>
</head>
<script Language="JavaScript">
function ChkFields() {
	if (document.myform.username.value=='') {		
		window.alert ("请输入用户姓名！")
		myform.username.focus()
		return false
	}
}
</script>
<body>
<?PHP  
  $uid=$_GET["uid"];
  $new.$Person;
  $obj.$GetPersonInfo[$uid];
if ($obj.$UserId=="")
{
  print "<h2>不存在此用户名！</h2>";
}
  else
{
?>
<form method="POST" action="UserSave.asp?uid=<?PHP echo $uid; ?>" name="myform" onSubmit="return ChkFields()">
<p align="center">修改个人信息</p>
<input type="hidden" name="isadd" value="edit">
 <table align="center" border="1" cellpadding="1" cellspacing="1" width="100%" bordercolor="#008000" bordercolordark="#FFFFFF">
      <tr>
        <td align=left bordercolor="#D4D0C8" bgcolor="#FFCCFF">用户账号</td>
		<td><?PHP echo $obj.$UserId; ?></td>
	  </tr>
	  <tr>
		<td align=left bordercolor="#D4D0C8" bgcolor="#FFCCFF">用户姓名</td>
		<td><input type="text" name="username" size="20" value="<?PHP echo $obj.$Name; ?>"></td>
      </tr>
      <tr>
	    <td align=left bordercolor="#D4D0C8" bgcolor="#FFCCFF">用户性别</td>
        <td><select name="sex">
<?PHP    
  if ($obj.$Sex==1)
  {
?>
        <option value="0">男</option>
        <option value="1" selected>女</option>
<?PHP    
  }
    else
  {
?>
        <option value="0" selected>男</option>
        <option value="1">女</option>
<?PHP    
  } 
?>
        </select></td>
      </tr>
	  <tr>
	    <td align=left bordercolor="#D4D0C8" bgcolor="#FFCCFF">居住公寓</td>
        <td>
        <input type="text" name="address" size="40" value="<?PHP echo $obj.$Address; ?>"></td>
      </tr>      
	   
	  <tr>
	    <td align=left bordercolor="#D4D0C8" bgcolor="#FFCCFF">手机号码</td>
        <td><input type="text" name="mobile" size="40" value="<?PHP echo $obj.$Phone; ?>"></td>
      </tr>
	    
  </table> 
<p align="center"><input type="submit" value=" 提 交 " name="B2"></p>
<?PHP  
  } 
?>
</form>  
</body>
</html>