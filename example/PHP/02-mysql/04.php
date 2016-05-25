<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-18
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//for
echo '<table>';
for ($i=1; $i <=9 ; $i++) { 
	echo "<tr>";
	for ($j=1; $j <=9 ; $j++) { 
		echo "<td>";
		echo $i . '*' . $j .'=' . $i*$j;
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";
?>