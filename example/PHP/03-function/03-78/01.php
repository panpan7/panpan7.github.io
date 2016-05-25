<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-26
//采用知识共享“署名 3.0 中国大陆”许可协议授权

require '../include/head.php';

//自定义函数
$a = 2;    //全局变量
$b = 3;


function test($a, $b){
	global $a, $b; //使用关键词global定义全局变量
	$c = $a + $b;
	return $c;
}

echo test(1,3);
echo test($a, $b);

// var_dump($GLOBALS);

echo $GLOBALS['a'];

//引用外部文件


for ($i=0; $i < 10000000; $i++) { 
	# code...
}

p('p函数调用成功');

require '../include/foot.php';
?>