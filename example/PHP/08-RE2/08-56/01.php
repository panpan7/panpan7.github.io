<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-04-30
//许可协议 : CC0（公有领域）

// 正则表达式的注释(?#...)

function outputRe($pattern, $string) {
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}


// $pattern = '/\$(?#\$表示$符号)\d+(?#表示至少1位数字)(\.\d*)?(?#表示小数后若干个数字)/'; 
// //匹配字符串中的货币金额，
// // 这个正则表达式这样理解 \$ 表示$，\d+表示至少一个数字，\.\d* 表示小数点后多个数字
// // (\.\d*)?表示小数点后的数字可有有无
// $string  = 'this is 2014-04-19^dt$2000.344 $2014/04-1$9hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);

// $pattern = '/([a-z]\d|\d)|(this)/'; 
// //匹配字符串中的货币金额，
// // 这个正则表达式这样理解 \$ 表示$，\d+表示至少一个数字，\.\d* 表示小数点后多个数字
// // (\.\d*)?表示小数点后的数字可有有无
// $string  = 'this is 2014-04-19^dt$2000.344 $2014/04-1$s9hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);

// $pattern = '/(\.\d*)?/'; 
// //匹配字符串中的货币金额，
// // 这个正则表达式这样理解 \$ 表示$，\d+表示至少一个数字，\.\d* 表示小数点后多个数字
// // (\.\d*)?表示小数点后的数字可有有无
// $string  = 'this is 2014-04-19^dt$2000.344 $2014/04-1$9hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);

// $pattern = '/\d{4}(-|\/)(\d{2})\1\2/';
// $string  = 'this is 2014-04-04^dt2014/04-19hiiisff 2014/05/05 +is<>?/this';
// outputRe($pattern, $string);

// $pattern = '/(\d{4}(-|\/)(\d{2}))\1\2/';
// $string  = 'this is 2014-04-04^dt2014/04-19hiiisff 2014/05/05 +is<>?/this';
// outputRe($pattern, $string);

// $pattern = '/(?:\d{4})(-|\/)\d{2}\1\d{2}/';//\1匹配(-|\/)
// $string  = 'this is 2014-04-19^dt2014/04-19hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);

// $pattern = '/(?:\d{4})(?P<connecter>-|\/)\d{2}\1\d{2}/';//\1匹配(-|\/)
// $string  = 'this is 2014-04-19^dt2014/04-19hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);

// $pattern = '/<span>(.*)<\/span>/U';
// $string  = 'this is <span>123456789</span>^dthiSisff <span>2014/04/19</span>';
// outputRe($pattern, $string);

// $pattern = '/<span>(.*?)<\/span>/';
// $string  = 'this is <span>123456789</span>^dthiSisff <span>2014/04/19</span>';
// outputRe($pattern, $string);

// $pattern = '/^this/m';
// $string  = 'this is <Span>123456
// this 789</span>^dthiSisff <span>2014/04/19</span>';
// outputRe($pattern, $string);


// $pattern = '/P(1[0-3]|0\d)\d{7}/';
// $string  = 'P091213518';
// outputRe($pattern, $string);


// $pattern = '/(.*){6}/';
// $string  = '123456';
// outputRe($pattern, $string);

// $pattern = '/\bthis\b/';
// $string  = 'this12^dthisff+ this is 12^dthis ff+ +	gdjjd<>?/';
// outputRe($pattern, $string);


// $pattern = '/(?=中华人民共和国)中华/';
// // (?=中华人民共和国)匹配中华人民共和国的开始位置
// $string  = 'this1中华人民共和国2^dthisff+ th中华民国is is 12^dthisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);
// echo preg_replace($pattern, '我爱中华', $string), "<br />";

// $pattern = '/(?!中华人民共和国)中华/';
// // (?=中华人民共和国)匹配中华人民共和国的开始位置
// $string  = 'this1中华人民共和国2^dthisff+ th中华民国is is 12^dthisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);
// echo preg_replace($pattern, '我爱中华', $string), "<br />";

$pattern = '/(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[A-Za-z\d]{6,}/';
$string  = 'A123dfs';
outputRe($pattern, $string);

?>