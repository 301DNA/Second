<?PHP
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��ҳ</title>
</head>
<body>
<table border="1" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="#FF9933" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
      <tr>         
          <td width="100%" height="24" bgcolor="#63CFFF" align="center">
			<font color="#FF0000"><b>վ�ڹ���</b></font></td>  
      </tr>         
<?PHP  
  session_start();
  include('Class\Bulletin.php');
  $obj = new Bulletin();
  $results = $obj->GetBulletinlist();
  //��ʾ������Ϣ     
?>
        <tr>         
          <td width="100%" bgcolor="#E1F5FF" height="70" valign="top">      
<?PHP  
  $exist = false;
  //��ʱ����ʾ���µ�10��������Ϣ
  for ($i=1; $i<=10; $i++)
  {
	$exist = true;
    if($row = $results->fetch_row())
    {
      $title=$row[1];
      //��ʾ���ű����Լ���ҳ����
      if(strlen($title)>11)
      {
        $title=substr($title,0,11);
?><a href="BulletinView.php?id=<?PHP echo($row[0]); ?>" target=_blank><?PHP echo $title; ?>����</a>         
<?PHP      
	  }
      else
      {
?>            
         <a href="BulletinView.php?id=<?PHP echo($row[0]); ?>" target=_blank><?PHP echo($title); ?></a> 
 <?PHP      
      } 
?><br> 
<?PHP    
   }  
?>
         </td>         
        </tr>
<?PHP  }  
       if(!$exist)
       {
?>         
      <tr>         
          <td width="100%" height="70" bgcolor="#E1F5FF">����û�й��� </td>     
      </tr>             
<?PHP  }
  include('Class/Users.php');
  //��Session�����ж�ȡע���û���Ϣ�������ӵ����ݿ���֤
  $objUser = new Users();
  $UserId=trim($_SESSION["user_id"]);
  $Pwd=trim($_SESSION["user_pwd"]);
  //�������ݿ⣬����������֤
  $objUser->GetUsersInfo($UserId);
  $_SESSION["user_name"]=$objUser->Name;
  if($UserId!="" && $objUser->UserPwd==$Pwd)
  {
?>
       <tr>
       <td width="100%" bgcolor="#97DDFF" height="18" align="center">�û���Ϣ</td>
        </tr>
        <tr>
          <td width="100%" height="18" bgcolor="#E1F5FF">
            <table border="0" cellspacing="1" width="100%">
              <tr>
                <td width="100%" bgcolor="#E1F5FF">�û��˺�:<?PHP echo($objUser->UserId); ?><br>
				��ס��Ԣ��<?PHP echo($objUser->Address); ?><br>         
                <br>�ֻ����룺<?PHP echo($objUser->Phone); ?>
				</td>         
              </tr> 
              <tr>
                <td width="100%" align="center" bgcolor="#E1F5FF">
                <a href='user\UserView.php?uid=<?PHP echo($objUser->UserId); ?>' target="_blank">�ҵ���Ʒ</a>
				&nbsp;&nbsp;<a href="LoginExit.php" onclick="return newswin(this.href)">�˳���¼</a>
                </td>         
              </tr>     
            </table>         
          </td>         
        </tr> 
<?PHP  
  }
  else
{
?>
		<tr>
		  <td width="100%" bgcolor="#97DDFF" height="24" align="center"> <a href="Admin/Login.php"  target=_blank><b><font color="#000000">����Ա</font></b></a> </td>
        </tr>  
		<tr>
		  <td width="100%" bgcolor="#97DDFF" height="24" align="center"> <a href="index.php"  target=_blank>
		  <b><font color="#000000">�� ��</font></b></a> </td>
        </tr> 
        <tr>         
          <td width="100%" height="18" bgcolor="#E1F5FF">         
            <table border="0" cellspacing="1" height="58">         
              <tr>         
                <td width="100%" bgcolor="#E1F5FF" height="35">         
                  <form method="POST" action="putSession.php">         
                    �˺�:<input type="text" name="loginname" size="18" value="">         
                    <br>����:<input type="password" name="password" size="18" value="">                          
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="��&nbsp;&nbsp;¼" name="B1">
                    &nbsp;&nbsp;
                    <tr>
					  <td align="center"> <a href="user/UserAdd.php"  target=_blank><b>�û�ע��</b></a> </td>
					</tr>
                  </form>         
                </td>         
              </tr>         
            </table>         
          </td>         
        </tr>         
      <?PHP } ?>  
<?PHP
	/*if($UserId != "loginname")
	{
		echo "<script>alert('�˺���������');</script>";
	}*/
	if($objUser->UserPwd!=$Pwd)
	{ 
		echo "<script>alert('������������');</script>";
	}
?>
      </table>
<?php
include('Class\Goods.php');
?>
<table border="1" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="#FF9933" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
   <tr>
     <td bgcolor="#97DDFF" height="24" align="center">���ע��Ʒ TOP 
       10</td>
   </tr>
   <tr>
     <td bgcolor="#E1F5FF"><table border="0" width="100%" cellspacing="0"  bordercolorlight="#FF9933" bordercolordark="#FFFFFF">
         <tr>
           <td width="100%" height="37" bgcolor="#E1F5FF">
<?PHP  
  $objGoods = new Goods();
  //��ѯǰ10���������(ClickTimes)����\δ��������Ʒ��Ϣ
  $results = $objGoods->GetTopnMaxClick(10);
  $exist = false;
  //��������Ϊ��,����ʾ��ʾ��Ϣ

//������ʾ������е���Ʒ��Ϣ
  while($row = $results->fetch_row())
  {
    $exist = true;
?>
             <a href="GoodsView.php?gid=<?PHP echo($row[0]); ?>" target="_blank"><?PHP echo($row[3]); ?></a> (���<font color="red"><?PHP echo($row[12]); ?></font>��)<br />
<?PHP  
  }
?>
<?PHP  
  if (!$exist)
  {
    print "����û����Ʒ";
  }
?></td>
         </tr>
     </table></td>
   </tr>
      <tr>
        <td width="100%" bgcolor="#97DDFF" height="24" align="center">���»�Ծ���� TOP 10</td>
      </tr>
      <tr>
        <td width="100%" valign=top height="52" bgcolor="#E1F5FF">
          <table border="0" cellspacing="0" bordercolorlight="#FF9933" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
            <tr>
              <td width="100%" bgcolor="#E1F5FF">
<?PHP  
  //��ȡ������Ʒ�����û�
  $objUser = new Users();
  $results = $objUser->GetTopnActiveUser(10);
  $exist = false;
  //ʹ��ѭ�����,������ʾ������Ϣ
  while($row = $results->fetch_row())
  {
    $exist = true;
?>
     <a href="user\UserView.php?uid=<?PHP echo($row[0]); ?>" target=_blank><?PHP echo($row[1]); ?></a>(<font color=red><?PHP echo($row[2]); ?></font>��)<br>
<?PHP  
  } 
  //��������Ϊ��,����ʾ��ʾ��Ϣ
  if(!$exist)
  {
    print "����û���û���Ϣ";
  }
?>              </td>
            </tr>
          </table>        </td>
      </tr>
 </table>
	  </body>
</html>