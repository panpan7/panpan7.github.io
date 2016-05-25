<?php
class Mvc extends CI_Controller {
	public function index() {
		// 载入模型
		$this->load->model( 'mvc_model' );
		// 取得模型数据
		$data['hello'] = $this->mvc_model->sayhello();
		// 在视图中显示数据
		$this->load->view( 'mvc', $data );
	}
}
//PHP脚本到此结束
