<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-25
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//变量的作用域

$a = 1; 					//全局变量

function test()
{
	$a = 2;				//任何用于函数内部的变量按缺省情况将被限制在局部函数范围内。
	echo $a; 
}

echo $a;
test();

//在函数中使用全局变量
function test2() {
	global $a;
	$a = $a * 8;
}
test2();
echo $a;

//全局变量的第二种写法$globals[]数组
function test3() {
	$GLOBALS['a'] += 4;
}
test3();
echo $a;

var_dump($GLOBALS);
?>