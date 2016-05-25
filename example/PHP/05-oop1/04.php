<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-31
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//创建构造方法
// 构造方法可以用来确保必要的属性被设置，并完成任何需要准备的工作
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

// 创建实例化对象
$producer1 = new ShopProduct( '《信息简史》', '人民邮电出版社', '北京', 69 );

echo $producer1->getProducer();
echo $producer1->getSummaryLine();
?>
