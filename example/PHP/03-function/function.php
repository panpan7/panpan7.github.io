<?php
/**
 * @Author:      西北民大杨志宏
 * @DateTime:    2016-01-02 01:08:04
 * @Description: 可变数量的函数参数
 */

function sum(...$numbers) {
	$acc = 0;
	foreach ($numbers as $n) {
		$acc += $n;
	}
	return $acc;
}

echo sum(1, 2, 3, 4);

function sum2($a, $b): float {
	return $a + $b;
}

// Note that a float will be returned.
var_dump(sum2(1, 2));
?>
