<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-26
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//函数的定义
function bmiout($bmi) {
	if ($bmi <= 18.5) {
		return '过轻啦';
	}elseif($bmi <=25) {
		return "正常";
	}elseif($bmi <=28) {
		return "过重";
	}elseif($bmi <=32) {
		return "肥胖";
	}else {
		return "非常肥胖";
	}
}
echo bmiout(39);
function test() {
	echo 'dd';

}
test();

//引用文件
// include '02.php';
echo '看到我了';

require '../include/function.php';
p('又看到了！');
p('又看到了！');
?>