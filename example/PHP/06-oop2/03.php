<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-06
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 类型提示
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
		return $this->price - $this->price*$this->discount;
	}
	function getProducer() {
		return "$this->place" . "$this->producerName";
	}
	function getSummaryLine() {
		$base = "$this->title" . "\t" . "$this->place" . "\t" . "$this->producerName";
		return $base;
	}
}


/**
 * 商品信息输出类
 */
class ShopProductWriter {
	public function write( $shopProduct ) {
		$str = $shopProduct->getTitle() . ":" . $shopProduct->getProducer() . $shopProduct->getPrice() . "\n";
		print $str;
	}
}

// 测试输出类
$product1 = new ShopProduct( "《洗脑术》", '中国青年出版社', '北京', 32 );
$writer   = new ShopProductWriter();
$writer->write( $product1 );

//虽然我们把ShopProductWriter中的write方法的参数写为$ShopProduct，但实际上它可以接受非预期的数据类型，
// 而方法内部也是按照接受的参数为$ShopProduct对象来处理的。
// 为了避免传入非预期对象，我们可以使用PHP提供的类型提示来达到只接受特定数据类型的目的
// （只能限定对象、数组、和NULL，其他数据类型限定暂不支持）

/**
 * 增加了类型提示的write方法
 */
class SPWriter {
	function write( ShopProduct $shopProduct ) {
		$str = "商品名称：" . $shopProduct->getTitle() . "\t" .
			"生产商：" . $shopProduct->getProducer() . ":\t" .
			"价格：" . $shopProduct->getPrice() . "\n";
		print $str;
	}
}

$product1 = new ShopProduct( "《洗脑术》", '中国青年出版社', '北京', 32 );
$writer = new SPWriter();
// 参数类型正确
$writer->write( $product1 );
// 参数类型不正确，会输出错误信息
$writer->write( '测试字符' );
?>
