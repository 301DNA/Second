<html>
<head>
<title>文件上传</title>
</head>
<body>
<?PHP  
	//'将当前的日期和时间转为文件名
	function makefilename() {
		// 获取当前系统时间，生成文件名
		$curtime = getdate();
		$filename =$curtime['year'] . $curtime['mon'] . $curtime['mday'] . $curtime['hours'] . $curtime['minutes'] . $curtime['seconds'] . ".jpeg";

		Return $filename;
	}


	// 检查上传文件的目录
	$upload_dir = getcwd() . "\\images\\";
	// 如果目录不存在，则创建
	if(!is_dir($upload_dir))
		mkdir($upload_dir);
	$newfilename = makefilename();
	$newfile = $upload_dir . $newfilename;
	if(file_exists($_FILES['file1']['tmp_name'])) {
		move_uploaded_file($_FILES['file1']['tmp_name'], $newfile);
	}
	else {
		echo("error");
	}

	//将文件信息传入内容字段*/
	echo("<SCRIPT>parent.document.form1.goodsimage.value='".$newfilename."'</SCRIPT>");
	echo("<font style='font-family: 宋体; font-size: 9pt'>图片上传成功 [ <a href=# onclick=history.go(-1)>修改图片</a> ]</font>");
?>
</body>
</html>