<html>
<head>
<link rel="stylesheet" href="../style.css">
<title>用户注册</title>
</head>
<script Language="JavaScript">
function ChkFields() {
	if (document.myform.userid.value=='') {
		window.alert ("请输入用户名！")
		myform.userid.focus()
		return false
	}
	if (document.myform.userid.value.length<=2) {
		window.alert ("请用户名长度必须大于2！")
		myform.userid.focus()
		return false
	}
	if (document.myform.username.value=='') {		
		window.alert ("请输入用户姓名！")
		myform.username.focus()
		return false
	}
	if (document.myform.pwd.value.length<6) {		
		window.alert ("密码长度要求大于等于6！")
		myform.pwd.focus()
		return false
	}
	if (document.myform.pwd.value=='') {		
		window.alert ("请输入新密码！")
		myform.pwd.focus()
		return false
	}
	if (document.myform.pwd1.value=='') {		
		window.alert ("请确认新密码！")
		myform.pwd1.focus()
		return false
	}
	if (document.myform.pwd.value!=document.myform.pwd1.value) {		
		window.alert ("两次输入的密码必须相同！")
		return false
	}
	return true
}
</script>
<body>
<form method="POST" action="UserSave.php" name="myform" onSubmit="return ChkFields()">
<h3></h3>
<p align="center">用户信息注册</p>
<input type="hidden" name="isadd" value="new">
 <table align="center" border="1" cellpadding="1" cellspacing="1" width="100%" bordercolor="#008000" bordercolordark="#FFFFFF">
      <tr>
        <td width="18%" align=left bgcolor="#CCFFCC">用户ID</td>
		<td width="82%"><input type="text" name="userid" size="20"></td>
	  </tr>
	  <tr>
		<td align=left bgcolor="#CCFFCC">用户姓名</td>
		<td><input type="text" name="username" size="20"></td>
      </tr>
	  	  <tr>
	    <td align=left bgcolor="#CCFFCC">用户密码</td>
        <td><input type="password" name="pwd" size="20"></td>
      </tr>
	  <tr>
	    <td align=left bgcolor="#CCFFCC">确认密码</td>
        <td><input type="password" name="pwd1" size="20"></td>
      </tr>
      <tr>
	    <td align=left bgcolor="#CCFFCC">用户性别</td>
        <td><select name="sex">
        <option value="0">男</option>
        <option value="1">女</option>
        </select></td>
      </tr>
      <tr>
        <td align=left bgcolor="#CCFFCC">居住公寓</td>
        <td><input type="text" name="address" size="40"></td>
      </tr>
      <tr>
        <td align=left bgcolor="#CCFFCC">手机号码</td>
        <td><input type="text" name="phone" size="40"></td>
      </tr>
  </table> 
<p align="center"><input type="submit" value=" 提 交 " name="B2"></p>
</form>  
</body>
</html>