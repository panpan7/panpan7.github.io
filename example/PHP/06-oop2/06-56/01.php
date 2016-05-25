<?php

//静态属性和方法

class School {
	static public $name = '西北民族大学';
	public $adress;

	static public function enroll()
	{
		echo '欢迎报考', self::$name;
		// echo '欢迎报考', $this->name;
	}
}

// echo School::$name;
School::enroll();

// $xbmu = new School();


// echo $xbmu->name;

?>