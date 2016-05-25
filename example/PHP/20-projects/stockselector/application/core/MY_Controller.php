<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
	 * 构造方法
	 */
	public function __construct() {
		// 继承父类构造方法
		parent::__construct();
		// 装载相关数据模型
		$this->load->model( 'Curlmodel' );
		// 装载相关数据模型
		$this->load->model( 'Stock' );
		// 装载公司数据模型
		$this->load->model( 'Company' );
	}

	public function loadView($viewName='', $data = array() )
	{
		$this->load->view('head');
		$this->load->view($viewName, $data);
    $this->load->view('foot');
	}

}
