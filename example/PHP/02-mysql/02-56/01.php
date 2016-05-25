<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-19
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 连接、选择数据库
$link = mysql_connect( 'localhost', 'root', '' );
mysql_select_db( 'sitenav' );
echo '数据库连接成功' ."<br />";

// 执行 SQL 查询
$query  = "SELECT * FROM site where sitetype = '博客'";
$result = mysql_query( $query );

// 以 HTML 表格打印查询结果
echo "<table>\n";
while ( $line = mysql_fetch_array( $result, MYSQL_ASSOC ) ) {
	echo "\t<tr>\n";
	var_dump( $line );
	foreach ( $line as $col_value ) {
		echo "\t\t<td>$col_value</td>\n";
	}
	echo "\t</tr>\n";
}
echo "</table>\n";

// 释放结果集
mysql_free_result( $result );

// 关闭连接
mysql_close( $link );
?>
