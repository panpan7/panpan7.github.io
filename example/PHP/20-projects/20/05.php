<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//文件操作练习，最终实现文件显示和目录浏览

// 引入网页头部和常用函数
require './include/head.php';
require './include/function.php';
?>
<style type="text/css">
	table {
		width: 100%;
	}
	td {
		text-align: center;
	}
</style>
<table>
	<tr>
		<th>序号</th>
		<th>文件名</th>
		<th>类型</th>
		<th>操作</th>
	</tr>
<?php
// 打开目录，读取内容
// 如果为中文，则涉及到编码转换，PHP提供了iconv()函数解决编码互转问题；
// 目录相关函数：is_dir，opendir，readdir，filetype
$dir = "./";
$i = 1;
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
           // p("filename: $file : filetype: " . filetype($dir . $file));
        	$filecname = iconv('GBK', 'UTF-8', $file);
        	echo '<tr><td>'. $i .'</td><td>' . $filecname . '</td><td>' . filetype($dir . $file) . '</td><td><a href="' . $dir . $filecname . '">运行</a></td></tr>' ;
        	$i++ ;
        }
        closedir($dh);
    }
}
?>
</table>
<!-- 页脚 -->
<?php require './include/foot.php'; ?>