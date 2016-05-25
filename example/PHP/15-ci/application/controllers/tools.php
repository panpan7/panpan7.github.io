<?php
class Tools extends CI_Controller{
	public function index() {
		$this->load->helper( 'tools' );
		$this->load->helper( 'url' );
		message( 'http://www.baidu.com', '百度一下' );
	}
}
// 结束
