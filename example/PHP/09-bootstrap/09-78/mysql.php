<?php
// 接受表单数据
$height = $_POST['height'];
$weight = $_POST['weight'];
// 检验数据

// 插入数据库

// 连接、选择数据库
$link = mysql_connect('localhost', 'root', '')
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('bmi') or die('Could not select database');

// 执行 SQL 查询

// 插入语句
$query = "INSERT INTO  `bmi`.`bmi` (`bid` ,`height` ,`weight`) VALUES (
NULL ,  '$height',  '$weight')";

$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$query = "select * from bmi";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
// 以 HTML 打印查询结果
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// 释放结果集
mysql_free_result($result);

// 关闭连接
mysql_close($link);
// 查询数据库

// 显示数据

 ?>
