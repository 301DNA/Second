<?PHP 
ob_start(); 
?>
<html>
<head>
<?PHP 
session_start(); 
?>
<link href=style.css rel=STYLESHEET type=text/css>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><title>旧物交易系统</title>
<style type = "text/css">
	body {
		background:url(image/background/3.jpg);
	}
</style>
</head>

<body>
<center>
<table border="0" width="760" cellspacing="0" cellpadding="0">
 <tr><td colspan="3" height="80"><img src="images/title.jpg" width="800" height="100" border="0"></td>
 </tr>
  <tr>
  <td colspan="2" bgcolor="#E1F5FF" height="19" valign="middle" align="left">
 
<?PHP
  //从表GoodsType中读取商品类别数据
  include('Class/GoodsType.php');
  $gtype = new GoodsType();
  $results = $gtype->GetGoodsTypelist();
  //使用循环语句,依次显示分类信息
?>
<b><font face="楷体" size="2" color="#000000">商品分类</font></b>
<?PHP
  while($row = $results->fetch_row())
  {  
?>
      <font color="#FF9933"> </font>&nbsp;<a href="List.php?tid=<?PHP echo($row[0]); ?>" target="_blank"><?PHP  echo($row[1]); ?></a>&nbsp;
<?PHP 
  } 
?>
  </td>  
  <td bgcolor="#E1F5FF" height="19" valign="middle" align="right">
  </td></tr>
<tr><td width="25%" valign="top" align="left"><?PHP include("left.php"); ?></td>
<td width="75%" valign="top" align="center">
<table border="1" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF">

<form method="post" action="search.php" name="search" target="_blank">
<input name="search" type="text" value="" size="20">
<input type="submit" value="Search">
</form>

<tr><td width="50%" bgcolor="#63CFFF" height="18">最新加入商品</td></tr>
<tr><td width="100%" valign="top" align="left" height="1">
<table border="1" width="100%"  cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF">
<tr>
<?PHP  
//  include('Class\Goods.php');
  $objGoods = new Goods();
  $results = $objGoods->GetTopnNewGoods(9);
  //如果没有找到商品，则显示提示信息
  $i=0;
  //否则使用循环语句，依次显示商品信息
  while($row = $results->fetch_row())
  {
?>        
    <td valign="top" width="33.33%" align="left" bgcolor="#FFFFFF">
    <p align="center">
<?PHP  
//显示商品图片
  if (!isset($row[5]) || trim($row[5])=="")
  {
?>
      <img border="0" src="images/noImg.jpg" height="110">
<?PHP 
  }
  else
  {
?>
      <a href="GoodsView.php?gid=<?PHP echo($row[0]); ?>" target=_blank>
      <img border="0" src="user/images/<?PHP echo($row[5]); ?>" width="100" height="110"></a>
<?PHP 
  } 
?>
</center>
    <br>商品名称：<a href="GoodsView.PHP?gid=<?PHP echo($row[0]); ?>" target=_blank><?PHP echo($row[3]); ?></a>
	<br>交易类型：
<?PHP 
	if($row[2]==1)
  {
?>
       转让
<?PHP    
	}
    else
    {
?>
	   求购
<?PHP   
	} 
?>
    <br>所有者：<?PHP echo($row[11]); ?>
    <br>价格：<?PHP echo($row[6]); ?>元
    <br>发布时间：<?PHP echo($row[7]); ?>
</td>
<center>
<?PHP  
  if ($i%3==2)
  {
?>
	  </tr><tr>
<?PHP 
  } 
  $i++;
} 
  if ($i==0)
  {
?>
   <td width="100%" valign="top" align="left" bgcolor="#FFFFFF">暂且没有商品</td>
<?PHP  
} 
?>
</tr></table></center></table></td>    
  </tr>
</table>
</body>
</html>