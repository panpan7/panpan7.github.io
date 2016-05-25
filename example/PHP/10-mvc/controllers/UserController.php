<?php

// MVC模式演示——控制器
class UserController {
	public function index() {
		echo '这是User控制器的index方法';  //这是直接输出

		// 我们还可以将变量传递给视图文件
		// 正常情况下，数据来自于用户输入或者数据库，因此，我们要用到模型
		include './models/User/UserModel.php';
		$model = new UserModel();
		// 调用模型中的方法获取数据
		$test = $model->getUserInfo();
		// 当然，也可以直接在控制器中获得数据
		$name = 'PHP语言的MVC模式练习数据，这个数据来自于控制器。';
		// 直接将该方法的视图文件包含进来，显示给用户
		include './views/User/index.php';
		// 注意：相对路径的写法：我们是以index.php作为起点。
	}
	public function hello( $value='' ) {
		echo '这是User控制器的hello方法';
	}
}
?>
