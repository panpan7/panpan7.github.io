<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//采用知识共享“署名 3.0 中国大陆”许可协议授权

if (isset($_POST["体重"]) && isset($_POST["身高"])) { 	//没有提交表单就不计算
	if($_POST["体重"] !="" && $_POST["身高"] !="") {	//提交非空表单
		$BMI = round($_POST["体重"]/($_POST["身高"]*$_POST["身高"]/10000), 2);	//BMI=体重/身高的平方
		echo "您的身高为" . $_POST["身高"] . "cm，您的体重为" . $_POST["体重"] . "kg"  . "<br />";
		echo "您的BMI为" . $BMI;
		if($BMI >= 28.0) {
			echo "\t肥胖";
		} elseif ($BMI>=24.0) {
			echo "\t超重";
		} elseif ($BMI >=18.5) {
			echo "\t正常";
		} else {
			echo "\t偏轻";
		}
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>BMI自测工具</title>
	</head>
	<body>
		<form method="post" action="05.php" title="BMI计算工具">
			<p>身高：<input type="text" name="身高" value="<?php if(isset($_POST["身高"])) {
				echo $_POST["身高"];}?>"/>cm</p>
			<p>体重：<input type="text" name='体重' value="<?php if(isset($_POST["体重"])) {
				echo $_POST["体重"];}?>"/>kg</p>
			<input type="submit" value="提交"/>
		</form>
	</body>
</html>