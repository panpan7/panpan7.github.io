<html>
<head><title>文件上传前台</title>
</head>

<body>         <!--可以考虑用表格的形式来改变样式-->
<center>
	<h1>文件上传前台</h1>
<form action="houtai.php" method="post" ENCTYPE="multipart/form-data">       <!--ENCTYPE="multipart/form-data这句话必须要有,否则会上传不成功-->
	选择上传文件：<input type="file" name="up_file">                   <!--file表单元素-->
	<input type="submit" value="提交">
</form>
</center>
</body>