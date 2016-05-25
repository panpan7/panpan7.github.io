<?php
var_dump($_FILES);
if($_FILES["up_file"]["name"]==""){
	echo "没有上传任何的文件";
	echo "<a href=qiantai.html>点击返回</a>";
}else{
	//定义文件上传路径为当前目录下的upload目录
	$filepath="upload/";   //上传文件在服务器上面保存的目录
	//重新定义文件路径和文件名
	$name=$filepath.$_FILES["up_file"]["name"];
	//如果存在同名文件则执行循环，知道文件不再重名
	while(file_exists($name))    //file_exists($name)检测文件是否存在
	{
		$temp=explode(".",$name);    //如果存在同名文件，就进行点的分割
		$name=$temp[0]."0".".".$temp[1];   //文件名后面加0
	} 
	//移动上传的临时文件，为新的文件
	//如果移动成功，输出相应的内容
	if(move_uploaded_file($_FILES["up_file"]["tmp_name"],$name))
	{
		echo "名为：".$_FILES["up_file"]["name"];
		echo "<p>";
		echo "的上传成功！";
		echo "<a href=qiantai.html>点击返回</a>";
	}
	//如果移动文件失败，则输出失败
	else{
		echo "文件上传过程出现失败！";
		echo "<p>";
		echo "<a href=qiantai.html>点击返回</a>";
	}
}
?>