<?php
class Variable extends CI_Controller {
	public function index( $value='' ) {
		$data = array(
			'title' => '视图中的变量',
			'head'  => '这是控制器传递的标题内容',
		);
		$this->load->view( 'variable', $data );
	}
}
//PHP脚本到此结束
