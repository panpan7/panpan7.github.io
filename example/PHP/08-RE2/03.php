<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-19
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 正则表达式中的元字符，用来修饰原子。
// 一些字符被赋予特殊的涵义，使其不再单纯的代表自己，模式中的这种有特殊涵义的编码字符称为元字符。

// 共有两种不同的元字符：一种是可以在模式中方括号外任何地方使用的，另外一种是需要在方括号内使用的。
// 在方括号内使用的元字符如下：\转义字符^仅在作为第一个字符(方括号内)时，表明字符类取反-标记字符范围

function outputRe($pattern, $string) {
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}


// ()子模式返回的matches数组中的第一个元素为全局模式，
// 第二个为第一个子模式匹配结果,
// 第三个为第二个子模式的匹配结果，依此类推
// $pattern = '/(12345)(.*)(89)/';
// $string  = 'this is 123456789^dthiiisff+123456789 +	gdjjdthiis<>?/this';
// outputRe($pattern, $string);


// 将可选分支局部化。
$pattern = '~\d{4}(?<name>[-/])\d{2}\1\d{2}~';
$string  = 'this is 2014-11-19 2014-11/19 2014/04/19 +is<>?/this';
outputRe($pattern, $string);


// // 将可选分支局部化。
// $pattern = '/\d{4}-|\/\d{2}(-|\/)\d{2}/';
// $string  = 'this is 123456789^dthiiisff 2014-04/19 +is<>?/this';
// outputRe($pattern, $string);

// // 将可选分支局部化。
// $pattern = '/\d{4}(-|\/)\d{2}(-|\/)\d{2}/';
// $string  = 'this is 123456789^dthiiisff 2014-04/19 +is<>?/this';
// outputRe($pattern, $string);

// // 子模式的反向引用，即使用指定子模式的结果作为子模式 \1表示第一个子模式的结果
// // 捕获子组序号的最大值是 99， 最大允许拥有的所有子组(包括捕获的和非捕获的)的最大数量为 200。
// $pattern = '/\d{4}(-|\/)\d{2}\1\d{2}/';
// $string  = 'this is 2014-04-19^dt2014/04-19hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);

// // 子模式的取消?:此时的括弧只有优先级别的作用，不按子模式处理，反向引用也自然失效
// $pattern = '/(\d{4})(-|\/)\d{2}\1\d{2}/';//\1匹配(\d{4})
// $string  = 'this is 2014-04-19^dt2014/04-19hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);

// $pattern = '/(?:\d{4})(-|\/)\d{2}\1\d{2}/';//\1匹配(-|\/)
// $string  = 'this is 2014-04-19^dt2014/04-19hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);

// // 标注量词作用的元素
// $pattern = '/\$\d+(\.\d*)?/';
// //匹配字符串中的货币金额，
// // 这个正则表达式这样理解 \$ 表示$，\d+表示至少一个数字，\.\d* 表示小数点后多个数字
// // (\.\d*)?表示小数点后的数字可有有无
// $string  = 'this is 2014-04-19^dt$2000.344 $2014/04-1$9hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);

// // 在 PHP 4.3.3 中，可以对子组使用 (?P<name>pattern) 的语法进行命名。 这个子模式将会在匹配结果中同时以其名称和顺序(数字下标)出现， PHP 5.2.2中又增加了两种为子组命名的语法： (?<name>pattern) 和 (?'name'pattern)。
// $pattern = '/(?:\d{4})(?P<connecter>-|\/)\d{2}\1\d{2}/';
// $string  = 'this is 2014-04-19^dt2014/04-19hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);

// $pattern = '/(?:\d{4})(?<connecter>-|\/)\d{2}\1\d{2}/';
// $string  = 'this is 2014-04-19^dt2014/04-19hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);

// $pattern = '/(?:d{4})(?\'connecter\'-|\/)\d{2}\1\d{2}/';//不建议使用
// $string  = 'this is 2014-04-19^dt2014/04-19hiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);
?>
