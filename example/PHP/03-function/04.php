<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-25
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//时间函数综合练习

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}


$start = microtime_float();

$j = 0;
for ($i=0; $i < 10000000; $i++) { 
	$j++;
}

$end = microtime_float();

var_dump($GLOBALS);
echo $end - $start;