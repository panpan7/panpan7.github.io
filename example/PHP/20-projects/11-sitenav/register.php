<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-29
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//引用外部文件
require '../include/MyClass.php';

$html = new MyClass();

//如果非提交，直接访问，则结束程序；
if(empty($_POST['submit'])) {
	$html->message('对不起！不能直接访问本页面。', 3, 'register.html');
	exit();
}

//检查用户输入数据如否合理

//开始会话
session_start();

//接受表单数据，插入数据库

// 连接、选择数据库
$mysqli = new mysqli('localhost', 'root', '', 'sitenav');
if ($mysqli->connect_errno) {	//显示链接错误
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

// 插入数据
$query = "INSERT INTO users (email,password,regdate) VALUES('" . $_POST['email'] ."','" . md5($_POST['password']) . "','" . time() ."')";
$result = $mysqli->query($query);
if (!$result) {
    die('SQL执行出错: ' . $mysqli->error);
}

// 关闭连接
$mysqli->close();

//设置为登录状态
$_SESSION['email'] = $_POST['email'];

//页面跳转
$html->message('注册成功，3秒后跳转至首页', 3, 'index.php');

?>