<!DOCTYPE html>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<title>在CodeIgnite中使用多维数组</title>
</head>
<body>
		<table>
			<tr>
				<th>序号</th><th>姓名</th><th>邮箱</th>
			</tr>
			<?php foreach ( $userlist as $k => $v ) :?>
			<tr>
				<td><?php echo $v['id'] ?></td>
				<td><?php echo $v['name'] ?></td>
				<td><?php echo $v['email'] ?></td>
			</tr>
			<?php endforeach;?>
		</table>
</body>
</html>
