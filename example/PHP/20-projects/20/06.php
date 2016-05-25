<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 递归练习

function sum($n) {
	if($n == 1) {
		return 1;
	}
	return $n + sum($n - 1);
}

// 引入网页头部和常用函数
require './include/head.php';
require './include/function.php';

// 在xdebug的配置项中有一项叫做xdebug.max_nesting_level， 默认情况下，在php.ini中这个配置项是被注释了的，去掉注释，将这个值成你所需要的值。

echo sum(100);

// <!-- 页脚 -->
require './include/foot.php'; 
?>