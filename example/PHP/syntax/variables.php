<?php
$a = 1; // 全局变量

function Test() {
	global $a;
	echo $a; // 函数内部的局部变量
}
function test2() {
	echo $GLOBALS['a'];
}
Test();
test2();

$a = 'hello';
$$a = 'world';
echo $a, $$a;
?>
