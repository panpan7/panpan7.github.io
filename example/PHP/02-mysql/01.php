<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>数据库操作练习</title>
	</head>
	<body>		

<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//采用知识共享“署名 3.0 中国大陆”许可协议授权

var_dump($_POST);

// 连接、选择数据库
$link = mysql_connect('localhost', 'root', '');
mysql_select_db('sitenav');
echo '数据库连接成功' ."<br />";

// 插入数据
$query = "insert into site (sitetype,siteurl,siteinfo) values('" . $_POST['网站类别'] ."','" . $_POST['网址'] . "','" . $_POST['简介'] ."')";
echo "将执行SQL语句" . $query ."进行添加操作<br />";
$result = mysql_query($query);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
echo "已成功添加数据！" ."<br/>";

// 执行 SQL 查询
$query  = 'SELECT * FROM site';
$result = mysql_query($query);

// 以 HTML 表格打印查询结果
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    var_dump($line);
    foreach ($line as $key =>$col_value) {
        echo "\t\t<td>$key</td><td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// 释放结果集
mysql_free_result($result);

// 关闭连接
mysql_close($link);

?>
	</body>
</html>