<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-17
//采用知识共享“署名 3.0 中国大陆”许可协议授权

 // if else elseif

$bmi = 33;

if($bmi >= 28.0) {
	echo "肥胖";
} elseif ($bmi>=24.0) {
	echo "超重";
} elseif ($bmi >=18.5) {
	echo "正常";
} else {
	echo "偏轻";
}

?>