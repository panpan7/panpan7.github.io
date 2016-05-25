<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-04-25
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

// 标注量词作用的元素
$pattern = '/\$\d+(\.\d*)?/'; 
//匹配字符串中的货币金额，
// 这个正则表达式这样理解 \$ 表示$，\d+表示至少一个数字，\.\d* 表示小数点后多个数字
// (\.\d*)?表示小数点后的数字可有有无
$string  = 'this is 2014-04-19^dt$2000.344 $2014/04-1$9hiiisff 2014/04/19 +is<>?/this';
outputRe($pattern, $string);

$pattern = '/\$(?# \$表示$)\d+(\.\d*)?/'; 
$string  = 'this is 2014-04-19^dt$2000.344 $2014/04-1$9hiiisff 2014/04/19 +is<>?/this';
outputRe($pattern, $string);

?>