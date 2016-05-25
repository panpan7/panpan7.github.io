<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-05-03
//许可协议 : CC0（公有领域）

// MVC模式演示

// 控制器
class BlogController {
	public function index()
	{
		$test = '这是来自Blog控制器的数据';
		// echo '这是Blog控制器的index方法';
		include './views/Blog/index.php';
	}
}
?>