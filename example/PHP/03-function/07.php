<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-12
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 递归函数（recursive funciton）即调用自身的函数，常用来将复杂的问题分解为简单的情况，反复做这种处理，直到问题解决。

// 例子1：求和

function sumary($num) {
	if($num == 1) {
		return 1;
	}
	$sum = sumary($num -1) + $num;
	return $sum;
}

echo sumary(20), "<br />";

// 例子2：阶乘

function factorial($num) {
	if($num == 1) {
		return 1;
	}
	$result = factorial($num - 1) * $num;
	return $result;
}

echo factorial(5), "<br />";

// 例子3：收益计算器
function interest($capital, $rate, $cycle) {
	if($cycle == 1) {
		$capital = $capital + $capital * $rate;
		return $capital;
	}
	$capital = interest($capital, $rate, $cycle -1) + interest($capital, $rate, $cycle -1) * $rate;
	// 这个月的本金= 上个月的本金+上个月的本金*利息
	return $capital;
}
echo interest(10000, 0.1, 3), "<br />";
echo interest(20000, 0.05, 5), "<br />";

// 例子4：目录显示器（显示子目录明细）
// $dir代表目录，$level代表层级
function redir($dir, $level = 1) {
	if (is_dir($dir)) {	//如果是目录，就进入目录进行扫描
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {

        	if($file == '.' || $file == '..') {
        		continue;
        	}

        	$filecname = iconv('GBK', 'UTF-8', $file);
        	echo str_repeat("--", $level), $filecname , "<br />";
        	        	  	
        	if(is_dir($dir . "/" . $file)) {
        		redir($dir . "/" . $file, $level + 1);
        	}  	
        }
        closedir($dh);
    }
  }
}
redir('c:');
?>