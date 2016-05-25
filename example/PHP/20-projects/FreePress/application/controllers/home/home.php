<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
/**
 * 首页控制器
 */
class Home extends CI_Controller {
	/**
	 * 首页显示方法
	 */
	public function index() {
		$this->load->view( 'home\index.html' );
	}
}
// PHP脚本结束
