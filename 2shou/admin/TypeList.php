<?PHP 
include('isAdmin.php'); 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<title>分类管理</title>
<link rel="stylesheet" href="../style.css">
<script language="javascript">
function form_onsubmit(obj) 
{   
  ValidationPassed = true;  
  if(obj.ClsId.selectedIndex <0) {
    alert("请选择一级分类");
    ValidationPassed = false;
    return ValidationPassed;
  }    
  if(obj.txttitle.value == "") {
    alert("请输入分类名称");
    ValidationPassed = false;
    return ValidationPassed;
  }    
}
function form_onsubmit1(obj) 
{   
  ValidationPassed = true;  
  if(obj.txttitle.value == "") {
    alert("请输入分类名称");
    ValidationPassed = false;
    return ValidationPassed;
  }    
}
</script>
</head>
<body background = image/background/2.jpg link="#000080" vlink="#080080">
<form id="form1" name="form1" method="POST">
<?PHP 
  include('..\Class\GoodsType.php');
  include('..\Class\Goods.php');
  $objType = new GoodsType();
  $objGoods = new Goods();
  //处理添加、修改和删除操作
  $Soperate=$_GET["Oper"];
  $Operid=$_GET["tid"];
  //删除
  if($Soperate=="delete")
  {
    //判断商品表中是否存在此分类
    if ($objGoods->HaveGoodsType($Operid))
    {
	  echo "<script>alert('该分类包含商品信息，不能删除！');</script>";
    } 

    $objType->delete($Operid);
    echo "<script>alert('分类删除成功！');</script>";
  }
  else if($Soperate=="add")   //添加
  {
    $Name=$_POST["txttitle"];
    //判断是否已经存在此分类名称
    if($objType->HaveGoodsType($Name))
    {
      echo "<script>alert('该分类名称已经存在！');</script>";
    }
    else
    {
      $objType->TypeName=$Name;
      $objType->insert();
    } 

  }
  else if($Soperate=="edit")
  {
    $Name=$_POST["txttitle"];
    //判断是否已经存在此分类名称
    if ($objType->HaveGoodsType($Name))
    {
      echo "<script>alert('该分类名称已经存在！');</script>";
    }
    else
    {
      $objType->TypeName=$Name;
      $objType->update($Operid);
    } 
  } 
?>
<p align='center'><font style="FONT-SIZE: 12pt"><b>商 品 分 类 管 理</b></font></p>
<center>
<table border="1" cellspacing="0" width="90%"   bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
  <tr>
    <td width="30%" align="center" bgcolor="#eeeeee"><strong>分类名称</strong></td>
    <td width="20%" align="center" bgcolor="#eeeeee"><strong>修 改</strong></td>
    <td width="20%" align="center" bgcolor="#eeeeee"><strong>删 除</strong></td>
  </tr>
<?PHP 
  //读取分类数据
  $results = $objType->GetGoodsTypelist();
  $exist = false;
  //在表格中显示分类名称
  while($row = $results->fetch_row())
  {
	  $exist = true;
?>
  <tr>
    <td><?PHP echo($row[1]); ?></td>
    <td align="center"><a href="TypeList.php?Oper=update&tid=<?PHP echo($row[0]); ?>&name=<?PHP echo($row[1]); ?>">修 改</a></td>
    <td align="center"><a href="TypeList.php?Oper=delete&tid=<?PHP  echo($row[0]); ?>&name=<?PHP  echo($row[1]); ?>">删 除</a></td>
  </tr>
<?PHP  
  } 
?>
</table>
		<p align="center">	
<?PHP  
  if(!$exist)  //如果记录集为空，则显示“目前还没有记录”
  {
    echo("<tr><td colspan=4 align=center><font style='COLOR:Red'>目前还没有记录。</font></td></tr></table>");
  }
?>
</form>
<?PHP  
  //如果当前状态为修改，则显示修改的表单，否则显示添加的表单
  if($Soperate=="update")
  {
    $sTitle=$_GET["name"];
?>
    <form name="UFrom" method="post" action="TypeList.php?tid=<?PHP  echo($Operid); ?>&Oper=edit">
	  <div align="center">
		<input type="hidden" name="sOrgTitle" value="<?PHP    echo($sTitle); ?>">
		<font color="#FFFFFF"><b><font color="#000000">分类名称</font></b></font> 
		<input type="text" name="txttitle" size="20" value="<?PHP    echo($sTitle); ?>">
		<input type="submit" name="Submit" value=" 修 改 ">
		</div>
	</form>
<?PHP  }
  else
  {
?>
<form name="AForm" method="post" action="TypeList.php?Oper=add">
  <p align="center">
	<font color="#FFFFFF"><b><font color="#000000">添加分类：</font></b></font> 
	&nbsp;&nbsp;分类名称：&nbsp;&nbsp;<input type="text" name="txttitle" size="20">
	<input type="hidden" name="sUpperId" value="0">&nbsp;&nbsp;
	<input type="submit" name="Submit" value=" 添 加 " onclick="return form_onsubmit1(this.form)">
  </p>
</form>
<?PHP  
  } 
?>
</body>
</html>