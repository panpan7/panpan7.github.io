<?php

//Author  : 西北民大杨志宏
//Email   : yangjh@yeah.net
//创建日期 : 2014-05-03
//许可协议 : CC0（公有领域）

// codeigniter中的控制器文件名为小写，类名必须以大写字母开头，且没有多余的后缀
// codeigniter中的控制器需要继承自CI_Controller类，
// 如果你的 URI 超过两个部分，那么超过的将被作为参数传递给方法。
// 当你的网站不存在某个URI 或者 用户直接从根目录访问的时候，CodeIgniter 会加载默认控制器。
// 打开 application/config/routes.php 文件来设置默认控制器：

class User extends CI_Controller {

	// 公开的方法才能从地址栏中访问
	public function index( $value = '' ) {
		// 在控制器中当然可以直接给用户输出信息
		echo '这是一个来自与User控制器index方法中的消息' . $value;

		// 我们也能将变量传递给视图模板
		$this->load->vars( 'message', 'this is a message from controller' );

		// 我们也可以给视图传递一个关联数组
		$userlist = array(
			array( 'id' => 1, 'name' => 'bill', 'email' => 'bill@xbmu.edu.cn' ),
			array( 'id' => 2, 'name' => 'gate', 'email' => 'gate@xbmu.edu.cn' ),
			array( 'id' => 3, 'name' => 'tom', 'email' => 'tom@xbmu.edu.cn' ),
		);
		$data['message']  = 'this is a message from data array';
		$data['userlist'] = $userlist;

		$this->load->vars( $data );

		// 也可以通过视图将信息呈现给用户
		// 视图文件全部存放在views目录中
		// 一个控制器最好对应一个子目录，如views/user
		// 在CI中可以在控制器中调用多个视图
		$this->load->view( "user/head" );
		$this->load->view( "user/index" );
	}

	// protected和private方法不能在浏览器地址栏中访问
	protected function test() {
		echo '这是一条来自与User控制器test方法中的消息';
	}

	public function test2() {
		$this->test();
	}
}
?>
