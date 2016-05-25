<?php

// 静态属性和方法的定义

class University {
	static public $name = '西北民族大学';
	public $adress = '榆中县夏官营镇';
	static public $rank = 300;

	static public function enroll()
	{
		self::$rank = 280;
		echo self::$rank;
	}
}

// $school = new University();
// var_dump($school);
// echo $school->name;
echo "<br />";
// echo $school->enroll();
University::$name = '兰州大学';
echo University::$name;

University::enroll();

?>