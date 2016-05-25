<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-05-03
//许可协议 : CC0（公有领域）

// php和html的混写

// 要输出大段文本时，跳出 PHP 解析模式通常比将文本通过 echo 或 print 输出更有效率。 
$expression = true;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title></title>
	</head>
	<body>
		<?php if ($expression == true): ?>
		  <p>This will show if the expression is true.</p>
		  <p>This will show if the expression is true.</p>
		  <p>This will show if the expression is true.</p>
		  <p>This will show if the expression is true.</p>
		<?php else: ?>
		  <p>Otherwise this will show.</p>
		  <p>Otherwise this will show.</p>
		  <p>Otherwise this will show.</p>
		  <p>Otherwise this will show.</p>
		<?php endif; ?>  
	</body>
</html>