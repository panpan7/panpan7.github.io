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
	header("Content-type:text/html;charset=utf-8");
	if (preg_match_all($pattern, $string, $matched)) {
    echo '正则表达式:', htmlentities($pattern), '和字符串：', htmlentities($string), '匹配成功，匹配的字符串是：', "<br />";
    var_dump($matched);
  } else {
    echo "<p>",'没找到匹配字符', "</p>";
  }
}

// 简单的正则表达式
// $pattern = '/xjl/';
// $string  = '12^dthisff+>?xjl/';
// outputRe($pattern, $string);

// 元字符 \d
// $pattern = '/\d\d/';
// $string  = '12^dthisff+>?xjl/';
// outputRe($pattern, $string);

// 元字符 .
// $pattern = '/.\d/';
// $string  = '12^dthisff+>?xjl/';
// outputRe($pattern, $string);

// $pattern = '/[^12]/';	//^表示取反
// $string  = '12^dthisff+>?/';
// outputRe($pattern, $string);

// $pattern = '/[^a-zA-Z0-9]/';	//-表示范围
// $string  = '12^dthisff+ TTTTTXXXXthis is 123456789^dthisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/[\d\D]/';
// $string  = '12^dthisff+ this is 1234567
// 89^dthisff+ +	gdjjd<>?	/';
// outputRe($pattern, $string);

// $pattern = '/\d\d/';
// $string  = '.,12^dthisff+ this isthis 1234567TTTTTTTT
// 89^dthisff+ +	gdjjd<>?	/';
// outputRe($pattern, $string);
// echo preg_replace($pattern, '', $string);

// $pattern = '/\d$/';
// $string  = 'P991313345,ddfdfdfd,232323,3dhfsfsdf2';
// outputRe($pattern, $string);
// // echo preg_replace($pattern, '', $string);

// $pattern = '/B|PRE|ST/';
// $string  = 'PRE1021,康佳B';
// outputRe($pattern, $string);
// echo preg_replace($pattern, '|', $string);

// // $pattern = '/\B/';
// // $string  = 'this is a string';

// echo preg_replace($pattern, '|', $string);
// outputRe($pattern, $string);

// // 在方括号外使用的元字符如下：
// /*
// \一般用于转义字符	^断言目标的开始位置(或在多行模式下是行首)	$断言目标的结束位置(或在多行模式下是行尾).匹配除换行符外的任何字符(默认)	[开始字符类定义	]结束字符类定义	|开始一个可选分支(子组的开始标记)子组的结束标记	?作为量词，表示 0 次或 1 次匹配。位于量词后面用于改变量词的贪婪特性。 (查阅量词)  *量词，0 次或多次匹配+量词，1 次或多次匹配{自定义量词开始标记}自定义量词结束标记
// */
// // 3：反斜线有多种用法。首先，如果紧接着是一个非字母数字字符，表明取消该字符所代表的特殊涵义。

// $pattern = '/./';		//.表示任意字符
// $string =	'12^dff++gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/\./';		//\.反斜线后接一个非字母数字字符，表明取消该字符所代表的特殊涵义
// $string  = '12^df.f++gdjjd<>?/';
// outputRe($pattern, $string);

// // 4:反斜线的第二种用途提供了一种对非打印字符进行可见编码的控制手段。
// // \r回车 \t水平制表符 \f换页 \n换行
// $pattern = '/\t/';		//转义符\
// $string  = '12^dff++	gdjjd<>?/';
// outputRe($pattern, $string);

// // 5:反斜线的第三种用法是用来描述特定的字符类：
// // \d任意十进制数字		\D任意非十进制数字		\h任意水平空白字符		\H任意非水平空白字符
// // \s任意空白字符			\S任意非空白字符			\v任意垂直空白字符		\V任意非垂直空白字符
// // \w任意单字符(a-z A-Z 0-9 _)			\W任意非单字符
// $pattern = '/\d/';
// $string  = '12^dff++	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/\D/';
// $string  = '12^dff++	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/\h/';
// $string  = '12^dff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/\s/';
// $string  = '12^dff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/\v/';
// $string  = '12^dff+ +	gdjj
// d<>?/';
// outputRe($pattern, $string);

// $pattern = '/\w/';
// $string  = 'this is 12^_dff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/\W/';
// $string  = 'this is 12^dff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/<head>[\s\S]*<\/head>/';
// $string = <<<start
// <head>
// <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
// </head>
// start;
// outputRe($pattern, $string);


// // 反斜线的第四种用法是一些简单的断言。
// // 一个断言指定一个必须在特定位置匹配的条件， 它们不会从目标字符串中消耗任何字符。
// // \b单词边界	\B非单词边界	\A目标的开始位置(独立于多行模式)	\Z目标的结束位置或结束处的换行符(独立于多行模式)  \z目标的结束位置(独立于多行模式)	\G在目标中首次匹配位置

// $pattern = '/this\b/';
// $string  = '12^dthisff+ this is 12^dthisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/this\B/';
// $string  = '12^dthisff+ this is 12^dthisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/this\z/';
// $string  = '12^dthisff+ this is 12^dthisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// // 自定义字符类[],一个字符类在目标字符串中匹配一个单独的字符；
// $pattern = '/[12]/';
// $string  = '12^dthisff+ this is 123456789^dthisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/[^12]/';	//^表示取反
// $string  = '12^dthisff+ this is 123456789^dthisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/[a-zA-Z5-6]/';	//-表示范围
// $string  = '12^dthisff+ this is 123456789^dthisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/this/';
// $string  = '12^dthsff+ this is 123456789^dthiiisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// // * 量词，0 次或多次匹配
// $pattern = '/thi*s/';
// $string  = '12^dthsff+ this is 123456789^dthiiisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// // + 量词，1 次或多次匹配
// $pattern = '/thi+s/';
// $string  = '12^dthsff+ this is 123456789^dthiiisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// // ? 量词，表示 0 次或 1 次匹配
// $pattern = '/thi?s/';
// $string  = '12^dthsff+ this is 123456789^dthiiisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// // {自定义量词开始标记}自定义量词结束标记

// $pattern = '/thi{3}s/';
// $string  = '12^dthsff+ this is 123456789^dthiiisff+ +	gdjjd<>?/';
// outputRe($pattern, $string);

// $pattern = '/thi{1,3}s/';
// $string  = '12^dthsff+ this is 123456789^dthiiisff+ +	gdjjdthiis<>?/';
// outputRe($pattern, $string);

// $pattern = '/thi{2,}s/';
// $string  = '12^dthsff+ this is 123456789^dthiiisff+ +	gdjjdthiis<>?/';
// outputRe($pattern, $string);

// // 竖线可以在模式中出现任意多个，并且允许有空的可选路径(匹配空字符串)。
// // 匹配的处理从左到右尝试每一个可选路径，并且使用第一个成功匹配的。

// $pattern = '/this|is/';
// $string  = '12^dthsff+ this is 123456789^dthiiisff+ +	gdjjdthiis<>?/';
// outputRe($pattern, $string);

// // 在一个字符类外面，在默认匹配模式下， ^ 是一个断言当前匹配点位于目标字符串开始处的断言。
// $pattern = '/^this/';
// $string  = 'this 12^dthsff+ this is 123456789^dthiiisff+ +	gdjjdthiis<>?/';
// outputRe($pattern, $string);

// $pattern = '/^this/';
// $string  = 'this is 123456789^dthiiisff+ +	gdjjdthiis<>?/';
// outputRe($pattern, $string);

// // $ 是用于断言当前匹配点位于目标字符串末尾
// $pattern = '/this$/';
// $string  = 'this is 123456^dthiiisff+ this +	gdjjdthiis<>?/this';
// outputRe($pattern, $string);

// $pattern = '/\bthis\b/';
// $string  = 'thisis 123456789thatd this ff+ +	gdjjdthiithiss';
// outputRe($pattern, $string);
//
// $pattern = '/^this$/';
// $string  = 'this is 123456789^dthiiisff+ +	gdjjdthiis<>?/this';
// outputRe($pattern, $string);

// $pattern = '/^this.*this$/';
// $string  = 'this is 123456789^dthiiisff+ +	gdjjdthiithis';
// outputRe($pattern, $string);

// $pattern = '/this|that/';
// $string  = 'thisis 123456789thatdthiiisff+ +	gdjjdthiithis';
// outputRe($pattern, $string);

// // ()子模式得到的结果中第一个为全局模式，第二个为第一个子模式匹配结果,依此类推
// $pattern = '/(12345).*(89)/';
// $string  = 'this is 123456789^dthiiisff+123456789 +	gdjjdthiis<>?/this';
// outputRe($pattern, $string);

// $pattern = '/\d{4}-\d{2}-\d{2}/';
// $string  = 'this is 123456789^dthiiisff 2014-04-19 +is<>?/this';
// outputRe($pattern, $string);

// $pattern = '/\d{4}(-|\/)\d{2}(-|\/)\d{2}/';
// $string  = 'this is 123456789^dthiiisff 2014/04-19 2014/04/19 2014-04-19 +is<>?/this';
// outputRe($pattern, $string);

// 子模式的反向引用，即使用指定子模式的结果作为子模式 \1表示第一个子模式的结果
$pattern = '/\d{4}(-|\/)\d{2}\1\d{2}/';
$string  = 'this is 2014-04-19  2014/04-19 2014/04/19 ';
outputRe($pattern, $string);

// // 子模式的取消?:此时的括弧只有优先级别的作用，不按子模式处理，反向引用也自然失效
// $pattern = '/(?:\d{4})(-|\/)\d{2}\1\d{2}/';
// $string  = 'this is 123456789^dthiiisff 2014/04/19 +is<>?/this';
// outputRe($pattern, $string);
?>
