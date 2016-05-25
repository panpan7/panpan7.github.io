<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>BMI自测工具</title>
	</head>
	<body>
		<form method="post" action="bmi.php" >
			<p>身高：<input type="text" name="height" value=<?php echo $_POST['height']; ?> />cm</p>
			<p>体重：<input type="text" name='weight' value=<?php echo $_POST['weight']; ?> />kg</p>
			<input type="submit" value="提交"/>
		</form>
	</body>
</html>
<?php
echo "您的身高是" . $_POST["height"] ."cm";
echo "<br />";
$BMI = $_POST["weight"] / ($_POST["height"] * $_POST["height"])*10000;
echo "您的BMI为" . round($BMI);
?>
