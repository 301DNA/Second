<html>
<head>
<title>�����û���Ϣ</title>
</head>
<body>
<?PHP  
  include('..\Class\Users.php');
  $objUser = new Users(); //����User�������ڷ��ʸ�����Ϣ��
  $uid=$_POST["userid"]; // �û��˺�
  $objUser->UserId=$uid; // �û��˺�
  $objUser->UserPwd=$_POST["pwd"]; // �û�����
  $objUser->Name=$_POST["username"]; // �û�����
  $objUser->Sex=intval($_POST["sex"]); // �û��Ա� 
  $objUser->Address=$_POST["address"]; // ��ס��Ԣ
  $objUser->Phone=$_POST["phone"]; // �ֻ�����
  
  if ($_POST["isadd"]=="new")
  {
    //�жϴ��û��Ƿ����
    if($objUser->HaveUsers($uid))
    {
?>
			<script language="javascript">
				alert("�Ѿ����ڴ��û�����");
				history.go(-1);
			</script>
<?PHP 
    }
    else
    {
      $objUser->UserType=0; // �û�����
      $objUser->insert();
    } 
  }
  else
  {
    //�����û���Ϣ
    $objUser->update($objUser->UserId);
  } 
  echo "<script>alert('�û���Ϣ�ѳɹ����棡');</script>";
?>
</body>
<script language="javascript">
	opener.location.reload();
	setTimeout("window.close()",800);
</script>
</html>