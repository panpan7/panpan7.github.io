<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 打印后回车，方便测试
function p($in){
	echo "<p>", $in, "</p>\n";
}
//返回浮点数时间
function microtimeFloat(){
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

//更友好的信息显示函数
function message($string, $delay, $url){
	echo "<html>\n";
	echo "<head>\n";
	echo "\t<meta http-equiv=\"refresh\"  content=\"" . $delay . "; url=" . $url . "\">\n";
	echo "\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n";
	echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/php/css/main.css\">\n";
	echo "</head>\n";
	echo "<body>\n";
	echo "\t<h1 class=\"warning\">提示信息</h1>\n";
	echo "\t<p class=\"warning\">", $string, "</p>\n";
	echo "\t<div id=\"foot\"><p><span>西北民族大学公共选修课《PHP网站开发》</span></p></div>\n";
	echo "</body>\n";
	echo "</html>\n";
}
?>
