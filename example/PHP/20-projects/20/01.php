<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 数组遍历及数组常见函数（pop unshift shift……）

// 遍历数组
$teacher = array('name' => "yangzh", 'age' => 38,'sex' => "male");
foreach ($teacher as $key => $value) {
	echo $key . "=>" . $value ."<br />";
}

// 将下面数组内的值放大两倍
$students = array('P102' =>45, 'P103' =>46, 'P104' =>47);
foreach ($students as $key => $value) {
	$students[$key] = $value*2;
	echo $students[$key] ."<br />";
}
var_dump($students);

// 利用each和list实现数组遍历
$country = array('a' => '美国', 'b' => '巴西', 'c' => '中国');
while (list($key, $val) = each($country)) {
    echo "$key => $val\n";
}

// 小羊生羊
//  面试题一：农夫有一只羊，这只羊2年后会生一只小羊，5年后羊会死亡，
// 生出来的小羊也是这个规律，2年生一只小羊，5年死亡。问10年后，这个农夫会有多少羊。

$sheep = array(1, 0, 0, 0, 0);
for ($i=0; $i < 10; $i++) { 
	$temp = $sheep[1] + $sheep[3];
	array_unshift($sheep, $temp);
	array_pop($sheep);
	var_dump($sheep);
	echo "<br />";
}
echo array_sum($sheep);
?>
