<?php

//Author : 西北民大杨志宏
//Email : yangjh@yeah.net
//创建日期：2014-04-06
//采用知识共享“署名 3.0 中国大陆”许可协议授权

// 抽象类

abstract class AbstractClass{
    // 普通方法（非抽象方法）
    public function printOut() {
        print 'test' . "\n";
    }
}
// 定义为抽象的类不能被实例化。
// $a = new AbstractClass();

// 任何一个类，如果它里面至少有一个方法是被声明为抽象的，那么这个类就必须被声明为抽象的。
abstract class AbstractClass1{
    // 抽象方法不能包含方法体
    abstract public function printOut();
}

// 继承一个抽象类的时候，子类必须定义父类中的所有抽象方法；
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
$a = new Class2();
$a->printOut();