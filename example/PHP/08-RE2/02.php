<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-04-25
//许可协议 : CC0（公有领域）

// 环视功能，环视结构不匹配任何字符，只匹配文本中的特定位置
// 它有两种类型： 前瞻断言(从当前位置向前测试)和后瞻断言(从当前位置向后测试)。

// $pattern = '/(?=中华人民共和国)/';
// // (?=中华人民共和国)匹配中华人民共和国的开始位置
// $string  = '中华人民共和国，中华人民共和国，中华民国';
// // outputRe($pattern, $string);
// echo preg_replace($pattern, '我爱', $string), "<br />";

// $pattern = '/(?!中华人民共和国)中华/';
// // // (?!中华人民共和国)匹配不是中华人民共和国的开始位置
// $string  = '中华人民共和国，中华人民共和国，中华民国';
// echo preg_replace($pattern, '我爱中华', $string), "<br />";

// $pattern = '/(?<=中华人民共和国)/';
// // (?<=中华人民共和国)匹配中华人民共和国的结束位置
// $string  = '中华人民共和国，中华人民共和国，中华民国';
// echo preg_replace($pattern, '威武', $string), "<br />";

// $pattern = '/(?<!中华人民共和国)国/';
// // // (?<!中华人民共和国)匹配不是中华人民共和国的结束位置
// $string  = '中华人民共和国，中华人民共和国，中华民国，美国';
// echo preg_replace($pattern, '国人民', $string), "<br />";

// $pattern = '/(?<=\d)(?=(\d\d\d)+[. ])/';
// // $pattern = '/(?<=\d)(?=(\d\d\d)+\b)/';
// $string  = 'eeeddfh 1234y45886.56 123445886.56 dfdfdf';
// echo preg_replace($pattern, ',', $string), "<br />";

// // 位置还可以组合
// $pattern = '/(?<=中华人民共和国)(?=中)/';
// // (?<=中华人民共和国)匹配中华人民共和国的结束位置
// $string  = '中华人民共和国，中华人民共和国，中华民国,中华人民共和国中中';
// echo preg_replace($pattern, '威武', $string), "<br />";

// 位置还可以组合
$pattern = '/(?<=中华人民共和国)(?=.*中)/';
$pattern = '/(?=.{6}$)/';
// (?<=中华人民共和国)匹配中华人民共和国的结束位置
$string  = '中华人民共和国，中华人民共和国，中华民国,中华人民共和国中中';
echo preg_replace($pattern, '|', $string), "<br />";
?>
