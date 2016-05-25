<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-04-30
//许可协议 : CC0（公有领域）

// 匹配位置的手段除^ $之外，还有\b

function outputRe($pattern, $string) {
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}

// // \b
// $pattern = '/this/';
// $string  = 'this is a strthising this is a string';
// outputRe($pattern, $string);

// $pattern = '/\bthis\b/';
// $string  = 'this is a strthising this is a string';
// outputRe($pattern, $string);

// $pattern = '/中华/';
// // (?=中华人民共和国)匹配中华人民共和国的开始位置
// $string  = 'this1中华人民共和国2^dthisff+ th中华民国is is 12^dthisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);
// echo preg_replace($pattern, '我爱中华', $string), "<br />";

// $pattern = '/(?=中华人民共和国)中华/';
// // (?=中华人民共和国)匹配中华人民共和国的开始位置
// $string  = 'this1中华人民共和国2^dthisff+ th中华民国is is 12^dthisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);
// echo preg_replace($pattern, '我爱中华', $string), "<br />";

// $pattern = '/(?!中华民国)/';
// // (?=中华人民共和国)匹配中华人民共和国的开始位置
// $string  = '中华人民共和国 中华民国 中华';
// outputRe($pattern, $string);
// echo preg_replace($pattern, '美国', $string), "<br />";

// $pattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!^])(\w|[~!^]){6,}/';
// // (?=中华人民共和国)匹配中华人民共和国的开始位置
// $string  = '12A3a456';
// outputRe($pattern, $string);

// // $pattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}/';
// // $string  = 'A123dfs';
// // outputRe($pattern, $string);

// $pattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!^])(\w|[~!^]){6,}/';
// // (?=中华人民共和国)匹配中华人民共和国的开始位置
// $string  = '12A3a456';
// outputRe($pattern, $string);

// $pattern = '/this|that/';
// // (?=中华人民共和国)匹配中华人民共和国的开始位置
// $string  = 'this that';
// outputRe($pattern, $string);

// $pattern = '/thi(s|t)hat/';
// // (?=中华人民共和国)匹配中华人民共和国的开始位置
// $string  = 'this that thishat thithat';
// outputRe($pattern, $string);

// $pattern = '/\d{4}[-\/]\d{1,2}[-\/]\d{1,2}/';
// // (?=中华人民共和国)匹配中华人民共和国的开始位置
// $string  = '2014-04-30 2014/4/30 2014-4/30';
// outputRe($pattern, $string);

// $pattern = '/(?:\d{4})([-\/])(?<day>\d{1,2})\1\2(?#dfd)/';
// $string  = '2014-04-30 2014/4/30 2014-4/30 2014-5-5';
// outputRe($pattern, $string);

// $pattern = '/this/i';
// $string  = 'This is a string, this is a array';
// outputRe($pattern, $string);

// $pattern = '/<span>(.*)<\/span>/';
// $string  = '<span>This is a string</span>, <span>this is a array</span>';
// outputRe($pattern, $string);



// $pattern = '/<span>(.*?)<\/span>/';
// $string  = 'this is <span>123456789</span>^dthiSisff <span>2014/04/19</span>';
// outputRe($pattern, $string);

// $pattern = '/^this/m';
// $string  = 'this is <span>123456789</span>^d
// this isff <span>2014/04/19</span>';
// outputRe($pattern, $string);

// $pattern = '/P(1[0-3]|0\d)\d{7}/';
// $string  = 'P001713423';
// outputRe($pattern, $string);

$pattern = '/[\w._]+@\w+(\.\w+)*/';
$string  = 'yang_jh@xbmu.edu.cn';
outputRe($pattern, $string);


?>