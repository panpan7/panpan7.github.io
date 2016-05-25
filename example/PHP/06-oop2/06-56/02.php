<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 抽象类的定义

abstract class AbsClass {
    // 普通方法（非抽象方法）
    abstract public function printOut();
}

// $test = new AbsClass();

abstract class AbstractClass2{
    // 抽象方法不能包含方法体
    abstract public function printOut();
}
class Class2 extends AbstractClass2 {
	// 方法的访问控制必须和父类中一样（或者更为宽松）。如下行就不能为private或protected
	public function printOut() {
		echo 'hello! abstract world';
	}
}

class Class3 extends AbstractClass2 {
	// 方法的访问控制必须和父类中一样（或者更为宽松）。如下行就不能为private或protected
	public function printOut() {
		echo '你好，西北民族大学的同学们！';
	}
}
$a = new Class3();
$a->printOut();


?>