<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-29
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//调用自定义函数
require '../include/function.php';

//如果非提交，直接访问，则结束程序；
if(empty($_POST['submit'])) {
	message('对不起！不能直接访问本页面。', 3, 'register.html');
	exit();
}

//检查用户输入数据如否合理

//开始会话
session_start();

//接受表单数据，插入数据库
//var_dump($_POST);
$link = mysql_connect('localhost', 'root', '');
mysql_select_db('sitenav');
p('数据库连接成功');

// 插入数据
$query = "INSERT INTO user (email,password,regdate) VALUES('" . $_POST['email'] ."','" . $_POST['password'] . "','" . time() ."')";
p("将执行SQL语句" . $query ."进行添加操作");
$result = mysql_query($query);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
p("已成功添加数据。");

//设置为登录状态
$_SESSION['email'] = $_POST['email'];
//var_dump($_SESSION);

//页面跳转
message('注册成功，3秒后跳转至首页', 3, 'index.php');

?>