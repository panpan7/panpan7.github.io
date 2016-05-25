<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-19
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//常量的定义和使用

define('XBMU', '西北民族大学');

echo XBMU;

$i = 0;
while($i <= 10) {
	echo $i++;
}
echo '循环结束';

$student =  array(
	'姓名' => "吕晓明" ,
	'学号' => "P010101000",
	'性别' => "男" ,
	'专业' => "新闻学" ,
	);
	echo '<br />';
foreach ($student as $key => $value) {
	echo $key . '=>' . $value;
	echo '<br />';
}
?>