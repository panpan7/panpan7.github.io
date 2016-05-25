<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-06
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 使用__get和__set方法

// 当访问一个不存在的属性时，会调用这两个方法。
class teacher {
	protected $data = array();	//用来保存重载的属性
	private $age    = 25;
	private $salary = 5000;

	public function __get($property) {
		return $this->data[$property];
	}

	public function __set($property, $value){
		$this->data[$property] = $value;
		return true;
	}
}
$yangjh = new teacher();
$yangjh->name = '杨志宏';
// echo $yangjh->name;
var_dump($yangjh);
?>