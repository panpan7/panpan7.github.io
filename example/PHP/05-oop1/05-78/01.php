<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-09
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//类的声明和对象的实例化

class ShopProduct {
	public $name;
	public $price;
	public $place;

	function printLable() {
		echo $this->name . ":" . $this->price . '元';
	}
	function __construct($name, $price, $place) {
		$this->name = $name;
		$this->price = $price;
		$this->place = $place;
	} 
}

/**
* 书籍类，继承商品父类
*/
class Book extends ShopProduct{
		public $author;
		public $press;
		public $version;
		function __construct($name, $price, $place, $author, $press, $version) {
			parent::__construct($name, $price, $place);
			$this->author = $author;
			$this->press = $press;
			$this->version = $version;
		}
		function printLable() {
		echo $this->name . ":" . $this->price . '元' . "\t" . $this->press;
	}
	}


// $product1 = new ShopProduct();
// $product1->name = '红米1S';
// $product1->price = 799;

// $product1->printLable();

$product2 = new ShopProduct('华为荣耀1x', 1699, '深圳');
$product2->printLable();

$book1 = new Book('《PHP开发精粹》', 69, '北京', 'Tom','清华大学出版社','第5版');
$book1->printLable();
// var_dump($product1);
// var_dump($product2);
?>