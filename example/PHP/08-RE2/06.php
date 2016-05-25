<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-04-25
//许可协议 : CC0（公有领域）

// 学号检测 P101211505
function outputRe($pattern, $string) {
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}

// $pattern = '/^P1[0-4]\d{7}/';
// $string  = 'P101211505';
// outputRe($pattern, $string);

$pattern = '/\d{17}[\dX]/';
$string  = 'P101211505';
outputRe($pattern, $string);
// $pattern = '/^P\d{9}/';
// $string  = 'P991211505';
// outputRe($pattern, $string);

// $pattern = '/^P[01][\d]\d{7}/';
// $string  = 'P991211505';
// outputRe($pattern, $string);
// $string  = 'P191211505';
// outputRe($pattern, $string);

// $pattern = '/^P0\d{7}/';
// $string  = 'P121211505';
// outputRe($pattern, $string);
// $string  = 'P091211505';
// outputRe($pattern, $string);

$pattern = '/^P(0\d|1[0-4])\d{7}/';
$string  = 'P121211505';
outputRe($pattern, $string);
$string  = 'P091211505';
outputRe($pattern, $string);
?>
