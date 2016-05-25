<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//引用外部文件
require '../include/MyClass.php';

//会话开始
session_start();

// 输出页面头部
$html = new MyClass();
$html->head('新闻传媒类网络资源导航——传媒新视野');
//判断是否登录
if(empty($_SESSION['email'])){
?>
	<p id="nav"><span><a href="login.html">登录</a></span><span><a href="register.html">注册</a></span></p>
<?php
	}else {
		//截取@符号前面的字符串
		$name = strstr($_SESSION['email'], '@', TRUE);
?>
<p id="nav"><span>欢迎你，<?php echo $name; ?></span><span><a href="logout.php">退出登录</a></span></p>
	<form action="addsite.php" method="post">
			类别<select  name="网站类别">				
			      <option>院校</option>
			      <option>研究</option>
			      <option>行业</option>
			      <option>微博</option>
			      <option>博客</option>
			      <option>招聘</option>
			</select>
			网址<input type="text" size="30" name="网址">
			简介<input type="text" size="60" name="简介">
			<input type="submit" name="submit" value="添加">			
		</form>
<?php
}
//显示所有网站导航数据
	
	// 连接、选择数据库
	$mysqli = new mysqli('localhost', 'root', '', 'sitenav');
	if ($mysqli->connect_errno) {	//显示链接错误
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	// 执行 SQL 查询
	$query = 'SELECT * FROM site GROUP BY sitetype, sid';	//按照类别分组
	$result = $mysqli->query($query);
?>
<div class="sitezone clearfix">
	<link rel="stylesheet" type="text/css" href="index.css">
<?php
	$newtype = '';													//设置标记，用来标记是否为新类型
	while ($line = $result->fetch_assoc()) {
		if($newtype == '') {											//如果为新类型，则输出对应起始标签
			echo '<h2>' . $line['sitetype'] .'</h2><ul>';
		}elseif($newtype != $line['sitetype']) {
			echo '</ul><h2>' . $line['sitetype'] .'</h2><ul>';
		}
		echo '<li><img src="http://' . $line['siteurl'] . '/favicon.ico" width="16" /><a href="http://', $line['siteurl'], '">', $line['siteinfo'], '</a></li>';			
		$newtype = $line['sitetype'];
	}
	echo '</ul></div>';

//释放查询结果集
$result->close();

// 关闭连接
$mysqli->close();

//引用页脚
$html->foot('<a href="http://www.neweyeshot.cn">传媒新视野</a>开发维护');
?>