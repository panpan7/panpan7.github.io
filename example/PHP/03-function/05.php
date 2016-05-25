<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-26
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//数组函数之list函数
//list() 仅能用于数字索引的数组并假定数字索引从 0 开始。

$student =  array(
	"吕晓明" ,
	"P010101000",
	"男" ,
	);
list($name, $s_id, $sex) = $student;
echo $name , $s_id , $sex;
?>