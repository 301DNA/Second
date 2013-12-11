<html>
<head>
<link href=style.css rel=STYLESHEET type=text/css>
<script language="javascript">
function newwin(url) 
{
  var oth="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=100";
  oth = oth+",width=600,height=500";
  var newwin = window.open(url,"newwin",oth);
  newwin.focus();
  return false;
}
</script>
</head>
<body background="image/background/2.jpg">
<center>
<table border="0" width="760" cellspacing="0" cellpadding="0">
 <tr><td height="80"><a href="images/title.jpg">
	<img src="images/title.jpg" border="0" width="800" height="100"></a></td></tr>
  <tr>
  <td bgcolor="#E1F5FF" height="19" valign="middle" align="left">
<?PHP 
  //读取参数, tid表示商品类型编号，flag表示转让或求购类型
  $tid=intval($_GET["tid"]);
  $flag=intval($_GET["flag"]);
  if($flag==0)
  {
?>
   <B>转让信息</B>&nbsp;&nbsp;<a href="list.php?flag=1&tid=<?PHP echo($tid); ?>">求购信息</a>
<?PHP 
  }
  else
 {
?>
   <a href="list.php?flag=0&tid=<?PHP echo($tid); ?>">转让信息</a>&nbsp;&nbsp;<B>求购信息</B>
<?PHP 
 } 
?>   
  </td>  
  </tr>
<tr><td width="16%" valign="top" align="left"  bgcolor="#E1F5FF">
<table border="1" width="100%" cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF"  bgcolor="#E1F5FF">
<tr>
<td valign="top" colspan=2 align="center">
<table border=1 width=100% cellspacing=0 bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">
<tr><td colspan=6 bgcolor="#FFFFFF">
	<p align="center"><font color=#3399FF><b>【商品信息 - 
<?PHP 
  include('Class\GoodsType.php');
  $objType = new GoodsType();
  $objType->GetGoodsTypeInfo($tid);
  echo($objType->TypeName);
?>】</b></font></td></tr>
<tr><td colspan=6 bgcolor="#FFFFFF">
<center><input type="button" value="我要转让" onclick="newwin('user/GoodsAdd.php?flag=0&tid=<?PHP echo($tid); ?>')" name=add>&nbsp;&nbsp;
<input type="button" value="我要求购" onclick="newwin('user/GoodsAdd.php?flag=1&tid=<?PHP echo($tid); ?>')" name=add></center></td></tr>

<tr>
<td align=center width="15%" bgcolor="#E1F5FF">商品图片</td>
<td align=center width="20%" bgcolor="#E1F5FF">商品名称</td>
<td align=center width="15%" bgcolor="#E1F5FF">价格</td>
<td align=center width="12%" bgcolor="#E1F5FF">新旧程度</td>
<td align=center width="12%" bgcolor="#E1F5FF">卖家</td>
<td align=center width="26%" bgcolor="#E1F5FF">发布时间</td>
</tr>
<?PHP  
  //设置转让或求购的查询条件
  if($flag==0)
  {
    $cond=" WHERE SaleOrBuy=1";
  }
  else
  {
    $cond=" WHERE SaleOrBuy=2";
  } 

  //设置商品分类查询条件
  if ($tid>0)
  {
    $cond=$cond." AND TypeId=".$tid;
  } 
  // 只查看未结束的商品
  $cond=$cond." AND IsOver=0";
  //创建Goods对象，读取满足条件的记录
  include('Class\Goods.php');
  $obj = new Goods();
  $results = $obj->GetGoodslist($cond);
  $m=0;
  while($row = $results->fetch_row())
  {
?>
  <tr><td align=center bgcolor="#FFFFFF">
<?PHP 
  if ($row[5]=="")
  {
?>
	<img src="images/noImg.jpg" height=50 border=0>
<?PHP    
  }
    else
  {
?>
	<img src="user/images/<?PHP echo($row[5]); ?>" height=50 border=0>
<?PHP    
  } 
?>
  </td>
  <td align=center bgcolor="#FFFFFF"><a href="GoodsView.php?gid=<?PHP echo($row[0]); ?>" target=_blank><?PHP    echo($row[3]); ?></a></td>
  <td align=center bgcolor="#FFFFFF"><?PHP echo($row[6]); ?></td>
  <td align=center bgcolor="#FFFFFF"><?PHP echo($row[8]); ?>&nbsp;</td>
  <td align=center bgcolor="#FFFFFF"><a href="user/UserView.php?uid=<?PHP echo($row[11]); ?>" target=_blank><?PHP    echo($row[11]); ?></a></td>
  <td bgcolor="#FFFFFF" align="center"><?PHP echo($row[7]); ?></td>
  </tr>  
<?PHP    
	$m=$m+1;
  } 
  if ($m==0)
  {
    print "<tr><td bgcolor=#FFFFFF align=center colspan=6>暂无商品信息</td></tr>";
  }  
?>
</table>
</td>
</tr>
</table>
</body>
</html>