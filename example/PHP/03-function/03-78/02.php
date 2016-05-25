<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//microtime

$a = microtime();
var_dump($a);

$a = explode(" ", $a);
$floattime = $a[0] +$a[1];
var_dump($a);
echo $floattime;
?>