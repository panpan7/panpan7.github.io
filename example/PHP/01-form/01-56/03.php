<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//数组的定义及元素获取
$student =  array(
	'姓名' => "吕晓明" ,
	'学号' => "P010101000",
	'性别' => "男" ,
	);

echo "我的名字叫" . $student["姓名"] . "，我的学号是" . $student["学号"];
?>