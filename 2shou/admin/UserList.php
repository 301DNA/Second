<?PHP 
include('isAdmin.php');
?>
<html>
<head>
<title>系统用户管理</title>
<link href="../style.css" rel="stylesheet">
<script language="JavaScript">
function newwin(url) {
  var newwin=window.open(url,"newwin","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=400,height=380");
  newwin.focus();
  return false;
}
</script>
</head>
<body link="#000080" vlink="#008080">
<h3 align="center">用户列表</h3>
<table width='90%' align=center cellspacing=0 cellpadding=0 border=1 bordercolor="#808080" bordercolordark="#FFFFFF" bordercolorlight="#4DA6FF">
<tr>
<td align="center" width='10%' bgcolor="#eeeeee"><b>用户名</b></td>
<td align="center" width='16%' bgcolor="#eeeeee"><b>真实姓名</b></td>
<td align="center" width='16%' bgcolor="#eeeeee"><b>地址</b></td>
<td align="center" width='20%' bgcolor="#eeeeee"><b>手机号码</b></td>
<td align="center" width='22%' bgcolor="#eeeeee"><b>操 作</b></td>
</tr>
<?PHP
  include('..\Class\Users.php');
  $obj = new Users();
  $results = $obj->GetUserslist();
  $rCount=0;
  //循环显示所有的用户数据，同时画出表格
  while($row = $results->fetch_row())
  {
    $rCount++;
?>
<tr>
<td align=center><?PHP echo($row[0]);  /*用户账号*/ ?></td>
<td align=center><?PHP echo($row[2]); /*用户姓名*/?></td>
<td align=center><?PHP echo($row[4]); /*居住公寓*/?>&nbsp;</td> 
<td align=center><?PHP echo($row[5]); /*手机号码*/?>&nbsp;</td>
<td align="center">
<?PHP    
  if($row[0]!="Admin")
  {
?>
<a href=UserDelt.php?userid=<?PHP echo($row[0]); ?>  onClick="if(confirm('确定删除此用户?')){return newwin(this.href);}return false;">删除</a>
<?PHP    
  } 
?>&nbsp;
</td>
</tr>

<?PHP  
  } 
  if($rCount==0)
  {
    print("<tr align='center'><td colspan=6><font color=red>目前还没有用户记录</font></td></tr>");
  }
  else
  {
    print "<tr align='center'><td colspan=6><font color=red>当前共有".trim($rCount)."条用户记录</font></td></tr>";
  } 
?>
</table>
</body>
</html>