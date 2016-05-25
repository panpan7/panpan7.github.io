<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-04-25
//许可协议 : CC0（公有领域）

// 密码必须为包含大写字母、小写字母、数字，最少6位
function outputRe($pattern, $string) {
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}

// $pattern = '/([a-z]|\d|[A-Z]){6,}/';
// $string  = '111111111';
// outputRe($pattern, $string);

// $pattern = '/(?=[a-z])\w{6,}/';
// $string  = 'a123dffgg';
// outputRe($pattern, $string);
// echo preg_replace($pattern, ',', $string), "<br />";

// $pattern = '/(?=.*[a-z])/';
// $string  = '123dffggBB';
// outputRe($pattern, $string);
// echo preg_replace($pattern, ',', $string), "<br />";

// $pattern = '/(?=.*?[a-z])/';
// $string  = '123dffgg';
// outputRe($pattern, $string);
// echo preg_replace($pattern, ',', $string), "<br />";

// $pattern = '/(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[A-Za-z\d]{6,}/';
// $string  = 'AAAAAAA';
// outputRe($pattern, $string);

$pattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}/';
$string  = '123ddddbA';
outputRe($pattern, $string);

// $pattern = '/[a-z]|[A-Z]{6,}/';
// $string  = 'aaaaaaa';
// outputRe($pattern, $string);
// $pattern = '/(?=^.{6,}$)(?=.*\d)(?=.*\W+)(?=.*[A-Z])(?=.*[a-z]).*$/';
// $string  = 'A123d!fs';
// outputRe($pattern, $string);

?>
