<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-06
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 静态属性和方法
// 我们不仅可以通过对象访问方法和属性，还可以通过类来访问它们。

class StaticExample {
	static public $siteName = '';
	       public $siteUrl  = 'www.xbmu.edu.cn';
	static public function sayHello() {
		echo 'hello';
		// 静态方法不能访问这个类中的普通属性
		// echo $this->siteurl;
	}
	static public function setSiteName($str = '西北民族大学'){
		// 在类内部，可以使用self关键字访问当前类		
		self::$siteName = $str;
		echo self::$siteName;
	}
}

// 静态属性及方法的访问
echo StaticExample::$siteName;
StaticExample::sayHello();
StaticExample::setSiteName();
echo StaticExample::$siteName;

$se = new StaticExample();

// 不能在对象中调用静态方法和属性
echo $se->siteName;
var_dump($se);
$se->sayHello();