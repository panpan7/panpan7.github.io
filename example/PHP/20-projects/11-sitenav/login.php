<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-29
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//如果非提交，直接访问，则结束程序；
if(empty($_POST['submit'] )) {
	exit('请不要直接访问本页面！');
}

//会话开始
session_start();

//引用外部文件
require '../include/MyClass.php';
$html = new MyClass();

// 连接、选择数据库
$mysqli = new mysqli('localhost', 'root', '', 'sitenav');
if ($mysqli->connect_errno) {	//显示链接错误
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

//执行查询
$query = "SELECT email FROM users WHERE email ='" . $_POST['email'] ."' AND password ='" . md5($_POST['password']) . "'";
$result = $mysqli->query($query);
if (!$result) {
    die('查询数据库出错: ' . $mysqli->error);
}

//如果有符合的条件则登录
if($result->num_rows) {
	//设置登录信息
	$_SESSION['email'] = $_POST['email'];
	//显示提示信息后跳转
	$html->message('登录成功，3秒后跳转至首页', 3, 'index.php');
}else{
	//显示错误信息
	$html->message('用户名和密码不匹配，请重新登录！3秒后跳转至首页', 3, 'index.php');
}

//释放查询结果集
$result->close();

// 关闭连接
$mysqli->close();
?>