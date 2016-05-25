<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-05
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//自定义类

class MyClass {
	// 起始时间点
	private $start= 0;
	// 结束时间点
	private $end = 0;

	// 打印后回车，方便测试
	// $in 需要打印的字符串
	function p($in){
		echo "<p>", $in, "</p>\n";
	}
	//返回浮点数时间
	function microtimeFloat() {
	    list($usec, $sec) = explode(" ", microtime());
	    return ((float)$usec + (float)$sec);
	}

	//message()更友好的信息显示函数
	//$string 提示信息字符串
	//$delay 提示信息显示时间
	//$url	  跳转目的页面地址
	//$footstr页脚显示信息
	function message($string, $delay, $url,$footstr='西北民族大学公共选修课《PHP网站开发》'){
		echo "<html>\n";
		echo "<head>\n";
		echo "\t<meta http-equiv=\"refresh\"  content=\"" . $delay . "; url=" . $url . "\">\n";
		echo "\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n";
		echo "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/php/css/main.css\">\n";
		echo "</head>\n";
		echo "<body>\n";
		echo "\t<h1 class=\"warning\">提示信息</h1>\n";
		echo "\t<p class=\"warning\">", $string, "</p>\n";
		echo "\t<div id=\"foot\"><p><span>" . $footstr . "</span></p></div>\n";
		echo "</body>\n";
		echo "</html>\n";
	}

	//输出HTML文件头部分
	// $title 页面标题
	function head($title) {
		$this->start = $this->microtimeFloat();	//设置计时起点
		//heredoc 句法结构：<<<。在该运算符之后要提供一个标识符，然后换行。接下来是字符串 string 
		// 本身，最后要用前面定义的标识符作为结束标志。 结束时所引用的标识符必须在该行的第一列，

		echo <<<XHTML
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>$title</title>
		<link rel="stylesheet" type="text/css" href="/php/css/main.css">
	</head>
	<body>

XHTML;
	}

	// 输出HTML文件页脚部分
	// $str 页脚显示信息
	function foot($str = '西北民族大学公共选修课《PHP网站开发》') {
		$this->end = $this->microtimeFloat();
		$durationtime = round($this->end - $this->start, 2);
echo <<<XHTML
		<div id="foot">
			<p><span>$str</span><span>程序运行时间：$durationtime 秒</span><span></span></p>
		</div>		
	</body>
</html>
XHTML;
	}
}
?>