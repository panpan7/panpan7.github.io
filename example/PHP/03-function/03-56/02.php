<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-26
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//变量作用域

$a = 100;

function test($a) {
	global $a;
	$a = 200;
	return $a;
}
test($a);
echo $a;

var_dump($GLOBALS);

echo $GLOBALS['a'];
?>