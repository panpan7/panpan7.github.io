<?php

// var_dump($_POST);exit;

echo "你的体重是" . $_POST["weight"];
$BMI = $_POST["weight"] / ($_POST["height"] * $_POST["height"]/10000);
echo "<br />";
echo "你的身高是" . $_POST["height"];
echo "<br />";
echo "您的BMI为" . round($BMI);

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>BMI自测工具</title>
	</head>
	<body>
	<form method="post" action="04.php" >
		<p>身高：<input type="text" name="height" />cm</p>
		<p>体重：<input type="text" name='weight' />kg</p>
		<input type="submit" value="提交"/>
	</form>
	</body>
</html>
