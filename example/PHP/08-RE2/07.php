<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-04-25
//许可协议 : CC0（公有领域）

// 电子邮箱的检测

function outputRe($pattern, $string) {
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}

$pattern = '/\w+@\w+\.\w+/';
// ^\w+[-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$
$string  = 'yangzh@yangzh.cn';
outputRe($pattern, $string);

$pattern = '/^\w+[&\-_.]?\w+@\w+\.\w+/';
$string  = 'yang.zh@yangzh.cn';
outputRe($pattern, $string);

$pattern = '/^\w+[&\-_.]?\w+@\w+([\w\-.]+)?\.\w+/';
$string  = 'yang.zh@dwzy.xbmu.edu.cn';
outputRe($pattern, $string);
?>
