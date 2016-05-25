<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-19
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//常量的定义

define('XBMU', '西北民族大学');
echo XBMU;

echo "<br />";

$学生 = array(
    "学号" => "P110111222",
    "性别" => "男",
    "民族" => "汉族",
    "专业" => "新闻学",
);

foreach ($学生 as $key => $value) {
	echo $key . '=>' . $value;
	echo "<br />";
}
?>