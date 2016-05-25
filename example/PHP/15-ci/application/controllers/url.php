<?php
/**
 * site_url辅助函数演示
 */
class Url extends CI_Controller {
	public function index( $value='' ) {
		// 载入url辅助函数
		$this->load->helper( 'url' );
		echo site_url('/news/local/123');
		echo '<br />';
		echo base_url('news/local/123');
	}
}
