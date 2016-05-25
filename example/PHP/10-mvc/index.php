<?php
// MVC设计模式练习——入口文件
// 入口文件是唯一一个让用户可以通过浏览器请求的脚本文件，通常是index.php

// 提示信息，方便用户输入
if ( !isset( $_GET['c'] ) or !isset( $_GET['m'] ) )
	exit( '必须输入控制器和方法名，格式为index.php?c=xx&m=xx' );
// 取得控制器信息
$c = $_GET['c'];
// 引入控制器文件
require './controllers/' . $c . 'Controller.php';
// 实例化控制器对象
$className  = $c . 'Controller';
$controller = new $className;
// 取得方法名
$m = $_GET['m'];
// 执行方法
$controller->$m();
?>
