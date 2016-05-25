<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-31
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 继承
// 前面的商品类，面临新的需求，例如：需要显示图书的总页数，作者；而对于手机，则需要显示手机的品牌，操作系统等信息。
// 我们可以在ShopProduct类中增加数据，也可以将ShopProduct类拆分成两个单独的类
// 强行将不同的类字段合并到一个类中，会导致对象臃肿，产生冗余的属性和方法
// 而分拆类会产生重复代码

class ShopProduct {
	public $title        = '商品名称';
	public $producerName = '制造商名称';
	public $place        = '产地';
	public $price        = 0;

	function __construct( $title, $producerName, $place, $price ) {
		$this->title        = $title;
		$this->producerName = $producerName;
		$this ->place       = $place;
		$this->price        = $price;
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
	public $numPages;
	public $author;

	//构造函数
	function __construct( $title, $producerName, $place, $price, $numPages, $author ) {
		parent::__construct ( $title, $producerName, $place, $price ); //直接调用父类的方法，减少重复代码
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
	public $brand;
	public $os;

	//构造函数
	function __construct( $title, $producerName, $place, $price, $brand, $os ) {
		//直接调用父类的方法，减少重复代码
		parent::__construct ( $title, $producerName, $place, $price );
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

echo $book1->getSummaryLine();
echo "<br />";
echo $phone1->getSummaryLine();
echo "<br />";
echo $phone1->getOs();
?>
