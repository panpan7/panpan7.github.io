<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-05
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//测试自定义类
require '../include/my.class.php';
$html = new MyClass();
$html->head('测试');
$html->foot();
?>