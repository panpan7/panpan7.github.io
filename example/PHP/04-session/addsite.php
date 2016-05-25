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
require '../include/function.php';

//添加网站数据
$link = mysql_connect('localhost', 'root', '');
mysql_select_db('sitenav');
echo '数据库连接成功' ."<br />";

// 插入数据
$query = "INSERT INTO site (sitetype,siteurl,siteinfo) VALUES('" . $_POST['网站类别'] ."','" . $_POST['网址'] . "','" . $_POST['简介'] ."')";
echo "将执行SQL语句" . $query ."进行添加操作<br />";
$result = mysql_query($query);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
message('网站数组添加成功，3秒后返回首页', 3, 'index.php');
?>