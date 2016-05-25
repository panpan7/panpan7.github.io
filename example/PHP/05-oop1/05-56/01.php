<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-09
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//类的声明和对象实例化

/**
* 类的定义
*/
class ShopProduct {
	public $name;
	public $place;
	public $price;
	private $discount = 0;

	function __construct($name, $place, $price){
		$this->name = $name;
		$this->place = $place;
		$this->price = $price;
	}
	function printName() {
		echo $this->name;
	}
}
class Book extends ShopProduct {
	public $press;
	public $author;
		function __construct($name, $place, $price, $press, $author) {
			parent::__construct($name, $place, $price);
			$this->press = $press;
			$this->author = $author;
			}
}




$product1 = new ShopProduct('华为荣耀1X', '深圳', 1699);

var_dump($product1);

// $product1->name = '小米手机';
$product1->printName();

// echo $product1->discount;

?>