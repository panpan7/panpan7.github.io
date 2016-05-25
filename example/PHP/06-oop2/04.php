<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-06
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 自动加载

// 在大型应用程序中，不同的文件需要包含在不同的脚本中，如果都用requrie会变得复杂而混乱。
// PHP有一种特性，称为自动加载，当需要一个类声明而不知道在哪里能找到类文件时，PHP会自动加载。

function __autoload($classname) {
    require_once $classname . '.php';
}

$obj  = new MyClass1();
$obj2 = new MyClass2();

var_dump($obj);
var_dump($obj2);
?>