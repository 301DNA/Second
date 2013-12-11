<?php
ob_start();
//include('isUser.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title> 搜索结果 </title>
<style type = "text/css">
	body {
		background:url(image/background/4.jpg);
	}
</style>
<link href=../style.css rel=STYLESHEET type=text/css>
</head>
<body>
<center>
<?php
session_start();
?>
<tr><td width="50%" bgcolor="#63CFFF" height="18">搜索结果</td></tr>
<table border="1" width="100%"  cellspacing="1" bordercolorlight="#63CFFF" bordercolordark="#FFFFFF">
<?PHP  
include('Class/Goods.php');
$searchs = $_POST['search'];
$obj = new Goods();
$results = $obj->GetGoodslist('searchs');
$results = $obj->GetGoodslist(" WHERE GoodsName like '%" . $searchs . "%'");
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
    <br>所有者：<?PHP echo($row[15]); ?>
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
} 
?>
 
</table>
</body>
</html>