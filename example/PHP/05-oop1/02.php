<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-03-31
//采用知识共享“署名 3.0 中国大陆”许可协议授权

//设置类的属性
//类的属性和标准的变量很相似，不过必须在声明和赋值前面加一个代表可见性的关键字public、protected或private.

class ShopProduct {
	public    $title        = '商品名称';
	public    $producerName = '制造商名称';
	public    $place        = '产地';
	public    $price        = 0;
	private   $discount     = 0;
	protected $sell         = 1;
}
$producer1 = new ShopProduct();
echo $producer1->title;

echo '<br />';
//改变对象的属性
$producer1->title = '书籍';
echo $producer1->title;

//以下内容会报错，private和protected属性不能在对象中访问
// echo $producer1->discount;
echo $producer1->sell;
?>
