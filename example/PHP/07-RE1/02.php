<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-19
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 正则表达式中的原子
// 1：打印字符（键盘上的各种字母,有的需要转义~！@#￥%……&*（）——+）和非打印字符（如回车、制表符等）

function outputRe($pattern, $string) {
	header("Content-type:text/html;charset=utf-8");
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}

// 正则表达式中的原子
// // 1：打印字符（键盘上的各种字母,有的需要转义~！@#￥%……&*（）——+）和非打印字符（如回车、制表符等）
// $pattern = '/</';
// $string =	'12^dff++gdjjd<>?/';
// outputRe($pattern, $string);

// // 2:转义符号
// $pattern = '/\n/';		//转义符\
// $string =	'12^dff++
// gdjjd<>?/';
// outputRe($pattern, $string);

// // 元字符 . 表示任意字符（除换行）
// $pattern = '/PRE./';
// $string =	'PRE1024';
// outputRe($pattern, $string);

// // 元字符 [...] 表示任意列出的单个字符
// $pattern = '/Bdfg]/';
// $string =	'PRE1024PRE1024PRE1024PRE1024';
// outputRe($pattern, $string);

// // 元字符 [^...] 表示任意未列出的单个字符
// $pattern = '/^Bdfg]/';
// $string =	'PRE1024PRE1024PRE1024PRE1024';
// outputRe($pattern, $string);

// // 元字符 \t 表示制表符
// $pattern = '/\t/';
// $string =	'PRE1024tPRE	1024PRE1024PRE1024';
// outputRe($pattern, $string);


// // 元字符 \n 表示换行,\r 表示回车
// $pattern = '/\r\n/';
// $string =	'PRE1024tPRE
// 	1024PRE1024PRE1024';
// outputRe($pattern, $string);

// 元字符 \s 表示空白字符
$pattern = '/\s/';
$string =	'PRE1024tPRE
024PRE1024PR	E1024';
outputRe($pattern, $string);
?>
