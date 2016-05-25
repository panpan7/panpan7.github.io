<?php

function outputRe($pattern, $string) {
	header("Content-type:text/html;charset=utf-8");
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}

$pattern = '/(this|that)hello/';	//^表示取反
$string  = '12^dthishelloff+>? that is a girl/';
outputRe($pattern, $string);
//
// //PHP脚本到此结束
