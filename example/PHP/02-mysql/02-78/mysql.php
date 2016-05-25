<?php
// 连接、选择数据库
$link = mysql_connect('localhost', 'root', '')
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('bmi') or die('Could not select database');

// 执行 SQL 查询

// 查询语句
$query = 'SELECT * FROM bmi';

// 插入语句
$query = "INSERT INTO  `bmi`.`bmi` (`bid` ,`height` ,`weight`) VALUES (
NULL ,  '224',  '100')";

// 删除语句
$query = "DELETE FROM bmi WHERE bid=3";

// 更新语句
$query = "UPDATE  `bmi`.`bmi` SET  `height` =  '178' WHERE  `bmi`.`bid` =4";

$result = mysql_query($query) or die('Query failed: ' . mysql_error());
var_dump($result); exit();
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
?>
