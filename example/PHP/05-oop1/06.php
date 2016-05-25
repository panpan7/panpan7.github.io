<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-31
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 管理类的访问（public private protected)——封装
// 在任何地方都可以访问public属性和方法
// 只能在类中才能访问private方法或属性，即使子类也不行
// 可在类及子类中访问protected方法或属性
// 使用getter和setter来控制可见性

class ShopProduct {
	private $title        = '商品名称';
	private $producerName = '制造商名称';
	private $place        = '产地';
	protected $price      = 0;
	private $discount     = 0;

	function __construct( $title, $producerName, $place, $price ) {
		$this->title        = $title;
		$this->producerName = $producerName;
		$this ->place       = $place;
		$this->price        = $price;
	}
	function getTitle() {
		return $this->title;
	}
	function getProducerName() {
		return $this->producerName;
	}
	function getPlace() {
		return $this->place;
	}
	function setDiscount( $num ) {
		$this->discount = $num;
	}
	function getDiscount() {
		return $this->discount;
	}
	function getPrice() {
		return $this->price - $this->discount;
	}
	function getProducer() {
		return "$this->place" . "$this->producerName";
	}
	function getSummaryLine() {
		$base = "$this->title" . "\t" . "$this->place" . "\t" . "$this->producerName";
		return $base;
	}
}

//继承父类使用extends关键词
class BookProduct extends ShopProduct {
	private $numPages;
	private $author;

	//构造函数
	function __construct( $title, $producerName, $place, $price, $numPages, $author ) {
		//调用父类的方法，减少重复代码
		parent::__construct ( $title, $producerName, $place, $price );
		$this->numPages = $numPages;
		$this->author   = $author;
	}
	//子类自有方法
	function getNumPages() {
		return $this->numPages;
	}
	function getAuthor() {
		return $this->author;
	}
	function getSummaryLine() {
		$base = parent::getSummaryLine();
		$base .= "\t" . "$this->numPages" . "\t" ."$this->author";
		return $base;
	}
}

class PhoneProduct extends ShopProduct {
	private $brand;
	private $os;

	//构造函数
	function __construct( $title, $producerName, $place, $price, $brand, $os ) {
		parent::__construct ( $title, $producerName, $place, $price ); //调用父类的方法，减少重复代码
		$this->brand = $brand;
		$this->os    = $os;
	}
	//子类自有方法
	function getBrand() {
		return $this->brand;
	}
	function getOs() {
		return $this->os;
	}
	function getSummaryLine() {
		$base = parent::getSummaryLine();
		$base .= "\t" . "$this->brand" . "\t" ."$this->os";
		return $base;
	}
}

$book1  = new BookProduct( "信息简史", "人民邮电出版社", "北京", 69, 458, "詹姆斯·格雷克" );
$phone1 = new PhoneProduct( "荣耀3C", "华为公司", "深圳", 999, "huawei", "android 4.2" );

echo $book1->setDiscount( $book1->price*0.4 );
echo "<br />";
echo $book1->getPrice();
echo "<br />";
echo $phone1->getOs();

?>
