<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-06
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 流畅的接口

// 我们知道，在PHP中，对象总是通过引用传递，这表明无需从一个方法中返回一个对象来观察它的变化；
// 然而，如果从一个方法中返回$this,可以在应用程序中建立流畅的接口，实现链式操作。

class Parcel {
	protected $weight;
	protected $destination;
	public function setWeight($weight) {
		echo '包裹的重量为：' . $weight . "\n";
		$this->weight = $weight;
		return $this;
	}
	public function setDestination($destination) {
		echo '包裹的目的地为：' . $destination . "\n";
		$this->destination = $destination;
		return $this;
	}
}

$myparcel1 = new Parcel();
$myparcel1->setWeight(50)->setDestination('甘肃省兰州市西北民族大学榆中校区');
?>