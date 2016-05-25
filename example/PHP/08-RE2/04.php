<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-19
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 模式修正符

function outputRe($pattern, $string) {
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}

// // i匹配大小写
// $pattern = '/this/i';
// $string  = 'this is 123456789^dthiSiisff 2014/04/19 +is<>?/This';
// outputRe($pattern, $string);

// // 默认视为单行
// $pattern = '/^this/i';
// $string  = 'this is 123456789^dthiSiis
// This';
// outputRe($pattern, $string);

// // m视为多行，默认视为单行
// $pattern = '/^this/mi';
// $string  = 'this is 123456789^d
// thiSiisff 2014/04/19 +is<>?/This';
// outputRe($pattern, $string);

// // 模式中的点号元字符匹配所有字符，包含换行符。如果没有这个修饰符s，点号不匹配换行符。
// $pattern = '/<head>.*<\/head>/';
// $string = <<<start
// <head>
// <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
// </head>
// start;
// outputRe($pattern, $string);

// $pattern = '/<head>.*<\/head>/s';
// $string = <<<start
// <head>
// <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
// </head>
// start;
// outputRe($pattern, $string);

// // x 模式中的没有经过转义的或不在方括号中的空白数据字符总会被忽略
// $pattern = '/this is/i';
// $string  = 'this is 123456789^dthiSisff 2014/04/19 +is<>?/This';
// outputRe($pattern, $string);

// $pattern = '/this is/ix';
// $string  = 'this is 123456789^dthiSisff 2014/04/19 +is<>?/This';
// outputRe($pattern, $string);

// // U 这个修饰符逆转了量词的"贪婪"模式。
// $pattern = '/<span>.*<\/span>/s';
// $string  = 'this is <span>123456789</span>^dthiSisff <span>2014/04/19</span>';
// outputRe($pattern, $string);

// $pattern = '/<span>(.*)<\/span>/sU';
// $string  = 'this is <span>123456789</span>^dthiSisff <span>2014/04/19</span>';
// outputRe($pattern, $string);

// // 这和 perl 是不兼容的。 可在量词后以问号标记其非贪婪(比如.*?)。
// $pattern = '/<span>(.*?)<\/span>/s';
// $string  = 'this is <span>123456789</span>^dthiSisff <span>2014/04/19</span>';
// outputRe($pattern, $string);
//
// $pattern = '/(?<=\d)(?=(\d\d\d)+[. ])/';
// $pattern = ’/(?<=\d)(?=(\d\d\d)+\b)/’;
$pattern = '/(?<=\d)(?=(\d{3})+[ .])/';
$string = '45886.56 123445886.00000002 ';
echo preg_replace($pattern, ',', $string);
?>
