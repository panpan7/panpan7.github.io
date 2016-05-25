<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//microtime

$a = microtime();
$a = explode(' ', $a);
$c = (double)$a[0] + (float)$a[1];
var_dump($a);
var_dump($c);



// for ($i=0; $i < 1000000; $i++) { 
// 	# code...
// }
// $b = microtime();
// var_dump($b);
// echo round($b - $a, 4);


?>