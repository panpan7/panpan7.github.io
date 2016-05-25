<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-18
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//foreach
// 遍历给定的 array_expression 数组。每次循环中，当前单元的值被赋给 $value 
// 并且数组内部的指针向前移一步（因此下一次循环中将会得到下一个单元

$a = array(1, 2, 3, 17);

$i = 0; 

foreach ($a as $v) {  
    echo "\$a[$i] => $v.\n";
    $i++;
}

// 第二种格式做同样的事，只除了当前单元的键名也会在每次循环中被赋给变量 $key。 

foreach ($a as $key =>$v) {  
    echo "$key => $v.\n";   
}
?>