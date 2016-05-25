<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-05-14
//许可协议 : CC0（公有领域）

// mvc练习

class TestController {
	public function say($value='')
	{
		// echo '这是Test控制器的say方法';
		$username = '西北民族大学';

		// 正常情况下，数据来自于用户输入或者数据库，因此，我们要用到模型
		include './models/Test/TestModel.php';
		$model = new TestModel();

		$username = $model->getdata();

		include './views/Test/view.html';
	}
}
?>