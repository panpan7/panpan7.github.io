<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-31
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//使用类的方法

//方法是类中声明的特殊函数，它们也可以接受限定词，默认为public
class ShopProduct {
	public $title        = '商品名称';
	public $producerName = '制造商名称';
	public $place        = '产地';
	public $price        = 0;

	function getProducer() {
		return "$this->place" . "$this->producerName";
	}
}

$producer1               = new ShopProduct();
$producer1->title        = '《深入PHP面向对象编程》';
$producer1->producerName = '人民邮电出版社';
$producer1->place        = '北京';
$producer1->price        = 69;
// $a                    =  $producer1->getProducer();   //不建议再使用中转变量，不符合面向对象思想

echo $producer1->getProducer();
?>
