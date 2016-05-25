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
//var_dump($_POST);

//调用自定义函数
require '../include/MyClass.php';
$html = new MyClass();

//添加网站数据
// step1：连接、选择数据库
$mysqli = new mysqli('localhost', 'root', '', 'sitenav');
if ($mysqli->connect_errno) {	//显示链接错误
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

// step2:插入数据
$query = "INSERT INTO site (sitetype,siteurl,siteinfo) VALUES('" . $_POST['网站类别'] ."','" . $_POST['网址'] . "','" . $_POST['简介'] ."')";
// $query = "set names utf8";
$result = $mysqli->query($query);		//非select操作返回布尔值
if (!$result) {
    die('数据添加失败: ' . $mysqli->error);
}
//step3:释放资源
// 关闭连接
$mysqli->close();

// 显示跳转信息
$html->message('网站数组添加成功，3秒后返回首页', 3, 'index.php');
?>