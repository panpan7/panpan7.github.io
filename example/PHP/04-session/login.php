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

//连接数据库
$link = mysql_connect('localhost', 'root', '');
mysql_select_db('sitenav');

//执行查询
$query = "SELECT count(*) AS nums FROM user WHERE email ='" . $_POST['email'] ."' AND password ='" . $_POST['password'] . "'";
p("将执行SQL语句" . $query ."进行查询操作");
$result = mysql_query($query);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
p("查询成功！");

//如果有符合的条件则登录
$nums = mysql_fetch_array($result, MYSQL_ASSOC);

// var_dump($nums);
if($nums['nums']) {
	//设置登录信息
	// echo mysql_num_rows($result);
	$_SESSION['email'] = $_POST['email'];
	//var_dump($_SESSION);
	//显示提示信息后跳转
	message('登录成功，3秒后跳转至首页', 3, 'index.php');
}else{
	//显示错误信息
	message('用户名和密码不匹配，请重新登录！3秒后跳转至首页', 3, 'index.php');
}
//释放资源
mysql_free_result($result);
mysql_close($link);

//调用页面跳转函数页面跳转


?>